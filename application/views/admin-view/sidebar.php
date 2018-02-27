
  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/');?>img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ucwords($this->session->userdata('admin_name')); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>


        <li class="treeview">
          <a href="#"><i class="fa fa-fw fa-external-link"></i> <span>External Link</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
                <li>
                 <a href="<?php echo $this->config->item('admin_base_url').'link/externalLink';?>">
                  <i class="fa fa-fw fa-external-link"></i> <span>Add External Link</span>
                </a>
              </li>
              <li>
                <a href="<?php echo $this->config->item('admin_base_url').'link/manageLink';?>">
                  <i class="fa fa-fw fa-external-link"></i> <span>Manage External Link</span>
                </a>
              </li>
          </ul>
        </li>
		<li class="treeview">
          <a href="#"><i class="fa fa-file-picture-o"></i> <span>Manage Banners</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
				<li>
				   <a href="<?php echo $this->config->item('admin_base_url').'banners/futboll';?>">
					<i class="fa fa-file-image-o"></i> <span>Futboll Banners</span>
				  </a>
				</li>
				<li>
				   <a href="<?php echo $this->config->item('admin_base_url').'banners/basketball';?>">
					<i class="fa fa-file-image-o"></i> <span>Basketball Banners</span>
				  </a>
				</li>
				<li>
				   <a href="<?php echo $this->config->item('admin_base_url').'banners/icehockey';?>">
					<i class="fa fa-file-image-o"></i> <span>Ice-Hockey Banners</span>
				  </a>
				</li>								<li>				   <a href="<?php echo $this->config->item('admin_base_url').'banners/tennis';?>">					<i class="fa fa-file-image-o"></i> <span>Tennis Banners</span>				  </a>				</li>

          </ul>
        </li>
		<li class="treeview">
          <a href="<?php echo $this->config->item('admin_base_url').'sidebar-list';?>"><i class="fa fa-fw fa-list"></i> <span>Featuer Leauges For SideBar</span>
		  </a>
        </li>
		<li class="treeview">
          <a href="<?php echo $this->config->item('admin_base_url').'country';?>"><i class="fa fa-fw fa-list"></i> <span>Country And Leauge Sorting</span>
		  </a>
        </li>

        	<li class="treeview">
          <a href="<?php echo $this->config->item('admin_base_url').'country/center';?>"><i class="fa fa-fw fa-list"></i> <span>Center Content Sorting</span>
		  </a>
        </li>

		<li class="treeview">
          <a href="#"><i class="fa fa-fw fa-gear"></i> <span>Theme Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
				<li>
				   <a href="<?php echo $this->config->item('admin_base_url').'home/clrschemes';?>">
					<i class="fa fa-ils"></i> <span>Color Schemes</span>
				  </a>
				</li>
				<li>
				   <a href="<?php echo $this->config->item('admin_base_url').'link/subheader';?>">
					<i class="fa fa-fw fa-file-text-o"></i> <span>Top Content</span>
				  </a>
				</li>
				<li>
				   <a href="<?php echo $this->config->item('admin_base_url').'link/footer';?>">
					<i class="fa fa-fw fa-file-text-o"></i> <span>Footer Content</span>
				  </a>
				</li>
          </ul>
        </li>
		<li>
			   <a href="<?php echo $this->config->item('admin_base_url').'home/social';?>">
				<i class="fa fa-google-plus"></i> <span>Social Credentials</span>
			  </a>
		</li>
		<li>
           <a href="<?php echo $this->config->item('admin_base_url').'smtp';?>">
            <i class="fa fa-envelope"></i> <span>SMTP Settings</span>
          </a>
        </li>
		<li>
           <a href="<?php echo $this->config->item('admin_base_url').'settings/profile';?>">
            <i class="fa fa-fw fa-user-secret"></i> <span>Manage Profile</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->