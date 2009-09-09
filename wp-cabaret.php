<?php
/*
Plugin Name: The Wordpress Cabaret
Plugin URI: http://unalignedcode.wordpress.com/wordpress-cabaret/
Description: Creator of random poetry out of your posts and comments.
Author: unalignedcoder
Author URI: http://unalignedcode.wordpress.com
Version: 0.5
*/

$dir = basename(dirname(__FILE__));
if ($dir == 'plugins') $dir = '';
else $dir = $dir . '/';	
$path_to_dada = get_option('siteurl') . '/wp-content/plugins/' . $dir;
define('WP_CABARET_PATH', $path_to_dada);
include ('cabaret-functions.php');

function make_manage_page(){
	
	$action = !empty($_REQUEST['action']) ? $_REQUEST['action'] : '';
	?>
    
	<div class="wrap"><h2>The Wordpress Cabaret</h2>	
    <p>I named this plugin "Cabaret" because of the "<a href="http://en.wikipedia.org/wiki/Cabaret_Voltaire_(Z&uuml;rich)">Cabaret Voltaire</a>", 
    the nightclub founded by Dadaists in Zurich in 1916. <br />
	Like futurism, <a href="http://en.wikipedia.org/wiki/Dada">Dada</a> was probably one of the few forms of Art of the past century 
    that could have performed even better using computers, since those artists loved so much random stuff, graphics, fonts and technology in general.<br />
    This plugin is incomplete for now, and it can't do a lot to entertain you.<br />
    Well, poems and clouds, as you can see.<br />
    By no means I have stopped developing it: in the work it has more of this and visual experiences (!) too. 
    But since I am not going to have much time to work on it for the next few months or so, 
    I decided to release this reduced version of it.<br /><br />
    Click on function names to make Cabaret Art out of your wordpress blog. It requires <a href="http://akismet.com/">Akismet</a> 
    and a lot of spam for anything with spam in it to work.
    <br />These functions can be used to include cabaret content anywhere on your blog.</p>
    </div>
	
	<div class="wrap"><h2>Poetry of three genres</h2>
	
		<?php 
		if ( $action == 'poetry_spam' ) {
		?>   
	
		<div style="padding:20px">
			<a href="edit.php?page=<?php echo basename(__FILE__); ?>&amp;action=poetry_post">
			<code><font color="#FF0000">&lt;?php&nbsp;<font color="#000000">make_post_poetry();</font>?&gt;</font></code></a> |   
			<a href="edit.php?page=<?php echo basename(__FILE__); ?>&amp;action=poetry_comment">
			<code><font color="#FF0000">&lt;?php&nbsp;<font color="#000000">make_comment_poetry();</font>?&gt;</font></code></a> |  
			<strong><code><font color="#FF0000">&lt;?php&nbsp;<font color="#000000">make_spam_poetry();</font>?&gt;</font></code></strong>
		</div>
	
		<div style="font-size:18px; font-family:Times New Roman, Times, serif; padding:20px">
		<em><?php make_spam_poetry(); ?></em></div>              
		<div style="padding:20px">( <a href="JavaScript:location.reload(true);">another one</a> )</div>
		
		<?php }
		elseif ( $action == 'poetry_comment' ) {
		?>   
		
		<div style="padding:20px">
			<a href="edit.php?page=<?php echo basename(__FILE__); ?>&amp;action=poetry_post">
			<code><font color="#FF0000">&lt;?php&nbsp;<font color="#000000">make_post_poetry();</font>?&gt;</font></code></a> |   
			<strong><code><font color="#FF0000">&lt;?php&nbsp;<font color="#000000">make_comment_poetry();</font>?&gt;</font></code></strong> |  
			<a href="edit.php?page=<?php echo basename(__FILE__); ?>&amp;action=poetry_spam">
			<code><font color="#FF0000">&lt;?php&nbsp;<font color="#000000">make_spam_poetry();</font>?&gt;</font></code></a>
		 </div>
		 
		<div style="font-size:18px; font-family:Times New Roman, Times, serif; padding:20px">
		<em><?php make_comment_poetry(); ?></em></div>              
		<div style="padding:20px">( <a href="JavaScript:location.reload(true);">another one</a> )</div>
		
		<?php }
		 elseif ( $action == 'poetry_post' ) {
		 ?>
			  
		<div style="padding:20px">
			<strong><code><font color="#FF0000">&lt;?php&nbsp;<font color="#000000">make_post_poetry();</font>?&gt;</font></code></strong> |   
			<a href="edit.php?page=<?php echo basename(__FILE__); ?>&amp;action=poetry_comment">
			<code><font color="#FF0000">&lt;?php&nbsp;<font color="#000000">make_comment_poetry();</font>?&gt;</font></code></a> |  
			<a href="edit.php?page=<?php echo basename(__FILE__); ?>&amp;action=poetry_spam">
			<code><font color="#FF0000">&lt;?php&nbsp;<font color="#000000">make_spam_poetry();</font>?&gt;</font></code></a>
		</div>
		
		<div style="font-size:18px; font-family:Times New Roman, Times, serif; padding:20px">
		<em><?php make_post_poetry(); ?></em></div>              
		<div style="padding:20px">( <a href="JavaScript:location.reload(true);">another one</a> )</div>
	
		<?php }
		 else {
		 ?>
			  
		<div style="padding:20px">
			<a href="edit.php?page=<?php echo basename(__FILE__); ?>&amp;action=poetry_post">
			<code><font color="#FF0000">&lt;?php&nbsp;<font color="#000000">make_post_poetry();</font>?&gt;</font></code></a> |   
			<a href="edit.php?page=<?php echo basename(__FILE__); ?>&amp;action=poetry_comment">
			<code><font color="#FF0000">&lt;?php&nbsp;<font color="#000000">make_comment_poetry();</font>?&gt;</font></code></a> |  
			<a href="edit.php?page=<?php echo basename(__FILE__); ?>&amp;action=poetry_spam">
			<code><font color="#FF0000">&lt;?php&nbsp;<font color="#000000">make_spam_poetry();</font>?&gt;</font></code></a>
	</div>    
	
		<?php } ?>
			 
	</div>
	
	
	
	<div class="wrap"><h2>Clouds of spam</h2>
	
		<?php 
		if ( $action == 'cloud_1' ) {
		?>
							
		<div style="padding:20px">
			<strong><code><font color="#FF0000">&lt;?php&nbsp;<font color="#000000">make_cloud_1();</font>?&gt;</font></code></strong> | 
			<a href="edit.php?page=<?php echo basename(__FILE__); ?>&amp;action=cloud_2">
			<code><font color="#FF0000">&lt;?php&nbsp;<font color="#000000">make_cloud_2();</font>?&gt;</font></code></a> 
		</div>
		<div style="width:600px;padding:20px"><?php make_cloud_1(); ?></div>
		
		<?php }
		elseif ( $action == 'cloud_2' ) {
		?>            
							
		<div style="padding:20px">
			<a href="edit.php?page=<?php echo basename(__FILE__); ?>&amp;action=cloud_1">
			<code><font color="#FF0000">&lt;?php&nbsp;<font color="#000000">make_cloud_1();</font>?&gt;</font></code></a> | 
			<strong><code><font color="#FF0000">&lt;?php&nbsp;<font color="#000000">make_cloud_2();</font>?&gt;</font></code></strong> 
		</div>
		<div style="width:600px;padding:20px"><?php make_cloud_2(); ?></div>
			
		 <?php }
		 elseif ( $action == '' ) {
		 ?>
		 
		<div style="padding:20px">
			<a href="edit.php?page=<?php echo basename(__FILE__); ?>&amp;action=cloud_1">
			<code><font color="#FF0000">&lt;?php&nbsp;<font color="#000000">make_cloud_1();</font>?&gt;</font></code></a> | 
			<a href="edit.php?page=<?php echo basename(__FILE__); ?>&amp;action=cloud_2">
			<code><font color="#FF0000">&lt;?php&nbsp;<font color="#000000">make_cloud_2();</font>?&gt;</font></code></a>
		</div>
		 
		 <?php }
		 else {
		 ?>
		 
		<div style="padding:20px">
			<a href="edit.php?page=<?php echo basename(__FILE__); ?>&amp;action=cloud_1">
			<code><font color="#FF0000">&lt;?php&nbsp;<font color="#000000">make_cloud_1();</font>?&gt;</font></code></a> | 
			<a href="edit.php?page=<?php echo basename(__FILE__); ?>&amp;action=cloud_2">
			<code><font color="#FF0000">&lt;?php&nbsp;<font color="#000000">make_cloud_2();</font>?&gt;</font></code></a>
		</div>
		 
		<?php } ?>
			
	</div>
        
	<div class="wrap" align="center">&copy; 2007 italyisfalling.com<br />
	<em>uh, don't say this plugin is useless like being useless was a demerit!</em><br />
    --corpodibacco</div>   

<?php

}

//add headers
function wp_cabaret_header() {	
	
	echo "\n" . '<link rel="stylesheet" type="text/css" href="' . WP_CABARET_PATH . '/style.css" />';
	
}

//builds sumenu entry
function wp_cabaret_add_pages() {

	add_management_page('The Wordpress Cabaret', 'The Wordpress Cabaret', 9, basename(__FILE__), 'make_manage_page');
}

add_action('admin_head', 'wp_cabaret_header');
add_action('admin_menu', 'wp_cabaret_add_pages');

?>