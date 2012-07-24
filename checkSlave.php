<?PHP
// this file will check what sql reported back
$myFile = "/root/db1Status.txt";
$fh = fopen($myFile, 'r');
while (!feof($fh)) {
$line = fgets($fh);
$findme   = 'Slave_SQL_Running';
$pos = strpos($line, $findme);
if ($pos !== false) {

$findme2   = 'No';
$pos2 = strpos($line, $findme2);
if ($pos2 !== false) {
exec('logger -p local4.notice -t myCluster "Slave SQL NOT Running"');
exec('/root/heal.sh');

}
} else {
exec('logger -p local4.notice -t myCluster "Slave SQL Running"');
}
}
fclose($fh);
$myFile = "/root/db1Status.txt";
$fh = fopen($myFile, 'r');
while (!feof($fh)) {
$line = fgets($fh);
$findme   = 'Slave_IO_Running';
$pos = strpos($line, $findme);
if ($pos !== false) {

$findme2   = 'No';
$pos2 = strpos($line, $findme2);
if ($pos2 !== false) {
exec('logger -p local4.notice -t myCluster "Slave IO NOT Running"');
exec('/root/heal.sh');
}
} else {
exec('logger -p local4.notice -t myCluster "Slave IO Running"');
}
}
fclose($fh);
?>
