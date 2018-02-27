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
        <i class="fa fa-fw fa-external-link"></i> Add League To <?=ucwords($game)?> 
      </h1>
	  <p><br>
	  <a href="<?=$this->config->item('admin_base_url').'sidebar-list/'.url_title($game,"dash",true)?>">
		<button class="btn btn-primary"><i class="fa fa-undo "></i> Back to list</button>
	  </a>
	  </p>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
             
        <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile table-responsive">
				
				<?php echo form_open(current_url());?>
				  <div class="box-body">
					<div class="form-group">
					  <label for="exampleInputEmail1">Search League</label>
					  <input type="text"  minlength="3" class="form-control" id="exampleInputEmail1" placeholder="Enter league name"  name="league_name" value="<?=!empty($text)? $text:'';?>" required>
					</div>
				  </div>
				  <!-- /.box-body -->

				  <div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				  </div>
				</form>
        

            </div>
          </div>
		  
          <!-- /.Profile End -->
        </div>
      </div>  
		<?php if(!empty($text)) { ?>
		<div class="row">

				<div class="col-md-12 col-sm-12 col-xs-12">
				  <div class="info-box" style="min-height:auto;">
					<span class="info-box-icon bg-aqua" style="
						height: 55px;
						line-height: 55px;
						font-size: xx-large;
					"><i class="fa fa-search "></i></span>

					<div class="info-box-content">
					  <span class="info-box-text">Searched result for : </span>
					  <span class="info-box-number"><?=$text?></span>
					</div>
					<!-- /.info-box-content -->
				  </div>
				  <!-- /.info-box -->
				</div>
				
				
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
                              
                              
                              
                              
                              <tfoot>
                                <tr>
                                <th>#</th>
                                <th>League Name</th>
                                <th>Country</th>
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
		<?php } ?>      
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
<?php 
$ajax_url = $this->config->item('admin_base_url')."sidebar-list/".url_title($game,'dash',true)."/getSearchedList"; 
?>
<script>
function addToList(id)
{
  if( confirm('Are you sure you want to add to My leagues..?')) {
      var url = "<?=$this->config->item('admin_base_url').'sidebar-list/'.url_title($game,"dash",true).'/updateList/'?>"+id
      window.location = url; 
  }
  else{
    return false;
  }
}
  $(function () {
	text = $("#exampleInputEmail1").val();
	url = "<?=$ajax_url?>";
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
	  "processing": true,
      "bserverSide":true,
      //"responsive": true,
        "ajax": {"url":url,"type":'POST',"data":{text:text}}
    });

  });
</script>
<?php $this->load->view('admin-view/footer'); ?>