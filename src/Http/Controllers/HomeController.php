<?php

namespace Framework\Http\Controllers;

class HomeController
{
    public function getHomepage(): string {
        return view('homepage', [
            'title' => 'Homepage'
        ]);
    }

    public function getAbout(): string {
        return view('about', [
            'title' => 'About Page'
        ]);
    }
}