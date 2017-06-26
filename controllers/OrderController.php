<?php
namespace Controllers;
use App\Connect;
use Models\Order;

use \Twig_Loader_Filesystem;
use \Twig_Environment;


class OrderController extends Controller
{
   protected $twig;
   public function index()
   {
      // echo "order index";
      $order = new Order();
      $list = $order->fetchAll();

      echo $this->twig->render('order/index.html.twig',
      [
         "orderList" => $list
      ]
   );
}

public function new(){
   $order = new Order();
   $DocumentNumber = $_GET['pk'];
   $orderInformation = $order->find($DocumentNumber);
   // var_dump($orderInformation);
   // echo "<h2 class='center'>".$DocumentNumber."</h2>";
   echo $this->twig->render('order/new.html.twig',
   [
      "orderInformation" => $orderInformation
   ]);
   // if ($DocumentNumber !=$_GET['pk']) {
   //    header( "Location: /?c=order&t=Index" );
   // }
}

public function save(){

   //   $user = $app['session']->get('user');
   //   if (empty($user)) {
   //     return $app->redirect('/login');
   //   }
   // echo $_POST['raisonSociale'];

   // vérifie si les champs sont remplis
   if (empty($_POST['adresseFacturation']) || empty($_POST['cpFacturation']) || empty($_POST['villeFacturation'])) {
      $_POST['adresseFacturation']='';
      $_POST['cpFacturation']='';
      $_POST['villeFacturation']='';
   }
   if (empty($_POST['tel2'])) {
      $_POST['tel2']='';

   }
   if (empty($_POST['mail2'])) {
      $_POST['mail2']='';
   }
   if (empty($_POST['telesurveillance'])) {
      $_POST['telesurveillance']='non';

   }
   if (empty($_POST['videosurveillance'])) {
      $_POST['videosurveillance']='non';
   }
   if (empty($_POST['engagementLocation'])) {
      $_POST['engagementLocation']=0;
   }
   if (empty($_POST['commentaires'])) {
      $_POST['commentaires']='';
   }
   if (empty($_POST['travauxHauteur'])) {
      $_POST['travauxHauteur']='non';
   }
   if (empty($_POST['cableMoulure'])) {
      $_POST['cableMoulure']='non';
   }
   if (empty($_POST['trancheExterieur'])) {
      $_POST['trancheExterieur']='non';
   }
   if (empty($_POST['cablePlafond'])) {
      $_POST['cablePlafond']='non';
   }
   if (empty($_POST['tubeIro'])) {
      $_POST['tubeIro']='non';
   }
   if (empty($_POST['locationOuVente'])) {
      $_POST['locationOuVente']='non';
   }


   // if ($request->isMethod('post')){
   $order = new Order();
   $order
   ->setCodeClient($_POST['codeClient'])
   ->setRaisonSociale($_POST['raisonSociale'])
   ->setAdresseFacturation($_POST['adresseFacturation'])
   ->setCpFacturation($_POST['cpFacturation'])
   ->setVilleFacturation($_POST['villeFacturation'])
   ->setAdresseLivraison($_POST['adresseLivraison'])
   ->setCpLivraison($_POST['cpLivraison'])
   ->setVilleLivraison($_POST['villeLivraison'])
   ->setTel1($_POST['tel1'])
   ->setTel2($_POST['tel2'])
   ->setMail1($_POST['mail1'])
   ->setMail2($_POST['mail2'])
   ->setNomResponsable($_POST['nomResponsable'])
   ->setPrenomResponsable($_POST['prenomResponsable'])
   ->setMateriel($_POST['materiel'])
   ->setTelesurveillance($_POST['telesurveillance'])
   ->setVideosurveillance($_POST['videosurveillance'])
   ->setCommentaires($_POST['commentaires'])
   ->setMainOeuvre($_POST['mainOeuvre'])
   ->setTravauxHauteur($_POST['travauxHauteur'])
   ->setCableMoulure($_POST['cableMoulure'])
   ->setTrancheExterieur($_POST['trancheExterieur'])
   ->setCablePlafond($_POST['cablePlafond'])
   ->setTubeIro($_POST['tubeIro'])
   ->setLocationOuVente($_POST['locationOuVente'])
   ->setEngagementLocation($_POST['engagementLocation'])
   ->setMontantDevis($_POST['montantDevis'])
   ->setAcompte($_POST['acompte'])
   ->setNumeroDevis($_POST['numeroDevis']);





   $order->save();
   //
   //     // return $app->redirect('/admin/ateliers');
   // }

   header( "Location: /?c=order&t=Index" );

}


}
