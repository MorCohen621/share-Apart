<?php
  
require('database.php');

class User{
    private $id;
    private $name;
    private $age;


    

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
    public function find_user_by_id($id){
        global $database;
        $error=null;
        $result=$database->query("select * from users where id='".$id."'");
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
    public static function add_user($id,$name,$age){
        global $database;
        $error=null;
        $sql="Insert into users(id,name,age) values ('".$id."','".$name."',".$age.")";
        $result=$database->query($sql);
        if (!$result)
            $error='Can not add user.  Error is:'.$database->get_connection()->error;
        return $error;
        
    }
public function MIN_AGE(){

global $database;
     $sql7="SELECT MIN(age) FROM users ";
$min = $database->query($sql7);

if ($min->num_rows > 0) {
    // output data of each row
    while($row = $min->fetch_assoc()) {
        return $minimum=$row['MIN(age)'];
    }
}
	}  
public function MAX_AGE(){

global $database;
$sql8="SELECT MAX(age) FROM users ";
$max=$database->query($sql8);
if ($max->num_rows > 0) {
    // output data of each row
    while($row = $max->fetch_assoc()) {
       return $maximum=$row['MAX(age)'];
    }
}
    }
    
public function AVE_AGE(){
global $database;
$sql9="SELECT AVG(age) FROM users ";
$avg=$database->query($sql9);
if ($avg->num_rows > 0) {
    // output data of each row
    while($row = $avg->fetch_assoc()) {
       return $average=$row['AVG(age)'];
    }
}
}
    public function FindAllUSERS(){

global $database;
$sql5="SELECT * FROM users";
return $countUsers=$database->query($sql5)->num_rows;
    }
    
 public function get_id(){
        return $this->id;
    }
public function get_name(){
        return $this->name;
    }
public function get_age(){
        return $this->age;
    }
public function get_city(){
        return $this->city;
    }
public function get_gender(){
        return $this->gender;
    }
}

    
?>

