<?php


$message = 'TKT BRO';

if(mail('rhode97@live.fr', 'Mon Sujet', $message)){
	echo 'OK';
}
else{
	echo 'KO';
}


// $header="MIME-Version: 1.0\r\n";
//     $header.='From:"PrimFX.com"<support@primfx.com>'."\n";
//         $header.='Content-Type:text/html; charset="uft-8"'."\n";
//         $header.='Content-Transfer-Encoding: 8bit';
// $message='
//     <html>
//         <body>
//             <div style="text-align:center;">
//                 <a href="http://127.0.0.1/Tutos%20PHP/%2314%20%28Espace%20membre%29/confirmation.php?pseudo='.urlencode($lastname).'&key='.$_POST['pass'].'">Confirmez votre compte !</a>
//             </div>
//         </body>
// 	</html>
//         ';
// mail($email, "Confirmation de compte", $message, $header);
// $erreur = "Votre compte a bien été créé !";

// echo $erreur;