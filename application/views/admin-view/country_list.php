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
                        <?php }
                           else if ($this->session->flashdata('status')=='error') { ?>
                          <div class="alert_hide alert alert-success alert-dismissible" style="background:#00a65a!important;">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-check"></i>Error</h4>
                          <?php echo $this->session->flashdata("msg"); ?>
                          </div> 
                        <?php }
						?>                              
                      <?php } ?> 
					  
        <!-- Profile Image -->
		<form method="post" action="<?php echo base_url();?>admin-panel/country/add_countrylist" id="country_list">
          <div class="box box-primary">
            <div class="box-body box-profile">
			<input type="submit" name="submit" value="Save">
			<ul id="sortable_cntry">
			<?php if(!empty($country)){ foreach ($country as $country): ?> 
			<li class="box-item" data-countryid="<?php echo $country->id; ?>"><?php echo $country->name; ?> 
			<span class="pull-right ">
			<a class="btn btn-primary" href="<?php echo $this->config->item('admin_base_url').'country/league/'.url_title($game,"dash",true).'/'.$country->id;?><?php if($center==1){ echo "/center";} ?>">Arrange Leagues</a>
			</span>
			</li>
			 <?php endforeach;}?>
			</ul>
           
			<input type="hidden" value="<?php echo $sportFK;?>" name="sportFK">
			<!--<input type="hidden" value="" name="countryId"> -->
			<textarea style="display:none;" name="countryId" id="countryId">		</textarea>
			<input type="hidden" value="<?php echo $game;?>" name="game">
			<input type="hidden" value="<?php echo $center;?>" name="center">
              <input type="submit" name="submit" value="Save">
            </div>
          </div>
		  </form>
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
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">Uberskor.com</a>.</strong> All rights
    reserved.
  </footer>

  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<style>
  #sortable_cntry { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #sortable_cntry li {     margin: 10px 3px 3px 3px;
    padding: 10px 0.4em;
    /* padding-left: 1.5em; */
    font-size: 1.4em;
    /* height: 18px; */
    border: 1px solid #eee; }
  /*#sortable_cntry li span { position: absolute; margin-left: -1.3em; }*/
  </style>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
    <script>
  $( function() {
	  var sortArray= [];
$( "#sortable_cntry" ).sortable({
     update: function( event, ui ) {
		 var sortArray= [];
		 console.log(ui);
		   $('.box-item').each(function() {
			   //console.log($(this).attr("data-countryid"));
	   if($(this).attr("data-countryid") != 'undefined'){		   
       sortArray.push($(this).attr("data-countryid")+",");
	   }
      });
	    $("#countryId").empty().html(sortArray);
	  }
 });
 	 
    $( "#sortable_cntry" ).disableSelection();
  } );
  </script>
<?php $this->load->view('admin-view/footer'); ?>