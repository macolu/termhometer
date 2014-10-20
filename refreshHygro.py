#!/usr/bin/python

import subprocess
import re
import sys
import time

attempts = 0

# Continuously append data
while(attempts < 10):
	# Run the DHT program to get the humidity and temperature readings!
	attempts += 1
	output = subprocess.check_output(["./bin/Adafruit_DHT", "2302", "4"]);

	#matches = re.search("Temp =\s+([0-9.]+)", output)
	#if (not matches):
	#	time.sleep(1)
	#	continue
	#temp = float(matches.group(1))
  
	# search for humidity printout
	matches = re.search("Hum =\s+([0-9.]+)", output)
	if (not matches):
		time.sleep(1)
		continue
	humidity = float(matches.group(1))

	cmd = "echo hygro.salon %.1f %d | nc localhost 2003" % (humidity, time.time())
	#print cmd
	subprocess.Popen(cmd, shell=True)

	sys.exit()

print "Failed"

