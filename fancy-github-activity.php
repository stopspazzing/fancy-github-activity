<?php
/*
Plugin Name: Fancy Github Activity
Plugin URI: https://github.com/stopspazzing/fancy-github-activity
Description: Displays Github activity in a fancy way via shortcode.
Version: 1.0.3
Author: Jeremy Zimmerman
Author URI: https://stopspazzing.com
*/

function fancy_github_activity_func() {
  wp_enqueue_style( 'fancy-github-activity-octicons', plugin_dir_url( __FILE__ ) . '/css/octicons.min.css', array(), '2.0.2');

  wp_enqueue_style( 'fancy-github-activity-css', plugin_dir_url( __FILE__ ) . '/css/github-activity.min.css', array(), '1.4');

  wp_enqueue_script( 'fancy-github-activity-mustache', plugin_dir_url( __FILE__ ) . '/js/mustache.min.js', array(), '0.7.2');

  wp_enqueue_script( 'fancy-github-activity-js', plugin_dir_url( __FILE__ ) . '/js/github-activity.min.js', array(), '1.4');
}
add_action( 'wp_enqueue_scripts', 'fancy_github_activity_func' );

function fancy_github_activity_code( $atts ) {
$atts = shortcode_atts(
		array(
			'username' => 'stopspazzing',
			'repository' => '',
      'limit' => '20',
		), $atts, 'fancy-github-activity' );?>
  <div id="fancy-github-activity-feed"></div>
  <script>
    var name = "<?php echo $atts['username'];?>";
    var rep = "<?php echo $atts['repository'];?>";
    var max = <?php echo $atts['limit'];?>;
    GitHubActivity.feed({
      username: name,
      repository: rep, // optional
      selector: "#fancy-github-activity-feed",
      limit: max // optional
    });
  </script>
<?php
}
add_shortcode( 'fancy-github-activity', 'fancy_github_activity_code' );
