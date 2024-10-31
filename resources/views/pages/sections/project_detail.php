

<div class="container mt-5">
    <div class="row">
      <div class="col-lg-8">
        <h5>Artistic Paint USA successfully painted <?php echo $project[0]['address'];?> - a massive multi-family building with <?php echo $project[0]['units'];?> units utilizing the expertise and efficiency of 5 dedicated workers. This project stands as a testament to our commitment to quality and teamwork.<br><br><br>
        Over the course of 2 months, we transformed the building’s appearance, meticulously covering every inch with fresh, vibrant paint. This project showcases our efficiency, teamwork, and commitment to delivering high-quality results within tight deadlines. We take great pride in our work and the positive impact it has on the community.</h5>
        <img src="<?php echo $project[0]['outside_transparent_img'];?>" alt="Big Picture" class="big-picture">
      </div>
      <div class="col-lg-4">
        <div class="row">
          <?php foreach($project[0]['images'] as $img):?>
          <div class="col-12 mb-3">
            <img src="<?php echo $img;?>" class="small-picture">
            <p>Some descriptive text for img</p>
          </div>
          <?php endforeach;?>
          
        </div>
      </div>
    </div>
  </div>