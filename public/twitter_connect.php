<?php
session_start();
require_once("twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser1 = "katyperry";
$twitteruser2 = "justinbieber";
$twitteruser3 = "jtimberlake";
$twitteruser4 = "taylorswift13";
$twitteruser5 = "rihanna";
$notweets = 1;
$consumerkey = "fcjzSykNeQgGdFPxHu3vw";
$consumersecret = "jqqNrE0WyzfF0KH41lavjmC2ntgHCNJUuf4cmPbA2Y";
$accesstoken = "981737546-NU2eewRJXuEez4LPSe56tvzEOKLQz1vkIdPejT3W";
$accesstokensecret = "cNHYWv4ajVIBeOOv4C9VS4USyl2kHEIkQe4RBD8mO1Lh6";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets1 = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser1."&count=".$notweets);
$tweets2 = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser2."&count=".$notweets);
$tweets3 = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser3."&count=".$notweets);
$tweets4 = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser4."&count=".$notweets);
$tweets5 = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser5."&count=".$notweets);

//for ($i = 1; $i <= 5; $i++){
//	$tweet_string = "tweets" . $i;
//	foreach($$tweet_string as $tweet){
//		echo "<img src='".$tweet->user->profile_image_url . "'/></br>";
//		echo "Username: " . $tweet->user->screen_name . "<br/>";
//		echo $tweet->text . "<br/><br/>";
//	}
//}
?>