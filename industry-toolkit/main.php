<?php

/*
Plugin Name: Industry Toolkit
Plugin URI: http://wordpress.org/plugins/industry/
Description: This is not just a plugin, This plugin for industry  theme.
Author: Solaiman
Version: 1.0
Author URI: http://rrf.com/
*/

//Our ShortCode
function industry_demo_query($atts){
    extract( shortcode_atts( array(
        'count' => 2,
    ), $atts) );


    $arg = array(
    	'post_type' => 'page',
    	'posts_per_page' => $count,
    );


    $get_post = new WP_Query($arg);

    $plist_markup = '<div class="row">';
    	while($get_post->have_posts()) : $get_post->the_post();
    		$post_id = get_the_ID();
    		$plist_markup .= '<div class="col-md-4"><li>'.get_the_title($post_id).'</li></div';
    	endwhile;
    $plist_markup .= '</div>'; 

    wp_reset_query();

    return $plist_markup;
   
}
add_shortcode('p_list', 'industry_demo_query');  


//Our ShortCode
function industry_section_title_shortcode($atts){
    extract( shortcode_atts( array(
        'sub_title' => '',
        'title' => '',
        'description' => '',
    ), $atts) );

	$industry_section_title_markup ='<div class="industry_section_title">';

	if(!empty($sub_title)){
		$industry_section_title_markup .= '<h4>'.esc_html( $sub_title ).'</h4>';
	}

	if(!empty($title)){
		$industry_section_title_markup .= '<h2>'.esc_html( $title ).'</h2>';
	}
	
	if(!empty($description)){
		$industry_section_title_markup .= ''.wpautop( esc_html( $description ) ).'';
	}

	$industry_section_title_markup .= '</div>';
   




    return $industry_section_title_markup;
   
}
add_shortcode('industry_section_title', 'industry_section_title_shortcode');  

