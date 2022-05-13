<html>
	<head>
		<link rel="stylesheet" href="styles.css">
	<script async src='/cdn-cgi/bm/cv/669835187/api.js'></script>
	</head>

	<body>
		<br>
		<div class="center">
			<h1>Arvest Cyber Security Exercise</h1>
		</div>
		<br>
		
		<div class = "whitebox1">
        <div class="center">
        <form action="Includes/login.inc.php" method="post">
					<div class="logo">
						<img src="infosec_Logo_OL.png" alt="Arvest" class="logo">
					</div>
				</div>
				
				<div class= "center">
					<label for="username">Username</label>
                </div>

                <div class="center">
					<input type="text" placeholder="Enter Username" name="username" required>
                </div>
                <br>
				
				<div class="center">
					<label for="password">Password</label>
                </div>   

                <div class="center">
					<input type="password" placeholder="Enter Password" name="password" required>
				</div>
                <br>
					
				
				<div class="center">
					<button type="submit" name="submit" class="sign-in-button">Login</button>
				</div>
			</form>
            <?php
                if (isset($_GET["error"])){
                    if ($_GET["error"] == "emptyinput"){
                        echo "<p>You left something blank!</p>";
                    }
                    else if ($_GET["error"] == "invalidUsername"){
                        echo "<p>Wrong Username</p>";
                    }
                    else if ($_GET["error"] == "invalidPassword"){
                        echo "<p>Wrong Password</p>";
                    }
                    else if ($_GET["error"] == "elevatedUser"){
                        header("location: http://www.csce.uark.edu/~zachapma/ACE/src/Home.html");
                    }
                    else if ($_GET["error"] == "notElevatedUser"){
                        header("location: http://www.csce.uark.edu/~zachapma/ACE/src/scenario_gen.php");
                    }
                    else if ($_GET["error"] == "stmtfailed"){
                        echo "<p>Something went wrong</p>";
                    }
                }
            ?>
		</div>
	<script type="text/javascript">(function(){window['__CF$cv$params']={r:'6dbacd644f9fe037',m:'KH_SQUtpJkEkEAC_mmHIlanhexknf_427iiVeSYskcM-1644553411-0-AeIr81v8dcf0kkQverfjtmePCMEtVXidBrlyOifXgwEauQy2I93GKCmT2wVbdE/k6IikeNHNokyUVF5g5jvtNyeswC00+KUZBtGAe0JeHfQuN7zUD+RQCOQAEDBtFBawCfFQkffE9tcsRxUPbSyKNd39Ff59b9/Hwnw4srIpTP/8psUy9U2Kzbg2RwBFJLLyuw==',s:[0xe631c0afd9,0x5c9432f298],}})();</script>
	</body>

</html>