<?php
 session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '507362236107-ftuld146mojq1n5h1t1pq64brn7abp0u.apps.googleusercontent.com'; //Google client ID
$clientSecret = '1BQokp2n77or1ssVSH6Ffd9g'; //Google client secret
$redirectURL = 'http://localhost:8080/travel/index.php'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to Vacxcursion');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>
