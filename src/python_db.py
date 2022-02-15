import mysql.connector
from tabulate import tabulate


class DBConnection():
    """
    This class was created to connect to/manage the database as a whole.
    It allows for displaying/printing, inserting, deleting, updating, and closing of the database.
    """

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
    """
    This class is for the management of the possible threats in any given security scenario.
    It allows for the addition, removal, and viewing of the list of threats within the database.
    """

    def __init__(self, id, description):
        self.ID = id
        self.description = description

    def getID(self):
        return self.ID

    def getDesc(self):
        return self.description


class Target():
    """
    This class is for the management of the possible targets in any given security scenario.
    It allows for the addition, removal, and viewing of the list of targets within the database.
    """

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
    """
    This class is for the management of the possible impacts in any given security scenario.
    It allows for the addition, removal, and viewing of the list of impacts within the database.
    """

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
    """
    This class is for the management of the possible injects in any given security scenario.
    It allows for the addition, removal, and viewing of the list of threats within the database.
    """

    def __init__(self, id, description):
        self.ID = id
        self.description = description

    def getID(self):
        return self.ID

    def getDesc(self):
        return self.description


class Vulnerability():
    """
    This class is for the management of the possible vulnerabilities in any given security scenario.
    It allows for the addition, removal, and viewing of the list of vulnerabilities within the database.
    """

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
    """
    This class is for the management of the security scenarios comprised of threats, targets, impacts, injects, and vulnerabilities.
    Each scenario generated includes one of each of the objects listed above.
    """

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
