<?php
	$file = __DIR__.'/../../.htaccess';
	if(!file_exists($file)) $file = __DIR__.'/../../../.htaccess';
	$dir = __DIR__.'/../../wp-admin/.htaccess';

	$fileAccess = explode('#GallyAllowfrom',file_get_contents($file));
	$dirAccess = explode('#GallyAllowfrom',file_get_contents($dir));

	$ip = $_SERVER['REMOTE_ADDR'];
	/*
		# 213.55.240.227
		RewriteCond %{REMOTE_ADDR} !^213\.55\.240\.227$ 
	*/
	if(strpos($fileAccess[1],$ip) === false) {
		$allowfrom = "#GallyAllowfrom";
		$allowfrom .= "\n\n	# $ip\n";
		$allowfrom .= '	RewriteCond %{REMOTE_ADDR} !'. str_replace('.','\.',$ip) .'$';

		$fileAccess = implode($allowfrom,$fileAccess);
		$dirAccess = implode($allowfrom,$dirAccess);
		file_put_contents($file,$fileAccess);
		file_put_contents($dir,$dirAccess);
	}


	
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Zugang gewährt</title>
	<link rel="stylesheet" href="../style.css?<?=date('YmdHis')?>">
</head>
<body>
	<div class="modal">
		<h1>Zugriff gewährt</h1>
		<p>
			Die IP-Adresse [<?=$ip?>] wurde in die Liste der erlaubten IPs eingetragen.
		</p>
		<a href="../../../wp-login.php">Zum Login</a>
	</div>
</body>
</html>
