<?php

namespace App\View\Components\Inputan;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Inputan extends Component
{
    /**
     * Create a new component instance.
     */
    public $idfor;
    public $label;
    public $value;
    public $name;

    public function __construct($idfor, $label, $value, $name)
    {
        $this->idfor = $idfor;
        $this->label = $label;
        $this->value = $value;
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.inputan.inputan');
    }
}
