<?php
require_once('config.php');
if (isset($_POST['submit'])) {
    extract($_POST);
    
    if ($email=="" or $password=="") {
        $msg='<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>failed!</strong>all fileds are required.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
        //die( 'please all fields are required');
    } elseif ($email!="" or $password!="") {
        $sql="select email from users where email='$email'";
        $getemail=mysqli_query($conn, $sql);
        $test=mysqli_num_rows($getemail);
        if ($test>0) {
            $msg='<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>sorry!</strong>email already exist.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
           // die( 'sorry email already exist');
        } else if ($test==0) {
            $query="insert into users(email,password)values('$email','$password')";
            $insert=mysqli_query($conn, $query);
            if ($insert) {
               $msg='<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong>process was successful.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            } else {
                die ('cannot create record'.mysqli_error($conn));
            }
        }
    }
}
require_once('header.php');
?><br/><br/><br/><br/>
              <div align="center">
              <div class="card col-6"   >
              <h1><?php if(!empty($msg)){ echo $msg;} ?></h1>
              <h1>Register</h1><br/>
<form action="" method="post" class="" id="ccform">
                                     
 <div>
  <label>email:</label> 
  <input type="text" name="email" size="50" ><br/>
 <br/>
name: <input type="password" name="password"size="50"><br/><br/>
<button type="submit" name="submit" class="btn btn-lg btn-info btn-block">Submit</button>
 </form>
 </div></div>
 </div>
</div></div></div><br/><br/><br/><br/><br/><br/><br/>
<?php require_once('footer.php');?>
</body>
</html>