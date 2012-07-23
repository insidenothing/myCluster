#!/bin/sh

source /etc/myCluster.conf

echo "Stop slave on this slave"
mysql --user=$username --password=$password < /$path/stopSlave.sql > /$path/enterStatus1.txt

echo "Stop another slave to get it's copy"
ssh $mirror1 mysql --user=$username --password=$password < /$path/stopSlave.sql > /$path/enterStatus2.txt

echo "Transfer the other mirror to here (&background)"
/$path/getDB1.sh &

echo "Parsing master information from the other slave"
php -f /$path/buildSQL.php

echo "Set new master position on this slave"
mysql --user=$username --password=$password < /$path/masterPosition.sql > /$path/setStatus1.txt

echo "Start slave on db2"
ssh $mirror1 mysql --user=$username --password=$password < /$path/startSlave.sql > /$path/exitStatus2.txt

echo "Start our other slave back up."
mysql --user=$username --password=$password < /$path/startSlave.sql > /$path/exitStatus1.txt

echo "Cleanup"
php -f /$path/cleanup.php
