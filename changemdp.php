
<link href="libs/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="libs/bootstrap.min.js"></script>
<script src="libs/jquery.min.js"></script>
<link rel="stylesheet" href="style.css">
<img id="icon" src="ressources/logo.png">

 <div class="wrapper">
   <div id="formContent">
     <form action="changemdp.php" method="post">
       <input type="text" id="login" name="login" placeholder="Login">
       <input type="password" id="password1" name="password1" placeholder="Mot de Passe">
       <input type="password" id="password2" name="password2" placeholder="Répétez le mot de Passe">
         <?php
           $true_password =  file_get_contents( "password.txt" );
           // Enleve les espaces
           $true_password = preg_replace('/\s+/', '', $true_password);

           if( isset($_POST['password1']) && isset($_POST['password2'])) {
             $password1 = $_POST['password1'];
             $password2 = $_POST['password2'];

              if (strcmp($password1, $password2) == 0) {
                $file = 'password.txt';
                $current = file_get_contents($file);
                $current = $password1;
                file_put_contents($file, $current);
                echo "<div class=\"alert alert-success\"> Compte crée !</div>";
               }
               else {
                 echo "<div class=\"alert alert-danger\"> Mots de passe différents !</div>";
               }
           }
         ?>
       <input type="submit" value="Modifier">
     </form>
     <a href="login.php">Retour</a>
   </div>
