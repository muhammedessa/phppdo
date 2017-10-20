<?php

include_once 'dbConnection.php';
include_once 'header.php';
include_once 'footer.php';

if (isset($_POST['btn-update'])) {
    $id = $_GET['edit_id'] ;
   $firstname = $_POST['firstname'] ;
    $lastname = $_POST['lastname'] ;
     $email = $_POST['email'];
     $address = $_POST['address'];

if ($person->update($id,$firstname,$lastname,$email,$address)) {
    
    header('Location: index1.php');  
} else {
   echo ' failed';
}


}  


if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
   extract($person->getID($id));
}  


?>




<div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid>
    <div>
        <div class="uk-card uk-card-default uk-card-body">
            <h3 class="uk-card-title">Edit infpormation</h3>
          
            

            <form method="post">
    <fieldset class="uk-fieldset">

    
        <div class="uk-margin">
            <input class="uk-input" type="text" value="<?php echo $firstname ?>" name="firstname">
        </div>

        <div class="uk-margin">
 <input class="uk-input" type="text" value="<?php echo $lastname ?>" name="lastname">
        </div>

        <div class="uk-margin">
   <input class="uk-input" type="email" value="<?php echo $email ?>" name="email">
        </div>

        <div class="uk-margin">
    <input class="uk-input" type="text" value="<?php echo $address ?>" name="address">
        </div>
 
 
    </fieldset>


 

        <p class="uk-text-right">
           
            <button class="uk-button uk-button-primary" type="submit" name="btn-update">Update</button>
        </p>

        </form>






        </div>
    </div>
     
     
</div>















