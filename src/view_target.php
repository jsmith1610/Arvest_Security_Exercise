<html>
    <body>
        <h3>View targets:</h3>

        <form action="view_target.php" method="get" style="padding-bottom:10px">
            <input type="submit" name="submit" value="view targets"/>
        </form>
        

        <form action="http://www.csce.uark.edu/~zachapma/ACE/src/HomePage_Ver2.html">
            <input type="submit" value="Return to Home Page" />
        </form>
        <br><br>

    </body>
</html>

<?php
if (isset($_GET['submit'])) 
{
    
    //$change_dir = '../python';
    $command = 'python3 view_target.py';

    // remove dangerous characters from command to protect web server
    //$dir_command = escapeshellcmd($change_dir);
    $escaped_command = escapeshellcmd($command);

    //system($dir_command);
    system($escaped_command);           
}
?>