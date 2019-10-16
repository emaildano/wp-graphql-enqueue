<?php

/**
 * Automatically add Enqueued Scripts and Styles to WPGraphQL
 *
 * @link    https://github.com/emaildano/wp-graphql-enqueue
 * @since   0.1.0
 * @package WPGraphQL_Enqueue
 *
 * @wordpress-plugin
 * Plugin Name:       WPGraphQL for WordPress Scripts and Styles
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

add_action('graphql_register_types', 'register_enqueue');

function register_enqueue()
{

  require('class-style-connection.php');

  register_graphql_object_type('EnqueuedStyle', [
    'description' => __("Man's best friend", 'wp-graphql-enqueue'),
    'fields' => [
      'handle' => [
        'type' => 'String',
        'description' => __('Handle name', 'wp-graphql-enqueue'),
      ],
      'src' => [
        'type' => 'String',
        'description' => __('Source URL', 'wp-graphql-enqueue'),
      ],
      'id' => [
        'type' => 'ID',
        'description' => __('Something v special', 'wp-graphql-enqueue'),
        'resolve' => function ($style) {
          return $style['handle'];
        }
      ],
    ],
  ]);

  register_graphql_connection([
    'fromType' => 'RootQuery',
    'toType' => 'EnqueuedStyle',
    'fromFieldName' => 'styles',
    'resolve' => function ($source, $args, $context, $info) {
      $resolver = new StyleConnectionResolver($source, $args, $context, $info);
      return $resolver->get_connection();
    },
    // 'resolveNode' => function ($node) {
    //   wp_send_json($node);
    // }
  ]);
}

add_action('graphql_register_types', 'register_dog_field');

function register_dog_field()
{

  register_graphql_field('RootQuery', 'enqueueScripts', [
    'description' => __('Get a dog', 'wp-graphql-enqueue'),
    'type' => 'Dog',
    'resolve' => function () {

      return [
        'name' => 'Sparky',
        'breed' => 'Golden Retriever',
        'age' => 8
      ];
    }
  ]);
}
