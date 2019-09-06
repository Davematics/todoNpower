<?php session_start();
require_once('config.php');
$id=$_REQUEST['id'];
$getdata=mysqli_fetch_array(mysqli_query($conn,"select * from todo where id='$id'"));
$sql="delete from todo where id='$id'";
$delete=mysqli_query($conn,$sql);
if($delete){
    $msg='<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>good job! </strong>one record deleted.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  $_SESSION['success']=$msg;
  echo "<meta http-equiv=\"refresh\" content=\"0;URL=dashboard.php\">";
}else{
    $msg='<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>sorry! </strong>unable to delete record.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
      $_SESSION['success']=$msg;
      echo "<meta http-equiv=\"refresh\" content=\"0;URL=dashboard.php\">";
}