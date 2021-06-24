<?php
/*
Plugin Name: Picture gallery
Plugin URI: http://localhost/wordpress/
Description: First plugin
Version: 1.0
Author: Nastya
*/

$app_id = 'a0e77ee2-94c0-48b4-8b61-a4e32e405fdd';
$key    = '1lnjZL6Dp9a2xVewylmAQhf7oOA68V9N';
$secret = 'miJa6WfFtzbAIXK3'; 

add_action('init','register_shortcode');

function register_shortcode(){
	add_shortcode('books', 'show_book');
}
function show_book($at){
	$books=get_books();
	
ob_start();
?>
<ul>
<?php foreach ($books as $book):?>
<li> <?php echo $book->Title; ?></li>
<?php endforeach;?> </ul>
<?php
	//return ob_get_clean();
	return $books;
}



class Gallery{
	private const CACHE_KEY_BASE='gallery';
	private $key    = '1lnjZL6Dp9a2xVewylmAQhf7oOA68V9N';
	public function get_books($name=''){
		$books=get_transient(self::CACHE_KEY_BASE."$name");
	if(!$books){
		$books=wp_remote_get("https://api.nytimes.com/svc/books/v3/lists/best-sellers/history.json?apikey=".$this->key."&s=$name");
		set_transient(self::CACHE_KEY_BASE."$name",$books,60);
		
	}
	return json_decode($books['body'])->$earch;
}
	
}
/**function get_books(){
	$key    = '4e62a930';
	$response = wp_remote_get("http://www.omdbapi.com/?apikey='.$key.'&t=aliens");
	return json_decode($response['body'],$books);
}*/


