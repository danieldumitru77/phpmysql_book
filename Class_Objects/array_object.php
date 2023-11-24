<?php


 declare(strict_types=1);

class Account {
    //properties
    public array $number;
    public string $type;
    protected float $balance;
   
    public function __construct(array $number , string $type , float $balance = 0.00){
        $this->number  = $number;
        $this->type    = $type;
        $this->balance = $balance;
    }
    public function deposit(float $amount): float
    {
        $this->balance += $amount;
        return $this->balance;
    }

    public function withdraw(float $amount): float
    {
        $this->balance -= $amount;
        return $this->balance;
    }
    public function getBalance(): float
    {
        return $this->balance;
    }


}
  //creem array
    $number=['account_number'=>12346778,
              'routing_number'=>97324241, ];
              //creare instanta a clasei si setare proprietati
$account = new Account($number, 'Savings', 32.0);

?>

<?php  include 'includes/header.php'; ?>
<h2> <?= $account->type ?> Balances</h2>

Account <?= $account->number['account_number'] ?> <br>
Routing <?= $account->number['routing_number'] ?> <br>
<?php  include 'includes/footer.php'; ?>


