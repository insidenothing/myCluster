#!/bin/sh

source myCluster.conf

echo "check status of db1"
mysql --user=$username --password=$password < /root/checkSlave.sql > db1Status.txt

echo "Parsing master information from db1"
php -f /root/checkSlave.php
