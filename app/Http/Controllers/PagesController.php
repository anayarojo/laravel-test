<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function Home(){
        $links = [
            "https://laravel.com/docs" => "Documentation",
            "https://laracasts.com" => "Laracasts",
            "https://laravel-news.com" => "News",
            "https://forge.laravel.coms" => "Forge",
            "https://github.com/laravel/laravel" => "GitHub",
            "\About" => "About",
        ];
    
        return view('welcome', [
            "links" => $links,
            "job_title" => "Ingeniero de Software"
        ]);
    }

    public function About(){
        return view("about");
    }
}
