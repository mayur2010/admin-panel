<?php 
    
    $page_title=(!isset($_GET['user_id'])) ? 'Add User' : 'Edit User';

    include('includes/header.php');

    include('includes/function.php');
    include('language/language.php');

    if(isset($_POST['submit']) and isset($_GET['add']))
    {
            $data = array(
                'country'=> cleanInput($_POST['country']), 
                'country_code'  =>  cleanInput($_POST['country_code']),
                'region_name'  =>  cleanInput($_POST['region_name']),
                'city'  =>  cleanInput($_POST['city']),
                'zip'  =>  cleanInput($_POST['zip']),
                'lat'  =>  cleanInput($_POST['lat']),
                'lon'  =>  cleanInput($_POST['lon']),
                'timezone'  =>  cleanInput($_POST['timezone']),
                'isp'  =>  cleanInput($_POST['isp']),
                'org'  =>  cleanInput($_POST['org']),
                'as_'  =>  cleanInput($_POST['as_']),
                'query'  =>  cleanInput($_POST['query']),
                'package'  =>  cleanInput($_POST['package']),
                'registered_on'  =>  strtotime(date('d-m-Y h:i:s A')),
            );

            $qry = Insert('tbl_users',$data);

            $_SESSION['class']="success";
            $_SESSION['msg']="10";

        header("location:manage_users.php");	 
        exit;
    }

    if(isset($_GET['user_id']))
    {
        $user_qry="SELECT * FROM tbl_users where id='".$_GET['user_id']."'";
        $user_result=mysqli_query($mysqli,$user_qry);
        $user_row=mysqli_fetch_assoc($user_result);
    }

    if(isset($_POST['submit']) and isset($_POST['user_id']))
    {
            
                $data = array(
                'country'=> cleanInput($_POST['country']), 
                'country_code'  =>  cleanInput($_POST['country_code']),
                'region_name'  =>  cleanInput($_POST['region_name']),
                'city'  =>  cleanInput($_POST['city']),
                'zip'  =>  cleanInput($_POST['zip']),
                'lat'  =>  cleanInput($_POST['lat']),
                'lon'  =>  cleanInput($_POST['lon']),
                'timezone'  =>  cleanInput($_POST['timezone']),
                'isp'  =>  cleanInput($_POST['isp']),
                'org'  =>  cleanInput($_POST['org']),
                'as_'  =>  cleanInput($_POST['as_']),
                'query'  =>  cleanInput($_POST['query']),
                'package'  =>  cleanInput($_POST['package']),
            );
        

                $user_edit=Update('tbl_users', $data, "WHERE id = '".$_POST['user_id']."'");

                $_SESSION['class']="success";

                $_SESSION['msg']="11";

        if(isset($_GET['redirect']))
        {
          header("Location:".$_GET['redirect']);
        }
        else
        {
          header("Location:add_user.php?user_id=".$_POST['user_id']);
        }
        exit;
    }
?>
 	

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
                        <input  type="hidden" name="user_id" value="<?php echo $_GET['user_id'];?>" />

                        <div class="form-group row">
                            <label class="col-md-3 control-label">country :-</label>
                            <div class="col-md-9">
                              <input type="text" name="country" id="country" value="<?php if(isset($_GET['user_id'])){echo $user_row['country'];}?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 control-label">country_code :-</label>
                            <div class="col-md-9">
                              <input type="text" name="country_code" id="country_code" value="<?php if(isset($_GET['user_id'])){echo $user_row['country_code'];}?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 control-label">region_name :-</label>
                            <div class="col-md-9">
                              <input type="text" name="region_name" id="region_name" value="<?php if(isset($_GET['user_id'])){echo $user_row['region_name'];}?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 control-label">city :-</label>
                            <div class="col-md-9">
                              <input type="text" name="city" id="city" value="<?php if(isset($_GET['user_id'])){echo $user_row['city'];}?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 control-label">zip :-</label>
                            <div class="col-md-9">
                              <input type="text" name="zip" id="zip" value="<?php if(isset($_GET['user_id'])){echo $user_row['zip'];}?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 control-label">lat :-</label>
                            <div class="col-md-9">
                              <input type="text" name="lat" id="lat" value="<?php if(isset($_GET['user_id'])){echo $user_row['lat'];}?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 control-label">lon :-</label>
                            <div class="col-md-9">
                              <input type="text" name="lon" id="lon" value="<?php if(isset($_GET['user_id'])){echo $user_row['lon'];}?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 control-label">timezone :-</label>
                            <div class="col-md-9">
                              <input type="text" name="timezone" id="timezone" value="<?php if(isset($_GET['user_id'])){echo $user_row['timezone'];}?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 control-label">isp :-</label>
                            <div class="col-md-9">
                              <input type="text" name="isp" id="isp" value="<?php if(isset($_GET['user_id'])){echo $user_row['isp'];}?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 control-label">org :-</label>
                            <div class="col-md-9">
                              <input type="text" name="org" id="org" value="<?php if(isset($_GET['user_id'])){echo $user_row['org'];}?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 control-label">as_ :-</label>
                            <div class="col-md-9">
                              <input type="text" name="as_" id="as_" value="<?php if(isset($_GET['user_id'])){echo $user_row['as_'];}?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 control-label">query :-</label>
                            <div class="col-md-9">
                              <input type="text" name="query" id="query" value="<?php if(isset($_GET['user_id'])){echo $user_row['query'];}?>" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 control-label">package :-</label>
                            <div class="col-md-9">
                              <input type="text" name="package" id="package" value="<?php if(isset($_GET['user_id'])){echo $user_row['package'];}?>" class="form-control" required>
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
