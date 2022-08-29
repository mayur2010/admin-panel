<?php 
   include("includes/header.php");
   require("includes/function.php");
   require("language/language.php");
      
     
   $qry="SELECT * FROM tbl_settings where id='1'";
   $result=mysqli_query($mysqli,$qry);
   $settings_row=mysqli_fetch_assoc($result);

   if(isset($_POST['submit']))
   {
      $img_res=mysqli_query($mysqli,"SELECT * FROM tbl_settings WHERE id='1'");
      $img_row=mysqli_fetch_assoc($img_res);
   
      unlink('images/'.$img_row['app_logo']);   

      $app_logo=$_FILES['app_logo']['name'];
      $pic1=$_FILES['app_logo']['tmp_name'];

      $tpath1='images/'.$app_logo;      
      copy($pic1,$tpath1);


     $data = array(      
         'app_logo'  =>  $app_logo,   
     );

     $settings_edit=Update('tbl_settings', $data, "WHERE id = '1'");
 
      if ($settings_edit > 0)
      {
        $_SESSION['msg']="11";
        header( "Location:app_settings.php");
        exit;
      }   
   }
?>
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
                                <h4 class="card-title">App Settings</h4>
                            </div>
                            <div class="card-body">
                                <div class="card-body">
                                    <div class="basic-form">
                                       <form action="" name="settings_from" method="post" class="form form-horizontal" enctype="multipart/form-data">           
                                          <div class="form-group row">
                                             <label class="col-sm-3 col-form-label">App Logo :-</label>
                                             <div class="col-sm-9">
                                                <div class="fileupload_block">
                                                   <input type="file" name="app_logo" id="fileupload">
                                                   <?php if($settings_row['app_logo']!="") {?>
                                                   <div class="fileupload_img"> 
                                                      <img type="image" src="images/<?php echo $settings_row['app_logo'];?>" alt="image" style="width: 100px;height: 100px; margin-top: 10px;"/>
                                                   </div>
                                                   <?php } else {?>
                                                   <div class="fileupload_img">
                                                      <img type="image" src="assets/images/add-image.png" alt="image"  style="width: 100px;height: 100px; margin-top: 10px;"/>
                                                   </div>
                                                   <?php }?>
                                                </div>
                                             </div>
                                          </div>
                                          
                                          <div class="form-group row">
                                             <div class="col-sm-10">
                                                <button type="submit" name="submit" class="btn button btn-primary <?php echo APP_PURCHASE; ?>">Save</button>
                                             </div>
                                          </div>
                                       </form>                        
                                    </div>
                                </div>
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

<script type="text/javascript">
         $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
           localStorage.setItem('activeTab', $(e.target).attr('href'));
         });
         
         var activeTab = localStorage.getItem('activeTab');
         if(activeTab){
           $('.nav-tabs a[href="' + activeTab + '"]').tab('show');
         }
      </script>

	
</body>
</html>
  <?php include("includes/footer.php");?>    