<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function detail(Request $request){

      $project = Project::data($request->id);

      //dd($project);

        return view('pages.project', [
           
            'banner_title' => $project[0]['address'],
            'banner_img' => $project[0]['outside_img'],
            'project' => $project,
            ]);
    }
}
