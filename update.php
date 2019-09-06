<?php require_once('header.php');
$id=$_REQUEST['id'];
$getdata=mysqli_fetch_array(mysqli_query($conn,"select * from todo where id='$id'"));
if (isset($_POST['submit'])) {
    extract($_POST);
    $user_id=$_SESSION['user'];
    
    $sql="update todo set description='$description', todo_name='$todo_name' where id='$id'";
    $insert=mysqli_query($conn,$sql) or die('cannot'. mysqli_error($conn));
    if($insert){
        $msg='<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>good job! </strong>update was successful.
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
             
              <h1>Create New Todo</h1><br/>
              
              <div class="card">
  <div class="card-body">
  <form action="" method="post" class="" id="ccform">
                                     
                                     <div>
                                      <label>Todo Name:</label> 
                                      <input type="text" name="todo_name" size="50" value="<?php echo $getdata['todo_name'] ?>" ><br/>
                                     <br/>
                                    Description
                                    <textarea class="form-control" name="description"><?php echo $getdata['description'] ?> </textarea> <br/><br/>
                                    <button type="submit" name="submit" class="btn btn-lg btn-info btn-block">Update</button>
                                     </form>
  </div>
</div>
</div>
</div></div></div><br/><br/><br/><br/><br/>
<?php require_once('footer.php');?>
</body>
</html>