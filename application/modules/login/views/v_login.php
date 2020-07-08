<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Login YourSHOES</title>
 <link rel="stylesheet" href="<?php echo base_url('asset/log.css') ?>">
 <link rel="stylesheet" href="<?php echo base_url('asset/fontawesome-free/css/all.min.css') ?>">
 <link rel="shortcut icon" href="<?php echo base_url('gambar/logo.png')?>">
</head>
<body>
 <div class="wrapper">
  <form action="<?php echo base_url('login/aksi_login'); ?>" method="post">
  <div class="dasar">
   <h1 style="text-align: center;padding-top: 20px;">Sign in</h1>
   <center><?php echo $this->session->flashdata('login_failed'); ?></center> 
   <div class="username">
   <div class="ico"><i style="float: left;margin-left: 5px;margin-top: 3px;" class="fa fa-user fa-2x"></div></i><input class="user" type="text" name="username" placeholder="Username" required="">
   </div>
   <div class="usernam">
   <div class="ico"><i style="float: left;margin-left:7px;margin-top: 3px;" class="fa fa-lock fa-2x style="color:white"></div></i><input class="user" name="password" style="margin-left: 8px;" type="Password" placeholder="Password" required="">
   <button type="submit" class="btn" >MASUK</button>
   <div class="txt">
 <a href="<?php echo base_url('login/register'); ?>" class="txt">Belum punya Akun?</a>
</div>
   </form>
   </div>
  </div>
 </div>
</body>
</html>