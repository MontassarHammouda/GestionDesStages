
<body>
<DIV id="skull">

<header> 

<div id="div_label_role"> 
Role : <br>
<?php  echo '<span id="span_label_role" >'.$_SESSION['role'].'</span>' ;  ?>
</div>

<nav>	
<il>
<li><a href="acceuil.php">Acceuil</a></li>
<li><a href="espace.php">Espace</a></li>
<li><a href="profil.php">Profil</a></li>
</il>
</nav>

</header>

<br><br>




<div id="ETAT_stage_membre">
	<h3 id="titre_Etat_du_stage">Etat du Stage</h3>
	<br> 


<?php
try
{ $bdd = new PDO('mysql:host=127.0.0.1;dbname=site_projet_fst', 'root', '');}
catch(Exception $e)
{ die('Erreur : '.$e->getMessage()); }
$trouve =$reponse = $bdd->query("SELECT  stg_accompli FROM stage WHERE id_eleve=".$_SESSION['id']   ); 

if ($trouve) { 
$_SESSION['stg_accompli']="Non";
while ($donnees = $reponse->fetch()){   $_SESSION['stg_accompli']= $donnees['stg_accompli'];  }
}else{$_SESSION['stg_accompli']="Non";}
$reponse->closeCursor();
?>


    <div class="box" id="gestion_etat_stage_membre">



<form  method="post" action="classes/valider_rep_stage.php" id="valider_rep_stage">   

<?php
try
{ $bdd = new PDO('mysql:host=127.0.0.1;dbname=site_projet_fst', 'root', '');}
catch(Exception $e)
{ die('Erreur : '.$e->getMessage()); }
$trouve =$reponse = $bdd->query("SELECT  id FROM stage WHERE id_eleve=".$_SESSION['id']   ); 

if ($trouve) { 
while ($donnees = $reponse->fetch())
{   
  ?>
  <input name="id_stg_rep" type="hidden" value="<?php echo $donnees['id'];?>">
  <?php
}
}else{$_SESSION['stg_accompli']="Non";}
$reponse->closeCursor();
?>

    Stage Accompli ?  :  <input type="text" id="rep_stg_accompli_non" value="<?php echo $_SESSION['stg_accompli'];?>" name="rep_stg_accompli"> 
    <input id="btn_confirmer" name="btn_confirmer" type="submit" value="Envoyer"><br/>
   
   </form>

    <button id="oui" name="oui" style="font-weight: bold;"  onClick=changeRepaOui() >Oui</button> 
    <button id="non" name="non" style="font-weight: bold;" onClick=changeRepaNon()  >Non</button>
  




<br/>


<script type="text/javascript">

if ( $('#rep_stg_accompli_non').val()=="Oui" ) {
  document.getElementById("rep_stg_accompli_non").id = "rep_stg_accompli_oui";
};


  function changeRepaOui(){    
  //if ( $('#rep_stg_accompli').val()=="Oui" ) {
       $('#rep_stg_accompli_non').val("Oui");
       document.getElementById("rep_stg_accompli_non").id = "rep_stg_accompli_oui";
  };

  function changeRepaNon(){    
  //if ( $('#rep_stg_accompli').val()=="Oui" ) {
       $('#rep_stg_accompli_oui').val("Non");
       document.getElementById("rep_stg_accompli_oui").id = "rep_stg_accompli_non";
  };

</script>



    <br/>
    <input id="btn1" type="button" value="Liste de Mes Stages" onClick="$('#div_mes_stages').slideToggle(1000);">
    <br/>

  <div id="div_mes_stages">

<table width="100%">
<tr>
<td>Domaine :</td> 
<td>Date debut :</td>
<td>Date fin :</td> 
<td>Note :</td> 
<td>id Prof :</td> 
<td>id Lieu :</td> 
</tr>

<?php  $_SESSION['mon_id_lieu'] ='0';
try
{ $bdd = new PDO('mysql:host=127.0.0.1;dbname=site_projet_fst', 'root', '');}
catch(Exception $e)
{ die('Erreur : '.$e->getMessage()); }
$trouve = $reponse = $bdd->query('SELECT  * FROM stage where id_eleve='.$_SESSION["id"]);
while ($donnees = $reponse->fetch()){  ?>
<tr>
 <td> <input type="text" value=" <?php echo $donnees['domaine']; ?>" disabled> 
 <td> <input type="text" value=" <?php echo $donnees['date_debut']; ?>" disabled> 
 <td> <input type="text" value=" <?php echo $donnees['date_fin']; ?>" disabled> 
 <td> <input type="text" value=" <?php echo $donnees['note']; ?>" disabled> 
 <td> <input type="text" value=" <?php echo $donnees['id_prof']; ?>" disabled> 
 <td> <input type="text" value=" <?php echo $donnees['id_lieu']; ?>" disabled> 
<?php  if($trouve){  $_SESSION['mon_id_lieu'] =  $donnees['id_lieu']; }  ?>  
</tr>

<?php }                       
$reponse->closeCursor();
?>

</table>
            <script type="text/javascript"> $('#div_mes_stages').hide(); </script>
        </div>
 
<br/>




 <input id="btn2" type="button" value="Liste de Mes Superviseurs" onClick="$('#div_mes_superviseurs').slideToggle(1000);">
  
   <br/>

  <div id="div_mes_superviseurs">

<table width="100%">
<tr>
<td>Id :</td> 
<td>Login :</td>
<td>Nom :</td> 
<td>Prenom :</td> 
<td>Email :</td> 
<td>Role :</td> 
</tr>

<?php
try
{ $bdd = new PDO('mysql:host=127.0.0.1;dbname=site_projet_fst', 'root', '');}
catch(Exception $e)
{ die('Erreur : '.$e->getMessage()); }
$reponse = $bdd->query("SELECT  user.id,user.login,user.nom,user.prenom,user.email,user.role FROM user,stage where user.role='professeur' and stage.id_eleve=".$_SESSION['id']);
while ($donnees = $reponse->fetch()){  ?>
<tr>
 <td> <input type="text" value=" <?php echo $donnees['id']; ?>" disabled> 
 <td> <input type="text" value=" <?php echo $donnees['login']; ?>" disabled> 
 <td> <input type="text" value=" <?php echo $donnees['nom']; ?>" disabled> 
 <td> <input type="text" value=" <?php echo $donnees['prenom']; ?>" disabled> 
 <td> <input type="text" value=" <?php echo $donnees['email']; ?>" disabled> 
 <td> <input type="text" value=" <?php echo $donnees['role']; ?>" disabled> 
</tr>

<?php }
$reponse->closeCursor();
?>

</table>
            <script type="text/javascript"> $('#div_mes_superviseurs').hide(); </script>
        </div>












  <br/>
  <input id="btn2" type="button" value="Liste des Camarades de Stages" onClick="$('#div_mes_camarades').slideToggle(1000);">
  <br/>
 <div id="div_mes_camarades">

<table width="100%">
<tr>
<td>Nom :</td> 
<td>Prenom :</td>
<td>Lieu :</td> 
<td>Date_debut :</td> 
<td>Date_fin :</td> 
<td>Id_Superviseur :</td> 
</tr>

<?php
try
{ $bdd = new PDO('mysql:host=127.0.0.1;dbname=site_projet_fst', 'root', '');}
catch(Exception $e)
{ die('Erreur : '.$e->getMessage()); }



$trouve = $reponse = $bdd->query("SELECT  user.nom,user.prenom,lieu.denomination,stage.date_debut,stage.date_fin,stage.id_prof FROM user,lieu,stage where user.role='eleve' and user.id=stage.id_eleve and lieu.id=stage.id_lieu and lieu.id=".$_SESSION['mon_id_lieu'] ); // and user.id !=  ".$_SESSION['id']  
if ($trouve) {


while ($donnees = $reponse->fetch()){  ?>
<tr>
 <td> <input type="text" value=" <?php echo $donnees['nom']; ?>" disabled> 
 <td> <input type="text" value=" <?php echo $donnees['prenom']; ?>" disabled> 
 <td> <input type="text" value=" <?php echo $donnees['denomination']; ?>" disabled> 
 <td> <input type="text" value=" <?php echo $donnees['date_debut']; ?>" disabled> 
 <td> <input type="text" value=" <?php echo $donnees['date_fin']; ?>" disabled> 
 <td> <input type="text" value=" <?php echo $donnees['id_prof']; ?>" disabled> 
</tr>

<?php
}
 }else{echo 'vide';}
$reponse->closeCursor();
?>

</table>
            <script type="text/javascript"> $('#div_mes_camarades').hide(); </script>
        </div>
    </div> 	

 </div>








<div > 
 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>  
</div>


</DIV>
<footer id="pied"> tous droits reserves

 </footer>
</body>
