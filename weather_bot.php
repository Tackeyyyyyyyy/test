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




/* 天気予報 （東京）*/
$url = "http://weather.livedoor.com/forecast/webservice/json/v1?city=130010";
$json = file_get_contents($url);
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$arr = json_decode($json,true);
if ($arr === NULL) {
    return;
}else{
    $wether = $arr["forecasts"][0]["telop"];//天気
}


$text = '今日の東京の天気は'.$wether.'です。';

//tweet
$status = $connection->post('statuses/update', ['status' => $text]);
