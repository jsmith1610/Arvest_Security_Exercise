import sys
import traceback
import logging
import python_db


mysql_username = 'zachapma'  # please change to your username
mysql_password = ' '  # please change to your MySQL password

try:
    python_db.open_database('localhost', mysql_username, mysql_password, mysql_username)  # open database
    res = python_db.executeSelect('SELECT * FROM target;')
    res = res.split('\n')  # split the header and data for printing
    print("<br/>" + "Table target before:" + res[0] + "<br/>" + res[1])
    for i in range(len(res) - 2):
        print(res[i + 2])
    python_db.executeUpdate("DELETE FROM target WHERE ID = " + sys.argv[1]
                            + " AND threat_ID = " + sys.argv[2] + ";")
    res = python_db.executeSelect('SELECT * FROM target;')
    res = res.split('\n')  # split the header and data for printing
    print("<br/>" + "<br/>")
    print("<br/>" + "Table target after:" + res[0] + "<br/>" + res[1])
    for i in range(len(res) - 2):
        print(res[i + 2])
    python_db.close_db()  # close db

except Exception as e:
    logging.error(traceback.format_exc())
