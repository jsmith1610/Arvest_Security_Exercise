<?php

//Connect to our MySQL database using the PDO extension.
$pdo = new PDO('mysql:host=localhost;dbname=zachapma', 'zachapma', 'Eeja3dae');

//Our select statement. This will retrieve the data that we want.
$sql = "SELECT * FROM impact";

//Prepare the select statement.
$statement = $pdo->prepare($sql);

//Execute the statement.
$statement->execute();

//Retrieve the rows using fetchAll.
$impacts = $statement->fetchAll();

?>

<html>
    <body>
        <h3>Enter Impact Details:</h3>
        <form action="delete_impact.php" method="post" style="margin-bottom: 10px">
            impact: 
            <select name="impact" style="margin-bottom: 10px">
                <?php foreach($impacts as $impact1): ?>
                    <option value="<?= $impact1['id']; ?>">
                        <?= $impact1['description']; ?>
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
    $impact = escapeshellarg($_POST[impact]);
    
    $change_dir = '../python/Delete';
    $command = 'python3 delete_impact.py' . ' ' .  $impact;

    // remove dangerous characters from command to protect web server
    $escaped_command = escapeshellcmd($command);
    system($escaped_command);           
}
?>
