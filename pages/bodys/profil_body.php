
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

<div class="box" id="div_profile" >
<form >
<table id="table_profil" >
<tr>
<td colspan="2"> PROFIL </td> 
</tr>
<tr>
<td>Id :</td> <td ><input type="text" name="id" value=<?php  echo $_SESSION['id']; ?>></td> 
</tr>
<tr>
<td>Login :</td> <td ><input type="text" name="log" value=<?php  echo $_SESSION['login']; ?>></td> 
</tr>
<tr>
<td>Password (crypté):</td> <td><input type="text" name="pass"  value=<?php  echo $_SESSION['password']; ?>></td> 
</tr>
<tr>
<td>Nom :</td> <td><input type="text" name="nom"  value=<?php  echo $_SESSION['nom']; ?>></td> 
</tr>
<tr>
<td>Prenom :</td> <td><input type="text" name="prenom"  value=<?php  echo $_SESSION['prenom']; ?>></td> 
</tr>
<tr>
<td>Date naissance :</td> <td><input type="text" name="date_naissance"  value=<?php  echo $_SESSION['date_naissance']; ?>></td> 
</tr>
<tr>
<td>Prenom :</td> <td><input type="mail" name="email"  value=<?php  echo $_SESSION['email']; ?>></td> 
</tr>
<tr>
<tr>
<td>Date inscription :</td> <td><input type="text" name="date_inscription"  value=<?php  echo $_SESSION['date_inscription']; ?>></td> 
</tr>
<tr>
<td>Role :</td> <td><input type="text" name="role"  value=<?php  echo $_SESSION['role']; ?>></td> 
</tr>
</table>
</form>
</div>




<div > 
 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>  
</div>


</DIV>
<footer id="pied"> tous droits reserves

 </footer>
</body>
