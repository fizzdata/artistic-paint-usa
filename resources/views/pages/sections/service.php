   <!-- start service area -->
   <section class="home1 service p-120" id="services">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                    <div class="section-title wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1s" style="visibility: hidden; animation-duration: 1s; animation-delay: 0.3s; animation-name: none;">
                        <h2>service we're offering</h2>
                        <!-- <p>artistic Paint offers a wide range of commercial painting services to both existing and new customers. All the information you need has been provided below.</p> -->
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row justify-content-center">

                    <?php foreach ($services as $service):?>
                        <div class="col-lg-4 col-md-6" style="padding: 2px">
                            <div class="single bg-show wow fadeInRight" data-img="<?php echo $service['img_url']?>" data-wow-delay="0.3s" data-wow-duration="1s" style="background: url(&quot;<?php echo $service['img_url']?>&quot;) center center / cover no-repeat; visibility: hidden; animation-duration: 1s; animation-delay: 0.3s; animation-name: none;">
                                
                                <div class="overlay">
                                    
                                    <h4><?php echo $service['name']?></h4>
                                    <p><?php echo $service['description']?></p>
                                
                                </div>
                                <h3 style="text-align: center; color: white; background: black; display: block; padding: 5px;"> <?php echo $service['name']?></h3>
                            </div>
                        </div>
                        <?php endforeach;?>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end service area -->