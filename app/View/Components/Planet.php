<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Planet extends Component
{
    public $width;
    public $height;
    public $id;
    public $texture;

    public function __construct($width = '100%', $height = '100%', $id = null, $texture = null)
    {
        $this->width = $width;
        $this->height = $height;
        $this->id = $id;
        $this->texture = $texture;
    }

    public function render()
    {
        return view('components.planet');
    }
}
