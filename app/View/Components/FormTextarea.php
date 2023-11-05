<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormTextarea extends Component
{
    public $name;
    public $rows;
//    public $cols;
    public function __construct($name,$rows)
    {
        $this->name = $name;
        $this->rows = $rows;
//        $this->cols = $cols;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-textarea');
    }
}
