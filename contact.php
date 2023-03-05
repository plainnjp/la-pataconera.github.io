
<?php
    //Die E-Mail Adresse, an die die Kontaktanfragen gesendet werden
    $empfaenger = "noep@outlook.de";
    if(isset($_REQUEST["submit"])){
        if(empty($_REQUEST["name"]) || empty($_REQUEST["email"]) || empty($_REQUEST["nachricht"])){
            $error = "Bitte f&uuml;llen Sie alle Felder aus";
        }
        else{
            //Text der E-Mail Nachricht
            $mailnachricht="Sie haben eine Anfrage über ihr Kontaktformular erhalten:\n";
            $mailnachricht .= "Name: ".$_REQUEST["name"]."\n".
                      "E-Mail: ".$_REQUEST["email"]."\n".
                      "Datum: ".date("d.m.Y H:i")."\n".
                      "\n\n".$_REQUEST["nachricht"]."\n";            
            //Betreff der E-Mail Nachricht
            $mailbetreff = "Kontaktanfrage ".$_REQUEST["betreff"]." (".$_REQUEST["email"].")";
            //Hier wird die E-Mail versendet
            if(mail($empfaenger, $mailbetreff, $mailnachricht)){
                //Text den der Seiten Besucher nach dem Versand sieht
                $success = "Wir haben Ihre Anfrage erhalten und werden sie so schnell wie möglich bearbeiten. <br>";
            }
            else{
                $error = "Beim Versenden Ihrer Anfrage ist ein Fehler aufgetreten! Versuchen Sie es bitte später nocheinmal.";
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="/images/favicon_2160px.png">
        <link rel="stylesheet" href="./style/style.css">
        <title>La Pataconera</title>
    </head>

    <body>
        <header>
            <div class="logo">
                <a href="./index.html">
                    <img src="./images/njp_logo_gross.png" alt="Bildmarke von La Pataconera">
                </a>
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="https://noeplain.ch/">noeplain.ch</a>
                    </li>
                    <li>
                        <a href="./la-pataconera/">la-pataconera</a>
                    </li>
                    <li>
                        <a href="./contact.php">Contact</a>
                    </li>
                </ul>
            </nav>
        </header>

        <a class="h1a" href="./services.html">
            
        </a>

        <main>
            <div class="page">
                <h1>Contact</h1>

                <?php if(isset($success)){
            echo "<div>".$success."</div>"; 
        } 
        else { ?>

                <form action="">
                    <input class="block" id="name" name="name" type="text" placeholder="Vorname" required>
                    <input class="block" id="email" name="email" type="email" placeholder="Mail" required>
                    <input class="block" id="betreff" name="betreff" type="text" placeholder="Betreff" required>
                    <textarea id="nachricht" name="nachricht" placeholder="Dein Anliegen" class="block" rows="10" required></textarea>
                    <input class="submit" type="submit" name="submit">
                </form>
                <script>

            function validateForm(){
                var form = document.getElementById("kontaktform");
                return form.checkValidity();
            }
        </script>
        <?php 
        } 
        if(isset($error)){
            echo '<div class="error">'.$error.'</div>'; 
        } ?>
            </div>
        </main>

        <footer>
            <a href="./index.html">
                <img src="./images/njp_logo_gross.png" alt="Logo von Noé Jérémie Plain. Es besteht aus einem N, J und P">
                <h3 style="color: #E4D1FF;">Noé Jérémie Plain</h3>
            </a>        </footer>
    </body>
</html>