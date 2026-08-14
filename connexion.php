
<?php
    session_start();
    include_once("data_base.php");

    if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST["envoyer"])) {

        if(isset($_POST["user_name"]) && $_POST["password"]) {
            if(!empty($_POST["password"]) && !empty($_POST["user_name"])) {
                $password = $_POST["password"];
                $user_name = trim($_POST["user_name"]);

                try{
                    $sql = $pdo->prepare("SELECT full_name,pass_word,profil FROM user WHERE full_name = :full_name");
                    $sql->execute(array("full_name"=>$user_name));
                    $user = $sql->fetch(PDO::FETCH_ASSOC);
                    if($user["full_name"]== $user_name && password_verify($password,$user["pass_word"])){
                    $_SESSION["user_name"] = $user_name;
                    $_SESSION["profil"] = $user['profil'];    
                    header("location:verification_connexion.php");
                        exit();
                    }else{
                        echo " <script> alert('Echec!!: Nom d\'utilisateur ou mot de passe incorrect')</script>";
                    }
                }catch(PDOException $e){
                    die("Erreur:".$e->getMessage());
                }
            }
        }

    }

?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/header_footer.css">
    <link rel="stylesheet" href="css/header_responsive copy.css">
    <link rel="stylesheet" href="css/connexion.css">
    <link rel="stylesheet" href="css/connexion_responsive.css">
</head>
<body>
     <header>
        <?php require_once("header.php") ?>
     </header>
    <main>
    <div class="content_1" id="contenue_1" nitialisation de 1 sept. sur 01:00
    41 %
    utilisé>
            <fieldset class="fieldset">
                <legend align="center" style="border-radius: 50%;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="svg"
                    width="44" height="44" viewBox="0 0 24 24"
                     fill="none" stroke="#33d17a" stroke-width="2" 
                     stroke-linecap="round" stroke-linejoin="round"
                      class="lucide lucide-user-key-icon lucide-user-key">
                      <path d="M20 11v6"/><path d="M20 13h2"/>
                      <path d="M3 21v-2a4 4 0 0 1 4-4h6a4 4 0 0 1 2.072.578"/>
                      <circle cx="10" cy="7" r="4"/><circle cx="20" cy="19" r="2"/>
                    </svg>
                </legend>
                <form action="#" id="connexion_form" method="post">
                    <table>
                    <thead align="center"><th colspan="2" style="color: #00bbff;padding: 10px;margin :5px; font-weight: bolder; font-size: larger;">CONNECTEZ-VOUS</th></thead>
                        <tr>
                            <td><label for="user_name">Nom d'utilisateur:</label></td>
                            <td><input type="text" id="user_name" name="user_name" placeholder="nom utilisateur" required></td>
                        </tr>
                        <tr>
                            <td><label for="password">Mot de passe:</label></td>
                            <td><input type="password" id="password" name="password" placeholder="mot de passe" required></td>
                        </tr>
                        <tr>
                            <td><label for="loock_password">Voir le mot de passe</label></td>
                            <td><input type="checkbox" id="loock_password" name="loock_password" placeholder="mot de passe utilisateur"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                Je n'ai pas de compte ? <a href="#" id="a" >Créer un compte !</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <input type="submit" id="sub" value="SE CONNECTER" name="envoyer"></td>
                        </tr>
                    </table>
                            <div class="rotate" id="rotate"></div>
                </form>
            </fieldset>
    </div><br>


    </main>

    <footer >
        <p align="center">
            <span style="color: #00a2ff;font-weight: bolder">GESTNOTE</span> — Douala-Cameroun

                © create by NI PRO DEV 
        </p>
    </footer> 


    <script src="JS/header.js" defer></script>
    <script src="JS/index.js" defer></script>
    <script src="JS/color_pages.js" defer></script>
    <script src="JS/connexion.js" defer></script>
    <script src="JS/script.js"></script>
    <script src="JS/password.js"></script>
    <script src="JS/inscription.js"></script>
</body>
</html>