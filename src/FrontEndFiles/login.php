<html>
<style>
  body 
  {
    height:100%;
    width:100%;
    margin:0;
    display:flex;
  }

  img
  {
    width:300px;
    height:auto;
  }

  #form-style 
  {
    margin:auto;
    height:500px;
    width:400px;
    background: white;
    font-size: 14px;
    font-family: Verdana;
  }

  .button1
  {
    background-color: #F20000;
    border: none;
    color: white;
    font-family: Verdana;
    font-weight: bold;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    cursor: pointer;
  }
</style>

<script async src='/cdn-cgi/bm/cv/669835187/api.js'></script><body bgcolor="#00457C">
<div id="form-style">

  <center>
  <div class="logo">
    <img src="infosec_logo_OL.png" alt="Arvest" class="logo">
  </div>
  </center>
  <br><br>

  <center>
  <label for="username">Username</label>
  <input type="text" placeholder="Enter Username" name="username" required>
  <br><br>
  <label for="password">Password</label>
  <input type="password" placeholder="Enter Password" name="password" required>
  <br><br><br>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <button type="submit" class="button1">Sign In</button>
  </form>
  </center>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['username'];
    if (($name) == "Jacob") {
      <form action="HomePage_Ver2.html" method="post">
      </form>
      echo "That is correct";
  } else {
      <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
      </form>
      echo "Incorrect Username";
  }
  }
?>
</div>
<script type="text/javascript">(function(){window['__CF$cv$params']={r:'6dbacd644f9fe037',m:'KH_SQUtpJkEkEAC_mmHIlanhexknf_427iiVeSYskcM-1644553411-0-AeIr81v8dcf0kkQverfjtmePCMEtVXidBrlyOifXgwEauQy2I93GKCmT2wVbdE/k6IikeNHNokyUVF5g5jvtNyeswC00+KUZBtGAe0JeHfQuN7zUD+RQCOQAEDBtFBawCfFQkffE9tcsRxUPbSyKNd39Ff59b9/Hwnw4srIpTP/8psUy9U2Kzbg2RwBFJLLyuw==',s:[0xe631c0afd9,0x5c9432f298],}})();</script></body>
</html>