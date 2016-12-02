<?php
/*
Template Name: RSS FEEDS
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
                        <h1  class="page_title" itemprop="name " class="hero_heading" itemref="article"><?php echo $page_headline; ?></h1>
                    <?php } else { ?>
                        <h1 class="page_title" itemprop="name " itemref="article"><?php the_title(); ?></h1>
                        <?php if ($page_headline !== '') { ?>
                            <h2  itemprop=" headline" class="page_description" itemref="article"><?php echo $page_headline; ?></h2>
                        <?php } ?>
                    <?php } ?>

                </div>
            </div>

            <div class="row-fluid">
                <div class="span12">
                    <img src="<?php echo get_template_directory_uri(); ?>/style/images/separator.png" alt="separator" />
                    <br />

       <br />
                </div  itemprop="primaryImageOfPage" itemref="article"><?php if ( has_post_thumbnail() ) {      the_post_thumbnail();  }// pm added banner image for pages ?>
            </div>

            <br>

<span></span>

            <!-- Page Content -->
            <div class="row-fluid">
     <!-- Main Content -->
                <div id="content" class="<?php if($sidebar_postition == 'right'){echo 'span8 pull-left';}elseif($sidebar_postition == 'left'){echo 'span8 pull-right';}elseif($sidebar_postition == 'fullwidth'){echo 'span12';}?>">
<?php // the_author(); ?>
           <!-- Insert data:Article schema -->
<article id="article" itemscope="" itemtype="http://schema.org/Article"  <?php post_class(); ?>>

                    <div class="page"  <?php echo $padding; ?>  itemref="article">
                    <?php
                                         // wp_reset_query();
                                         // if (have_posts()) : while (have_posts()) : the_post();?>

                                      <?php// the_content(); ?>
<?php wp_list_categories('feed_image=http://www.utahadvocates.com/rss.png&feed=XML Feed&optioncount=1&children=0'); ?>
                               <?php get_template_part('schema');  ?>
                                             <?php
                                         //     endwhile;
                                         // else:
                                         // endif;



                                    wp_reset_query();
                                     ?>
  Published On: <time  datetime="<?php echo $post->post_date; ?>" pubdate itemprop="datePublished"  itemref="article"><?php  echo phillips_post_date(  ); ?></time>
                    </div>
      </article><!-- #post-<?php the_ID(); ?> -->
      <?php related_entries(); ?>
           </div><!-- #content -->


                        <!-- Sidebar Left -->
                <?php
                    if ($sidebar_postition == 'left'){ ?>
                  <?php
                        echo '<div  id=\'linklist\' class="linklist"  itemref="article"></div><div class="span4 pull-left" style="margin-left:0px;">';
                            tk_get_sidebar('Left', $sidebar_select);
                        echo '</div>';
                    }
                ?>


                <!-- Sidebar Right -->
                <?php
                    if ($sidebar_postition == 'right'){ ?>

                    <?php
                        echo '<div  id=\'linklist\' class="linklist"  itemref="article"></div><div class="span4 pull-right">';
                            tk_get_sidebar('Right', $sidebar_select);
                        echo '</div>';
                    }
                ?>
            </div><!-- row-fluid -->
  <br style="clear:both" />
<?php  ?>

<?php get_footer(); ?>