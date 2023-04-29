<?php
namespace People;

class Admin{
    public int $adminID;

    public function makeAdmin($email){
        $db = new \db;
        $conn = $db->connection();
    
        $query = $conn->prepare("SELECT * FROM accounts WHERE email = '$email'");
        $query->execute();
        $numrows = $query->rowCount();
        $fetch = $query->fetch();
        $result = $fetch['userID'];
    
            
        if ($numrows > 0) {
            $adminquery = $conn->prepare("INSERT INTO admin VALUES (null, '$result')");
            if($adminquery->execute()) {
                echo '<div style="background-color: #8BC34A; color: white; text-align: center; padding: 10px;">Admin successfully added!</div>';
            } else {
                echo '<div style="background-color: #FF5722; color: white; text-align: center; padding: 10px;">Failed to add admin.</div>';
            }
        } else {
            echo '<div style="background-color: #FF5722; color: white; text-align: center; padding: 10px;">Account not found.</div>';
        }
        $conn = null;
    }
    

    public function __toString()
    {
        return "Administrator ID " . $this->adminID;
    }


}