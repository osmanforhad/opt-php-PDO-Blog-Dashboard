<?php require_once './A_Header.php';
function __autoload($class){
 include_once($class.".php");
}
 $obj=new AppDAO;
 
 if(isset($_REQUEST['update'])){
 extract($_REQUEST);
 if($obj->update($userID,$userName,$userEmail,"tbl_users")){
 header("location:ManageUser.php?status=success");
 }

}

extract($obj->getById($_REQUEST['userID'],"tbl_users"));
echo <<<show
<div class="row">
              <div class="col-md-5">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 align="center" class="m-0">Edit User Information</h6>
                  </div>
                    <div>
                        <form action="update.php" method="post">
                    <table class="table mb-0" class="bg-light">
                      
                        <tr>
 <th scope="row">userID->:</th>
 <td><input type="text" name="userID" value="$userID" readonly="readonly"></td>
 </tr>
 <tr>
 <th scope="row">Name->:</th>
 <td><input type="text" name="userName" value="$userName"></td>
 </tr>
                  <tr>
 <th scope="row">Email->:</th>
 <td><input type="text" name="userEmail" value="$userEmail"></td>
 </tr>    
                     <tr>
 <th scope="row">&nbsp;</th>
 <td><input type="submit" name="update" value="Update" class="btn"></td>
 </tr>
                    </table>
                        </form>
                  </div>
                </div>
              </div>
            </div>

show;

 ?>

 
 </div>
<?php include './footer.php';?>
 
