<html>
	<head>
		<link rel="stylesheet" href="styles.css"/>
		<script async src='/cdn-cgi/bm/cv/669835187/api.js'></script>
	</head>

	<body>
		<br>
        	<div class="center">
        		<h1>Add Impact</h1>
		</div>

		<div class="center">
			<div class = "whitebox3">
				<br>
				<div class="center">
        				<form action="add_impact.php" method="post" style="padding-bottom: 15px">
            					Description: <input type="text" name="description" style="margin-bottom: 10px"><br>
            					<button type="submit" name="submit" class="btn-group"/>Add Impact</button>
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
    						$description = escapeshellarg($_POST[description]);

    						$command = 'python3 add_impact.py' . ' '.  $description;

    						// remove dangerous characters from command to protect web server
    						$escaped_command = escapeshellcmd($command);

    						// run add_team.py
    						system($escaped_command);           
					}
?>
			</div>
		</div>
	</body>
</html>

