import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="jts033",
  password="ooho0ooD",
  database= "jts033"
)
mycursor = mydb.cursor()
mycursor.execute("create TABLE threat(id int AUTO_INCREMENT,threat_description char(255) NOT NULL,PRIMARY KEY(id));")
mycursor.execute("create TABLE target(id int AUTO_INCREMENT,"+ 
"threat_id int,description char(255) NOT NULL,PRIMARY KEY(id)," + 
"FOREIGN KEY(threat_id) REFERENCES threat(id));")


