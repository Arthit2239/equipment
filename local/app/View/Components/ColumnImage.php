<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ColumnImage extends Component
{
    public $path;
    public $image;

    public function __construct($path=null,$image=null)
    {
        $this->path = $path;
        $this->image = $image;
    }

    public function render()
    {
        $data["file"] = trim("$this->path$this->image");
        return view('components.column-image',$data);
    }
}
