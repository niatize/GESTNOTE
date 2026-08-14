<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="css/header_footer.css">
    <link rel="stylesheet" href="css/header_responsive copy.css">
    <link rel="stylesheet" href="css/contact_responsive.css">
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>

     <header>
        <?php require_once("header.php") ?>
     </header>


    <main>
                <div class="container"><br>
                <fieldset id="form" class="child">
                    <legend align="center"><b>DECLAREZ NOUS VOTRE PROBLEME !</b></legend>
                   <form action="https://wa.me/237687043746?" target="_blank"><br>
                    <input type="text" placeholder="Nom complet" required><br><br>
                    <input type="email" placeholder="E-mail" required><br><br>
                    <input type="tel" placeholder="Numéro de téléphone" pattern="[0-9]{9}" title="Un numéro Camerounais à 9 chiffre" required><br><br>
                    <textarea name="message_utilisateur" id="" cols="50px"rows="5px" placeholder="Décrivez nous votre problème" required style="color: black;"></textarea><br><br>
                    <input type="submit"><br><br>
                   </form>
                </fieldset>
                </div>
            <div style="padding: 20px;"><p id="écriture"></p></div>

        <div class="contenus" style="background-color: rgba(0, 0, 0, 0.562);padding: 30px;">

               <a href="tel:+237687043746" class="email" target="_blank"> 
            <div class="content"> 
              <img src="image/telephone-number-svgrepo-com.svg" alt="appel" style="width: 40px;
              height: 50px;"> +237 687 04 37 46 <br>
            </div></a>
            <a href="https://wa.me/237687043746?text=bonjouur%20avous%20monsieur%20j'ai%20besoin%20d'aide" target="_blank" class="email">
            <div class="content">
                <img src="image/whatsapp-color-svgrepo-com.svg" alt="whatsapp"style="width: 40px;
              height: 50px;">+237 6 87 04 37 46
            </div></a>
            <a href="https://t.me/niatizepro" target="_blank"  class="email">
            <div class="content">
                <img src="image/telegram-svgrepo-com.svg" alt="telegram"style="width: 40px;
              height: 50px;"> +237 678 05 91 18
            </div></a>

            <a href="https://m.me/Dev contact" target="_blank" class="email">
            <div class="content">
                <img src="image/facebook-color-svgrepo-com.svg" alt="facebook" style="width: 40px;
              height: 50px; border-radius: 20px;">Dev contact
            </div></a>
            <a href="mailto:niatizepro@gmail.com" class="email">
            <div class="content">
                <img src="image/email-download-svgrepo-com.svg" alt="email"style="width: 40px;
              height: 50px; border-radius: 20px;">niatizepro@gmail.com
            </div></a>

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
    <script src="JS/contact.js"></script>
</body>
</html>