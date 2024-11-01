 <section class="home1 team p-120">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
          <div class="section-title">
            <h2>Media</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="slider">
            <div class="slides">
              <?php foreach ($media as $m): ?>
                <div class="slide-item">
                  <div class="item">
                    <?php if ($m['type'] == 'video'): ?>
                      <div class="video-wrapper">
                        <iframe style="pointer-events: auto;" height="600" width="600" src="<?= $m['src'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                      </div>
                    <?php elseif ($m['type'] == 'img'): ?>
                      <div class="image">
                        <img src="<?= $m['src'] ?>" height="600" width="600" alt="<?= $m['title'] ?>">
                      </div>
                    <?php endif; ?>
                  </div>
                  <div class="content">
                    <a>
                      <h5><?= $m['title'] ?></h5>
                    </a>
                    <p><?= $m['description'] ?></p>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    // Ensure clicks within video wrapper don't trigger slide action
    document.querySelectorAll('.video-wrapper').forEach(wrapper => {
      wrapper.addEventListener('click', (event) => {
        event.stopPropagation();
      });
    });

    const iframe = document.querySelector('iframe');

iframe.addEventListener('mouseenter', function() {
    // Disable slider's event handling
    slider.style.pointerEvents = 'none';
});

iframe.addEventListener('mouseleave', function() {
    // Re-enable slider's event handling
    slider.style.pointerEvents = 'auto';
});

  </script>
