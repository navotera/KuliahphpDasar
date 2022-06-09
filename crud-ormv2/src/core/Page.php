<?php

namespace App\Core;

class Page
{
    public $title;

    public function setTitle($title)
    {
        $this->$title = $title;
    }


    public function getTitle($title)
    {
        return $this->title;
    }
}
