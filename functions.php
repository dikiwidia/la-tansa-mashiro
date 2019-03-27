<?php

if(!function_exists('themegu_widgets')) {
	function themegu_widgets() {  
	  register_sidebar( array(
		'name' 			=> 'Front-Page : Video',
		'id' 			=> 'video',
		'description' 	=> 'Video Youtube',
		'before_widget' => '',
		'after_widget' 	=> '',
		'before_title' 	=> '',
		'after_title' 	=> '',
	  ) );
	}
}
add_action( 'widgets_init', 'themegu_widgets' );


if(!function_exists('searchfilter')) {
	function searchfilter($query) {
		if ($query->is_search && !is_admin() ) {
			$query->set('post_type',array('post'));
		}
	return $query;
	}
}
add_filter('pre_get_posts','searchfilter');

if(!function_exists('top_menu')) {
	function top_menu() {
		require get_template_directory() . '/wp_bootstrap_walker.php';
		register_nav_menus( array(
			'primary' 	=> __( 'Navigasi Utama', 'collage' ),
			'secondary' => __( 'Navigasi Kaki', 'collage' ),
		) );
	}
	top_menu();// function called immediately
}
//
require get_template_directory() . '/wp_bootstrap_pagination.php';

//
add_filter( 'the_content_more_link', 'modify_read_more_link' );
function modify_read_more_link() {
	return '</p><p><a class="btn btn-primary pull-right readmore" href="' . get_permalink() . '">Baca Selengkapnya <i class="fa fa-angle-right"></i></a>';
}
//Walker Custom Categories
class Walker_Custom extends Walker_Category {  
	function start_lvl(&$output, $depth=1, $args=array()) {  
	$output .= "\n<ul class=\"dropdown-menu\">\n";  
	}  

	function end_lvl(&$output, $depth=0, $args=array()) {  
	$output .= "</ul>\n";  
	}  

	function start_el(&$output, $item, $depth=0, $args=array()) { 
	  //jumlah child
	$cats = get_categories('child_of='.$item->cat_ID);
	  // print_r($cats);

	$cat_name = esc_attr( $item->name );
	$cat_c = esc_attr( $item->category_count );
	if(strlen($cat_c)<2){
		$cat_count = '0'.$cat_c;
	} else {
		$cat_count = $cat_c;
	}
	if($item->parent==1){
	  $output .= "<li>"; //default <li class=\"dropdown\">
		//jika jumlah child lebih besar dari 0
	  if(count($cats)>0)
		$link = '<a class="dropdown-toggle" data-toggle="dropdown" href="#" >' . $cat_name . '<b class="caret"></b></a>';
	  else
		  // $link = '<a class="dropdown-toggle" data-toggle="dropdown" href="#" >' . $cat_name . '</a>';
		$link = '<a class="dropdown-toggle" data-toggle="dropdown" href="' . esc_url( get_term_link($item) ) . '" >' . $cat_name . '<span class="badge">' . $cat_count . '</span></a>';
	}
	else{
	  $output .= "<li>";
	  $link = '<a  href="' . esc_url( get_term_link($item) ) . '" >' . $cat_name . '<span class="badge">' . $cat_count . '</span></a>';
	}
	$output.=$link;
	}  
	function end_el(&$output, $item, $depth=0, $args=array()) {  
	$output .= "</li>\n";  
	}  
}  


//
function custom_excerpt($text) {
	global $post;
	if ( '' == $text ) {
	$text = get_the_content('');
	$text = apply_filters('the_content', $text);
	$text = str_replace(']]>', ']]>', $text);
        $text = strip_tags($text, '<p class="css-small">'); //Silakan tambahkan tag HTML lainnya jika diperlukan
        $excerpt_length = 12;
	$words = explode(' ', $text, $excerpt_length + 1);
	if (count($words)> $excerpt_length) {
		array_pop($words);
                //array_push($words, '<a class="btn-slide animation animated-item-3" href="'. get_permalink($post->ID) . '">' . 'Baca selengkapnya' . '</a>');
	       $text = implode(' ', $words);
	}
}
return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'custom_excerpt');

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 290, 220, true ); // 50 pixels wide by 50 pixels tall, crop mode 

//fungsi beri class <p> di the_content

function hotnews($content){
    return preg_replace('/<p([^>]+)?>/', '<p$1 class="css-small">', $content, 20);
}
add_filter('the_content', 'hotnews');
?>