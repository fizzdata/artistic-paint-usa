<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MediaController extends Controller
{
    public function user_index(){
        return Inertia::render('Media', [
         
      ]);
      }

      public function load(){
        $project_detail = DB::table('media')->select('id', 'title', 'description')->get();
    
        if($project_detail):
          return response()->json(['success' => true, 'projects' => $project_detail]);
        else:
          return response()->json(['success' => true, 'projects' => $project_detail]);
        endif;
    
      }
    
      public function user_upload(Request $request){
    
        //dd($request);
        $filesData = json_decode($request->getContent(), true);
    //dd($filesData);
    if ($filesData[1]['videoSrc']):
        $video = DB::table('media')
          ->insert([
            'type' => 'video',
            'src' => $filesData[1]['videoSrc'],
            'title' => $filesData[0]['title'],
            'description' => $filesData[0]['description']
    
          ]);

        endif;
    
        //Initiate $Img
         $img = false;

        foreach($filesData[2]['pictures'] as $img):
    
          $img = DB::table('media')
            ->insert([
              'type' => 'img',
              'src' => $img,
              'title' => $filesData[0]['title'],
            'description' => $filesData[0]['description']
      
            ]);
        endforeach;
    
    
           if($img || $video):
    
            return response()->json(['message' => 'File uploaded'], 200); 
    
           else:
            return response()->json(['message' => 'Uploading Felid'], 400); 
    
           endif;
      }
    
      
    
}
