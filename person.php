<?php

class PersonDB{
    private $db;


public function __construct($conn){

    $this->db = $conn;
}



public function create($firstname,$lastname,$email,$address){
    try{
        $stmt = $this->db->prepare("INSERT INTO `users`( `firstname`, `lastname`, `email`, `address`) VALUES ( :firstname, :lastname ,:email,:address)");
        $stmt->bindparam(":firstname",$firstname);
        $stmt->bindparam(":lastname",$lastname);
        $stmt->bindparam(":email",$email);
        $stmt->bindparam(":address",$address);
        $stmt->execute();
        return true;
        }catch(PDOException $e){
        echo 'Error : '. $e->getMessage();
        return false;
        }
    }


public function getID($id){
    $stmt = $this->db->prepare("SELECT * FROM `users` WHERE id=:id");
    $stmt->execute(array(":id"=>$id));
    $editRow = $stmt->fetch(PDO::FETCH_ASSOC);
    return $editRow;
}




public function update($id,$firstname,$lastname,$email,$address){
    try{
        $stmt = $this->db->prepare("UPDATE `users` SET `firstname`=:firstname,`lastname`=:lastname,`email`=:email,`address`=:address WHERE `id`=:id");
        $stmt->bindparam(":firstname",$firstname);
        $stmt->bindparam(":lastname",$lastname);
        $stmt->bindparam(":email",$email);
        $stmt->bindparam(":address",$address);
        $stmt->bindparam(":id",$id);
        $stmt->execute();
        return true;
        }catch(PDOException $e){
        echo 'Error : '. $e->getMessage();
        return false;
        }
    }



    public function delete($id){
 
            $stmt = $this->db->prepare("DELETE FROM `users` WHERE `id`=:id");
            $stmt->bindparam(":id",$id);
            $stmt->execute();
            return true;
        
        }





        public function dataview(){
            $query = "SELECT * FROM `users` WHERE 1";
            $stmt = $this->db->prepare($query);
            $stmt->execute();


            if($stmt->rowCount()>0){
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){

?>
                     <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['address']; ?></td>

      <td><a href="edit.php?edit_id=<?php echo $row['id']; ?>"><i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
</a></td>
      <td><a href="delete.php?delete_id=<?php echo $row['id']; ?>"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
</a></td>
      </tr>
<?php
 
                }
            }else{
                ?>
                <td>No records :( </td>
                </tr>
                <?php
            }

        }




}



 






?>