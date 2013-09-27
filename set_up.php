<?php
require_once 'SDK/OpenTokSDK.php';
require_once 'SDK/OpenTokArchive.php';
require_once 'SDK/OpenTokSession.php';

// Creating an OpenTok Object
$apiObj = new OpenTokSDK();

// Creating Simple Session object, passing IP address to determine closest production server
$session = $apiObj->createSession( $_SERVER["REMOTE_ADDR"] );

// You must have a valid sessionId and an OpenTokSDK object
$apiObj = new OpenTokSDK('41685752', '4c44ef7a4f599612fa7b8522685adb4bd0f2498a');
$sessionId = '2_MX40MTY4NTc1Mn4xMjcuMC4wLjF-V2VkIFNlcCAxOCAyMTowNDo0OCBQRFQgMjAxM34wLjY3MzYxN34';

// After creating a session, call generateToken(). Require parameter: SessionId
$token= $apiObj->generateToken($sessionId);

// Giving the token a moderator role, expire time 5 days from now, and connectionData to pass to other users in the session
$token = $apiObj->generateToken($sessionId, RoleConstants::MODERATOR, time() + (5*24*60*60), "hello world!" );
?>