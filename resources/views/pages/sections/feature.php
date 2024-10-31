 <!-- start feature area -->
 <section class="home1 home2 feature">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row justify-content-center">
                        <?php foreach($features as $feature):?>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="item wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInUp;">
                                <div class="item-inner">
                                    <div class="front">
                                        <div class="inner">
                                            <div class="icon">
                                                <i class="flaticon-repair-tools"></i>
                                            </div>
                                            <h4><?php echo $feature['title'];?></h4>
                                            <p><?php echo $feature['description'];?></p>
                                        </div>
                                    </div>
                                    <div class="back">
                                        <div class="inner">
                                            <div class="icon">
                                                <i class="flaticon-repair-tools"></i>
                                            </div>
                                            <h4><?php echo $feature['title'];?></h4>
                                            <p><?php echo $feature['description'];?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end feature area -->