<?php

class Customer{

 public string $forname;
 public string $surname;
 public string $email;
 public string $password;

}


class Account {
    //properties
    public int $number;
    public string $type;
    public float $balance;
  
    //methods

}

$customer = new Customer();
$account = new Account();
$customer->email = 'daniel@mihai.com';
$account->balance = 1000.00;

?>

<?php  include 'includes/header.php'; ?>

<p>Email : <?= $customer->email ?> </p>
<p>Balance : $<?= $account->balance?> </p>

<?php  include 'includes/footer.php'; ?>


