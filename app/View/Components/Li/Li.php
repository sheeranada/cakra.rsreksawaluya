<?php

namespace App\View\Components\Li;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Li extends Component
{
    /**
     * Create a new component instance.
     */
    public $link;
    public $onclick;
    public $icon;
    // public $dropdown;
    public $label;

    public function __construct($link, $onclick, $icon, $label)
    {
        $this->link = $link;
        $this->onclick = $onclick;
        $this->icon = $icon;
        // $this->icon = $dropdown;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.li.li');
    }
}
