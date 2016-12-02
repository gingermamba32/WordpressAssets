<?php
/*
Template Name: Front Page Template
*/
get_header();
$prefix = 'tk_';
?>
<?php
$hero_heading = get_theme_option(tk_theme_name.'_general_hero_heading');
if(!empty($hero_heading)){ ?>
<br style="clear:both" /><br />
<section>
    <div class='container' >
     <center>   <span class='hero_heading' style="font-weight: 500;font-family: Arvo !important;color: #6d6a4c!important;font-size:1.867em !important;">
             <?php echo $hero_heading; ?>
             </span></center>
    </div><br />
      <br style="clear:both" />
</section>
<?php } ?>
<!-- SLIDER STARTS -->
<?php
$show_slider= get_theme_option(tk_theme_name.'_general_enable_slider');
$slider_alias = get_theme_option(tk_theme_name.'_general_slider_id');
if($show_slider == 'yes'){
?>
<div class='home-slider'>
    <?php if (function_exists('putRevSlider')) { ?>
    <?php putRevSlider($slider_alias); ?>
    <?php } ?>
</div>
<?php } ?>
<!-- SLIDER ends -->
<!-- CONTENT STARTS -->
<div class='mobile-row container mobile'>
    <h2 id='anchor'><span>These Are Just A Few Ways We Can Help:</span></h2>
    <div id='bullets' >


                <div id="col-left" class="mobile-row mobile-full">
                    <!-- content -->
                    <ul class='left'>
                        <li class="colu mn"><span><a href='/contact/' name='we-are-available-nights-weekends' title='we-are-available-nights-weekends'>We Are Available Nights &amp; Weekends</a></span></li>
                        <li><span>No Cost Until We Win Your Case</span></li>
                        <li><span>Defer Your Medical Bills</span></li>
                    </ul>
                </div>
                <div id="col-left" class="mobile-row mobile-full">
                    <!-- content -->
                    <ul class='left'>
                        <li class="colu mn"><span>Get Help With Your Lost Wages</span></li>
                        <li><span>Assistance with Car Rentals</span></li>
                        <li><span>Active And Aggressive Representation</span></li>
                    </ul>
                </div>

    </div>
</div>



<div class='container'>



   <br style="clear:both" />
 <h3 itemprop="description" style="font-style: italic;font-weight: normal!important;">The Washington Advocates Personal Injury Attorneys &amp; Car Accident Lawyers for Seattle, Tacoma, Bellevue and Surrounding Areas</h3>


    <!-- /bullets -->
    <?php
    $args = array(
    'post_status' =>
    'publish',
    'posts_per_page' => -1,
    'post_type' => 'page_builder',
    'order' => 'ASC',
    'meta_key' => 'tk_box_order',
    'orderby' => 'meta_value_num',
    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
    $block_type = get_the_title($post->ID);
    if ($block_type == 'one_column') {
    get_template_part('page-templates/_part_onecolumn');
    } elseif ($block_type == 'two_columns') {
    ?>
</div>
<!-- / pm container -->
<!-- start part -->
<?php get_template_part('page-templates/_part_twocolumns'); ?>
<!-- end part -->
<div class='container'>
    <?php } elseif ($block_type == 'three_columns') {
    get_template_part('page-templates/_part_threecolumns');
    } elseif ($block_type == 'tabs') {
    get_template_part('page-templates/_part_tabs');
    }
    ?>
    <?php
    endwhile;
    endif;
    ?>
    <?php get_footer(); ?>