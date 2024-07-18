<?php
  session_start();
  if(!isset($_SESSION["adminLoggedIn"]) || $_SESSION["adminLoggedIn"] !== true){
      header("location: login.php");
      exit;
  }
	require_once "config.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Voxo admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Voxo admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <title>Furnterior - All Subscribers</title>
    <!-- Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&amp;family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Fontawesome css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- Linear Icon css -->
    <link rel="stylesheet" href="assets/css/linearicon.css">

    <!-- Themify icon css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify.css">

    <!-- Feather icon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/animate.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- Responsive css -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

</head>

<body>
    <!-- tap on top start -->
    <div class="tap-top">
        <span class="lnr lnr-chevron-up"></span>
    </div>
    <!-- tap on tap end -->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper dark-sidebar" id="pageWrapper">
        <!-- Page Header Start-->
        <?php include("header.php"); ?>
        <!-- Page Header Ends-->

        <!-- Page Body Start -->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <?php include("sidebar.html"); ?>
          
            <!-- Page Sidebar Ends-->

            <!-- Container-fluid starts-->
            <div class="page-body">
                <div class="title-header title-header-1">
                    <h5>All Subscribers</h5>
                  	<a  class="align-items-center btn btn-theme" data-bs-toggle="modal" data-bs-target="#sendEmailModal">
                            <i data-feather="plus-square"></i>Send New Mail
                    </a>
                </div>
              	 <div class='subscribe-message' id='subscribe-mssg' style='background: #60c081; margin: 10px 50px 0 50px;padding: 10px; display:none'><span style='display: flex; flex-direction: row; align-items: center; justify-content: center;'>
    Your message has been sent successfully. <i data-feather="check"></i>
  </span></div>
                <!-- All User Table Start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <div class="table-responsive table-desi">
                                            <table class="user-table table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Email</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                
                                                    <?php
                                                  	$count= 1;
                                                    $sql = "SELECT * FROM Subscribers";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while($row = $result->fetch_assoc()) {
                                                          		echo '<tr>';
                                                          		echo '<td>'.$count.'</td>';     
                                                          		$count += 1; 
                                                                echo '<td>'.$row['Email'].'</td>';                                                       	
                                                                echo '</tr>';
                                                        }
                                                    } else {
                                                        echo "No results found.";
                                                    }
                                                    
                                                    
                                                 $conn->close();
                                             ?>
                                            </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="pagination-box">
                                    <nav class="ms-auto me-auto " aria-label="...">
                                        <ul class="pagination pagination-primary">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="javascript:void(0)">Previous</a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link" href="javascript:void(0)">1 </a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="javascript:void(0)">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="javascript:void(0)">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="javascript:void(0)">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- All User Table Ends-->

                <div class="container-fluid">
                    <!-- footer start-->
                    <footer class="footer">
                        <div class="row">
                            <div class="col-md-12 footer-copyright text-center">
                                <p class="mb-0">Copyright 2023 © Furnterior by Codemply</p>
                            </div>
                        </div>
                    </footer>
                    <!-- footer end-->
                </div>
            </div>
            <!-- Container-fluid end -->
        </div>
        <!-- Page Body End -->

      <!-- SEND EMAIL MODAL -->
      <div class="modal fade" id="sendEmailModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Send Email to Subscribers</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
         
         	 <form  method="post" action="send-email.php" autocomplete="off" >
            <div class="modal-body pt-3">
                
                    <div class="mb-3">
                        <label for="email-subject" class="">Subject</label>
                        <input type="text" class="form-control" id="email-subject" name="email-subject">
                    </div>
                    <div>
                        <label for="email-message" class="">Message</label>
                      <textarea id="email-message" name="email-message" rows="10" style="width:100%; border: 1px solid #ced4da"> </textarea>
                    </div>
                
            </div>
            <div class="modal-footer pt-0">
                <button class="btn btn--no" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn  btn--yes btn-primary" value="Send Message">
            </div>
              </form>
        </div>
    </div>
</div>
      
      
        <!-- Modal Start -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
            <div class="modal-dialog  modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5 class="modal-title" id="staticBackdropLabel">Logging Out</h5>
                        <p>Are you sure you want to log out?</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="button-box">
                            <button type="button" class="btn btn--no " data-bs-dismiss="modal">No</button>
                            <button type="button" class="btn  btn--yes btn-primary">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal End -->
      
    </div>

    <!-- latest js -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap js -->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- feather icon js -->
    <script src="assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="assets/js/icons/feather-icon/feather-icon.js"></script>

    <!-- scrollbar simplebar js -->
    <script src="assets/js/scrollbar/simplebar.js"></script>
    <script src="assets/js/scrollbar/custom.js"></script>


    <!-- Sidebar js -->
    <script src="assets/js/config.js"></script>

    <!-- Plugins JS -->
    <script src="assets/js/sidebar-menu.js"></script>
    <script src="assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="assets/js/notify/index.js"></script>

    <!-- all checkbox select js -->
    <script src="assets/js/checkbox-all-check.js"></script>

    <!-- Theme js -->
    <script src="assets/js/script.js"></script>
  
  <script>
    // Get the subscribe message element
    const successMessage = document.getElementById('subscribe-mssg');
    
	<?php if (isset($_SESSION['sendmail']) && $_SESSION['sendmail']=="success"): ?>
    successMessage.style.display = 'block';
    // If the element exists, set a timeout to hide it after 5 seconds
    if (successMessage) {
        setTimeout(function() {
            successMessage.style.display = 'none';
        }, 5000);
    }
    <?php unset($_SESSION['sendmail']); ?>
<?php endif; ?>
</script>
  
</body>

</html>