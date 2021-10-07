<?php

namespace App;

function getPermalinkByTemplate($template): string {
	global $wpdb;

	$template = 'template-' . $template . '.blade.php';

	$page_id = $wpdb->get_var("SELECT `post_id` FROM $wpdb->postmeta WHERE `meta_key` = '_wp_page_template' AND `meta_value` = '{$template}'");

	if ( empty($page_id) ) {
		return false;
	}

	return get_permalink($page_id);
}

function getYoutubeEmbedUrl ($url): string {
	$parsedUrl = parse_url($url);
	parse_str(@$parsedUrl['query'], $queryString);
	$youtubeId = @$queryString['v'] ?? substr(@$parsedUrl['path'], 1);

	return "https://youtube.com/embed/{$youtubeId}";
}
