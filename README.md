# Simple Laravel Form Application

This is a simple Laravel application that demonstrates basic features such as routing, controllers, views, and form validation.

## About The Project

This project is a simple application to demonstrate the basic features of the Laravel framework. It includes:

*   **Routing:** The application has a few simple routes defined in `routes/web.php`.
*   **Controllers:** The `HelloController` handles the application's logic.
*   **Views:** The application uses Blade templates to render HTML.
*   **Form Validation:** The `HelloRequest` class handles form validation.

## Getting Started

To get a local copy up and running follow these simple example steps.

### Prerequisites

*   PHP >= 8.2
*   [Composer](https://getcomposer.org/)
*   [Node.js](https://nodejs.org/) & [NPM](https://www.npmjs.com/)

### Installation

1.  Clone the repo
    ```sh
    git clone https://github.com/your_username/your_project.git
    ```
2.  Install PHP dependencies
    ```sh
    composer install
    ```
3.  Install NPM packages
    ```sh
    npm install
    ```
4.  Create a copy of your .env file
    ```sh
    cp .env.example .env
    ```
5.  Generate an app encryption key
    ```sh
    php artisan key:generate
    ```

### Running the Application

1.  Run the development server
    ```sh
    php artisan serve
    ```
2.  Open your browser and navigate to `http://127.0.0.1:8000`

## Usage

1.  Navigate to the `/hello` route in your browser.
2.  You will see a form with the following fields:
    *   **Name:** Your name (required)
    *   **Mail:** Your email address (must be a valid email)
    *   **Age:** Your age (must be a number between 0 and 150)
3.  Fill out the form and click "send".
4.  If the form is filled out correctly, you will see a success message.
5.  If there are any validation errors, they will be displayed on the form.

## Built With

*   [Laravel](https://laravel.com/)
*   [PHP](https://www.php.net/)
