<?php
namespace Controllers;

use \Twig_Loader_Filesystem;
use \Twig_Environment;
use App\Connect;
use Models\User;
use Models\Authenticator;


class IndexController extends Controller
{
  protected $twig;

  public function index()
  {

    if (isset($_SESSION['errorLogin'])) {
      echo $this->twig->render('login/index.html.twig',
      [
        "error" => $_SESSION['errorLogin']
      ]);
    }
    else {
      echo $this->twig->render('login/index.html.twig');
    }
  }

  public function login()
  {
    session_start();
    session_set_cookie_params(0);
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $user = new User();
    $user->setUsername($username);
    $user->setPassword($password);

    $auth = new Authenticator();
    $auth->login($user);
  }
  public function logout()
  {
    session_start();
    $logout = new Authenticator();
    $logout->logout();
    header('Location: /');
  }
}
