
import datetime

import flask
import pusher
import pymongo


X_ATTR_NAME = 'adminIndexH'
Y_ATTR_NAME = 'adminIndexV'
PUSHER_CHANNEL = 'uberhead'
PUSHER_SLIDE_CHANGED_EVENT = 'slide-changed'
PUSHER_VOTE_CHANGED_EVENT = 'vote-changed'
PUSHER_FRAGMENT_CHANGED_EVENT = 'fragment-changed'
CURRENT_VOTE_ID = 1

app = flask.Flask(__name__)
p = pusher.Pusher(app_id='64189', key='41f5684231688a066aca',
                  secret='203aac83f0a472554f98')
mdb = pymongo.MongoClient().uberhead

@app.route("/presentations", methods=['POST'])
def presentations():
    if flask.request.args.get('action') == 'change_slide':
        x = int(flask.request.form[X_ATTR_NAME])
        y = int(flask.request.form[Y_ATTR_NAME])
        data = {X_ATTR_NAME: x, Y_ATTR_NAME: y}
        p[PUSHER_CHANNEL].trigger(PUSHER_SLIDE_CHANGED_EVENT, data)
        return 's'
    if flask.request.args.get('action') == 'vote':
        alt = flask.request.form['alt']
        mdb.votes.update({'_id': CURRENT_VOTE_ID}, {'$inc': {'%s' % alt: 1}},
                         upsert=True, multi=False)
        data = mdb.votes.find_one({'_id': CURRENT_VOTE_ID})
        data.pop('_id')
        p[PUSHER_CHANNEL].trigger(PUSHER_VOTE_CHANGED_EVENT, data)
        return 'v'
    if flask.request.args.get('action') == 'change_fragment':
        body = flask.request.form['direction']
        p[PUSHER_CHANNEL].trigger(PUSHER_FRAGMENT_CHANGED_EVENT, body)
        return 'f'
    return ''

@app.route("/heartbeat", methods=['POST'])
def heartbeat():
    userid = flask.request.form['userid']
    dt = datetime.datetime.now()
    mdb.heartbeats.update({'_id': userid}, {'_id': userid, 'beat_at': dt}, upsert=True,
                          multi=False)
    return 'h'

if __name__ == "__main__":
    app.debug = True
    app.run()
