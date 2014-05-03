
import flask
import pusher
import pymongo


X_ATTR_NAME = 'adminIndexH'
Y_ATTR_NAME = 'adminIndexV'
PUSHER_CHANNEL = 'uberhead'
PUSHER_SLIDE_CHANGED_EVENT = 'slide-changed'
PUSHER_VOTE_CHANGED_EVENT = 'vote-changed'
CURRENT_VOTE_ID = 1

app = flask.Flask(__name__)
p = pusher.Pusher(app_id='64189', key='41f5684231688a066aca',
                  secret='203aac83f0a472554f98')
mdb = pymongo.MongoClient().uberhead

@app.route("/presentations", methods=['POST'])
def index():
    if flask.request.args.get('action') == 'change_slide':
        x = int(flask.request.form[X_ATTR_NAME])
        y = int(flask.request.form[Y_ATTR_NAME])
        data = {X_ATTR_NAME: x, Y_ATTR_NAME: y}
        p[PUSHER_CHANNEL].trigger(PUSHER_SLIDE_CHANGED_EVENT, data)
        return 's'
    if flask.request.args.get('action') == 'vote':
        alt = flask.request.form['alt']
        mdb.votes.update({'_id': CURRENT_VOTE_ID}, {'$inc': {'alt%s' % alt: 1}},
                         upsert=True, multi=False)
        data = mdb.votes.find_one({'_id': CURRENT_VOTE_ID})
        p[PUSHER_CHANNEL].trigger(PUSHER_VOTE_CHANGED_EVENT, data)
    return ''


if __name__ == "__main__":
    app.debug = True
    app.run()
