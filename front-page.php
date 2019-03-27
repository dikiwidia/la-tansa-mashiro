<?php get_header(); ?>
<section id="main-slider" class="no-margin">
	<div class="carousel slide">
		<ol class="carousel-indicators">
			<li data-target="#main-slider" data-slide-to="0" class="active"></li>
			<li data-target="#main-slider" data-slide-to="1"></li>
			<li data-target="#main-slider" data-slide-to="2"></li>
			<li data-target="#main-slider" data-slide-to="3"></li>
			<li data-target="#main-slider" data-slide-to="4"></li>
		</ol>
		<div class="carousel-inner">
			<div class="item active" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/slider/bg1.jpg)">
				<div class="container">
					<div class="row slide-margin">
						<div class="col-sm-6">
							<div class="carousel-content">
								<h1 class="animation animated-item-1 shadow">Selamat datang di Perguruan Tinggi La Tansa Mashiro</h1>
								<h2 class="animation animated-item-2 shadow">Kampus hijau, berakhlakul karimah</h2>
								<a class="btn-slide animation animated-item-3" href="#">Informasi Pendaftaran</a>
							</div>
						</div>
					</div>
				</div>
			</div><!--/.item-->
		<?php
		query_posts(array(
			'category_name' => 'headline', // get posts by category name
			'posts_per_page' => 4 // all posts
		));
		?>
		<?php while(have_posts()): the_post(); ?>
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
		<?php endif; ?>
			<div class="item" style="background-image: url(<?php echo $image[0]; ?>)">
				<div class="container">
					<div class="row slide-margin">
						<div class="col-sm-6">
							<div class="carousel-content">
								<h1 class="animation animated-item-1 shadow"><?php the_title(); ?></h1>
								<h2 class="animation animated-item-2 shadow"><?php echo get_the_excerpt(); ?> ...</h2>
								<a class="btn-slide animation animated-item-3" href="<?php the_permalink(); ?>">Baca Selengkapnya</a>
							</div>
						</div>
					</div>
				</div>
			</div><!--/.item-->
		<?php endwhile; ?>
		</div><!--/.carousel-inner-->
	</div><!--/.carousel-->
	<a class="prev hidden-xs" href="#main-slider" data-slide="prev">
		<i class="fa fa-chevron-left"></i>
	</a>
	<a class="next hidden-xs" href="#main-slider" data-slide="next">
		<i class="fa fa-chevron-right"></i>
	</a>
</section><!--/#main-slider-->

<section id="content" class="shortcode-item">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-7">
				<?php
				query_posts(array(
					'category_name' => 'headline', // get posts by category name
					'posts_per_page' => 4 // all posts
				));
				?>
				<!-- Nav tabs -->
				<div class="card">
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Info Akademik</a></li>
						<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Info Fakultas</a></li>
						<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Info Beasiswa</a></li>
						<li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Unduhan</a></li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content card">
						<div role="tabpanel" class="tab-pane active" id="home">
								<?php
								query_posts(array(
									'category_name' => 'informasi-akademik', // get posts by category name
									'posts_per_page' => 3 // all posts
								));
								?>
								<?php while ( have_posts() ) : the_post(); ?>
								<?php 
									if (has_post_thumbnail( $post->ID ) ){
										$image_card = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'small');
										$thumb_card = ""; //'<img class="img-responsive img-blog" style="float:left;" src="'.$image_card[0].'" />';
									} else {
										$thumb_card = '';
									}
								?>
								<h3><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<p><?php echo $thumb_card; ?><?php $content = get_the_excerpt(); echo preg_replace('/<img[^>]+./','',$content); ?> ...</p><hr />
								<?php endwhile; ?>
								<p class="pull-right"><a href="<?php echo get_site_url(); ?>/category/informasi-akademik/" class="btn btn-success">Lihat Lebih Banyak ...</a></p><br />
						</div>
						<div role="tabpanel" class="tab-pane" id="profile">
							<?php
							query_posts(array(
								'category_name' => 'informasi-fakultas', // get posts by category name
								'posts_per_page' => 3 // all posts
							));
							?>
							<?php while ( have_posts() ) : the_post(); ?>
							<?php 
								if (has_post_thumbnail( $post->ID ) ){
									$image_card = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'small');
									$thumb_card = ""; //'<img class="img-responsive img-blog" style="float:left;" src="'.$image_card[0].'" />';
								} else {
									$thumb_card = '';
								}
							?>
							<h3><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><?php echo $thumb_card; ?><?php $content = get_the_excerpt(); echo preg_replace('/<img[^>]+./','',$content); ?> ...</p><hr />
							<?php endwhile; ?>
							<p class="pull-right"><a href="<?php echo get_site_url(); ?>/category/informasi-fakultas/" class="btn btn-success">Lihat Lebih Banyak ...</a></p><br />
						</div>
						<div role="tabpanel" class="tab-pane" id="messages">
							<?php
							query_posts(array(
								'category_name' => 'informasi-beasiswa', // get posts by category name
								'posts_per_page' => 3 // all posts
							));
							?>
							<?php while ( have_posts() ) : the_post(); ?>
							<?php 
								if (has_post_thumbnail( $post->ID ) ){
									$image_card = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'small');
									$thumb_card = ""; //'<img class="img-responsive img-blog" style="float:left;" src="'.$image_card[0].'" />';
								} else {
									$thumb_card = '';
								}
							?>
							<h3><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><?php echo $thumb_card; ?><?php $content = get_the_excerpt(); echo preg_replace('/<img[^>]+./','',$content); ?> ...</p><hr />
							<?php endwhile; ?>
							<p class="pull-right"><a href="<?php echo get_site_url(); ?>/category/informasi-beasiswa/" class="btn btn-success">Lihat Lebih Banyak ...</a></p><br />
						</div>
						<div role="tabpanel" class="tab-pane" id="settings">
							<?php
							query_posts(array(
								'category_name' => 'unduhan', // get posts by category name
								'posts_per_page' => 10 // all posts
							));
							?>
							<?php while ( have_posts() ) : the_post(); ?>
							<?php 
								if (has_post_thumbnail( $post->ID ) ){
									$image_card = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'small');
									$thumb_card = ""; //'<img class="img-responsive img-blog" style="float:left;" src="'.$image_card[0].'" />';
								} else {
									$thumb_card = '';
								}
							?>
							<p><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></p><hr />
							<?php endwhile; ?>
							<p class="pull-right"><a href="<?php echo get_site_url(); ?>/category/unduhan/" class="btn btn-success">Lihat Lebih Banyak ...</a></p><br />
						</div>
					</div>
				</div>              
            </div><!--/.col-xs-12 col-sm-12 col-md-7-->
			<div class="col-xs-12 col-sm-12 col-md-5">
				<?php if ( ! dynamic_sidebar( 'video' ) ) : ?>
					<iframe width="100%" height="305" src="https://www.youtube.com/embed/iGZUzKBIgD0" frameborder="0" allowfullscreen></iframe>
				<?php endif; ?>
			</div><!--/.col-xs-12 col-sm-12 col-md-5-->
		</div>
	</div>
</section>	
<section id="content" class="shortcode-item">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-4 col-md-2">
				<a href="#"><img class="apps" width="100%" src="<?php echo get_template_directory_uri(); ?>/assets/images/applications/siakad_akbid.jpg"; ?></img></a>
            </div><!--/.col-xs-12 col-sm-12 col-md-7-->
			<div class="col-xs-12 col-sm-4 col-md-2">
				<a href="#"><img class="apps" width="100%" src="<?php echo get_template_directory_uri(); ?>/assets/images/applications/siakad_stie.jpg"; ?></img></a>
            </div><!--/.col-xs-12 col-sm-12 col-md-7-->
			<div class="col-xs-12 col-sm-4 col-md-2">
				<a href="#"><img class="apps" width="100%" src="<?php echo get_template_directory_uri(); ?>/assets/images/applications/siakad_stai.jpg"; ?></img></a>
            </div><!--/.col-xs-12 col-sm-12 col-md-7-->
			<div class="col-xs-12 col-sm-4 col-md-2">
				<a href="#"><img class="apps" width="100%" src="<?php echo get_template_directory_uri(); ?>/assets/images/applications/ejurnal.jpg"; ?></img></a>
            </div><!--/.col-xs-12 col-sm-12 col-md-7-->
			<div class="col-xs-12 col-sm-4 col-md-2">
				<a href="#"><img class="apps" width="100%" src="<?php echo get_template_directory_uri(); ?>/assets/images/applications/elearning.jpg"; ?></img></a>
            </div><!--/.col-xs-12 col-sm-12 col-md-7-->
			<div class="col-xs-12 col-sm-4 col-md-2">
				<a href="#"><img class="apps" width="100%" src="<?php echo get_template_directory_uri(); ?>/assets/images/applications/tracer.jpg"; ?></img></a>
            </div><!--/.col-xs-12 col-sm-12 col-md-7-->
		</div>
	</div>
</section>	
<br/>
<section id="gmap" style="padding: 0;">
	<div class="gmap-area" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/map.jpg);">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 text-center">
					<div class="gmap">
						<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.3840330469575!2d106.24984131430108!3d-6.344286663835718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e4217334b829f93%3A0xe6fd57d913f67095!2sPerguruan+TInggi+La+Tansa+Mashiro!5e0!3m2!1sid!2sid!4v1459149297027"></iframe>
					</div>
				</div>

				<div class="col-sm-6 map-content">
					<ul class="row">
						<li class="col-sm-12">
							<address>
								<h5>Sekretariat Perguruan Tinggi La Tansa Mashiro</h5>
								<p>Jl. Soekarno-Hatta Pasir Jati <br />
								Rangkasbitung, 42317</p>
								<p>Telp: (0252) 207163 <br>
								Surel :info@latansamashiro.ac.id</p>
							</address>
							<address>
								<h5>Informasi PMB</h5>
								<p>Jl. Soekarno-Hatta Pasir Jati <br />
								Rangkasbitung, 42317</p>
								<p>Telp: (0252) 207163 <br>
								Surel :pmb@latansamashiro.ac.id</p>
							</address>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>  <!--/gmap_area -->
<?php get_footer(); ?>