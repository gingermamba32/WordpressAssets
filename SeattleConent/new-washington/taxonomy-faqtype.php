<?php

function faq_styles()
{
wp_register_style('faq-style', get_stylesheet_directory_uri() . '/custom-css/faq.css');
wp_enqueue_style('faq-style');
}
add_action('wp_enqueue_scripts', 'faq_styles');
get_header();
$prefix = 'tk_';
$sidebar_postition = get_theme_option(tk_theme_name. '_general_archive_sidebar');
if($sidebar_postition == ''){$sidebar_postition = 'right';}
/* Content padding */
if ($sidebar_postition == 'right'){
$padding = 'style="padding-right:20px;"';
}else if($sidebar_postition == 'left'){
$padding = 'style="padding-left:20px;"';
}else{
$padding = '';
}

?>
<!-- CONTENT STARTS -->
<section>
<div class="container" >
<?php
echo '<div class="span4 pull-right">';
tk_get_sidebar('Right', $sidebar_select);
echo '</div>';
?>
<!--
    <img itemprop="image" src="<?php echo get_stylesheet_directory_uri(); ?>/images/checkbox3.png" alt="faq-question"> -->
        <!-- Page Content -->

        <div class="row-fluid">     <!--   <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/question5.png" alt="faq-question"> -->

            <!-- Main Content -->
            <div role="main" id="content" class="<?php if($sidebar_postition == 'right'){echo 'span8 pull-left';}elseif($sidebar_postition == 'left'){echo 'span8 pull-right';}elseif($sidebar_postition == 'fullwidth'){echo 'span12';}?>">
                <!-- Post -->
               <article class="faqtype_post_post faqtype_listing" <?php echo $padding; ?> itemscope="" itemtype="http://schema.org/CreativeWork/">

                    <div id="questions"  style="padding:15px;">
                          <br style="clear:both" />
<ul>
                            <?php if (have_posts()): while (have_posts()) : the_post();    $format = get_post_format();    $categories = wp_get_post_categories($post ->ID);   $count = count($categories);  $i = 1; ?>
                    <li itemscope="question" itemtype="https://schema.org/AskAction" class="question" style="" ><a onClick="ga('send', 'event', 'FAQ', 'click', '<?php the_title(); ?>');" href="#answer<?php the_id() //ga('send', 'event', 'category', 'action', 'label'); ?>">
                      <span itemprop="question"><?php the_title(); ?></span></a></li>
                            <?php endwhile;?>
                            <?php else : ?>
                            <h3>Not Found</h3>
                            <p>Sorry, No FAQs created yet.</p>
                            <?php endif; ?>
</ul>
                        <?php rewind_posts(); ?>
                        <?php if (have_posts()) : ?>
            </div> <!-- /questions -->
</div>
</div><!-- /ow-fluid -->


</div><!-- /container -->

                        <div id="answers"  style="background: #baba95; padding:40px 0 0 0;">
                            <div class="container" >
                                <ul>
                                    <?php  if (have_posts()): while (have_posts()) : the_post(); ?>
                                    <!-- http://schema.org/question -->
                                    <li  itemscope="question" itemtype="https://schema.org/ReplyAction" id="answer<?php the_id(); ?>" class="answer-container"><h4><?php the_title(); ?>  <img itemprop="image" src="<?php echo get_stylesheet_directory_uri(); ?>/images/question4.png" alt="faq-question"></h4>
                                       <p class="answer" itemprop="replyAction"><?php the_content(); ?></p></li>
                                    <?php endwhile;  endif; ?>
                                 </ul>
                                <?php endif; ?>
                                      <!--PAGINATION-->
                        <div class="pagination left">
                            <?php
global $wp_query;
$big = 999999999; // need an unlikely integer
$pageing =  paginate_links( array('base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),'format' => '?paged=%#%','current' => max( 1, get_query_var('paged') ),
'total' => $wp_query->max_num_pages
) );
echo $pageing;
?>
                        </div>                       <!--/pagination-->
                            </div>
                            <?php wp_reset_query(); ?>


                        </article>
                        <br style="clear:both" />

             </div>                   <!-- /content-->

        </div>
        <!-- row-fluid -->
        <?php get_footer(); ?>