<?php $this->load->view("admin-view/header"); ?>
<!-- =============================================== -->
<?php $this->load->view("admin-view/sidebar"); ?>
<!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-file-text-o"></i> Footer Description 
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
                          <div class="alert_hide alert alert-danger alert-dismissible" style="background:#00a65a!important;">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-exclamation"></i> Error</h4>
                          <?php echo $this->session->flashdata("msg"); ?>
                          </div> 
                        <?php } ?>                              
                      <?php } ?>
        <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">

               <?php echo form_open($this->config->item('admin_base_url')."link/updateFooter"); ?>           
                <div class="col-md-12 text-center">
                    <h5 class="text-center" style="font-size:16px;margin-left:0px;color:#f00!important;">
                    <?php echo validation_errors('! ','');?>
                    </h5>
                </div>
                <div class="form-group">
                  <h3>Top Footer</h3>
                  <input type="hidden" name="id" value="<?=$detail[0]->id?>">
                 <textarea id="editor1" class="form-control" name="txt_desc" rows="5" cols="30" required style="resize:none!important;"><?php echo $detail[0]->top_footer_content; ?></textarea>
                </div>
                
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                  <h3>Footer Section 1</h3>
                   <textarea id="editor2" class="form-control" name="footer_one" rows="5" cols="30" required style="resize:none!important;"><?php echo $detail[0]->footer_one; ?></textarea>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                  <h3>Footer Section 2</h3>
                   <textarea id="editor3" class="form-control" name="footer_two" rows="5" cols="30" required style="resize:none!important;"><?php echo $detail[0]->footer_two; ?></textarea>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                  <h3>Footer Section 3</h3>
                   <textarea id="editor4" class="form-control" name="footer_three" rows="5" cols="30" required style="resize:none!important;"><?php echo $detail[0]->footer_three; ?></textarea>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                  <h3>Copyright ©</h3>
                   <textarea  class="form-control" name="txt_copyright" rows="2" cols="30" required style="resize:none!important;"><?php echo $detail[0]->txt_copyright; ?></textarea>
                  </div>
                </div>
              </div>
                <div class="form-group">
                <div class="col-md-12 text-center" style="margin-bottom:30px;margin-top:16px;">
                <button class="btn btn-lg btn-success btn-flat" type="submit" style="float:none;">Update</button>
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
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
  var editor1 = CKEDITOR.replace('editor1');
  var editor2 =  CKEDITOR.replace('editor2');
  var editor3 = CKEDITOR.replace('editor3');
  var editor4 = CKEDITOR.replace('editor4');
  editor1.config.allowedContent = true;
  editor2.config.allowedContent = true;
  editor3.config.allowedContent = true;
  editor4.config.allowedContent = true;

</script>
<?php $this->load->view('admin-view/footer'); ?>