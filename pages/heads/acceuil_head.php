<?php 
session_start(); 
//if(isset($_SESSION['login_user']) && $_SESSION['pass_user'] != NULL)
//session_destroy();
?>





<head>
	<title>Help Soft</title>
	<link rel="stylesheet" type="text/css" href="pages/heads/acceuil.css">
	<meta charset="utf-8">
    <link rel="images/shortcut icon" type="img/png" href="images/Royality.png">
    <script type="text/javascript" src="jquery.js"></script> 


<div id="div_member">
     <H4 > <?php 
     if(isset($_SESSION['login']) && $_SESSION['password'] != NULL){
     echo 'Bienvenue Mr / Ma  : <br> <span id="nom_prenom"> '.$_SESSION['nom'].'  '.$_SESSION['prenom'] .'</span>';
     }else
     {
      ?>
       <script type="text/javascript"> $('#div_member').hide()</script>
      <?php
     }

     ;?></H4>    
  <!--   <a id="se_deco" href="index.php"> Se Deconnecter</a>  -->
     <button onclick="window.location.href='index.php'">Se Deconnecter</button>
</div>

</head>

