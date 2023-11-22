<?php



class Account {
    //properties
    public int $number;
    public string $type;
    public float $balance;
  
    //methods
    public function deposit(float $amount) :float{
        
        $this->balance += $amount;
        return $this->balance;

    }
    
    public function withdraw( float $amount) :float{
        
        $this->balance += $amount;
        return $this->balance;

    }


}

$account = new Account();

$account->balance = 1000.00;

?>

<?php  include 'includes/header.php'; ?>


<p>  $ <?=  $account->deposit(50.00) ?> </p>

<?php  include 'includes/footer.php'; ?>


