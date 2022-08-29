  <?php 
    
    $page_title=(isset($_GET['country_id'])) ? 'Edit Country' : 'Add Country';

    include("includes/header.php");
    require("includes/function.php");
    require("language/language.php");


    if(isset($_POST['submit']) and isset($_GET['add']))
    {
        $data = array( 
            'country_name'  =>   html_entity_decode($_POST['country_name'], ENT_QUOTES, "UTF-8")
        );    

        $qry = Insert('tbl_country',$data);  

        $_SESSION['msg']="10";
        $_SESSION['class']='success';
        header( "Location:manage_country.php");
        exit;
    }

    if(isset($_GET['country_id']))
    {
        $qry="SELECT * FROM tbl_country where id='".$_GET['country_id']."'";
        $result=mysqli_query($mysqli,$qry);
        $row=mysqli_fetch_assoc($result);
    }
    if(isset($_POST['submit']) and isset($_POST['country_id']))
    {

        $data = array( 
            'country_name'  =>  html_entity_decode($_POST['country_name'], ENT_QUOTES, "UTF-8"),
        );

        $category_edit=Update('tbl_country', $data, "WHERE id = '".$_POST['vpn_id']."'");

        $_SESSION['msg']="11";
        $_SESSION['class']='success'; 
        
        if(isset($_GET['redirect'])){
          header("Location:".$_GET['redirect']);
        }
        else{
          header( "Location:add_country.php?country_id=".$_POST['country_id']);
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
                              <input  type="hidden" name="country_id" value="<?php echo $_GET['country_id'];?>" />
                    
                              <div class="section">
                                <div class="section-body">
                                  <div class="form-group" style="display : flex;">
                                    <label class="col-md-3 control-label">Country Name :-
                                    
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="country_name" id="country_name" value="<?php if(isset($_GET['country_id'])){echo $row['country_name'];}?>" class="form-control" required>
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
