<?php $this->load->view("admin-view/header"); ?>
<!-- =============================================== -->
<?php $this->load->view("admin-view/sidebar"); ?>
<!-- =============================================== -->
<link rel="stylesheet" href="<?php echo base_url('assets/');?>plugins/datatables/dataTables.bootstrap.css">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-fw fa-external-link"></i> Sports List
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
            <div class="box-body box-profile table-responsive">
              <table id="example2" class="table table-bordered table-striped">
                              <thead>
                              <tr>
                                <th>#</th>
                                <th>Sport</th>
                                <!--th>Country</th-->
                                <th>Action</th>
                              </tr>
                              </thead>
                              
                              <tbody>
                              <?php $i = 1 ;
                              foreach ($links as $link): 
                              ?>
                              <tr>
                                <td><?php echo $i; $i++;?></td>
                                <td><?=ucwords($link->name)?></td>
                                <!--td><?=ucwords($link->country)?></td-->
                                <td class="">
                                  <a href="<?php echo $this->config->item('admin_base_url').'sidebar-list/'.url_title($link->name,"dash",true);?>">
                                    <i class="fa fa-edit fa-2x"></i>
                                  </a>
                                </td>
                              </tr>
                              <?php endforeach; ?>
                              </tbody>  
                              
                              
                              <tfoot>
                                <tr>
                                  <th>#</th>
                                  <th>Link Name</th>
                                  <th>Action</th>
                                </tr>
                              </tfoot>
                            </table>
        

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
<!-- DataTables -->
<script src="<?php echo base_url('assets/');?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/');?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/');?>js/app.min.js"></script>
<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });

    $(".select2").select2();

  });
</script>
<?php $this->load->view('admin-view/footer'); ?>