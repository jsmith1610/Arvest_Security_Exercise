<html>
    <body>
        <h3>View impacts:</h3>

        <form method="post">
            <input type="submit" name="button" value="view impacts"/>
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
    
    $change_dir = '../python/View';
    $command = 'python3 view_impact.py';

    // remove dangerous characters from command to protect web server
    $dir_command = escapeshellcmd($change_dir);
    $escaped_command = escapeshellcmd($command);

    system($dir_command);
    system($escaped_command);           
}
?>