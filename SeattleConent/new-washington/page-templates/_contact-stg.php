<?php
/*

Template Name: St George Contact

*/

get_header('st-george');

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


<style type="text/css" media="screen">
  .box { float: left;  border:solid black 0px;}
#root { max-width: 1200px; margin: 0 auto; }




/* Laptop/Tablet (1024px) */
@media only screen and (min-width: 481px) and (max-width: 1024px) and (orientation: landscape) {
  #image { width: 100%; }
  #hcard { width: 100%; }
  #sidebar { width: 100%; }
  #box4 { width: 100%; }
  #qr { width: 100%; }
  #bbb { width: 100%; }
  #hours { width: 100%; }
}

/* Tablet Portrait (768px) */
@media only screen and (min-width: 321px) and (max-width: 1024px) and (orientation: portrait) {
  #image { width: 100%; }
  #hcard { width: 100%; }
  #sidebar { width: 100%; }
  #box4 { width: 100%; }
  #qr { width: 100%; }
  #bbb { width: 100%; }
  #hours { width: 100%; }
}

/* Phone Landscape (480px) */
@media only screen and (min-width: 321px) and (max-width: 480px) and (orientation: landscape) {
  #image { width: 100%; }
  #hcard { width: 100%; }
  #sidebar { width: 100%; }
  #box4 { width: 100%; }
  #qr { width: 100%; }
  #bbb { width: 100%; }
  #hours { width: 100%; }
}

/* Phone Portrait (320px) */
@media only screen and (max-width: 320px) {
  #image { width: 100%; }
  #hcard { width: 100%; }
  #sidebar { width: 100%; }
  #box4 { width: 100%; }
  #qr { width: 100%; }
  #bbb { width: 100%; }
  #hours { width: 100%; }
}

</style>
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

        <div class="row-fluid">
            <div class="span12">
                <?php if ( has_post_thumbnail() ) the_post_thumbnail( 'single-post-thumbnail', array( 'itemprop' => 'image' ) ); ?>
            </div>
        </div>

            <br>
        <!-- Page Content -->
        <div class="row-fluid">
            <!-- Main Content -->
            <div id="content" class="<?php if($sidebar_postition == 'right'){echo 'span8 pull-left';}elseif($sidebar_postition == 'left'){echo 'span8 pull-right';}elseif($sidebar_postition == 'fullwidth'){echo 'span12';}?>">
              <div <?php echo $padding; ?>>
       <div id='root'>
  <!--<div class='box' id='image' style="float:right;">
    <img src="http://www.utahadvocates.com/wp-content/uploads/2014/03/st.george.office400.jpg" alt="St George Utah Advocate Attorneys">
  </div>-->
  <div class='box' id='hcard'>
    <div id='hcard_embed'>
      <div id="hcard-Matthew-Driggs-the Advocates" class="vcard">
        <div class="fn n">
          <span class="given-name">Matthew</span> <span class="family-name">Driggs</span>
        </div>
        <div class="org">the Advocates</div>
        <div class="website">
          <a class="website" href="http://www.utahadvocates.com">http://www.utahadvocates.com</a>
        </div>
        <div class="spacer">
        </div>
        <div class="email" >
          <a class="email" href="mailto:contact@utahadvocates.com">contact@utahadvocates.com</a>
        </div>
        <div class="tel">
          <span class="type">Voice: </span>801-326-0809</div>
          <div class="spacer">
          </div>
          <div class="adr">
            <div class="street-address">3143 South 840 East, Suite #331</div>
            <span class="locality">St George</span>, <span class="region">UT</span>  <span class="postal-code"> 84790</span>
            <div class="country-name">United States</div>
          </div>
        </div>
        <!--hCard created @ bvCard.com-->
        <style type='text/css'> div.vcard { background-color: rgb(0, 115, 182); border-radius: 10px 10px 10px 10px; color: white; padding: 10px 10px; width: 250px; line-height: 1.2em; } div.vcard a{ color: white;} div.vcard div.fn{ font-weight: bold; border-bottom: 1px solid white; } div.vcard div.spacer{ min-height: 0.5em; } #hcard_embed{max-width: 270px;} .bvcardlink a{ line-height: 16px; color: darkgrey; font-size: 10px; float: right; padding-right: 20px; background: url('http://bvcard.com/sites/all/modules/bvcard/bvcard_form/bvcard-fav.png') no-repeat top right; background-size:16px 16px;}</style>
      </div>
    </div>
    <div class='box' id='box4'>
      <?php
      $mail_success_msg = get_option(tk_theme_name.'_contact_message_successful');
      $mail_error_msg = get_option(tk_theme_name.'_contact_message_unsuccessful');
      ?>
      <?php $captcha_option = get_theme_option(tk_theme_name.'_contact_disable_captcha'); ?>
      <!-- Contact Form -->
      <div class="form">
        <h3>
          <?php _e('Get Help Now', tk_theme_name); ?>
        </h3>
        <form method="GET" id="contact" onsubmit="return checkForm(this)" action="<?php echo get_template_directory_uri().'/sendcontact.php'?>" >
          <input type="text" onfocus="if(value==defaultValue)value=''" onblur="if(value=='')value=defaultValue" value="<?php if(isset($_GET['captcha']) && $_GET['captcha'] == 'error'){echo $_SESSION['contactname'];}else{_e('Name*' ,tk_theme_name);} ?>"name="contactname" id="contactname" tabindex="1" />
          <input type="text" onfocus="if(value==defaultValue)value=''" onblur="if(value=='')value=defaultValue" value="<?php if(isset($_GET['captcha']) && $_GET['captcha'] == 'error'){echo $_SESSION['contactemail'];}else{_e('Email*', tk_theme_name);} ?>" name="email" id="contactemail" tabindex="2" />
          <textarea onfocus="if(value==defaultValue)value=''" onblur="if(value=='')value=defaultValue" name="message" id="contactmessage" tabindex="3" rows="10">
            <?php if(isset($_GET['captcha']) && $_GET['captcha'] == 'error'){echo $_SESSION['contactmessage'];}else{_e('Message', tk_theme_name);} ?>
          </textarea>
          <?php if ($captcha_option !==  'yes') { //Disable captcha ?>
          <div class="contact-captcha">
            <img src="<?php echo get_template_directory_uri()?>/script/captcha/captcha.php" id="captcha" alt="<?php the_title(); ?>" title="<?php the_title(); ?>"/>
            <div class="bg-input captcha-holder">
              <input type="text" name="captcha" id="captcha-form" autocomplete="off" />
              <div class="refresh-text">
                <?php _e('Cant read? Refresh Image: ', tk_theme_name); ?>
                <a onclick="document.getElementById('captcha').src='<?php echo get_template_directory_uri()?>/script/captcha/captcha.php?'+Math.random(); document.getElementById('captcha-form').focus();" id="change-image" class="captcha-refresh">
                </a>
              </div>
            </div>
          </div>
          <br>
          <?php } //Disable captcha?>
          <div style="width: 100%; display: inline-block">
          </div>
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
                  ga('send', 'event', 'Goal Reached', 'St George Office Submitted', window.location.pathname, true);
                };
              </script>
              <?php
            }
          }
          ?>
        </div>
        <!-- contact-success -->
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
                  <?php if (!empty ($post->post_content)) { ?>
                  <div class="contact-text">
                      <?php
                        wp_reset_query();
                        if (have_posts()) :
                          while (have_posts()) : the_post();
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
        </div>
        <div class='box' id='qr'>
          <iframe width="150" height="150" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://chart.apis.google.com/chart?cht=qr&amp;chs=150x150&amp;chl=tel:+1206-452-4200">
          </iframe>
        </div><!-- end of qr -->

<!--

        <div class='box' id='hours'>


          <div class="ebs-seo-cp-container ebs-seo-cp">
            <div itemscope="" itemtype="http://schema.org/LocalBusiness" class="vCard">
              <span class="ebs-seo-cp-hours">Office Hours</span>
              <br>
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
              </div>
            </div>
          </div>
        </div>    
        -->    <!-- end of hours -->


    <div class='box' id='bbb'>
          <a id="bbblink" class="ruhzbum" href="http://www.bbb.org/utah/business-reviews/attorneys-and-lawyers/driggs-bills-and-day-pc-in-salt-lake-city-ut-22250688#bbbseal" title="Driggs, Bills & Day, PC, Attorneys & Lawyers, Salt Lake City, UT" style="display: block;position: relative;overflow: hidden; width: 150px; height: 68px; margin: 0px; padding: 0px;">
            <img style="padding: 0px; border: none;" id="bbblinkimg" src="http://seal-utah.bbb.org/logo/ruhzbum/driggs-bills-and-day-pc-22250688.png" width="300" height="68" alt="Driggs, Bills & Day, PC, Attorneys & Lawyers, Salt Lake City, UT" />
          </a>
          <script type="text/javascript">var bbbprotocol = ( ("https:" == document.location.protocol) ? "https://" : "http://" ); document.write(unescape("%3Cscript src='" + bbbprotocol + 'seal-utah.bbb.org' + unescape('%2Flogo%2Fdriggs-bills-and-day-pc-22250688.js') + "' type='text/javascript'%3E%3C/script%3E"));</script>
        </div>         <!-- end of bbb -->


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