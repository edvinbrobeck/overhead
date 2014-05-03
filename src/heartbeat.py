#!/usr/bin/python

import datetime
import time

import pymongo
import pusher


PUSHER_CHANNEL = 'uberhead'
PUSHER_USERCOUNT_CHANGED_EVENT = 'usercount-changed'
CURRENT_VOTE_ID = 1

p = pusher.Pusher(app_id='64189', key='41f5684231688a066aca',
                  secret='203aac83f0a472554f98')
mdb = pymongo.MongoClient().uberhead

def main():
    current_count = 0
    print 'starting..'
    while True:
        dt = datetime.datetime.now() - datetime.timedelta(seconds=13)
        user_count = mdb.heartbeats.find({'beat_at': {'$gte': dt}}).count()
        if current_count == user_count:
            time.sleep(1)
            continue
        current_count = user_count
        send_count = user_count
        if send_count == 0:  send_count = 1
        print 'user count is <%d>, <%s>' % (current_count, datetime.datetime.now())
        p[PUSHER_CHANNEL].trigger(PUSHER_USERCOUNT_CHANGED_EVENT,
                                  {'userCount': send_count})
        print '> push sent (%d)' % send_count

if __name__ == '__main__':
    main()
