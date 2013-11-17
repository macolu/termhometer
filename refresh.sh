#!/bin/sh
PORT=2003
SERVER=localhost

echo temp.salon   `owget /uncached/28.88EE8D040000/temperature` `date +%s` | nc $SERVER $PORT
echo temp.couloir `owget /uncached/28.FAA58E040000/temperature` `date +%s` | nc $SERVER $PORT
