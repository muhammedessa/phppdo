<?php

include_once 'dbConnection.php';
include_once 'header.php';
include_once 'footer.php';

if (isset($_POST['btn-save'])) {
   $firstname = $_POST['firstname'] ;
    $lastname = $_POST['lastname'] ;
     $email = $_POST['email'];
     $address = $_POST['address'];

if ($person->create($firstname,$lastname,$email,$address)) {
    echo '<script> windows.location.href="index1.php";</script>';
} else {
   echo ' failed';
}


}  




?>


 







<div class=" ">

    <div class="   uk-grid-match" uk-grid>
    
    <div>
        <div class="uk-card uk-card-secondary uk-card-body">
            <h3 class="uk-card-title">Persons List</h3>
           
            <table class="uk-table uk-table-hover uk-table-divider">
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
          <?php  $person->dataview(); ?>
    </tbody>
</table>        





        </div>
    </div>
  
</div>


</div>










 

<!-- This is the modal -->
<div id="modal-example" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title">Add new person </h2>
       
       


        <form method="post">
    <fieldset class="uk-fieldset">

       
        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="First name" name="firstname">
        </div>

        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="Last name" name="lastname">
        </div>

        <div class="uk-margin">
            <input class="uk-input" type="email" placeholder="Email" name="email">
        </div>

        <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="Address" name="address">
        </div>
 
 
    </fieldset>


 

        <p class="uk-text-right">
           
            <button class="uk-button uk-button-primary" type="submit" name="btn-save">Save</button>
        </p>

        </form>
    </div>
</div>







