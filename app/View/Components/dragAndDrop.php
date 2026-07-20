<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class dragAndDrop extends Component
{
    public $items;
    public $categories;
    public $instruction;
        public $point;
        public $title;
        public $materi;

    /**
     * Create a new component instance.
     *
     * @param array $items
     * @param array $categories
     */
    public function __construct($items = [], $categories = [], $instruction,$point,$title,$materi)
    {
        $this->items = $items;
        $this->categories = $categories;
        $this->instruction = $instruction;
        $this->point = $point;
        $this->title = $title;
        $this->materi = $materi;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.drag-and-drop');
    }
}
