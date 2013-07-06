#!/bin/bash

#$ -N random-featured-update
#$ -o /data/project/random-featured/update.log
#$ -e /data/project/random-featured/update.log
#$ -l h_vmem=500M

php /data/project/random-featured/php/update.php
