<?php
/*
Template Name: 2016 Home Page Design
*/
get_header();
$prefix = 'tk_';
$page_headline = get_post_meta($post->ID, $prefix . 'headline', true);
$sidebar_postition = get_post_meta($post->ID, $prefix.'sidebar_position', true);
if($sidebar_postition == ''){$sidebar_postition = 'right';}
if ($sidebar_postition == 'right'){
    $padding = 'style="padding-right:20px;"';
}else if($sidebar_postition == 'left'){
    $padding = 'style="padding-left:20px;"';
}else{
    $padding = '';
}
$sidebar_select = get_post_meta($post->ID, $prefix.'sidebar', true);
?>
<!-- CONTENT STARTS -->
<section>
    <div class="fullwidth">
            <!-- Page Title -->

          
            <!-- Page Content -->
            <div class="fullwidth">

                <!-- Main Content -->
                <div class="fullwidth">

                    <div class="page" <?php echo $padding; ?>>
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
                </div><!-- #content -->


                <!-- Sidebar Left -->
             <!-- Sidebar Left -->
                            <?php
                                if ($sidebar_postition == 'left'){
                                    // if (function_exists('iphorm')) echo iphorm(3);
                                    echo '<div class="span4 pull-left" style="margin-left:0px;"><aside>';
                                        tk_get_sidebar('Left', $sidebar_select);
                                    echo '</aside></div>';
                                }
                            ?>
                            <!-- Sidebar Right -->
                            <?php
                                if ($sidebar_postition == 'right'){
                                   // if (function_exists('iphorm')) echo iphorm(3);
                                    echo '<div class="span4 pull-right"><aside>';
                                        tk_get_sidebar('Right', $sidebar_select);
                                    echo '</div></aside>';
                                }
                            ?>
</div><!-- row-fluid -->



<?php get_footer(); ?>