<?php the_header(); ?>

<?php
        query_posts('post_type=faq&order=ASC');
?>
<div id='content'>
<?php if (have_posts()) : ?>
        <h3>FAQs</h3>
        <div id='questions'>
            <ul>
                <?php while (have_posts()) : the_post(); ?>
                <li><a href='#answer<?php the_id() ?>'><?php the_title(); ?></a></li>
                <?php endwhile; ?>
            </ul>
        </div>
    <?php else : ?>
        <h3>Not Found</h3>
        <p>Sorry, No FAQs created yet.</p>
    <?php endif; ?>
</div>

<?php rewind_posts(); ?>

    <?php if (have_posts()) : ?>
        <div id='answers'>
            <ul>
                <?php while (have_posts()) : the_post(); ?>
                    <li id='answer<?php the_id(); ?>'>
                        <h4><?php the_title(); ?></h4>
                        <?php the_content(); ?>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </div>
<?php get_footer(); ?>