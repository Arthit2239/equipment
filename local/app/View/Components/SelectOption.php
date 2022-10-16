<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectOption extends Component
{
    public $class;
    public $name;
    public $id;
    public $option;

    public function __construct($class=null,$name=null,$id=null,$option=null)
    {
        $this->class = $class;
        $this->name = $name;
        $this->id = $id;
        $this->option = $option;
    }

    public function render()
    {
        return view('components.select-option');
    }
}
