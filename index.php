<?php
session_start();
require_once __DIR__ . '/facebook-php-sdk-v4-5.0.0/src/Facebook/autoload.php';
require_once __DIR__ . '/facebook-php-sdk-v4-5.0.0/src/Facebook/Facebook.php';

$fb = new Facebook\Facebook([
  'app_id' => '1023466864382694',
  'app_secret' => '814079f172a9399b12177a08a9cbbc42',
  'default_graph_version' => 'v2.4',
]);
$token='CAAOi1nLkEuYBAMCMtyD0V1HZBlLfleb1LhIM9wIg56mXJTcgxOZBHMZBJDOVb9Cb02kxc5ar4dTKniIcfK213olEYVa76hWOMUYbViBO01IEHoShWcy4VS7MJfvY3nqU6er7D8O7aeA0gWbSOa5aNTJ1U9iBvZAE2tZBHHWd4YJ60F3ArqrUW97hjeSZCU9rTrosfvU3evxgZDZD';
$fb->setDefaultAccessToken($token);

try {
    $response = $fb->get('/me');
    $userNode = $response->getGraphUser();
}
catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
}
catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

echo 'Logged in as ' . $userNode->getName();?>

