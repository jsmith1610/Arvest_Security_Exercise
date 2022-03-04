<?php

//Connect to our MySQL database using the PDO extension.
$pdo = new PDO('mysql:host=localhost;dbname=zachapma', 'zachapma', 'Eeja3dae');

//Our select statement. This will retrieve the data that we want.
$sql = "SELECT * FROM target";

//Prepare the select statement.
$statement = $pdo->prepare($sql);

//Execute the statement.
$statement->execute();

//Retrieve the rows using fetchAll.
$targets = $statement->fetchAll();

?>

<html>
    <body>
        <h3>Enter Target Details:</h3>
        <form action="delete_target.php" method="post" style="margin-bottom: 10px">
            Target: 
            <select name="target" style="margin-bottom: 10px">
                <?php foreach($targets as $target1): ?>
                    <option value="<?= $target1['id']; ?>">
                        <?= $target1['description']; ?> 
                    </option>
                <?php endforeach; ?>
            </select>
            <input name="submit" type="submit" style="margin-bottom: 20px">
        </form>
        <form action="http://www.csce.uark.edu/~zachapma/ACE/src/HomePage_Ver2.html">
            <input type="submit" value="Return to Home Page" />
        </form>
        <br><br>

    </body>
</html>

<?php
if (isset($_POST['submit'])) 
{
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $Target = escapeshellarg($_POST[target]);

    $command = 'python3 delete_target.py' . ' ' .  $Target;

    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    system($escaped_command);           
}
?>