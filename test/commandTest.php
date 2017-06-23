<?php

namespace Test;
use PDO;
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

class Order extends DatabaseTest{


  public function testAddOrder()
  {
    // add an order in database
    $bdd = $this->getConnexion();
    $req = $bdd->prepare ("INSERT INTO modules_commandes
    (numero_comptable,raison_sociale,adresse_facturation,cp_facturation,ville_facturation,adresse_livraison,
    cp_livraison,ville_livraison,tel1,tel2,mail1,mail2,nom_responsable,prenom_responsable,materiel,telesurveillance,
    videosurveillance,commentaires,main_oeuvre,travaux_hauteur,cable_moulure,tranche_ext,cable_plafond,tube_iro,achat_location,
    engagement,montant_devis,acompte,numero_devis,date_creation,id_createur)
    VALUES
    ('1701','Simplon Reunion','151 , Rue du Marechal Leclerc','97490','Saint-denis','151 , Rue du Marechal Leclerc','97490',
     'Saint-denis','0262465622','','frederic-boyer@live.fr','','BOYER','FREDERIC','PILE BATTERIE','oui',
     'non','aucun soucis','oui','non','non','non','oui','non','vente',
     '0','533','12','CC0202','2017-06-08 19:52:17','88')");
    $req -> execute();
    $lastOrderId = $bdd->lastInsertId();

    // test if the last order exist
    $database = $this->getConnexion();
    $queryTable = $database->prepare('SELECT * FROM modules_commandes WHERE id="'.$lastOrderId.'" ' );
    $result = $queryTable->execute();
    $result= $queryTable->fetchAll(PDO::FETCH_ASSOC);
    $expectedTable = array(
      array('id'=>$lastOrderId,'numero_comptable' => '1701','raison_sociale' => 'Simplon Reunion',
      'adresse_facturation' => '151 , Rue du Marechal Leclerc','cp_facturation' => '97490','ville_facturation' => 'Saint-denis',
      'adresse_livraison' => '151 , Rue du Marechal Leclerc','cp_livraison' => '97490','ville_livraison' => 'Saint-denis',
      'tel1' => '0262465622','tel2' => '','mail1' => 'frederic-boyer@live.fr','mail2' => '','nom_responsable' => 'BOYER',
      'prenom_responsable' => 'FREDERIC','materiel' => 'PILE BATTERIE','telesurveillance' => 'oui','videosurveillance' => 'non',
      'commentaires' => 'aucun soucis','main_oeuvre' => 'oui','travaux_hauteur' => 'non','cable_moulure' => 'non',
      'tranche_ext' => 'non','cable_plafond' => 'oui','tube_iro' => 'non','achat_location' => 'vente','engagement' => '0',
      'montant_devis' => '533','acompte' => '12','numero_devis' => 'CC0202','date_creation' => '2017-06-08 19:52:17','id_createur' =>'88'
      )
    );
    $this->assertEquals($expectedTable, $result);
}
//
//     // add a new parent
//     $bdd = $this->getConnection();
//     $req = $bdd->prepare ("INSERT INTO parent (firstname,lastname,email,address_id) VALUES ('prenom du parent','nom du parent','prenom@nom.fr','".$idAddress."')");
//     $req -> execute();
//     $idParent = $bdd->lastInsertId();
//
//     //test display for a parent
//     $database = $this->getConnection();
//     $queryTable = $database->prepare('SELECT * FROM parent WHERE id="'.$idParent.'" ' );
//     $result = $queryTable->execute();
//     $result= $queryTable->fetchAll(PDO::FETCH_ASSOC);
//     $expectedTable = array(
//       array(
//         'id'=>$idParent,
//         'firstname'=>'prenom du parent',
//         'lastname' => 'nom du parent',
//         'email' => 'prenom@nom.fr',
//         'address_id' => $idAddress
//       )
//     );
//
//     // add a new kid
//     $bdd = $this->getConnection();
//     $req = $bdd->prepare ("INSERT INTO kid (firstname,lastname,birthday,classroom) VALUES ('prenom enfant','nom enfant','2010-04-10','CP')");
//     $req -> execute();
//     $idKid = $bdd->lastInsertId();
//
//     //test display for a kid
//     $database = $this->getConnection();
//     $queryTable = $database->prepare('SELECT * FROM kid WHERE id="'.$idKid.'" ' );
//     $result = $queryTable->execute();
//     $result= $queryTable->fetchAll(PDO::FETCH_ASSOC);
//     $expectedTable = array(
//       array(
//         'id'=>$idKid,
//         'firstname'=>'prenom enfant',
//         'lastname' => 'nom enfant',
//         'birthday' => '2010-04-10',
//         'classroom' => 'CP'
//       )
//     );
//
//     // link kid to their parents
//     $bdd = $this->getConnection();
//     $req = $bdd->prepare ("INSERT INTO kid_has_parent (kid_id,parent_id) VALUES ('".$idKid."','".$idParent."')");
//     $req -> bindParam(':kid_id',  $lastChild);
//     $req -> bindParam(':parent_id', $lastParent);
//     $req -> execute();
//     $idKidHasParent = $bdd->lastInsertId();
//
//     //test display for a kid_has_parent
//     $database = $this->getConnection();
//     $queryTable = $database->prepare('SELECT * FROM kid_has_parent WHERE parent_id="'.$idKidHasParent.'" AND  kid_id="'.$idKid.'" ' );
//     $result = $queryTable->execute();
//     $result= $queryTable->fetchAll(PDO::FETCH_ASSOC);
//     $expectedTable = array(
//       array(
//         'id'=>$idKidHasParent,
//         'kid_id'=>$idKid,
//         'parent_id'=>$idParent
//
//       )
//     );
//
//     // link kid to a workshop
//     $bdd = $this->getConnection();
//     $req = $bdd->prepare ("INSERT INTO workshop_has_kid (workshop_id,kid_id,has_participated,validated) VALUES (1,'".$idKid."',1,1)");
//     $req -> execute();
//     $idWorkshop = $bdd->lastInsertId();
//
//     //test display for a workshop_has_kid
//     $database = $this->getConnection();
//     $queryTable = $database->prepare('SELECT * FROM workshop_has_kid WHERE kid_id="'.$idKid.'" AND has_participated=1 AND validated=1 ' );
//     $result = $queryTable->execute();
//     $result= $queryTable->fetchAll(PDO::FETCH_ASSOC);
//     $expectedTable = array(
//       array(
//         'workshop_id'=>'1',
//         'kid_id' =>$idKid,
//         'has_participated' => '1',
//         'validated' => '1'
//       )
//     );
//
//
//     $this->assertEquals($expectedTable, $result);
//
//
//     //delete last workshop_has_kid
//     $bdd = $this->getConnection();
//     $req = $bdd->prepare ("DELETE FROM workshop_has_kid where workshop_id='".$idWorkshop."'");
//     $req -> execute();
//     //delete last kid_has_parent
//     $bdd = $this->getConnection();
//     $req = $bdd->prepare ("DELETE FROM kid_has_parent where kid_id='".$idKid."' AND parent_id='".$idParent."' ");
//     $req -> execute();
//
//     //delete last child
//     $bdd = $this->getConnection();
//     $req = $bdd->prepare ("DELETE FROM kid where id='".$idKid."'");
//     $req -> execute();
//     //delete last parent
//     $bdd = $this->getConnection();
//     $req = $bdd->prepare ("DELETE FROM parent where id='".$idParent."'");
//     $req -> execute();
//     //delete last address
//     $bdd = $this->getConnection();
//     $req = $bdd->prepare ("DELETE FROM address where id='".$idAddress."'");
//     $req -> execute();
//
//
//
//   }
//
//
}
