<?php include("includes/header.php");

    require("includes/function.php");
    require("language/language.php");
     
    
    if(isset($_SESSION['id']))
    {
             
        $qry="select * from tbl_admin where id='".$_SESSION['id']."'";
         
        $result=mysqli_query($mysqli,$qry);
        $row=mysqli_fetch_assoc($result);

    }
    if(isset($_POST['submit']))
    {
        if($_FILES['image']['name']!="")
         {      


                $img_res=mysqli_query($mysqli,'SELECT * FROM tbl_admin WHERE id='.$_SESSION['id'].'');
                $img_res_row=mysqli_fetch_assoc($img_res);
            

                if($img_res_row['image']!="")
                {
                     
                         unlink('images/'.$img_res_row['image']);
                 }

                   //$image="profile.png";
                   $image=rand(0,99999)."_".$_FILES['image']['name'];
                   $pic1=$_FILES['image']['tmp_name'];
                   $tpath1='images/'.$image;
                    
                    copy($pic1,$tpath1);
 
                    $data = array( 
                                'username'  =>  $_POST['username'],
                                'password'  =>  $_POST['password'],
                                'email'  =>  $_POST['email'],
                                'image'  =>  $image,
                                );
                    
                    $channel_edit=Update('tbl_admin', $data, "WHERE id = '".$_SESSION['id']."'"); 

         }
         else
         {
                    $data = array( 
                                'username'  =>  $_POST['username'],
                                'password'  =>  $_POST['password'],
                                'email'  =>  $_POST['email'],
                                );
                    
                    $channel_edit=Update('tbl_admin', $data, "WHERE id = '".$_SESSION['id']."'"); 
        }

        $_SESSION['msg']="11"; 
        header( "Location:profile.php");
        exit;
         
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
                <div class="row mrg-top">
                    <div class="col-md-12"> 
                      <div class="col-md-12 col-sm-12">
                        <?php if(isset($_SESSION['msg'])){?> 
                         <div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                          <?php echo $client_lang[$_SESSION['msg']] ; ?></a> </div>
                        <?php unset($_SESSION['msg']);}?> 
                      </div>
                    </div>
                  </div>
                 <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Admin Profile</h4>
                            </div>
                            <div class="card-body no-padding">
                                  <form action="" name="editprofile" method="post" class="form form-horizontal" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Profile Image :-</label>
                                        <div class="col-sm-9">
                                            <div class="fileupload_block">
                                                <input type="file" name="image" id="fileupload">
                                              </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label">&nbsp; </label>
                                        <div class="col-sm-9">
                                          <?php if($row['image']!="") {?>
                                                <div class="block_wallpaper">
                                                    <img type="image" src="images/<?php echo $row['image'];?>" alt="profile image" style="height: auto; width: 50%;" />
                                                </div>
                                              <?php } ?>
                                        </div>
                                    </div><br>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Username :-</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="username" id="username" value="<?php echo $row['username'];?>" class="form-control" required autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Password :-</label>
                                        <div class="col-sm-9">
                                             <input type="password" name="password" id="password" value="<?php echo $row['password'];?>" class="form-control" required autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email :-</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="email" id="email" value="<?php echo $row['email'];?>" class="form-control" required autocomplete="off">
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
        <!--**********************************
            Content body end
        ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->

	
</body>
</html>