<?php
class Customer{

 public string $forname;
 public string $surname;
 public string $email;
 public string $password;

}


$customer = new Customer();
$account = new Account();
$customer->email = 'daniel@mihai.com';
$account->balance = 1000.00;

