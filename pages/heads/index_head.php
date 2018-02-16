<?php 
session_start(); 
if(isset($_SESSION['login']) && $_SESSION['password'] != NULL)
session_destroy();
$_SESSION['role']='';
?>





<head>
	<title>help soft</title>
	<link rel="stylesheet" type="text/css" href="pages/heads/index.css">
	<meta charset="utf-8">
	<noscript><meta http-equiv="refresh" content="0, URL=no_javascript.html"></noscript>
    <link rel="images/shortcut icon" type="img/png" href="images/Royality.png">
    <script type="text/javascript" src="jquery.js"></script> 

    <div id="authentification"> 
<form method="POST" action="classes/auth.php">  <!--  classes/auth.php  -->
	<table>
		<tr>
		<td>Login </td>
		<td><input type="text" name="auth_log"></td>
		</tr>
		<tr>
		<td>Password </td>
		<td><input type="text" name="auth_pass"></td>
		</tr>
	</table>
<input id="auth_se_co" type="submit" name="auth_se_co" value="Se Connecter">
</form>

</div>

<script type="text/javascript">$('#authentification').hide();</script>

<input id="btn_show_div_auth" type="submit" value="" title="Se Connecter"  onClick="$('#authentification').show(2000); $(this).hide();"> </input>
<?php echo $_SESSION['role'] ; ?>
</head>

