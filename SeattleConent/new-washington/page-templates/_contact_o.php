<?php
/*

Template Name:  Ogden Contact

*/
get_header();

$prefix = 'tk_';

/* Show map? */
$show_map = get_theme_option(tk_theme_name.'_contact_show_map');

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

/* Contact Page subtitle */
$page_headline = get_post_meta($post->ID, $prefix . 'headline', true);

?>

<?php
    // $x_coord = get_option(tk_theme_name.'_contact_googlemap_x');
    // $y_coord = get_option(tk_theme_name.'_contact_googlemap_y');
    // $zoom_factor = get_option(tk_theme_name.'_contact_googlemap_zoom');
    // $map_type = get_option(tk_theme_name.'_contact_google_map_type');
    // $marker_title = get_option(tk_theme_name.'_contact_marker_title');
    // $map_color = get_theme_option(tk_theme_name.'_contact_map_color');
    // $default_color = get_theme_option(tk_theme_name.'_contact_default_map');

    // if($default_color) {
    //      if(empty($map_color)) {
    //         $map_color ='';
    //     }
    // } else {
    //     $map_color='';
    // }

    // if(empty($x_coord)) {$x_coord = 45.256024;}
    // if(empty($y_coord)) {$y_coord = 19.853861;}
    // if(empty($zoom_factor)) {$zoom_factor = 15;}
    // if(empty($map_type)) {$map_type = 'ROADMAP';}
?>


<!-- CONTENT STARTS -->
<section>
    <div class="container">


        <!-- Page Title -->
        <div class="row-fluid">
            <div class="span12">
                <?php if (is_front_page()) { ?>
                    <h1 class="hero_heading"><?php echo $page_headline ?></h1>
                <?php } else { ?>
                    <h1 class="page_title"><?php the_title(); ?></h1>
                    <?php if ($page_headline !== '') { ?>
                        <h2 class="page_description"><?php echo $page_headline ?></h2>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">


            </div>
        </div> <div ><?php if ( has_post_thumbnail() ) the_post_thumbnail( 'single-post-thumbnail', array( 'itemprop' => 'image' ) ); ?> </div>
        <br>



        <!-- Page Content -->
        <div class="row-fluid">



            <!-- Main Content -->
            <div id="content" class="<?php if($sidebar_postition == 'right'){echo 'span8 pull-left';}elseif($sidebar_postition == 'left'){echo 'span8 pull-right';}elseif($sidebar_postition == 'fullwidth'){echo 'span12';}?>">

              <div <?php echo $padding; ?>>

                <?php //if(empty($show_map)) { ?>













<div class="span4">
  <div class="ebs-seo-cp-container ebs-seo-cp">
    <div itemscope="" itemtype="http://schema.org/LocalBusiness" class="vCard">
      <div itemscope="" itemtype="http://schema.org/ImageObject" itemprop="logo">
        <meta itemprop="name" content="Salt Lake Office">
        <img class="logo" itemprop="image" width="150" src="/wp-content/uploads/2013/11/blue-advocates-logo-200.png" title="Ogden, Utah Personal Injury Lawyers" /></div>
    </div>
  </div>
</div>
<div class="span4">
  <div class="ebs-seo-cp-container ebs-seo-cp">
    <div itemscope="" itemtype="http://schema.org/LocalBusiness" class="vCard">
      <meta itemprop="map" content="http://maps.google.com/maps?q=The Utah Advocates | Driggs, Bills &amp; Day PC,+#205 26th Street Suite 21,+Ogden,+Utah+84401&amp;hq=The Utah Advocates | Driggs, Bills &amp; Day PC&amp;hnear=The Utah Advocates | Driggs, Bills &amp; Day PC,+#205 26th Street Suite 21,+Ogden,+Utah+84401&amp;output=embed">
      <a class="fn org" target="_blank" itemprop="name" href="http://www.utahadvocates.com">
        <span class="ebs-seo-cp-name">Ogden Office</span>
      </a>
      <div itemscope="" itemtype="http://schema.org/PostalAddress" itemprop="address" class="adr">
        <span class="street-address" itemprop="streetAddress">#205 26th Street Suite 21</span>
        <br>
        <span class="locality" itemprop="addressLocality">Ogden</span>
        ,
        <span class="region" itemprop="addressRegion">Utah</span>
        <span class="postal-code" itemprop="postalcode">84401</span>
        <br>
        <span itemprop="addressCountry">United States</span>
      </div>
      <div class="tel">
        <meta class="type" content="Work">
        <span class="ebs-seo-cp-telephone">Office</span>
        <meta itemprop="telephone" content="+8013260809"> <abbr class="value" title="+8013260809">(801) 326-0809</abbr>
      </div>
      <span class="ebs-seo-cp-email">Email:</span>
      <a class="email" itemprop="email" href="mailto:contact@utahadvocates.com">Contact Us</a>
      <br>
      <div itemscope="" itemtype="http://schema.org/GeoCoordinates" itemprop="geo">
        <meta itemprop="latitude" content="40.76194">
        <meta itemprop="longitude" content="-111.873487"></div>
    </div>
  </div>
</div>
<div class="span4">
  <div class="ebs-seo-cp-container ebs-seo-cp">
    <div itemscope="" itemtype="http://schema.org/LocalBusiness" class="vCard">
      <div class="ebs-seo-cp-qr-code-container">
        <img class="logo" itemprop="image" width="150" src="/wp-content/uploads/2013/12/Ogden-Office-The-Advocates800-300x300.jpg" title="Ogden, Utah Personal Injury Lawyers" />
      </div>
    </div>
  </div>
</div>




























                  <?php
                      $mail_success_msg = get_option(tk_theme_name.'_contact_message_successful');
                      $mail_error_msg = get_option(tk_theme_name.'_contact_message_unsuccessful');
                  ?>

                  <?php $captcha_option = get_theme_option(tk_theme_name.'_contact_disable_captcha'); ?>

                  <br>
                  <div class="row-fluid">
                      <div class="span12">
                          <img src="<?php echo get_template_directory_uri(); ?>/style/images/separator-blog.png" alt="separator"/>
                      </div>
                  </div>


                  <!-- Contact Form -->
                  <div class="form">

                    <h3><?php _e('Say Hello', tk_theme_name); ?></h3>

                    <form method="GET" id="contact" onsubmit="return checkForm(this)" action="<?php echo get_template_directory_uri().'/sendcontact.php'?>" >
                      <input type="text" onfocus="if(value==defaultValue)value=''" onblur="if(value=='')value=defaultValue" value="<?php if(isset($_GET['captcha']) && $_GET['captcha'] == 'error'){echo $_SESSION['contactname'];}else{_e('Name*' ,tk_theme_name);} ?>"name="contactname" id="contactname" tabindex="1" />
                      <input type="text" onfocus="if(value==defaultValue)value=''" onblur="if(value=='')value=defaultValue" value="<?php if(isset($_GET['captcha']) && $_GET['captcha'] == 'error'){echo $_SESSION['contactemail'];}else{_e('Email*', tk_theme_name);} ?>" name="email" id="contactemail" tabindex="2" />
                      <textarea onfocus="if(value==defaultValue)value=''" onblur="if(value=='')value=defaultValue" name="message" id="contactmessage" tabindex="3" rows="10"><?php if(isset($_GET['captcha']) && $_GET['captcha'] == 'error'){echo $_SESSION['contactmessage'];}else{_e('Message', tk_theme_name);} ?></textarea>

                      <?php if ($captcha_option !==  'yes') { //Disable captcha ?>
                        <div class="contact-captcha">
                             <img src="<?php echo get_template_directory_uri()?>/script/captcha/captcha.php" id="captcha" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
                             <div class="bg-input captcha-holder">
                                <input type="text" name="captcha" id="captcha-form" autocomplete="off" />
                                <div class="refresh-text">
                                  <?php _e('Cant read? Refresh Image: ', tk_theme_name); ?>
                                  <a onclick="document.getElementById('captcha').src='<?php echo get_template_directory_uri()?>/script/captcha/captcha.php?'+Math.random(); document.getElementById('captcha-form').focus();"
                                 id="change-image" class="captcha-refresh"></a>
                                </div>
                              </div>
                        </div>
                        <br>
                      <?php } //Disable captcha?>

                      <div style="width: 100%; display: inline-block"></div>
                      <input type="submit" name="submit" class="btn form_btn" value="<?php _e('Send a Message', tk_theme_name); ?>" />
                      <input type="hidden" name="returnurl" value="<?php echo get_permalink();  ?>">
                    </form>

                    <div id="contact-success">
                        <?php
                          if(isset($_GET['sent'])) {
                            $what = $_GET['sent'];
                            if($what == 'success') {
                                echo $mail_success_msg;  ?>

     <script type="text/javascript">
 window.onload = function() {
ga('send', 'event', 'Goal Reached', 'formSubmitted', window.location.pathname, true);
 };
</script>

                                <?php
                                }
                            }
                        ?>
                    </div><!-- contact-success -->

                    <div id="contact-error">
                        <?php
                            if(isset($_GET['captcha']) && $_GET['captcha'] == 'error'){
                                _e('Invalid Captcha!', tk_theme_name);
                            };
                        ?>
                        <?php
                          if(isset($_GET['sent'])) {
                            $what = $_GET['sent'];
                            if($what == 'error') {
                                echo $mail_error_msg; ?>
     <script type="text/javascript">
 window.onload = function() {
ga('send', 'event', 'Goal Unsuccessful', 'formNotSubmitted', window.location.pathname, true);
 };
</script>

                                <?php
                              }
                          }
                        ?>
<?php //echo do_shortcode("[ebs_seo_cp_qr_code_only location=971]" ); ?>
<?php //echo do_shortcode("[ebs_seo_cp_contact_only location=971]" ); ?>

                  <?php if (!empty ($post->post_content)) { ?>
                  <div class="contact-text">

                      <?php
                        wp_reset_query();
                        if (have_posts()) : while (have_posts()) : the_post();
                                the_content();

                            endwhile;
                        else:
                        endif;

                        wp_reset_query();
                      ?>

                  </div><!--/contact-text-->
                  <?php } ?>



                    </div><!-- contact-error -->

                  </div><!-- /.form -->

                </div><!-- div with padding ends -->


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

