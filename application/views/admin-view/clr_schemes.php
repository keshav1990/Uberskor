<?php $this->load->view("admin-view/header"); ?>
<!-- =============================================== -->
<?php $this->load->view("admin-view/sidebar"); ?>
<!-- =============================================== -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
    </section>
    <!-- Main content -->
    <section class="content">

     <div class="row">
            <div class="col-md-12">
                  <!-- general form elements -->
                    <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title" > <i class="fa fa-ils"></i> Color Schemes  </h3>
                      </div>
                      <?php if (!empty($this->session->flashdata())) { ?>
                      <div class="alert_hide alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h4><i class="icon fa fa-check"></i> Success</h4>
                          <?php echo $this->session->flashdata("msg"); ?>
                      </div>
                      <?php } ?>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <button class="btn btn-info pull-right" onclick="openPreview()"><i class="fa fa-eye"></i> Preview</button><br><br>
                           <table class="table table-bordered">
                            <?php echo form_open_multipart("admin-panel/home/clrschemesUpdate") ?> 
                             
                             <input type="hidden" name="rowid" value="<?=$clrschemes[0]->id?>">
                             
                              <tr>
                                <th style="width: 10px">#</th>
                                <th style="width:200px;">Selector</th>
                                <th style="width: 100px">Color Picker</th>
                              </tr>
                              <tr>
                                <td>1.</td>
                                <td>Body Color</td>
                                
                                <td>
                                  
                               <!-- Color Picker -->
                                  <div class="input-group my-colorpicker2">
                                    <input type="text" class="form-control"  name="bdyclr" id="bdyclr" value="<?=$clrschemes[0]->body_color?>">
                                    <div class="input-group-addon">
                                      <i></i>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                               <tr>
                                <td>2.</td>
                                <td>Footer Color</td>
                                
                                <td>
                                   <!-- Color Picker -->
                                  <div class="input-group my-colorpicker2">
                                    <input type="text" class="form-control" name="ftrclr" id="ftrclr"   value="<?=$clrschemes[0]->footer_color?>">
                                    <div class="input-group-addon">
                                      <i></i>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>3.</td>
                                <td>Footer Font Color</td>
                                
                                <td>
                                     <!-- Color Picker -->
                                  <div class="input-group my-colorpicker2">
                                    <input type="text" class="form-control" name="ffontclr" id="ffontclr"    value="<?=$clrschemes[0]->footer_font_color?>">
                                    <div class="input-group-addon">
                                      <i></i>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>4.</td>
                                <td>SubFooter Color</td>
                                
                                <td>
                                      <!-- Color Picker -->
                                  <div class="input-group my-colorpicker2">
                                    <input type="text" class="form-control" name="subfooterclr" id="subfooterclr"    value="<?=$clrschemes[0]->subfooter_color?>">
                                    <div class="input-group-addon">
                                      <i></i>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>5.</td>
                                <td>SubFooter Font Color</td>
                                
                                <td>
                                      <!-- Color Picker -->
                                  <div class="input-group my-colorpicker2">
                                    <input type="text" class="form-control"name="subfooterfontclr" id="subfooterfontclr"  value="<?=$clrschemes[0]->subfooter_font_color?>">
                                    <div class="input-group-addon">
                                      <i></i>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>6.</td>
                                <td>Inner Body Color</td>
                                
                                <td>
                                    <!-- Color Picker -->
                                  <div class="input-group my-colorpicker2">
                                    <input type="text" class="form-control" name="inrbdyclr" id="inrbdyclr"  value="<?=$clrschemes[0]->inner_body_color?>">
                                    <div class="input-group-addon">
                                      <i></i>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>7.</td>
                                <td>Inner Body Font Color</td>
                              
                                <td>
                                    <!-- Color Picker -->
                                  <div class="input-group my-colorpicker2">
                                    <input type="text" class="form-control" name="inrbdyfnclr" id="inrbdyfnclr"  value="<?=$clrschemes[0]->innerbody_font_color?>">
                                    <div class="input-group-addon">
                                      <i></i>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>8.</td>
                                <td>Table Head Color</td>
                               
                                <td>
                                    <!-- Color Picker -->
                                  <div class="input-group my-colorpicker2">
                                    <input type="text" class="form-control" name="tblheadclr" id="tblheadclr" value="<?=$clrschemes[0]->table_head_color?>">
                                    <div class="input-group-addon">
                                      <i></i>
                                    </div>
                                  </div>
                                </td>
                              </tr> 
                              <tr>
                                <td>9.</td>
                                <td>Table Row Color</td>
                                
                                <td>
                                    <!-- Color Picker -->
                                  <div class="input-group my-colorpicker2">
                                    <input type="text" class="form-control" name="tblrowclr" id="tblrowclr" value="<?=$clrschemes[0]->table_row_color?>">
                                    <div class="input-group-addon">
                                      <i></i>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                               <tr>
                                <td>10.</td>
                                <td>Table Font Color</td>
                                
                                <td>
                                    <!-- Color Picker -->
                                  <div class="input-group my-colorpicker2">
                                    <input type="text" class="form-control" name="tblfontclr" id="tblfontclr" value="<?=$clrschemes[0]->table_font_color?>">
                                    <div class="input-group-addon">
                                      <i></i>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>11.</td>
                                <td>Sidebar Color</td>
                                
                                <td>
                                    <!-- Color Picker -->
                                  <div class="input-group my-colorpicker2">
                                    <input type="text" class="form-control" name="sidebarclr" id="sidebarclr" value="<?=$clrschemes[0]->sidebar_color?>">
                                    <div class="input-group-addon">
                                      <i></i>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>12.</td>
                                <td>Sidebar Font Color</td>
                                
                                <td>
                                    <!-- Color Picker -->
                                  <div class="input-group my-colorpicker2">
                                    <input type="text" class="form-control" name="sidebarfontclr" id="sidebarfontclr" value="<?=$clrschemes[0]->sidebar_font_color?>">
                                    <div class="input-group-addon">
                                      <i></i>
                                    </div>
                                  </div>
                                </td>
                              </tr>


                              <tr>
                                <td>13.</td>
                                <td>Top Head Color</td>
                                
                                <td>
                                    <!-- Color Picker -->
                                  <div class="input-group my-colorpicker2">
                                    <input type="text" class="form-control" name="tophead_color" id="tophead_color" value="<?=$clrschemes[0]->tophead_color?>">
                                    <div class="input-group-addon">
                                      <i></i>
                                    </div>
                                  </div>
                                </td>
                              </tr>

                              <tr>
                                <td>14.</td>
                                <td>Sidebar 2nd List Color</td>
                              
                                <td>
                                    <!-- Color Picker -->
                                  <div class="input-group my-colorpicker2">
                                    <input type="text" class="form-control" name="sidebar_bottomlist_color" id="sidebar_bottomlist_color" value="<?=$clrschemes[0]->sidebar_bottomlist_color?>">
                                    <div class="input-group-addon">
                                      <i></i>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>15.</td>
                                <td>Sidebar 2nd List Font Color</td>
                                
                                <td>
                                    <!-- Color Picker -->
                                  <div class="input-group my-colorpicker2">
                                    <input type="text" class="form-control" name="sidebar_bottomlist_font_color" id="sidebar_bottomlist_font_color" value="<?=$clrschemes[0]->sidebar_bottomlist_font_color?>">
                                    <div class="input-group-addon">
                                      <i></i>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>16.</td>
                                <td>Sidebar Last List Color</td>
                                
                                <td>
                                    <!-- Color Picker -->
                                  <div class="input-group my-colorpicker2">
                                    <input type="text" class="form-control" name="last_list_color" id="last_list_color" value="<?=$clrschemes[0]->last_list_color?>">
                                    <div class="input-group-addon">
                                      <i></i>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>17.</td>
                                <td>Sidebar Last List Font Color</td>
                               
                                <td>
                                    <!-- Color Picker -->
                                  <div class="input-group my-colorpicker2">
                                    <input type="text" class="form-control" name="last_list_font_color" id="last_list_font_color"  value="<?=$clrschemes[0]->last_list_font_color?>">
                                    <div class="input-group-addon">
                                      <i></i>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="3" class="text-center">
                                  <input type="submit" class="btn btn-lg btn-primary btn-flat" value="Update">
                                </td>
                              </tr>                      
                              <?php echo form_close(); ?>
                            </table>
                      </div>
                      <!-- form start -->
                    
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
<!-- jQuery 2.2.3 -->

<script src="<?php echo base_url('assets/');?>plugins/jQuery/jquery-2.2.3.min.js"></script>


<script>
function clrchanger(val){
      var value = val.value;
      var id = val.id;
      $("."+id).css("background-color",value);
    }

function openPreview(){
  var bdyclr = $("#bdyclr").val();
   var ftrclr = $("#ftrclr").val();
   var ffontclr = $("#ffontclr").val();
    var inrbdyclr = $("#inrbdyclr").val();
     var inrbdyfnclr = $("#inrbdyfnclr").val();
     var tblrowclr = $("#tblrowclr").val();
     var tblfontclr = $("#tblfontclr").val();
     var tblheadclr = $("#tblheadclr").val();
     var sidebarclr = $("#sidebarclr").val();
     var sidebarfontclr = $("#sidebarfontclr").val();
     var subfooter_color = $("#subfooterclr").val();
     var subfooter_font_color = $("#subfooterfontclr").val();

     var tophead_color = $("#tophead_color").val();
      var sidebar_bottomlist_color = $("#sidebar_bottomlist_color").val();
       var sidebar_bottomlist_font_color = $("#sidebar_bottomlist_font_color").val();
        var last_list_color = $("#last_list_color").val();
         var last_list_font_color = $("#last_list_font_color").val();

     bdyclr = bdyclr.replace("#", "");
     ftrclr = ftrclr.replace("#", "");
      ffontclr = ffontclr.replace("#", "");
       inrbdyclr = inrbdyclr.replace("#", "");
        inrbdyfnclr = inrbdyfnclr.replace("#", "");
        tblrowclr = tblrowclr.replace("#", "");
        tblheadclr = tblheadclr.replace("#", "");
        tblfontclr = tblfontclr.replace("#", "");
        sidebarclr = sidebarclr.replace("#", "");
        sidebarfontclr = sidebarfontclr.replace("#", "");
        subfooter_color = subfooter_color.replace("#", "");
        subfooter_font_color = subfooter_font_color.replace("#", "");
        
        tophead_color = tophead_color.replace("#", "");
        sidebar_bottomlist_color = sidebar_bottomlist_color.replace("#", "");
        sidebar_bottomlist_font_color = sidebar_bottomlist_font_color.replace("#", "");
        last_list_color = last_list_color.replace("#", "");
        last_list_font_color = last_list_font_color.replace("#", "");


      var link = "<?php echo $this->config->item('admin_base_url').'home/preview';?>" ;
      var url = link+"?body_color="+bdyclr+"&footer_color="+ftrclr+"&footer_font_color="+ffontclr+"&inner_body_color="+inrbdyclr+"&innerbody_font_color="+inrbdyfnclr+"&tbl_head_color="+tblheadclr+"&tbl_row_color="+tblrowclr+"&tbl_font_color="+tblfontclr+"&sidebar_color="+sidebarclr+"&sidebar_font_color="+sidebarfontclr+"&subfooter_color="+subfooter_color+"&subfooter_font_color="+subfooter_font_color+"&tophead_color="+tophead_color+"&sidebar_bottomlist_color="+sidebar_bottomlist_color+"&sidebar_bottomlist_font_color="+sidebar_bottomlist_font_color+"&last_list_color="+last_list_color+"&last_list_font_color="+last_list_font_color;
      // alert(url);
   window.open(url,'',width=400,height=200);
}

$(document).ready(function(){

});
</script>

<?php $this->load->view('admin-view/footer'); ?>

