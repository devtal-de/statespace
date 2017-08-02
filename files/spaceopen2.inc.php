<?php namespace spaceopen;
function get_open(){
	$fd=fopen("/home/thoto/public_html/statespace/state.txt",'r');
	$stat=fstat($fd);
	$open=0;
	if($fd){
		$line=fread($fd,5);
		if(strcmp($line,"offen")==0){
			if($stat["mtime"]>=time()-3600*24) $open=1;
			else $open=0;
		} elseif(strcmp($line,"gesch")==0) $open=2;
		else throw new Exception("invalid state");
		fclose($fd);
	}
	return $open;
}
	
function print_open_noexcept(){
	try {
		return get_open();
	}catch(Exception $e){
		return false;
	}
}
function print_open($except=false){
	if($except==false){
		$open=print_open_noexcept();
		if($open===false) $open=0;
	}
	else $open=get_open();

	echo "<div><div style='float: right;'>";
	if($open==1) echo '<img src="/~thoto/statespace/dt-offen.png" alt="offen">';
	if($open==2) echo '<img src="/~thoto/statespace/dt-geschlossen.png" alt="zu">';
	echo "</div>  <div style='text-align:left'> Raum ist ";
	echo ($open==1)?"offen":(($open==2)?"geschlossen":" EEH.");
	echo " </div></div>";
}
?>
