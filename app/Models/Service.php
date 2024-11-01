<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    static function data(){
        $services = [

            [
                'name' => 'Taping',
                'img_url' => 'assets/img/service/taping.JPG',
                'description' => 'We offer high-quality, genuine taping solutions and expert drywall finishing. In addition, we provide reliable texturing services. All of these premium offerings are available at very competitive prices, guaranteeing excellent value for our clients.'
            ],
            [
                'name' => 'Kadex',
                'img_url' => 'assets/img/service/kadex.jpg',
                'description' => 'Kadex is a vinyl-based coating specifically designed for the underside of concrete slabs. Ideal for both new builds and renovations, it hides existing concrete and smooths out imperfections, creating a surface that\'s ready for painting once it dries. Kadex can be tailored to your preferences, available in various colors or left neutral.'
            ],
            [
                'name' => 'Faux Finishes',
                'img_url' => 'assets/img/service/Faux-Finishes.JPG',
                'description' => 'Our talented, professionally trained painters employ the right tools and a steady hand to infuse an artistic flair into your interior. We can bring any design to life, transforming your space to align with your vision. This is why we’re the leading choice for texture and faux painting in the Tri-State area.'
            ],
            [
                'name' => 'Painting',
                'img_url' => 'assets/img/service/Painting.jpg',
                'description' => 'From careful planning to impeccable execution, our professional painters and stylists collaborate effortlessly on your home painting project to achieve the precise results you envision. With a strong focus on detail and commitment, we guarantee that every aspect of your project fulfills your highest standards.'
            ],
            [
                'name' => 'Vanetian Plaster',
                'img_url' => 'assets/img/service/Vanetian-Plaster.JPG',
                'description' => 'Venetian Plaster is made from limestone rocks that are heated with water and combined with natural colorants such as ground marble dust. Different techniques and organic pigments are used to create unique designs and textures. These textured layers and vibrant colors contribute to the elegant, regal look of Venetian plaster.'
            ],
            [
                'name' => 'Wallpaper Hanging',
                'img_url' => 'assets/img/service/Wallpaper.WEBP',
                'description' => 'Our team possesses the expertise, tools, and products needed for both wallpaper and vinyl wallcovering installation, as well as the removal of old wallpaper. We also prepare the surface for new residential or commercial wallpaper.'
            ],
            [
                'name' => 'Intumescent Painting',
                'img_url' => 'assets/img/service/Intumescent-Painting.JPG',
                'description' => 'Intumescent paint is commonly used to protect steel from fire, functioning as an insulator that creates a protective char when heated. At Artistic Paint USA, our highly trained experts ensure the correct application of these coatings. With strict safety measures and protocols for protecting property and job sites, we guarantee exceptional results.'
            ],
            [
                'name' => 'Epoxy Paint',
                'img_url' => 'assets/img/service/Epoxy.jpg',
                'description' => 'Applying and repairing epoxy floor coatings in commercial buildings demands skill and expertise for lasting durability. At Artistic Paint USA, our floor coating specialists will carefully plan and execute your commercial epoxy flooring project to guarantee a successful result.'
            ]
            ];

            return $services;
    }
}
