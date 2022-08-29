  <?php 
    
    $page_title=(isset($_GET['page_id'])) ? 'Edit Page Category' : 'Add Page Category';

    include("includes/header.php");
    require("includes/function.php");
    require("language/language.php");


    if(isset($_POST['submit']) and isset($_GET['add']))
    {
        $data = array( 
            'page_name'  =>   html_entity_decode($_POST['page_name'], ENT_QUOTES, "UTF-8"),
            'page_color'  =>  html_entity_decode('#'.$_POST['page_color'], ENT_QUOTES, "UTF-8"),
        );    

        $qry = Insert('tbl_page_category',$data);  

        $_SESSION['msg']="10";
        $_SESSION['class']='success';
        header( "Location:manage_page_category.php");
        exit;
    }

    if(isset($_GET['page_id']))
    {
        $qry="SELECT * FROM tbl_page_category where id='".$_GET['page_id']."'";
        $result=mysqli_query($mysqli,$qry);
        $row=mysqli_fetch_assoc($result);
    }
    if(isset($_POST['submit']) and isset($_POST['page_id']))
    {

        $data = array( 
            'page_name'  =>  html_entity_decode($_POST['page_name'], ENT_QUOTES, "UTF-8"),
            'page_color'  =>  html_entity_decode('#'.$_POST['page_color'], ENT_QUOTES, "UTF-8"),
            // trim('#'.$_POST['color_code'])
        );

        $category_edit=Update('tbl_page_category', $data, "WHERE id = '".$_POST['page_id']."'");

        $_SESSION['msg']="11";
        $_SESSION['class']='success'; 
        
        if(isset($_GET['redirect'])){
          header("Location:".$_GET['redirect']);
        }
        else{
          header( "Location:add_page_category.php?page_id=".$_POST['page_id']);
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
                        <div class="clearfix"></div>
                        <div class="card-body mrg_bottom"> 
                            <form action="" name="addeditcategory" method="post" class="form form-horizontal" enctype="multipart/form-data">
                              <input  type="hidden" name="page_id" value="<?php echo $_GET['page_id'];?>" />
                    
                              <div class="section">
                                <div class="section-body">
                                  <div class="form-group" style="display : flex;">
                                    <label class="col-md-3 control-label">Category Page Name :-
                                    
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="page_name" id="page_name" value="<?php if(isset($_GET['page_id'])){echo $row['page_name'];}?>" class="form-control" required>
                                    </div>
                                  </div>

                                  <div class="form-group" style="display: flex">
                                    <label class="col-md-3 control-label">Page Color :-
                                    </label>
                                    <div class="col-md-9">
                                      <input value="<?php if(isset($_GET['page_id'])){echo str_replace('#','',$row['page_color']);}else{ echo 'e91e63';}?>" name="page_color" class="form-control jscolor {width:243, height:150, position:'right',
                                      borderColor:'#000', insetColor:'#FFF', backgroundColor:'#ddd'}">
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
<script type="text/javascript" src="assets/js/jscolor.js"></script>