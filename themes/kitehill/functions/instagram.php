<?php
/**
 * Return JSON data from specified URL
 * @param  string $url Zendesk API feed URL
 * @return string      undecoed JSON string
 */

define(INSTAGRAM_MAX_RESULTS, 12);

function get_instagram_feed($url) {

  // init CURL
  $ch = curl_init();

  // set curl_opts
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);

  // exec curl
  $api = curl_exec($ch);

  // check for error
  if ($api === FALSE) {
    // @todo: handle errors
    echo 'cURL Error: ' , curl_error($ch);
  }

  // close curl
  curl_close($ch);

  // return JSON string
  return $api;

}

function create_instagram_data_array($results, $items) {
  
  // check against max results
  if (count($items) <= INSTAGRAM_MAX_RESULTS) {
    
    foreach ($results->data as $item) {
      
      $items[] = $item;
      
      if (count($items) == INSTAGRAM_MAX_RESULTS) {
        break;
      }
      
    }
    
    // Only proceed if there are less items than max
    if (count($items) < INSTAGRAM_MAX_RESULTS) {
      
      // only proceed if we have a pagination next url
      if ($results->pagination->next_url) {
        $contents = get_instagram_feed($results->pagination->next_url);
        $results = json_decode($contents);
        // loop through again and check against max results
        $items = create_instagram_data_array($results, $items);
      }
      
    }
    
  }
  
  return $items;

}

/*function d($s) {
  echo '<pre>';
  print_r($s);
  echo '</pre>';
}

function dd($s) {
  d($s);
  exit();
}*/