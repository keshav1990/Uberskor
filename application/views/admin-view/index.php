<?php $this->load->view("admin-view/header"); ?>
<!-- =============================================== -->
<?php $this->load->view("admin-view/sidebar"); ?>
<!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Banners
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Banners</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  
                <div class="row">
            <div class="col-md-12">
                  <!-- general form elements -->
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">Logo <small>210px x 37px</small></h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                     <?php echo form_open_multipart("admin-panel/home/update_banners"); ?>
                        <div class="box-body">
                          
                          <?php if (!empty($this->session->flashdata())) { ?>
                              
                              <?php  if ($this->session->flashdata('status')=='danger' && $this->session->flashdata('type')=='logo' ) { ?>
                              <div class="callout callout-danger">
                                <h4><i class="fa fa-warning"></i> Error!</h4>
                                <p><?php echo $this->session->flashdata('msg');?></p>
                              </div> 
                              <?php } ?> 

                              <?php  if ($this->session->flashdata('status')=='success' && $this->session->flashdata('type')=='logo') { ?>
                                <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> Success</h4>
                                <?php echo $this->session->flashdata("msg"); ?>
                                </div> 
                              <?php } ?>                              


                          <?php } ?>

                        <img src="<?php echo $this->config->item('upload_url')."banners/".$banners[4]->image;?>" class="img-responsive" alt="Uberskor | Top-Banner" title="Uberskor | Top-Banner">
                        <input type="hidden" name="id" value="<?=$banners[4]->id?>">
                        <input type="hidden" name="banner_type" value='<?php echo ($banners[4]->banner_type ? $banners[4]->banner_type : "logo");?>' >
                          <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" name="banner" id="logo" onchange="fileUpload('logo')">
                          </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                          <button type="submit" id="btn_logo" class="btn btn-flat btn-primary btn-lg">Update</button>
                        </div>
                      </form>
                    </div>
                    <!-- /.box -->
            </div>
          </div>
<!-- Logo section End -->
          <div class="row">
            <div class="col-md-12">
                  <!-- general form elements -->
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">Top Banner <small>970px x 107px</small></h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                     <?php echo form_open_multipart("admin-panel/home/update_banners"); ?>
                        <div class="box-body">
                          
                          <?php if (!empty($this->session->flashdata())) { ?>
                              
                              <?php  if ($this->session->flashdata('status')=='danger' && $this->session->flashdata('type')=='top_banner' ) { ?>
                              <div class="callout callout-danger">
                                <h4><i class="fa fa-warning"></i> Error!</h4>
                                <p><?php echo $this->session->flashdata('msg');?></p>
                              </div> 
                              <?php } ?> 

                              <?php  if ($this->session->flashdata('status')=='success' && $this->session->flashdata('type')=='top_banner') { ?>
                                <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> Success</h4>
                                <?php echo $this->session->flashdata("msg"); ?>
                                </div> 
                              <?php } ?>                              


                          <?php } ?>

                        <img src="<?php echo $this->config->item('upload_url')."banners/".$banners[0]->image;?>" class="img-responsive" alt="Uberskor | Top-Banner" title="Uberskor | Top-Banner">
                        <input type="hidden" name="id" value="<?=$banners[0]->id?>">
                        <input type="hidden" name="banner_type" value='<?php echo ($banners[0]->banner_type ? $banners[0]->banner_type : "top_banner");?>' >
                          <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" name="banner" id="top_banner" onchange="fileUpload('top_banner')">
                          </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                          <button type="submit" id="btn_top_banner" class="btn btn-flat btn-primary btn-lg">Update</button>
                        </div>
                      </form>
                    </div>
                    <!-- /.box -->
            </div>
          </div>
<!-- Top Banner End -->
          <div class="row">
            <div class="col-md-12">
                  <!-- general form elements -->
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">Middel Banner <small>661px x 278px</small></h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                     <?php echo form_open_multipart("admin-panel/home/update_banners"); ?>
                        <div class="box-body">
                          
                          <?php if (!empty($this->session->flashdata())) { ?>
                              
                              <?php  if ($this->session->flashdata('status')=='danger' && $this->session->flashdata('type')=='mid_banner') { ?>
                              <div class="callout callout-danger">
                                <h4><i class="fa fa-warning"></i> Error!</h4>
                                <p><?php echo $this->session->flashdata('msg');?></p>
                              </div> 
                              <?php } ?> 

                              <?php  if ($this->session->flashdata('status')=='success' && $this->session->flashdata('type')=='mid_banner') { ?>
                                <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> Success</h4>
                                <?php echo $this->session->flashdata("msg"); ?>
                                </div> 
                              <?php } ?>                              


                          <?php } ?>

                        <img src="<?php echo $this->config->item('upload_url')."banners/".$banners[1]->image;?>" class="img-responsive" alt="Uberskor | Top-Banner" title="Uberskor | Top-Banner">
                        <input type="hidden" name="id" value="<?=$banners[1]->id?>">
                        <input type="hidden" name="banner_type" value='<?php echo ($banners[1]->banner_type ? $banners[1]->banner_type : "top_banner");?>' >
                          <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" name="banner" id="mid_banner" onchange="fileUpload('mid_banner')">
                          </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                          <button type="submit"  id="btn_mid_banner" class="btn btn-flat btn-primary btn-lg" >Update</button>
                        </div>
                      </form>
                    </div>
                    <!-- /.box -->
            </div>
          </div>
<!-- Top  Mid Banner End -->

<!-- Top Banner End -->
          <div class="row">
            <div class="col-md-6">
                  <!-- general form elements -->
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">Leftside Banner <small>143px x 214px</small></h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                     <?php echo form_open_multipart("admin-panel/home/update_banners"); ?>
                        <div class="box-body">
                          
                          <?php if (!empty($this->session->flashdata())) { ?>
                              
                              <?php  if ($this->session->flashdata('status')=='danger' && $this->session->flashdata('type')=='left_banner') { ?>
                              <div class="callout callout-danger">
                                <h4><i class="fa fa-warning"></i> Error!</h4>
                                <p><?php echo $this->session->flashdata('msg');?></p>
                              </div> 
                              <?php } ?> 

                              <?php  if ($this->session->flashdata('status')=='success' && $this->session->flashdata('type')=='left_banner') { ?>
                                <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> Success</h4>
                                <?php echo $this->session->flashdata("msg"); ?>
                                </div> 
                              <?php } ?>                              


                          <?php } ?>

                        <img src="<?php echo $this->config->item('upload_url')."banners/".$banners[3]->image;?>" class="img-responsive" alt="Uberskor | Top-Banner" title="Uberskor | Top-Banner">
                        <input type="hidden" name="id" value="<?=$banners[3]->id?>">
                        <input type="hidden" name="banner_type" value='<?php echo ($banners[3]->banner_type ? $banners[3]->banner_type : "top_banner");?>' >
                          <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" name="banner" id="left_banner" onchange="fileUpload('left_banner')">
                          </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                          <button type="submit"  id="btn_left_hbanner" class="btn btn-flat btn-primary btn-lg" >Update</button>
                        </div>
                      </form>
                    </div>
                    <!-- /.box -->
            </div>

          <div class="col-md-6" >
                  <!-- general form elements -->
                    <div class="box box-primary" >
                      <div class="box-header with-border">
                        <h3 class="box-title">Rightside Banner <small>161px x 500px</small></h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                     <?php echo form_open_multipart("admin-panel/home/update_banners"); ?>
                        <div class="box-body">
                          
                          <?php if (!empty($this->session->flashdata())) { ?>
                              
                              <?php  if ($this->session->flashdata('status')=='danger' && $this->session->flashdata('type')=='right_banner') { ?>
                              <div class="callout callout-danger">
                                <h4><i class="fa fa-warning"></i> Error!</h4>
                                <p><?php echo $this->session->flashdata('msg');?></p>
                              </div> 
                              <?php } ?> 

                              <?php  if ($this->session->flashdata('status')=='success' && $this->session->flashdata('type')=='right_banner') { ?>
                                <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> Success</h4>
                                <?php echo $this->session->flashdata("mesg"); ?>
                                </div> 
                              <?php } ?>                              


                          <?php } ?>

                        <img src="<?php echo $this->config->item('upload_url')."banners/".$banners[2]->image;?>" class="img-responsive" alt="Uberskor | Top-Banner" title="Uberskor | Top-Banner">
                        <input type="hidden" name="id" value="<?=$banners[2]->id?>">
                        <input type="hidden" name="banner_type" value='<?php echo ($banners[2]->banner_type ? $banners[2]->banner_type : "top_banner");?>' >
                          <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" name="banner" id="right_banner" onchange="fileUpload('right_banner')">
                          </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                          <button type="submit"  id="btn_right_hbanner" class="btn btn-flat btn-primary btn-lg" >Update</button>
                        </div>
                      </form>
                    </div>
                    <!-- /.box -->
            </div>

          </div>
<!-- Top  Right Banner End -->

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

<script>
function  fileUpload(id){
  var ext = $('#'+id).val().split('.').pop().toLowerCase();
  if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
      alert('invalid extension!');
      $("#btn_"+id).prop('disabled', true);

  }
  else {
      $("#btn_"+id).prop('disabled', false);
  }

  var img = $("#"+id).val();
}

</script>

<?php $this->load->view('admin-view/footer'); ?>
