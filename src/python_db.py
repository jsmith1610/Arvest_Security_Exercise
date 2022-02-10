import mysql.connector
from tabulate import tabulate


class DBConnection():

    def __init__(self, hostname, user_name, mysql_pw, database_name):
        self.conn = mysql.connector.connect(host=hostname, user=user_name, password=mysql_pw, database=database_name)
        self.cursor = self.conn.cursor()

    def printFormat(self, result):
        header = []
        for cd in self.cursor.description:  # get headers
            header.append(cd[0])
        print('')
        print('Query Result:')
        print('')
        return(tabulate(result, headers=header, tablefmt="html"))  # print results in table format

    # select and display query
    def executeSelect(self, query):
        self.cursor.execute(query)
        res = self.printFormat(self.cursor.fetchall())
        return res

    def insert(self, table, values):
        query = "INSERT into " + table + " values (" + values + ")" + ';'
        self.cursor.execute(query)
        self.conn.commit()

    def executeUpdate(self, query):  # use this function for delete and update
        self.cursor.execute(query)
        self.conn.commit()

    def close_db(self):  # use this function to close db
        self.cursor.close()
        self.conn.close()


class Threat():
    def __init__(self, id, description):
        self.ID = id
        self.description = description

    def getID(self):
        return self.ID

    def getDesc(self):
        return self.description


class Target():
    def __init__(self, id, threat, description):
        self.ID = id
        self.threat = threat
        self.description = description

    def getID(self):
        return self.ID

    def getThreat(self):
        return self.threat

    def getDesc(self):
        return self.description


class Impact():
    def __init__(self, id, threat, description):
        self.ID = id
        self.threat = threat
        self.description = description

    def getID(self):
        return self.ID

    def getThreat(self):
        return self.threat

    def getDesc(self):
        return self.description


class Inject():
    def __init__(self, id, description):
        self.ID = id
        self.description = description

    def getID(self):
        return self.ID

    def getDesc(self):
        return self.description


class Vulnerability():
    def __init__(self, id, threat, description):
        self.ID = id
        self.threat = threat
        self.description = description

    def getID(self):
        return self.ID

    def getThreat(self):
        return self.threat

    def getDesc(self):
        return self.description


class Scenario():
    def __init__(self, id, threat, target, inject, impact, vulnerability, user):
        self.ID = id
        self.threat = threat
        self.target = target
        self.inject = inject
        self.impact = impact
        self.vulnerability = vulnerability
        self.user = user

    def getID(self):
        return self.ID

    def getThreat(self):
        return self.threat

    def getTarget(self):
        return self.target

    def getInject(self):
        return self.inject

    def getImpact(self):
        return self.impact

    def getVulnerability(self):
        return self.vulnerability

    def getUser(self):
        return self.user
