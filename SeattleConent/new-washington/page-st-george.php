<?php
/*
Template Name: St George Content Page
*/
get_header('st-george');

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


<!-- CONTENT STARTS -->

    <div class="container">

            <!-- Page Title -->
            <div class="row-fluid">
                <div class="span12">
                    <?php if (is_front_page()) { ?>
                        <h1 class="hero_heading"><?php echo $page_headline; ?></h1>
                    <?php } else { ?>
                        <h1 class="page_title"><?php the_title(); ?></h1>
                        <?php if ($page_headline !== '') { ?>
                            <h2 class="page_description"><?php echo $page_headline; ?></h2>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
                    <img src="<?php echo get_template_directory_uri(); ?>/style/images/separator.png" alt="separator" />
                           <br />     <br />
                             <?php  if ( has_post_thumbnail() ) the_post_thumbnail( 'lower-blog-header', array( 'itemprop' => 'primaryImageOfPage' ) ); // pm added banner image for pages ?>
                </div>
            </div>
            <br />



            <!-- Page Content -->
              <div class="row-fluid sidebar-backgound ">


                <!-- Main Content -->
                <div id="content" class="<?php if($sidebar_postition == 'right'){echo 'span8 pull-left';}elseif($sidebar_postition == 'left'){echo 'span8 pull-right';}elseif($sidebar_postition == 'fullwidth'){echo 'span12';}?>">

                    <div class="page" <?php echo $padding; ?>>            <br style="clear:both" />
                        <div class="fb-send" data-href="<?php the_permalink(); ?>" data-width="300" data-height="350"  data-colorscheme="light"></div>
                        <?php
                            wp_reset_query();
                            if (have_posts()) : while (have_posts()) : the_post();

                                the_content();
                                                    //get_template_part( 'schema', 'single' );
                                              //      get_template_part( 'schema', 'page' );
                                               get_template_part('schema');
                                endwhile;
                            else:
                            endif;

                            wp_reset_query();
                        ?>

                    </div>
<!--    </div> -->
                </div><!-- #content -->



                <!-- Sidebar Left -->
                <?php
                    if ($sidebar_postition == 'left'){
                        echo '<div class="span4 pull-left" style="margin-left:0px;">';
                            tk_get_sidebar('Left', $sidebar_select);
                        echo '</div>';

                        if ( has_nav_menu( 'sidebarinjurymenu' ) ) { ?>
                    <div class="nav-container span4 pull-left side-nav-outer" style="color:#ffffff;">
                        <img alt=" " src="<?php echo get_stylesheet_directory_uri(); ?>/images/side-nav-top-bg.png">
                        <?php wp_nav_menu( array( 'theme_location' => 'sidebarinjurymenu' ) ); ?>
                          <img alt=" " src="<?php echo get_stylesheet_directory_uri(); ?>/images/side-nav-bottom-bg.png">
                    </div>
                <?php }          }
                    ?>
                <!-- Sidebar Right -->
                <?php
                    if ($sidebar_postition == 'right'){
                        echo '<div class="span4 pull-right">';
                            tk_get_sidebar('Right', $sidebar_select);
                        echo '</div>';

                        if ( has_nav_menu( 'sidebarinjurymenu' ) ) { ?>
                    <div class="nav-container span4 pull-right side-nav-outer" style="color:#ffffff;">
                        <img alt=" " src="<?php echo get_stylesheet_directory_uri(); ?>/images/side-nav-top-bg.png">
                        <?php wp_nav_menu( array( 'theme_location' => 'sidebarinjurymenu' ) ); ?>
                           <img alt=" " src="<?php echo get_stylesheet_directory_uri(); ?>/images/side-nav-bottom-bg.png">
                    </div>
                <?php }          }
                ?>
</div><!-- row-fluid -->



<?php get_footer(); ?>