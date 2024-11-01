<?php

namespace App\Http\Controllers;

use App\Models\File;
use Inertia\Inertia;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{


  public function user_index(){
    return Inertia::render('Project', [
     
  ]);
  }
  public function user_upload(Request $request){

    //dd($request);
    $filesData = json_decode($request->getContent(), true);
//dd($filesData);

    $id = DB::table('projects')
      ->insertGetId([
        'address' => $filesData[0]['address'],
        'units' => $filesData[0]['units'],
        'type' => $filesData[0]['type'],
        'outsideTransparent' => $filesData[0]['outsideTransparent'],
        'outsideLifestyle' => $filesData[0]['outsideLifestyle'],

      ]);
    
    // $outsideTransparent = File::img_upload($request, 'outsideTransparent');
    // $outsideLifestyle = File::img_upload($request, 'outsideLifestyle');


    
    foreach($filesData[1]['inside'] as $img):

      DB::table('inside_images')
      ->insert([

        'project_id' => $id,
        'content' => $img

      ]);

    endforeach;


       if($id):

        return response()->json(['message' => 'File uploaded'], 200); 

       else:
        return response()->json(['message' => 'Uploading Felid'], 400); 

       endif;
  }

  
    public function detail(Request $request){

      $project = DB::table('projects')
      ->select()
      ->where('id', $request->id)
      ->get();

      $inside = DB::table('inside_images')
      ->select('content')
      ->where('project_id', $request->id)
      ->get();


     //dd($project, $inside);
    $banner_title = $project[0]->address . ' - ' . $project[0]->units . ' Units';


        return view('pages.project', [
           
            'banner_title' => $banner_title,
            'banner_img' => $project[0]->outsideLifestyle,
            'project' => $project,
            'inside' => $inside,
            ]);
    }
}
