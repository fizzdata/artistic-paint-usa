<section class="home1 team p-120">
  <div class="container">
    <div class="row">
      <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
        <div class="section-title">
          <h2>Media</h2>
          <p>Dive into our video gallery and witness the artistry and precision that defines our painting projects. From conception to completion, see how we transform spaces with every brushstroke.</p>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="slider">
          <button class="prev">&#10094;</button>
          <div class="slides">
            <?php foreach ($media as $m): ?>
              <!-- <div class="content">
                  <h5><?= $m['title'] ?></h5>
                  <p><?= $m['description'] ?></p>
                </div> -->
              <div class="slide-item">
                <div class="item">
                  <?php if ($m['type'] == 'video'): ?>
                    <div class="video-wrapper">
                      <iframe height="600" width="600" src="<?= $m['src'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                  <?php elseif ($m['type'] == 'img'): ?>
                    <div class="image">
                      <img src="<?= $m['src'] ?>" height="600" width="600" alt="<?= $m['title'] ?>">
                    </div>
                  <?php endif; ?>
                </div>
                
              </div>
            <?php endforeach; ?>
          </div>
          <button class="next">&#10095;</button>
        </div>
      </div>
    </div>
  </div>
</section>


  <script>
document.addEventListener('DOMContentLoaded', () => {
  const slides = document.querySelector('.slides');
  const slideItems = document.querySelectorAll('.slide-item');
  const prevButton = document.querySelector('.prev');
  const nextButton = document.querySelector('.next');
  let currentSlide = 0;

  function showSlide(index) {
    if (index >= slideItems.length) {
      currentSlide = 0;
    } else if (index < 0) {
      currentSlide = slideItems.length - 1;
    } else {
      currentSlide = index;
    }
    slides.style.transform = `translateX(-${currentSlide * 100}%)`;
  }

  prevButton.addEventListener('click', () => showSlide(currentSlide - 1));
  nextButton.addEventListener('click', () => showSlide(currentSlide + 1));
});

  </script>
