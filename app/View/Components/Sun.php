<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Sun extends Component
{
    public $width, $height, $id, $color, $bloomStrength, $particles, $particleColor;

    public function __construct(
        $width = '500px',
        $height = '500px',
        $id = 'sun-1',
        $color = '#FDB813',
        $bloomStrength = 2,
        $particles = 500,
        $particleColor = '#ffaa00'
    ) {
        $this->width = $width;
        $this->height = $height;
        $this->id = $id;
        $this->color = $color;
        $this->bloomStrength = $bloomStrength;
        $this->particles = $particles;
        $this->particleColor = $particleColor;
    }

    public function render()
    {
        return view('components.sun');
    }
}
