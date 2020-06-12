<?php 
require_once("config.php");
require_once("Client.php");
require_once("Worker.php");
require_once("Caravan.php");
require_once("Reservation.php");



$user = new User;
$client = new Client;
echo $user->login(trim("lo56666l@lol.lol"), trim("lollollol")); 
echo $user->register("lo56666l@lol.lol", "lollollol", "lollollol");
echo $client->addReservation("Hobby","lolol","2020-06-15","2020-06-20");
echo $client->deleteReservation(1);
echo $client->modifyReservation("2020-08-15","2020-08-20",2,2);


$worker = new  Worker;
echo $worker->addCaravan("RZ8429D","Hobby","lolol",200,2000,5000,4500,2500,2000,4,25,1,1,1);

class User
{
  private $userID=1;
  private $email;
  private $firstName;
  private $lastName;
  private $phone;

  public function login($email, $password ){
    $response = [];

    if ($email == "")
      $response['email'] = "empty";
    else
      $email = $email;

    if ($password  == "")
      $response['password'] = "empty";
    else
      $password = $password ;

    if (!empty($response))
      return(json_encode($response));

    global $db;
    $sth = $db->prepare('SELECT * FROM users WHERE email=:email limit 1');
    $sth->bindValue(':email', $email, PDO::PARAM_STR);
    $sth->execute();
    $user = $sth->fetch(PDO::FETCH_ASSOC);

    if ($user) {
      $hash = $user['password'];
      if (password_verify($password, $hash)) {
        $_SESSION['userID'] = $user['userID'];
        $_SESSION['login'] = "true";
        if ($user['admin'] == 1) {
          $_SESSION['admin'] = $user['userID'];
        } 

        $response['success'] = "true";
          return(json_encode($response));
        } else {
          $response['password'] = "wrong";
          return(json_encode($response));
        }
      } else {
        $response['login'] = "wrong";
        return(json_encode($response));
      }
    }

    public function register($email, $password, $password2){
      $response = [];
        
      if ($email == "") {
        $response['email'] = "empty";
      } else
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email = $email;
      } else {
        $response['email'] = "wrong";
      }
        
      if ($password == "")
        $response['password'] = "empty";
      else
        if (strlen($password) >= 8)
        $password = $password;
      else
        $response['password'] = "short";
        
      if ($password2 == "")
        $response['password2'] = "empty";
      else
        $password2 = $password2;
        
      if (!empty($response))
        return(json_encode($response));
        
      if ($password2 != $password) {
        $response['passwords'] = "wrong";
        return(json_encode($response));
      } 
      $hashPassword = password_hash($password, PASSWORD_DEFAULT);
      global $db;

      $sth = $db->prepare('SELECT * FROM users WHERE email=:email limit 1');
      $sth->bindValue(':email', $email, PDO::PARAM_STR);
      $sth->execute();
      $user = $sth->fetch(PDO::FETCH_ASSOC);
      if ($user) {
        $response['email'] = "exist";
        return(json_encode($response));
      }
        
      $sth = $db->prepare('INSERT INTO users (email, password) VALUE (:email,:password)');
      $sth->bindValue(':email', $email, PDO::PARAM_STR);
      $sth->bindValue(':password', $hashPassword, PDO::PARAM_STR);
      $user = $sth->execute();
        
      if ($user == true) {
        $response['success'] = 'true';
        return(json_encode($response));
      }
    }

    public function getID(){
      return $this->userID;
    }

    public function getEmail(){
      return $this->email;
    }

    public function logout(){
      unset($_SESSION['userID']);
      unset($_SESSION['login']);
      unset($_SESSION['admin']);
      $response['logout'] = "success";
      return(json_encode($response));
    }

    




}
?>