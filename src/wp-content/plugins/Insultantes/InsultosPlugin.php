<?php

/**
 * @package Test_Words
 * @version 1.7.2
 */
/*
Plugin Name: Insultos Cambiaso Trolazo
Plugin URI: http://wordpress.org/plugins/hello-words/
Author: Lidier Máximo López Raccioppe
Version: 1.0.0
Author URI: http://lidier.com.ve/
*/

/**
 * Cambia las palabras insultantes por palabras menos insultantes
 */
function createTable(){
    global $wpdb;

$table_name = $wpdb->prefix . 'insultos';
$charset_collate = $wpdb->get_charset_collate();
$sql = "CREATE TABLE IF NOT EXISTS $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    insulto varchar(255) NOT NULL,
    palabra varchar(255) NOT NULL,
    PRIMARY KEY  (id)
) $charset_collate;";
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );

// Ahora insertar 5 palabras insultantes y si ya esta insertado no lo vuelve a inserta

    $wpdb->insert(
        $table_name,
        array(
            'insulto' => 'trolazo',
            'palabra' => 'engañador',
        ));
    $wpdb->insert(
        $table_name,
        array(
            'insulto' => 'putazo',
            'palabra' => 'libertino'
        ));
    $wpdb->insert(
        $table_name,
        array(
            'insulto' => 'mariconazo',
            'palabra' => 'otracalle'
        ));
    $wpdb->insert(
        $table_name,
        array(
            'insulto' => 'pelotudazo',
            'palabra' => 'deficiente'
        ));
    $wpdb->insert(
        $table_name,
        array(
            'insulto' => 'pelotudazo',
            'palabra' => 'mentalemente deficiente'
        ));
// Hacer un select entero de la tabla insultos y que devuelve los insultos
$insultos = $wpdb->get_results("SELECT * FROM $table_name");
// por cada palabra insultante hacer un str_replace

foreach ($insultos as $insulto) {
    add_filter('the_content', function ($text) use ($insulto) {
        return str_replace($insulto->insulto, $insulto->palabra, $text);
    });
}
}
add_action('plugins_loaded','createTable');






