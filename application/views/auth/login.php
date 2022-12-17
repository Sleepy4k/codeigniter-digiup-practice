<?php 
include APPPATH . 'views/fragment/header.php';
include APPPATH . 'views/fragment/menu.php'
?>
<div class="col-sm-12 d-flex justify-content-center align-items-center">
  <div class="col-lg-4 col-sm-6 mt-5">
    <div class="card p-3 bg-white mt-5">
      <h1 class="text-center mb-4"><?php echo lang('login_heading');?></h1>
      
      <div id="infoMessage" class="text-danger"><?php echo $message;?></div>
      
      <?php echo form_open("auth/login");?>
      
        <p>
          <?php echo lang('login_identity_label', 'identity');?>
          <div>
            <input class="form-control" placeholder="Silahkan masukkan email anda" type="email" name="identity" id="identity">
          </div>
        </p>
      
        <p>
          <?php echo lang('login_password_label', 'password');?>
          <div>
          <input class="form-control" placeholder="Silahkan masukkan password anda"  type="password" name="password" id="password">
          </div>
        </p>
  
        <button type="submit" class="btn btn-primary col-sm-12 mt-2 mb-2">Login</button>
   
      
      <?php echo form_close();?>
    
    </div>
  </div>
</div>

