<?php
require_once('lib/TwitterAPIExchange.php');
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
'oauth_access_token' => "2275809991-NBWMNeLr0TZa5D9r2CyloAWIIkb4O1GJGx3Pwzi",
'oauth_access_token_secret' => "4AbU1hgtWzHIRC6IRM7BuSU8yKS2TtsdgP927U7aoYgsq",
'consumer_key' => "z4XejprbG6h0JE35UiQws1axj",
'consumer_secret' => "vG2ep6P0L3i5vqxP6VTRDbAmZQpVYV7Xa2fHuE7TPvgQG7NOGm"
);
// $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
// $requestMethod = "GET";
// if (isset($_GET['user']))  {$user = $_GET['user'];}  else {$user  = "iagdotme";}
// if (isset($_GET['count'])) {$user = $_GET['count'];} else {$count = 20;}
// $getfield = "?screen_name=$user&count=$count";
// $twitter = new TwitterAPIExchange($settings);
// $string = json_decode($twitter->setGetfield($getfield)
// ->buildOauth($url, $requestMethod)
// ->performRequest(),$assoc = TRUE);
// //if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
// foreach($string as $items)
    // {
        // echo "Time and Date of Tweet: ".$items['created_at']."<br />";
        // echo "Tweet: ". $items['text']."<br />";
        // echo "Tweeted by: ". $items['user']['name']."<br />";
        // echo "Screen name: ". $items['user']['screen_name']."<br />";
        // echo "Followers: ". $items['user']['followers_count']."<br />";
        // echo "Friends: ". $items['user']['friends_count']."<br />";
        // echo "Listed: ". $items['user']['listed_count']."<br /><hr />";
    // }
	$url = "https://api.twitter.com/1.1/friends/list.json";
$requestMethod = "GET";

if (isset($_GET['user'])) {$user = $_GET['user'];} else {$user = "atulbaraiya1";}
if (isset($_GET['count'])) {$user = $_GET['count'];} else {$count = 20;}
$getfield = "?screen_name=$user&count=$count";

$twitter = new TwitterAPIExchange($settings);
//p($twitter);
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);

foreach($string['users'] as $items)
    { 
		echo "Profile Image: <img src=".$items['profile_image_url']." alt='' /><br />";
        echo "Friend ID: ".$items['id']."<br />";
        echo "Friend Name: ". $items['name']."<br />";
        echo "Friend Screen name: ". $items['screen_name']."<br />";
		
    }
?>