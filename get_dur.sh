#!/bin/bash

DATE=`date +%Y%m%d%S`
TMPFILE="/tmp/temp_${DATE}"

if [ "$1" != "" ]; then
   input=$1
 else
   echo -e "\nERROR: Please input csv file as \$1\nEXAMPLE: ./get_dur.sh zbx_events_export.csv\n"
  exit 1
fi

grep PROBLEM "${input}"* |cut -d"," -f6| tr -d \" > ${TMPFILE}

php zabbixtime.php ${TMPFILE}

rm ${TMPFILE}

exit 0
