<?php
/**
 * Automatically add Enqueued Scripts and Styles to WPGraphQL
 *
 * @link    https://github.com/emaildano/wp-graphql-enqueue
 * @since   0.1.0
 * @package WPGraphQL_Enqueue
 *
 * @wordpress-plugin
 * Plugin Name:       WPGraphQL for Scripts and Styles
 * Plugin URI:        https://github.com/emaildano/wp-graphql-enqueue
 * Description:       Automatically add Enqueued Scripts and Styles to WPGraphQL
 * Version:           0.1.0
 * Author:            Daniel Olson
 * Author URI:        https://www.github.com/emaildano
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-graphql-enqueue
 * Domain Path:       /languages
 */

add_action( 'graphql_register_types', 'register_dog_type' );

function register_dog_type() {
    register_graphql_object_type( 'Dog', [
      'description' => __( "Man's best friend", 'wp-graphql-enqueue' ),
      'fields' => [
        'name' => [
            'type' => 'String',
            'description' => __( 'The name of the dog', 'wp-graphql-enqueue' ),
        ],
        'breed' => [
            'type' => 'String',
            'description' => __( 'The Breed of the dog', 'wp-graphql-enqueue' ),
        ],
        'age' => [
            'type' => 'Integer',
            'description' => __( 'The age, in years, of the dog', 'wp-graphql-enqueue' ),
        ],
      ],
    ] );
}

add_action( 'graphql_register_types', 'register_dog_field' );

function register_dog_field() {

    register_graphql_field( 'RootQuery', 'enqueueScripts', [
      'description' => __( 'Get a dog', 'wp-graphql-enqueue' ),
      'type' => 'Dog',
      'resolve' => function() {

        // Here you need to return data that matches the shape of the "Dog" type. You could get
        // the data from the WP Database, an external API, or static values. For example sake,
        // we will just return a hard-coded array.
        return [
            'name' => 'Sparky',
            'breed' => 'Golden Retriever',
            'age' => 8
        ];

      }
    ] );

}