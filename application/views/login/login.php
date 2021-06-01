<?php $this->load->view('login/login_header.php');    ?>

<div class="card">
  <div class="card-body login-card-body">
    <p style="color: red"><?php echo $this->session->flashdata('email'); ?></p>
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="" id="loginSubmit" method="post">
      <div class="main_notify"></div>
      <label>Email</label>
      <div class="form-group ">
        <input type="email" name="email" id="email" class="form-control" placeholder="Email" autocomplete="off">

      </div>

      <label>Password</label>
      <div class="form-group ">
        <input type="password" name="password" id="password" class="form-control" placeholder="Email" autocomplete="off">
      </div>
      <!-- /.col -->
      <div class="row">
        <div class="col-md-4">
          <input type="submit" class="btn btn-primary btn-block"></input>
        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-4">
          <a href="<?php echo base_url() ?>/index.php/User">Register</a>
        </div>

      </div>
      <!-- /.col -->
    </form>
  </div>

  <!-- /.login-card-body -->
</div>
</div>
<?php $this->load->view('login/login_footer.php');    ?>
<script src="<?php echo base_url() ?>assets/js/custom.js"></script>