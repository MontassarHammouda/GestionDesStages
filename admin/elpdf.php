<?php 
require_once('verifier_access.php'); 
require_once("../classes/Commande.php");
@$id = $_GET['id'];

if( !empty($id) ) {
	

	$cat= new Commande();
	$cat = $cat->details($id);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Detaille Commande N°<?php echo $id  ?> </title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">

  <link rel="stylesheet" type="text/css" href="bootstrap-wysihtml5/lib/css/bootstrap.min.css"></link>
  <link rel="stylesheet" type="text/css" href="bootstrap-wysihtml5/lib/css/prettify.css"></link>
  <link rel="stylesheet" type="text/css" href="bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link>
  <style>input, textarea, select, .uneditable-input{height:auto;}#loadimg{display:none;}</style> 
  <style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
}
</style>     
</head>
<body>

  <?php require_once('header.php'); ?>

  <div class="container2">
    <center><h1>Detaille Commande N°<?php echo $id  ?></h1></center>
  </div>

  <div class="container2">

   <div class="clear"><p>&nbsp;</p></div>
   <div id="resultat-bien"></div>
   <table>
  <tr>
    <th>ID</th>
    <th>Nom</th>
    <th>Email</th>
    <th>Adresse</th>
    <th>Date Commande</th>
  </tr>
  <tr>
    <td><?php echo $id  ?></td>
    <td><?php echo $cat->_nom  ?></td>
    <td><?php echo $cat->_email  ?></td>
     <td><?php echo $cat->_adress  ?></td>
      <td><?php echo $cat->_dateC  ?></td>
  </tr>

  
 

</table>

 </div>

 <hr>

 <script src="js/jquery.min.js"></script>
 <script src="js/bootstrap.js"></script>
 <script src="js/bootstrap.validate.js"></script>
 <script src="js/bootstrap.validate.en.js"></script>
 <script type="text/javascript" src="js/jquery.form.js"></script>

 <script src="bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
 <script src="bootstrap-wysihtml5/lib/js/prettify.js"></script>
 <script src="bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>

 <script>
   $('.textarea').wysihtml5();
   $(prettyPrint);

   function confirmDelete(delUrl) {
    if (confirm("Voulez vous vraiment supprimer ce Partenaire ?")) {
     document.location = delUrl;
   }
 }
</script>

</body>
</html>