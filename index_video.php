<!DOCTYPE html>
<html>
	<head>
		<title>Skypish</title>
		<script src="http://static.opentok.com/webrtc/v2.0/js/TB.min.js" ></script>
		<script src="jquery-2.0.1.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel='stylesheet' href='bootstrap/css/bootstrap.css' type='text/css'>
		<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
		<script src="http://js.pusher.com/2.1/pusher.min.js"></script>
		<script src="pusher-realtime-chat-widget/js/PusherChatWidget.js"></script>
		<link href="pusher-realtime-chat-widget/pusher-chat-widget.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<?php
			include 'set_up.php';
		?>

		<!-- Content div -->
		<div class="wrapper hero-unit">
			<div class="left" id="participants">
				<h2><small>Participants in chat</small></h2>
				
			</div>
			<div class="right">
				<div id="myPublisher"></div>
				<div id="mySubscriber"></div>
			</div>
		</div>

		<!-- Pass opentok variables from php to js -->
		<script type="text/javascript">
			var apiKey = <?php print API_Config::API_KEY?>;
			var sessionId = '<?php print $sessionId; ?>';
			var token = '<?php print $token; ?>';
			var session   = TB.initSession(sessionId);
		</script>

		<script src="create_pusher.js"></script>
		<script src="handle_opentok.js"></script>
	</body>
</html>