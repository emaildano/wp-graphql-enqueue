<?php

abstract class StyleConnectionResolver extends WPGraphQL\Data\Connection\AbstractConnectionResolver
{

  public function get_items()
  {
    return $this->query;
  }

  public function get_query_args()
  { }

  public function get_query()
  {

    $styles = [];

    foreach (wp_styles()->registered as $style) {
      $styles[] = [
        'handle' => $style->handle,
        'src' => $style->src
      ];
    }

    return $styles;
  }

  public function should_execute()
  {
    return true;
  }
}
