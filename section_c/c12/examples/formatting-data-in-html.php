<?php

require '../cms/includes/database-connection.php';
require '../cms/includes/functions.php';

$sql = "SELECT id, forename, surname, joined, picture
        FROM member";
  
$statement = $pdo->query($sql);
$members =$statement->fetchAll();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Getting one row of data from a database</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
  </head>
  <body>
  <div class="member-summary-grid">
      <?php foreach ($members as $member) { ?>
        <div class="member-summary">
          <img src="../cms/uploads/<?= html_escape($member['picture'] ?? 'blank.png') ?>"
               alt="<?= html_escape($member['forename']) ?>" class="profile">
          <h2><?= html_escape($member['forename']) ?> <?= html_escape($member['surname']) ?></h2>
          <p>Member since:<br><?= format_date($member['joined']) ?></p>
        </div>
      <?php } ?>
    </div>
  </body>
</html>