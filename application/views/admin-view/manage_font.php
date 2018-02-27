<?php $this->load->view("admin-view/header"); ?>
<!-- =============================================== -->
<?php $this->load->view("admin-view/sidebar"); ?>
<!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-fw fa-font"></i> Manage Font Size 
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
                        <?php  if ($this->session->flashdata('status')=='danger') { ?>
                          <div class="alert alert-danger alert-dismissible" style="background:#00a65a!important;">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-exclamation"></i> Error</h4>
                          <?php echo $this->session->flashdata("msg"); ?>
                          </div> 
                        <?php } ?>                              
                      <?php } ?>
        <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">

               <?php echo form_open($this->config->item('admin_base_url')."settings/updateFont"); ?>           
                <div class="col-md-12 text-center">
                    <h5 class="text-center" style="font-size:16px;margin-left:0px;color:#f00!important;">
                    <?php echo validation_errors('! ','');?>
                    </h5>
                </div>
                
                <div class="form-group">
                  <div class="col-md-4 text-left">
                   <h4>Body Font Size</h4>
                  </div>
                  <div class=" col-md-8">
                    <input placeholder="Body Font Size" class="form-control" type="number" value="<?=$font[0]->body_size?>" name="body_size" min="11" required><br>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-4 text-left">
                   <h4>Menu Font Size</h4>
                  </div>
                  <div class=" col-md-8">
                    <input placeholder="Menu Font Size" class="form-control" type="number" value="<?=$font[0]->menu_size?>" name="menu_size" min="11" required><br>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-4 text-left">
                   <h4>Sidebar Font Size</h4>
                  </div>
                  <div class=" col-md-8">
                    <input placeholder="Sidebar Font Size" class="form-control" type="number" value="<?=$font[0]->sidebar_size?>" name="sidebar_size" min="11" required><br>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-4 text-left">
                   <h4>Middle Body Font Size</h4>
                  </div>
                  <div class=" col-md-8">
                    <input placeholder="Sidebar Font Size" class="form-control" type="number" value="<?=$font[0]->midbody_size?>" name="midbody_size" min="11" required><br>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-4 text-left">
                   <h4>Footer Font Size</h4>
                  </div>
                  <div class=" col-md-8">
                    <input placeholder="Sidebar Font Size" class="form-control" type="number" value="<?=$font[0]->footer_size?>" name="footer_size" min="11" required><br>
                  </div>
                </div>
                <input type="hidden" name="id" value="<?=$font[0]->id?>">
                
                <div class="form-group">
                <div class="col-md-12 text-center" style="margin-bottom:30px;margin-top:16px;">
                <button class="btn btn-lg btn-success btn-flat" type="submit" style="float:none;">Add Now</button>
                </div>
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