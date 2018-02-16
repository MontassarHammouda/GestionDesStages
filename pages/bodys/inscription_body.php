

<body>


<DIV id="skull">

<header> 
<nav>	
<il>
<li><a href="index.php">Acceuil</a></li>
<li><a href="#">Inscription</a></li>
</il>
</nav>
</header>

<br><br>

<div id="formulaire">
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

<input type="hidden" name="role" value="New_Membre" >


<input type="hidden" name="bloked" value="1"  >

<tr>
    <td colspan="2"><input id="btn_add" type="submit" value="Ajouter"></td>
<tr>
</table>
</form>
</div>
<script type="text/javascript"> $('#tr_role').hide(); $('#tr_bloked').hide(); </script>
<br><br>



</DIV>

<!--<footer id="pied"> <p>tous droits reserves</p>
 <div id="pub_hebergeur">
	<a href="http://api.hostinger.fr/redir/5485235" target="_blank"><img src="http://www.hostinger.fr/banners/fr/hostinger-80x31-1.gif" alt="Hébergement Gratuit" border="0" width="80" height="31" /></a>	
</div>--!>

 </footer>

</body>

