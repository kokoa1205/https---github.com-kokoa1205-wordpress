<?php

// news用の投稿を取得
$args = array(
    'posts_per_page'   => 4,
    'orderby'          => 'date',
    'order'            => 'DESC',
    'post_type'        => 'post',
    'post_status'      => 'publish',
    'suppress_filters' => true
);
$news_posts = get_posts($args);

// style用の投稿を取得
$args = array(
    'posts_per_page'   => 6,
    'orderby'          => 'date',
    'order'            => 'DESC',
    'post_type'        => 'style',
    'post_status'      => 'publish',
    'suppress_filters' => true
);
$style_posts = get_posts($args);
?>


<?php get_header(); ?>
<div class="blur-wrapper">
  <div class="first-view">
    <img class="image" src="<?php echo get_theme_file_uri('img/LINE_ALBUM_221003_3.jpg') ?>" alt="">
    <img class="image" src="<?php echo get_theme_file_uri('img/S__28049410 (1).jpg');?>" alt="">
    <img class="image" src="<?php echo get_theme_file_uri('img/S__28049410.jpg') ?>" alt="">
  </div>
  <div class="nail-wrapper">
    <div class="nail row">
      <div class="col-5 h-100">
        <div class="nail-img h-100">
          <img src="<?php echo get_theme_file_uri('img/LINE_ALBUM_221003_1.jpg');?>" alt="">
        </div>
      </div>
      <div class="col-7 h-100">
        <div class="nail-contents fadeUpTrigger">
          <div class="nail-content h-100">
            <div class="nail-title-box row">
              <div class="title-number col-auto">
                01
              </div>
              <div class="nail-title">
                <p>ネイル</p>
                <h1><span>01</span>NAIL</h1>
              </div>
            </div>
            <p class="nail-explain">
              当店のネイルは、トレンドを取り入れたデザインとプロの技術で、指先を美しく演出します。豪華なジェルネイルや自然なカラーコーディネートなど、お客様のご希望に合わせた多彩なデザインをご用意しています。
            </p>
            <p class="nail-explain">
              また、爪のカットや形整え、ハンドマッサージなどの丁寧なケアも行い、ネイルケアをトータルで提供しています。プロの技術と高品質のアイテムを使用し、耐久性にも優れていますので、長持ち美爪を実現。リラックスしながらのネイルタイムをお楽しみいただけます。
            </p>
          </div>
          <div class="nail-view">
            <button data-hover="click me" class="view-more" onclick="location.href='nail'">
              <div>View More</div>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="dance-wrapper">
    <div class="dance row fadeUpTrigger">
      <div class="col-7">
        <div class="dance-contents">
          <div class="dance-content">
            <div class="dance-title-box row">
              <div class="title-number col-auto">
                02
              </div>
              <div class="dance-title">
                <p>ダンス</p>
                <h1><span>02</span>DANCE</h1>
              </div>
            </div>
            <p class="dance-explain">
              リラックスして心身を癒す至福の時間を提供するマッサージをご体験ください。厳選された高品質のオイルやローションを使用し、プロの技術で丁寧に施術いたします。
            </p>
            <p class="dance-explain">
              各種のマッサージメニューをご用意しており、ストレス解消や筋肉の緊張緩和、リフレッシュを目的としたオリジナルのコースもございます。また、お客様の体調やお悩みに合わせたカスタマイズも可能です。心地よい空間でのリラックスタイムをお楽しみいただけます。
            </p>
          </div>
          <div class="dance-view">
            <button data-hover="click me" class="view-more" onclick="location.href='dance'">
              <div>View More</div>
            </button>
          </div>
        </div>
      </div>
      <div class="col-5 h-100">
        <div class="dance-img">
          <img src="<?php echo get_theme_file_uri('img/LINE_ALBUM_221003_4.jpg');?>" alt="">
        </div>
      </div>
    </div>
  </div>

  <div class="price blurTrigger">
    <div class="price-title-box row">
      <div class="title-number col-auto">
        03
      </div>
      <div class="price-title">
        <p>プライス</p>
        <h1><span>03</span>PRICE</h1>
      </div>
    </div>
    <div class="row list-contents">
      <div class="col-md-3 list-title fadeUpTrigger">
        <p>PARM</p>
      </div>
      <div class="col-md-9 list-content">
        <ul class="price-list">
          <li>
            <div class="fadeUpTrigger">
              <span class="list-name">カット</span><span class="list-price">¥5,000</span>
            </div>
          </li>
          <li>
            <div class="fadeUpTrigger">
              <span class="list-name">カット</span><span class="list-price">¥5,000</span>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="row list-contents">
      <div class="col-md-3 list-title fadeUpTrigger">
        <p>COLOR</p>
      </div>
      <div class="col-md-9 list-content">
        <ul class="price-list">
          <li>
            <div class="fadeUpTrigger">
              <span class="list-name">カット</span><span class="list-price">¥5,000</span>
            </div>
          </li>
          <li>
            <div class="fadeUpTrigger">
              <span class="list-name">カット</span><span class="list-price">¥5,000</span>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="row list-contents">
      <div class="col-md-3 list-title fadeUpTrigger">
        <p>CUT</p>
      </div>
      <div class="col-md-9 list-content">
        <ul class="price-list">
          <li>
            <div class="fadeUpTrigger">
              <span class="list-name">カット</span><span class="list-price">¥5,000</span>
            </div>
          </li>
          <li>
            <div class="fadeUpTrigger">
              <span class="list-name">カット</span><span class="list-price">¥5,000</span>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="row list-contents">
      <div class="col-md-3 list-title fadeUpTrigger">
        <p>CUT</p>
      </div>
      <div class="col-md-9 list-content">
        <ul class="price-list">
          <li>
            <div class="fadeUpTrigger">
              <span class="list-name">カット</span><span class="list-price">¥5,000</span>
            </div>
          </li>
          <li>
            <div class="fadeUpTrigger">
              <span class="list-name">カット</span><span class="list-price">¥5,000</span>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="style-view">
      <button data-hover="click me" class="view-more" onclick="location.href='style'">
        <div>View More</div>
      </button>
    </div>
  </div>

  <div class="row">
    <div class="calendar col-6">
      <div class="calendar-title-box row">
        <div class="title-number col-auto">
          04
        </div>
        <div class="calendar-title">
          <p>カレンダー</p>
          <h1><span>04</span>CALENDAR</h1>
        </div>
      </div>

      <h1 id="header"></h1>

      <!-- ボタンクリックで月移動 -->
      <div id="next-prev-button">
        <button id="prev" onclick="prev()">‹</button>
        <button id="next" onclick="next()">›</button>
      </div>

      <!-- カレンダー -->
      <div id="calendar"></div>
    </div>

    <!-- news -->
    <div class="news col-6">
      <div class="news-title-box row">
        <div class="title-number col-auto">
          05
        </div>
        <div class="news-title">
          <p>ニュース</p>
          <h1><span>05</span>NEWS</h1>
        </div>
      </div>
      <div class="news-contents">
        <?php foreach($news_posts as $post): ?>
        <div class="news-content row">
          <span class="post-date col-4">
            <?php echo substr($post->post_date, 0, strcspn($post->post_date, ' ')); ?>
          </span>
          <a href="<?php echo get_permalink($post->ID) ?>" class="post-title word_limit col-8">
            <?php echo $post->post_title ?>
          </a>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="news-view">
        <button data-hover="click me" class="view-more" onclick="location.href='news'">
          <div>View More</div>
        </button>
      </div>
    </div>
  </div>

  <div class="background-style">
    <div class="style">
      <div class="style-title-box row">
        <div class="title-number col-auto">
          06
        </div>
        <div class="style-title">
          <p>スタイル</p>
          <h1><span>06</span>STYLE</h1>
        </div>
      </div>

      <div class="section">
        <div class="sliderArea">
          <div class="style-slider slider">
            <?php foreach ($style_posts as $post): ?>
            <!-- <div> -->
            <a>
              <img
                src="<?php echo wp_get_attachment_image_src(get_post_meta($post->ID, 'style_img', true), 'full')[0];?>"
                alt="test">
            </a>

            <!-- </div> -->
            <?php endforeach; ?>

          </div>
        </div>
        <div class="style-view">
          <button data-hover="click me" class="view-more" onclick="location.href='style'">
            <div>View More</div>
          </button>
        </div>
      </div>
    </div>
  </div>


</div>
<?php get_footer(); ?>