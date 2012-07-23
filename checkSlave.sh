#!/bin/sh

source /etc/myCluster.conf

echo "check status of db1"
mysql --user=$username --password=$password < /$path/checkSlave.sql > /$path/db1Status.txt

echo "Parsing master information from db1"
php -f /$path/checkSlave.php
