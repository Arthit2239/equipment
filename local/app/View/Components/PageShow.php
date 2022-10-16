<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageShow extends Component
{
    public $title;
    public $create;
    public $url;
    public $back;
    public $form;
    public $path;
    public $image;
    public $button_type;

    public function __construct($title=null,$create=null,$url=null,$back=null,$form=null,$path=null,$image=null,$button_type=null)
    {
        $this->title = $title;
        $this->create = $create;
        $this->url = $url;
        $this->back = $back;
        $this->form = $form;
        $this->path = $path;
        $this->image = $image;
        if(empty($url)){
            $this->button_type = "button";
        }else{
            $this->button_type = "submit";
        }
   }

   public function render()
   {
        return view('components.page-show');
   }
}
