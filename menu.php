<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../navbar.css" type="text/css" media="screen" />
<div id="header"><div class= "logo"><span ><img src="../doro.png" /></span></a></div></div>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">D'oro Gelato and Caffe</a>
    </div>
	
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="../home.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Production<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../gelato/gelprod.php">Gelato Production</a></li>
            <li><a href="../cake/cakeprod.php">Cake Production</a></li>
            <li><a href="../dessert/desprod.php">Dessert Production</a></li>
          </ul>
        </li>
		 <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Inventory<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../gelato/gelcomp.php">Gelato Inventory</a></li>
            <li><a href="../cake/cakecomp.php">Cake Inventory</a></li>
            <li><a href="../dessert/descomp.php">Dessert Inventory</a></li>
          </ul>
        </li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Revenue<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../cashHandling/revenue.php">Daily Revenue</a></li>
            <li><a href="../cashHandling/Safetill.php">Shift Count</a></li>
          </ul>
        </li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Audits<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../audits/dbc.php">Daily Bathroom Check</a></li>
            <li><a href="../audits/temperature.php">Daily Temperature Check</a></li>
          </ul>
        </li>
		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Management<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../cake/cake.php">Cake Admin</a></li>
            <li><a href="../gelato/index.php">Gelato Admin</a></li>
			<li><a href="../dessert/dessert.php">Dessert Admin</a></li>
			<li><a href="../audits/auditcontrols.php">Audits Admin</a></li>
          </ul>
        </li>
	  		<li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Dashboard<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../cake/cake.php">Cake Admin</a></li>
            <li><a href="../dashboard/dashboard.php">Gelato Dashboard</a></li>
			<li><a href="../dessert/dessert.php">Dessert Admin</a></li>
			<li><a href="../audits/auditcontrols.php">Audits Admin</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../login/logout.php"><span class="glyphicon glyphicon-user"></span> Logout</a></li>
        <li><a href="../login/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>