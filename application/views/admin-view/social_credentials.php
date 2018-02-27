<?php $this->load->view("admin-view/header"); ?>
<!-- =============================================== -->
<?php $this->load->view("admin-view/sidebar"); ?>
<!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <!-- general form elements -->
                  <!-- Horizontal Form -->
                      <div class="box box-info">
                        <div class="box-header with-border">
                          <h1 class="box-title btn-lg" style="margin-left:10px;font-size:24px;"><i class="fa fa-info" style="margin-right:5px;"></i> Social Media Credentials</h1>
                        </div>
                        <?php if (!empty($this->session->flashdata())) { ?>
                              
                              <?php  if ($this->session->flashdata('status')=='danger' ) { ?>
                              <div class="callout callout-danger">
                                <h4><i class="fa fa-warning"></i> Error!</h4>
                                <p><?php echo $this->session->flashdata('msg');?></p>
                              </div> 
                              <?php } ?> 

                              <?php  if ($this->session->flashdata('status')=='success') { ?>
                                <div class="alert alert-success alert-dismissible" style="margin:5px;">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> Success</h4>
                                <?php echo $this->session->flashdata("msg"); ?>
                                </div> 
                              <?php } ?>                              


                          <?php } ?>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <?php 
                        $attributes = array('class' => 'form-horizontal');
                        echo form_open('admin-panel/home/updateCredentials',$attributes); 
                        ?>
                        <input type="hidden" name="id" value="<?=$social[0]->id?>">
                          <div class="box-body">
                            
                            <div class="form-group">
                              <div class="col-sm-3">
                                <h4> Facebook App Id</h4>
                              </div>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputEmail3" name="fb_appid" placeholder="Facebook App Id" value="<?=$social[0]->fb_appid?>" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-sm-3">
                                <h4> Facebook App Secret</h4>
                              </div>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputEmail3" name="fb_appsecret" placeholder="Facebook App Secret" value="<?=$social[0]->fb_appsecret?>" required>
                              </div>
                            </div>
                          
                          <hr>
                          
                            <div class="form-group">
                              <div class="col-sm-3">
                                <h4> Google+ App Id</h4>
                              </div>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputEmail3" name="googleplus_appid" placeholder="Google+ App Id" value="<?=$social[0]->googleplus_appid?>" required>
                              </div>
                            </div>

                            <div class="form-group">
                              <div class="col-sm-3">
                                <h4> Google+ App Secret</h4>
                              </div>
                              <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputEmail3" name="googleplus_appsecret" placeholder="Google+ App Secret" value="<?=$social[0]->googleplus_appsecret?>" required>
                              </div>
                            </div>

                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                            <button type="submit" class="btn btn-flat btn-primary btn-lg pull-right">Update Credentials</button>
                          </div>
                          <!-- /.box-footer -->
                        </form>
                      </div>
                    <!-- /.box -->
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