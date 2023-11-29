<?php

    $greetings = ['Hi ', 'Howdy ', 'Hello ', 'Hola ',
                 'Welcome ', 'Ciao ',];
    $greeting_key  = array_rand($greetings);
    $greeting      = $greetings[$greeting_key];
    
    //array of bestsellers
    $bestsellers = ['notebook', 'pencil', 'ink',];
    $bestseller_count = count($bestsellers);
    $bestsellers_text = implode(', ',$bestsellers);

    //array holding customer details 
    $customer = ['forename' => 'Ivy',
                 'surname'  => 'Stone',
                 'email'    => 'ivy$eg.link', ];
    if(array_key_exists('forename',$customer)){
        $greeting .= $customer['forename'];
    }             

?>
<h1>Best Sellers</h1>
<p><?= $greeting ?></p>
<p>
    Our top <?= $bestseller_count ?> items today are: 
    <b><?= $bestsellers_text?></b>
</p>
