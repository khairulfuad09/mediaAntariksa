<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class orderDragAndDrop extends Component
{
    public $instruction;
    public $items;
    public $correctOrder;
    public $point;
    public $title;
    public $materi;

    /**
     * Create a new component instance.
     *
     * @param array $items
     * @param array $correctOrder
     */
    public function __construct($title, $materi, $point, $instruction, $items = [], $correctOrder = [])
    {
        // Mengacak item
        $this->instruction = $instruction;
        $this->items = $items;
        $this->correctOrder = $correctOrder;
        $this->point = $point;
        $this->materi = $materi;
        $this->title = $title;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.order-drag-and-drop');
    }
}
