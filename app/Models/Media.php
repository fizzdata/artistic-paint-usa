<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    static function data(){
        $media = [

 
            [ 
                'type' => 'img',
                'src' => 'https://via.placeholder.com/200x200?text=Image+Placeholder',
                'title' => 'two ',
                'description' => ''
            ],

            [ 
                'type' => 'video',
                'src' => 'https://drive.google.com/file/d/1JhEpoV90ly3-eT1Qu24j5N24PiUVjFY6/view',
                'title' => 'three',
                'description' => ''
            ],
            [ 
                'type' => 'img',
                'src' => 'https://via.placeholder.com/200x200?text=Image+Placeholder',
                'title' => 'two ',
                'description' => ''
            ],

            [ 
                'type' => 'video',
                'src' => '/assets/video/1 Lyon Pl.MOV',
                'title' => 'three',
                'description' => ''
            ],
            [ 
                'type' => 'img',
                'src' => 'https://via.placeholder.com/200x200?text=Image+Placeholder',
                'title' => 'two ',
                'description' => ''
            ],

            [ 
                'type' => 'video',
                'src' => 'https://storage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4',
                'title' => 'three',
                'description' => ''
            ],

            
        ];

        return $media;
    }
}
