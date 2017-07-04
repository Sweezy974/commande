<?php
namespace Models;

class User
{
  private $_id;
  private $_username;
  private $_password;


  public function checkIfUserIsLogged()
  {
    if (empty($_SESSION['username']) && empty($_SESSION['id'])) {
      header("Location: /");
    }
  }

  public function checkIfUserIsACommercial($group_id)
  {
    if ($group_id!=1 && $group_id !=5  ) {
      $_SESSION['errorLogin'] = "Vous n'avez pas accès à cette partie.";
      header("Location: /");
      exit;
      session_destroy();

    }
  }

  /**
  * GETTERS / SETTERS
  */
  public function getId()
  {
    return $this->_id;
  }
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


// class User
// {
//     private $id;
//     private $username;
//     private $password;
//     private $email;
//
//     /**
//      * @return integer
//      */
//     public function getId()
//     {
//         return $this->id;
//     }
//
//     /**
//      * @return string
//      */
//     public function getUsername()
//     {
//         return $this->username;
//     }
//
//     /**
//      * @return string
//      */
//     public function setUsername($username)
//     {
//         return $this->username = $username;
//     }
//
//     /**
//      * @return string
//      */
//     public function getPassword()
//     {
//         return $this->password;
//     }
//
//     /**
//      * @return string
//      */
//     public function setPassword($password)
//     {
//         return $this->password = $password;
//     }
//
//     /**
//      * @return string
//      */
//     public function getEmail()
//     {
//         return $this->email;
//     }
//
//     /**
//      * @return string
//      */
//     public function setEmail($email)
//     {
//         return $this->email = $email;
//     }
// }
