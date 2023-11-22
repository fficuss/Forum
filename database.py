from flask import Flask, render_template
import sqlite3

app = Flask(__name__)

# Configuration
DATABASE = 'forum.db'

# Function to connect to the database
def connect_db():
    return sqlite3.connect(DATABASE)

# Initialize the database
def init_db():
    with app.app_context():
        db = connect_db()
        with app.open_resource('schema.sql', mode='r') as f:
            db.cursor().executescript(f.read())
        db.commit()

# Route to display data from the database
@app.route('/')
def index():
    db = connect_db()
    cur = db.execute('SELECT * FROM example_table')
    entries = cur.fetchall()
    db.close()
    return render_template('index.html', entries=entries)

if __name__ == '__main__':
    app.run(debug=True)
