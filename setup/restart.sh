#!/bin/sh

sudo uwsgi --stop /tmp/uwsgi.pid
sleep 2
sudo uwsgi /app/uberhead/setup/uwsgi.ini
