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

  <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</head>

<body>
  <nav class="nav">
    <input type="checkbox" id="nav-check" />
    <div class="nav-header">
      <div class="nav-title">
        <img src="Assets/company_logo/BlackLogo.png" alt="company-logo" />
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

  <!-- section 12 -->
  <section id="section-12">
    <div class="image-container img-set"></div>
    <div class="overlay img-set"></div>
  </section>
  <!-- end of section 12 -->


  <!-- section 10 -->
  <section id="section-10">
    <div class="container">
      <div class="gallery-tabs">
        <p>Galleries and Reviews</p>
        <div class="gallery-all">
          <div class="gallery-2tab">
            <button id="buttonActive" class="tab-button active" onclick="showGallery('weddings');updatePlaceholder('Weddings');">Weddings</button>
            <button id="buttonActive1" class="tab-button" onclick="showGallery('events');updatePlaceholder('Events');">Events</button>
          </div>

          <div class="search-container">
            <input type="text" id="searchInput" oninput="searchGallery()">

          </div>

        </div>

      </div>
      <div class="content" id="weddingsGallery">
        <?php
        $allowedFormats = ['jpg', 'jpeg', 'png']; // Add other formats as needed
        $galleries = glob('Assets/gallery/WEDDINGS/*', GLOB_ONLYDIR);

        // Sort the galleries based on their order in the filesystem
        usort($galleries, function ($a, $b) {
          return strnatcmp($b, $a);
        });
        if (count($galleries) > 0) {
          foreach ($galleries as $gallery) {
            $title = file_get_contents("$gallery/Title.txt");

            $imageFiles = glob("$gallery/THUMBNAIL.{" . implode(',', $allowedFormats) . "}", GLOB_BRACE);

            foreach ($imageFiles as $imageFile) {
              $imagePathInfo = pathinfo($imageFile);
              $imageExtension = strtolower($imagePathInfo['extension']);

              if (in_array($imageExtension, $allowedFormats)) {
                $encodedGallery = basename($gallery); // Get the base name of the directory
        ?>

                <div class="each_item">
                  <a href="gallery.php?type=WEDDINGS&g=<?php echo urlencode($encodedGallery); ?>">
                    <div class="image-wrapper">
                      <img src="<?php echo $imageFile; ?>" alt="" loading="lazy" />
                      <div class="overlay"><?php echo $title; ?> </div>
                    </div>
                  </a>
                </div>

        <?php
              }
            }
          }
        }
        ?>
      </div>

      <div class="content" id="eventsGallery" style="display: none;">
        <?php
        $allowedFormats = ['jpg', 'jpeg', 'png']; // Add other formats as needed
        $galleries = glob('Assets/gallery/EVENTS/*', GLOB_ONLYDIR);

        // Sort the galleries based on their order in the filesystem
        usort($galleries, function ($a, $b) {
          return strnatcmp($b, $a);
        });

        if (count($galleries) > 0) {
          foreach ($galleries as $gallery) {
            $title = file_get_contents("$gallery/Title.txt");

            $imageFiles = glob("$gallery/THUMBNAIL.{" . implode(',', $allowedFormats) . "}", GLOB_BRACE);

            foreach ($imageFiles as $imageFile) {
              $imagePathInfo = pathinfo($imageFile);
              $imageExtension = strtolower($imagePathInfo['extension']);

              if (in_array($imageExtension, $allowedFormats)) {
                $encodedGallery = basename($gallery); // Get the base name of the directory
        ?>

                <div class="each_item">
                  <a href="gallery.php?type=EVENTS&g=<?php echo urlencode($encodedGallery); ?>">
                    <div class="image-wrapper">
                      <img src="<?php echo $imageFile; ?>" alt="" loading="lazy" />

                      <div class="overlay"><?php echo $title; ?> </div>
                    </div>
                  </a>
                </div>

        <?php
              }
            }
          }
        }
        ?>
      </div>


    </div>
  </section>
  <!-- end of section 10 -->

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
          <!-- <img src="Assets/company_logo/BlackLogo.png" alt="logo" /> -->
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
  <script>
    // function searchGallery() {
    //   const searchInput = document.getElementById("searchInput").value.toLowerCase();
    //   const weddingGalleries = document.querySelectorAll("#weddingsGallery .each_item");
    //   const eventGalleries = document.querySelectorAll("#eventsGallery .each_item");

    //   // Loop through wedding galleries and check if the title contains the search input
    //   weddingGalleries.forEach(function(gallery) {
    //     const title = gallery.querySelector(".overlay").textContent.toLowerCase();
    //     if (title.includes(searchInput) || searchInput === "") {
    //       gallery.style.display = "block";
    //     } else {
    //       gallery.style.display = "none";
    //     }
    //   });

    //   // Loop through event galleries and check if the title contains the search input
    //   eventGalleries.forEach(function(gallery) {
    //     const title = gallery.querySelector(".overlay").textContent.toLowerCase();
    //     if (title.includes(searchInput) || searchInput === "") {
    //       gallery.style.display = "block";
    //     } else {
    //       gallery.style.display = "none";
    //     }
    //   });
    // }
    function updatePlaceholder(tabName) {
      const searchInput = document.getElementById("searchInput");
      if (tabName === "Weddings") {
        searchInput.placeholder = "Search all weddings";
      } else if (tabName === "Events") {
        searchInput.placeholder = "Search all events";
      }
    }

    function searchGallery() {
      const searchInput = document.getElementById("searchInput").value.toLowerCase();
      const weddingGalleries = document.querySelectorAll("#weddingsGallery .each_item");
      const eventGalleries = document.querySelectorAll("#eventsGallery .each_item");

      // Loop through wedding galleries and check if the title contains the search input
      weddingGalleries.forEach(function(gallery) {
        const title = gallery.querySelector(".overlay").textContent.toLowerCase();
        if (title.includes(searchInput) || searchInput === "") {
          gallery.style.display = "block";
        } else {
          gallery.style.display = "none";
        }
      });

      // Loop through event galleries and check if the title contains the search input
      eventGalleries.forEach(function(gallery) {
        const title = gallery.querySelector(".overlay").textContent.toLowerCase();
        if (title.includes(searchInput) || searchInput === "") {
          gallery.style.display = "block";
        } else {
          gallery.style.display = "none";
        }
      });
    }


    updatePlaceholder("Weddings");
  </script>
  <script>
    function showGallery(type) {
      const weddingsGallery = document.getElementById("weddingsGallery");
      const eventsGallery = document.getElementById("eventsGallery");
      const buttonActive = document.getElementById("buttonActive");
      const buttonActive1 = document.getElementById("buttonActive1");
      const searchInput = document.getElementById("searchInput");

      searchInput.value = "";
      if (type === "weddings") {
        weddingsGallery.style.display = "flex";
        eventsGallery.style.display = "none";
        buttonActive.classList.add("active");
        buttonActive1.classList.remove("active");
      } else if (type === "events") {
        weddingsGallery.style.display = "none";
        eventsGallery.style.display = "flex";
        buttonActive1.classList.add("active");
        buttonActive.classList.remove("active");

      }
      searchGallery();
    }
  </script>



  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="JS/custom.js"></script>
</body>

</html>