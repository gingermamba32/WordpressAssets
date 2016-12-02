<?php {  ?>
<!-- #start Article Schema Markup for WordPress with multi authors -->

<a href="http://www.utahadvocates.com/" rel="bookmark" title="Get Legal Advice">Get Legal Advice</a>

<div style="position:absolute;left:-9999em" class="post-schema">

<div itemscope itemtype="http://schema.org/Product">
<span itemprop="name">Car Accident Lawyer Representation</span>
<div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
<span itemprop="ratingValue">4.5</span> stars – based on
<span itemprop="reviewCount">219</span> reviews
<div>
</div>


<!-- <div itemprop="review" itemscope itemtype="http://schema.org/Review">
<span itemprop="name">[Review title/summary]</span> - by
<span itemprop="author">[name of reviewer]</span>,
<meta itemprop="datePublished" content="[date in ISO format e.g. 2012-04-15]">April 15th, 2012
<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
<meta itemprop="worstRating" content="[lowest possible rating]">
<span itemprop="ratingValue">[rating given by reviewer]</span>/
<span itemprop="bestRating">[highest possible rating]</span>stars
</div>
<span itemprop="description">[The actual user review text]</span>
</div> -->


<?php
global $post;
$author_email = get_the_author_meta('user_email');
$author_displayname = get_the_author_meta('display_name');
$author_nickname = get_the_author_meta('nickname');
$author_firstname = get_the_author_meta('first_name');
$author_lastname = get_the_author_meta('last_name');
$author_url = get_the_author_meta('user_url');
$author_status = get_the_author_meta('user_level');
$author_description = get_the_author_meta('user_description');

// get the user roles
if($author_status=='0'):
$user_roles = 'Subsribers';
elseif($author_status=='1'):
$user_roles = 'Contributor';
elseif($author_status=='2'):
$user_roles = 'Author';
elseif($author_status=='7'):
$user_roles = 'Editor';
elseif($author_status=='10'):
$user_roles = 'Administrator';
endif;

// get user google+ profile
$author_googleplus_profile = get_the_author_meta('user_googleplus');

// get post thumbnail
$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "thumbnail" );
?>

<!-- PM Insert data:Article schema -->
<article itemscope="" itemtype="http://schema.org/Article">

<h1 class="entry-title" itemprop="name headline"><a itemprop="url" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>


<!-- PM Insert data:Article:image schema -->
<?php if($thumbnail_src): ?>
<span itemprop="image"><?php echo $thumbnail_src[0]; ?></span>
<?php endif; ?>

<!-- PM Insert data:Article:Published schema -->
<time datetime="<?php the_time('Y-m-d') ?>" itemprop="datePublished"></time>
<time datetime="<?php the_modified_time('d F Y') ?>" class="entry-date updated"></time>

<!-- PM Insert data:Article:Author schema -->
<span class="vcard author"><span class="fn"><?php the_author(); ?></span></span>

<!-- PM Insert data:Article:ArticleSection schema -->
<?php
$categories = get_the_category();
$separator = ', ';
$output = '';
if($categories){
foreach($categories as $category) {
echo '<span style="display:none;" itemprop="articleSection">' . $category->cat_name . '</span>';
}
}
?>

<!-- PM Insert data:Article:Tag schema -->
<?php if( has_tag() ) { ?>
<span itemprop="keywords"><?php the_tags('', ','); ?></span>
<?php } ?>

<!-- PM Insert data:Article:Content schema -->
<?php if( !is_singular() ): ?>
<div itemprop="description"><?php the_excerpt(); ?></div>
<?php else: ?>
<div itemprop="articleBody"><?php the_content(); ?></div>
<?php endif; ?>


<!-- PM Insert data:Person schema -->
<span itemprop="author" itemscope="" itemtype="http://schema.org/Person">

<!-- PM Insert data:Person:Author schema -->
<span itemprop="name">
<a href="<?php echo $author_googleplus_profile; ?>?rel=author" itemprop="url">
<?php echo $author_displayname; ?></a>
</span>

<!-- PM Insert data:Person:others schema *optional -->
<span itemprop="givenName"><?php echo $author_firstname; ?></span>
<span itemprop="familyName"><?php echo $author_lastname; ?></span>
<span itemprop="email"><?php echo $author_email; ?></span>
<span itemprop="jobTitle"><?php echo $user_roles; ?></span>

<?php if($author_description): ?>
<span itemprop="knows"><?php echo stripcslashes($author_description); ?></span>
<?php endif; ?>

<span itemprop="brand"><?php echo bloginfo('name'); ?></span>

</span>
<!-- PM end data:Person schema -->

<!-- PM Insert data:Organization -->
</article>
<section>
    <article>
<div itemscope itemtype="http://schema.org/LocalBusiness">
<a itemprop="url" href="http://www.utahadvocates.com"><div itemprop="name"><strong>★ The Utah Advocates ★★★★★</strong></div>
</a>
<div itemprop="description"><p>★<strong>The Utah Advocates</strong>   ★ +1 801 386-5090 ★ personal injury attorneys and Accident Lawyers travel all across Utah to represent injured parties who need help and protection after their auto accident, slip and fall or other personal injury accident. LIVE CHAT with us at www.utahadvocates.com ★</p>
★
<strong>Our Lawyers can help you in any of the following areas:★</strong>
<ul>
    <li><a href="http://www.utahadvocates.com/personal-injury-types/">personal injury or accident</a>   &nbsp;&amp; <a href="http://www.utahadvocates.com/personal-injury-types/winter-accidents/">winter weather accidents ★ </a></li>
        <li><a href="http://www.utahadvocates.com/personal-injury-types/automobile-accident/">car accident ★ </a></li>
        <li><a href="http://www.utahadvocates.com/personal-injury-types/motorcycle-accident/">motorcycle accident ★ </a></li>
        <li><a href="http://www.utahadvocates.com/personal-injury-types/brain-injury-lawyer/">brain injury ★ </a></li>
        <li><a href="http://www.utahadvocates.com/personal-injury-types/truck-accident/">truck accident ★ </a></li>
        <li><a href="http://www.utahadvocates.com/personal-injury-types/accidental-death/">accidental death</a>     or <a href="http://www.utahadvocates.com/personal-injury-types/wrongful-death/">wrongful death ★ </a></li>
        <li><a href="http://www.utahadvocates.com/personal-injury-types/defective-drugs/">defective drugs </a> or  <a href="http://www.utahadvocates.com/personal-injury-types/insurance-disputes/">insurance disputes ★ </a></li>
        <li><a href="http://www.utahadvocates.com/personal-injury-types/dog-bite-injury/">dog bite injury ★ </a></li>
        <li><a href="http://www.utahadvocates.com/personal-injury-types/bicycle-accident/">bike / bicycle accident ★ </a></li>
</ul>
★
<p>No area of this great state of Utah is too far away from us. If you can’t get to our Salt Lake City, Ogden, Vernal or American Fork offices, we will come to you at home or at work or wherever in Utah works best for you. Contact Us anytime 24/7 and we will help you with anything you might need help with. ★ ★ ★ ★ ★ </p>

</div>
<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
<span itemprop="streetAddress">331 South 600 East</span><br>
<span itemprop="addressLocality">Salt Lake City</span><br>
<span itemprop="addressRegion">UT</span><br>
<span itemprop="postalCode">84102</span><br>
<span itemprop="addressCountry">United States</span><br>
</div>
</div>
</article>
</section>

<!-- PM Insert data:Attorney -->
<section>
    <article>
        <div id="Attorney" itemscope="" itemtype="http://schema.org/Attorney">
  <a itemprop="url" href="http://www.utahadvocates.com">
   <img itemprop="logo" src="http://www.utahadvocates.com/wp-content/uploads/2013/11/blue-advocates-logo-200.png"></a>
   <span itemprop="name">The Advocates Driggs Bills &amp; Day PC</span>
   <h3 itemref="Attorney">The Advocates Driggs Bills &amp; Day PC</h3>
   <div itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
     <span itemprop="streetAddress">331 South 600 East</span> <br>
     <span itemprop="addressLocality">Salt Lake City</span>,
     <span itemprop="addressRegion">Utah</span>
     <span itemprop="postalCode">84102</span>
   </div>
   Phone:  +1 801 386-5090  <br>
   <a href="http://bit.ly/1kkxq6L" itemprop="maps">Map</a>
</div>
    </article>
</section>


    <!-- Insert data:breadcrumbs:others schema *optional -->
<div xmlns:v="http://rdf.data-vocabulary.org/#" itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb" >
<?php if (function_exists('bread_crumb')) bread_crumb( ); ?>
</div>
</div>

</div>
</div>
<?php }?>