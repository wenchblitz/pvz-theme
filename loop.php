<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<!--<div id="post-0" class="post error404 not-found">-->
    	<div class="no-entry">
            <h1 class="entry-title"><?php _e( 'No Entry Found!', 'twentyten' ); ?></h1>
            <div class="entry-content">
                <p><?php //_e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p>
                <?php //get_search_form(); ?>
            </div><!-- .entry-content -->
        <div class="clear"></div>
        </div><!-- .no-entry -->
    <div class="clear"></div>
	<!--</div>--><!-- #post-0 -->
<?php endif; ?>

<?php
	/* Start the Loop.
	 *
	 * In Twenty Ten we use the same loop in multiple contexts.
	 * It is broken into three main parts: when we're displaying
	 * posts that are in the gallery category, when we're displaying
	 * posts in the asides category, and finally all other posts.
	 *
	 * Additionally, we sometimes check for whether we are on an
	 * archive page, a search page, etc., allowing for small differences
	 * in the loop on each template without actually duplicating
	 * the rest of the loop that is shared.
	 *
	 * Without further ado, the loop:
	 */ ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php /* How to display posts. */ ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
    
    <!--CATEGORY, ARCHIVES & SEARCHES-->
    <div class="entry-summary">
        <div class="image-content">
            <?php the_post_thumbnail(array(216,216)); ?> 
        </div><!--//image-content-->
        
        <div class="post-details">            
     		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>         
             <?php the_excerpt(); ?>
        </div><!--//post-details-->
      
      		<div class="clear"></div>
      	  
        <div class="entry-meta">
            <span class="right comments-link">
				<?php if ('open' == $post->comment_status) : ?>
                
                <!--If comments are open, but there are no comments.-->
                    <?php comments_popup_link( __( 'Leave a comment', 'twentyten' ), __( '1 Comment', 'twentyten' ), __( '% Comments', 'twentyten' ) ); ?>
                
                <?php else : // comments are closed ?>                        
                <!--If comments are closed.-->
                <a class="comments-closed" href="<?php the_permalink() ?>">Comments Closed!</a>
                <?php endif; ?>						
            </span>    
					
			<span class="left posted-in"><?php _e("Posted in: "); the_category(', ')?></span>
        </div><!--.entry-meta-->  
    </div><!--.entry-summary-->
    <!--END OF CATEGORY, ARCHIVES & SEARCHES-->
            
	<?php else : ?>
        		
    <!--NORMAL POST-->
    <div class="entry-content">            
        <div class="image-content">
            <?php the_post_thumbnail(array(211,159)); ?> 
        </div><!--//image-content-->
        
        <div class="post-details">            
     		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>         
            <?php the_content( __( 'Read More <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?>
        </div><!--//post-details-->
      
      		<div class="clear"></div>
      	  
        <div class="entry-meta">
            <span class="right comments-link">
				<?php if ('open' == $post->comment_status) : ?>
                
                <!--If comments are open, but there are no comments.-->
                    <?php comments_popup_link( __( 'Leave a comment', 'twentyten' ), __( '1 Comment', 'twentyten' ), __( '% Comments', 'twentyten' ) ); ?>
                
                <?php else : // comments are closed ?>                        
                <!--If comments are closed.-->
                <a class="comments-closed" href="<?php the_permalink() ?>">Comments Closed!</a>
                <?php endif; ?>						
            </span>    
					
			<span class="left posted-in"><?php _e("Posted in: "); the_category(', ')?></span>
        </div><!--.entry-meta-->                                        
    </div><!--.entry-content-->
    <!--END OF A NORMAL POST-->
 
        
	<?php endif; ?>
</article><!--#post-##-->

		<?php comments_template( '', true ); ?>

<?php endwhile; // End the loop. Whew. ?>

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
    <div id="nav-below" class="navigation">
        <div class="nav-previous left"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Previous', 'twentyten' ) ); ?></div>
        <div class="nav-next right"><?php previous_posts_link( __( 'Next <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
    </div><!-- #nav-below -->
<?php endif; ?>