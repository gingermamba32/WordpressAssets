<?php
/*
Template Name: With Settlements  Loop
*/
get_header();

$prefix = 'tk_';

/* Page subtitle */
$page_headline = get_post_meta($post->ID, $prefix . 'headline', true);

/* Sidebar position */
$sidebar_postition = get_post_meta($post->ID, $prefix.'sidebar_position', true);
if($sidebar_postition == ''){$sidebar_postition = 'right';}

/* Content padding */
if ($sidebar_postition == 'right'){
    $padding = 'style="padding-right:20px;"';
}else if($sidebar_postition == 'left'){
    $padding = 'style="padding-left:20px;"';
}else{
    $padding = '';
}

/* Selected sidebar */
$sidebar_select = get_post_meta($post->ID, $prefix.'sidebar', true);

?>
  <?php //  if ( has_post_thumbnail() ) {      the_post_thumbnail();  }// pm added banner image for pages ?>

<!-- CONTENT STARTS -->
<section>
    <div class="container">

            <!-- Page Title -->
            <div class="row-fluid">
                <div class="span12">
                    <?php if (is_front_page()) { ?>
                        <h1  class="page_title" itemprop="name headline" class="hero_heading"><?php echo $page_headline; ?></h1>
                    <?php } else { ?>
                        <h1 class="page_title" itemprop="name headline"><?php the_title(); ?></h1>
                        <?php if ($page_headline !== '') { ?>
                            <h2 class="page_description"><?php echo $page_headline; ?></h2>
                        <?php } ?>
                    <?php } ?>

                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <img src="<?php get_stylesheet_directory_uri(); ?>/style/images/separator.png" alt="separator" />
                    <br />
<?php // jnewsticker_display( 0 ) ?>
       <br />
                </div><?php if ( has_post_thumbnail() ) {      the_post_thumbnail();  }// pm added banner image for pages ?>
            </div>

            <br>



            <!-- Page Content -->
            <div class="row-fluid">
	   <!-- Main Content -->
                <div id="content" class="<?php if($sidebar_postition == 'right'){echo 'span8 pull-left';}elseif($sidebar_postition == 'left'){echo 'span8 pull-right';}elseif($sidebar_postition == 'fullwidth'){echo 'span12';}?>">


<?php
$args = array( 'post_type' => 'payouts', 'posts_per_page' => 5 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();

echo '<div class="pricing-table-one-center pricing-table-white"><?php echo $payout; ?><span class="arvo">';
echo esc_html(get_post_meta($post->ID, 'settledby', true));
echo '</span><p class="arvo"> ';
    echo '<a href="';
the_permalink();
    echo '">';
    the_title();
    echo '</a></p></span>';
    echo '</div>';
endwhile
 ?>


                    </div>
      </article><!-- #post-<?php the_ID(); ?> -->
           </div><!-- #content -->



                <!-- Sidebar Left -->
                <?php
                    if ($sidebar_postition == 'left'){
                        echo '<div class="span4 pull-left" style="margin-left:0px;">';
                            tk_get_sidebar('Left', $sidebar_select);
                        echo '</div>';
                    }
                ?>


                <!-- Sidebar Right -->
                <?php
                    if ($sidebar_postition == 'right'){
                        echo '<div class="span4 pull-right">';
                            tk_get_sidebar('Right', $sidebar_select);
                        echo '</div>';
                    }
                ?>

            </div><!-- row-fluid -->



<?php get_footer(); ?>