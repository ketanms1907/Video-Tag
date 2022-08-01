<?php
$args = array(
'post_type' => 'videos',
'posts_per_page' => -1,
'post_status' => 'publish',
'order' => 'DESC',
'fields' => 'ids',
'meta_query' => array(
array(
'key' => 'display_customer_area',
'value'=> 'display-customer-area',
'type' => 'CHAR',
'compare'=> 'LIKE'
)
));
$video_posts = get_posts($args);
$vcategories = array();
foreach( $video_posts as $videoid ){
$args = array("fields" => "ids");
$video_cat = wp_get_post_terms( $videoid, 'vd_tags', $args );
$vcategories = array_merge( $vcategories, $video_cat );
}
$vcategory = array_unique($vcategories);
?>
<ul>
<?php
foreach($vcategory as $vcat)
{
$terms = get_term( $vcat, 'vd_tags');
//print_r($terms);
?>
<li>
<a href="<?php echo get_term_link($terms->term_id); ?>"><?php echo $terms->name; ?></a>
</li>
<?php
}
?>
</ul>
