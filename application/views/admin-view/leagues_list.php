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
        <i class="fa fa-fw fa-list"></i> <?=ucwords($game)?> Leagues List
      </h1>
		<p>
			<div class="col-md-6">
				<a href="<?=$this->config->item('admin_base_url').'sidebar-list/'?>"><button class="btn btn-primary pull-left" ><i class="fa fa-undo "></i> Back to sport List</button></a>
			</div>
			
			<div class="col-md-6">
				<a href="<?=$this->config->item('admin_base_url').'sidebar-league-add/'.url_title($game,"dash",true)?>"><button class="btn btn-primary pull-right" >Add League</button></a>
			</div>
			<br>
		</p>
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
                                <th>League Name</th>
                                <th>Country</th>
                                <th>Total events</th>
                                <th>Startdate</th>
                                <th>Enddate</th>
                                <th>Action</th>
                              </tr>
                              </thead>
                              
                              <tbody>
                              <?php if(!empty($list)){ $i = 1 ;foreach ($list as $list): ?>
                              <tr>
                                <td><?php echo $i; $i++;?></td>
                                <td><?=ucwords($list->league_name)?></td>
                                <td><?=ucwords($list->country)?></td>
                                <td><?=$list->total_event?></td>
                                <td><?=$list->startdate?></td>
                                <td><?=$list->enddate?></td>
                                <td>
									<a href="<?=$this->config->item('admin_base_url').'sidebar-list/'.url_title($game,'dash',true).'/delete/'.$list->league_id?>"><i class="fa fa-trash fa-2x"></i></a>
								</td>
                              </tr>
							  <?php endforeach;}else{ ?>
								<td colspan="6" class="text-center">
									<h3>No result found</h3>	
								</td>
							  <?php } ?>
                              </tbody>  
                              
                              
                              <tfoot>
                                <tr>
                                <th>#</th>
                                <th>League Name</th>
                                <th>Total events</th>
                                <th>Startdate</th>
                                <th>Enddate</th>
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
   <?php if(!empty($list)){?>
	$('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
	<?php } ?>
    
  });
</script>
<?php $this->load->view('admin-view/footer'); ?>