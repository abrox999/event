<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Eventz N Trendz</title>
  <!-- FAVICON AND TOUCH ICONS -->
  <link rel="shortcut icon" href="Assets/favicon/favicon.ico" type="image/x-icon" />
  <link rel="icon" href="Assets/favicon/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" href="Assets/favicon/apple-touch-icon.png" />
  <link rel="apple-touch-icon" sizes="57x57" href="Assets/favicon/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon" sizes="72x72" href="Assets/favicon/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon" sizes="76x76" href="Assets/favicon/apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon" sizes="114x114" href="Assets/favicon/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon" sizes="120x120" href="Assets/favicon/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon" sizes="144x144" href="Assets/favicon/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon" sizes="152x152" href="Assets/favicon/apple-touch-icon-152x152.png" />
  <link rel="apple-touch-icon" sizes="180x180" href="Assets/favicon/apple-touch-icon-180x180.png" />
  <!-- LINKS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <!-- ... Your existing code ... -->

<body>

</body>

</html>

<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<style>
  .image-overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.85);
    z-index: 9999;
  }

  .overlay-content {
    position: relative;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    max-width: 100%;
  }

  .close-overlay {
    position: absolute;
    top: 0;
    right: 15px;
    font-size: 30px;
    color: white;
    cursor: pointer;
    z-index: 10;
  }

  .slider-wrapper {
    display: flex;
    align-items: center;
    justify-content: space-between;
    height: 100vh;
  }

  .slider {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 95%;
    overflow: hidden;
  }

  .slider img {
    max-width: 100%;
    border-radius: 3px;
  }

  .prev-button,
  .next-button {
    background: none;
    border: none;
    font-size: 40px;
    color: white;
    cursor: pointer;
    padding: 0;
  }



  @media (max-width:550px) {
    .slider-wrapper {
      justify-content: center;
    }

    .prev-button,
    .next-button {
      display: none;
    }

    .overlay-content {
      max-width: 95%;
    }
  }
</style>
</head>

<body>

  <nav class="nav">
    <input type="checkbox" id="nav-check" />
    <div class="nav-header">
      <div class="nav-title">
        <img src="Assets/company_logo/logo.jpg" alt="company-logo" />
      </div>
    </div>
    <div class="nav-btn">
      <label for="nav-check" class="hamburger" id="hamburger-1">
        <span class="line"></span>
        <span class="line"></span>
        <span class="line"></span>
      </label>
    </div>

    <div class="nav-links">
      <a href="index.html">Home</a>
      <a href="about.html">About</a>
      <a href="service.html">Services</a>
      <a href="galleries.php" class="active">Gallery</a>
      <a href="contact.html">Contact</a>
    </div>

    <div class="nav-socials">
      <a href="http://www.facebook.com/eventzntrendz"><iconify-icon icon="ic:baseline-facebook"></iconify-icon>
      </a>
      <a href="https://www.instagram.com/eventzntrendz/"><iconify-icon icon="ph:instagram-logo-bold"></iconify-icon>
      </a>
      <a href="https://www.tiktok.com/@eventzntrendz"><iconify-icon icon="ic:baseline-tiktok"></iconify-icon>
      </a>
      <a href="https://twitter.com/EventzNTrendz"><iconify-icon icon="mdi:twitter"></iconify-icon>
      </a>
      <a href="https://www.pinterest.com/eventzntrendz/"><iconify-icon icon="ri:pinterest-fill"></iconify-icon>
      </a>
      <a href="https://www.youtube.com/c/EventzNTrendzUzmaanGhouse"><iconify-icon icon="mdi:youtube"></iconify-icon>
      </a>
    </div>
  </nav>

  <!-- section 11 -->

  <section id="section-11">
    <div class="container">

      <?php
      if (isset($_GET['g']) && isset($_GET['type']) && is_dir('Assets/gallery/' . $_GET['type'] . '/' . $_GET['g'])) {
        $galleryPath = 'Assets/gallery/' . $_GET['type'] . '/' . $_GET['g'];

        $images = glob($galleryPath . '/images/*.*');
        $t = file($galleryPath . '/Title.txt');
        $title = htmlentities($t[0]);

        $r = file_exists($galleryPath . '/Review.txt') ? file($galleryPath . '/Review.txt') : '';
        $review = !empty($r) ? nl2br(htmlentities(implode("", $r))) : '';


        $v = file_exists($galleryPath . '/Video.txt') ? file($galleryPath . '/Video.txt') : '';
        $videoLink = !empty($v) ? htmlentities($v[0]) : '';

      ?>
        <?php
        echo '<p class="title">' . $title . '</p>';
        ?>
        <div class="gallery">
          <div class="gallery_left" style=" <?php echo !empty($review) ? 'width: 75%;' : 'width: 100%;'; ?>">

            <?php
            foreach ($images as $filename) {
              echo '<div class="each_item">
              <div class="image-wrapper">
                <img src="' . $filename . '" alt="" loading="lazy"/>
              </div>
            </div>';
            }
            ?>
          </div>

          <?php
          if (!empty($review) || !empty($videoLink)) {
            echo '
    <div class="gallery_right">
      ';

            if (!empty($review)) {
              echo '
        <span class="gallery_topic">Review:</span>
        <p>' . $review . '</p>
        ';
            }

            if (!empty($videoLink)) {
              echo '
        <span class="gallery_topic">Video:</span>
        ' . html_entity_decode($videoLink) . '
        ';
            }


            echo '
    </div>';
          }
          ?>
        </div>

      <?php

      }
      ?>


      <!-- <iframe  src="' . $videoLink . '"></iframe> -->

    </div>

  </section>
  <!-- end of section 11 -->


  <div id="image-overlay" class="image-overlay">
    <span class="close-overlay">&times;</span>

    <div class="overlay-content">

      <div class="slider-wrapper">

        <iconify-icon class="prev-button" onclick="showPreviousImage()" icon="icon-park-outline:left"></iconify-icon>



        <div class="slider">
          <!-- Slide content will be added here -->
        </div>
        <iconify-icon class="next-button" onclick="showNextImage()" icon="icon-park-outline:right"></iconify-icon>

      </div>
    </div>
  </div>


  <!-- footer -->
  <footer>
    <div class="container">
      <div class="footer-content">
        <div class="footer-left col-md-12">
          <a href="index.html">Home</a>
          <a href="about.html">About</a>
          <a href="service.html">Services</a>
          <a href="galleries.php" class="active">Gallery</a>
          <a href="contact.html">Contact</a>
        </div>

        <div class="footer-mid col-md-12">
          <!-- <img src="Assets/company_logo/logo.jpg" alt="logo" /> -->
          <div class="footer-mid-icon">
            <a href="http://www.facebook.com/eventzntrendz"><iconify-icon icon="ic:baseline-facebook"></iconify-icon>
            </a>
            <a href="https://www.instagram.com/eventzntrendz/"><iconify-icon icon="ph:instagram-logo-bold"></iconify-icon>
            </a>
            <a href="https://www.tiktok.com/@eventzntrendz"><iconify-icon icon="ic:baseline-tiktok"></iconify-icon>
            </a>
            <a href="https://twitter.com/EventzNTrendz"><iconify-icon icon="mdi:twitter"></iconify-icon>
            </a>
            <a href="https://www.pinterest.com/eventzntrendz/"><iconify-icon icon="ri:pinterest-fill"></iconify-icon>
            </a>
            <a href="https://www.youtube.com/c/EventzNTrendzUzmaanGhouse"><iconify-icon icon="mdi:youtube"></iconify-icon>
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- end of footer -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="JS/custom.js"></script>


  <script>
    const images = document.querySelectorAll(".each_item img");
    const imageOverlay = document.getElementById("image-overlay");
    const slider = document.querySelector(".slider");
    const closeOverlay = document.querySelector(".close-overlay");
    let currentIndex = 0;
    let touchStartX = 0;
    let touchEndX = 0;

    images.forEach((image, index) => {
      image.addEventListener("click", () => {
        imageOverlay.style.display = "block";
        currentIndex = index;
        updateSlider();
      });
    });

    closeOverlay.addEventListener("click", () => {
      imageOverlay.style.display = "none";
    });

    function updateSlider() {
      slider.innerHTML = '';
      images.forEach((img, index) => {
        const clone = img.cloneNode();
        if (index === currentIndex) {
          clone.style.display = 'block';
        } else {
          clone.style.display = 'none';
        }
        slider.appendChild(clone);
      });
    }

    function showNextImage() {
      currentIndex = (currentIndex + 1) % images.length;
      updateSlider();
    }

    function showPreviousImage() {
      currentIndex = (currentIndex - 1 + images.length) % images.length;
      updateSlider();
    }

    document.addEventListener("touchstart", (event) => {
      touchStartX = event.touches[0].clientX;
    });

    document.addEventListener("touchend", (event) => {
      touchEndX = event.changedTouches[0].clientX;
      handleSwipe();
    });

    function handleSwipe() {
      const threshold = 50; // Minimum distance to detect a swipe

      if (touchEndX < touchStartX - threshold) {
        // Swipe left
        showNextImage();
      } else if (touchEndX > touchStartX + threshold) {
        // Swipe right
        showPreviousImage();
      }
    }

    // Enable keyboard navigation
    window.addEventListener("keydown", (event) => {
      if (imageOverlay.style.display === "block") {
        if (event.key === "ArrowRight") {
          showNextImage();
        } else if (event.key === "ArrowLeft") {
          showPreviousImage();
        }
      }
    });
  </script>
</body>

</html>