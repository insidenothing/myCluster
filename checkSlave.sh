#!/bin/sh

echo "check status of db1"
mysql --user=[mysqlusername] --password=[mysqlpassword] < /root/checkSlave.sql > db1Status.txt

echo "Parsing master information from db1"
php -f /root/checkSlave.php
