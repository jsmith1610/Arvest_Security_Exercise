import sys
import traceback
import logging
import random

from python_db import DBConnection

mysql_username = 'zachapma'  # please change to your username
mysql_password = ' '  # please change to your MySQL password


def random_element(arr):
	num = random.randint(5, len(arr)-3)
	return arr[num]


try:
    connection = DBConnection('localhost', mysql_username, mysql_password, mysql_username)  # open database
    
    InputedThreatID = sys.argv[1]
    
    #Display Threat Description
    query2 = "SELECT threat_description FROM threat WHERE id = " + InputedThreatID + ";"
    res2 = connection.executeSelect(query2)
    res2 = res2.split('\n')  # split the header and data for printing
    print("Threat Description:" + res2[0] + "<br/>" + res2[1])

    # print(res2[2])           # Displays Names of Database Atributes
    print(res2[5])           # Displays Selected Threat Description
    print(res2[len(res2)-1]) # Utilizes Stored Table Format
    # print("<br/>")
        
    #Display Target Description
    query3 = "SELECT description FROM target WHERE threat_id = " + InputedThreatID + ";"
    res3 = connection.executeSelect(query3)
    res3 = res3.split('\n')  # split the header and data for printing
    print("<br/>" + "Target Description:" + res3[0] + "<br/>" + res3[1])

    # print(res3[2])           # Displays Names of Database Atributes
    random_id = random_element(res3)
    print(random_id)         # Displays Random Target Description
    print(res3[len(res3)-1]) # Utilizes Stored Table Format
    # print("<br/>")
    
    #Display Inject Description
    query4 = "SELECT description FROM inject WHERE threat_id = " + InputedThreatID + ";"
    res4 = connection.executeSelect(query4)
    res4 = res4.split('\n')  # split the header and data for printing
    print("<br/>" + "Inject Description:" + res4[0] + "<br/>" + res4[1])

    # print(res4[2])           # Displays Names of Database Atributes
    random_id = random_element(res4)
    print(random_id)         # Displays Random Inject Description
    print(res4[len(res4)-1]) # Utilizes Stored Table Format
    # print("<br/>")
    
    #Display Vulnerability Description
    query5 = "SELECT description FROM vulnerability WHERE threat_id = " + InputedThreatID + ";"
    res5 = connection.executeSelect(query5)
    res5 = res5.split('\n')  # split the header and data for printing
    print("<br/>" + "Vulnerability Description:" + res5[0] + "<br/>" + res5[1])

    # print(res5[2])           # Displays Names of Database Atributes
    random_id = random_element(res5)
    print(random_id)         # Displays Random Vulnerability Description
    print(res5[len(res5)-1]) # Utilizes Stored Table Format
    # print("<br/>")
    
    #Display Impact Description
    query6 = "SELECT description FROM impact;"
    res6 = connection.executeSelect(query6)
    res6 = res6.split('\n')  # split the header and data for printing
    print("<br/>" + "All Possible Impacts:" + res6[0] + "<br/>" + res6[1])
    for i in range(len(res6) - 2):
            if(i != 0):
              print(res6[i + 2])
    
    connection.close_db()    # close db

except Exception as e:
    logging.error(traceback.format_exc())
