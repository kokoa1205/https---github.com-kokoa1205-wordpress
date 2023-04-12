<!DOCTYPE html>
<html>

<head>
  <?php wp_enqueue_script("jquery");  ?>

  <?php wp_head(); ?>
  <?php wp_deregister_script('jquery');?>
  <?php if (is_single()): ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/single.css">
  <?php endif; ?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <div class="wrapper">
    <header>
      <div class="header">
        <div class="header-nav">
          <div class="col-md-3 text-center header-title h-100">
            <a href="<?php echo home_url() ?>">
              <img src="<?php echo get_theme_file_uri('img/grazia_logo_black_w_trans_2.png') ?>" alt="">
            </a>
          </div>
          <nav class="navbar col-md-6 h-100">
            <ul>
              <li><a class="current" href=”#”>HOME</a></li>
              <li><a href=”/nail>NAIL</a></li>
              <li><a href=”/massage>MASSAGE</a></li>
              <li><a href=”/news”>NEWS</a></li>
              <li><a href=”/price>PRICE</a></li>
              <li><a href=”/style>STYLE</a></li>
            </ul>
          </nav>
          <div class="reserve col-md-3 h-100 h-100">
            <div class="icon-box d-flex">
              <a href="" target="_blank" class="insta-icon"><img
                  src="<?php echo get_theme_file_uri('img/insta-icon.png') ?>" alt="インスタアイコン"></a>
              <a target="_blank" href="" style="margin-right: 10px;"><img
                  src="<?php echo get_theme_file_uri('img/line-icon3.png') ?>" alt="ラインアイコン"></a>
            </div>
            <div class="reserve-box">
              <a href="" target="_blank" class="reserve-btn">
                <span>RESEVE</span>
                <svg id="_icon-blank.svg" xmlns="http://www.w3.org/2000/svg" width="16.75" height="8.406"
                  viewBox="0 0 16.75 8.406">
                  <defs>
                    <style>
                    .cls-1 {
                      fill: #222;
                      fill-rule: evenodd;
                    }
                    </style>
                  </defs>
                  <path id="line" class="cls-1" d="M1083,80v1l-6,5h-5V85h5Z" transform="translate(-1072 -77.594)">
                  </path>
                  <path id="line-2" data-name="line" class="cls-1" d="M1083,80v1l-6,5h-5V85h5Z"
                    transform="translate(-1072 -77.594)"></path>
                  <path id="aroow" class="cls-1" d="M1079.3,77.943l9.45-.363-6.65,4.5Z"
                    transform="translate(-1072 -77.594)">
                  </path>
                </svg>
              </a>
            </div>
          </div>
          <input id="drawer_input" class="drawer_hidden" type="checkbox">
          <!-- ハンバーガーアイコン -->
          <label for="drawer_input" class="drawer_open"><span></span></label>
          <!-- メニュー -->
          <nav class="nav_content">
            <div>
              <ul class="nav_list">
                <li class="nav_item"><a class="current" href=”#”>HOME</a></li>
                <li class="nav_item"><a href=”/nail>NAIL</a></li>
                <li class="nav_item"><a href=”/massage>MASSAGE</a></li>
                <li class="nav_item"><a href=”/news”>NEWS</a></li>
                <li class="nav_item"><a href=”/price>PRICE</a></li>
                <li class="nav_item"><a href=”/style>STYLE</a></li>
              </ul>
            </div>
            <div class="nav-icon d-flex">
              <div class="d-flex nav-icon-items">
                <img src="<?php echo get_theme_file_uri('img/grazia_logo_black_w_trans_2.png') ?>">
                <a href="" target="_blank" class="insta-icon"><img
                    src="<?php echo get_theme_file_uri('img/insta-icon.png') ?>" alt="インスタアイコン" width="25"></a>
                <a target="_blank" href="" style="margin: 10px; 10px 0 0"><img
                    src="<?php echo get_theme_file_uri('img/line-icon3.png') ?>" alt="ラインアイコン" width="25"></a>
              </div>
              <div class="item">
                <div class="tel">
                  <p class="phone">Tel.<a href="">090-5601-8429</a></p>
                  <p class="icn">完全予約制</p>
                  <p class="time">
                    HAIR 9:00~18:00
                  </p>
                </div>
              </div>
            </div>
          </nav>

          <link rel="stylesheet" type="text/css"
            href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
          <link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP" rel="stylesheet">
          <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">



          <link rel="preconnect" href="https://fonts.googleapis.com">
          <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
          <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@0;1&display=swap" rel="stylesheet">
          <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">
          <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
          <link href="https://fonts.googleapis.com/css?family=Sawarabi+Mincho" rel="stylesheet">

          <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" rel="stylesheet"
            type="text/css">
          <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" rel="stylesheet"
            type="text/css">
          <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" type="text/javascript">
          </script>
    </header>