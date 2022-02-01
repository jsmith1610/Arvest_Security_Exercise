<?php

//Connect to our MySQL database using the PDO extension.
$pdo = new PDO('mysql:host=localhost;dbname=zachapma', 'zachapma', 'Eeja3dae');

//Our select statement. This will retrieve the data that we want.
$sql = "SELECT * FROM threat";

//Prepare the select statement.
$statement = $pdo->prepare($sql);

//Execute the statement.
$statement->execute();

//Retrieve the rows using fetchAll.
$threats = $statement->fetchAll();

?>

<html>
    <body>
        <h3>Enter Target Details:</h3>
        <form action="add_target.php" method="post" style="margin-bottom: 10px">
            Threat: 
            <select name="threat" style="margin-bottom: 10px">
                <?php foreach($threats as $threat1): ?>
                    <option value="<?= $threat1['id']; ?>">
                        <?= $threat1['threat_description']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>
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
    $Threat = escapeshellarg($_POST[threat]);
    $description = escapeshellarg($_POST[description]);
    
    $change_dir = '../python';
    $command = 'python3 add_target.py' . ' '.  $Threat . ' ' . $description;

    // remove dangerous characters from command to protect web server
    $dir_command = escapeshellcmd($change_dir);
    $escaped_command = escapeshellcmd($command);
    //echo "<p>command: $command <p>"; 
    // run add_team.py
    system($dir_command);
    system($escaped_command);           
}
?>