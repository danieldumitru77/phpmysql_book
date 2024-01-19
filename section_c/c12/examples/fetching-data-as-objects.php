<?php

require '../cms/includes/database-connection.php';
require '../cms/includes/functions.php';

$sql = "SELECT id,forename, surname
        FROM member;";
 

$statement = $pdo->query($sql);
$statement->setFetchMode(PDO::FETCH_OBJ);
$members = $statement->fetchAll();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Getting one row of data from a database</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
  </head>
  <body>
    <?php foreach($members as $member) { ?>
    <p>
      <?= html_escape($member->forename) ?>
      <?= html_escape($member->surname) ?>
    </p>
    <?php } ?>
  </body>
</html>