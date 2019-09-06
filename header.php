<?php
session_start();
require_once('config.php');
?>
<html>
<style>
nav{
  color:#3490dc;
  background-color: #3490dc;
}
.footer-bottom{
  background-color: #3490dc;
}
</style>
<head>
<link href="app.css" rel="stylesheet">
<script src="app.js"></script>
<title>Npower to do List</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="<?php isset($_SESSION['user']) ?'dashboard.php':'/'; ?>"><b><h2>TO DO</h2></b></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="dark-blue-text"><i
            class="fa fa-bars" style="font-size:40px;color:#fff"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav  ml-auto mr-1">
                 
                    <?php if(!isset($_SESSION['user'])){
                            ?>
                  <li class="nav-item active">
                      <a class="nav-link" href="index.php"><b>Home</b><span class="sr-only">(current)</span></a>
                    </li>
                 
                    <li class="nav-item active">
                      <a class="nav-link" href="index.php"><b>Sign up</b><span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" href="login.php"><b>Login</b></a>
                    </li>
                    <li class="nav-item active">
                            <a class="nav-link" href="gallary"><b>Service</b></a>
                          </li>
                    <li class="nav-item active">
                            <a class="nav-link" href="about"><b>About</b></a>
                          </li>
                          <?php } ?>
                          <?php if(isset($_SESSION['user'])){
                            ?>
                            <li class="nav-item active">
                      <a class="nav-link" href="dashboard.php"><b>Dashboard</b><span class="sr-only">(current)</span></a>
                    </li>
                          <li class="nav-item active">
                      <a class="nav-link" href="profile.php"><b>profile</b><span class="sr-only">(current)</span></a>
                    </li><li class="nav-item active">
                      <a class="nav-link" href="add-todo.php"><b>New List</b><span class="sr-only">(current)</span></a>
                    </li>
                          <li class="nav-item active">
                                <a class="nav-link" href="logout.php"><b>Logout</b></a>
                              </li>
                              <?php }
                               
                               ?>
                  </ul>
                </div>
              </nav>
              <br/>
