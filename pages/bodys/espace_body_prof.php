
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





<div id="Gestion_stages_prof">
	<h3 class="box" id="titre_Gestion_stages_prof">Gestion des Stages</h3>
	<br> 

	<div class="box" >







<!----------------------------------------------------------------------------------------------- -->
<!------------------------------   Programmer Des Stages  -------------------------------------- -->
<div id="affecter_des_stages">
<input id="btn1" type="button" value="Programmer Des Stages" onClick="$('#programmer_des_stages').slideToggle(1000);">
</div>

<div id="programmer_des_stages">

<form method="post" action="classes/upd_stage.php">


La Liste Des Stagiaires : 
<select name="eleves" id="combo_eleves">
<?php
try
{
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=site_projet_fst', 'root', '');
}
catch(Exception $e)
{
            die('Erreur : '.$e->getMessage());
}
 
 
$reponse = $bdd->query("SELECT * FROM user where user.role='Stagiaire'   ");
 
while ($donnees = $reponse->fetch())
{
?>
           <option name="combo_id_eleve" value=" <?php echo $donnees['id']; ?>"> <?php echo $donnees['nom']; ?></option>
<?php
}
 
$reponse->closeCursor();
 
?>
</select>

<input style="background-color: gray;font-weight: bold;" type="text" id="eleve_choisi" >
<input type="hidden" id="pst_id_eleve_choisi" name="pst_id_eleve_choisi" >

<script type="text/javascript"> 
// selectionner un eleve combobox
$("#eleve_choisi").hide();
$(document).on("ready",function(){     
$('#combo_eleves').change(function(){
	var eleve_id = $("#combo_eleves option:selected").val();
	var eleve_nom = $("#combo_eleves option:selected").text();
	//alert(selectionne);
	$("#eleve_choisi").val('Stagiare Choisi :     id='+eleve_id+'      nom='+eleve_nom);
	$("#eleve_choisi").show();
	$("#pst_id_eleve_choisi").val(eleve_id);
	});
})

</script>

<br/>












Choisir un Stage  : 
<select name="stages" id="combo_stages">
<?php
try
{
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=site_projet_fst', 'root', '');
}
catch(Exception $e)
{
            die('Erreur : '.$e->getMessage());
}
 
 
$reponse = $bdd->query('SELECT  * FROM stage');
 
while ($donnees = $reponse->fetch())
{
?>
           <option name="combo_id_stage" value=" <?php echo $donnees['id']; ?>"> <?php echo $donnees['domaine']; ?></option>
<?php
}
 
$reponse->closeCursor();
 
?>
</select>

<input style="background-color: gray;font-weight: bold;" type="text" id="stage_choisi" >
<input type="hidden" id="pst_id_stage_choisi"  name="pst_id_stage_choisi">

<input type="hidden" id="pst_id_prof" name="pst_id_prof" value="<?php echo $_SESSION['id'] ?>" >


<script type="text/javascript"> 
// selectionner un eleve combobox
$("#stage_choisi").hide();
$(document).on("ready",function(){     
$('#combo_stages').change(function(){
	var stage_id = $("#combo_stages option:selected").val();
	var stage_nom = $("#combo_stages option:selected").text();
	//alert(selectionne);
	$("#stage_choisi").val('Stage Choisi :     id='+stage_id+'      nom='+stage_nom);
	$("#stage_choisi").show();
	$("#pst_id_stage_choisi").val(stage_id);
	});
})
</script>
<br/>
<input id="btn_upd_stg" type="submit" value="Valider"  >
<input type="button" id="annuler"  value="Annuler" onClick=resetChamps() >
</form>







<script type="text/javascript"> $('#programmer_des_stages').hide();

function resetChamps(){    
  $('#eleve_choisi').val("");
  $('#stage_choisi').val("");  
  $('#eleve_choisi').hide();
  $('#stage_choisi').hide();
}

 </script>
</div>

<br/>
<!---------------------------------------------------------------------------------------- -->


<div id="load_mes_eleve_bd">
<input id="btn2" type="button" value="Liste De Mes Stagiaires" onClick="$('#affichage_table_mes_eleves').slideToggle(1000);">
</div>

<div id="affichage_table_mes_eleves">
<?php  include("classes/load_mes_eleves.php"); ?> 

<script type="text/javascript"> $('#affichage_table_mes_eleves').hide(); </script>
</div>

<!---------------------------------------------------------------------------------------- -->
<!---------------------------------------------------------------------------------------- -->










<br/><br/><br/>
<!----------------------------------------------------------------------------------------------- -->
<!-------------------------------------   AJOUTER Elèves BD  ------------------------------------- -->
    <div id="add_eleve_bd">
    <input id="btn3" type="button" value="Ajouter un Stagiaire " onClick="$('#div_add_eleve_bd').slideToggle(1000);">
    </div>


<div id="div_add_eleve_bd">
<form method="POST" action="classes/add.php"> 
<table width="100%">
<tr>
<td>Login :</td> <td ><input type="text" name="login" ></td> 
</tr>
<tr>
<td>Password :</td> <td><input type="password" name="password" ></td> 
</tr>
<tr>
<td>Nom :</td> <td><input type="text" name="nom"   ></td> 
</tr>
<tr>
<td>Prenom :</td> <td><input type="text" name="prenom"  ></td> 
</tr>
<tr>
<td>Date Debut :</td> <td><input type="text" name="date_Debut"  ></td> 
</tr>
<tr>
<td>Email :</td> <td><input type="mail" name="email" ></td> 
</tr>
<tr>
<tr>
<td>Date inscription :</td> <td><input type="text" name="date_inscription" ></td> 
</tr>

<tr>
<td style="visibility: hidden;" ></td>
<td ><input id="btn_add_eleve" type="submit" value="Ajouter" style="width: 40%; margin-left: 25%;"></td>
<tr>

<tr style="visibility: hidden;">
 <td><input type="text" name="role" value="Stagiaire" ></td> 
 <td><input type="text" name="bloked" value="0" ></td> 
</tr>

</table>
</form>
</div>

<script type="text/javascript"> $('#div_add_eleve_bd').hide(); </script>
<br/>
<!---------------------------------------------------------------------------------------- -->


<div id="load_eleve_bd">
<input id="btn4" type="button" value="Afficher TouT Les Stagiares" onClick="$('#affichage_table_eleves').slideToggle(1000);">
</div>

<div id="affichage_table_eleves">
<?php include("classes/load_all_eleves.php"); ?> 

<script type="text/javascript"> $('#affichage_table_eleves').hide(); </script>
</div>

<!---------------------------------------------------------------------------------------- -->
<!---------------------------------------------------------------------------------------- -->












<br/><br/><br/>
<!---------------------------------------------------------------------------------------------- -->
<!-------------------------------------   AJOUTER STAGE BD  ------------------------------------- <div id="add_stage_bd">
<input id="btn5" type="button" value="Ajouter un Stage -> Base de Donnée" onClick="$('#div_add_stage_bd').slideToggle(1000);">
</div>


<div id="div_add_stage_bd">
<form method="POST" action="classes/add_stage.php"> 
<table width="100%">
<tr>
<td>domaine :</td> <td ><input type="text" name="domaine" ></td> 
</tr>
<tr>
<td>date debut :</td> <td><input type="text" name="date_debut" ></td> 
</tr>
<tr>
<td>date fin :</td> <td><input type="text" name="date_fin"   ></td> 
</tr>


<tr>

<td></td> 
<td>
<select name="lieu" id="combo_lieu" style="display: inline-block;">
<?php
/* try
{ $bdd = new PDO('mysql:host=127.0.0.1;dbname=site_projet_fst', 'root', '');}
catch(Exception $e)
{ die('Erreur : '.$e->getMessage()); }
$reponse = $bdd->query('SELECT  * FROM lieu where id!=0');
while ($donnees = $reponse->fetch()){  ?>
 <option name="combo_nomination_lieu" value=" <?php echo $donnees['id']; ?>"> <?php echo $donnees['denomination']; ?></option>
<?php }
$reponse->closeCursor();
?>
</select>
<input type="text" name="id_lieu" id="id_lieu" style="width: 45%;display: inline-block;">
</td> 
</tr>


<tr>
	<td style="visibility: hidden;"></td>
 <td><input id="btn_add_stg" type="submit" value="Ajouter" style="width: 40%; margin-left: 25%;"></td>
</tr>

<tr  style="visibility: hidden;">
<td><input type="text" name="note" value="0" ></td> 
<td><input type="text" name="id_eleve" value="0" ></td> 
<td><input type="text" name="id_prof" value="0"></td>
<td><input type="text" name="stg_accompli" value="Non"></td> 
</tr>


</table>
</form>
</div>

<script type="text/javascript"> 

$('#div_add_stage_bd').hide(); 

// selectionner un lieu combobox
$(document).on("ready",function(){     
$('#combo_lieu').change(function(){
	var lieu_id = $("#combo_lieu option:selected").val();
	var lieu_denomination = $("#combo_lieu option:selected").text();
	//alert(selectionne);
	$("#id_lieu").val(lieu_id);
	});
})
</script>
<br/>
*/ ?> -->

<!---------------------------------------------------------------------------------------- 
<div id="load_stages_bd">
<input id="btn6" type="button" value="Afficher TouT Les Stages" onClick="$('#affichage_table_stages').slideToggle(1000);">
</div>

<div id="affichage_table_stages">
<?php //include("../classes/load_all_stages.php"); ?> 

<script type="text/javascript"> $('#affichage_table_stages').hide(); </script>
</div>
<!---------------------------------------------------------------------------------------- -->
<!-----------------------------------Noter stage-------------------------------------- -->
  


<!--
<div id="div_note_stage_bd">

<form method="POST" method="post" action="../classes/note_stage.php"> 
<table width="100%">

<tr>
<input type="hidden" name="id" id="id" value=<?php // echo $unStage->getId();?>>
<td>Donner Une Note Pour Le Stage Choisi :</td> 

<td>
<input type="text" name="note" id="note" style="width: 45%;display: inline-block;">
</td>

</tr>


<tr>
	<td style="visibility: hidden;"></td>
 <td><input id="btn_add_stg" type="submit" value="Ajouter" style="width: 40%; margin-left: 25%;"></td>
</tr>

<tr  style="visibility: hidden;">
<td><input type="text" name="note" value="0" ></td> 
<td><input type="text" name="id_eleve" value="0" ></td> 
<td><input type="text" name="id_prof" value="0"></td>
<td><input type="text" name="stg_accompli" value="Non"></td> 
</tr>


</table>
</form>
</div>

<input id="btn10" type="button" value="Annuler" onClick="$('#this').hide(1000);$('#div_note_stage_bd').slideToggle(1000);">

<script type="text/javascript"> $('#div_note_stage_bd').hide(); </script>
-->

<!---------------------------------------------------------------------------------------- -->
  













    </div>
 </div>








<div > 
 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>  
</div>


</DIV>
<footer id="pied"> 

 </footer>
</body>
