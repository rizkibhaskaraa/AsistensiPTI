 
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

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
	  
	   <div style="align:center;" class="row">
	   
<div style="align:center;" class="row">
	 <center> 
	    <legend>Waypoint <?php echo $status; ?></legend>
	   <div id="myMap" style=" position:relative;width:800px;height:400px;"></div>   
			<form action="<?php echo base_url('index_/submit_wp'); ?>" method="post" role="form">
				<fieldset style="width:800px;margin-top:10px;"> <input type="text" id="wp" name="wp" value="">    
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</fieldset>
	</center>	
	   
		</div>
<script type='text/javascript'>
	
    var map;
	var i=0;
	var car;
	var jalur =[];
	var docx =[];
	var pin;
	var base64Image = 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAcCAYAAACUJBTQAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3wQbECUudScMXAAAAB1pVFh0Q29tbWVudAAAAAAAQ3JlYXRlZCB3aXRoIEdJTVBkLmUHAAACGUlEQVRIx+3Wy2sTURTH8e/NTDIzaZMxadMWhyBUSheiiyo+QPpHuHIhdOfSP8GlbkXEhTv/gNau3LgRurEIUqlWU2ubh7evPEg6NjOZJHNdlIgLo11YRcj5A84Hfpx7zxFKKcUJlw7gOM6JAVLKIwTg4avbfxy4c/UJABH+Qg2QAfKfI98f48vc/CCuATJA/iEilFKq3/q98XTk2I0W5qp916/41SHhOM6xoIW5KlLK/t/K6oNbwlAdknELYSZpxTMkxrO4XoCUUv0O6gHlYkjHWxF+yyWTsKit57CGbbTMGSJWepTh05PIRof3mxLNjNP0Pdp+i9ziIyGl7BtFD1hdOqRdei5ijW2shkSvS8LAJTM2gh4JiWzvFNksFdAsA3s0Ram4TrtZJxnXCLwKWSF+CvWAt89czmffiEQ0gGYZzSuTX3tNx60Q1Pcxwyb67JUL7Jb38VsdojETz2ux8W6JqG6iJaOoGLTr98WP0fWAsZgQ849v8mnZYeriLNinwAup722RsW12cysYiRT62voGwymbbsQgMZREcMD1yzN4nkctrNEV4HbrTKeFKNeOJlFKiXtwV2ganJvKkF8rsvxiEd8P0FSTiXQa2wxJxEz2yl/QA2Mc2Qihq7NdqdE5rJAc2ufsZBbTiIIGXWXTVeCIa0glMQwh8vl7hMDHD5+Zmb7E16ZPtVrFilnsFLY42CngTDhEohbfALpF/s+4JwbyAAAAAElFTkSuQmCC';
    function GetMap()
    {
        
		map = new Microsoft.Maps.Map('#myMap', {});
        var clickTimout;
		 map.setView({
            mapTypeId: Microsoft.Maps.MapTypeId.aerial,
            
            zoom: 15
        });
        
		Microsoft.Maps.Events.addHandler(map, 'click', function (e) {
		
			if (e.targetType == "map") {
			i=i++;
           var point = new Microsoft.Maps.Point(e.getX(), e.getY());
           var locTemp = e.target.tryPixelToLocation(point);
           var location = new Microsoft.Maps.Location(locTemp.latitude, locTemp.longitude);
		    
            pin = new Microsoft.Maps.Pushpin(location, { text: jalur.length+1,'draggable': false});   
		     
			 jalur.push(location);
			 docx.push(locTemp.longitude+"x"+ locTemp.latitude+"");
             var line = new Microsoft.Maps.Polyline(jalur);
			 map.entities.push(line);
             map.entities.push(pin);
			 
             car = new Microsoft.Maps.Pushpin(location, { color: 'yellow','draggable': false}); 
				map.entities.push(car);			
			}  
			
		
		});
		
		
        
    }
	
	
    </script>
 <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=AuGhjudeHzRmapJ_IOpZRaB2ybr-0FIIVhVCeGF8be_44OPjWzEN2tNUgArJ4RwJ' async defer></script>



			
			 
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

