<?php

//Connect to our MySQL database using the PDO extension.
$pdo = new PDO('mysql:host=localhost;dbname=zachapma', 'zachapma', ' ');

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
	<head>
		<link rel="stylesheet" href="styles.css"/>
		<script async src='/cdn-cgi/bm/cv/669835187/api.js'></script>
	</head>

	<body>
		<br>
        	<div class="center">
        		<h1>Delete Threat</h1>
		</div>

		<div class="center">
			<div class = "whitebox3">
				<br>
				<div class="center">
        				<form action="delete_threat.php" method="post" style="padding-bottom: 15px">
        					Threat: 
            						<select name="threat" style="margin-bottom: 10px">
                						<?php foreach($threats as $threat1): ?>
                    							<option value="<?= $threat1['id']; ?>">
                        							<?= $threat1['threat_description']; ?>
                    							</option>
                						<?php endforeach; ?>
            						</select>
						<br>
            					<button type="submit" name="submit" class="btn-group"/>Delete Threat</button>
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
    						$Threat = escapeshellarg($_POST[threat]);

						$command = 'python3 delete_threat.py' . ' ' .  $Threat;

						    // remove dangerous characters from command to protect web server
						    $escaped_command = escapeshellcmd($command);
						    system($escaped_command);           
					}
				?>
			</div>
		</div>
	</body>
</html>