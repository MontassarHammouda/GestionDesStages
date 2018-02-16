<?php 
require_once 'verifier_access.php';
require_once '../classes/Enseignant.php';
@$id = $_GET['id'];

if (!empty($id)) {
    $pro = new Enseignant();
    $pro = $pro->details($id);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Gestion des Enseignant</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">

  <link rel="stylesheet" type="text/css" href="bootstrap-wysihtml5/lib/css/bootstrap.min.css"></link>
  <link rel="stylesheet" type="text/css" href="bootstrap-wysihtml5/lib/css/prettify.css"></link>
  <link rel="stylesheet" type="text/css" href="bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link>
  <style>input, textarea, select, .uneditable-input{height:auto;}#loadimg{display:none;}</style>      
</head>
<body>

  <?php require_once 'header.php'; ?>

  <div class="container2">
    <h1><?php !empty($id) ? print('<br><br>Modifier') : print '<br><br>Ajouter'; ?> Un Enseignant</h1>
  </div>

  <div class="container2">

   <div class="clear"><p>&nbsp;</p></div>
   <div id="resultat-bien"></div>
   <br>
   <br>
   
   <form id="form_bien" class="form_valid" method="POST" action="Enseignat_new_action.php" enctype="multipart/form-data">

    <table class="tab_diapo" border="0">
     
      <tr>
      <th>
         Matricule Enseignant:<span style="color:red;">*</span>            
        </th>
        <td>
          <input required type="text" name="matricule_enseignant" id="matricule_enseignant" validate="required" value="<?php echo @($pro->_matricule_enseignant); ?>" />
        </td>
      </tr>
      <tr>
      <th>
         Nom:<span style="color:red;">*</span>            
        </th>
        <td>
          <input required type="text" name="nom" id="nom" validate="required" value="<?php echo @($pro->_nom); ?>" />
        </td>
      </tr>
      <tr>
      <th>
         Prenom:<span style="color:red;">*</span>            
        </th>
        <td>
          <input required type="text" name="prenom" id="prenom" validate="required" value="<?php echo @($pro->_prenom); ?>" />
        </td>
      </tr>
      <tr>
      <th>
         Adress:<span style="color:red;">*</span>            
        </th>
        <td>
          <input required type="text" name="adress" id="adress" validate="required" value="<?php echo @($pro->_adress); ?>" />
        </td>
      </tr>
       <tr>
        <th>
          Email :<span style="color:red;">*</span>            
        </th>
        <td>
        <input required type="text" name="email" id="email" validate="required" value="<?php echo @($pro->_email); ?>" />
        </td>
      </tr>
        <tr>
      <th>
         Cin:<span style="color:red;">*</span>            
        </th>
        <td>
          <input required type="text" name="cin" id="cin" validate="required" value="<?php echo @($pro->_cin); ?>" />
        </td>
      </tr>
       
     
     

     </table>

     <?php if (!empty($id)) {
    ?>
     <input type="hidden" name="id" value="<?php echo $id; ?>" />
     <?php
} ?>

     <button type="submit" id="submit" class="btn btn-primary"><?php (!empty($id)) ? print('Modifier') : print 'Ajouter'; ?></button>
     <div id="loadimg"><img src="../images/loading.gif" width="25" height="25" /></div>
   </form>

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
 <script src="js/datePicker.js"></script>
<link rel="stylesheet" href="css/datePicker.css" type="text/css">
 <script>
  
   $(prettyPrint);

   function confirmDelete(delUrl) {
    if (confirm("Voulez vous vraiment supprimer ce Partenaire ?")) {
     document.location = delUrl;
   }
 }
    
      $('#d_fin').Zebra_DatePicker({format: 'Y/m/d'});
      $('#d_debut').Zebra_DatePicker({format: 'Y/m/d'});

</script>

</body>
</html>