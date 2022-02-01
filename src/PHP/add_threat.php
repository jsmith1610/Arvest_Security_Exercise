<html>
    <body>
        <h3>Enter Threat details:</h3>

        <form action="add_threat.php" method="post" style="margin-bottom: 10px">
            description: <input type="text" name="description" style="margin-bottom: 10px"><br>
            <input name="submit" type="submit" style="margin-bottom: 20px">
        </form>

        <form action="http://www.csce.uark.edu/~zachapma/ACE/src/home.html">
            <input type="submit" value="Return to Home Page" />
        </form>
        <br><br>

    </body>
</html>

<?php
if (isset($_POST['submit'])) 
{
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $description = escapeshellarg($_POST[description]);

    $change_dir = '../python';
    $command = 'python3 add_threat.py' . ' '.  $description;

    // remove dangerous characters from command to protect web server
    $dir_command = escapeshellcmd($change_dir);
    $escaped_command = escapeshellcmd($command);

    // run add_team.py
    system($dir_command);
    system($escaped_command);           
}
?>