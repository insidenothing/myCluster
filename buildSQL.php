<?PHP
/* 
	This file will read the master information from enterStatus2.txt
	parse out Master_Log_File and Read_Master_Log_Pos
	then take that data and create a file masterPosition.sql
	masterPosition.sql will be run before startSlave.sql only on db1

	Load /etc/myCluster.conf for settings
	$path 		:	/opt/myCluster
	$email		:	user@mail.com
	$box   		:	Slave 1
	$master		:	master.example.com
	$username	:	replicationUser
	$password	:	replicationPassword
*/
$myFile = "/$path/enterStatus2.txt";
$fh = fopen($myFile, 'r');
while (!feof($fh)) {
$line = fgets($fh);
$findme   = 'Master_Log_File';
$pos = strpos($line, $findme);
if ($pos !== false) {
$parts = explode(":", $line);
$master_log_file = trim($parts[1]);
echo "Found Master_Log_File as '$master_log_file'
";
}
$findme   = 'Read_Master_Log_Pos';
$pos = strpos($line, $findme);
if ($pos !== false) {
$parts = explode(":", $line);
$master_log_pos = trim($parts[1]);
echo "Found Read_Master_Log_Pos as '$master_log_pos'
";
}
}
fclose($fh);
$query = "CHANGE MASTER TO MASTER_HOST='$master', MASTER_USER='$username', MASTER_PASSWORD='$password', MASTER_LOG_FILE='$master_log_file', MASTER_LOG_POS=$master_log_pos;";
$mySQLFile = "/$path/masterPosition.sql";
$fh2 = fopen($mySQLFile, 'w') or die("can't open file");
fwrite($fh2, $query);
fclose($fh2);
?>
