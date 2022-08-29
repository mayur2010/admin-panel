<?php include("includes/header.php");

$file_path = 'https://'.$_SERVER['SERVER_NAME'] . dirname($_SERVER['REQUEST_URI']).'/';
?>
<style type="text/css">
    /* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555; 
}
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    

</head>
<body>
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
                 <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Example API urls</h4>
                            </div>
                            <div class="card-body no-padding">
                                <pre>
                                    <br><b>API URL</b> <?php echo $file_path.'api.php';?>
                                
                                </pre>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->

</body>
</html>
  <?php include("includes/footer.php");?>    