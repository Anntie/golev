<?php get_header(); ?>
<section id="blog">
	<div id="blog-title"></div>
	<div id="content" class="row gutters">
		<div id="posts" class="column-11" style="background-color:#fff;">
			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="post-date">
					<a href="#">
						<span class="month"><?php echo get_the_date('M'); ?></span>
						<span class="day"><?php echo get_the_date('d'); ?></span>
					</a>
				</div>
				<div class="post-content">
					<div class="post-title">
						<h2 class="post-title-h1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="post-meta">
							<h6><?php _e('Posted by ', 'golev'); ?><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a> / <a href="#"><?php the_category(", "); ?></a></h6>
						</div>
					</div>
					<div class="post-body">
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>" class="continue-link"><?php _e('Continue reading...', 'golev'); ?></a>
					</div>
					<div class="post-tags">
						<?php the_tags("", " "); ?>
					</div>
				</div>
			</article>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</section>
<?php get_footer(); ?>