<?php
require_once('header.php');

if (isset($_POST['submit'])) {
    extract($_POST);
    $sql="select * from users where email='$email' AND password='$password'";
    $query=mysqli_query($conn,$sql);
    $test=mysqli_num_rows($query);
    if($test==0){
        $msg='<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>failed! </strong>invalid email or password.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
    }else if($test==1){
        $_SESSION['user']=$email;
        echo "<meta http-equiv=\"refresh\" content=\"0;URL=dashboard.php\">";

    }
    
}

?>
<br/><br/><br/><br/><br/>
              <div align="center">

              <div class="card col-6"   >
              <h1><?php if(!empty($msg)){ echo $msg;} ?></h1>
              <h1>Login</h1><br/>
<form action="" method="post" class="" id="ccform">
                                     
 <div>
  <label>email:</label> 
  <input type="text" name="email" size="50" ><br/>
 <br/>
name: <input type="password" name="password"size="50"><br/><br/>
<button type="submit" name="submit" class="btn btn-lg btn-info btn-block">Login</button>
 </form>
 </div></div>
 </div>
</div></div></div><br/><br/><br/><br/><br/><br/><br/>
<?php require_once('footer.php');?>
</body>
</html>