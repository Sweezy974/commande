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
    $req = $bdd->prepare ("INSERT INTO `uflow_test`.`modules_commandes`
    (numero_comptable,raison_sociale,adresse_facturation,cp_facturation,ville_facturation,adresse_livraison,
    cp_livraison,ville_livraison,tel1,tel2,mail1,mail2,nom_responsable,prenom_responsable,materiel,telesurveillance,
    videosurveillance,commentaires,main_oeuvre,travaux_hauteur,cable_moulure,tranche_ext,cable_plafond,tube_iro,achat_location,
    engagement,montant_devis,acompte,numero_devis,date_creation,users_id)
    VALUES
    ('1701','Simplon Reunion','151 , Rue du Marechal Leclerc','97490','Saint-denis','151 , Rue du Marechal Leclerc','97490',
     'Saint-denis','0262465622','','frederic-boyer@live.fr','','BOYER','FREDERIC','PILE BATTERIE','oui',
     'non','aucun soucis','oui','non','non','non','oui','non','vente',
     '0','533','12','CC0202','2017-06-08 19:52:17',81)");
    $req -> execute();
    $lastOrderId = $bdd->lastInsertId();

    // test if the last order exist
    $database = $this->getConnexion();
    $queryTable = $database->prepare('SELECT * FROM `uflow_test`.`modules_commandes` WHERE id=:id ' );
    $queryTable->bindParam(':id',$lastOrderId);
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
      'montant_devis' => '533','acompte' => '12','numero_devis' => 'CC0202','date_creation' => '2017-06-08 19:52:17','users_id' =>81
      )
    );
    $this->assertEquals($expectedTable, $result);
}


}
