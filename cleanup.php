<?PHP
/* 
	This is the post-heal hook.

	Load /etc/myCluster.conf for settings
	$path		:	/opt/myCluster
	$email		:	user@mail.com
	$box   		:	Slave 1
	$master		:	master.example.com
	$username	:	replicationUser
	$password	:	replicationPassword

*/

// cleanup script
//$myFile = "/root/masterPosition.sql";
//$fh = fopen($myFile, 'r');
//$file1 = fread($fh, filesize($myFile));
//fclose($fh);
//mail('insidenothing@gmail.com','db1 Self-Heal',addslashes($file1));

exec('logger -p local4.notice -t myCluster "Cleanup Complete"');
?>

?>
