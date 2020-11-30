#test file to make sure main branch works
import json
import mysql.connector
from flask import Flask, render_template
app = Flask(__name__)

@app.route("/")
def pull():
	db = mysql.connector.connect(host = "database-1.c7mdfiikfgpx.us-east-1.rds.amazonaws.com", user = "admin", 
		password = "myawsdatabase20!", db = "studentdb", port = 3306)
	cursor = db.cursor(dictionary = True)
	cursor.execute("SELECT * FROM savedBook ")
	results = cursor.fetchall()
	print(json.dumps(results))
	return render_template('book_save.html')
if __name__ == '__main__':
	app.run(debug = True)
