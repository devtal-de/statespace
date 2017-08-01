<?php
	function setstate($state){
		$fd=fopen("/home/thoto/public_html/statespace/state.txt",'w');
		if(!$fd) return 0;
		fwrite($fd,$state);
		fclose($fd);
	}
	if(isset($_GET["state"])){
		if(strcmp($_GET["state"],"CRITICAL")==0){
			setstate("geschlossen");
		}elseif(strcmp($_GET["state"],"OK")==0){
			setstate("offen");
		}
	}
?>
