#!/bin/bash

echo `date`." Sending to LRS.\n" >> /tmp/outla.txt
php eco_sync.php
php eco_fillid.php
php lrssend.php >> /tmp/outla.txt
echo "UPDATE eco_events SET sync=1 WHERE sync=0;" | mysql -u root mimooc
echo `date`." Finished sending to LRS.\n" >> /tmp/outla.txt
