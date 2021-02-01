<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>LOT</title>
		<script type="in/Login"></script>
		<script type="text/javascript" src ="//platform.linkedin.com/in.js">
			api_key: '81vumkr8e4srp5';
			authorize: true;
			onLoad: onLinkedInLoad
		</script>
		<script type="text/javascript">
			function onLinkedInLoad() {
				IN.Event.on(IN, "auth",getProfileData);
			}

			function onSuccess( data ) {
				console.log(data);
			}

			function onError( error ) {
				console.log(error);
			}

			function getProfileData() {
				IN.API.Raw("/people/~").result(onSuccess).error(onError);
			}

		</script>
	</head>
</html>

<?php

echo "Hello, This is callback page where user lands from linkedin API";
$url = 'https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=81vumkr8e4srp5&redirect_uri=https://www.oneidnet.com/linkedin/test&state=987654321&scope=r_basic_profile';
echo "<a href='$url'>Authenticate Yourself here</a>";

?>
