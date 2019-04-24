<?php
  
require_once('init.php');
require_once('database.php');

class Password{
    private $id;
    private $user;
    private $password;

    
        
    private function has_attribute($attribute){
        
        $object_properties=get_object_vars($this);
        return array_key_exists($attribute,$object_properties);
    }
    
     private function  instantation($pass_array){
        foreach ($pass_array as $attribute=>$value){
            if ($result=$this->has_attribute($attribute))
                $this->$attribute=$value;
       }
     }
    public function find_user($email,$password){
        global $database;
        $error=null;
        $password1=($password);
        $sql="select * from users where email='".$email."' and password='".$password1."'";
        $result=$database->query($sql);
        if (!$result)
            $error='Can not find the user.  Error is:'.$database->get_connection()->error;
        elseif ($result->num_rows>0){
           $found_user=$result->fetch_assoc();
            $this->instantation($found_user);
        }
        else{
             $error='<p style="color:white; font-size:12px;"><b>Can no find user by this name* </b></p>';
				}
        return $error;
    }
    
     public function find_id($id){

global $database;
        $id2=$id;
$sql = "SELECT id FROM password where id='".$id."'";
$result=$database->query($sql);   
   
if (!$result)
            $id2='Can not find the id.  Error is:'.$database->get_connection()->error;
        elseif ($result->num_rows>0){
            $found_user=$result->fetch_assoc();
            $this->instantation($found_user);
        }
         else{
             $id2="Can no find id ";
			 
		 }
        return $id2;
        
    }
    
       public static function add_password($id,$user,$password){
        global $database;
        $error=null;
        $sql="INSERT INTO 	password(id,user,password) VALUES ('$id','$user','$password')";
        $result=$database->query($sql);
        if (!$result)
            $error='Can not add user.  Error is:'.$database->get_connection()->error;
		else{
			 $error=' add user.';
			 
		}
        return $error;
        
    }
   
    public function get_id(){
        return $this->id;
    }
   
   
}

    
?>

