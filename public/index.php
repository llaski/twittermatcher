<?php include('twitter_connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>Twitter Matcher</title>
	<link rel="stylesheet" href="css/normalize.css" />
	<link rel="stylesheet" href="css/main.css" />
</head>
<body onload="shuffle()">
	<h1>Welcome to Twitter Match</h1>
	<h4>Drag a tweet on the bottom over the celebrity you believe tweeted it!</h4>

	<script src="js/app.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script type="text/javascript">
		 $( init );
 	</script>


	<div id="accounts_tweets">
	<div>
	<ol id="accounts">

		<?php
		for ($i = 1; $i <= 5; $i++){
			$account_string = "account" . $i;
			$tweets_string = "tweets" . $i;

			foreach($$tweets_string as $tweet)
			{
				echo "<li class='each_account' id='" . $account_string . "'>";
				echo "<div><img src='" . $tweet->user->profile_image_url . "'/></div>";
				echo $tweet->user->screen_name;
				echo "</li>";
			}
		}
		?>


	</ol>
	</div><!-- end left -->
	<div >
	<ol id="tweets">
		<?php
		for ($i = 1; $i <= 5; $i++){
			$tweet_string = "tweet" . $i;
			$tweets_string = "tweets" . $i;

			foreach($$tweets_string as $tweet)
			{
				echo "<li class='each_tweet' id='" . $tweet_string . "'>";
				echo $tweet->text;
				echo "</li>";
			}
		}
		?>
	</ol>
	</div>  <!-- end right -->
	</div>  <!-- end container for accounts and tweets-->
</body>
</html>