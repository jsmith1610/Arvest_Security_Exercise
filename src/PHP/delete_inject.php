<?php

//Connect to our MySQL database using the PDO extension.
$pdo = new PDO('mysql:host=localhost;dbname=zachapma', 'zachapma', 'Eeja3dae');

//Our select statement. This will retrieve the data that we want.
$sql = "SELECT * FROM inject";

//Prepare the select statement.
$statement = $pdo->prepare($sql);

//Execute the statement.
$statement->execute();

//Retrieve the rows using fetchAll.
$injects = $statement->fetchAll();

?>

<html>
    <body>
        <h3>Enter inject Details:</h3>
        <form action="delete_inject.php" method="post" style="margin-bottom: 10px">
            inject: 
            <select name="inject" style="margin-bottom: 10px">
                <?php foreach($injects as $inject1): ?>
                    <option value="<?= $inject1['id']; ?>">
                        <?= $inject1['description']; ?> 
                    </option>
                <?php endforeach; ?>
            </select>
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
    $inject = escapeshellarg($_POST[inject]);

    $command = 'python3 delete_inject.py' . ' ' .  $inject;

    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    system($escaped_command);           
}
?>
