<html>
	<head>
		<link rel="stylesheet" href="styles.css">
	<script async src='/cdn-cgi/bm/cv/669835187/api.js'></script>
	</head>

	<body>
		<br>
		<div class="center">
			<h1>Update Username</h1>
		</div>
		<br>
		
		<div class = "whitebox1">
        <div class="center">
        <form action="Includes/editUsername.inc.php" method="post">
					<div class="logo">
						<img src="infosec_Logo_OL.png" alt="Arvest" class="logo">
					</div>
				</div>
				
				<div class= "center">
					<label for="oldUsername">Old Username</label>
                </div>

                <div class="center">
					<input type="text" placeholder="Enter Username" name="oldUsername" required>
                </div>
                <br>
				
				<div class="center">
					<label for="newUsername">New Username</label>
                </div>   

                <div class="center">
					<input type="text" placeholder="Enter New Username" name="newUsername" required>
				</div>
                <br>
					
				
				<div class="center">
					<button type="submit" name="submit" class="sign-in-button">Update</button>
				</div>
			</form>
            <!--<p><a href="http://www.csce.uark.edu/~jts033/TestAuthentication/login.php">Logout</a></p><br>-->
            <div style = "position: fixed; left:700px; top:650px;">
					<form action="Home.html" method="post" style="margin-bottom: 10px">
						<button type="submit" name ="submit" class="back-button" >Back to admin</button>
					</form>
					<!--<p><a href="http://www.csce.uark.edu/~jts033/TestAuthentication/login.php">Logout</a></p><br>-->
				 </div>
            <?php
                if (isset($_GET["error"])){
                    if ($_GET["error"] == "emptyinput"){
                        echo "<p>You left something blank!</p>";
                    }
                }
                if (isset($_GET["error"])){
                    if ($_GET["error"] == "usernameIncorrect"){
                        echo "<p>Current Username does not exist!</p>";
                    }
                }
                if (isset($_GET["error"])){
                    if ($_GET["error"] == "nameAlreadyExists"){
                        echo "<p>Username already exists!</p>";
                    }
                }
                if (isset($_GET["error"])){
                    if ($_GET["error"] == "none"){
                        echo "<p>Update Successful!</p>";
                    }
                }

            ?>
		</div>
	<script type="text/javascript">(function(){window['__CF$cv$params']={r:'6dbacd644f9fe037',m:'KH_SQUtpJkEkEAC_mmHIlanhexknf_427iiVeSYskcM-1644553411-0-AeIr81v8dcf0kkQverfjtmePCMEtVXidBrlyOifXgwEauQy2I93GKCmT2wVbdE/k6IikeNHNokyUVF5g5jvtNyeswC00+KUZBtGAe0JeHfQuN7zUD+RQCOQAEDBtFBawCfFQkffE9tcsRxUPbSyKNd39Ff59b9/Hwnw4srIpTP/8psUy9U2Kzbg2RwBFJLLyuw==',s:[0xe631c0afd9,0x5c9432f298],}})();</script>
	</body>

</html>