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
		$text_id = $item->id;
		$constant = 'mention';
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
/*
		echo "Text : $text <br>";
		echo "<br>Date : $tweet_dtm <br>";
		echo "Time : $tweet_time <br>";
		echo "User name : $user_name <br>";
		echo "Reach - Follower count : $follower_count <br>";
		echo "Constant : Mention <br>";
		echo "Mention text : $text <br>";
		echo "Retweet count : $rt_count <br>";
		//echo $text.$time.$tweet_time.$tweet_dtm.$year.$month;
		echo "sds";
		echo "<br>---<br>";
*/
		$con = mysqli_connect('127.0.0.1', 'root', '', 'karim');				
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			return;
		}

		$insertQuery1 = "INSERT INTO twitter_mention(`username`,`userid`,`tweet_text`,`text_id`,`time`,`month`,`year`,`date`,`user_follower_count`,`rt_count`,`constant`,`in_reply_to`) VALUES ('".$user_name."','".$userid."','".$text."','".$text_id."','".$tweet_time."','".$month."','".$year."','".$tweet_dtm."','".$follower_count."','".$rt_count."','".$constant."','".$inreplyto."')";

		if (!mysqli_query($con,$insertQuery1))
	  	{
	  	//	die('Error: ' . mysqli_error($con));
		//	echo "error";
		}		
	}
	echo "    ---------------------    <br>";
	foreach ($tweets3 as $item)
	{
		$text = $item->text;
		$text_id = $item->id;
		$constant = 'retweet';
		$check = 'RT';
		$result = strpos($text, $check);
		if($result === false)
			continue;
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
/*
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
*/
		$con = mysqli_connect('127.0.0.1', 'root', '', 'karim');				
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			return;
		}

		$insertQuery1 = "INSERT INTO twitter_retweet(`username`,`userid`,`tweet_text`,`text_id`,`time`,`month`,`year`,`date`,`user_follower_count`,`rt_count`,`constant`,`in_reply_to`) VALUES ('".$user_name."','".$userid."','".$text."','".$text_id."','".$tweet_time."','".$month."','".$year."','".$tweet_dtm."','".$follower_count."','".$rt_count."','".$constant."','".$inreplyto."')";

		if (!mysqli_query($con,$insertQuery1))
	  	{
	  	//	die('Error: ' . mysqli_error($con));
		//	echo "error";
		}	
	}

	echo '<form name="myForm" id="myForm"  action="start.php" method="POST">
	<input style="display:none" name="userid" value="'.$userid.'" />

	</form>

	<script>
		function submitform()
		{
			document.getElementById("myForm").submit();
		}
		window.onload = submitform;
	</script>
	';

?>
