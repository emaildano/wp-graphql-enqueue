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

  public function get_loader_name()
  {
    return 'plugin';
  }

  public function get_ids(){
    $ids     = [];
		$queried = $this->get_query();

		if ( empty( $queried ) ) {
			return $ids;
		}

		foreach ( $queried as $key => $item ) {
			$ids[ $key ] = $item;
		}

		return $ids;
  }

  public function is_valid_offset( $offset ){
    return true;
  }
}
