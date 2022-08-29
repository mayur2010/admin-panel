  <?php 
    
    $page_title=(isset($_GET['pages_id'])) ? 'Edit Page' : 'Add Page';

    include("includes/header.php");
    require("includes/function.php");
    require("language/language.php");

    $cat_qry="SELECT * FROM tbl_page_category WHERE status = 1 ORDER BY id";
    $cat_result=mysqli_query($mysqli,$cat_qry);

    if(isset($_POST['submit']) and isset($_GET['add']))
    {
        $data = array( 
            'pc_id'  => $_POST['cat_id'],
            'page_text'  =>   html_entity_decode($_POST['page_text'], ENT_QUOTES, "UTF-8")
        );    

        $qry = Insert('tbl_pages',$data);  

        $_SESSION['msg']="10";
        $_SESSION['class']='success';
        header( "Location:manage_pages.php");
        exit;
    }

    if(isset($_GET['pages_id']))
    {
        $qry="SELECT * FROM tbl_pages where id='".$_GET['pages_id']."'";
        $result=mysqli_query($mysqli,$qry);
        $row=mysqli_fetch_assoc($result);
    }
    if(isset($_POST['submit']) and isset($_POST['pages_id']))
    {

        $data = array( 
            'pc_id'  => $_POST['cat_id'],
            'page_text'  =>  html_entity_decode($_POST['page_text'], ENT_QUOTES, "UTF-8"),
        );

        $category_edit=Update('tbl_pages', $data, "WHERE id = '".$_POST['pages_id']."'");

        $_SESSION['msg']="11";
        $_SESSION['class']='success'; 
        
        if(isset($_GET['redirect']))
        {
          header("Location:".$_GET['redirect']);
        }
        else
        {
          header( "Location:add_pages.php?pages_id=".$_POST['pages_id']);
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
                        <div class="clearfix"></div>
                        <div class="card-body mrg_bottom"> 
                            <form action="" name="addeditcategory" method="post" class="form form-horizontal" enctype="multipart/form-data">
                              <input  type="hidden" name="pages_id" value="<?php echo $_GET['pages_id'];?>" />
                    
                              <div class="section">
                                <div class="section-body">

                                     
                                     <div class="form-group row">                                        
                                        <label class="col-md-3 col-form-label">Page Category :-</label>
                                        <div class="col-md-9">
                                            <select name="cat_id" class="select2"  id="single-select">
                                                <?php
                                                    while($cat_row=mysqli_fetch_array($cat_result))
                                                        {
                                                ?>
                                                <option value="<?php echo $cat_row['id'];?>" <?php if($cat_row['id'] == $row['pc_id']){?>selected<?php }?>><?php echo $cat_row['page_name'];?></option>
                                            
                                                <?php
                                                        }
                                                ?> 
                                            </select> 
                                        </div>
                                    </div>

                                    <div class="form-group" style="display : flex;">
                                        <label class="col-md-3 control-label">Page Text :-</label>
                                        <div class="col-md-9">
                                          <input type="text" name="page_text" id="page_text" value="<?php if(isset($_GET['pages_id'])){echo $row['page_text'];}?>" class="form-control" required>
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
    <?php include("includes/footer.php");?>    

