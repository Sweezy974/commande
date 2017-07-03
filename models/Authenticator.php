<?php
namespace Models;
use App\Connect;
use PDO;


class Authenticator extends Connect
{
  // check if user exist
  public function login(User $user)
  {

    $username = $user->getUsername();
    $password = $user->getPassword();
    $connexion = $this->getConnexion();
    $sql = "SELECT * FROM `uflow`.`users` WHERE login=:username AND pwd=:password";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':username',$username);
    $stmt->bindParam(':password',$password);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count == 1) {
      $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);
      $_SESSION['id'] =  $userInfo['id'];
      $_SESSION['username'] =  $userInfo['login'];
      $_SESSION['lastname'] =  $userInfo['nom'];
      $_SESSION['firstname'] =  $userInfo['prenom'];
      $_SESSION['email'] =  $userInfo['mail'];
      header("Location: ?c=order&t=index");
    }
    else {
      header("Location: /?c=index");
    }
  }
  // logout the user
  public function logout()
  {
    session_destroy();
  }
}
