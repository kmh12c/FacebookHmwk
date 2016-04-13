<?php
session_start();
// added in v4.0.0
require_once 'autoload.php';

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;

// start session

// init app with app id and secret
FacebookSession::setDefaultApplication( '1097703036916572','77503ca2fb98c10a5b26b15aa20fd6b5' );

// login helper with redirect_uri

    $helper = new FacebookRedirectLoginHelper('http://52.10.103.58/FacebookHmwk' );

try {
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}

// see if we have a session
if ( isset( $session ) ) {
  // graph api request for user data
  $request = new FacebookRequest( $session, 'GET', '/me' );
  $response = $request->execute();
  // get response
  $graphObject = $response->getGraphObject();

  // print data
  echo '<pre>' . print_r( $graphObject, 1 ) . '</pre>';
} else {
  // show login url
  echo '<a href="' . $helper->getLoginUrl() . '">Login</a>';
}

?>

<html>
  <head></head>
  <body>
  </body>
</html>


<!--


if($user_id) {

    $login_url = $facebook->getLoginUrl();
    
}

if($session)
{
    //do stuff
}

else {
    //login with facebook
}

//redirect url is for when I'm done authorizing- facebook has to know where to put me back.
myserver/index.php i dont have a session so i do the else 
login send me to facebook.com
facebook sends back to redirect url and now I have a facebook session so it does the if where i have one

$facebook->api('/me','GET');
-->

