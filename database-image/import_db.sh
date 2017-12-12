#!/bin/bash

find /var/lib/mysql -type f -exec touch {} \;
/etc/init.d/mysql restart
echo "CREATE DATABASE ocpl;" | mysql -ptoor -uroot
zcat /tmp/oc_dev_dump.sql.gz | mysql --force -uroot -ptoor ocpl &
sleep 1
ps aux
PROCESS_NUM=1;
while [ $PROCESS_NUM -ne 0 ]; #workaround for travis time out
do
	echo "Importing OC PL Devel Database Dump..."
	sleep 5
	PROCESS_NUM=$(ps -ef | grep "gzip" | grep -v "grep" | wc -l)
done
echo "DB imported! :)"
sleep 5
