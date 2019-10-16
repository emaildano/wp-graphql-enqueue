<?php

class StyleConnectionResolver extends WPGraphQL\Data\Connection\AbstractConnectionResolver
{

  public function get_items()
  {
    return $this->query;
  }

  public function get_query_args()
  { }

  public function get_query()
  {
    // $styles = wp_styles()->registered;
    // wp_send_json($styles);
    // return $styles;

    $styles = [];

    foreach (wp_styles()->registered as $style) {
      $styles[] = [
        'handle' => $style->handle,
        'src' => $style->src
      ];
    }

    return $styles;

    // return [
    //   'colors' => [
    //     'handle' => 'colors',
    //     'src' => 'colors.css',
    //   ]
    // ];
  }

  public function should_execute()
  {
    return true;
  }
}
