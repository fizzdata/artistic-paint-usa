

<div class="container mt-5">
    <div class="row">
      
      <div class="col-lg-12">
        <div class="row">
          <?php foreach($inside as $img):?>
          <div class=" mb-3">
            <img src="<?php echo $img->content;?>" class="small-picture">
          </div>
          <?php endforeach;?>
          
        </div>
      </div>
    </div>
  </div>