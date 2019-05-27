<?php
  
require_once('init.php');

class Session{
    private $signed_in;
    private $user_id;
    
    

    public function __construct(){
        session_start();
        $this->check_login();
    }
    
     private function check_login(){
        if (isset($_SESSION['user_id'])){
            $this->user_id=$_SESSION['user_id'];
            $this->signed_in=true;
        }
        else{
            unset($this->user_id);
            $this->signed_in=false;
        }
    }
    
    public function login($user){
        if($user){
            $this->user_id=$user->get_id();
            $_SESSION['user_id']=$user->get_id();
            $this->signed_in=true;
        }
    }
    
       
    public function logout(){
        echo 'logout';
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in=false;
        
    }
    
    public function get_signed_in(){
        return $this->signed_in;
    }
    public function get_user_id(){
        return $this->user_id;
    }
     
}
$session=new Session();


    
?>

