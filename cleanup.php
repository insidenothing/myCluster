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

$myFile = "/$path/masterPosition.sql";
$fh = fopen($myFile, 'r');
$file1 = fread($fh, filesize($myFile));
fclose($fh);
mail($email,'Slave Self-Heal',addslashes($file1));

?>
