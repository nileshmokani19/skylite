<?php
add_theme_support( 'post-thumbnails' ); 


/**
 * Link all post thumbnails to the post permalink.
 *
 * @param string $html          Post thumbnail HTML.
 * @param int    $post_id       Post ID.
 * @param int    $post_image_id Post image ID.
 * @return string Filtered post image HTML.
 */


// <a href="../images/portfolio/thumb/01.jpg" data-fancybox-group="project-slider" class="fancybox">
// 	<img src="../images/portfolio/thumb/01.jpg" alt="Project Image">
// </a>
function wpdocs_post_image_html( $html, $post_id, $post_image_id ) {
	$img_url = wp_get_attachment_image_src ( $post_image_id, 'full', false);
    $html = '<a href="' . $img_url[0] . '"data-fancybox-group="project-slider"  class="fancybox" alt="' . esc_attr( get_the_title( $post_id ) ) . '">' . $html . '</a>';
    return $html;
}
add_filter( 'post_thumbnail_html', 'wpdocs_post_image_html', 10, 3 );
?>