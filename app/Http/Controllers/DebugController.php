<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DebugController extends Controller
{
    public function debug(){
        $data = DB::table('media')->get();
        return $data;
    }

    public function delete_project(Request $request){
        $delete1 = DB::table('projects')
        ->where('id', $request->project_id)
        ->delete();

        $delete2 = DB::table('inside_images')
        ->where('project_id', $request->project_id)
        ->delete();
if ($delete1 && $delete2):
        return "deleted Project ID " . $request->project_id;
else:
    return "NOT deleted Project ID " . $request->project_id;
endif;

    }

    public function delete_media(Request $request){
        $delete = DB::table('media')
        ->where('id', $request->media_id)
        ->delete();

if($delete):
        return "deleted Media ID " . $request->media_id;
else:
    return "NOT deleted Media ID " . $request->media_id;
endif;

    }
}
