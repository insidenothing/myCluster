#!/bin/sh

source /etc/myCluster.conf

logger -p local4.notice -t myCluster  "Get status of $box"
mysql --user=$username --password=$password < /$path/checkSlave.sql > /$path/db1Status.txt

logger -p local4.notice -t myCluster  "Parsing position information from $box"
php -f /$path/checkSlave.php
