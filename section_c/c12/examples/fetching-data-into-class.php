<?php

require '../cms/includes/database-connection.php';
require '../cms/includes/functions.php';
require 'classes/Member.php';

$sql = "SELECT forename, surname
        FROM member
        WHERE id = 1 ;";
 

$statement = $pdo->query($sql);
$statement->setFetchMode(PDO::FETCH_CLASS,'Member');
$member = $statement->fetch();
var_dump($member);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Getting one row of data from a database</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
  </head>
  <body>
    
    <p>
      <?= html_escape($member->getFullName()) ?>
    </p>
  
  </body>
</html>