<?php

define('DB_NAME', 'testdb'); /*testdb

/*Database user*/
define('DB_USER', 'root'); /*root

/*Database user password*/
define('DB_PASSWORD', ''); /*''

/* Chances are you won't need to change the following three
settings. Only do so if you know what you're doing.*/

/*Database host*/
define('DB_HOST', 'localhost');

/*Database character set*/
define('DB_CHARSET', 'utf8');

/*Database collation*/
define('DB_COLLATE', '');

$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD, DB_NAME);
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

?>