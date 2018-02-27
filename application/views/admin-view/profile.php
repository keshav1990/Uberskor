<?php $this->load->view("admin-view/header"); ?>
<!-- =============================================== -->
<?php $this->load->view("admin-view/sidebar"); ?>
<!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-fw fa-user-secret"></i> Manage Profile
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
                      <?php if (!empty($this->session->flashdata())) { ?>
                        <?php  if ($this->session->flashdata('status')=='success') { ?>
                          <div class="alert_hide alert alert-success alert-dismissible" style="background:#00a65a!important;">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-check"></i> Success</h4>
                          <?php echo $this->session->flashdata("msg"); ?>
                          </div> 
                        <?php } ?>                              
                      <?php } ?>
        <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('assets/');?>img/user2-160x160.jpg" alt="User profile picture">
              <h3 class="profile-username text-center"><?php echo ucwords($this->session->userdata('admin_name')); ?></h3>

              <p class="text-muted text-center">Web Developer</p>

               <?php echo form_open($this->config->item('admin_base_url')."settings/changepwd"); ?>           
                <div class="col-md-12 text-center">

                    <h5 class="text-center" style="font-size:16px;margin-left:0px;color:#f00!important;">
                    <?php echo validation_errors('! ','');?>
                    </h5>
                </div>

                <div class="form-group">
                  <div class="col-md-4 text-center">
                   <h4>Username</h4>
                  </div>
                  <div class=" col-md-8">
                    <input placeholder="Username" class="form-control" type="text" value="<?=$detail[0]->name?>" name="txt_name" style="width:80%" readonly><br>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-4 text-center">
                   <h4>Password</h4>
                  </div>
                  <div class=" col-md-8">
                    <input placeholder="Password" class="form-control" type="password" value="<?=$detail[0]->password?>" name="password" style="width:80%" readonly><br>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-4 text-center">
                    <h4>New Password</h4>
                  </div>
                  <div class=" col-md-8">
                    <input placeholder="New Password" class="form-control" type="password" value="" name="npassword" style="width:80%"><br>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-4 text-center">
                   <h4>Re-type Password</h4>
                  </div>
                  <div class="col-md-8">
                    <input placeholder="Retype-Password" class="form-control" type="password" name="cpassword" style="width:80%"><br>
                  </div>
                </div>

                <div class="text-center" style="margin-bottom:30px;">
                <button class="btn btn-lg btn-success btn-flat" type="submit" style="float:none;">Update</button>
                </div>
            </form>
            </div>
          </div>
          <!-- /.Profile End -->
        </div>
      </div>        
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2017 <a href="#">Uberskor.com</a>.</strong> All rights
    reserved.
  </footer>

  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php $this->load->view('admin-view/footer'); ?>