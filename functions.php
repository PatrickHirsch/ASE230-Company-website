<?php 
function readUserData(){
	$JSONData = fopen('starluxe.json','r');
	fread($JSONData,filesize('starluxe.json'));
	fclose($JSONData);
}

?>