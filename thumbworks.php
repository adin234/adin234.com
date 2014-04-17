<?php
	include("lib/GrabzItClient.class.php");

	$grabzIt = new GrabzItClient("NzBmZGY4ZjM2N2JhNGEwNmI1OGRhMWIyNDg1ZWY4NWE=", "Pzg/SD9NPz9uCD9hPz8/Pz8GPS81Pz8/PwllPz8/Pz8=");

	if($_GET['id']) {
		$message = $_GET["message"];
		$customId = $_GET["customid"];
		$id = $_GET["id"];
		$filename = $_GET["filename"];
		$format = $_GET["format"];

		die(file_get_contents($grabzIt->GetResult($id)));
	}

	echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	$grabzIt->SetImageOptions("http://www.google.com");
	$grabzIt->Save("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");