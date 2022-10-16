<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ColumnFile extends Component
{
    public $path;
    public $file;

    public function __construct($path=null,$file=null)
    {
        $this->path = $path;
        $this->file = $file;
    }

    public function render()
    {
        $data["file"] = "$this->path$this->file";
        return view('components.column-file',$data);
    }
}
