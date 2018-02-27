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
		<form method="post" action="<?php echo base_url();?>admin-panel/leagues/add_leagueslist" id="country_list">
          <div class="box box-primary">
            <div class="box-body box-profile">
			<input type="submit" name="submit" value="Save">
			
			<ul class="list-group">
			<?php if(!empty($country)){ foreach ($country as $country): ?> 
			<li class="list-group-item"><a class="panel-collapse collapsed" aria-expanded="false" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $country->id; ?>" onclick="get_country('<?php echo $country->id; ?>')"><?=$country->name?></a>
			<!--li class="box-item" data-countryid="<?php echo $country->id; ?>"><?php echo $country->name; ?>-->
            <div id="collapse_<?php echo $country->id; ?>" class="panel-collapse collapse" aria-expanded="false">			
			<ul class="list-group sortable_cntry_<?php echo $country->id; ?>" id="sortable_cntry">
		 <?php if(!empty($country->leagues)){ foreach($country->leagues as $league1) :?>
            <li class="list-group-item box-item_<?php echo $country->id; ?>" data-countryid="<?php echo $league1->id; ?>">
			<?=$league1->name?></li>
		 <?php endforeach; }  ?>
         </ul>
		 </div>
			</li>
			 <?php endforeach;}?>
			</ul>
           
			<input type="hidden" value="<?php echo $sportFK;?>" name="sportFK">
			<!--<input type="hidden" value="" name="countryId"> -->
			<textarea style="display:none;" name="league_id" id="league_id">		</textarea>
			<input type="hidden" value="<?php echo $game;?>" name="game">
			<input type="hidden" value="" name="country_id" id="country_id">
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
    <strong>Copyright &copy; 2017 <a href="#">Uberskor.com</a>.</strong> All rights
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
  #sortable_cntry li span { position: absolute; margin-left: -1.3em; }
  </style>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
    <script>
	var cid='';
	function get_country(id)
	{
	  $( "#country_id").val(id);
       cid=id;	  
	//}
  //$( function() {
	  var sortArray= [];
	 
$( ".sortable_cntry_"+cid ).sortable({
     update: function( event, ui ) {
		 var sortArray= [];
		 console.log(ui);
		   $('.box-item_'+cid).each(function() {
			   //console.log($(this).attr("data-countryid"));
	   if($(this).attr("data-countryid") != 'undefined'){		   
       sortArray.push($(this).attr("data-countryid")+",");
	   }
      });
	    $("#league_id").empty().html(sortArray);
	  }
 });
 	 
    $( ".sortable_cntry_"+cid ).disableSelection();
  //} );
  }
  </script>
<?php $this->load->view('admin-view/footer'); ?>