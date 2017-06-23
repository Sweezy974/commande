<?php
namespace Controllers;
use App\Connect;


class IndexController extends Connect
{
    public function index(){
        //
        // $bdd = $this->getConnexion();
        // $req = $bdd->prepare ("INSERT INTO modules_commandes
        // (numero_comptable,raison_sociale,adresse_facturation,cp_facturation,ville_facturation,adresse_livraison,
        // cp_livraison,ville_livraison,tel1,tel2,mail1,mail2,nom_responsable,prenom_responsable,materiel,telesurveillance,
        // videosurveillance,commentaires,main_oeuvre,travaux_hauteur,cable_moulure,tranche_ext,cable_plafond,tube_iro,achat_location,
        // engagement,montant_devis,acompte,numero_devis,date_creation,id_createur)
        // VALUES
        // ('1701','Simplon Reunion','151 , Rue du Marechal Leclerc','97490','Saint-denis','151 , Rue du Marechal Leclerc','97490',
        //  'Saint-denis','0262465622','','frederic-boyer@live.fr','','BOYER','FREDERIC','PILE BATTERIE','oui',
        //  'non','aucun soucis','oui','non','non','non','oui','non','vente',
        //  '0','533','12','CC0202','2017-06-08 19:52:17','88')");
        // $req -> execute();
        // $lastOrderId = $bdd->lastInsertId();

        include_once 'views/order/new.html.twig';

    }
}
