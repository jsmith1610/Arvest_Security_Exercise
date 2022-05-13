<?php

//Connect to our MySQL database using the PDO extension.
$pdo = new PDO('mysql:host=localhost;dbname=zachapma', 'zachapma', ' ');

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
	<head>
		<link rel="stylesheet" href="styles.css"/>
		<script async src='/cdn-cgi/bm/cv/669835187/api.js'></script>
	</head>

	<body>
		<br>
        	<div class="center">
        		<h1>Delete Impact</h1>
		</div>

		<div class="center">
			<div class = "whitebox3">
				<br>
				<div class="center">
        				<form action="delete_impact.php" method="post" style="padding-bottom: 15px">
        				Impact: 
            					<select name="impact" style="margin-bottom: 10px">
                					<?php foreach($impacts as $impact1): ?>
                    						<option value="<?= $impact1['id']; ?>">
                        						<?= $impact1['description']; ?>
                    						</option>
                					<?php endforeach; ?>
            					</select>
					<br>
            				<button type="submit" name="submit" class="btn-group"/>Delete Impact</button>
        			</form>
        
				<form action="http://www.csce.uark.edu/~zachapma/ACE/src/HomePage_Ver2.html" style="padding-top: 15px">
            				<button type="submit" class="btn-group"/>Return to Home Page</button>
        			</form>
        			<br><br>
				</div>

				<?php
					if (isset($_POST['submit'])) 
					{
    					// replace ' ' with '\ ' in the strings so they are treated as single command line args
    					$impact = escapeshellarg($_POST[impact]);

					$command = 'python3 delete_impact.py' . ' ' .  $impact;

					// remove dangerous characters from command to protect web server
					$escaped_command = escapeshellcmd($command);
    					system($escaped_command);           
					}
				?>
			</div>
		</div>
	</body>
</html>

