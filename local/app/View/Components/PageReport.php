<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageReport extends Component
{
    public $title;
    public $url;
    public $back;
    public $form;
    public $path;
    public $image;

    public function __construct($title=null,$url=null,$back=null,$form=null,$path=null,$image=null)
    {
        $this->title = $title;
        $this->url = $url;
        $this->back = $back;
        $this->form = $form;
        $this->path = $path;
        $this->image = $image;
    }

    public function render()
    {
        return view('components.page-report');
    }
}
