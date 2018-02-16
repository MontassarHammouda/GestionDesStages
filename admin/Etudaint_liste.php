<?php 
require_once 'verifier_access.php';
require_once '../classes/Etudiant.php';
require_once '../classes/Soutenance.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Stage</title>
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
    <h1>Liste des Etudiant
      : </h1>
      <a type="button" class="btn btn-primary btn-lg pull-right" href="Etudiant_new.php">
      Ajouter une Etudiant </a>	 
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
                                      <th>matricule_etudaint</th>
                                      <th>id_classe</th>
                                      <th>id_stage</th>
                                      <th>Nom</th>
                                      <th>Prenom</th>
                                      <th>CIN</th>
                                      <th>soutenanceDate</th>
                                      <th>MODIFIER</th>
                                      <th>SUPPRIMER</th>
                                      <th>PROFIL</th>


                                     
                                  </tr>
                              </thead>
                              <tfoot>
                                  <tr>
                                  <th>matricule_etudaint</th>
                                      <th>id_classe</th>
                                      <th>id_stage</th>
                                      <th>Nom</th>
                                      <th>Prenom</th>
                                      <th>CIN</th>
                                      <th>soutenance</th>
                                      <th>MODIFIER</th>
                                      <th>SUPPRIMER</th>
                                      <th>PROFIL</th>

                                  </tr>
                              </tfoot>
                              <tbody>
                              <?php 

                $cat = new Etudiant();
               $liste = $cat->liste();
               foreach ($liste as $data) {
                   ?>
                     <tr>
              <td><?php echo $data->_matricule_etudaint; ?></td>
               <td><?php echo $data->_id_classe; ?></td>
               <td><?php echo $data->_id_stage; ?></td>
               <td><?php echo $data->_nom; ?></td>
               <td><?php echo $data->_prenom; ?></td>
               <td><?php echo $data->_cin; ?></td>
               <?php if ($data->_id_stage != null) {
                       ?>
               <td>
              <a class="btn btn-small" data-toggle="modal" data-target="#login-modal" href="#">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Ajouter
              </a>
              <div class="clear"><p>&nbsp;</p></div>
      <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Date</h4>
                    </div>
                   
                    <div class="modal-body">
                        <form action="produit_new_action.php" method="post">
                            <div class="form-group">
                            <input type="hidden" name="id"id="id" value="<?php echo $data->_id_stage; ?>">
                            <select name="datee"id="datee" >
                            <?php 

                         $sout = new soutenance();
                       $listes = $sout->liste();
                       foreach ($listes as $datas) {
                           ?>
                            <option value="<?php echo $datas->_id_soutenance; ?>"><?php echo $datas->_date; ?></option>
                     <?php
                       } ?>
                             </select>
                            </div>
                           
                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Ajouter</button>
                            </p>

                        </form>

                       

                    </div>
                    </center>
                </div>
            </div>
        </div>
            </td >
               <?php
                   } ?>
               <td>
              <a class="btn btn-primary" href="Etudiant_new.php?id=<?php echo $data->_matricule_etudaint; ?>">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>  Modifier
              </a>
            </td>
            <td>
             <a href="javascript:confirmDelete('Etudaint_supp_action.php?id=<?php echo $data->_matricule_etudaint; ?>')" class="btn btn-danger btn-mini">
               <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Supp
             </a>                 
           </td>
           <td>
             <a href="Etudiant_ajout.php?id=<?php echo $data->_matricule_etudaint; ?>" class="btn btn-success btn-mini">
               <span class="glyphicon glyphicon-apple" aria-hidden="true"></span> profil
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
    if (confirm("Voulez vous vraiment supprimer cette Etudiant? ?")) {
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