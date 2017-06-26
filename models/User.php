<?php
namespace Models;

use App\Connect;
use PDO;

if(!isset($_SESSION))
{
  session_start();
}

class User extends Connect
{

  protected $_username;
  protected $_password;

  // check if user exist
  public function login($username,$password)
  {
    // echo $username;
    echo md5($password);
    // $username= $this->getUsername();
    // $password= $this->getPassword();
    // $password= md5($password);

    $connexion = $this->getConnexionEBP();
    $sql = "SELECT * FROM `uflow`.`users` WHERE login=:username AND pwd=:password";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':username',$username);
    $stmt->bindParam(':password',$password);
    $stmt->execute();
    $results = $stmt->rowCount();
    if ($results == 1) {
      while ($results = $stmt->fetch(PDO::FETCH_ASSOC)) {
        # code...

      // $_SESSION['id'] ="";
      $_SESSION['id'] == $results['id'];
      // var_dump($results);
      echo $_SESSION['id'];
      $_SESSION['open'] = 1;
    }

      // default redirection
      // header('location:/?c=order&?t=index');
    }
    else{
      $error = "Erreur de connexion";
      echo $error;
      // header('location:/?c=order&?t=index');

    }

    // return $results;
  }
  public function logout()
  {
    session_destroy();
  }





  /**
  * GETTERS / SETTERS
  */
  public function getUsername()
  {
    return $this->_username;
  }

  public function setUsername($username)
  {
    $this->_username = $username;
    return $this;
  }

  public function getPassword()
  {
    return $this->_password;
  }

  public function setPassword($password)
  {
    $this->_password = $password;
    return $this;
  }
}
