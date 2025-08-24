# --------------------------------------------------------------------
# 1. ビルドステージ (Composer, NPMのインストールとビルド)
# --------------------------------------------------------------------
FROM composer:2 as vendor
WORKDIR /app
COPY database/ database/
COPY composer.json composer.lock ./
# --no-scriptsで vendorだけ先にインストール
RUN composer install --no-interaction --no-plugins --no-scripts --prefer-dist
COPY . .
# ここでスクリプトを実行
RUN composer install --no-interaction --no-dev --prefer-dist

# フロントエンドのアセットをビルド
FROM node:20-alpine as frontend
WORKDIR /app
COPY --from=vendor /app .
COPY package.json package-lock.json ./
RUN npm install
COPY vite.config.js ./
COPY resources/js/app.js ./
# 他に必要なファイルがあればコピー
RUN npm run build

# --------------------------------------------------------------------
# 2. 本番ステージ (実際に動かす軽量なコンテナ)
# --------------------------------------------------------------------
# 公式イメージからFrankenPHPの実行ファイルをコピーする
FROM dunglas/frankenphp:1-php8.3-alpine as frankenphp_binary

FROM php:8.3-fpm-alpine as production

# 必要なPHP拡張機能をインストール
RUN apk add --no-cache supervisor linux-headers \
  && docker-php-ext-install pdo pdo_mysql sockets

# FrankenPHPの実行ファイルをコピー
COPY --from=frankenphp_binary /usr/local/bin/frankenphp /usr/local/bin/frankenphp
WORKDIR /app

# ビルドステージから必要なファイルだけコピー
COPY --from=vendor /app/vendor/ /app/vendor/
COPY --from=vendor /app/ /app/
COPY --from=frontend /app/public/build /app/public/build

# キャッシュを作成して高速化
RUN php artisan config:cache && php artisan route:cache && php artisan view:cache

# ポートを開放 (Cloud Runが自動で8080に設定)
EXPOSE 8080

# コンテナ起動時に実行するコマンド
CMD ["/usr/local/bin/frankenphp", "run", "--config", "frankenphp.php"]
