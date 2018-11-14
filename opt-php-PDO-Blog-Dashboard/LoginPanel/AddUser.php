<?php require_once './S_Header.php';
$submit_user = new USER();
if(isset($_POST['btn-submit']))
{
	$uname = trim($_POST['txtuname']);
	$email = trim($_POST['txtemail']);
	$type = trim($_POST['utype']);
	$upass = trim($_POST['txtpass']);
	$code = md5(uniqid(rand()));
	
	$stmt = $submit_user->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");
	$stmt->execute(array(":email_id"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() > 0)
	{
		$msg = "
		      <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong>  email allready exists , Please Try another one
			  </div>
			  ";
	}
	else
	{
		if($submit_user->adduser($uname,$email,$type,$upass,$code))
		{			
			$id = $submit_user->lasdID();		
			$key = base64_encode($id);
			$id = $key;
				
			$msg = "
					<div class='alert alert-success'><br>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Success!</strong>User $uname Added Successfully. 
			  		</div>
					";
		}
		else
		{
			echo "sorry , Query could no execute...";
		}		
	}
}
?>
<link href="assets/styles.css" rel="stylesheet" type="text/css">

    <div id="user-form" class="container">
    <div class="col-sm-12 col-md-4">
                          <?php if(isset($msg)) echo $msg;  ?>
                          <form class="form-signin" method="post">
                            <div class="form-group">
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                 <span class="input-group-text" id="basic-addon1">*</span>
                                </div>
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="txtuname" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">@</span>
                                </div>
                                  <input type="email" class="form-control" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1" name="txtemail" required> 
                              </div>
                            </div>
                              <div class="form-group">
                                  <select id="inputState" name="utype" class="form-control">
                                  <option selected>User Type</option>
                                  <option value="2">Admin</option>
                                  <option value="3">User</option>
                                </select>
                              </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                  <span class="input-group-text" id="basic-addon1">#</span>
                                </div>
                              <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="txtpass" required> 
                            </div>
                            </div>
                           
                            <button class="btn btn-large btn-primary" type="submit" name="btn-submit">Submit</button>
                          </form>
                        </div>
        </div> <!-- /container -->
    
</div>
<?php include './footer.php';?>
