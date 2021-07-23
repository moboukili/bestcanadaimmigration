<?php

require 'PHPMailer/PHPMailerAutoload.php';

if(!empty($_POST['submit'])){
 $nom = $_POST["nom"];
 $email = $_POST["email"];

require "pdf/fpdf.php";

$mail = new PHPMailer();

try {

   $mail->CharSet = "UTF-8";
   $mail->SMTPDebug = 1;
   //$mail->IsSMTP();
   $mail->SMTPAuth = true;
   $mail->SMTPSecure = 'tls'; 
   $mail->Port = 587; 
   
   $mail->Host = 'bestcanadaimmigration.com';
   $mail->Username = 'bestcanadaim@hotmail.com';
   $mail->Password = 'bestmaroc2011';

   $mail->isHTML(true);
   $mail->setFrom($email,$nom);
   $mail->addAddress("bestcanadaim@hotmail.com");
   class myPDF extends fPDF
{
	function header()
	{
		$this->Image('pdf/logo1.png',10,6);
        $tDate = date("d / m / Y, H:i ");
        $this->SetFont('Arial','',10);
        $this->Cell(480,3, 'Date de remplissage : '.$tDate, 0, false, 'C', 0, '', 0, false, 'T', 'M');
        $this->Ln();
		$this->SetFont('Arial','B',14);
		$this->Cell(276,5,'Formulaire Travailleurs',0,0,'C'); 
		$this->Ln(30);
	}
	function footer(){
		$this->SetY(-15);
		$this->SetFont('Arial','',8);
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
} 
$pdf = new myPDF(); 
$pdf->SetTitle('Form printing');
$pdf->AddPage('L','A4',0);
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',13);
$pdf->Cell(20,10,'INFORMATIONS GENERALES',0,0,'L');
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(30,10,utf8_decode('Le Nom : '),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['nom']),0, 1, 'C'); 
$pdf->Cell(30,10,utf8_decode('Le Prénom : '),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['prenom']),0, 1, 'C');
$pdf->Cell(30,10,utf8_decode('Âge : '),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['age']),0, 1, 'C');
$pdf->Cell(30,10,utf8_decode('Sexe : '),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['formsexe']),0, 1, 'C');
$pdf->Cell(30,10,utf8_decode('Téléphone Mobile : '),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['phone']),0, 1, 'C'); 
$pdf->Cell(30,10,utf8_decode('Email : '),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['email']),0, 1, 'C');
$pdf->Cell(30,10,utf8_decode('État civil : '),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['selectMenu']),0, 1, 'C');
if(isset($_POST['Marie'])){
    if($_POST['Marie'] == null ) {
}else{ 
$pdf->Cell(30,10,utf8_decode('Avez-vous des enfants ?'),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['Marie']),0, 1, 'C');
} }
if(isset($_POST['Divorce'])){
    if($_POST['Divorce'] == null ) {
}else{ 
$pdf->Cell(30,10,utf8_decode('Avez-vous des enfants ?'),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['Divorce']),0, 1, 'C');
} }
if(isset($_POST['Veuf'])){
    if($_POST['Veuf'] == null ) {
}else{ 
$pdf->Cell(30,10,utf8_decode('Avez-vous des enfants ?'),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['Veuf']),0, 1, 'C');
} }
$pdf->Cell(30,10,utf8_decode('Pays residence :'),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['country']),0, 1, 'C');
$pdf->SetFont('Arial','B',13);
$pdf->Cell(20,10,'LANGUES : Francais',0,0,'L');
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(30,10,utf8_decode('Compréhension orale :'),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['Comprorale']),0, 1, 'C');
$pdf->Cell(30,10,utf8_decode('Production orale :'),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['Prodorale']),0, 1, 'C');
$pdf->Cell(30,10,utf8_decode('Compréhension écrite :'),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['Comprecrite']),0, 1, 'C');
$pdf->Cell(30,10,utf8_decode('Production ecrite : '),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['Prodecrite']),0, 1, 'C');  
$pdf->SetFont('Arial','B',13);
$pdf->Cell(20,10,'LANGUES : Anglais',0,0,'L');
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(30,10,'Listening :',0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['Listening']),0, 1, 'C');
$pdf->Cell(30,10,'Speaking :',0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['Speaking']),0, 1, 'C');
$pdf->Cell(30,10,'Reading :',0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['Reading']),0, 1, 'C');
$pdf->Cell(30,10,'Writing : ',0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['Writing']),0, 1, 'C');  
$pdf->SetFont('Arial','B',13);
$pdf->Cell(20,10,'EXPERIENCE',0,0,'L');
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(30,10,utf8_decode('Emploi occupe ?'),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['emploi']),0, 1, 'C');
$pdf->Cell(30,10,utf8_decode('Combien d\'année d’éxperience ?'),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['experience']),0, 1, 'C');
$pdf->Cell(30,10,utf8_decode('Combien de mois déclaré ? '),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['legal']),0, 1, 'C');
$pdf->SetFont('Arial','B',13);
$pdf->Cell(20,10,utf8_decode('Études'),0,0,'L');
$pdf->Ln();
if(isset($_POST['formradio'])){
    if($_POST['formradio'] == "OUI" ) {
$pdf->SetFont('Times','',12);
$pdf->Cell(30,10,utf8_decode('Avez-vous obtenus des diplômes?'),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['formradio']),0, 1, 'C'); 
$pdf->Cell(30,10,utf8_decode('Votre niveaux d\'étude : '),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['niveaux']),0, 1, 'C');
$pdf->Cell(30,10,utf8_decode('Spécialité : '),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['specialie']),0, 1, 'C');
$pdf->Cell(30,10,utf8_decode('Date d\'obtention : '),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['dateob']),0, 1, 'C'); 
$pdf->Cell(30,10,utf8_decode('Type diplôme :'),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['formType']),0, 1, 'C');
    if(isset($_POST['autredip'])){
        if($_POST['autredip'] == null ) {
    }else{ 
    $pdf->Cell(30,10,utf8_decode('autre diplôme et la specialisté'),0, 0, 'L');
    $pdf->Cell(80,10,utf8_decode($_POST['autredip']),0, 1, 'C');
    } }
}else{ 
$pdf->Cell(30,10,utf8_decode('Obtenus des diplomes?'),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['formradio']),0, 1, 'C'); 
} }
if(isset($_POST['nomcon'])){
    if($_POST['nomcon'] == null ) {
}else{ 
$pdf->SetFont('Arial','B',13);
$pdf->Cell(20,10,'SECTION DE LA CONJOINT(E) S\'IL YA LIEU',0,0,'L');
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(30,10,utf8_decode('Nom : '),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['nomcon']),0, 1, 'C');
$pdf->Cell(30,10,utf8_decode('Prénom : '),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['prenomcon']),0, 1, 'C');
$pdf->Cell(30,10,utf8_decode('Âge :'),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['agecon']),0, 1, 'C');
$pdf->Cell(30,10,utf8_decode('LANGUES - Francais :'),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['français']),0, 1, 'C');
$pdf->Cell(30,10,utf8_decode('LANGUES - Anglais :'),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['anglais']),0, 1, 'C');
$pdf->SetFont('Arial','B',13);
$pdf->Cell(20,10,'EXPERIENCE',0,0,'L');
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(30,10,utf8_decode('Emploi occupe ?'),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['emploi']),0, 1, 'C');
$pdf->Cell(30,10,utf8_decode('Combien d\'année d’éxperience ?'),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['experience']),0, 1, 'C');
$pdf->Cell(30,10,utf8_decode('Combien de mois déclaré ? '),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['legal']),0, 1, 'C');
$pdf->SetFont('Arial','B',13);
$pdf->Cell(20,10,'PERSONNE (S) A CHARGE',0,0,'L');
$pdf->Ln();
$pdf->SetFont('Times','',12);
$pdf->Cell(30,10,utf8_decode('Combien avez-vous d\'enfants ?'),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['enfants']),0, 1, 'C');
$pdf->Cell(30,10,utf8_decode('L\'age des enfants ?'),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['ageenf']),0, 1, 'C');
} }
if(isset($_POST['formconjoint'])){
    if($_POST['formconjoint'] == "OUI" ) {
$pdf->Cell(30,10,utf8_decode('Conjoint(e) a obtenue des diplômes ?'),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['formconjoint']),0, 1, 'C');
$pdf->Cell(30,10,utf8_decode('Son Spécialité : '),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['conjspecialie']),0, 1, 'C');
$pdf->Cell(30,10,utf8_decode('Son niveau d\'etude : '),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['niveau1']),0, 1, 'C');
$pdf->Cell(30,10,utf8_decode('Date d\'obtention :'),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['dateob1']),0, 1, 'C');
$pdf->Cell(30,10,utf8_decode('Type diplôme : '),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['formTypee']),0, 1, 'C');
}else{ 
    $pdf->Cell(30,10,utf8_decode('des diplômes de conjoint(e) ?'),0, 0, 'L');
    $pdf->Cell(80,10,utf8_decode($_POST['formconjoint']),0, 1, 'C');
} }
if(isset($_POST['stages'])){
    if($_POST['stages'] == "OUI" ) {
$pdf->Cell(30,10,utf8_decode('Avez-vous des stages ?'),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['stages']),0, 1, 'C'); 
$pdf->Cell(30,10,utf8_decode('Domaine : '),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['domaine']),0, 1, 'C');
$pdf->Cell(30,10,utf8_decode('La Période : '),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['periode']),0, 1, 'C');
}else{ 
    $pdf->Cell(30,10,'Avez-vous des stages ?',0, 0, 'L');
    $pdf->Cell(80,10,utf8_decode($_POST['stages']),0, 1, 'C');
} }
if(isset($_POST['famille'])){
    if($_POST['famille'] == "OUI" ) {
$pdf->Cell(30,10,'Avez-vous de la famille au Canada ? ',0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['famille']),0, 1, 'C'); 
$pdf->Cell(30,10,'c\'est qui ? :',0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['familleC']),0, 1, 'C');
}else{ 
    $pdf->Cell(30,10,'Avez-vous de la famille au Canada ? ',0, 0, 'L');
    $pdf->Cell(80,10,utf8_decode($_POST['famille']),0, 1, 'C');
} }
$pdfdoc = $pdf->Output('', 'S');

   
   



       if ($mail->addReplyTo($_POST['email'], $_POST['nom'])) {
        $mail->Subject = 'Formulaire Travailleurs'; 


        $mail->isHTML(true);

    $mail->Body = "$nom a remplit ce formulaire en utilisant cet email : $email";


    $mail->addStringAttachment($pdfdoc, 'formulaire.pdf');


   //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            
            $msg = 'Sorry, something went wrong. Please try again later.';
        } else {
            header("Refresh:5; url=formtravail.php");	
            $alert = '<div class="alert-success">
            <span>Merci ! Votre Formulaire a été bien envoyer.</span>
           </div> <br>';
        }
    } else {
        $msg = 'Invalid email address, message ignored.';
    }




   /* Enable SMTP debug output. */
   $mail->SMTPDebug = 4;

  // $mail->send();


}

catch (Exception $e){
    $alert = '<div class="alert-error">
    <span>'.$e->getMessage().'</span>
  </div>';
  }
}
?>
<!DOCTYPE html>
<html lang="fr">


<head>
    <title>Best Canada Immigration</title>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Best Canada Immigration">
    <meta name="keyword" content="Best Canada Immigration">
    <!-- FAV ICON(BROWSER TAB ICON) -->
    <link rel="shortcut icon" href="images/maple.ico" type="image/x-icon">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CJosefin+Sans:600,700" rel="stylesheet">
    <!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- ALL CSS FILES -->
    <link href="css/materialize.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
    <link href="css/style-mob.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/intlTelInput.css">
        
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
        <style>
.alert-success{
    z-index: 1;
    background: #D4EDDA;
    padding: 15px 25px;
    font-weight: 600;
    border-left: 8px solid #3AD66E;
    border-radius: 4px;
    font-size: 12px;
    
  }
  
  .alert-error{
    z-index: 1;
    background: #FFF3CD;
    padding: 15px 25px;
    font-weight: 600;
    border-left: 8px solid #ff0202;;
    border-radius: 4px;
    font-size: 12px;
  }
    .for{
    padding: 50px 25px;
    position: relative;
    overflow: hidden;
}
.for-sos{
    position: relative;
    overflow: hidden;
    margin-bottom: 20px;
    padding: 10px;
    border-radius: 2px;
}
.for-sos h4{
    padding-bottom: 10px;
    border-bottom: 1px solid #eeeeef;
    margin-bottom: 15px;
    text-transform: uppercase;
    color: #373A40;
}
        </style>


</head>


<body onload="hideAllDivs();">

     <!-- MOBILE MENU -->
     <section>
        <div class="ed-mob-menu">
            <div class="ed-mob-menu-con">
                <div class="ed-mm-left">
                    <div class="wed-logo">
                        <a href="index.html"><img src="images/logo1.png" alt="" />
						</a>
                    </div>
                </div>
                <div class="ed-mm-right">
                    <div class="ed-mm-menu">
                        <a href="#!" class="ed-micon"><i class="fa fa-bars"></i></a>
                        <div class="ed-mm-inn">
                            <a href="#!" class="ed-mi-close"><i class="fa fa-times"></i></a>
                            <h4>Toutes les pages</h4>
                                <ul>
                                <li style="list-style-type: none;"><a href="index.html">Accueil</a></li>
                                <li style="list-style-type: none;"><a href="contact-us.php">Contactez Nous</a></li>
                                <li style="list-style-type: none;"><a href="gallery-photo.html">Notre Galerie</a></li>
                                </ul>
                                <ul>
                                <il style="list-style-type: none;"><a href="#!" class="mm-arr" style="font-weight:bold">Notre entreprise</a>
                                
                                <li style="list-style-type: none;"><a href="Consultant.html">Notre Consultant</a></li>
                                <li style="list-style-type: none;"><a href="Services.html">Nos Services</a></li>
                                <li style="list-style-type: none;"><a href="Procedure.html">Notre Procédure</a></li>
                                <li style="list-style-type: none;"><a href="Honoraire.html">Nos Honoraires</a></li>
                                <li style="list-style-type: none;"><a href="Engagement.html">Notre Engagement</a></li>
                                </ul></il>
                                <il style="list-style-type: none;"><a href="#" class="mm-arr" style="font-weight:bold">Programmes D'immigration</a>
                                <ul>
                                <li style="list-style-type: none;"><a href="Travailleurs.html">Travailleurs qualifiés permanents</a></li>
                                <li style="list-style-type: none;"><a href="GensDaffaire.html">Gens d’affaires</a></li>
                                <li style="list-style-type: none;"><a href="Parrainage.html">Parrainage (regroupement familial)</a></li>
                                <li style="list-style-type: none;"><a href="Etudiants.html">Étudiants étrangers</a></li>
                                <li style="list-style-type: none;"><a href="VisaVisiteur.html">Visa de visiteur</a></li>
                                </ul></il>
                                <il style="list-style-type: none;"><a href="#!" class="mm-arr" style="font-weight:bold">Information sur l'immigration</a>
                                <ul>
                                <li style="list-style-type: none;"><a href="Procedures.html">procédures d’immigration</a></li>
                                <li style="list-style-type: none;"><a href="Frais.html">Frais gouvernementaux</a></li>
                                <li style="list-style-type: none;"><a href="Fraude.html">Attention à la fraude </a></li>
                                <li style="list-style-type: none;"><a href="Info.html">Informations sur Canada</a></li>
                                <li style="list-style-type: none;"><a href="Hyperliens.html">Hyperliens</a></li>
                                </ul></il>
                            
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--HEADER SECTION-->
    <section>
        <!-- TOP BAR -->
        <div class="ed-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ed-com-t1-left">
                            <ul>
                                <li><a href="mailto:bestcanada@hotmail.ca">Email: info@bestcanada.com</a>
                                </li>
                                <li><a href="tel:+212536702170">Phone: +212-5367-02170</a>
                                </li>
                            </ul>
                        </div>
                        <div class="ed-com-t1-right">
                            <ul>
                                <li><a href="contact-us.php">Contactez Nous</a>
                                </li>
                                <li><a href="gallery-photo.html" >Notre Galerie</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- LOGO AND MENU SECTION -->
        <div class="top-logo" data-spy="affix" data-offset-top="250">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wed-logo">
                            <a href="index.html"><img src="images/logo1.png" alt="" />
                            </a>
                        </div>
                        <div class="main-menu">
                            <ul>
                                <li><a href="index.html">Accueil</a>
                                </li>
                                <li class="about-menu">
                                    <a href="#!" class="mm-arr">Notre entreprise</a>
                                    <!-- MEGA MENU 1 -->
                                    <div class="mm-pos">
                                        <div class="about-mm m-menu">
                                            <div class="m-menu-inn">
                                                <div class="mm1-com mm1-s3">
                                                    <ul>
                                                        <li><a href="Consultant.html">Notre Consultant</a></li>
                                                        <li><a href="Services.html">Nos Services</a></li>
                                                        <li><a href="Procedure.html">Notre Procédure</a></li>
                                                        <li><a href="Honoraire.html">Nos Honoraires</a></li>
                                                        <li><a href="Engagement.html">Notre Engagement</a></li>
                                                    </ul>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="admi-menu">
                                    <a href="#" class="mm-arr">Programmes D'immigration</a>
                                    <!-- MEGA MENU 1 -->
                                    <div class="mm-pos">
                                        <div class="admi-mm m-menu">
                                            <div class="m-menu-inn">
                                                <div class="mm1-com mm1-s3">
                                                    <ul>
                                                        <li><a href="Travailleurs.html">Travailleurs qualifiés permanents</a></li>
                                                        <li><a href="GensDaffaire.html">Gens d’affaires</a></li>
                                                        <li><a href="Parrainage.html">Parrainage (regroupement familial)</a></li>
                                                        <li><a href="Etudiants.html">Étudiants étrangers</a></li>
                                                        <li><a href="VisaVisiteur.html">Visa de visiteur</a></li>
                                                    </ul>
                                                </div>
                                                </div>    
                                        </div>
                                    </div>
                                </li>
                                <li class="cour-menu">
                                    <a href="#!" class="mm-arr">Information sur l'immigration</a>
                                    <!-- MEGA MENU 1 -->
                                    <div class="mm-pos">
                                        <div class="cour-mm m-menu">
                                            <div class="m-menu-inn">
                                                <div class="mm1-com mm1-s3">
                                                    <ul>
                                                        <li><a href="Procedures.html">procédures d’immigration</a></li>
                                                        <li><a href="Frais.html">Frais gouvernementaux</a></li>
                                                        <li><a href="Fraude.html">Attention à la fraude </a></li>
                                                        <li><a href="Info.html">Informations sur Canada</a></li>
                                                        <li><a href="Hyperliens.html">Hyperliens</a></li>
                                                    </ul>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="all-drop-down-menu">

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--END HEADER SECTION-->

    <!--SECTION START-->
    <section>
        <div class="stu-db">
            <div class="container pg-inn">
                <div class="col-md-3">
                    <br><br>
                    <ul><li class="page-back" style="list-style-type: none;"><?php echo $alert;?>
                        </li></ul><br>
                    <div class="pro-user-bio">
                        <h4 style="color: red; font-weight: bold;">Êtes-vous Admissible?</h4>
                    </div>
                    <div class="ho-ev-latest ho-ev-latest-bg-2">
                        <div class="ho-lat-ev">
                            <a href="formtravail.php">
                                <h4>Travailleurs Qualifiés</h4>
                                <p>FORMULAIRE D'ÉVALUATION</p>
                            </a>
                        </div>
                    </div>
                    <div class="ho-ev-latest ho-ev-latest-bg-3">
                        <div class="ho-lat-ev">
                            <a href="formgens.php">
                            <h4>Gens D'affaires</h4>
                            <p>FORMULAIRE D'ÉVALUATION</p>
                        </a>
                        </div>
                    </div>
                    <div class="ho-ev-latest ho-ev-latest-bg-1">
                        <div class="ho-lat-ev">
                            <a href="formetud.php">
                                <h4>Etudier Au Canada</h4>
                                <p>FORMULAIRE D'ÉVALUATION</p>
                            </a>
                        </div>
                    </div>
                    <div class="ho-ev-latest ho-ev-latest-bg-4">
                        <div class="ho-lat-ev">
                            <a href="formpar.php">
                                <h4>Parrainage</h4>
                                <p>FORMULAIRE D'ÉVALUATION</p>
                            </a>
                        </div>
                    </div>
                </div>
                    <!--== breadcrumbs ==-->
                    <div class="sb2-2-2">
                        <ul>
                            <li style="padding-left: 10px;"><a href="index.html"><i class="fa fa-home" aria-hidden="true"></i> Accueil</a>
                            </li>
                        </ul>
                        <br><br>
                        <div class="row">
                            <div class="col-md-12">
                            <div class="box-inn-sp admin-form">
                                    <div class="inn-title">
                                        <h4>Formulaire Travailleurs</h4>
                                    </div>
                                    <div class="tab-inn">
                                        <form  method="POST" action="formtravail_message.php" id="myForm">
                                            <p style="font-weight: bold;padding-left: 10px;padding-bottom: 10px;font-size: 14px; color: red;">INFORMATIONS GÉNÉRALES</p>
                                            <div class="f-row">
                                                <div class="one-half">
                                                    <label >Nom : <span style="color: red;">(*)</span></label>
                                                    <input type="text" name="nom" class="validate" placeholder="Votre Nom svp" required>
                                                </div>
                                                <div class="one-half">
                                                    <label >Prénom : <span style="color: red;">(*)</span></label>
                                                    <input type="text" name="prenom" class="validate" placeholder="Votre Prénom svp" required>
                                                </div>
                                            </div>
                                            <div class="f-row">
                                                <div class="one-half"> 
                                                    <label >Âge : <span style="color: red;">(*)</span></label>
                                                        <input type="number" name="age" class="validate" placeholder="Votre Âge svp" required  min="18" max="100" value="18">
                                                </div>
                                                <div class="one-half">
                                                    <label>Sexe : <span style="color: red;">(*)</span></label><br>
                                                    <input name="formsexe" type="radio" value="  Homme " id="sexe0">
                                                        <label for="sexe0">  Homme</label>
                                                    <input name="formsexe" type="radio" value="  Femme " id="sexe1">
                                                        <label for="sexe1">  Femme</label>
                                                </div>  
                                            </div>     
                                            <div class="f-row">
                                                <div class="one-half">
                                                    <label>Téléphone: <span style="color: red;">(*)</span></label><br>
                                                    <input id="phone" name="phone" class="validate" type="tel">
                                                </div>
                                                <div class="one-half">
                                                    <label>Email Id: <span style="color: red;">(*)</span></label>
                                                        <input type="email" name="email" class="validate" placeholder="Votre Email svp" required>
                                                </div>  
                                            </div>
                                            <div class="f-row">
                                                <div class="one-half">
                                                    <label>État civil : <span style="color: red;">(*)</span></label>
                                                    <select name="selectMenu" id="selectMenu" onload="hideAllDivs();" onchange="toggle(this.options[this.options.selectedIndex].value)">
                                                         <option value="Celibataire" selected>Célibataire</option>
                                                         <option value="Marie">Marié</option>
                                                         <option value="Conjoint de fait">Conjoint de fait</option>
                                                         <option value="Divorce(e)">Divorcé(e)</option>
                                                         <option value="Veuf(e)">Veuf(e)</option>
                                                    </select>
                                                </div>
                                                <div class="one-half">
                                                        <div id="Célibataire"> </div>
    
                                                        <div id="Marie">
                                                            <label>Avez-vous des enfants ? <span style="color: red;">(*)</span></label><br>
                                                            <input name="form[enfants]" type="radio" value="  Oui " id="enfants0">
                                                            <label for="enfants0">  Oui </label>
                                                            <input name="form[enfants]" type="radio" value="  Non " id="enfants1">
                                                            <label for="enfants1">  Non </label>
                                                        </div>
                                                        
                                                        <div id="Conjoint de fait"></div>
                                                        
                                                        <div id="Divorce(e)">
                                                            <label>Avez-vous des enfants ? <span style="color: red;">(*)</span></label><br>
                                                            <input name="form[enfants]" type="radio" value="  Oui " id="enfants0">
                                                            <label for="enfants0">  Oui </label>
                                                            <input name="form[enfants]" type="radio" value="  Non " id="enfants1">
                                                            <label for="enfants1">  Non </label>
                                                        </div>

                                                        <div id="Veuf(e)">
                                                            <label>Avez-vous des enfants ? <span style="color: red;">(*)</span></label><br>
                                                            <input name="form[enfants]" type="radio" value="  Oui " id="enfants0">
                                                            <label for="enfants0">  Oui </label>
                                                            <input name="form[enfants]" type="radio" value="  Non " id="enfants1">
                                                            <label for="enfants1">  Non </label>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="f-row">
                                                <div class="one-half">           
                                                    <label >Pays résidence : <span style="color: red;">(*)</span></label>
                                                    <select id="country" name="country">
                                                        <option value="Afghanistan">Afghanistan</option>
                                                        <option value="Åland Islands">Åland Islands</option>
                                                        <option value="Albania">Albania</option>
                                                        <option value="Algeria">Algeria</option>
                                                        <option value="American Samoa">American Samoa</option>
                                                        <option value="Andorra">Andorra</option>
                                                        <option value="Angola">Angola</option>
                                                        <option value="Anguilla">Anguilla</option>
                                                        <option value="Antarctica">Antarctica</option>
                                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                        <option value="Argentina">Argentina</option>
                                                        <option value="Armenia">Armenia</option>
                                                        <option value="Aruba">Aruba</option>
                                                        <option value="Australia">Australia</option>
                                                        <option value="Austria">Austria</option>
                                                        <option value="Azerbaijan">Azerbaijan</option>
                                                        <option value="Bahamas">Bahamas</option>
                                                        <option value="Bahrain">Bahrain</option>
                                                        <option value="Bangladesh">Bangladesh</option>
                                                        <option value="Barbados">Barbados</option>
                                                        <option value="Belarus">Belarus</option>
                                                        <option value="Belgium">Belgium</option>
                                                        <option value="Belize">Belize</option>
                                                        <option value="Benin">Benin</option>
                                                        <option value="Bermuda">Bermuda</option>
                                                        <option value="Bhutan">Bhutan</option>
                                                        <option value="Bolivia">Bolivia</option>
                                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                        <option value="Botswana">Botswana</option>
                                                        <option value="Bouvet Island">Bouvet Island</option>
                                                        <option value="Brazil">Brazil</option>
                                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                        <option value="Bulgaria">Bulgaria</option>
                                                        <option value="Burkina Faso">Burkina Faso</option>
                                                        <option value="Burundi">Burundi</option>
                                                        <option value="Cambodia">Cambodia</option>
                                                        <option value="Cameroon">Cameroon</option>
                                                        <option value="Canada">Canada</option>
                                                        <option value="Cape Verde">Cape Verde</option>
                                                        <option value="Cayman Islands">Cayman Islands</option>
                                                        <option value="Central African Republic">Central African Republic</option>
                                                        <option value="Chad">Chad</option>
                                                        <option value="Chile">Chile</option>
                                                        <option value="China">China</option>
                                                        <option value="Christmas Island">Christmas Island</option>
                                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                        <option value="Colombia">Colombia</option>
                                                        <option value="Comoros">Comoros</option>
                                                        <option value="Congo">Congo</option>
                                                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                        <option value="Cook Islands">Cook Islands</option>
                                                        <option value="Costa Rica">Costa Rica</option>
                                                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                        <option value="Croatia">Croatia</option>
                                                        <option value="Cuba">Cuba</option>
                                                        <option value="Cyprus">Cyprus</option>
                                                        <option value="Czech Republic">Czech Republic</option>
                                                        <option value="Denmark">Denmark</option>
                                                        <option value="Djibouti">Djibouti</option>
                                                        <option value="Dominica">Dominica</option>
                                                        <option value="Dominican Republic">Dominican Republic</option>
                                                        <option value="Ecuador">Ecuador</option>
                                                        <option value="Egypt">Egypt</option>
                                                        <option value="El Salvador">El Salvador</option>
                                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                        <option value="Eritrea">Eritrea</option>
                                                        <option value="Estonia">Estonia</option>
                                                        <option value="Ethiopia">Ethiopia</option>
                                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                        <option value="Faroe Islands">Faroe Islands</option>
                                                        <option value="Fiji">Fiji</option>
                                                        <option value="Finland">Finland</option>
                                                        <option value="France">France</option>
                                                        <option value="French Guiana">French Guiana</option>
                                                        <option value="French Polynesia">French Polynesia</option>
                                                        <option value="French Southern Territories">French Southern Territories</option>
                                                        <option value="Gabon">Gabon</option>
                                                        <option value="Gambia">Gambia</option>
                                                        <option value="Georgia">Georgia</option>
                                                        <option value="Germany">Germany</option>
                                                        <option value="Ghana">Ghana</option>
                                                        <option value="Gibraltar">Gibraltar</option>
                                                        <option value="Greece">Greece</option>
                                                        <option value="Greenland">Greenland</option>
                                                        <option value="Grenada">Grenada</option>
                                                        <option value="Guadeloupe">Guadeloupe</option>
                                                        <option value="Guam">Guam</option>
                                                        <option value="Guatemala">Guatemala</option>
                                                        <option value="Guernsey">Guernsey</option>
                                                        <option value="Guinea">Guinea</option>
                                                        <option value="Guinea-bissau">Guinea-bissau</option>
                                                        <option value="Guyana">Guyana</option>
                                                        <option value="Haiti">Haiti</option>
                                                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                        <option value="Honduras">Honduras</option>
                                                        <option value="Hong Kong">Hong Kong</option>
                                                        <option value="Hungary">Hungary</option>
                                                        <option value="Iceland">Iceland</option>
                                                        <option value="India">India</option>
                                                        <option value="Indonesia">Indonesia</option>
                                                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                        <option value="Iraq">Iraq</option>
                                                        <option value="Ireland">Ireland</option>
                                                        <option value="Isle of Man">Isle of Man</option>
                                                        <option value="Israel">Israel</option>
                                                        <option value="Italy">Italy</option>
                                                        <option value="Jamaica">Jamaica</option>
                                                        <option value="Japan">Japan</option>
                                                        <option value="Jersey">Jersey</option>
                                                        <option value="Jordan">Jordan</option>
                                                        <option value="Kazakhstan">Kazakhstan</option>
                                                        <option value="Kenya">Kenya</option>
                                                        <option value="Kiribati">Kiribati</option>
                                                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                        <option value="Korea, Republic of">Korea, Republic of</option>
                                                        <option value="Kuwait">Kuwait</option>
                                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                        <option value="Latvia">Latvia</option>
                                                        <option value="Lebanon">Lebanon</option>
                                                        <option value="Lesotho">Lesotho</option>
                                                        <option value="Liberia">Liberia</option>
                                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                        <option value="Liechtenstein">Liechtenstein</option>
                                                        <option value="Lithuania">Lithuania</option>
                                                        <option value="Luxembourg">Luxembourg</option>
                                                        <option value="Macao">Macao</option>
                                                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                        <option value="Madagascar">Madagascar</option>
                                                        <option value="Malawi">Malawi</option>
                                                        <option value="Malaysia">Malaysia</option>
                                                        <option value="Maldives">Maldives</option>
                                                        <option value="Mali">Mali</option>
                                                        <option value="Malta">Malta</option>
                                                        <option value="Marshall Islands">Marshall Islands</option>
                                                        <option value="Martinique">Martinique</option>
                                                        <option value="Mauritania">Mauritania</option>
                                                        <option value="Mauritius">Mauritius</option>
                                                        <option value="Mayotte">Mayotte</option>
                                                        <option value="Mexico">Mexico</option>
                                                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                        <option value="Monaco">Monaco</option>
                                                        <option value="Mongolia">Mongolia</option>
                                                        <option value="Montenegro">Montenegro</option>
                                                        <option value="Montserrat">Montserrat</option>
                                                        <option value="Morocco" selected>Morocco</option>
                                                        <option value="Mozambique">Mozambique</option>
                                                        <option value="Myanmar">Myanmar</option>
                                                        <option value="Namibia">Namibia</option>
                                                        <option value="Nauru">Nauru</option>
                                                        <option value="Nepal">Nepal</option>
                                                        <option value="Netherlands">Netherlands</option>
                                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                        <option value="New Caledonia">New Caledonia</option>
                                                        <option value="New Zealand">New Zealand</option>
                                                        <option value="Nicaragua">Nicaragua</option>
                                                        <option value="Niger">Niger</option>
                                                        <option value="Nigeria">Nigeria</option>
                                                        <option value="Niue">Niue</option>
                                                        <option value="Norfolk Island">Norfolk Island</option>
                                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                        <option value="Norway">Norway</option>
                                                        <option value="Oman">Oman</option>
                                                        <option value="Pakistan">Pakistan</option>
                                                        <option value="Palau">Palau</option>
                                                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                        <option value="Panama">Panama</option>
                                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                                        <option value="Paraguay">Paraguay</option>
                                                        <option value="Peru">Peru</option>
                                                        <option value="Philippines">Philippines</option>
                                                        <option value="Pitcairn">Pitcairn</option>
                                                        <option value="Poland">Poland</option>
                                                        <option value="Portugal">Portugal</option>
                                                        <option value="Puerto Rico">Puerto Rico</option>
                                                        <option value="Qatar">Qatar</option>
                                                        <option value="Reunion">Reunion</option>
                                                        <option value="Romania">Romania</option>
                                                        <option value="Russian Federation">Russian Federation</option>
                                                        <option value="Rwanda">Rwanda</option>
                                                        <option value="Saint Helena">Saint Helena</option>
                                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                        <option value="Saint Lucia">Saint Lucia</option>
                                                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                        <option value="Samoa">Samoa</option>
                                                        <option value="San Marino">San Marino</option>
                                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                                        <option value="Senegal">Senegal</option>
                                                        <option value="Serbia">Serbia</option>
                                                        <option value="Seychelles">Seychelles</option>
                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                        <option value="Singapore">Singapore</option>
                                                        <option value="Slovakia">Slovakia</option>
                                                        <option value="Slovenia">Slovenia</option>
                                                        <option value="Solomon Islands">Solomon Islands</option>
                                                        <option value="Somalia">Somalia</option>
                                                        <option value="South Africa">South Africa</option>
                                                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                        <option value="Spain">Spain</option>
                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                        <option value="Sudan">Sudan</option>
                                                        <option value="Suriname">Suriname</option>
                                                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                        <option value="Swaziland">Swaziland</option>
                                                        <option value="Sweden">Sweden</option>
                                                        <option value="Switzerland">Switzerland</option>
                                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                        <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                        <option value="Tajikistan">Tajikistan</option>
                                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                        <option value="Thailand">Thailand</option>
                                                        <option value="Timor-leste">Timor-leste</option>
                                                        <option value="Togo">Togo</option>
                                                        <option value="Tokelau">Tokelau</option>
                                                        <option value="Tonga">Tonga</option>
                                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                        <option value="Tunisia">Tunisia</option>
                                                        <option value="Turkey">Turkey</option>
                                                        <option value="Turkmenistan">Turkmenistan</option>
                                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                        <option value="Tuvalu">Tuvalu</option>
                                                        <option value="Uganda">Uganda</option>
                                                        <option value="Ukraine">Ukraine</option>
                                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                                        <option value="United Kingdom">United Kingdom</option>
                                                        <option value="United States">United States</option>
                                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                        <option value="Uruguay">Uruguay</option>
                                                        <option value="Uzbekistan">Uzbekistan</option>
                                                        <option value="Vanuatu">Vanuatu</option>
                                                        <option value="Venezuela">Venezuela</option>
                                                        <option value="Viet Nam">Viet Nam</option>
                                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                        <option value="Western Sahara">Western Sahara</option>
                                                        <option value="Yemen">Yemen</option>
                                                        <option value="Zambia">Zambia</option>
                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                    </select>
                                                </div>                 
                                            </div>
                                                <p style="font-weight: bold;padding-left: 10px;padding-bottom: 10px; font-size: 14px; color: red;">LANGUES </p> 
                                            <div class="f-row">
                                                <p style="font-weight: bold;padding-left: 10px;font-size: 14px;">français </p>
                                                <div class="one-half">
                                                    <label>Compréhension orale <span style="color: red;">(*)</span></label>
                                                    <select name="Comprorale" >
                                                        <option selected >Sélectionnez</option>
                                                         <option value="Débutant" >Débutant</option>
                                                         <option value="Moyen">Moyen</option>
                                                         <option value="Bon">Bon</option>
                                                         <option value="Très bon">Très bon</option>
                                                    </select>
                                                </div>
                                                <div class="one-half">
                                                        <label>Production orale <span style="color: red;">(*)</span></label>
                                                        <select name="Prodorale">
                                                            <option selected >Sélectionnez</option>
                                                             <option value="Débutant" >Débutant</option>
                                                             <option value="Moyen">Moyen</option>
                                                             <option value="Bon">Bon</option>
                                                             <option value="Très bon">Très bon</option>
                                                        </select>
                                                 </div>
                                            </div>
                                            <div class="f-row">
                                                <div class="one-half">
                                                    <label>Compréhension écrite<span style="color: red;">(*)</span></label>
                                                    <select name="Comprecrite" >
                                                        <option selected >Sélectionnez</option>
                                                         <option value="Débutant" >Débutant</option>
                                                         <option value="Moyen">Moyen</option>
                                                         <option value="Bon">Bon</option>
                                                         <option value="Très bon">Très bon</option>
                                                    </select>
                                                </div>
                                                <div class="one-half">
                                                        <label>Production écrite <span style="color: red;">(*)</span></label>
                                                        <select name="Prodecrite">
                                                            <option selected >Sélectionnez</option>
                                                             <option value="Débutant" >Débutant</option>
                                                             <option value="Moyen">Moyen</option>
                                                             <option value="Bon">Bon</option>
                                                             <option value="Très bon">Très bon</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="f-row">
                                                <p style="font-weight: bold;padding-left: 10px;font-size: 14px;">Anglais </p>
                                                <div class="one-half">
                                                    <label>Listening : <span style="color: red;">(*)</span></label>
                                                    <select name="Listening">
                                                        <option selected >Sélectionnez</option>
                                                         <option value="Débutant" >Débutant</option>
                                                         <option value="Moyen">Moyen</option>
                                                         <option value="Bon">Bon</option>
                                                         <option value="Très bon">Très bon</option>
                                                    </select>
                                                </div>
                                                <div class="one-half">
                                                        <label>Speaking : <span style="color: red;">(*)</span></label>
                                                        <select name="Speaking">
                                                            <option selected >Sélectionnez</option>
                                                             <option value="Débutant" >Débutant</option>
                                                             <option value="Moyen">Moyen</option>
                                                             <option value="Bon">Bon</option>
                                                             <option value="Très bon">Très bon</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="f-row">
                                                <div class="one-half">
                                                    <label>Reading : <span style="color: red;">(*)</span></label>
                                                    <select name="Reading">
                                                        <option selected >Sélectionnez</option>
                                                         <option value="Débutant" >Débutant</option>
                                                         <option value="Moyen">Moyen</option>
                                                         <option value="Bon">Bon</option>
                                                         <option value="Très bon">Très bon</option>
                                                    </select>
                                                </div>
                                                <div class="one-half">
                                                        <label>Writing : <span style="color: red;">(*)</span></label>
                                                        <select name="Writing">
                                                            <option selected >Sélectionnez</option>
                                                             <option value="Débutant" >Débutant</option>
                                                             <option value="Moyen">Moyen</option>
                                                             <option value="Bon">Bon</option>
                                                             <option value="Très bon">Très bon</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <p style="font-weight: bold;padding-left: 10px;padding-bottom: 10px;font-size: 14px; color: red;">EXPERIENCE </p>
                                            <div class="f-row">
                                                <div class="one-half">
                                                    <label >Emploi occupé ?  <span style="color: red;">(*)</span></label>
                                                    <input type="text" name="emploi" class="validate" placeholder="" required>
                                                </div>
                                                <div class="one-half">
                                                    <label >Combien d'année d’expérience ? <span style="color: red;">(*)</span></label>
                                                    <input type="text" name="experience" class="validate" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="f-row">
                                                <div class="one-half"> 
                                                    <label >Combien de mois déclaré (légal) ?  <span style="color: red;">(*)</span></label>
                                                        <input type="text" name="legal" class="validate" placeholder="" required >
                                                </div>
                                            </div>    
                                            <br>
                                                <div class="for-sos ">
                                                <h4>SECTION DE LA CONJOINTE / DU CONJOINT S'IL YA LIEU</h4>
                                                </div>
                                                <p style="font-weight: bold;padding-left: 10px;padding-bottom: 10px;font-size: 14px; color: red;">LANGUES </p> 
                                                <div class="f-row">
                                                    <div class="one-half">
                                                        <label>Niveau français : <span style="color: red;">(*)</span></label>
                                                        <select name="français">
                                                            <option selected >Sélectionnez</option>
                                                             <option value="Débutant" >Débutant</option>
                                                             <option value="Moyen">Moyen</option>
                                                             <option value="Bon">Bon</option>
                                                             <option value="Très bon">Très bon</option>
                                                        </select>
                                                    </div>
                                                    <div class="one-half">
                                                        <label>Niveau Anglais : <span style="color: red;">(*)</span></label>
                                                        <select name="anglais">
                                                            <option selected >Sélectionnez</option>
                                                             <option value="Débutant" >Débutant</option>
                                                             <option value="Moyen">Moyen</option>
                                                             <option value="Bon">Bon</option>
                                                             <option value="Très bon">Très bon</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <p style="font-weight: bold;padding-left: 10px;padding-bottom: 10px;font-size: 14px; color: red;">EXPERIENCE </p>
                                                <div class="f-row">
                                                    <div class="one-half">
                                                        <label >Emploi occupé ?  <span style="color: red;">(*)</span></label>
                                                        <input type="text" name="emploi1" class="validate" placeholder="" required>
                                                    </div>
                                                    <div class="one-half">
                                                        <label >Combien d'année d’expérience ? <span style="color: red;">(*)</span></label>
                                                        <input type="text" name="experience1" class="validate" placeholder="" required>
                                                    </div>
                                                </div>
                                                <div class="f-row">
                                                    <div class="one-half"> 
                                                        <label >Combien de mois déclaré (légal) ?  <span style="color: red;">(*)</span></label>
                                                            <input type="text" name="legal1" class="validate" placeholder="" required >
                                                    </div>
                                                </div>
                                                <p style="font-weight: bold;padding-left: 10px;padding-bottom: 9px;font-size: 14px; color: red;">PERSONNE (S) À CHARGE </p>
                                                <div class="f-row">
                                                    <div class="one-half">
                                                        <label >Combien avez-vous d'enfants ?  <span style="color: red;">(*)</span></label>
                                                        <select name="enfants">
                                                            <option selected >Sélectionnez</option>
                                                             <option value="1" >1</option>
                                                             <option value="2">2</option>
                                                             <option value="3">3</option>
                                                             <option value="4">4</option>
                                                             <option value="Plus">Plus</option>
                                                        </select>
                                                    </div>
                                                    <div class="one-half">
                                                        <label >L'age des enfants séparer par des vérgules ? <span style="color: red;">(*)</span></label>
                                                        <input type="number" name="ageenf" class="validate" placeholder="" required>
                                                    </div>
                                                </div> 
                                                <div class="for-sos">
                                                    <h4>Etudes</h4>
                                                </div>  
                                                <div class="f-row">
                                                    <div class="one-half">
                                                        <label>Avez-vous obtenus des diplômes? <span style="color: red;">(*)</span></label><br>
                                                        <input type="radio" name="form[radio]" id="r1" value="OUI" onClick="getResults()">
                                                            <label for="radio0">  Oui</label>
                                                        <input type="radio" name="form[radio]"  id="r2" value="Non">
                                                            <label for="radio1">  Non</label>
                                                    </div>
                                                    <div class="one-half">
                                                    <div class="text">
                                                        <label >Votre niveaux d'étude : <span style="color: red;">(*)</span></label>
                                                        <select  name="niveaux">
                                                            <option selected >Sélectionnez</option>
                                                            <option value="Primaire" >Primaire</option>
                                                            <option value="secondaire">secondaire</option>
                                                            <option value="niveau bac">niveau bac</option>
                                                            <option value="Bac">Bac</option>
                                                            <option value="bac+ 2">bac+ 2</option>
                                                            <option value="bac +3">bac +3</option>
                                                            <option value="Master">Master</option>
                                                            <option value="Doctorat">Doctorat</option>
                                                        </select>
                                                    </div></div>
                                                </div>
                                                <div class="f-row">
                                                    <div class="text">
                                                    <div class="one-half">
                                                        <label >Spécialité : <span style="color: red;">(*)</span></label>
                                                        <input type="text" class="validate" id="specialie" name="specialie"  placeholder="Votre Spécialité svp" required>
                                                    </div>
                                                    <div class="one-half">
                                                        <label >Date d’obtention : <span style="color: red;">(*)</span></label>
                                                        <input type="date" name="dateob" class="validate" id="date"  value="2020-07-22" required>

                                                    </div></div>
                                                </div>
                                                <div class="f-row">
                                                    <div class="text">
                                                    <div class="one-half">
                                                        <label>Type diplôme : <span style="color: red;">(*)</span></label><br>
                                                        <input name="form[Type]" type="radio" value="privée" id="Type0">
                                                            <label for="Type0">  privée</label>
                                                        <input name="form[Type]" type="radio" value="privée accrédité" id="Type1">
                                                            <label for="Type1">  privée accrédité</label>
                                                        <input name="form[Type]" type="radio" value="public" id="Type2">
                                                            <label for="Type2">  public</label>    
                                                    </div></div>
                                                </div>
                                                <div class="f-row">
                                                    <div class="one-half">
                                                        <label>Votre conjoint(e) s'il y a lieu à t il obtenue des diplômes ? <span style="color: red;">(*)</span></label><br>
                                                        <input type="radio" name="form[conjoint]" id="conj1" value="OUI" onClick="getResults()">
                                                            <label for="conjoint0">  Oui</label>
                                                        <input type="radio" name="form[conjoint]"  id="conj2" value="Non">
                                                            <label for="conjoint1">  Non</label>
                                                    </div></div>    
                                                    <div class="one-half">
                                                        <div class="conjoint">
                                                        <label >Son niveau d'étude : <span style="color: red;">(*)</span></label>
                                                        <select name="niveau1">
                                                            <option selected >Sélectionnez</option>
                                                            <option value="Primaire" >Primaire</option>
                                                            <option value="secondaire">secondaire</option>
                                                            <option value="niveau bac">niveau bac</option>
                                                            <option value="Bac">Bac</option>
                                                            <option value="bac+ 2">bac+ 2</option>
                                                            <option value="bac +3">bac +3</option>
                                                            <option value="Master">Master</option>
                                                            <option value="Doctorat">Doctorat</option>
                                                        </select>
                                                    </div></div>
                                                </div>
                                                <div class="f-row">
                                                    <div class="conjoint">
                                                    <div class="one-half">
                                                        <label >Date d’obtention : <span style="color: red;">(*)</span></label>
                                                        <input type="date" name="dateob1" class="validate" id="date"  value="2020-07-22" required>
                                                        </div>
                                                    <div class="one-half">
                                                        <label>Type diplôme : <span style="color: red;">(*)</span></label><br>
                                                        <input name="form[Typee]" type="radio" value="privée" id="Typee0">
                                                            <label for="Typee0">  privée</label>
                                                        <input name="form[Typee]" type="radio" value="privée accrédité" id="Typee1">
                                                            <label for="Typee1">  privée accrédité</label>
                                                        <input name="form[Typee]" type="radio" value="public" id="Typee2">
                                                            <label for="Typee2">  public</label>
                                                    </div></div>
                                                </div>
                                                <div class="f-row">
                                                    <div class="one-half">
                                                    <label>Avez-vous des stages dans le cadre de vos études ? <span style="color: red;">(*)</span></label><br>
                                                        <input type="radio" name="stages" id="stage1" value="OUI" onClick="getResults()">
                                                            <label for="stages1">  Oui</label>
                                                        <input type="radio" name="stages" id="stage2" value="Non">
                                                            <label for="stages0">  Non</label>
                                                    </div>
                                                    <div class="one-half">
                                                        <div class="stage">
                                                            <label >Domaine : <span style="color: red;">(*)</span></label>
                                                            <input type="text" class="validate" id="domaine" name="domaine" placeholder="informatique (par exemple)" required>
                                                    </div></div>
                                                </div>
                                                <div class="f-row">
                                                    <div class="stage">
                                                    <div class="one-half">
                                                        <label >La période : <span style="color: red;">(*)</span></label>
                                                        <input type="text" class="validate" id="periode" name="periode" placeholder="3 moins (par exemple)" required>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="f-row">
                                                    <div class="one-half">
                                                    <label>Avez-vous de la famille au Canada ?  <span style="color: red;">(*)</span></label><br>
                                                        <input type="radio" name="famille" id="fami1" value="OUI" onClick="getResults()">
                                                            <label for="famille1">  Oui</label>
                                                        <input type="radio" name="famille" id="fami2" value="Non">
                                                            <label for="famille0">  Non</label>
                                                    </div>
                                                    <div class="one-half">
                                                        <div class="famille">
                                                            <label >c'est qui ? : <span style="color: red;">(*)</span></label>
                                                            <input type="text" id="famille" name="famille" class="validate" placeholder="" required>
                                                    </div></div>
                                                </div>
                                                    
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <i class="waves-effect waves-light btn-large waves-input-wrapper" style=""><input name="submit" type="submit" class="waves-button-input"></i>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <!--SECTION END-->

   <!--HEADER SECTION-->
     <!-- FOOTER -->
     <section class="wed-hom-footer">
        <div class="container">
            <div class="row wed-foot-link-1">
                <div class="col-md-4 foot-tc-mar-t-o">
                    <h4>Entrer en contact</h4>
                    <p>Adresse: Hay AL Qods Bd . Al Maqdiss Résidence LASFAR Immeuble 6, 
                        <br>Bureau 3 (2 éme étage) Oujda.</p>
                    <p>Téléphone: <a href="tel:+212536702170">+212-5367-02170</a></p>
                    <p>Email: <a href="mailto:bestcanada@hotmail.ca">info@bestcanada.com</a></p>   
                </div>
                <div class="col-md-4">
                    <h4>À propos de Best Canada</h4>
				<p>Notre système d'évaluation évalue vos chances pour immigrer au Canada. Nous sommes conscients de l'importance d'un tel projet d'immigration pour chacun de nos clients.</p>
                </div>
                <div class="col-md-4">
                    <h4>SOCIAL MEDIA</h4>
                    <ul>
                        <li><a href="https://www.facebook.com/bestcanadaimmigration.ca"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        <li><a href="mailto:bestcanada@hotmail.com"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                        </li>
                        <li><a href="https://www.instagram.com/best_canada_immigration/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <!-- COPY RIGHTS -->
    <section class="wed-rights">
        <div class="container">
            <div class="row">
                <div class="copy-right">
                    <p>Copyright © 2021, BEST CANADA. All rights reserved. </p>
                </div>
            </div>
        </div>
    </section>

    <!--Import jQuery before materialize.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
<script>
    setTimeout(function(){
        $('.loader_bg').fadeToggle();
    }, 1500);
</script>
<script>
    $(document).ready(function () {
    $(".text").hide();
    $("#r1").click(function () {
        $(".text").show();
    });
    $("#r2").click(function () {
        $(".text").hide();
    });
});
$(document).ready(function () {
    $(".conjoint").hide();
    $("#conj1").click(function () {
        $(".conjoint").show();
    });
    $("#conj2").click(function () {
        $(".conjoint").hide();
    });
});
$(document).ready(function () {
    $(".stage").hide();
    $("#stage1").click(function () {
        $(".stage").show();
    });
    $("#stage2").click(function () {
        $(".stage").hide();
    });
});
$(document).ready(function () {
    $(".famille").hide();
    $("#fami1").click(function () {
        $(".famille").show();
    });
    $("#fami2").click(function () {
        $(".famille").hide();
    });
});
   </script>
    <script src="js/intlTelInput.js"></script>
    <script>
      var input = document.querySelector("#phone");
      window.intlTelInput(input, {

        utilsScript: "js/utils.js",
      });
    </script>
   <script>

    function showDiv(divID)
    {
        var div = document.getElementById(divID);
        div.style.display = ""; 
    }
    
    function hideDiv(divID)
    {
        var div = document.getElementById(divID);
        div.style.display = "none"; 
    }
    function hideAllDivs()
    {
        var selectMenu = document.getElementById("selectMenu");
        for (var i=0; i<=selectMenu.options.length -1; i++)
        {
            hideDiv(selectMenu.options[i].value);
        }
    }
    
    function toggle(showID)
    {
        hideAllDivs(); 
        showDiv(showID);
    
    }
    </script>
    
    <script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>



</html>