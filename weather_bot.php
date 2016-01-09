<?php 
// twitterOAuth の読み込み
require_once 'autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;
require_once('config.php');

// OAuth認証
$consumerKey = API_KEY;
$consumerSecret = API_SECRET;
$accessToken = ACCESS_TOKEN;
$accessTokenSecret = ACCESS_SECRET;
$connection = new TwitterOAuth($consumerKey, $consumerSecret, $accessToken, $accessTokenSecret);

$status = $connection->post('statuses/update', ['status' => $text]);


/* 天気予報 */

$text = '今日の東京の天気は'.$wether.'です。';