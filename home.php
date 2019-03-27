<?php get_header(); ?>
<section id="blog" class="container">

	<div class="blog">
		<div class="row">
			 <div class="col-md-8">
			<?php if ( have_posts() ) : query_posts('category_name=artikel') ?>
			<?php endif; ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<?php 
				if (has_post_thumbnail( $post->ID ) ){
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium');
					$thumb = '<a class="preview" rel="prettyPhoto" href="'.$image[0].'"><img class="img-responsive img-blog" width="100%" src="'.$image[0].'" /></a>';
				} else {
					$thumb = '';
				}
			?>
				<div class="blog-item">
					<div class="row">
						<div class="col-xs-12 col-sm-2 text-center">
							<div class="entry-meta">
								<span id="publish_date"><?php echo get_the_date('j M'); ?></span>
								<span><i class="fa fa-user"></i> <a href="#"><?php the_author(); ?></a></span>
								<span><i class="fa fa-comment"></i> <a href="blog-item.html#comments">2 Comments</a></span>
								<span><i class="fa fa-heart"></i><a href="#">56 Likes</a></span>
							</div>
						</div>
							
						<div class="col-xs-12 col-sm-10 blog-content">
							<?php echo $thumb; ?>
							<h2><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<h3><?php $content = get_the_content(); echo preg_replace('/<img[^>]+./','',$content); ?></h3>
						</div>
					</div>    
				</div><!--/.blog-item-->
			<?php endwhile; ?>
					
				<center>
				<?php wp_bootstrap_pagination(); ?>
				</center>
				<!--/.pagination-->
			</div><!--/.col-md-8-->

			<aside class="col-md-4">
				<div class="widget search">
					<form role="form" action="<?php echo home_url(); ?>" id="search-form" method="get">
							<input type="text" name="s" id="s" class="form-control search_box" autocomplete="off" placeholder="Temukan Artikel">
					</form>
				</div><!--/.search-->
				 
				<div class="widget categories">
					<h3>Kategori</h3>
					<div class="row">
						<div class="col-sm-12">
							<ul class="blog_category">
							<?php
								$args = array(
								'show_option_all'    => '',
								'show_count'         => 1,
								'orderby'            => 'name',
								'order'              => 'ASC',
								'style'              => 'list',
								'title_li'           => false,
								'show_option_none'   => __( '' ),
								'number'             => null,
								'echo'               => 1,
								'taxonomy'           => 'category',
								'walker'             => new Walker_Custom
								);
								wp_list_categories( $args );
								//$separator = ' ';
								/*$output = '';
								if ( ! empty( $categories ) ) {
									foreach( $categories as $category ) {
										$output .= '<li><a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . ' <span class="badge">' . esc_html( $category->category_count ) . '</span></a></li>' . $separator;
									}
									echo trim( $output, $separator );
								} */
								//$cat = str_replace(array('class="post-categories"','</a>'),array('class="blog_category"','<span class="badge">10</span></li>'),$categories);
								//echo $cat;
							?>
							</ul>
						</div>
					</div>                     
				</div><!--/.categories-->
				
				<div class="widget archieve">
					<h3>Archieve</h3>
					<div class="row">
						<div class="col-sm-12">
							<ul class="blog_archieve">
								<?php
								global $wpdb;
								$limit = 0;
								$year_prev = null;
								$months = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month ,	YEAR( post_date ) AS year, COUNT( id ) as post_count FROM $wpdb->posts WHERE post_status = 'publish' and post_date <= now( ) and post_type = 'post' GROUP BY month , year ORDER BY post_date DESC");
								foreach($months as $month) :
								?>
																<li><a href="<?php bloginfo('url') ?>/<?php echo $month->year; ?>/<?php echo date("m", mktime(0, 0, 0, $month->month, 1, $month->year)); ?>"><i class="fa fa-angle-double-right"></i>&nbsp;<?php echo date_i18n("F Y", mktime(0, 0, 0, $month->month, 1, $month->year)) ?> <span class="pull-right">(<?php echo $month->post_count; ?>)</span></a></li>
								<?php 
								if(++$limit >= 12) { break; }
								endforeach; ?>
							</ul>
						</div>
					</div>                     
				</div><!--/.archieve-->
			</aside>  
		</div><!--/.row-->
	</div>
</section><!--/#blog-->
<?php get_footer(); ?>