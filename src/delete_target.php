<?php

//Connect to our MySQL database using the PDO extension.
$pdo = new PDO('mysql:host=localhost;dbname=zachapma', 'zachapma', ' ');

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
	<head>
		<link rel="stylesheet" href="styles.css"/>
		<script async src='/cdn-cgi/bm/cv/669835187/api.js'></script>
	</head>

	<body>
		<br>
        	<div class="center">
        		<h1>Delete Target</h1>
		</div>

		<div class="center">
			<div class = "whitebox3">
				<br>
				<div class="center">
        				<form action="delete_target.php" method="post" style="padding-bottom: 15px">
        				Target: 
            					<select name="target" style="margin-bottom: 10px">
                					<?php foreach($targets as $target1): ?>
                    						<option value="<?= $target1['id']; ?>">
                        						<?= $target1['description']; ?>
                    						</option>
                					<?php endforeach; ?>
            					</select>
					<br>
            				<button type="submit" name="submit" class="btn-group"/>Delete Target</button>
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
    					$target = escapeshellarg($_POST[target]);

					$command = 'python3 delete_target.py' . ' ' .  $target;

					// remove dangerous characters from command to protect web server
					$escaped_command = escapeshellcmd($command);
    					system($escaped_command);           
					}
				?>
			</div>
		</div>
	</body>
</html>

