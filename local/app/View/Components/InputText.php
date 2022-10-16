<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InputText extends Component
{
    public $type;
    public $class;
    public $name;
    public $id;
    public $value;
    public $readonly;
    public $onclick;

    public function __construct($type = null, $class = null, $name = null, $id = null, $value = null, $readonly = null, $onclick = null)
    {
        $this->type = $type;
        $this->class = $class;
        $this->name = $name;
        $this->id = $id;
        $this->value = $value;
        $this->readonly = $readonly;
        $this->onclick = $onclick;
    }

    public function render()
    {
        return view('components.input-text');
    }
}
