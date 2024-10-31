<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    static function data($pid = 0){
        $projects = [

            [
                'id' => 1,
                'address' => '1 Lyon Pl, White Plains, NY 10601',
                'outside_transparent_img' => '/assets/img/projects/1 Lyon/1 Lions .png',
                'outside_img' => '/assets/img/projects/1 Lyon/IMG_1627 2.JPG',
                'units' => 460,
                'type' => 'com', //Commercial
                'images' => [
                    '/assets/img/projects/1 Lyon/IMG_1616.JPG',
                    '/assets/img/projects/1 Lyon/IMG_1619.JPG',
                    '/assets/img/projects/1 Lyon/IMG_1621.JPG',
                    '/assets/img/projects/1 Lyon/IMG_1623.JPG',
                    '/assets/img/projects/1 Lyon/IMG_1626.JPG',

                ]
            ],

            [
                'id' => 2,
                'address' => '77 Commercial St Brooklyn NY 11222',
                'outside_transparent_img' => '/assets/img/projects/77 Commercial/IMG_0736.png',
                'outside_img' => '/assets/img/projects/77 Commercial/IMG_0736.JPG',
                'units' => 460,
                'type' => 'com', //Commercial
                'images' => [
                    '/assets/img/projects/77 Commercial/IMG_0320.jpg',
                    '/assets/img/projects/77 Commercial/IMG_0323.jpg',
                    '/assets/img/projects/77 Commercial/IMG_0327.jpg',
                    '/assets/img/projects/77 Commercial/IMG_0330.jpg',
                    '/assets/img/projects/77 Commercial/IMG_0332.jpg',
                    '/assets/img/projects/77 Commercial/IMG_0337.jpg',
                    '/assets/img/projects/77 Commercial/IMG_0339.jpg',
                    '/assets/img/projects/77 Commercial/IMG_0341.jpg',

                ]
            ],

            [
                'id' => 3,
                'address' => '147-35 95th Ave Jamaica, NY  11435',
                'outside_transparent_img' => '/assets/img/projects/147-35 95th Avenue/147-35 95th Avenue.png',
                'outside_img' => '/assets/img/projects/147-35 95th Avenue/147-35 95th Avenue.JPG',
                'units' => 460,
                'type' => 'com', //Commercial
                'images' => [
                    '/assets/img/projects/147-35 95th Avenue/147-35 95th Avenue.JPG',
                    '/assets/img/projects/147-35 95th Avenue/147-35 95th Avenue.JPG',
                    '/assets/img/projects/147-35 95th Avenue/147-35 95th Avenue.JPG',
                ]
            ],

            [
                'id' => 4,
                'address' => '320 Linden Blvd Brooklyn, NY  11226',
                'outside_transparent_img' => '/assets/img/projects/320 Linden/320 Linden.png',
                'outside_img' => '/assets/img/projects/320 Linden/Image 3.PNG',
                'units' => 460,
                'type' => 'com', //Commercial
                'images' => [
                    '/assets/img/projects/320 Linden/IMG_0354.jpg',
                    '/assets/img/projects/320 Linden/IMG_0356.jpg',
                    '/assets/img/projects/320 Linden/IMG_0359.jpg',
                    '/assets/img/projects/320 Linden/IMG_0361.jpg',
                    '/assets/img/projects/320 Linden/IMG_0363.jpg',
                    '/assets/img/projects/320 Linden/IMG_0369.jpg',

                ]
            ],
            [
                'id' => 5,
                'address' => '6101 16th Ave Brooklyn NY 11204',
                'outside_transparent_img' => '/assets/img/projects/6101 16th Ave Brooklyn NY 11204/Image 31.png',
                'outside_img' => '/assets/img/projects/6101 16th Ave Brooklyn NY 11204/Image 3.PNG',
                'units' => 460,
                'type' => 'com', //Commercial
                'images' => [
                    '/assets/img/projects/6101 16th Ave Brooklyn NY 11204/IMG_9436.JPG',
                    '/assets/img/projects/6101 16th Ave Brooklyn NY 11204/IMG_9442.JPG',
                    '/assets/img/projects/6101 16th Ave Brooklyn NY 11204/IMG_9445.JPG',
                    '/assets/img/projects/6101 16th Ave Brooklyn NY 11204/IMG_9436.JPG',

                ]
            ], 
            
           
        ];

        if ($pid !== 0) {
            $projects = array_filter($projects, function ($item) use ($pid) {
                return $item['id'] == $pid;
            });
        }
            // array keys to be re-indexed
            $projects = array_values($projects);
        
        return $projects;
    }

   
    
    
   
}
