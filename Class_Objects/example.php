<?php
    include 'classes/Account.php';
    include 'classes/Customer.php';
    
    $accounts = [new Account(213123123,'Checking',200),
                 new Account(341241412,'Savings',380),];
    
    $customer = new Customer('Dumitru','Daniel','danielsivliu7@yah.com','danielsilt32684', $accounts);

                
 ?>


<?php include 'includes/header.php'; ?>
<h2> Name : <b> <?= $customer->getFullName() ?> </b></h2>

<table>
    <tr>
        <th>Account Number</th>
        <th>Account Type</th>
        <th>Balance</th>
    </tr> 

<?php /*
  <!-- FARA FOREACH  
  
    <tr>
        <td><?= $customer->accounts[0]->number ?></td>
        <td><?= $customer->accounts[0]->type ?></td>
        <td><?= $customer->accounts[0]->getBalance() ?></td>
    </tr> 
    <tr>
        <td><?= $customer->accounts[1]->number ?></td>
        <td><?= $customer->accounts[1]->type ?></td>
        <td><?= $customer->accounts[1]->getBalance() ?></td>
    </tr>   
    -->

    */?>
    <!-- CU FOREACH  -->
    <?php  foreach ($customer->accounts as $account) {?>
       <tr>
       <td><?= $account->number ?></td>
       <td><?= $account->type ?></td>
       <?php if($account->getBalance() >= 0) {?>
        <td class="credit">
       <?php } else { ?>
        <td class="overdrawn">
       <?php } ?>
       $ <?= $account->getBalance() ?> </td>
    </tr> 

    <?php  } ?>

</table>



<?php include 'includes/footer.php'; ?>