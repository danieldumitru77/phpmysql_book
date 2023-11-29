<?php
$text = 'Home sweet home';
?>
<?php include 'includes/header.php'; ?>
<p>
    <b>Lowercase:</b>
    <?= strtolower($text)?><br>
    <b>Upercase:</b>
    <?= strtoupper($text)?><br>
    <b>Upercase first letter:</b>
    <?= ucwords($text)?><br>
    <b>Character count:</b>

    <?= strlen($text)?><br>
    <b>Word count:</b>
    <?= str_word_count($text)?><br>
</p>

<?php include 'includes/footer.php'; ?>


