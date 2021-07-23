<?php

require 'PHPMailer/PHPMailerAutoload.php';

if(!empty($_POST['submit'])){
 $nom = $_POST["nom"];
 $email = $_POST["email"];
 $message = $_POST['message'];

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
		$this->Cell(276,5,'Formulaire de parrainage',0,0,'C'); 
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
$pdf->SetFont('Times','',12);
$pdf->Cell(30,10,utf8_decode('Le Nom : '),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['nom']),0, 1, 'C'); 
$pdf->Cell(30,10,utf8_decode('Email : '),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['email']),0, 1, 'C');
$pdf->Cell(30,10,utf8_decode('canadien ou résident '),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['famille']),0, 1, 'C'); 
if(isset($_POST['message'])){
    if($_POST['message'] == null ) {
}else{ 
$pdf->Cell(30,10,utf8_decode('Le Message : '),0, 0, 'L');
$pdf->Cell(80,10,utf8_decode($_POST['message']),0, 1, 'C'); 
} }
$pdf->Ln();
$pdfdoc = $pdf->Output('', 'S');

       if ($mail->addReplyTo($_POST['email'], $_POST['nom'])) {
        $mail->Subject = 'Formulaire Parrinage'; 


        $mail->isHTML(true);

    $mail->Body = "$nom a remplit ce formulaire en utilisant cet email : $email";


    $mail->addStringAttachment($pdfdoc, 'formulaire.pdf');


   //Send the message, check for errors
        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            
            $msg = 'Sorry, something went wrong. Please try again later.';
        } else {
            header("Refresh:5; url=formpar.php");	
            $alert = '<div class="alert-success">
            <span>Merci ! Votre Formulaire a été bien envoyer.</span>
           </div>';
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
                                        <h4>Formulaire Parrainage</h4>
                                    </div>
                                    <div class="tab-inn">
                                        <form  method="POST" action="formepar_message.php" id="myForm">
                                            <div class="f-row">
                                                <div class="one-half">
                                                    <label >Nom : <span style="color: red;">(*)</span></label>
                                                    <input name="nom" type="text" class="validate"  id="nom" placeholder="Votre Nom svp" required>
                                                </div>
                                                <div class="one-half">
                                                    <label>Email Id: <span style="color: red;">(*)</span></label>
                                                        <input name="email" type="email" class="validate" id="email"  placeholder="Votre Email svp" required>
                                                </div>
                                            </div>
                                            
                                            <div class="f-row">
                                                <label style="padding-left: 10px;" >Dans votre famille, qui est citoyen canadien ou résident permanent canadien? <span style="color: red;">(*)</span></label>
                                                <div class="one-half">
                                                    
                                                    <input name="famille" type="text" class="validate" id="famille"  placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="f-row">
                                                <div class="one-half">
                                                    <label>Message :</label>
                                                    <textarea name="message" id="message" class="validate" placeholder="" ></textarea>
                                                </div>
                                            </div>
    
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <i class="waves-effect waves-light btn-large waves-input-wrapper" style=""><input type="submit" name="submit" class="waves-button-input"></i>
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
                        <li><a href="mailto:bestcanada@hotmail.ca"><i class="fa fa-envelope" aria-hidden="true"></i></a>
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