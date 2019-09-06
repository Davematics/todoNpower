<?php 
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
if(isset($_SESSION['user'])==""){
   
    header("location:index.php");
}
?>
              <div align="center">
              <div class="card col-6"   >
              <h2><?php if(!empty( $_SESSION['success'])){ echo  $_SESSION['success'];
             $_SESSION['success']='';
            } ?></h2>
              <h1>Dashboard</h1><br/>
              <a class=" btn btn-primary" href="add-todo.php">New</a>
              <div class="card">
  <div class="card-body">
  Welcome : <?php echo $_SESSION['user'];?>
  </div>
  <h2>To do list</h2>
  <form action="" method="POST">
                                      <table id="example" class="display nowrap" border="1" style="width:100%">

                                      <thead>
          <tr>
            <td>sno</td>
            <td>Todo Name</td>
            <td>Description</td>
            <td>Date</td>
           
              <td>Update</td>
              <td>Delete</td>
          </tr>
      </thead>
      <tbody>
        <?php
        $sno=0;
        $id=$_SESSION['user'];
$getdata=mysqli_query($conn,"select * from todo where user_id='$id'");
//var_dump($getdata);
while($view=mysqli_fetch_array($getdata)){
        ?>
          <tr>
              <td><?php echo $sno++?></td>
              <td><?php echo $view['todo_name'];?></td>
              <td><?php echo $view['description'];?></td>
              <td><?php echo $view['created_at'];?></td>
            
              <td><a href="update.php?id=<?php echo $view['id'];?>" class="btn btn-success">Update</a></td>
              <td><a onclick="return confirm('Are you sure you want to delete this record?')" href="delete.php?id=<?php echo $view['id'];?>" class="btn btn-danger">Delete</a></td>
          </tr>
        <?php }?>
      </tbody>
      
  </table>
</div></div>
<?php require_once('footer.php');?>
</body>
</html>