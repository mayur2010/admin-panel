<?php 
    
    $page_title=(!isset($_GET['user_block_id'])) ? 'Add Block User' : 'Edit Block User';

    include('includes/header.php');

    include('includes/function.php');
    include('language/language.php');

    $package_qry="SELECT * FROM tbl_apps WHERE status = 1 ORDER BY id";
    $package_result=mysqli_query($mysqli,$package_qry);

    // $device_qry="SELECT DISTINCT device_id FROM tbl_users WHERE status = 1 ORDER BY id";
    $device_qry="SELECT DISTINCT device_id FROM tbl_users"; // WHERE status = 1 ORDER BY id
    $device_result=mysqli_query($mysqli,$device_qry);

    if(isset($_POST['submit']) and isset($_GET['add']))
    {
            $data = array(
                'device_ids'=> html_entity_decode(implode(',', $_POST['device_ids']), ENT_QUOTES, "UTF-8"),
                'package_ids'  =>  html_entity_decode(implode(',', $_POST['package_ids']), ENT_QUOTES, "UTF-8"),
            );

            $qry = Insert('tbl_block_users',$data);

            $_SESSION['class']="success";
            $_SESSION['msg']="10";

        header("location:manage_block_users.php");	 
        exit;
    }

    if(isset($_GET['user_block_id']))
    {
        $user_qry="SELECT * FROM tbl_block_users where id='".$_GET['user_block_id']."'";
        $user_result=mysqli_query($mysqli,$user_qry);
        $user_row=mysqli_fetch_assoc($user_result);
    }

    if(isset($_POST['submit']) and isset($_POST['user_block_id']))
    {
            
        $data = array(
            'device_ids'=> html_entity_decode(implode(',', $_POST['device_ids']), ENT_QUOTES, "UTF-8"),
            'package_ids'  =>  html_entity_decode(implode(',', $_POST['package_ids']), ENT_QUOTES, "UTF-8"),
        );
        

        $user_edit=Update('tbl_block_users', $data, "WHERE id = '".$_POST['user_block_id']."'");

        $_SESSION['class']="success";

        $_SESSION['msg']="11";

        if(isset($_GET['redirect']))
        {
          header("Location:".$_GET['redirect']);
        }
        else
        {
          header("Location:add_block_user.php?user_block_id=".$_POST['user_block_id']);
        }
        exit;
    }
?>
 
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link rel="stylesheet" href="./vendor/select2/css/select2.min.css">
    <link href="./vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">	

    <div class="content-body">
        <div class="card-body">
            <div class="card">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-5 col-xxl-5 col-lg-5 col-md-5 col-sm-5" align="left">
                            <h2 class="text-black font-w600 mb-1"><?=$page_title?></h2>
                        </div>
                    </div>
                    <hr>
                    <form action="" method="post" class="form form-horizontal" enctype="multipart/form-data" >
                        <input  type="hidden" name="user_block_id" value="<?php echo $_GET['user_block_id'];?>" />

                        <div class="form-group row" style="display : flex">
                          <label class="col-md-3 control-label">Packages :-</label>
                          <div class="col-md-9">
                                <select name="package_ids[]" class="select2 multi-select"  style="padding: 10px 15px !important;" multiple="multiple">
                                  <?php
                                        $db_packages=explode(',', $user_row['package_ids']);
                                        while($package_row=mysqli_fetch_array($package_result))
                                            {
                                    ?>
                                    <option value="<?php echo $package_row['package_name'];?>" <?php if(in_array($package_row['package_name'],$db_packages)){ echo 'selected'; } ?>><?php echo $package_row['package_name'];?></option>
                                
                                    <?php
                                            }
                                    ?> 
                                </select>
                                
                          </div>
                        </div>

                        <div class="form-group row" style="display : flex">
                          <label class="col-md-3 control-label">Device Ids :-</label>
                          <div class="col-md-9">
                                <select name="device_ids[]" class="select2 multi-select"  style="padding: 10px 15px !important;" multiple="multiple">
                                  <?php
                                        $db_devices=explode(',', $user_row['device_ids']);
                                        while($device_row=mysqli_fetch_array($device_result))
                                            {
                                    ?>
                                    <option value="<?php echo $device_row['device_id'];?>" <?php if(in_array($device_row['device_id'],$db_devices)){ echo 'selected'; } ?>><?php echo $device_row['device_id'];?></option>
                                
                                    <?php
                                            }
                                    ?> 
                                </select>
                                
                          </div>
                        </div>
                        

                        <div class="form-group row">
                            <div class="col-md-9 col-md-offset-3">
                              <button type="submit" name="submit" class="btn btn-primary <?php echo PURCHASE; ?>">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <?php include("includes/footer.php");?>    
