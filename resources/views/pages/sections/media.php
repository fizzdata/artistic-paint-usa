<section class="home1 team p-120">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                <div class="section-title wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1s">
                    <h2>Media</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="slider">
                    <div class="slides">
                        <?php foreach ($media as $m): ?>
                            <div class="slide-item">
                                <div class="item wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1s">

                                <div class="image">

                                <?php if ($m['type'] == 'video'):?>
                                        <video controls><source src="<?php echo $m["src"]; ?>" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>';
                                    <?php elseif ($m['type'] == 'img'): ?>
                                                                
                                            <img src="<?php echo $m['src']; ?>" alt="<?php echo $m['title']; ?>">
                                    <?php endif ?>
                                    </div> <!--end .image -->

                                    <div class="content">
                                        <a>
                                            <h5><?php echo $m['title']; ?></h5>
                                        </a>
                                        <p><?php echo $m['description']; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
