<?php

$not_message = 'You don\'t have enough Spam to generate Art.';
$poetry_indent = array("","","","","","","&nbsp;&nbsp;", "&nbsp;&nbsp;&nbsp;&nbsp;", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");


/* ********************

	  the poetry

******************* */

function make_spam_poetry() {
	
	global $poetry_indent;	
	$spam_lines = get_the_comment_lines(true);
	
	//check if there's enough material
	if (count($spam_lines) < 10) return "not enough spam.";
	
	//get random amount of random spam comments
	if (count($spam_lines) > 30) $totalspam_lines = 30;
	else $totalspam_lines = count($spam_lines);	
	$spams_amount =  rand(5,$totalspam_lines);
	$some_spams = array_rand($spam_lines, $spams_amount);

	//wrap them randomly short
	//and put random indents
	$wrapped_spam = '';
	foreach ($some_spams as $spam_line) {
		
		$spam_linelenght = rand(20,50);		
		$wrapped_spam .= $random_spam_indent . wordwrap($spam_lines[$spam_line], $spam_linelenght, "<br />") . "<br />";
	}
	
	//make an array of all the wrapped spam comments
	$new_spam_lines = explode("<br />", $wrapped_spam);

	//capitalize each
	for ($i = 0; $i < count($new_spam_lines); $i++) {
	 	$new_spam_lines[$i] = ucfirst($new_spam_lines[$i]);
	}	
	
	//further random shorting of the poem
	if (count($new_spam_lines) > 20) $totalspam_lines = 20;
	else $totalspam_lines = count($new_spam_lines);	
	$spam_lines_amount =  rand(3,$totalspam_lines);
	$new_spam_keys = array_rand($new_spam_lines, $spam_lines_amount);
	shuffle($new_spam_keys);
	$some_wrapped_spams = '';
	$index = 0;
	foreach ($new_spam_keys as $key) {
		
		//randomize the indent
		$indent_spam_index = rand(0, (count($poetry_indent)-1));
		if ($index == 0) $random_spam_indent = "";
		else $random_spam_indent = $poetry_indent[$indent_spam_index];
		
		//implode the array
		$some_wrapped_spams .= $random_spam_indent . utf8_encode($new_spam_lines[$key]) . '<br />';
		$index++;
	}

	//what makes a poem?
	echo $some_wrapped_spams;
}

function make_comment_poetry() {
	
	global $poetry_indent;	
	$comment_lines = get_the_comment_lines(false);
	
	//check if there's enough material
	if (count($comment_lines) < 10) return "not enough comments.";
	
	//get random amount of random comments
	if (count($comment_lines) > 30) $total_comments = 30;
	else $total_comments = count($comment_lines);	
	$comments_amount =  rand(5,$total_comments);
	$some_comments = array_rand($comment_lines, $comments_amount);

	//wrap them randomly short
	//and put random indents
	$wrapped_comment = '';
	foreach ($some_comments as $comment_line) {
		
		$comment_linelenght = rand(20,50);		
		$wrapped_comment .= $random_comment_indent . wordwrap($comment_lines[$comment_line], $comment_linelenght, "<br />") . "<br />";
	}
	
	//make an array of all the wrapped comments
	$new_comment_lines = explode("<br />", $wrapped_comment);

	//capitalize each
	for ($i = 0; $i < count($new_comment_lines); $i++) {
	 	$new_comment_lines[$i] = ucfirst($new_comment_lines[$i]);
	}	
	
	//further random shorting of the poem
	if (count($new_comment_lines) > 20) $totalcomment_lines = 20;
	else $totalcomment_lines = count($new_comment_lines);
	
	$comment_lines_amount =  rand(3,$totalcomment_lines);
	$new_comment_keys = array_rand($new_comment_lines, $comment_lines_amount);
	shuffle($new_comment_keys);
	$some_wrapped_comments = '';
	$index = 0;
	foreach ($new_comment_keys as $key) {
		
		//randomize the indent
		$indent_comment_index = rand(0, (count($poetry_indent)-1));
		if ($index == 0) $random_comment_indent = "";
		else $random_comment_indent = $poetry_indent[$indent_comment_index];
		
		//implode the array
		$some_wrapped_comments .= $random_comment_indent . $new_comment_lines[$key] . '<br />';
		$index++;
	}

	//what makes a poem?
	echo $some_wrapped_comments;
}

function make_post_poetry() {
	
	global $poetry_indent;	
	$posts = get_the_post_lines();
	
	//check if there's enough material
	if (count($posts) < 3) return "not enough posts.";
	
	//get random amount of random posts
	if (count($posts) > 30) $total_posts = 30;
	else $total_posts = count($posts);	
	$posts_amount =  rand(5,$total_posts);
	$somepostskeys = array_rand($posts, $posts_amount);
		
	//wrap them randomly short
	$wrapped_posts = '';
	foreach ($somepostskeys as $post_key) {
	
		$linelenght3 = rand(20,50);		
		$wrapped_posts .= wordwrap($posts[$post_key], $linelenght3, "<br />") . '<br />';
	}
	
	//make an array of all the wrapped lines (they're A LOT now)
	$wrapped_lines = explode("<br />", $wrapped_posts);
	
	//further random shorting of the poem
	if (count($wrapped_lines) > 20) $totalwrapped_lines = 20;
	else $totalwrapped_lines = count($wrapped_lines);	
	$lines_amount =  rand(3,$totalwrapped_lines);
	$new_post_keys = array_rand($wrapped_lines, $lines_amount);
	shuffle($new_post_keys);
	$some_wrapped_lines = '';
	$index = 0;
	foreach ($new_post_keys as $key) {
		
		//randomize the indent
		$indent_post_index = rand(0, (count($poetry_indent)-1));
		if ($index == 0) $random_post_indent = "";
		else $random_post_indent = $poetry_indent[$indent_post_index];

		$some_wrapped_lines .= $random_post_indent . $wrapped_lines[$key] . '<br />';
		$index++;
	}
	
	//what makes a poem?
	echo ucfirst($some_wrapped_lines);
}


/* ********************

	  the clouds

******************* */


function make_cloud_1(){

	global $not_message;

	if (get_the_spam_words(true) == false) {
		echo $not_message;
	}
	else {
	
		$list2 = get_the_spam_words(true);;
		$list2 = counted_spam($list2);
		/*$list2 = sort_by($list2, true, false);*/
	
		$text2 = '';
		foreach ($list2 as $element2) {
				if ($element2['count'] >= 2) {
					if ($element2['count'] <= 10) {
						continue; //$fontsize = 10;
					}
					else {
						$fontsize = $element2['count'];
					}
					$text2.= '<span style="font-size:'.$fontsize.'px; line-height:'. ($element2['count']/1.4).'px">'.$element2['product'].'</span> ';
				}
				
			}	
		echo $text2;
	}
}

function make_cloud_2(){

	global $not_message;

	if (get_the_spam_words(true) == false) {
		echo $not_message;
	}
	else {	

		$list4 = get_the_spam_words(true);
		$list4 = counted_spam($list4);
		/*$list1 = sort_by($list1, false, false);*/
	
		$text4 = '';
		foreach ($list4 as $element4) {
				if ($element4['count'] >= 2)
				$text4.= '<span style="font-size-adjust:'. ($element4['count']/35) .'; line-height:'. ($element4['count']/25) .'">
				'.$element4['product'].' </span>';
				}
		
		echo $text4;
	}
}



/* ********************

	  the tools

******************* */

//get cleaned array of comments
function get_the_comment_lines($is_spam){

	global $wpdb, $table_prefix;

	if ($is_spam == false) $where = "comment_approved='1'";
	else $where = "comment_approved='spam'";
	
	$get_spam = $wpdb->get_results("
	SELECT  `comment_content` AS content, `comment_author` AS author FROM `" 
	. $table_prefix."comments` WHERE ".$where." ORDER BY comment_author_email DESC
	");

	$index= 1;
	//put each cleaned up comment in the array
	foreach ($get_spam as $spam) {
	
		$text = /*$spam->author . ' ' . */strip_tags($spam->content);
		$text = ereg_replace('\[url\=(.*)]', "", $text);
		$text = ereg_replace('\[URL\=(.*)]', "", $text);
		$text = ereg_replace('\[url]', "", $text);
		$text = ereg_replace('\[URL]', "", $text);
		$text = ereg_replace('\[ URL]', "", $text);		
		$text = ereg_replace('\[LINK\=(.*)]', "", $text);
		$text = ereg_replace('\[link\=(.*)]', "", $text);
		$text = ereg_replace('\[ url\=(.*)]', "", $text);
		$text = ereg_replace('\[ URL\=(.*)]', "", $text);
		$text = ereg_replace('\[ LINK\=(.*)]', "", $text);
		$text = ereg_replace('\[ link\=(.*)]', "", $text);
		$text = ereg_replace("[a-zA-Z]+://([.]?[a-zA-Z0-9_/-])*", "", $text);	
		$text = ereg_replace("(^| |.)(www([.]?[a-zA-Z0-9_/-])*)", "", $text);
		
		$text = trim($text);		
		$eliminate = array("-", "_", "|" , "?" /*, "!"*/, "/" , "\\" , "(" , ")", "\"", "=", "  ", "...", "   ", "&lt;", "&gt;");
		$text = str_replace($eliminate, " " , $text);
		$text = str_replace(".", ". " , $text);
		$text = ereg_replace('\[ URL]', "", $text);
		
		//it would be nice to check and eliminate meaningless words, but this is too php demanding 
		/*require_once (ABSPATH . 'wp-includes/js/tinymce/plugins/spellchecker/classes/TinyPspellShell.class.php');		
		$tiny = new TinyPspellShell($config, 'en', $mode, $spelling, $jargon, 'utf-8');*/	
		
		//get rid of too long or too short words
		$get_words = explode(" ", $text);
		$newline = "";
		$maxwordlength = 12;
		foreach ($get_words as $word) {
			if ( (strlen($word) <= $maxwordlength) && (strlen($word) != 1) ){
				/*if ( $tiny->getSuggestion($word) != false) */
				$newline .= $word . " ";
			}
			//keeps one letter words in use in english -- should be localised
			else if (strlen($word) == 1) {
				if ($word == "I" || $word == "a" || $word == "I" || $word == "A") $newline .= $word . " ";
			}
		}
		
		$newtable[$index] = $newline;
		$index++;				
	}
	
	return $newtable;
}

//get cleaned array of posts
function get_the_post_lines(){

	global $wpdb, $table_prefix;

	$get_posts = $wpdb->get_results("
	SELECT  `post_content` AS content FROM `" 
	. $table_prefix."posts` WHERE post_status = 'publish' AND post_type = 'post'
	");

	$index= 1;
	//put each cleaned up comment in the array
	foreach ($get_posts as $post) {
	
		$text = strip_tags($post->content);		
		$text = trim($text);		
		$eliminate = array("-", "_", "|" , "/" , "\\" , "(" , ")", "\"", "=", "  ", "   ", "&lt;", "&gt;", "&#8220;", "&#8221;");
		$text = str_replace($eliminate, " " , $text);		
		
		//get rid of too long words
		$get_words = explode(" ", $text);
		$newline = "";
		$maxwordlength = 12;
		foreach ($get_words as $word) {
			if ( (strlen($word) <= $maxwordlength) ){
				$newline .= $word . " ";
			}
		}
		
		$newtable[$index] = $newline;
		$index++;				
	}
	
	return $newtable;
}

//get array of words (for comment/spam clouds)
function get_the_spam_words($is_spam) {

	global $wpdb, $table_prefix, $not_message;
	
	if ($is_spam == false) $where = "comment_approved='1'";
	else $where = "comment_approved='spam'";
	
	$get_spam = $wpdb->get_results("
	SELECT  `comment_content` AS content, `comment_author` AS author FROM `" 
	. $table_prefix."comments` WHERE ".$where." ORDER BY comment_author_email DESC
	");
	
	$result ="";
	$text = "";
	if (count($get_spam) < 200) return $not_message;
	else {
		//put all comments together
		foreach ($get_spam as $spam) {
		
			$text = $spam->author . ' ' . strip_tags($spam->content);
			$text = ereg_replace('\[url\=(.*)]', "", $text);
			$text = ereg_replace('\[URL\=(.*)]', "", $text);
			$text = ereg_replace('http://(.*)/', "", $text);
			$text = trim($text);
			$result .= $text;
		}
		
		
		//clean
		$eliminate = array("-", "_", "|" , "?" , "!", "\n", "\r", "$", ".", "," , ":" , 
		";" , "/" , "\\" , "(" , ")", "\"", "=", "  ", "   ", "hmtl", "htm", "www", "http", "https");
		$spaces = array("  ", "   ", "    ");
		$result = str_replace($eliminate, " " , $result);
		$result = str_replace($spaces, " " , $result);
		$result = strtolower($result);
		
		//make an array of all the words
		$list = preg_split('/ /', $result, -1, PREG_SPLIT_NO_EMPTY);
		
		//get rid of too long or too short words
		$newresult = "";
		foreach ($list as $element) {
				if ((strlen($element) < 10) && (strlen($element) > 2)) {
				$newresult .= trim($element) . " ";
			}		
		}
		
		//remake the array
		$list = explode(" ", $newresult);
		natsort($list);
		
		return $list;
	}
}

function sort_by ($list, $by_name=false, $reversed=false) {

	foreach ($list as $key => $row) {
		$count[$key]  = $row['count'];
		$product[$key] = $row['product'];
	}	

	if ($reversed == false) $reversed = SORT_DESC;
	else $reversed = SORT_ASC;
	
	if ($by_name == false) {
		array_multisort($count, $reversed, $product, SORT_ASC, $list);
	}
	else {
		array_multisort($product, $reversed, $count, SORT_ASC, $list);
	}
	return $list;
}

function counted_spam($monolist) {

	sort($monolist);	
	$total = count($monolist);
	
	$index=1;
	$k=1;	
	$doublelist[$k]['product'] = $monolist[$index];
	$doublelist[$k]['count'] = 1;

	while($index<=$total) {
	
		$index++;		
		if ( $monolist[$index] == $doublelist[$k]['product'] ) {
			$doublelist[$k]['count']++ ;
		}
		else {				
			$k++;
			$doublelist[$k]['product'] = $monolist[$index];
			$doublelist[$k]['count'] = 1;
		}	
		
	}
	
return $doublelist;
}

function generate_unique_list() {

	$glist = array_unique(get_the_spam_words(true));
	$ulist = implode(" ", $glist);
	echo $ulist;
}

?>