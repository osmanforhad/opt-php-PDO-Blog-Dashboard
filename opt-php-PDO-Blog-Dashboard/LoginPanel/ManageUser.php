<?php require_once './A_Header.php';
//ob_start();
function __autoload($class){
 include_once($class.".php");
}
 $obj=new AppDAO;
 if(isset($_REQUEST['status'])){
 echo"Your Data Successfully Updated";
}
 if(isset($_REQUEST['userID'])){
if($obj->deleteData($_REQUEST['userID'],"tbl_users")){

 echo"Your Data Successfully Deleted";
}
}
// if(isset($_REQUEST['status'])){
// echo"Your Data Successfully Updated";
//}
 ?>
<div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h3 align="center" class="m-0">Manage Your User</h3>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0">SL</th>
                          <th scope="col" class="border-0">Name</th>
                          <th scope="col" class="border-0">Email</th>
                          <th scope="col" class="border-0">Status</th>
                          <th scope="col" class="border-0">Action</th>
                        </tr>
                      </thead>
                      <tbody>
 <?php
 foreach($obj->showData("tbl_users") as $value){
 extract($value);
 echo <<<show
  <tr class="success">
                          <td>$userID</td>
                          <td>$userName</td>
                          <td>$userEmail</td>
                          <td>$userStatus</td>
                          <td><button class="btn"><a href="update.php?userID=$userID">Edit</a>
</button>
&nbsp;&nbsp;<button class="btn"><a href="ManageUser.php?userID=$userID">Delete</a></button></td>
                          </tr>
show;
 }
 ?>
  <tr class="Success">
      <th scope="col" colspan="5" align="right">
          
      </th>
                        </tr>
                     
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

</div>
<?php include './footer.php';?>

