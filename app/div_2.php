<?php    
         // creation d'une session pour voir la serie de l'utilisateur
         session_start();

    if (isset($_SESSION["user_name"]) && isset($_SESSION["profil"]) ){
        $user_name = $_SESSION["user_name"];
        $profil= $_SESSION['profil'];
        $tab_name = explode(" ",$user_name);
        $user_name = $tab_name[0];
    }else{
        $user_name = "Mon profil";
    }



?>
        <div class="content_2" id="content_2" style="position: relative;">
            <span class="back" id="back"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8333333333333333" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left-icon lucide-arrow-left"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg></span>
            <div class="profile" align="center">
                <div class="user_log" align="center" style="background-color: transparent;"><img src="<?php echo htmlspecialchars("/".$profil) ?>" name="logo_profile" class="logo_profile" alt=""><br>
                   <span style="border: none;background-color: transparent;font-size: 40px;"><?php echo htmlspecialchars($user_name)?></span></div>
               
            </div>
            <div class="theme">

                        <ul style="background-color: transparent;">
                         <li id="moon" style="cursor: pointer;" class="thème">Thème sombre
                        </li>
                        <li id="sun" class="thème">thème clair
                        </li>

                    </ul>
            </div>
        </div>