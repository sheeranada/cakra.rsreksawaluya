<?php

namespace App\View\Components\Modal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    /**
     * Create a new component instance.
     */
    public $target;
    public $btn;
    public $judul;
    public $btnclass;
    
    public function __construct($target, $btn, $judul, $btnclass)
    {
        $this->target = $target;
        $this->btn = $btn;
        $this->judul = $judul;
        $this->btnclass = $btnclass;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal.modal');
    }
}
