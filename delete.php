<?php

include_once 'dbConnection.php';
include_once 'header.php';
include_once 'footer.php';

if (isset($_POST['btn-delete'])) {
    $id = $_GET['delete_id'] ;
 

if ($person->delete($id)) {
    
    header('Location: index1.php');  
} else {
   echo ' failed';
}


}  


if (isset($_GET['delete_id'])) {
    ?>
    
    <table class="uk-table">
    <caption>Table Caption</caption>
    <thead>
        <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Address</th>
        </tr>
    </thead>
    
    <tbody>
         
        <tr>
        <?php 
        
        $query = "SELECT * FROM `users` WHERE id=:id";
        $stmt = $conn->prepare($query);
        $stmt->execute(array(":id"=>$_GET['delete_id']));


       
            while($row=$stmt->fetch(PDO::FETCH_BOTH)){

?>
                 <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['address']; ?></td>
<td>

<form method="post">
    <input type="hidden" value="<?php echo $row['id']; ?>">
<button class="uk-button uk-button-danger" type="submit" name="btn-delete">Delete</button>
</form>

</td>
</tr>
        <?php
        }
        ?>   
 
      
    </tbody>
</table>
    
    
    
    
    <?php
}  


?>


 