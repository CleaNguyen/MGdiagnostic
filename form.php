<?php 

    $error = ""; $successMessage = "";
    
    if ($_POST) {

        if (!$_POST["email"]) {

            $error .= "Une adresse e-mail valide est requise.<br>";
        }

        if (!$_POST["content"]) {

            $error .= "Merci d'indiquer votre demande.<br>";
        }

        if (!$_POST["telephone"]) {

            $error .= "Un numéro de téléphone valide est requis.<br>";
        }

        if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {

            $error .= "Votre adresse e-mail est invalide.<br>";
        }

        if ($error != "") {
            $error = '<div class="alert alert-danger" role="alert"><p>
                Votre demande n\a pas pu être envoyée en raison des erreurs suivantes:</p>' . $error . '</div>';

        } else {
            
          

            $emailTo = "clea-nguyen@hotmail.fr";

            $subject = "Nouveau message depuis votre site internet";

            $content = $_POST['content'];
            
            $headers = "From: ".$_POST['email'];

            if (mail($emailTo, $subject, $content, $headers)) {

                $successMessage = '<div class="alert alert-success" role="alert"> Votre message a bien été envoyé, nous reviendrons vers vous dans les plus brefs délais.</div>';
            } else {

                $error = '<div class="alert alert-danger" role="alert" <p>Votre message n\'a pas pu être envoyé, merci d\'essayer ultérieurement.</p></div>';

            }
        }

    }

?>
