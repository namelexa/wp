<?php
/**
 * @package Store
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-12 col-sm-12 grid blog_mixup'); ?>>

    <div class="featured-thumb col-md-6 col-sm-12">
        <div class="postedon"><?php the_time('j, M Y'); ?></div>
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_post_thumbnail('pop-thumb'); ?></a>
        <?php else: ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><img src="<?php echo get_template_directory_uri()."/assets/images/placeholder2.jpg"; ?>"></a>
        <?php endif; ?>
    </div><!--.featured-thumb-->

    <div class="out-thumb col-md-6 col-sm-12">
        <header class="entry-header">
            <h1 class="entry-title title-font"><a class="hvr-underline-reveal" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
            <span class="entry-excerpt"><?php echo substr(get_the_excerpt(),0,100).(get_the_excerpt() ? "..." : "" ); ?></span>
            <span class="readmore next page-numbers"><a class="hvr-underline-from-center" href="<?php the_permalink() ?>"><?php _e('Read More','store'); ?></a></span>
        </header><!-- .entry-header -->
    </div><!--.out-thumb-->



</article><!-- #post-## -->
