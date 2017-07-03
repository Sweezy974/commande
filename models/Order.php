<?php
namespace Models;

use App\Connect;
use PDO;

class Order extends Authenticator
{

  protected $_codeClient;
  protected $_raisonSociale;
  protected $_adresseLivraison;
  protected $_cpLivraison;
  protected $_villeLivraison;
  protected $_adresseFacturation;
  protected $_cpFacturation;
  protected $_villeFacturation;
  protected $_tel1;
  protected $_tel2;
  protected $_mail1;
  protected $_mail2;
  protected $_nomResponsable;
  protected $_prenomResponsable;
  protected $_materiel;
  protected $_telesurveillance;
  protected $_videosurveillance;
  protected $_commentaires;
  protected $_mainOeuvre;
  protected $_travauxHauteur;
  protected $_cableMoulure;
  protected $_trancheExterieur;
  protected $_cablePlafond;
  protected $_tubeIro;
  protected $_locationOuVente;
  protected $_engagementLocation;
  protected $_montantDevis;
  protected $_acompte;
  protected $_numeroDevis;
  protected $_documentNumber;


  // display all order non-treated
  public function fetchAll()
  {
    $connexion = $this->getConnexion();
    $sql = "SELECT id , CustomerName , DocumentNumber,CustomerId , sysCreatedDate , DepositAmount FROM `sqlserver`.`sale_document`
    WHERE DocumentType='8' AND (`sale_document`.`DocumentNumber`) NOT IN
    (SELECT `modules_commandes`.`numero_devis` FROM `uflow`.`modules_commandes` WHERE `sale_document`.`DocumentNumber` = `modules_commandes`.`numero_devis` ); ORDER BY sysCreatedDate DESC";
    $stmt = $connexion->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();
    return $results;
  }

  // display all informations about the customer to prefill a non-treated order
  public function find($DocumentNumber)
  {
    $connexion = $this->getConnexion();
    $sql = "SELECT * FROM `sqlserver`.`sale_document` WHERE DocumentType='8' AND DocumentNumber =:DocumentNumber";
    $stmt = $connexion->prepare($sql);
    $stmt->execute(array(':DocumentNumber' => $DocumentNumber));
    $results = $stmt->fetchAll();
    return $results;
  }




  public function save()
  {
    $connexion =  $this->getConnexion();
    // save form values in variable
    $DocumentNumber= $this->getDocumentNumber();
    $codeClient= $this->getCodeClient();
    $raisonSociale = $this->getRaisonSociale();
    $adresseLivraison = $this->getAdresseLivraison();
    $cpLivraison = $this->getCpLivraison();
    $villeLivraison = $this->getVilleLivraison();
    $adresseFacturation = $this->getAdresseFacturation();
    $cpFacturation = $this->getCpFacturation();
    $villeFacturation = $this->getVilleFacturation();
    $tel1 = $this->getTel1();
    $tel2 = $this->getTel2();
    $mail1 = $this->getMail1();
    $mail2 = $this->getMail2();
    $nomResponsable = $this->getNomResponsable();
    $prenomResponsable = $this->getPrenomResponsable();
    $materiel= $this->getMateriel();
    $telesurveillance = $this->getTelesurveillance();
    $videosurveillance = $this->getVideosurveillance();
    $commentaires = $this->getCommentaires();
    $mainOeuvre = $this->getMainOeuvre();
    $travauxHauteur = $this->getTravauxHauteur();
    $cableMoulure = $this->getCableMoulure();
    $trancheExterieur = $this->getTrancheExterieur();
    $cablePlafond = $this->getCablePlafond();
    $tubeIro = $this->getTubeIro();
    $locationOuVente = $this->getLocationOuVente();
    $engagementLocation = $this->getEngagementLocation();
    $montantDevis =$this->getMontantDevis();
    $acompte = $this->getAcompte();
    $numeroDevis = $this->getNumeroDevis();




    try {

      $sql ="INSERT INTO `uflow`.`modules_commandes`
      (numero_comptable,raison_sociale,adresse_facturation,cp_facturation,ville_facturation,adresse_livraison,
        cp_livraison,ville_livraison,tel1,tel2,mail1,mail2,nom_responsable,prenom_responsable,materiel,telesurveillance,
        videosurveillance,commentaires,main_oeuvre,travaux_hauteur,cable_moulure,tranche_ext,cable_plafond,tube_iro,achat_location,
        engagement,montant_devis,acompte,numero_devis,date_creation,users_id)
        VALUES
        (:codeClient,:raisonSociale,:adresseFacturation,:cpFacturation,:villeFacturation,:adresseLivraison,
          :cpLivraison,:villeLivraison,:tel1,:tel2,:mail1,:mail2,:nomResponsable,:prenomResponsable,:materiel,:telesurveillance,
          :videosurveillance,:commentaires,:mainOeuvre,:travauxHauteur,:cableMoulure,:trancheExterieur,:cablePlafond,:tubeIro,:locationOuVente,
          :engagementLocation,:montantDevis,:acompte,:numeroDevis,'2017-06-08 19:52:17',81)";


          $stmt = $connexion->prepare ($sql);

          // attribute the values which cames from the form
          $stmt->bindParam(':codeClient',$codeClient);
          $stmt->bindParam(':raisonSociale',$raisonSociale);
          $stmt->bindParam(':adresseLivraison',$adresseLivraison);
          $stmt->bindParam(':cpLivraison',$cpLivraison);
          $stmt->bindParam(':villeLivraison',$villeLivraison);
          $stmt->bindParam(':adresseFacturation',$adresseFacturation);
          $stmt->bindParam(':cpFacturation',$cpFacturation);
          $stmt->bindParam(':villeFacturation',$villeFacturation);
          $stmt->bindParam(':tel1',$tel1);
          $stmt->bindParam(':tel2',$tel2);
          $stmt->bindParam(':mail1',$mail1);
          $stmt->bindParam(':mail2',$mail2);
          $stmt->bindParam(':nomResponsable',$nomResponsable);
          $stmt->bindParam(':prenomResponsable',$prenomResponsable);
          $stmt->bindParam(':materiel',$materiel);
          $stmt->bindParam(':telesurveillance',$telesurveillance);
          $stmt->bindParam(':videosurveillance',$videosurveillance);
          $stmt->bindParam(':commentaires',$commentaires);
          $stmt->bindParam(':mainOeuvre',$mainOeuvre);
          $stmt->bindParam(':travauxHauteur',$travauxHauteur);
          $stmt->bindParam(':cableMoulure',$cableMoulure);
          $stmt->bindParam(':trancheExterieur',$trancheExterieur);
          $stmt->bindParam(':cablePlafond',$cablePlafond);
          $stmt->bindParam(':tubeIro',$tubeIro);
          $stmt->bindParam(':locationOuVente',$locationOuVente);
          $stmt->bindParam(':engagementLocation',$engagementLocation);
          $stmt->bindParam(':montantDevis',$montantDevis);
          $stmt->bindParam(':acompte',$acompte);
          $stmt->bindParam(':numeroDevis',$numeroDevis);
          $stmt->execute();


        } catch (Exception $e) {
          echo $e->getMessage();
        }

      }




      /**
      * GETTERS / SETTERS
      */
      public function getCodeClient()
      {
        return $this->_codeClient;
      }

      public function setCodeClient($codeClient)
      {
        $this->_codeClient = $codeClient;
        return $this;
      }

      public function getRaisonSociale()
      {
        return $this->_raisonSociale;
      }

      public function setRaisonSociale($raisonSociale)
      {
        $this->_raisonSociale = $raisonSociale;
        return $this;
      }

      public function getAdresseLivraison()
      {
        return $this->_adresseLivraison;
      }

      public function setAdresseLivraison($adresseLivraison)
      {
        $this->_adresseLivraison = $adresseLivraison;
        return $this;
      }

      public function getCpLivraison()
      {
        return $this->_cpLivraison;
      }

      public function setCpLivraison($cpLivraison)
      {
        $this->_cpLivraison = $cpLivraison;
        return $this;
      }

      public function getVilleLivraison()
      {
        return $this->_villeLivraison;
      }

      public function setVilleLivraison($villeLivraison)
      {
        $this->_villeLivraison = $villeLivraison;
        return $this;
      }

      public function getAdresseFacturation()
      {
        return $this->_adresseFacturation;
      }

      public function setAdresseFacturation($adresseFacturation)
      {
        $this->_adresseFacturation = $adresseFacturation;
        return $this;
      }

      public function getCpFacturation()
      {
        return $this->_cpFacturation;
      }

      public function setCpFacturation($cpFacturation)
      {
        $this->_cpFacturation = $cpFacturation;
        return $this;
      }

      public function getVilleFacturation()
      {
        return $this->_villeFacturation;
      }

      public function setVilleFacturation($villeFacturation)
      {
        $this->_villeFacturation = $villeFacturation;
        return $this;
      }


      public function getTel1()
      {
        return $this->_tel1;
      }

      public function setTel1($tel1)
      {
        $this->_tel1 = $tel1;
        return $this;
      }


      public function getTel2()
      {
        return $this->_tel2;
      }

      public function setTel2($tel2)
      {
        $this->_tel2 = $tel2;
        return $this;
      }
      public function getMail1()
      {
        return $this->_mail1;
      }

      public function setMail1($mail1)
      {
        $this->_mail1 = $mail1;
        return $this;
      }


      public function getMail2()
      {
        return $this->_mail2;
      }

      public function setMail2($mail2)
      {
        $this->_mail2 = $mail2;
        return $this;
      }


      public function getNomResponsable()
      {
        return $this->_nomResponsable;
      }

      public function setNomResponsable($nomResponsable)
      {
        $this->_nomResponsable = $nomResponsable;
        return $this;
      }


      public function getPrenomResponsable()
      {
        return $this->_prenomResponsable;
      }

      public function setPrenomResponsable($prenomResponsable)
      {
        $this->_prenomResponsable = $prenomResponsable;
        return $this;
      }

      public function getMateriel()
      {
        return $this->_materiel;
      }

      public function setMateriel($materiel)
      {
        $this->_materiel = $materiel;
        return $this;
      }

      public function getTelesurveillance()
      {
        return $this->_telesurveillance;
      }

      public function setTelesurveillance($telesurveillance)
      {
        $this->_telesurveillance = $telesurveillance;
        return $this;
      }

      public function getVideosurveillance()
      {
        return $this->_videosurveillance;
      }

      public function setVideosurveillance($videosurveillance)
      {
        $this->_videosurveillance = $videosurveillance;
        return $this;
      }

      public function getCommentaires()
      {
        return $this->_commentaires;
      }

      public function setCommentaires($commentaires)
      {
        $this->_commentaires = $commentaires;
        return $this;
      }

      public function getMainOeuvre()
      {
        return $this->_mainOeuvre;
      }

      public function setMainOeuvre($mainOeuvre)
      {
        $this->_mainOeuvre = $mainOeuvre;
        return $this;
      }

      public function getTravauxHauteur()
      {
        return $this->_travauxHauteur;
      }

      public function setTravauxHauteur($travauxHauteur)
      {
        $this->_travauxHauteur = $travauxHauteur;
        return $this;
      }

      public function getTrancheExterieur()
      {
        return $this->_trancheExterieur;
      }

      public function setTrancheExterieur($trancheExterieur)
      {
        $this->_trancheExterieur = $trancheExterieur;
        return $this;
      }

      public function getCableMoulure()
      {
        return $this->_cableMoulure;
      }

      public function setCableMoulure($cableMoulure)
      {
        $this->_cableMoulure = $cableMoulure;
        return $this;
      }

      public function getCablePlafond()
      {
        return $this->_cablePlafond;
      }

      public function setCablePlafond($cablePlafond)
      {
        $this->_cablePlafond = $cablePlafond;
        return $this;
      }

      public function getTubeIro()
      {
        return $this->_tubeIro;
      }

      public function setTubeIro($tubeIro)
      {
        $this->_tubeIro = $tubeIro;
        return $this;
      }

      public function getLocationOuVente()
      {
        return $this->_locationOuVente;
      }

      public function setLocationOuVente($locationOuVente)
      {
        $this->_locationOuVente = $locationOuVente;
        return $this;
      }

      public function getEngagementLocation()
      {
        return $this->_engagementLocation;
      }

      public function setEngagementLocation($engagementLocation)
      {
        $this->_engagementLocation = $engagementLocation;
        return $this;
      }

      public function getMontantDevis()
      {
        return $this->_montantDevis;
      }

      public function setMontantDevis($montantDevis)
      {
        $this->_montantDevis = $montantDevis;
        return $this;
      }

      public function getAcompte()
      {
        return $this->_acompte;
      }

      public function setAcompte($acompte)
      {
        $this->_acompte = $acompte;
        return $this;
      }

      public function getNumeroDevis()
      {
        return $this->_numeroDevis;
      }

      public function setNumeroDevis($numeroDevis)
      {
        $this->_numeroDevis = $numeroDevis;
        return $this;
      }

      public function getDocumentNumber()
      {
        return $this->_documentNumber;
      }

      public function setDocumentNumber($DocumentNumber)
      {
        $this->_documentNumber = $DocumentNumber;
        return $this;
      }







    }
