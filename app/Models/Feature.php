<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    static function data(){
        $features = [

            [
                'icon' => '/assets/img/features/color.svg',
                'title' => 'Expert Color Consultation',
                'description' => 'Our team provides personalized color consultations and custom design services to bring your vision to reality. Whether you seek a bold transformation or subtle touches, we offer expert advice to ensure your space perfectly embodies your unique style.'
            ],
        
            [
                'title' => 'Premium Materials',
                'icon' => '/assets/img/features/materials.svg',
                'description' => 'We use top-quality paints and materials to deliver flawless, durable finishes. Whether you prefer eco-friendly solutions or luxurious textures, our premium products guarantee a timeless result with an elegant touch'
            ],
        
            [
                'title' => 'Attention To Detail',
                'icon' => '/assets/img/features/detail.svg',
                'description' => 'Our expert painters are renowned for their keen attention to detail and precision. We take pride in achieving crisp lines, seamless surfaces, and flawless finishes, ensuring every element of your project meets the highest standards.'
            ],
        
            [
                'title' => 'Timely And Professional',
                'icon' => '/assets/img/features/timely.svg',
                'description' => 'At Artistic Paint, we focus on efficiency and professionalism. Our team is committed to finishing projects on schedule with minimal disruption to your daily routine, providing a seamless and stress-free experience from beginning to end.'
            ],
            
        ];

        return $features;
    }
}
