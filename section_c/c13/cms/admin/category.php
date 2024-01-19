<?php
//Part A
declare(strict_types = 1);                             // Use strict types
include '../includes/database-connection.php';         // Database connection
include '../includes/functions.php';                   // Functions
include '../includes/validate.php';    

//Initialize variables
$id = filter_input(INPUT_GET, 'id',FILTER_VALIDATE_INT);

$category = [
   'id'         => $id,
   'name'       =>'',
   'description'=>'',
   'navigation' =>false,
];

$errors = [
    'warning'     => '',
    'name'        => '',
    'description' =>'', 
];

//if id,  page is editing the category , 
//so get current category 
if($id){
    $sql = "SELECT id, name, description, navigation 
    FROM category
    WHERE id=:id;";               // SQL to get all categories
    $category = pdo($pdo, $sql,[$id])->fetch();
    if(!$category){
        redirect('categories.php',['failure'=>'Category not found']);
    }  
}
//Part B: Get and validate form data
if($_SERVER['REQUEST_METHOD']=='POST'){
    $category['name'] = $_POST['name'];
    $category['description'] = $_POST['description'];  
    $category['navigation'] = (isset($_POST['navigation']) and ($_POST['navigation'] == 1)) ?  1 : 0; 


//Check if all data is valid and create error messages if it is invalid
$errors['name'] =  (is_text($category['name'],1,24)) 
            ? '' : 'Name should be 1-24 characters.';
$errors['description'] =   (is_text($category['description'], 1, 254)) 
            ? '' : 'Description should be 1-24 characters.';                
$invalid = implode($errors);


//Part C : Check if data is valid, if so update database
if($invalid) {
    $errors['warning'] = 'Please correct errors';
} else {
    $arguments = $category;
    if($id){
        $sql = "UPDATE category 
                SET    name = :name, description = :description,
                       navigation = :navigation
                WHERE  id = :id;";
    }else{
       unset($arguments['id']);
       $sql = "INSERT INTO category (name, description, navigation)
                    VALUES (:name, :description, :navigation);";                   
    }
    // When running the SQL
    // Category saved | Name already | Exception thrown for other reason
    try{
        pdo($pdo,$sql,$arguments);
        redirect('categories.php',['success' => 'Category saved']);    
    }catch (PDOException $e) {
        if($e->errorInfo[1] === 1062){  //if error is duplicate
          $errors['warning'] = 'Category name already in use';     
        }else{
            throw $e;
        }
    }

}

}

?>


<?php include '../includes/admin-header.php'; ?>
<main class="container" id="content">
  <section class="header">
    <h1>Categories</h1>
    <?php if ($success) { ?>
      <div class="alert alert-success"><?= $success ?></div>
    <?php } ?>
    <?php if ($failure) { ?>
      <div class="alert alert-danger"><?= $failure ?></div>
    <?php } ?>
    <p><a href="category.php" class="btn btn-primary">Add new category</a></p>
  </section>

  <table class="categories">
    <tr>
      <th>Name</th>
      <th class="edit">Edit</th>
      <th class="del">Delete</th>
    </tr>
    <?php foreach ($categories as $category) { ?>
      <tr>
        <td><strong><?= html_escape($category['name']) ?></strong></td>
        <td><a href="category.php?id=<?= $category['id'] ?>"
               class="btn btn-primary">Edit</a></td>
        <td><a href="category-delete.php?id=<?= $category['id'] ?>"
               class="btn btn-danger">Delete</a></td>
      </tr>
    <?php } ?>
  </table>
</main>
<?php include '../includes/admin-footer.php'; ?>