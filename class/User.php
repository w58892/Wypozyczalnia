<?php 

  /**
   * Zawiera metody dla nie zalogowanych użytkowników
   */


class User
{
  private $userID;
  private $email;


    /**
   * Weryfikuje dane logowania i loguje użytkownika
   */
  public function login($email, $password ){
    $response = [];

    if ($email == "") {
      $response['email'] = "empty";
    } else
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $response['email'] = "notEmail";
    }
    if ($password  == "")
      $response['password'] = "empty";

    if (!empty($response))
      return ($response);

      $db = SingletonDB::getInstance();
    $sth = $db->query('SELECT * FROM users WHERE email=:email limit 1');
    $sth->bindValue(':email', $email, PDO::PARAM_STR);
    $sth->execute();
  
    $user = $sth->fetch(PDO::FETCH_ASSOC);

    if ($user) {
      $hash = $user['password'];
      if (password_verify($password, $hash)) {
        $_SESSION['userID'] = $user['userID'];

        if ($user['admin'] == 1) {
          $_SESSION['admin'] = $user['userID'];
        } 

        $response['success'] = "true";
          return($response);
      } else {
        $response['password'] = "wrong";
        return($response);
      }
    } else {
      $response['email'] = "wrong";
      return($response);
    }
  }

    /**
   * Tworzy nowego użytkownika
   */
  public function register($email, $password, $password2){
    $response = [];
        
    if ($email == "") {
      $response['email'] = "empty";
    } else
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $response['email'] = "wrong";
    }
        
    if ($password == "")
      $response['password'] = "empty";
    else
      if (strlen($password) >= 8)
      $password = $password;
    else
      $response['password'] = "short";
        
    if($password2 == "")
      $response['password2'] = "empty";
    else
      $password2 = $password2;
        
    if (!empty($response))
      return($response);
        
    if ($password2 != $password) {
      $response['passwords'] = "wrong";
      return($response);
    } 
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    $db = SingletonDB::getInstance();

    $sth = $db->query('SELECT * FROM users WHERE email=:email limit 1');
    $sth->bindValue(':email', $email, PDO::PARAM_STR);
    $sth->execute();
    $user = $sth->fetch(PDO::FETCH_ASSOC);
    if ($user) {
      $response['email'] = "exist";
      return($response);
    }
      
    $sth = $db->query('INSERT INTO users (email, password) VALUE (:email,:password)');
    $sth->bindValue(':email', $email, PDO::PARAM_STR);
    $sth->bindValue(':password', $hashPassword, PDO::PARAM_STR);
    $user = $sth->execute();
        
    if ($user == true) {        
      return $this->login($email, $password );
    }
  }

  /**
   * Wylogowywuje użytkownika
   */

  public function logout(){
    unset($_SESSION['userID']);
    unset($_SESSION['admin']);
    $response['logout'] = "success";
    return($response);
  }
}
?>