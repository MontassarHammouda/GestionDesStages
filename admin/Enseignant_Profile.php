<?php
require_once 'verifier_access.php';

@$id = $_GET['id'];

if (!empty($id)) {
    require_once '../classes/Enseignant.php';
    require_once '../classes/Evaluation.php';
    require_once '../classes/Soutenance.php';
    require_once '../classes/Etudiant.php';
    require_once '../classes/Classe.php';
    require_once '../classes/Stage.php';
    $cat = new Enseignant();
    $cat = $cat->details($id);
    $Eva = new Evaluation();
    $Eva = $Eva->nbSoutenance($cat->_matricule_enseignant);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <!-- VENDOR CSS -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/main.css">

	<link rel="stylesheet" href="assetss/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assetss/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assetss/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assetss/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assetss/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assetss/img/apple-icon.png">
	
</head>

<body>
	
  <?php require_once 'header.php'; ?>

		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-profile">
						<div class="clearfix">
							<!-- LEFT COLUMN -->
							<div class="profile-left">
								<!-- PROFILE HEADER -->
								<div class="profile-header">
									<div class="overlay"></div>
									<div class="profile-main">
										<img src="assetss/img/user-medium.png" class="img-circle" alt="Avatar">
										<h3 class="name"><?php echo $cat->_nom.' '.$cat->_prenom; ?></h3>
										<span class="online-status status-available">Available</span>
									</div>
									<div class="profile-stat">
										<div class="row">
											<div class="col-md-4 stat-item">
												45 <span>Projects</span>
											</div>
											<div class="col-md-4 stat-item">
												15 <span>Awards</span>
											</div>
											<div class="col-md-4 stat-item">
												2174 <span>Points</span>
											</div>
										</div>
									</div>
								</div>
								<!-- END PROFILE HEADER -->
								<!-- PROFILE DETAIL -->
								<div class="profile-detail">
									<div class="profile-info">
										<h4 class="heading">Basic Info</h4>
										<ul class="list-unstyled list-justify">
											<li>Matricule <span><?php echo $cat->_matricule_enseignant; ?></span></li>
											<li>CIN <span><?php echo $cat->_cin; ?></span></li>
											<li>Email <span><?php echo $cat->_email; ?></span></li>
											<li>Adress <span><?php echo $cat->_adress; ?></span></li>
										</ul>
									</div>
									<div class="profile-info">
										<h4 class="heading">Social</h4>
										<ul class="list-inline social-icons">
											<li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#" class="google-plus-bg"><i class="fa fa-google-plus"></i></a></li>
											<li><a href="#" class="github-bg"><i class="fa fa-github"></i></a></li>
										</ul>
									</div>
									
									<div class="text-center"><a href="Enseignant_new.php?id=<?php echo $cat->_matricule_enseignant; ?>" class="btn btn-primary">Edit Profile</a></div>
								</div>
								<!-- END PROFILE DETAIL -->
							</div>
							<!-- END LEFT COLUMN -->
							<!-- RIGHT COLUMN -->
							<div class="profile-right">
								<h4 class="heading">Samuel's Awards</h4>
								<!-- AWARDS -->
								<div class="awards">
									<div class="row">
										<div class="col-md-3 col-sm-6">
											<div class="award-item">
												<div class="hexagon">
													<span class="lnr lnr-sun award-icon"></span>
												</div>
												<span>Most Bright Idea</span>
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="award-item">
												<div class="hexagon">
													<span class="lnr lnr-clock award-icon"></span>
												</div>
												<span>Most On-Time</span>
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="award-item">
												<div class="hexagon">
													<span class="lnr lnr-magic-wand award-icon"></span>
												</div>
												<span>Problem Solver</span>
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="award-item">
												<div class="hexagon">
													<span class="lnr lnr-heart award-icon"></span>
												</div>
												<span>Most Loved</span>
											</div>
										</div>
									</div>
									<div class="text-center"><a href="#" class="btn btn-default">See all awards</a></div>
								</div>
								<!-- END AWARDS -->
								<!-- TABBED CONTENT -->
								<div class="custom-tabs-line tabs-line-bottom left-aligned">
									<ul class="nav" role="tablist">
										<li class="active"><a href="#tab-bottom-left2" role="tab" data-toggle="tab">Nombres des stages <span class="badge"><?php echo count($Eva); ?></span></a></li>
									</ul>
								</div>
								<div class="tab-content">
									
									<div class="tab-pane fade  in active" id="tab-bottom-left2">
										<div class="table-responsive">
											<table class="table project-table">
												<thead>
													<tr>
														<th>Theme</th>
														<th>Date De soutenance</th>
														<th>Nom/Pranom</th>
														<th>Class</th>
													</tr>
												</thead>
												<tbody>
													<?php
                                                    $stag = new Stage();
                                                    $Etudi = new Etudiant();
                                                    $Sout = new Soutenance();
                                                    $Clas = new Classe();

                                                    foreach ($Eva as $data) {
                                                        $Sout = $Sout->details($data->_id_soutenance);
                                                        $stag = $stag->details($Sout->_id_stage);
                                                        $Etudi = $Etudi->detailsEnst($Sout->_id_stage);
                                                        $Clas = $Clas->details($Etudi->_id_classe); ?>
													
												<tr>
                          <td><a href="#"><?php echo $stag->_Theme; ?></a></td>
                            <td>
                              <?php echo $Sout->_date; ?>
                            </td>
                            <td><a href="#"><?php echo $Etudi->_nom.'/'.$Etudi->_prenom; ?></a></td>
                            <td><?php echo $Clas->_desginNiveau.' '.$Clas->_desginParcours; ?></td>
						  </tr>
													<?php
                                                    }?>
						  
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- END TABBED CONTENT -->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assetss/vendor/jquery/jquery.min.js"></script>
	<script src="assetss/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assetss/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assetss/scripts/klorofil-common.js"></script>
</body>

</html>
