#!/bin/sh
PORT=2003
SERVER=localhost

#echo temp.salon   `owget /uncached/28.88EE8D040000/temperature` `date +%s` | nc $SERVER $PORT
#echo temp.couloir `owget /uncached/28.FAA58E040000/temperature` `date +%s` | nc $SERVER $PORT
echo temp.salon   `cat /mnt/1wire/28.88EE8D040000/temperature` `date +%s` | nc $SERVER $PORT
echo temp.couloir `cat /mnt/1wire/28.FAA58E040000/temperature` `date +%s` | nc $SERVER $PORT

