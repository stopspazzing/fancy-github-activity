<?php
/*
Plugin Name: Fancy Github Activity
Description: Displays Github activity in a fancy way via shortcode.
Version: 1.0
Author: Jeremy Zimmerman
*/

function add_awesomeness() {
  wp_enqueue_style( 'octicons', '//cdnjs.cloudflare.com/ajax/libs/octicons/2.0.2/octicons.min.css');

  wp_enqueue_style( 'githubactivitycss', plugin_dir_url( __FILE__ ) . '/css/github-activity.min.css', array(), '1.4');

  wp_enqueue_script( 'mustache', '//cdnjs.cloudflare.com/ajax/libs/mustache.js/0.7.2/mustache.min.js');

  wp_enqueue_script( 'githubactivityjs', plugin_dir_url( __FILE__ ) . '/js/github-activity.min.js', array(), '1.4');
}
add_action( 'wp_enqueue_scripts', 'add_awesomeness' );


function githubactivity_func( $atts ) {
$atts = shortcode_atts(
		array(
			'username' => 'stopspazzing',
			'repository' => '',
      'limit' => '20',
		), $atts, 'github-activity' );?>
  <style>.gha-footer,.gha-header{width: calc(100% - 1px);}.gha-footer{border-top: none;height: auto;}</style>
  <div id="github-activity-feed"></div>
  <script>
    var name = "<?php echo $atts['username'];?>";
    var rep = "<?php echo $atts['repository'];?>";
    var max = <?php echo $atts['limit'];?>;
    GitHubActivity.feed({
      username: name,
      repository: rep, // optional
      selector: "#github-activity-feed",
      limit: max // optional
    });
  </script>
<?php
}
add_shortcode( 'github-activity', 'githubactivity_func' );
