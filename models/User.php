<?php
namespace Models;

use App\Connect;
use PDO;


class User extends Connect
{

  protected $_username;
  protected $_password;

  // display all order non-treated
  public function login($username,$password)
  {
    if(!isset($_SESSION))
    {
      session_start();
    }
    // echo $username;
    // echo md5($password);
    $username= $this->getUsername();
    $password= $this->getPassword();
    $password= md5($password);

    $connexion = $this->getConnexionEBP();
    $sql = "SELECT * FROM `uflow`.`users` WHERE login=:username AND pwd=:password";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':username',$username);
    $stmt->bindParam(':password',$password);
    $stmt->execute();
    // $results = $stmt->fetchAll();
    $results = $stmt->rowCount();
    var_dump($results);
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
