<?php

	session_start();
	require_once('twitteroauth/twitteroauth.php');
	require_once('config.php');

	if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
	    header('Location: ./clearsessions.php');
	}
	$access_token = $_SESSION['access_token'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	$content = $connection->get('account/verify_credentials');
	$twitteruser = $content->{'screen_name'};
	$userid = $content->{'id'};

	$tweets1 = $connection->get("https://api.twitter.com/1.1/statuses/mentions_timeline.json");
	$tweets3 = $connection->get("https://api.twitter.com/1.1/statuses/home_timeline.json");

	foreach ($tweets1 as $item)
	{
		$text = $item->text;
		$time = $item->created_at;
		$dt = new DateTime('@' . strtotime($time));
		$tweet_time = $dt->format('H:m:s');
		$tweet_dtm = $dt->format('Y:m:d');
		$year =  $dt->format('Y'); 
		$month =  $dt->format('m'); 
		$user_name = $item->user->name;
		$inreplyto =  $item->in_reply_to_screen_name;
		$rt_count = $item->retweet_count;
		$follower_count = $item->user->followers_count;

		echo "Date : $tweet_dtm <br>";
		echo "Time : $tweet_time <br>";
		echo "User name : $user_name <br>";
		echo "Reach - Follower count : $follower_count <br>";
		echo "Constant : Mention <br>";
		echo "Mention text : $text <br>";
		echo "Retweet count : $rt_count <br>";
		//echo $text.$time.$tweet_time.$tweet_dtm.$year.$month;

		echo "<br>---<br>";

	}
	echo "    ---------------------    <br>";
	foreach ($tweets3 as $item)
	{
		$text = $item->text;
		$check = 'RT';
		$result = strpos($text, $check);
	//	if($result == false)
	//		continue;
		$time = $item->created_at;
		$dt = new DateTime('@' . strtotime($time));
		$tweet_time = $dt->format('H:m:s');
		$tweet_dtm = $dt->format('Y:m:d');
		$year =  $dt->format('Y'); 
		$month =  $dt->format('m'); 
		$user_name = $item->name;
		$inreplyto =  $item->in_reply_to_screen_name;
		$rt_count = $item->retweet_count;
		$follower_count = $item->user->followers_count;

		echo "IS retweeted : $item->retweeted <br>";
		echo "Date : $tweet_dtm <br>";
		echo "Time : $tweet_time <br>";
		echo "User name : $user_name <br>";
		echo "Reach - Follower count : $follower_count <br>";
		echo "Constant : Retweet <br>";
		echo "Mention text : $text <br>";
		echo "Retweet count : $rt_count <br>";
		//echo $text.$time.$tweet_time.$tweet_dtm.$year.$month;

		echo "<br>---<br>";



	}

?>
