<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = "Welcome to LSAPP";
        // return view('pages.index', compact('title')); 1st method
        return view('pages.index')->with('title', $title);
    }

    public function about() {
        $title = "About LSAPP";
        // return view('pages.about');
        return view('pages.about')->with('title', $title);
    }

    public function services() {
        $title = "Services";
        $data = array(
            'title' => 'Services',
            'services' => ['webdesign', 'programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }
}
