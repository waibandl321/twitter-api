<?php
session_start();
require_once("twitteroauth/twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser = "Jumcode1";
$notweets = 20;
$consumerkey = "VgoZPbfuxs4cPU2vN3t5W7STL";
$consumersecret = "WhqgF9wAxF62HptzIHxcG2ACFDeKLmADaVGERX4ueD6RqA5Chh";
$accesstoken = "1203642617927331840-zSZraN6sEMstEK1afW5ZGnuZnHwItK";
$accesstokensecret = "19t7p0BA7Dngk8plpPYpKJxIou0Qt6wcErpIeLXBbXEhY";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
 
// echo json_encode($tweets);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Twitter API</h2>
    <section>
    
    </section>
</div>
<script src="index.js"></script>
</body>
</html>