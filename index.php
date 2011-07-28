<?php

require_once(dirname(__FILE__) . "/config.php");

function json_return($ob) {
	header('Cache-Control: no-cache, must-revalidate');
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Content-Type: text/javascript; charset=utf8');

	echo $_REQUEST["callback"] . "(".json_encode((object)$ob).")";
	exit;
}

if ($_REQUEST["pass"]!=$pass) {
	json_return(array("error"=>"can't login"));
}

switch ($_REQUEST["cmd"]) {
	case "test":
		if (is_array($_REQUEST["args"])) {
			exec("ls " . implode(" ", $_REQUEST["args"]));
		}
	break;
}


json_return(array("message"=>"done"));

