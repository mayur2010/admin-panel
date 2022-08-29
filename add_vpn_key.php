  <?php 
    
    $page_title=(isset($_GET['vpn_id'])) ? 'Edit Vpn Key' : 'Add Vpn Key';

    include("includes/header.php");
    require("includes/function.php");
    require("language/language.php");


    if(isset($_POST['submit']) and isset($_GET['add']))
    {
        $data = array( 
            'vpn_key'  =>   html_entity_decode($_POST['vpn_key'], ENT_QUOTES, "UTF-8"),
            'vpn_url'  =>  html_entity_decode($_POST['vpn_url'], ENT_QUOTES, "UTF-8"),
        );    

        $qry = Insert('tbl_vpn_key',$data);  

        $_SESSION['msg']="10";
        $_SESSION['class']='success';
        header( "Location:manage_vpn_key.php");
        exit;
    }

    if(isset($_GET['vpn_id']))
    {
        $qry="SELECT * FROM tbl_vpn_key where id='".$_GET['vpn_id']."'";
        $result=mysqli_query($mysqli,$qry);
        $row=mysqli_fetch_assoc($result);
    }
    if(isset($_POST['submit']) and isset($_POST['vpn_id']))
    {

        $data = array( 
            'vpn_key'  =>  html_entity_decode($_POST['vpn_key'], ENT_QUOTES, "UTF-8"),
            'vpn_url'  =>  html_entity_decode($_POST['vpn_url'], ENT_QUOTES, "UTF-8"),  
        );

        $category_edit=Update('tbl_vpn_key', $data, "WHERE id = '".$_POST['vpn_id']."'");

        $_SESSION['msg']="11";
        $_SESSION['class']='success'; 
        
        if(isset($_GET['redirect'])){
          header("Location:".$_GET['redirect']);
        }
        else{
          header( "Location:add_vpn_key.php?vpn_id=".$_POST['vpn_id']);
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
                              <input  type="hidden" name="vpn_id" value="<?php echo $_GET['vpn_id'];?>" />
                    
                              <div class="section">
                                <div class="section-body">
                                  <div class="form-group" style="display : flex;">
                                    <label class="col-md-3 control-label">Vpn Key :-
                                    
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="vpn_key" id="vpn_key" value="<?php if(isset($_GET['vpn_id'])){echo $row['vpn_key'];}?>" class="form-control" required>
                                    </div>
                                  </div>

                                  <div class="form-group" style="display : flex;">
                                    <label class="col-md-3 control-label">Vpn Url :-
                                    
                                    </label>
                                    <div class="col-md-9">
                                      <input type="text" name="vpn_url" id="vpn_url" value="<?php if(isset($_GET['vpn_id'])){echo $row['vpn_url'];}?>" class="form-control" required>
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

