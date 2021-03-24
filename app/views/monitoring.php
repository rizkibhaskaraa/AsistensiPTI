 
 <!-- Left side column. contains the logo and sidebar -->



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>

    
    </section>
<div style="align:center;" class="row">
	 <center> 
	    <legend>Vehicle Monitoring </legend>
	   <div id="myMap" style=" position:relative;width:800px;height:400px;"></div>   
			
		</fieldset>
	</center>	
	   
		</div>

 <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AuGhjudeHzRmapJ_IOpZRaB2ybr-0FIIVhVCeGF8be_44OPjWzEN2tNUgArJ4RwJ' async defer></script>


    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	  <div class="row">
        <div class="col-md-6">
          <!-- Line chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Speed</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="speed" style="height: 300px;"></div>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->
		</div>
		
		
		 <div class="col-md-6">
          <!-- Line chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Heading</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="steering" style="height: 300px;"></div>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->
		</div>
		
		
	   





			
			 
		
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

	
