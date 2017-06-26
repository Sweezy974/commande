<?php
namespace Controllers;
use App\Connect;
use Models\User;

use \Twig_Loader_Filesystem;
use \Twig_Environment;


class IndexController extends Controller
{
    protected $twig;
    public function index()
    {

       echo $this->twig->render('login/index.html.twig',
       [
        //   "orderList" => $list
       ]
    );
 }
 public function login()
 {
     $user = new User();
     $username = $_POST['login'];
     $password = $_POST['password'];
     $password = md5($password);

     $check = $user->login($username,$password);
    //  echo "string";
    //  $order = new Order();
    //  $DocumentNumber = $_GET['pk'];
    //  $orderInformation = $order->find($DocumentNumber);
 }
}
