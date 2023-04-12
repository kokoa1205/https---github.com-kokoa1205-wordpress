<?php get_header(); ?>
 <div class="first-view">
    <img class="image" src="<?php echo get_theme_file_uri('img/LINE_ALBUM_221003_3.jpg') ?>" alt="">
    <img class="image" src="<?php echo get_theme_file_uri('img/S__28049410 (1).jpg');?>" alt="">
    <img class="image" src="<?php echo get_theme_file_uri('img/S__28049410.jpg') ?>" alt="">
  </div>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

   <div class="" id="news">
<div class="bodywrap" style="filter: brightness(1); opacity: 1;">
		<section class="newsCon detail c-inr">
			<div class="newsCon__detail">
				<div class="article">
					<div class="info">
						<span class="date"><?php the_date(); ?></span>
            <div class="cate">
              <?php the_tags(); ?>
            </div>
					</div>
					<h3 class="maintt"><span><?php the_title(); ?></span></h3>
					<div class="c-post">
                  
            <?php if(has_post_thumbnail()): ?>
            <figure class="wp-block-image size-large">
              <div class="blog-detail__image">
                  <img src="<?php the_post_thumbnail_url('large'); ?>">
              </div>
            </figure>
            <?php endif; ?>
     
            <?php echo the_content(); ?>
					</div>
				</div>
			</div>
			<!-- <div class="newsCon__pager">
				<div class="inr">
					<div class="prev"><a href="https://rumvivi.com/news/20220519/220/" rel="prev">PREV</a></div>
					<div class="index"><a href="/news/"><span>INDEX</span></a></div>
					<div class="next"><a href="https://rumvivi.com/news/20220721/229/" rel="next">NEXT</a></div>
				</div>
			</div> -->
		</section>
	</div>
</div>
<style>
  /* #news .newsCon__detail .article .c-post p {
    font-family: "Yu Gothic Medium", "游ゴシック Medium", YuGothic, "游ゴシック体", 'Noto Sans JP', "ヒラギノ角ゴ Pro W3", "メイリオ", sans-serif;
    font-size: 0.9rem;
    line-height: 2rem;
  } */
</style>
<?php endwhile; endif; ?>
<?php get_footer(); ?>



                <?php echo get_the_post_thumbnail_url(get_post_meta($post->ID, 'style_img', true)); ?>