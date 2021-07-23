<?php


require 'PHPMailer/PHPMailerAutoload.php';

if ($_SERVER['REQUEST_METHOD'] === "POST");
if(!empty($_POST['submit'])){
$sujet    = $_POST['sujet'];
$name     = $_POST['name'];
$email    = $_POST['email'];
$phone    = $_POST['phone'];
$comments = $_POST['comments'];
}


function isEmail($email) { 
	return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email));		
}

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

if(trim($name) == '') {
	echo '<div class="error_message">Attention! You must enter your name.</div>';
	exit();
} else if(trim($email) == '') {
	echo '<div class="error_message">Attention! Please enter a valid email address.</div>';
	exit();
} else if(!isEmail($email)) {
	echo '<div class="error_message">Attention! You have enter an invalid e-mail address, try again.</div>';
	exit();
}


if(trim($comments) == '') {
	echo '<div class="error_message">Attention! Please enter your message.</div>';
	exit(); 
}

if(get_magic_quotes_gpc()) {
	$comments = stripslashes($comments);
}


$address = "bestcanadaim@hotmail.com";


// Configuration option.
// You can change this if you feel that you need to.
// Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.
		
$e_body = "Vous avez été contacté par $name en utilisant ce numéro: $phone, leur message supplémentaire est le suivant: <br>" . PHP_EOL . PHP_EOL;
$e_content = "\"$comments\" <br>" . PHP_EOL . PHP_EOL;
$e_reply = "Vous pouvez contacter $name par e-mail: $email";
		
$msg = wordwrap( $e_body . $e_content . $e_reply, 70 );



$mail = new PHPMailer(true);
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
   
   $mail->IsHTML(true);
   $mail->From=$email;
   $mail->FromName=$name;
   $mail->Sender=$email;
   $mail->addAddress($address);
   $mail->addReplyTo($email, $name);
   $mail->Subject = $sujet; 
   $mail->Body = $msg;


        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            
            $msg1 = 'Sorry, something went wrong. Please try again later.';
        } else {
            	header("Refresh:5; url=contact-us.php");
	$alert = "<div class='alert-success'>
			 <h6>E-mail envoyé avec succès.</h6>
			 <p>Merci $name, votre message nous a été envoyé.</p><br></div>";
        }

}

catch (Exception $e){
    $alert = '<div class="alert-error">
    <span>'.$e->getMessage().'</span>
  </div>';
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

<body>

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
        <div class="container com-sp pad-bot-70">
            <div class="row">
                <div class="cor about-sp">
                    <div class="ed-about-tit">
                        <div class="con-title">
						<ul><li class="page-back" style="list-style-type: none;"><?php echo $alert;?> 
                            </li></ul><br>
                            <h2>Nous <span>  Contacter</span></h2>
                            <p>Nous pouvons être contactés par téléphone pendant les heures d'ouverture locales à notre bureau principal.</p>
                        </div>
                    </div>
                    <div class="pg-contact">
                        <div class="col-md-3 col-sm-6 col-xs-12 new-con new-con1">
                            <h4 style="color: red;">Canada :</h4>
                            <p>2 – 5749 Grande- Allée
                            <br>J4Z 3G4 Brossard 
                            <br> Québec Canada</p>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 new-con new-con1"> <img src="img/contact/1.html" alt="">
                            <h4>Maroc :</h4>
                            <p>Hay AL Qods Bd . Al Maqdiss Résidence El KOÏ Immeuble 6
                            <br>Bureau 3 (2 éme étage) Oujda</p>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 new-con new-con3"> <img src="img/contact/2.html" alt="">
                            <h4>CONTACT INFO</h4>
                            <p> <a href="tel:+212536702170" class="contact-icon">Téléphone fixe : 0536702170</a>
                                <br> <a href="tel:+212536712171" class="contact-icon">Faxe : 0536712171</a>
                                <br> <a href="mailto:bestcanada@hotmail.ca" class="contact-icon">Email: info@bestcanada.com</a> </p>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 new-con new-con4"> <img src="img/contact/3.html" alt="">
                            <h4>Site Internet</h4>
                                <p> <a href="http://bestcanadaimmigration.ma/">Website: bestcanadaimmigration</a>
                                <br> <a href="https://www.facebook.com/bestcanadaimmigration.ca">Facebook: bestcanadaimmigration</a>
                                <br> <a href="https://www.instagram.com/best_canada_immigration/">Instagram: bestcanadaimmigration</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--SECTION END-->

    <section id="map">
        <div class="row contact-map">
            <!-- IFRAME: GET YOUR LOCATION FROM GOOGLE MAP -->
            <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAJLOvaXUscyndI3qBkTMf8SWWhKrp_JpY
            &q=Bureau+Best+Canada+Immigration,Oujda+Maroc" allowfullscreen=""></iframe>
            <div class="container">
                <div class="overlay-contact footer-part footer-part-form">
                    <div class="map-head">
                        <h4>ENVOYEZ-NOUS MAINTENANT</h4></div>
                    <!-- ENQUIRY FORM -->
                    <form method="post" action="contact_form_message.php" >
                        <ul>
                        <div id="message"></div>
                            <li class="col-md-6 col-sm-6 col-xs-12 contact-input-spac">
                                <input type="text" name="sujet" value="" placeholder="Sujet" required=""> </li>
                            <li class="col-md-6 col-sm-6 col-xs-12 contact-input-spac">
                                <input type="text" name="name" value="" placeholder="Nom" required=""> </li>
                            <li class="col-md-6 col-sm-6 col-xs-12 contact-input-spac">
                                <input type="email" name="email" value="" placeholder="E-mail" required=""> </li>
                            <li class="col-md-6 col-sm-6 col-xs-12 contact-input-spac">
                                <input type="phone" name="phone" value="" placeholder="Téléphone" required=""> </li>
                            <li class="col-md-12 col-sm-12 col-xs-12 contact-input-spac">
                                <textarea name="comments"  required="" placeholder="Votre message"></textarea>
                            </li>
                            <li class="col-md-6">
                            <input type="submit" value="Envoyer" id="submit" name="submit" class="btn color medium " />
                                 </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </section>

<!--HEADER SECTION-->
     <!-- FOOTER -->
     <section class="wed-hom-footer">
        <div class="container">
            <div class="row wed-foot-link-1">
                <div class="col-md-4 foot-tc-mar-t-o">
                    <h4>Entrer en contact</h4>
                    <p>Adresse: Hay AL Qods Bd . Al Maqdiss Résidence El KOÏ Immeuble 6, 
                        <br>Bureau 3 (2 éme étage) Oujda.</p>
                    <p>Téléphone: <a href="tel:+212536702170">+212-5367-02170</a></p>
                    <p>Email: <a href="mailto:bestcanada@hotmail.com">info@bestcanada.com</a></p>   
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
                    <p>Copyright © 2021, BEST CANADA. Tous les droits sont réservés. </p>
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
    <script src="js/main.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/custom.js"></script>
</body>



</html>