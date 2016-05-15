<?php
/*
Plugin Name: Github Activity Wordpress Plugin
Plugin URI: http://stopspazzing.com
Description: 
Version: 0.2
Author: Jeremy Zimmerman
Author URI: http://stopspazzing.com
*/

function add_awesomeness() {
  wp_enqueue_style( 'octicons', '//cdnjs.cloudflare.com/ajax/libs/octicons/2.0.2/octicons.min.css');
 
  wp_enqueue_style( 'githubactivitycss', plugin_dir_url( __FILE__ ) . '/css/github-activity.min.css', array(), '1.4');
  
  wp_enqueue_script( 'mustache', '//cdnjs.cloudflare.com/ajax/libs/mustache.js/0.7.2/mustache.min.js');
 
  wp_enqueue_script( 'githubactivityjs', plugin_dir_url( __FILE__ ) . '/js/github-activity.min.js', array(), '1.4');
}
add_action( 'wp_enqueue_scripts', 'add_awesomeness' );


function githubactivity_func( $atts ) {
?> 
  <div id="githubfeed"></div>
  <script>
    GitHubActivity.feed({
      username: "stopspazzing",
      repository: "", // optional
      selector: "#githubfeed",
      limit: 20 // optional
    });
  </script>
<?php
}
add_shortcode( 'github-activity', 'githubactivity_func' );

