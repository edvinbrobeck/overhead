
import flask
import pusher


X_ATTR_NAME = 'adminIndexH'
Y_ATTR_NAME = 'adminIndexV'
PUSHER_CHANNEL = 'uberhead'
PUSHER_SLIDE_CHANGED_EVENT = 'slide-changed'

app = flask.Flask(__name__)
p = pusher.Pusher(app_id='64189', key='41f5684231688a066aca',
                  secret='203aac83f0a472554f98')

@app.route("/presentations", methods=['POST'])
def presentations():
    if flask.request.args.get('action') == 'change_slide':
        x = int(flask.request.form[X_ATTR_NAME])
        y = int(flask.request.form[Y_ATTR_NAME])
        data = {X_ATTR_NAME: x, Y_ATTR_NAME: y}
        p[PUSHER_CHANNEL].trigger(PUSHER_SLIDE_CHANGED_EVENT, data)
        return 's'
    return ''


if __name__ == "__main__":
    app.debug = True
    app.run()
