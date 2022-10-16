<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PageIndex extends Component
{
    public $title;
    public $url;
    public $url2;
    public $edit;
    public $download;
    public $back;
    public $search;

    public function __construct($title=null,$url=null,$url2=null,$edit=null,$download=null,$back=null,$search=null)
    {
        $this->title = $title;
        $this->url = $url;
        $this->url2 = $url2;
        $this->edit = $edit;
        $this->download = $download;
        $this->back = $back;
        $this->search = $search;
    }

    public function render()
    {
        return view('components.page-index');
    }
}
