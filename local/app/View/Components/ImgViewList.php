<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ImgViewList extends Component
{
    public $path;
    public $image;
    public $alt;
    public $class;
    public $width;
    public $height;
    public $style;
   
    public function __construct($path=null, $image=null,$alt=null,$class=null,$width=null,$height=null,$style=null)
    {
        $this->path = $path;
        $this->image = $image;
        $this->alt = $alt;
        $this->class = $class;
        $this->width = $width;
        $this->height = $height;
        $this->style = $style;
    }
    
    public function render()
    {
        $data["file"] = "$this->path$this->image";
        return view('components.img-view-list',$data);
    }
}
