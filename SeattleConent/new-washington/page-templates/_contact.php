<?php
/*

Template Name: Washington Contact

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
  <img src="/wp-content/themes/thewashingtonadvocates/images/Seattle-Washington-Office.jpg" alt="Seattle WA Advocate Attorneys">
<?php //echo do_shortcode("[ebs_seo_cp_location_img_only location=971]" ); ?>
</div>


<div class="span4">
  <div class="ebs-seo-cp-container ebs-seo-cp">
    <div itemscope="" itemtype="http://schema.org/LocalBusiness" class="vCard">
      <div itemscope="" itemtype="http://schema.org/ImageObject" itemprop="logo">
        <meta itemprop="name" content="Seattle WA Office">
      <img src="/wp-content/themes/thewashingtonadvocates/images/200l_advocates_logo.jpg" alt="Seattle The Washington Advocates"></div>
    </div>
  </div>
</div>
<div class="span4">
  <div class="ebs-seo-cp-container ebs-seo-cp">
    <div itemscope="" itemtype="http://schema.org/LocalBusiness" class="vCard">
      <meta itemprop="map" content="http://maps.google.com/maps?q=The Washington Advocates | Driggs, Bills &amp; Day PLLC,+2125 Western Ave 500,+Seattle,+WA+98121&amp;hq=http://maps.google.com/maps?q=The Washington Advocates | Driggs, Bills &amp; Day PLLC,+2125 Western Ave 500,+Seattle,+WA+98121&amp;output=embed">
      <a class="fn org" target="_blank" itemprop="name" href="http://www.thewashingtonadvocates.com">
        <span class="ebs-seo-cp-name">Seattle Office</span>
      </a>
      <div itemscope="" itemtype="http://schema.org/PostalAddress" itemprop="address" class="adr">
        <span class="street-address" itemprop="streetAddress">2125 Western Ave #500 </span>
        <br>
        <span class="locality" itemprop="addressLocality">Seattle</span>
        ,
        <span class="region" itemprop="addressRegion">Washington</span>
        <span class="postal-code" itemprop="postalcode">98121</span>
        <br>
        <span itemprop="addressCountry">United States</span>
      </div>
      <div class="tel">
        <meta class="type" content="Work">
        <span class="ebs-seo-cp-telephone">Office</span>
        <meta itemprop="telephone" content="+206-452-4200"> <abbr class="value" title="+206-452-4200">206-452-4200</abbr>
      </div>
      <span class="ebs-seo-cp-email">Email:</span>
      <a class="email" itemprop="email" href="mailto:contact@thewashingtonadvocates.com">Contact Us</a>
      <br>
      <div itemscope="" itemtype="http://schema.org/GeoCoordinates" itemprop="geo">
        <meta itemprop="latitude" content="47.6116383">
        <meta itemprop="longitude" content="-122.34578369999997"></div>
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

                    <h3><?php _e('Get Help Now', tk_theme_name); ?></h3>

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
ga('send', 'event', 'Goal Reached', 'WA formSubmitted', window.location.pathname, true);
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


         <div class="row-fluid">
                      <div class="span12" style="clear:all;">
                          <img src="<?php echo get_template_directory_uri(); ?>/style/images/separator-blog.png" alt="separator"/>
                      </div>
                  </div>


<div class="span4">
  <div class="ebs-seo-cp-container ebs-seo-cp">
    <div itemscope="" itemtype="http://schema.org/LocalBusiness" class="vCard">
      <div class="ebs-seo-cp-qr-code-container">
        <iframe width="150" height="150" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://chart.apis.google.com/chart?cht=qr&amp;chs=150x150&amp;chl=tel:+1206-452-4200"></iframe>
      </div>
    </div>
  </div>
</div>

<div class="span4">

<div class="ebs-seo-cp-container ebs-seo-cp"><div itemscope="" itemtype="http://schema.org/LocalBusiness" class="vCard"><span class="ebs-seo-cp-hours">Office Hours</span><br>
    <span class="ebs-seo-cp-dayname">Sunday :</span> <time itemprop="openinghours" datetime="Su 00:00-00:00">Closed</time>
    <div itemprop="openingHoursSpecification" itemscope="" itemtype="http://schema.org/OpeningHoursSpecification">
      <link itemprop="dayOfWeek" href="http://purl.org/goodrelations/v1#Sunday" cph-ssorder="55">
      <meta itemprop="opens" content="00:00">
      <meta itemprop="closes" content="00:00">
    </div>
    <span class="ebs-seo-cp-dayname">Monday :</span> <time itemprop="openinghours" datetime="Mo 09:00-17:00">9:00 am - 5:00 pm</time>
    <div itemprop="openingHoursSpecification" itemscope="" itemtype="http://schema.org/OpeningHoursSpecification">
      <link itemprop="dayOfWeek" href="http://purl.org/goodrelations/v1#Monday" cph-ssorder="56">
      <meta itemprop="opens" content="09:00">
      <meta itemprop="closes" content="17:00">
    </div>
    <span class="ebs-seo-cp-dayname">Tuesday :</span> <time itemprop="openinghours" datetime="Tu 09:00-17:00">9:00 am - 5:00 pm</time>
    <div itemprop="openingHoursSpecification" itemscope="" itemtype="http://schema.org/OpeningHoursSpecification">
      <link itemprop="dayOfWeek" href="http://purl.org/goodrelations/v1#Tuesday" cph-ssorder="57">
      <meta itemprop="opens" content="09:00">
      <meta itemprop="closes" content="17:00">
    </div>
    <span class="ebs-seo-cp-dayname">Wednesday :</span> <time itemprop="openinghours" datetime="We 09:00-17:00">9:00 am - 5:00 pm</time>
    <div itemprop="openingHoursSpecification" itemscope="" itemtype="http://schema.org/OpeningHoursSpecification">
      <link itemprop="dayOfWeek" href="http://purl.org/goodrelations/v1#Wednesday" cph-ssorder="58">
      <meta itemprop="opens" content="09:00">
      <meta itemprop="closes" content="17:00">
    </div>
    <span class="ebs-seo-cp-dayname">Thursday :</span> <time itemprop="openinghours" datetime="Th 09:00-17:00">9:00 am - 5:00 pm</time>
    <div itemprop="openingHoursSpecification" itemscope="" itemtype="http://schema.org/OpeningHoursSpecification">
      <link itemprop="dayOfWeek" href="http://purl.org/goodrelations/v1#Thursday" cph-ssorder="59">
      <meta itemprop="opens" content="09:00">
      <meta itemprop="closes" content="17:00">
    </div>
    <span class="ebs-seo-cp-dayname">Friday :</span> <time itemprop="openinghours" datetime="Fr 09:00-17:00">9:00 am - 5:00 pm</time>
    <div itemprop="openingHoursSpecification" itemscope="" itemtype="http://schema.org/OpeningHoursSpecification">
      <link itemprop="dayOfWeek" href="http://purl.org/goodrelations/v1#Friday" cph-ssorder="60">
      <meta itemprop="opens" content="09:00">
      <meta itemprop="closes" content="17:00">
    </div>
    <span class="ebs-seo-cp-dayname">Saturday :</span> <time itemprop="openinghours" datetime="Sa 00:00-00:00">Closed</time>
    <div itemprop="openingHoursSpecification" itemscope="" itemtype="http://schema.org/OpeningHoursSpecification">
      <link itemprop="dayOfWeek" href="http://purl.org/goodrelations/v1#Saturday" cph-ssorder="61">
      <meta itemprop="opens" content="00:00">
      <meta itemprop="closes" content="00:00">
    </div></div></div>
</div>

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

