<?php


class Account {
    
    //properties
    public int $number;
    public string $type;
    protected float $balance;

    //methods
    public function __construct(int $number, string $type ,float $balance){  
        $this->number = $number;
        $this->type = $type;
        $this->balance = $balance;
    }

    public function deposit($amount):float{
    
        $this->balance += $amount;
        return $this->balance;
    }
    public function withdraw($amount):float{
    
        $this->balance -= $amount;
        return $this->balance;
    }

    public function getBalance():float{
           return $this->balance;
    }

}





