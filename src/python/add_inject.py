import sys
import traceback
import logging
import python_db


mysql_username = 'zachapma'  # please change to your username
mysql_password = 'Eeja3dae'  # please change to your MySQL password


try:
    python_db.open_database('localhost', mysql_username, mysql_password, mysql_username)  # open database
    res = python_db.executeSelect('SELECT * FROM inject;')
    res = res.split('\n')  # split the header and data for printing
    print("<br/>" + "Table inject before:" + res[0] + "<br/>" + res[1])
    for i in range(len(res) - 2):
        print(res[i + 2])
    threat_ID = sys.argv[1]
    description = sys.argv[2]
    val = "NULL" + ",'" + threat_ID + "','" + description + "'"
    python_db.insert("inject", val)
    res = python_db.executeSelect('SELECT * FROM inject;')
    res = res.split('\n')  # split the header and data for printing
    print("<br/>" + "<br/>")
    print("<br/>" + "Table inject after:" + res[0] + "<br/>" + res[1])
    for i in range(len(res) - 2):
        print(res[i + 2])
    python_db.close_db()  # close db

except Exception as e:
    logging.error(traceback.format_exc())
