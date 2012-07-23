#!/bin/sh

source /etc/myCluster.conf

echo "Getting MySQL Data files from $mirror1"

rsync -avz --progress --exclude '*bin*' $mirror1:/var/lib/mysql/* /var/lib/mysql

