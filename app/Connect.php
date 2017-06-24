<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
namespace App;
use PDO;

session_start();
session_set_cookie_params(0);

class Connect
{
  public $connexion = null;
  function testGetConnexion() {
      $this->connexion = new PDO('mysql:host=localhost;dbname=uflow', 'root', '');
      $this->assertNotNull($this->connexion);
  }
  public function getConnexion() {
      $this->connexion = new PDO('mysql:host=localhost;dbname=sqlserver', 'root', '');
      $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $this->connexion;
  }

  public function getConnexionEBP() {
      $this->connexion = new PDO('mysql:host=localhost;dbname=sqlserver', 'root', '');
      $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $this->connexion;
  }

	//fonction de requetage
	public function req($q){
		$db = mysqli_connect('localhost', 'root', '');
		mysqli_select_db($db,'uflow') or mysql_error();
		mysqli_query($db,"SET NAMES 'utf8'");
		$q = mysqli_query($db,$q);
		return $q;
		mysql_close();
	}

}
