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

mail('insidenothing@gmail.com','Zed Auto-Starting Self-Heal: Slave_SQL_Running','healing based on'.$line);
exec('/root/heal.sh');

}
} else {
//    echo "The string '$findme' was not found in the string '$mystring'";
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

mail('insidenothing@gmail.com','Zed Auto-Starting Self-Heal: Slave_IO_Running','healing based on'.$line);
exec('/root/heal.sh');

}
} else {
//    echo "The string '$findme' was not found in the string '$mystring'";
}
}
fclose($fh);
?>
