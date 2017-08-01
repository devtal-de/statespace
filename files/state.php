<?php
require('/home/thoto/public_html/statespace/spaceopen2.inc.php');
try{
	$open=spaceopen\get_open(true);
	switch($open){
		case '0': echo "unknown"; break;
		case '1': echo "open"; break;
		case '2': echo "closed"; break;
		default: echo 'unknown';
	}
} catch (Exception $e){
	http_response_code(500);
}

