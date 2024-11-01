<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Feature;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        //dd(Project::all());
        return view('pages.index', [
            'banner_title' => 'Professional painting services in Tri State area',
            'banner_img' => '/assets/img/home-page-v3.jpg',
            'features' => Feature::data(),
            'services' => Service::data(),
            'projects' => Project::all(),
            'media' => Media::orderBy('id', 'desc')->get()
            ]);
    }

    public function under_construction(){
        return view('pages.under_construction');
    }
}

