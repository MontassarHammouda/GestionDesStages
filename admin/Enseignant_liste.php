<?php 
require_once 'verifier_access.php';
require_once '../classes/Enseignant.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Liste des Stage</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">
 <!-- Bootstrap Core Css -->
 <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">


<!-- JQuery DataTable Css -->
<link href="../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">




  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">
</head>
<body>

  <?php require_once 'header.php'; ?>

  
  <div class="container2">
    <h1>Liste des Enseignant
      : </h1>
      <a type="button" class="btn btn-primary btn-lg pull-right" href="Enseignant_new.php">
      Ajouter une Enseignant </a>	 
    </div>
    
</div>

    <div class="container2">

      <div class="clear"><p>&nbsp;</p></div>

      <div id="result">
      <section class="container2">
      <div class="container-fluid">

          <!-- Basic Examples -->
          <div class="row clearfix">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="card">

                      <div class="body">
                          <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                              <thead>
                                  <tr>
                                      <th>matricule_enseignant</th>
                                       <th>Nom</th>
                                      <th>Prenom</th>
                                      <th>Adress</th>
                                      <th>Email</th>
                                      <th>CIN</th>
                                     <th>MODIFIER</th>
                                      <th>SUPPRIMER</th>
                                      <th>PROFIL</th>


                                     
                                  </tr>
                              </thead>
                              <tfoot>
                                  <tr>
                                  <th>matricule_enseignant</th>
                                  <th>Nom</th>
                                 <th>Prenom</th>
                                 <th>Adress</th>
                                 <th>Email</th>
                                 <th>CIN</th>
                                <th>MODIFIER</th>
                                 <th>SUPPRIMER</th>
                                 <th>PROFIL</th>

                                  </tr>
                              </tfoot>
                              <tbody>
                              <?php 

                $cat = new Enseignant();
               $liste = $cat->liste();
               foreach ($liste as $data) {
                   ?>
                     <tr>
              <td><?php echo $data->_matricule_enseignant; ?></td>
            
               <td><?php echo $data->_nom; ?></td>
               <td><?php echo $data->_prenom; ?></td>
               <td><?php echo $data->_adress; ?></td>
               <td><?php echo $data->_email; ?></td>
               <td><?php echo $data->_cin; ?></td>
            
               <td>
              <a class="btn btn-primary" href="Enseignant_new.php?id=<?php echo $data->_matricule_enseignant; ?>">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>  Modifier
              </a>
            </td>
            <td>
             <a href="javascript:confirmDelete('Enseignant_supp_action.php?id=<?php echo $data->_matricule_enseignant; ?>')" class="btn btn-danger btn-mini">
               <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Supp
             </a>                 
           </td>
           <td>
             <a href="Enseignant_Profile.php?id=<?php echo $data->_matricule_enseignant; ?>" class="btn btn-success btn-mini">
               <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> profil
             </a>                 
           </td>
               </tr><?php
               } ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>

      </div>
  </section>
    
     </div>   
    

   <div style="text-align: center;">
    <div id="bootstrap-pagination"></div>
  </div>
  
</div>



<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-paginator.js"></script>
<script src="js/bootstrap.validate.js"></script>
<script src="js/bootstrap.validate.en.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript">
  function confirmDelete(delUrl) {
    if (confirm("Voulez vous vraiment supprimer cette cat ? ?")) {
     document.location = delUrl;
   }
 }
 </script>
 <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
</script>
</body>
</html>