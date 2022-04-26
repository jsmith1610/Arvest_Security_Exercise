<html>
	<head>
		<link rel="stylesheet" href="styles.css"/>
		<script async src='/cdn-cgi/bm/cv/669835187/api.js'></script>
	</head>

	<body>
		<br>
        	<div class="center">
			<h1>View Inject</h1>
		</div>

		<div class="center">
			<div class = "whitebox3">
				<br>
				<div class="center">
					<form action="view_inject.php" method="get" style="padding-bottom:15px">
						<button type="submit" name="submit" class="btn-group"/>View Injects</button>
					</form>
					
					<form action="http://www.csce.uark.edu/~zachapma/ACE/src/HomePage_Ver2.html" style="padding-bottom:15px">
						<button type="submit" class="btn-group"/>Return to Home Page</button>
					</form>
					<br><br>
				</div>
				<?php
					if (isset($_GET['submit'])) 
					{
    
    						//$change_dir = '../python';
    						$command = 'python3 view_inject.py';

    						// remove dangerous characters from command to protect web server
    						//$dir_command = escapeshellcmd($change_dir);
    						$escaped_command = escapeshellcmd($command);

    						//system($dir_command);
    						system($escaped_command);           
					}
				?>
			</div>
		</div>
	</body>
</html>