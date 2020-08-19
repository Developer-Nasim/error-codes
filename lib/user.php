<?php 
    include 'db.php';

    class User{
        private $db;
        public function __construct()
        {
            $this->db = new dnc();
        }
        public function userRegistration($data)
        {
            $name       = $data['yourname'];
            $username   = $data['username'];
            $email      = $data['email'];
            $pass       = md5($data['pass']);
            $check_email = $this->emailCheck($email);
            if ($name == "" OR $name == "" OR $username == "" OR $email == "" OR $pass == "") {
                $msg = "<div class='alert alert-danger'>Filed must not be empty</div>";
                return $msg;
            }else{
                $msg = "<div class='alert alert-primary'><b>Thank you so much</b></div>";
                return $msg;
            }
            if(strlen($username) < 4 ){
                $msg = "<div class='alert alert-danger'>User muct not be 3-4 carecters.... make it more</div>";
                return $msg;
            } elseif(preg_match('/[^a-z0-9_-]+/i',$username)){
                 $msg = "<div class='alert alert-danger'>User must have type content..!</div>";
                 return $msg;
             }
            if(FILTER_VAR($email, FILTER_VALIDATE_EMAIL) == false){
                $msg = "<div class='alert alert-danger'>Add a validate Email address Here</div>";
                return $msg;
            }
            if($check_email == true){
                $msg = "<div class='alert alert-danger'>This email already Exist! </div>";
                return $msg;
            } 




            $sqls = "INSERT INTO myt (names,username,email,passwords) VALUES(:names, :username, :email, :passwords)";
            $query = $this->db->pdo->prepare($sqls); 
            $query->bindValue(':names', $name);
            $query->bindValue(':username', $username);
            $query->bindValue(':email', $email);
            $query->bindValue(':passwords', $pass); 
            $result = $query->execute();
            if ($result) {
                echo "done";
            } else{
                echo "have some problem";
            }









        } 






        public function emailCheck($email)
        {
             $sql = "SELECT email FROM myt WHERE email=:email";
             $query = $this->db->pdo->prepare($sql);
             $query->bindValue(':email', $email);
             $query->execute();
             if($query->rowCount() > 0){
                return true;
             }else{
                return false;
             }
        }
    }


?>