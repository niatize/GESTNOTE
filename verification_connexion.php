<?php
    session_start();
    require_once("data_base.php");// Chargement des fichiers de PHPMailer (Ajustez les chemins selon votre dossier)
    include_once("vendor/autoload.php");
    try{
        if(isset($_SESSION["user_name"]) && !empty($_SESSION["user_name"] && isset($_SESSION["profil"]) && !empty($_SESSION['profil']))){
            $user_name = $_SESSION["user_name"];
            $logo = $_SESSION['profil'];
            $sql = $pdo->prepare('SELECT email FROM user WHERE full_name = :full_name');
            $sql->execute(array("full_name"=>$user_name));
            $email = $sql->fetch(PDO::FETCH_ASSOC);
            $email_cript = null;
            if($email){
                $email = trim($email["email"]);
                $nombre = mb_strlen($email);
                $email_cript = $email;
                for($i=2;$i<=$nombre-11;$i++){
                    $email_cript[$i]="*";
                }
            }
        }else{
            header("location:connexion.php");
            exit();
        }
    }catch(PDOException $e){
        die("Erreur de la requette ala ligne :".$e->getLine()."message d'erreur :".$e->getMessage());
    }
    $_SESSION["profil"]=$logo;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vérification du mot de pass</title>
    <link rel="stylesheet" href="css/header_footer.css">
    <link rel="stylesheet" href="css/header_responsive copy.css">
    <link rel="stylesheet" href="css/vérif_connexion.css">
    <link rel="stylesheet" href="css/verif_connexion_responsive.css">
</head>
<body>
     <header>
        <?php require_once("header.php") ?>
     </header>

    <main>
        <div class="verif_container">
            <fieldset>
                <legend style="border:none" align="center">
                    <img src="<?php echo htmlspecialchars($logo)  ?>" name="user_profile" class="image" alt="">
                </legend>
                <p id="ferif_message"></p>
                <form action="#" method="post" align="center" id="form">
                    <table>
                        <thead>
                            <caption><h3>Entrer le code reçue a <span id="adresse" style="color: goldenrod;"> <?php echo $email_cript; ?></span> a fin que nous vérifions que c'est bien vous qui voullez vous connecter</h3></caption>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" placeholder="********" title="Entrer le mots de passe que nous vous avons envoyer par Email" required></td>
                            </tr>
                            <tr>
                                <td><p id="verif_coment"></p></td>
                            </tr>
                            <tr>
                                <td class="submit">
                                     
                                    <button type="submit" id="back" style="color: black;">Retour</button>
                                    <input type="submit" value="Verifier"></td>
                            </tr>
                        </tbody>
                    </table>                    
                </form>
            </fieldset>
        </div>
    </main>

    <footer >
        <p align="center" class="p">
            <span style="color: #00a2ff;font-weight: bolder">GESTNOTE</span> — Douala-Cameroun

                © create by NI PRO DEV 
        </p>
    </footer>


    <script src="JS/header.js" defer></script>
    <script src="JS/index.js" defer></script>
    <script src="JS/color_pages.js" defer></script>
    <script src="JS/verif_connection.js"></script>
</body>
</html> 

<?php 




?>