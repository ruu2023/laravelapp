<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class Message extends Component
{
    private $id;
    private $data;
    private $msg;
    /**
     * Create a new component instance.
     */
    public function __construct($id = 1)
    {
        $this->msg = 'ランダムなPOSTデータを表示します。';
        $this->id = $id;
        $response = Http::get('https://jsonplaceholder.typicode.com/posts/' . $this->id);
        $this->data = $response->json();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data = [
            'id' => $this->id,
            'data' => $this->data,
            'msg' => $this->msg
        ];
        return view('components.message',$data);
    }
}
