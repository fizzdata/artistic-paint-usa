<!-- start banner area -->
<section class="home1 home2 banner" data-img="/assets/img/banner-2.jpg" style="background: url('<?php echo $banner_img;?>') center center / cover no-repeat;">
    <div class="overlay">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="col-lg-10 text-center">

                    <div style="padding:75% 0 0 0;position:relative;overflow: hidden;"><iframe id="videoFrame" src="<?= env('APP_URL')?>/assets/video/banner.mp4" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;background-color: transparent !important;transform: scale(1.5);transform-origin: center;" title="Compilation2"></iframe></div>


                </div>
            </div>
        </div>
    </div>
</section>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    var iframe = document.getElementById("videoFrame");
    var css = 'body:-webkit-full-page-media { background-color: transparent !important; }';
    var style = document.createElement('style');
    if (iframe.contentDocument) {
      style.type = 'text/css';
      if (style.styleSheet){
        style.styleSheet.cssText = css;
      } else {
        style.appendChild(document.createTextNode(css));
      }
      iframe.contentDocument.head.appendChild(style);
    } else {
      iframe.onload = function() {
        iframe.contentDocument.head.appendChild(style);
      }
    }
  });
</script>

<!-- end banner area -->
