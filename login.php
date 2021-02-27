
<link href="libs/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="libs/bootstrap.min.js"></script>
<script src="libs/jquery.min.js"></script>
<link rel="stylesheet" href="style.css">
<img id="icon" src="ressources/logo.png">

<meta charset="UTF-8" />
<title>Login</title>
 <div class="wrapper">
   <div id="formContent">
     <form action="login.php" method="post">
       <input type="text" id="login" name="login" placeholder="Login">
       <input type="password" id="password" name="password" placeholder="Mot de Passe">
         <?php
           $true_password =  file_get_contents( "password.txt" );
           // Enleve les espaces
           $true_password = preg_replace('/\s+/', '', $true_password);

           if( isset($_POST['password'])) {
                $password = $_POST['password'];
                //echo "POST: '" . $password."'";
                //echo "Fichier: '" . $true_password."'";
                if (!empty($password)) {
                  if (strcmp($password, $true_password) != 0) {
                     echo "<div class=\"alert alert-danger\"> Mauvais mot de passe !</div>";
                     echo "<script>localStorage.setItem(\"login\", \"yes\");</script>";
                   }
                   else {
                     echo "<script>localStorage.setItem(\"login\", \"yes\");</script>";
                     header('Location:success.php?mdp='.$true_password);
                   }
                }
           }
         ?>
       <input type="submit" value="Log In">
     </form>
     <a href="changemdp.php">Créer mon compte</a>
   </div>
