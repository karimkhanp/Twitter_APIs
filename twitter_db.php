        <link href="css/bootstrap.min.css" rel="stylesheet">
<?php

		if(isset($_POST['category1']) == 'mention_this')
		{

			$category = $_POST['category1'];
			$userid = $_POST['userid'];
			get_this_total_mention($category,$userid);	
			echo '<h3>Timeline display</h3>';
			get_this_mention($category,$userid);	
			return;
		}
		else if(isset($_POST['category2']) == 'mention_prev')
		{
//			echo 'mention_prev';
			$category = $_POST['category2'];
			$userid = $_POST['userid'];
			get_this_total_mention($category,$userid);	
			echo '<h3>Timeline display</h3>';
			get_prev_mention($category,$userid);	
			return;
		}
		else if(isset($_POST['category3']) == 'rt_this')
		{
//			echo 'rt_this';
			$category = $_POST['category3'];
			$userid = $_POST['userid'];
			get_this_total_mention($category,$userid);	
			echo '<h3>Timeline display</h3>';
			get_this_rt($category,$userid);	
			return;
		}
		else if(isset($_POST['category4']) == 'rt_prev')
		{
//			echo 'rt_prev';
			$category = $_POST['category4'];
			$userid = $_POST['userid'];
			get_this_total_mention($category,$userid);	
			echo '<h3>Timeline display</h3>';
			get_prev_rt($category,$userid);	
			return;
		}		

		function get_this_total_mention($category,$userid)	
		{
			$con = mysqli_connect('127.0.0.1', 'root', '', 'karim');
			if (mysqli_connect_errno())
 			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
 				return;
 			}	 			
			$today = date("Ymd");
			$constant = 'Mention';
			$result = mysqli_query($con,"select * from  (SELECT sum( a.user_follower_count ) AS mention_reach, count( a.sno ) AS mention_count FROM twitter_mention AS a where userid = '".$userid."') a,
    (SELECT sum( b.user_follower_count ) AS retweet_reach, count( b.username ) AS count_retweet FROM twitter_retweet AS b where userid = '".$userid."') b "); 
			echo '<div class="c2"><table class="table table-condensed"><thead>';
							echo '
						            <tr>
							            <th>Table_Total</th>
							            <th>Mention reach</th>
							            <th>Retweet reach</th>
							            <th>Count of mention</th>
							            <th>Count of retwet</th>
						          </tr>
							</thead>
							<tbody>
							';

 			while ($row = @mysqli_fetch_array($result))
 			{
				echo '
				          <tr>
				            <td></td>
				            <td>'.$row['mention_reach'].'</td>
				            <td>'.$row['retweet_reach'].'</td>
				            <td>'.$row['mention_count'].'</td>
				            <td>'.$row['count_retweet'].'</td>
				          </tr>          
				';
			}
			echo '</tbody></table></div>';
			return;
		}
		function get_this_mention($category,$userid)	
		{
			$con = mysqli_connect('127.0.0.1', 'root', '', 'karim');
			if (mysqli_connect_errno())
 			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
 				return;
 			}	 			
			$today = date("Ymd");
			$constant = 'Mention';
			$result = mysqli_query($con,"SELECT * from twitter_mention where userid = '".$userid."'"); 
			echo '<div class="c2"><table class="table table-condensed"><tbody>';
							echo '
						            <tr class="active">						                  
						                  <td class="active">Date</td>
						                  <td class="success">Time</td>
						                  <td class="warning">Username</td>
						                  <td class="danger">Reach</td>
						                  <td class="info">RT / Mention</td>
						                  <td class="success">Tweet</td>
							';

 			while ($row = @mysqli_fetch_array($result))
 			{
				echo '
						            <tr class="active">						                 
						                  <td class="active">'.$row['date'].'</td>
						                  <td class="success">'.$row['time'].'</td>
						                  <td class="warning">'.$row['username'].'</td>
						                  <td class="danger">'.$row['user_follower_count'].'</td>
						                  <td class="info">'.$constant.'</td>
						                  <td class="success">'.$row['tweet_text'].'</td>
				';
			}
			echo '</tbody></table></div>';
			return;
		}

		function get_prev_mention($category,$userid)	
		{

			$con = mysqli_connect('127.0.0.1', 'root', '', 'karim');
			if (mysqli_connect_errno())
 			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
 				return;
 			}	 			
			$today = date("Ymd");
			$constant = 'Mention';
			$result = mysqli_query($con,"SELECT * from twitter_mention where userid = '".$userid."' "); 
			echo '<div class="c2"><table class="table table-condensed"><tbody>';
							echo '
						            <tr class="active">
						                  <td class="active">Date</td>
						                  <td class="success">Time</td>
						                  <td class="warning">Username</td>
						                  <td class="danger">Reach</td>
						                  <td class="info">RT / Mention</td>
						                  <td class="success">Tweet</td>
							';

 			while ($row = @mysqli_fetch_array($result))
 			{
				echo '
						            <tr class="active">
						                  <td class="active">'.$row['date'].'</td>
						                  <td class="success">'.$row['time'].'</td>
						                  <td class="warning">'.$row['username'].'</td>
						                  <td class="danger">'.$row['user_follower_count'].'</td>
						                  <td class="info">'.$constant.'</td>
						                  <td class="success">'.$row['tweet_text'].'</td>
				';
			}
			echo '</tbody></table></div>';
			return;
		}

		function get_this_rt($category,$userid)	
		{

			$con = mysqli_connect('127.0.0.1', 'root', '', 'karim');
			if (mysqli_connect_errno())
 			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
 				return;
 			}	 			
			$today = date("Ymd");
			$constant = 'Mention';
			$result = mysqli_query($con,"SELECT * from twitter_retweet where userid = '".$userid."'"); 
			echo '<div class="c2"><table class="table table-condensed"><tbody>';
							echo '
						            <tr class="active">
						                  <td class="active">Date</td>
						                  <td class="success">Time</td>
						                  <td class="warning">Username</td>
						                  <td class="danger">Reach</td>
						                  <td class="info">RT / Mention</td>
						                  <td class="success">Tweet</td>
							';

 			while ($row = @mysqli_fetch_array($result))
 			{
				echo '
						            <tr class="active">
						                  <td class="active">'.$row['date'].'</td>
						                  <td class="success">'.$row['time'].'</td>
						                  <td class="warning">'.$row['username'].'</td>
						                  <td class="danger">'.$row['user_follower_count'].'</td>
						                  <td class="info">'.$constant.'</td>
						                  <td class="success">'.$row['tweet_text'].'</td>
				';
			}
			echo '</tbody></table></div>';
			return;
		}

		function get_prev_rt($category,$userid)	
		{

			$con = mysqli_connect('127.0.0.1', 'root', '', 'karim');
			if (mysqli_connect_errno())
 			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
 				return;
 			}	 			
			$today = date("Ymd");
			$constant = 'Mention';
			$result = mysqli_query($con,"SELECT * from twitter_retweet where userid = '".$userid."'"); 
			echo '<div class="c2"><table class="table table-condensed"><tbody>';
							echo '
						            <tr class="active">
						                  <td class="active">Date</td>
						                  <td class="success">Time</td>
						                  <td class="warning">Username</td>
						                  <td class="danger">Reach</td>
						                  <td class="info">RT / Mention</td>
						                  <td class="success">Tweet</td>
							';

 			while ($row = @mysqli_fetch_array($result))
 			{
				echo '
						            <tr class="active">
	
						                  <td class="active">'.$row['date'].'</td>
						                  <td class="success">'.$row['time'].'</td>
						                  <td class="warning">'.$row['username'].'</td>
						                  <td class="danger">'.$row['user_follower_count'].'</td>
						                  <td class="info">'.$constant.'</td>
						                  <td class="success">'.$row['tweet_text'].'</td>
				';
			}
			echo '</tbody></table></div>';
			return;
		}





?>
