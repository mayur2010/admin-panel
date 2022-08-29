  <?php 
    
    $page_title=(isset($_GET['apps_id'])) ? 'Edit App' : 'Add App';

    include("includes/header.php");
    require("includes/function.php");
    require("language/language.php");

    $cat_qry="SELECT * FROM tbl_page_category WHERE status = 1 ORDER BY id";
    $cat_result=mysqli_query($mysqli,$cat_qry);

    $country_qry="SELECT * FROM tbl_country WHERE status = 1 ORDER BY id";
    $country_result=mysqli_query($mysqli,$country_qry);

    $vpn_qry="SELECT * FROM tbl_vpn_key WHERE status = 1 ORDER BY id";
    $vpn_result=mysqli_query($mysqli,$vpn_qry);


    if(isset($_POST['submit']) and isset($_GET['add']))
    {
        $data = array( 
            'app_name'  =>   html_entity_decode($_POST['app_name'], ENT_QUOTES, "UTF-8"),
            'package_name'  =>   html_entity_decode($_POST['package_name'], ENT_QUOTES, "UTF-8"),
            'privacy_policy'  =>   html_entity_decode($_POST['privacy_policy'], ENT_QUOTES, "UTF-8"),
            'qureka_link'  =>   html_entity_decode($_POST['qureka_link'], ENT_QUOTES, "UTF-8"),
            'qureka_status'  =>   html_entity_decode($_POST['qureka_status'], ENT_QUOTES, "UTF-8"),
            'in_min'  =>   html_entity_decode($_POST['in_min'], ENT_QUOTES, "UTF-8"),
            'in_max'  =>   html_entity_decode($_POST['in_max'], ENT_QUOTES, "UTF-8"),
            'back_min'  =>   html_entity_decode($_POST['back_min'], ENT_QUOTES, "UTF-8"),
            'back_max'  =>   html_entity_decode($_POST['back_max'], ENT_QUOTES, "UTF-8"),
            'page_category_id'  => $_POST['cat_id'],
            'page_status' => html_entity_decode($_POST['page_status'], ENT_QUOTES, "UTF-8"),
            'in_ads_status' => html_entity_decode($_POST['in_ads_status'], ENT_QUOTES, "UTF-8"),
            'back_ads_status' => html_entity_decode($_POST['back_ads_status'], ENT_QUOTES, "UTF-8"),    
            'random_ads_status' => html_entity_decode($_POST['random_ads_status'], ENT_QUOTES, "UTF-8"), 
            'ads_type_1' => html_entity_decode($_POST['ads_type_1'], ENT_QUOTES, "UTF-8"),
            'ads_1_status' => html_entity_decode($_POST['ads_1_status'], ENT_QUOTES, "UTF-8"),
            'banner_1' => html_entity_decode($_POST['banner_1'], ENT_QUOTES, "UTF-8"),
            'inter_id_1' => html_entity_decode($_POST['inter_id_1'], ENT_QUOTES, "UTF-8"),
            'native_1' => html_entity_decode($_POST['native_1'], ENT_QUOTES, "UTF-8"),
            'full_native_1' => html_entity_decode($_POST['full_native_1'], ENT_QUOTES, "UTF-8"),
            'open_ads_1' => html_entity_decode($_POST['open_ads_1'], ENT_QUOTES, "UTF-8"),
            'back_inter_1' => html_entity_decode($_POST['back_inter_1'], ENT_QUOTES, "UTF-8"),  
            'ads_type_2' => html_entity_decode($_POST['ads_type_2'], ENT_QUOTES, "UTF-8"),
            'ads_2_status' => html_entity_decode($_POST['ads_2_status'], ENT_QUOTES, "UTF-8"),
            'banner_2' => html_entity_decode($_POST['banner_2'], ENT_QUOTES, "UTF-8"),
            'inter_id_2' => html_entity_decode($_POST['inter_id_2'], ENT_QUOTES, "UTF-8"),
            'native_2' => html_entity_decode($_POST['native_2'], ENT_QUOTES, "UTF-8"),
            'full_native_2' => html_entity_decode($_POST['full_native_2'], ENT_QUOTES, "UTF-8"),
            'open_ads_2' => html_entity_decode($_POST['open_ads_2'], ENT_QUOTES, "UTF-8"),
            'back_inter_2' => html_entity_decode($_POST['back_inter_2'], ENT_QUOTES, "UTF-8"),
            'ads_type_3' => html_entity_decode($_POST['ads_type_3'], ENT_QUOTES, "UTF-8"),
            'ads_3_status' => html_entity_decode($_POST['ads_3_status'], ENT_QUOTES, "UTF-8"),
            'banner_3' => html_entity_decode($_POST['banner_3'], ENT_QUOTES, "UTF-8"),
            'inter_id_3' => html_entity_decode($_POST['inter_id_3'], ENT_QUOTES, "UTF-8"),
            'native_3' => html_entity_decode($_POST['native_3'], ENT_QUOTES, "UTF-8"),
            'full_native_3' => html_entity_decode($_POST['full_native_3'], ENT_QUOTES, "UTF-8"),
            'open_ads_3' => html_entity_decode($_POST['open_ads_3'], ENT_QUOTES, "UTF-8"),
            'back_inter_3' => html_entity_decode($_POST['back_inter_3'], ENT_QUOTES, "UTF-8"),
            'vpn_status' => html_entity_decode($_POST['vpn_status'], ENT_QUOTES, "UTF-8"),
            'vpn_country' => html_entity_decode(implode(',', $_POST['country_id']), ENT_QUOTES, "UTF-8"),
            'vpn_country_key' => html_entity_decode($_POST['vpn_key_id'], ENT_QUOTES, "UTF-8"),
            'location_status' => html_entity_decode($_POST['location_status'], ENT_QUOTES, "UTF-8"),
            'location' => html_entity_decode($_POST['location_tags'], ENT_QUOTES, "UTF-8"),
            'time_status' => html_entity_decode($_POST['time_status'], ENT_QUOTES, "UTF-8"),
            'start_time' => html_entity_decode($_POST['start_time'], ENT_QUOTES, "UTF-8"),
            'end_time' => html_entity_decode($_POST['end_time'], ENT_QUOTES, "UTF-8"),
        );    

        $qry = Insert('tbl_apps',$data);  

        $_SESSION['msg']="10";
        $_SESSION['class']='success';
        header( "Location:manage_apps.php");
        exit;
    }

    if(isset($_GET['apps_id']))
    {
        $qry="SELECT * FROM tbl_apps where id='".$_GET['apps_id']."'";
        $result=mysqli_query($mysqli,$qry);
        $row=mysqli_fetch_assoc($result);
    }
    if(isset($_POST['submit']) and isset($_POST['apps_id']))
    {

        $data = array( 
            'app_name'  =>   html_entity_decode($_POST['app_name'], ENT_QUOTES, "UTF-8"),
            'package_name'  =>   html_entity_decode($_POST['package_name'], ENT_QUOTES, "UTF-8"),
            'privacy_policy'  =>   html_entity_decode($_POST['privacy_policy'], ENT_QUOTES, "UTF-8"),
            'qureka_link'  =>   html_entity_decode($_POST['qureka_link'], ENT_QUOTES, "UTF-8"),
            'qureka_status'  =>   html_entity_decode($_POST['qureka_status'], ENT_QUOTES, "UTF-8"),
            'in_min'  =>   html_entity_decode($_POST['in_min'], ENT_QUOTES, "UTF-8"),
            'in_max'  =>   html_entity_decode($_POST['in_max'], ENT_QUOTES, "UTF-8"),
            'back_min'  =>   html_entity_decode($_POST['back_min'], ENT_QUOTES, "UTF-8"),
            'back_max'  =>   html_entity_decode($_POST['back_max'], ENT_QUOTES, "UTF-8"),
            'page_category_id'  => $_POST['cat_id'],
            'page_status' => html_entity_decode($_POST['page_status'], ENT_QUOTES, "UTF-8"),
            'in_ads_status' => html_entity_decode($_POST['in_ads_status'], ENT_QUOTES, "UTF-8"),
            'back_ads_status' => html_entity_decode($_POST['back_ads_status'], ENT_QUOTES, "UTF-8"),    
            'random_ads_status' => html_entity_decode($_POST['random_ads_status'], ENT_QUOTES, "UTF-8"), 
            'ads_type_1' => html_entity_decode($_POST['ads_type_1'], ENT_QUOTES, "UTF-8"),
            'ads_1_status' => html_entity_decode($_POST['ads_1_status'], ENT_QUOTES, "UTF-8"),
            'banner_1' => html_entity_decode($_POST['banner_1'], ENT_QUOTES, "UTF-8"),
            'inter_id_1' => html_entity_decode($_POST['inter_id_1'], ENT_QUOTES, "UTF-8"),
            'native_1' => html_entity_decode($_POST['native_1'], ENT_QUOTES, "UTF-8"),
            'full_native_1' => html_entity_decode($_POST['full_native_1'], ENT_QUOTES, "UTF-8"),
            'open_ads_1' => html_entity_decode($_POST['open_ads_1'], ENT_QUOTES, "UTF-8"),
            'back_inter_1' => html_entity_decode($_POST['back_inter_1'], ENT_QUOTES, "UTF-8"),
            'ads_type_2' => html_entity_decode($_POST['ads_type_2'], ENT_QUOTES, "UTF-8"),
            'ads_2_status' => html_entity_decode($_POST['ads_2_status'], ENT_QUOTES, "UTF-8"),
            'banner_2' => html_entity_decode($_POST['banner_2'], ENT_QUOTES, "UTF-8"),
            'inter_id_2' => html_entity_decode($_POST['inter_id_2'], ENT_QUOTES, "UTF-8"),
            'native_2' => html_entity_decode($_POST['native_2'], ENT_QUOTES, "UTF-8"),
            'full_native_2' => html_entity_decode($_POST['full_native_2'], ENT_QUOTES, "UTF-8"),
            'open_ads_2' => html_entity_decode($_POST['open_ads_2'], ENT_QUOTES, "UTF-8"),
            'back_inter_2' => html_entity_decode($_POST['back_inter_2'], ENT_QUOTES, "UTF-8"),
            'ads_type_3' => html_entity_decode($_POST['ads_type_3'], ENT_QUOTES, "UTF-8"),
            'ads_3_status' => html_entity_decode($_POST['ads_3_status'], ENT_QUOTES, "UTF-8"),
            'banner_3' => html_entity_decode($_POST['banner_3'], ENT_QUOTES, "UTF-8"),
            'inter_id_3' => html_entity_decode($_POST['inter_id_3'], ENT_QUOTES, "UTF-8"),
            'native_3' => html_entity_decode($_POST['native_3'], ENT_QUOTES, "UTF-8"),
            'full_native_3' => html_entity_decode($_POST['full_native_3'], ENT_QUOTES, "UTF-8"),
            'open_ads_3' => html_entity_decode($_POST['open_ads_3'], ENT_QUOTES, "UTF-8"),
            'back_inter_3' => html_entity_decode($_POST['back_inter_3'], ENT_QUOTES, "UTF-8"),
            'vpn_status' => html_entity_decode($_POST['vpn_status'], ENT_QUOTES, "UTF-8"),
            'vpn_country' => html_entity_decode(implode(',', $_POST['country_id']), ENT_QUOTES, "UTF-8"),
            //implode(',', $_POST['wallpaper_color']) //$_POST['country_id']
            'vpn_country_key' => html_entity_decode($_POST['vpn_key_id'], ENT_QUOTES, "UTF-8"),
            'location_status' => html_entity_decode($_POST['location_status'], ENT_QUOTES, "UTF-8"),
            'location' => html_entity_decode($_POST['location_tags'], ENT_QUOTES, "UTF-8"),
            'time_status' => html_entity_decode($_POST['time_status'], ENT_QUOTES, "UTF-8"),
            'start_time' => html_entity_decode($_POST['start_time'], ENT_QUOTES, "UTF-8"),
            'end_time' => html_entity_decode($_POST['end_time'], ENT_QUOTES, "UTF-8"),
        );

        $category_edit=Update('tbl_apps', $data, "WHERE id = '".$_POST['apps_id']."'");

        $_SESSION['msg']="11";
        $_SESSION['class']='success'; 
        
        if(isset($_GET['redirect']))
        {
          header("Location:".$_GET['redirect']);
        }
        else
        {
          header( "Location:add_apps.php?pages_id=".$_POST['apps_id']);
        }
        exit;
    }

?>

    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link rel="stylesheet" href="./vendor/select2/css/select2.min.css">
    <link href="./vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">

    <style type="text/css">
        .select2-container .select2-selection--multiple {
            padding: 10px 15px !important;
        }

        .control-label-help {
            color: red;
            font-size: 14px;
        }

        .bootstrap-tagsinput {
            background-color: #fff;
            border: 2px solid #ccc;
            box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
            display: inline-block;
            color: #555;
            vertical-align: middle;
            border-radius: 4px;
            width: 100%;
            cursor: text;
            padding: 10px 15px !important;
            line-height: 28px !important;
        }

        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: white;
        }

        .label.label-info {
            background-color: #39c3da;
        }

        .label.label {
            background-color: #2f4cdd;
        }

        .label {
            border-radius: 12px;
            padding: 5px 12px;
            text-transform: uppercase;
            font-size: 10px;
        }

        .label-info {
            background-color: #5bc0de;
        }

        .label {
            display: inline;
            padding: .2em .6em .3em;
            font-size: 75%;
            font-weight: bold;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25em;
        }

        .bootstrap-tagsinput .tag [data-role="remove"] {
            margin-left: 8px;
            cursor: pointer;
        }

        .bootstrap-tagsinput .tag [data-role="remove"]:after {
            content: "x";
            padding: 0px 2px;
        }

        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: white;
        }

        .bootstrap-tagsinput input {
            border: none;
            box-shadow: none;
            outline: none;
            background-color: transparent;
            padding: 0 6px;
            margin: 0;
            width: auto;
            max-width: inherit;
        }

        .bootstrap-tagsinput:nth-child(1) {
            display: none;
        }

        .label.label {
            background-color: #f44336 !important;
        }
    </style>

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
                        <div class="clearfix"></div>
                        <div class="card-body mrg_bottom"> 
                            <form action="" name="addeditcategory" method="post" class="form form-horizontal" enctype="multipart/form-data">
                              <input  type="hidden" name="apps_id" value="<?php echo $_GET['apps_id'];?>" />
                    
                              <div class="section">
                                <div class="section-body">

                                    <div class="form-group" style="display : flex;">
                                        <label class="col-md-3 control-label">App Name :-</label>
                                        <div class="col-md-9">
                                          <input type="text" name="app_name" id="app_name" value="<?php if(isset($_GET['apps_id'])){echo $row['app_name'];}?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group" style="display : flex;">
                                        <label class="col-md-3 control-label">Package Name :-</label>
                                        <div class="col-md-9">
                                          <input type="text" name="package_name" id="package_name" value="<?php if(isset($_GET['apps_id'])){echo $row['package_name'];}?>" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="form-group" style="display : flex;">
                                        <label class="col-md-3 control-label">Privacy Policy :-</label>
                                        <div class="col-md-9">
                                          <input type="text" name="privacy_policy" id="privacy_policy" value="<?php if(isset($_GET['apps_id'])){echo $row['privacy_policy'];}?>" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="form-group" style="display : flex;">
                                        <label class="col-md-3 control-label">Qureka Link :-</label>
                                        <div class="col-md-9">
                                          <input type="text" name="qureka_link" id="qureka_link" value="<?php if(isset($_GET['apps_id'])){echo $row['qureka_link'];}?>" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="form-group row">                                        
                                        <label class="col-md-3 col-form-label">Qureka Status :-</label>
                                        <div class="col-md-9">
                                            <select name="qureka_status" class="select2"  id="single-select">
                                                <option value="true" <?php if ($row['qureka_status'] == 'true') { ?>selected<?php } ?>>ON</option>
                                                <option value="false" <?php if ($row['qureka_status'] == 'false') { ?>selected<?php } ?>>OFF</option>
                                            </select> 
                                        </div>
                                    </div>

                                    <div class="form-group row">                                        
                                        <label class="col-md-3 col-form-label">In Ads Status :-</label>
                                        <div class="col-md-9">
                                            <select name="in_ads_status" class="select2"  id="single-select">
                                                <option value="true" <?php if ($row['in_ads_status'] == 'true') { ?>selected<?php } ?>>ON</option>
                                                <option value="false" <?php if ($row['in_ads_status'] == 'false') { ?>selected<?php } ?>>OFF</option>
                                            </select> 
                                        </div>
                                    </div>

                                    <div class="form-group" style="display : flex;">
                                        <label class="col-md-3 control-label">In Min :-</label>
                                        <div class="col-md-9">
                                          <input type="number" name="in_min" id="in_min" value="<?php if(isset($_GET['apps_id'])){echo $row['in_min'];}?>" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="form-group" style="display : flex;">
                                        <label class="col-md-3 control-label">In Max :-</label>
                                        <div class="col-md-9">
                                          <input type="number" name="in_max" id="in_max" value="<?php if(isset($_GET['apps_id'])){echo $row['in_max'];}?>" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="form-group row">                                        
                                        <label class="col-md-3 col-form-label">Back Ads Status :-</label>
                                        <div class="col-md-9">
                                            <select name="back_ads_status" class="select2"  id="single-select">
                                                <option value="true" <?php if ($row['back_ads_status'] == 'true') { ?>selected<?php } ?>>ON</option>
                                                <option value="false" <?php if ($row['back_ads_status'] == 'false') { ?>selected<?php } ?>>OFF</option>
                                            </select> 
                                        </div>
                                    </div>

                                    <div class="form-group" style="display : flex;">
                                        <label class="col-md-3 control-label">Back Min :-</label>
                                        <div class="col-md-9">
                                          <input type="number" name="back_min" id="back_min" value="<?php if(isset($_GET['apps_id'])){echo $row['back_min'];}?>" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="form-group" style="display : flex;">
                                        <label class="col-md-3 control-label">Back Max :-</label>
                                        <div class="col-md-9">
                                          <input type="number" name="back_max" id="back_max" value="<?php if(isset($_GET['apps_id'])){echo $row['back_max'];}?>" class="form-control" >
                                        </div>
                                    </div>
                                     
                                    <div class="form-group row">                                        
                                        <label class="col-md-3 col-form-label">Page Category :-</label>
                                        <div class="col-md-9">
                                            <select name="cat_id" class="select2"  id="single-select">
                                                <?php
                                                    while($cat_row=mysqli_fetch_array($cat_result))
                                                        {
                                                ?>
                                                <option value="<?php echo $cat_row['id'];?>" <?php if($cat_row['id'] == $row['page_category_id']){?>selected<?php }?>><?php echo $cat_row['page_name'];?></option>
                                            
                                                <?php
                                                        }
                                                ?> 
                                            </select> 
                                        </div>
                                    </div>

                                    <div class="form-group row">                                        
                                        <label class="col-md-3 col-form-label">Page Status :-</label>
                                        <div class="col-md-9">
                                            <select name="page_status" class="select2"  id="single-select">
                                                <option value="true" <?php if ($row['page_status'] == 'true') { ?>selected<?php } ?>>ON</option>
                                                <option value="false" <?php if ($row['page_status'] == 'false') { ?>selected<?php } ?>>OFF</option>
                                            </select> 
                                        </div>
                                    </div>

                                    <div class="form-group row">                                        
                                        <label class="col-md-3 col-form-label">Random Ads Status :-</label>
                                        <div class="col-md-9">
                                            <select name="random_ads_status" class="select2"  id="single-select">
                                                <option value="true" <?php if ($row['random_ads_status'] == 'true') { ?>selected<?php } ?>>ON</option>
                                                <option value="false" <?php if ($row['random_ads_status'] == 'false') { ?>selected<?php } ?>>OFF</option>
                                            </select> 
                                        </div>
                                    </div>

                                    <div style=" border: 1px solid #00000052; margin-bottom: 20px; padding: 25px !important; ">

                                        <div class="form-group row">                                        
                                            <label class="col-md-3 col-form-label">Ads Type :-</label>
                                            <div class="col-md-9">
                                                <select name="ads_type_1" class="select2"  id="1_ads_type">
                                                    <option value="Google" <?php if ($row['ads_type_1'] == 'Google') { ?>selected<?php } ?>>Google</option>
                                                    <option value="Facebook" <?php if ($row['ads_type_1'] == 'Facebook') { ?>selected<?php } ?>>Facebook</option>
                                                </select> 
                                            </div>
                                        </div>

                                        <div class="form-group row">                                        
                                            <label class="col-md-3 col-form-label">Ads Status :-</label>
                                            <div class="col-md-9">
                                                <select name="ads_1_status" class="select2"  id="single-select">
                                                    <option value="true" <?php if ($row['ads_1_status'] == 'true') { ?>selected<?php } ?>>ON</option>
                                                    <option value="false" <?php if ($row['ads_1_status'] == 'false') { ?>selected<?php } ?>>OFF</option>
                                                </select> 
                                            </div>
                                        </div>

                                        <div class="form-group" style="display : flex;">
                                            <label class="col-md-3 control-label">Banner :-</label>
                                            <div class="col-md-9">
                                              <input type="text" name="banner_1" id="banner_1" value="<?php if(isset($_GET['apps_id'])){echo $row['banner_1'];}?>" class="form-control" >
                                            </div>
                                        </div>

                                        <div class="form-group" style="display : flex;">
                                            <label class="col-md-3 control-label">Inter Id :-</label>
                                            <div class="col-md-9">
                                              <input type="text" name="inter_id_1" id="inter_id_1" value="<?php if(isset($_GET['apps_id'])){echo $row['inter_id_1'];}?>" class="form-control" >
                                            </div>
                                        </div>

                                        <div class="form-group" style="display : flex;">
                                            <label class="col-md-3 control-label">Native :-</label>
                                            <div class="col-md-9">
                                              <input type="text" name="native_1" id="native_1" value="<?php if(isset($_GET['apps_id'])){echo $row['native_1'];}?>" class="form-control" >
                                            </div>
                                        </div>

                                        <div class="form-group row" style="display: none;" id="1_fb">
                                            <label class="col-md-3 control-label">Full Native :-</label>
                                            <div class="col-md-9">
                                              <input type="text" name="full_native_1" id="full_native_1" value="<?php if(isset($_GET['apps_id'])){echo $row['full_native_1'];}?>" class="form-control" >
                                            </div>
                                        </div>

                                        <div class="form-group row" id="1_gg">
                                            <label class="col-md-3 control-label">Open Ads :-</label>
                                            <div class="col-md-9">
                                              <input type="text" name="open_ads_1" id="open_ads_1" value="<?php if(isset($_GET['apps_id'])){echo $row['open_ads_1'];}?>" class="form-control" >
                                            </div>
                                        </div>

                                        <div class="form-group" style="display : flex;">
                                            <label class="col-md-3 control-label">Back Inter :-</label>
                                            <div class="col-md-9">
                                              <input type="text" name="back_inter_1" id="back_inter_1" value="<?php if(isset($_GET['apps_id'])){echo $row['back_inter_1'];}?>" class="form-control" >
                                            </div>
                                        </div>

                                    </div>

                                    <div style=" border: 1px solid #00000052; margin-bottom: 20px; padding: 25px !important; ">

                                        <div class="form-group row">                                        
                                            <label class="col-md-3 col-form-label">Ads Type :-</label>
                                            <div class="col-md-9">
                                                <select name="ads_type_2" class="select2"  id="2_ads_type">
                                                    <option value="Google" <?php if ($row['ads_type_2'] == 'Google') { ?>selected<?php } ?>>Google</option>
                                                    <option value="Facebook" <?php if ($row['ads_type_2'] == 'Facebook') { ?>selected<?php } ?>>Facebook</option>
                                                </select> 
                                            </div>
                                        </div>

                                        <div class="form-group row">                                        
                                            <label class="col-md-3 col-form-label">Ads Status :-</label>
                                            <div class="col-md-9">
                                                <select name="ads_2_status" class="select2"  id="single-select">
                                                    <option value="true" <?php if ($row['ads_2_status'] == 'true') { ?>selected<?php } ?>>ON</option>
                                                    <option value="false" <?php if ($row['ads_2_status'] == 'false') { ?>selected<?php } ?>>OFF</option>
                                                </select> 
                                            </div>
                                        </div>

                                        <div class="form-group" style="display : flex;">
                                            <label class="col-md-3 control-label">Banner :-</label>
                                            <div class="col-md-9">
                                              <input type="text" name="banner_2" id="banner_2" value="<?php if(isset($_GET['apps_id'])){echo $row['banner_2'];}?>" class="form-control" >
                                            </div>
                                        </div>

                                        <div class="form-group" style="display : flex;">
                                            <label class="col-md-3 control-label">Inter Id :-</label>
                                            <div class="col-md-9">
                                              <input type="text" name="inter_id_2" id="inter_id_2" value="<?php if(isset($_GET['apps_id'])){echo $row['inter_id_2'];}?>" class="form-control" >
                                            </div>
                                        </div>

                                        <div class="form-group" style="display : flex;">
                                            <label class="col-md-3 control-label">Native :-</label>
                                            <div class="col-md-9">
                                              <input type="text" name="native_2" id="native_2" value="<?php if(isset($_GET['apps_id'])){echo $row['native_2'];}?>" class="form-control" >
                                            </div>
                                        </div>

                                        <div class="form-group row" style="display: none;" id="2_fb">
                                            <label class="col-md-3 control-label">Full Native :-</label>
                                            <div class="col-md-9">
                                              <input type="text" name="full_native_2" id="full_native_2" value="<?php if(isset($_GET['apps_id'])){echo $row['full_native_2'];}?>" class="form-control" >
                                            </div>
                                        </div>

                                        <div class="form-group row" id="2_gg">
                                            <label class="col-md-3 control-label">Open Ads :-</label>
                                            <div class="col-md-9">
                                              <input type="text" name="open_ads_2" id="open_ads_2" value="<?php if(isset($_GET['apps_id'])){echo $row['open_ads_2'];}?>" class="form-control" >
                                            </div>
                                        </div>

                                        <div class="form-group" style="display : flex;">
                                            <label class="col-md-3 control-label">Back Inter :-</label>
                                            <div class="col-md-9">
                                              <input type="text" name="back_inter_2" id="back_inter_2" value="<?php if(isset($_GET['apps_id'])){echo $row['back_inter_2'];}?>" class="form-control" >
                                            </div>
                                        </div>

                                    </div>

                                    <div style=" border: 1px solid #00000052; margin-bottom: 20px; padding: 25px !important; ">

                                        <div class="form-group row">                                        
                                            <label class="col-md-3 col-form-label">Ads Type :-</label>
                                            <div class="col-md-9">
                                                <select name="ads_type_3" class="select2"  id="3_ads_type">
                                                    <option value="Google" <?php if ($row['ads_type_3'] == 'Google') { ?>selected<?php } ?>>Google</option>
                                                    <option value="Facebook" <?php if ($row['ads_type_3'] == 'Facebook') { ?>selected<?php } ?>>Facebook</option>
                                                </select> 
                                            </div>
                                        </div>

                                        <div class="form-group row">                                        
                                            <label class="col-md-3 col-form-label">Ads Status :-</label>
                                            <div class="col-md-9">
                                                <select name="ads_3_status" class="select2"  id="single-select">
                                                    <option value="true" <?php if ($row['ads_3_status'] == 'true') { ?>selected<?php } ?>>ON</option>
                                                    <option value="false" <?php if ($row['ads_3_status'] == 'false') { ?>selected<?php } ?>>OFF</option>
                                                </select> 
                                            </div>
                                        </div>

                                        <div class="form-group" style="display : flex;">
                                            <label class="col-md-3 control-label">Banner :-</label>
                                            <div class="col-md-9">
                                              <input type="text" name="banner_3" id="banner_3" value="<?php if(isset($_GET['apps_id'])){echo $row['banner_3'];}?>" class="form-control" >
                                            </div>
                                        </div>

                                        <div class="form-group" style="display : flex;">
                                            <label class="col-md-3 control-label">Inter Id :-</label>
                                            <div class="col-md-9">
                                              <input type="text" name="inter_id_3" id="inter_id_3" value="<?php if(isset($_GET['apps_id'])){echo $row['inter_id_3'];}?>" class="form-control" >
                                            </div>
                                        </div>

                                        <div class="form-group" style="display : flex;">
                                            <label class="col-md-3 control-label">Native :-</label>
                                            <div class="col-md-9">
                                              <input type="text" name="native_3" id="native_3" value="<?php if(isset($_GET['apps_id'])){echo $row['native_3'];}?>" class="form-control" >
                                            </div>
                                        </div>

                                        <div class="form-group row" style="display : none;" id="3_fb">
                                            <label class="col-md-3 control-label">Full Native :-</label>
                                            <div class="col-md-9">
                                              <input type="text" name="full_native_3" id="full_native_3" value="<?php if(isset($_GET['apps_id'])){echo $row['full_native_3'];}?>" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row" id="3_gg">
                                            <label class="col-md-3 control-label">Open Ads :-</label>
                                            <div class="col-md-9">
                                              <input type="text" name="open_ads_3" id="open_ads_3" value="<?php if(isset($_GET['apps_id'])){echo $row['open_ads_3'];}?>" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group" style="display : flex;">
                                            <label class="col-md-3 control-label">Back Inter :-</label>
                                            <div class="col-md-9">
                                              <input type="text" name="back_inter_3" id="back_inter_3" value="<?php if(isset($_GET['apps_id'])){echo $row['back_inter_3'];}?>" class="form-control" >
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group row">                                        
                                        <label class="col-md-3 col-form-label">Vpn Status :-</label>
                                        <div class="col-md-9">
                                            <select name="vpn_status"  class="select2" id="single-select">
                                                <option value="true" <?php if ($row['vpn_status'] == 'true') { ?>selected<?php } ?>>ON</option>
                                                <option value="false" <?php if ($row['vpn_status'] == 'false') { ?>selected<?php } ?>>OFF</option>
                                            </select> 
                                        </div>
                                    </div>

                                    <div class="form-group row" style="display : flex">
                                      <label class="col-md-3 control-label">Vpn Country :-</label>
                                      <div class="col-md-9">
                                            <select name="country_id[]" class="select2 multi-select"  style="padding: 10px 15px !important;" multiple="multiple">
                                              <?php
                                                    $db_countries=explode(',', $row['vpn_country']);
                                                    while($country_row=mysqli_fetch_array($country_result))
                                                        {
                                                ?>
                                                <option value="<?php echo $country_row['id'];?>" <?php if(in_array($country_row['id'],$db_countries)){ echo 'selected'; } ?>><?php echo $country_row['country_name'];?></option>
                                            
                                                <?php
                                                        }
                                                ?> 
                                            </select>
                                            
                                      </div>
                                    </div>

                                    <div class="form-group row">                                        
                                        <label class="col-md-3 col-form-label">Vpn Key :-</label>
                                        <div class="col-md-9">
                                            <select name="vpn_key_id" class="select2" id="single-select">
                                                <?php
                                                    while($vpn_row=mysqli_fetch_array($vpn_result))
                                                        {
                                                ?>
                                                <option value="<?php echo $vpn_row['id'];?>" <?php if($vpn_row['id'] == $row['vpn_country_key']){?>selected<?php }?>><?php echo $vpn_row['vpn_key'];?></option>
                                            
                                                <?php
                                                        }
                                                ?> 
                                            </select> 
                                        </div>
                                    </div>

                                    <div class="form-group row">                                        
                                        <label class="col-md-3 col-form-label">Location Status :-</label>
                                        <div class="col-md-9">
                                            <select name="location_status" class="select2" id="single-select">
                                                <option value="true" <?php if ($row['location_status'] == 'true') { ?>selected<?php } ?>>Allow</option>
                                                <option value="false" <?php if ($row['location_status'] == 'false') { ?>selected<?php } ?>>Block</option>
                                            </select> 
                                        </div>
                                    </div>

                                    <div class="form-group row" style="display : flex">
                                      <label class="col-md-3 control-label">Location :-
                                      </label>
                                      <div class="col-md-9">
                                            <input type="text" value="<?php if(isset($_GET['apps_id'])){echo trim($row['location']);}else{ echo 'India'; } ?>" data-role="tagsinput" name="location_tags" class="form-control"  />  
                                      </div>
                                    </div>

                                    <div class="form-group row">                                        
                                        <label class="col-md-3 col-form-label">Time Status :-</label>
                                        <div class="col-md-9">
                                            <select name="time_status" class="select2"  id="single-select">
                                                <option value="true" <?php if ($row['time_status'] == 'true') { ?>selected<?php } ?>>ON</option>
                                                <option value="false" <?php if ($row['time_status'] == 'false') { ?>selected<?php } ?>>OFF</option>
                                            </select> 
                                        </div>
                                    </div>

                                    <div class="form-group" style="display : flex;">
                                        <label class="col-md-3 control-label">Start Time :-</label>
                                        <div class="col-md-9">
                                            <input type="time" name="start_time" id="start_time" value="<?php if(isset($_GET['apps_id'])){echo $row['start_time'];}?>" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="form-group" style="display : flex;">
                                        <label class="col-md-3 control-label">End Time :-</label>
                                        <div class="col-md-9">
                                            <input type="time" name="end_time" id="end_time" value="<?php if(isset($_GET['apps_id'])){echo $row['end_time'];}?>" class="form-control" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-9 col-md-offset-3">
                                            <button type="submit" name="submit" class="btn btn-primary <?php echo PURCHASE; ?>">Save</button>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script type="text/javascript">

        var type='Google';

       $(function(){

        $("#1_ads_type").change(function(){

        type=$("#1_ads_type").val();


        if(type=="Google")
        {
          $("#1_gg").show();
          $("#1_fb").hide();
        }
        else if(type=="Facebook")
        {                 
          $("#1_gg").hide();
          $("#1_fb").show();
        }
        else
        {
          $("#1_gg").hide();
          $("#1_fb").hide();
        }
    });

    type=$("#1_ads_type").val();

    if(type=="Google")
        {
          $("#1_gg").show();
          $("#1_fb").hide();
        }
        else if(type=="Facebook")
        {                 
          $("#1_gg").hide();
          $("#1_fb").show();
        }
        else
        {
          $("#1_gg").hide();
          $("#1_fb").hide();
        }

  });

       $(function(){

        $("#2_ads_type").change(function(){

        type=$("#2_ads_type").val();


        if(type=="Google")
        {
          $("#2_gg").show();
          $("#2_fb").hide();
        }
        else if(type=="Facebook")
        {                 
          $("#2_gg").hide();
          $("#2_fb").show();
        }
        else
        {
          $("#2_gg").hide();
          $("#2_fb").hide();
        }
    });

    type=$("#2_ads_type").val();

    if(type=="Google")
        {
          $("#2_gg").show();
          $("#2_fb").hide();
        }
        else if(type=="Facebook")
        {                 
          $("#2_gg").hide();
          $("#2_fb").show();
        }
        else
        {
          $("#2_gg").hide();
          $("#2_fb").hide();
        }

  });

        $(function(){

        $("#3_ads_type").change(function(){

        type=$("#3_ads_type").val();


        if(type=="Google")
        {
          $("#3_gg").show();
          $("#3_fb").hide();
        }
        else if(type=="Facebook")
        {                 
          $("#3_gg").hide();
          $("#3_fb").show();
        }
        else
        {
          $("#3_gg").hide();
          $("#3_fb").hide();
        }
    });

    type=$("#3_ads_type").val();

    if(type=="Google")
        {
          $("#3_gg").show();
          $("#3_fb").hide();
        }
        else if(type=="Facebook")
        {                 
          $("#3_gg").hide();
          $("#3_fb").show();
        }
        else
        {
          $("#3_gg").hide();
          $("#3_fb").hide();
        }

  });
    </script>
  <?php include("includes/footer.php");?>    
     



