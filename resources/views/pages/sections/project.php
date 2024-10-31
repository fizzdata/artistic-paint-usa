
    <!-- start project area -->
    <section id="work" class="home1 project pt-120 pb-90" data-img="assets/img/images/home2/project-bg.jpg" style="background: url(&quot;assets/img/images/home2/project-bg.jpg&quot;) center center / cover no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="section-title wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1s" style="visibility: hidden; animation-duration: 1s; animation-delay: 0.3s; animation-name: none;">
                        <h2>explore our project</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua saidul</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <ul class="project-menu d-flex justify-content-center wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1s" style="visibility: hidden; animation-duration: 1s; animation-delay: 0.3s; animation-name: none;">
                        <li class="active"><a href="/#!" data-mixitup-control="" data-filter="all" class="mixitup-control-active">all</a></li>
                        <li><a href="/#!" data-mixitup-control="" data-filter=".com">commercial</a></li>
                        <li><a href="/#!" data-mixitup-control="" data-filter=".res">residential</a></li>
                        <li><a href="/#!" data-mixitup-control="" data-filter=".more">More of our work</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
    <div class="row filters" id="MixItUp11799C">
        <?php foreach($projects as $project): ?>
            <div class="col-lg-4 col-md-6 mix ext <?php echo $project['type']; ?>">
                <div class="item wow fadeInRight" data-wow-delay="0.3s" data-wow-duration="1s" style="visibility: hidden; animation-duration: 1s; animation-delay: 0.3s; animation-name: none;">
                    <img src="<?php echo $project['outside_transparent_img']; ?>" alt="Project" >
                    <a href="/project/<?php echo $project['id']; ?>" class="1popup-image">
                    <div style="color: black; background-color:#e1605f; width:150px; padding:10px">
                    <img src="assets/img/projects/enlarge.svg" style="width: 50px">
                    <p style="color: black;"><?php echo $project['address']; ?></p>
                    <h5 style="color: black;" >See More</h5></div>
   
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- Additional static projects can go here if needed -->
       
    </div>
</div>

            </div>
        </div>
    </section>
    <!-- end project area -->