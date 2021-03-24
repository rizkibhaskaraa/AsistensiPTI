<aside class="main-sidebar" style="height:100%">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" >
     
      
      <!-- search form -->
     
   
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
		<li >  . </li>
		<?php 
		
		$cur = (new \DateTime())->format('d');
		$max_d =(new \DateTime())->format( 't' );			
		if($cur == $max_d || $cur == 1 || $cur == 2 || $cur == 3 ): ?>
		
		<?php endif; ?>
		<li >
          <a href="<?php echo base_url(); ?>">
            <i class="fa  fa-dashboard"></i> <span>Dashboard</span>
          </a>          
        </li>
		
		<li >
          <a href="<?php echo base_url(); ?>index_/control">
            <i class="fa  fa-dashboard"></i> <span>Control</span>
          </a>          
        </li>
		
		
		<li class="treeview">		  
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Monitoring</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
			  <ul class="treeview-menu">
				
				<li > <a href="<?php echo base_url(); ?>index_/monitoring"> <i class="fa  fa-dashboard"></i> <span>Location Mapping</span> </a> </li>
				<li > <a href="<?php echo base_url(); ?>index_/grafik"> <i class="fa  fa-dashboard"></i> <span>Graph</span> </a> </li>		
			  </ul>
		  </li>
		  
		  
		  
     
	  </ul>
    </section>
    <!-- /.sidebar -->
  </aside>