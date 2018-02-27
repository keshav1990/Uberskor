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

                          <h1 class="box-title btn-lg" style="margin-left:10px;font-size:24px;"><i class="fa fa-envelope" style="margin-right:5px;"></i> SMTP Settings</h1>

                        </div>

                        <?php if (!empty($this->session->flashdata())) { ?>

                              

                              <?php  if ($this->session->flashdata('status')=='danger' ) { ?>

                              <div class="callout callout-danger">

                                <h4><i class="fa fa-warning"></i> Error!</h4>

                                <p><?php echo $this->session->flashdata('msg');?></p>

                              </div> 

                              <?php } ?> 



                              <?php  if ($this->session->flashdata('status')=='success') { ?>

                                <div class="alert_hide alert alert-success alert-dismissible" style="margin:5px;">

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

                        echo form_open('admin-panel/smtp/updateCredentials',$attributes); 

                        ?>


                          <div class="box-body">

                            

                            <div class="form-group">

                              <div class="col-sm-3">

                                <h4> SMTP Server Protocol</h4>

                              </div>

                              <div class="col-sm-9">

                                <input placeholder="Server Host" class="form-control" required type="text" value="<?php echo $smtp['protocol']?>" name="protocol">

                              </div>

                            </div>



                            <div class="form-group">

                              <div class="col-sm-3">

                                <h4> SMTP Server Host</h4>

                              </div>

                              <div class="col-sm-9">

                                <input placeholder="Server Host" type="text" class="form-control" required value="<?php echo $smtp['smtp_host']?>" name="smtp_host">

                              </div>

                            </div>

                            <div class="form-group">

                              <div class="col-sm-3">

                                <h4> SMTP Server Port</h4>

                              </div>

                              <div class="col-sm-9">

                                <input placeholder="Server Port" type="text" value="<?php echo $smtp['smtp_port']?>" name="smtp_port" class="form-control" required>

                              </div>

                            </div>

                            <div class="form-group">

                              <div class="col-sm-3">

                                <h4> SMTP Server Username</h4>

                              </div>

                              <div class="col-sm-9">

                                <input placeholder="Server Username" type="text" value="<?php echo $smtp['smtp_user']?>" name="smtp_user" class="form-control" required>

                              </div>

                            </div>

                            <div class="form-group">

                              <div class="col-sm-3">

                                <h4> SMTP Server Password</h4>

                              </div>

                              <div class="col-sm-9">

                                <input placeholder="Server Password" type="text" value="<?php echo $smtp['smtp_pass']?>" name="smtp_pass" class="form-control" required>

                              </div>

                            </div>




                          </div>

                          <!-- /.box-body -->

                          <div class="box-footer">
                            <input type="hidden" name="id" value="<?php echo $smtp['id']?>" >
                            <button type="submit" class="btn btn-flat btn-primary btn-lg pull-right">Update SMTP</button>

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