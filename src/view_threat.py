import traceback
import logging

from python_db import DBConnection


mysql_username = 'zachapma'  # please change to your username
mysql_password = ' '  # please change to your MySQL password

try:
    connection = DBConnection('localhost', mysql_username, mysql_password, mysql_username)  # open database
    res = connection.executeSelect('SELECT * FROM threat;')
    res = res.split('\n')  # split the header and data for printing
    print("<br/>" + "Table threat:" + res[0] + "<br/>" + res[1])
    for i in range(len(res) - 2):
        print(res[i + 2])
    connection.close_db()  # close db

except Exception as e:
    logging.error(traceback.format_exc())
