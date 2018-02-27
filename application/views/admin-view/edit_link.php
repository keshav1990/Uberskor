<?php $this->load->view("admin-view/header"); ?>
<!-- =============================================== -->
<?php $this->load->view("admin-view/sidebar"); ?>
<!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-fw fa-external-link"></i> Edit External Links 
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
                          <div class=" alert alert-danger alert-dismissible" style="background:#00a65a!important;">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-exclamation"></i> Error</h4>
                          <?php echo $this->session->flashdata("msg"); ?>
                          </div> 
                        <?php } ?>                              
                      <?php } ?>
        <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">

               <?php echo form_open($this->config->item('admin_base_url')."link/updateLink"); ?>           
                <div class="col-md-12 text-center">
                    <h5 class="text-center" style="font-size:16px;margin-left:0px;color:#f00!important;">
                    <?php echo validation_errors('! ','');?>
                    </h5>
                </div>
				<div class="col-md-12 ">
					<div class="col-md-4 pull-right"><h3>For English</h3></div>
					<div class="col-md-4 pull-right"><h3>For Turkish</h3></div>
				</div>
                <div class="form-group">
                  <div class="col-md-4 text-left">
                   <h4>Link Name</h4>
                  </div>
                  <div class=" col-md-4">
                    <input placeholder="Link Name" class="form-control" type="text" value="<?=$link[0]->tr_name?>" name="txt_tr_name"  required><br>
                  </div>
				  <div class=" col-md-4">
                    <input placeholder="Link Name" class="form-control" type="text" value="<?=$link[0]->en_name?>" name="txt_en_name"  required><br>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-4 text-left">
                   <h4>Link Alt Text</h4>
                  </div>
                  <div class=" col-md-4">
                    <input placeholder="Link Alt Text" class="form-control" type="text" value="<?=$link[0]->tr_alt?>" name="txt_tr_alt"  required><br>
                  </div>
				  <div class=" col-md-4">
                    <input placeholder="Link Alt Text" class="form-control" type="text" value="<?=$link[0]->en_alt?>" name="txt_en_alt"  required><br>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-4 text-left">
                   <h4>Link Title</h4>
                  </div>
                  <div class=" col-md-4">
                    <input placeholder="Link Title" class="form-control" type="text" value="<?=$link[0]->tr_title?>" name="txt_tr_title"  required><br>
                  </div>
				  <div class=" col-md-4">
                    <input placeholder="Link Title" class="form-control" type="text" value="<?=$link[0]->en_title?>" name="txt_en_title"  required><br>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-md-4 text-left">
                   <h4>Link Url</h4>
                  </div>
                  <div class=" col-md-8">
                    <input placeholder="Link Url" class="form-control" type="url" value="<?=$link[0]->url?>" name="txt_url"  required><br>
                  </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-4 text-left">
                     <h4>Link Color </h4>
                    </div>
                    <div class=" col-md-8">
                          <div class="input-group my-colorpicker2">
                            <input type="text" class="form-control"  name="txt_color"  value="<?=$link[0]->text_color?>"></br>
                            <div class="input-group-addon">
                              <i></i>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group" style="margin-top:17px;">
                    <div class="col-md-4 text-left">
                     <h4>Link Background Color </h4>
                    </div>
                    <div class=" col-md-8">
                          <div class="input-group my-colorpicker2">
                            <input type="text" class="form-control"  name="txt_bgcolor"  value="<?=$link[0]->bgcolor?>">
                            <div class="input-group-addon">
                              <i></i>
                            </div>
                          </div>
                    </div>
                </div>
                <input type="hidden" name="linkId" value="<?=$link[0]->id?>">
                <div class="form-group">
                <div class="col-md-12 text-center" style="margin-bottom:30px;margin-top:16px;">
                <button class="btn btn-lg btn-success btn-flat" type="submit" style="float:none;">Update Now</button>
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