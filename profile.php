<?php require_once('header.php');
$id=$_SESSION['user'];
$getdata=mysqli_fetch_array(mysqli_query($conn,"select * from users where email='$id'"));
if (isset($_POST['submit'])) {
    extract($_POST);
    $user_id=$_SESSION['user'];
    $sql="update users set firstname='$firstname', lastname='$lastname' where email='$id'";
    $insert=mysqli_query($conn,$sql) or die('cannot'. mysqli_error($conn));
    if($insert){
        $msg='<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>good job! </strong>profilesuccessfully.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      $_SESSION['success']=$msg;
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=dashboard.php\">";

    }else{
        echo'process failed ';
    }
    
}

if(isset($_SESSION['user'])==""){
   
    header("location:index.php");
}
?>
              <div align="center">
              <div class="card col-6"   >
             
              <h2>Update Profile</h2><br/>
              
              <div class="card">
  <div class="card-body">
  <form action="" method="post" class="" id="ccform">
                                     
                                     <div>
                                      <label>First Name:</label> 
                                      <input type="text" name="firstname" size="50" value="<?php echo $getdata['firstname'];?>" ><br/>
                                     <br/>
                                     <label>Last Name:</label> 
                                      <input type="text" name="lastname" size="50" value="<?php echo $getdata['lastname'];?>" ><br/>
                                     <br/>
                                     <label>Email:</label> 
                                      <input type="text" name="email" size="50"  value="<?php echo $getdata['email'];?>" disabled><br/>
                                     <br/>
                                    <br/>
                                    <button type="submit" name="submit" class="btn btn-lg btn-info btn-block">Update</button>
                                     </form>
  </div>
</div>
</div>
</div></div></div><br/><br/><br/><br/><br/>
<?php require_once('footer.php');?>
</body>
</html>