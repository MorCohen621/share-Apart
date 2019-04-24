<?php
  
require('database.php');

class User{

    private $user_id;
    private $name;
    private $age;
    private $apartment_id;
    private $password;

    

    public static function fetch_users(){
        
        global $database;
        $result_set=$database->query("select * from users");
        $users=null;
        if (isset($result_set)){
            $i=0;
            if ($result_set->num_rows>0){ 
                while($row=$result_set->fetch_assoc()){ 
                    $user=new User();
                    $user->instantation($row);
                    $users[$i]=$user;
                    $i+=1;
                }
            }
        }
        return $users;
    }
        
    private function has_attribute($attribute){
        
        $object_properties=get_object_vars($this);
        return array_key_exists($attribute,$object_properties);
    }
    
     private function  instantation($user_array){
        foreach ($user_array as $attribute=>$value){
            if ($result=$this->has_attribute($attribute))
                $this->$attribute=$value;
       }
     }
    public function find_user_by_id($user_id){
        global $database;
        $error=null;
        $result=$database->query("select * from users where user_id='".$user_id."'");
          if (!$result)
            $error='Can not find the user.  Error is:'.$database->get_connection()->error;
        elseif ($result->num_rows>0){
            $found_user=$result->fetch_assoc();
            $this->instantation($found_user);
        }
         else
             $error="Can no find user by this name";
        return $error;
        
    }
     public function find_user_by_name($name){
        global $database;
        $error=null;
        $result=$database->query("select * from users where name='".$name."'");
          if (!$result)
            $error='Can not find the user.  Error is:'.$database->get_connection()->error;
        elseif ($result->num_rows>0){
            $found_user=$result->fetch_assoc();
            $this->instantation($found_user);
        }
         else
             $error="Can no find user by this name";
        return $error;
        
    }
    public static function add_user($name,$age,$email,$password){
        global $database;
        $error=null;
        $sql="Insert into users(name,age,email,password) values ('".$name."',".$age.",'".$email."','".$password."')";
        $result=$database->query($sql);
        if (!$result)
            $error='Can not add user.  Error is:'.$database->get_connection()->error;
        return $error;
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

    public function FindAllUSERS(){

global $database;
$sql5="SELECT * FROM users";
return $countUsers=$database->query($sql5)->num_rows;
    }
    
 
public function get_name(){
        return $this->name;
    }
public function get_age(){
        return $this->age;
    }
public function get_user_id(){
        return $this->user_id;
    }
public function get_apartment_id(){
        return $this->apartment_id;
    }        

}

    
?>

