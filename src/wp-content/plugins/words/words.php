<?php

/**
 * @package Test_Words
 * @version 1.7.2
 */
/*
Plugin Name: Test Words
Plugin URI: http://wordpress.org/plugins/hello-words/
Description: Test plugin to learn how to create a plugin.
Author: Lidier Máximo López Raccioppe
Version: 1.0.0
Author URI: http://lidier.com.ve/
*/

/**
 * Cambia la palabra WordPress por WordPressDAM
 * @param $text
 * @return array|string|string[]
 */
function renym_wordpress_typo_fix( $text ) {
    return str_replace( 'WordPress', 'WordPressDAM', $text );
}

add_filter( 'the_content', 'renym_wordpress_typo_fix' );






