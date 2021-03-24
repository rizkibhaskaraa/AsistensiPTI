 <footer class="main-footer">
 <?php $cnt = 0 ?>
    <div class="pull-right hidden-xs">
      <b>Web Control Station (WCS) </b> v1.0b
    </div>
    <strong>Copyright &copy; 2018 <a href="http://www.swadexi.com">www.swadexi.com</a>.</strong> All rights
    reserved.
  </footer>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->

<!-- Sparkline -->
<script src="<?php echo base_url(); ?>components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url(); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url(); ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>components/datatables.net/js/jquery.dataTables.min.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url(); ?>components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url(); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>js/adminlte.min.js"></script>
<script src="<?php echo base_url(); ?>js/jquerysession.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>js/demo.js"></script>
<script src="<?php echo base_url(); ?>components/Flot/jquery.flot.js"></script>
	<script src="<?php echo base_url(); ?>components/Flot/jquery.flot.resize.js"></script>
	<script src="<?php echo base_url(); ?>components/Flot/jquery.flot.pie.js"></script>
	<script src="<?php echo base_url(); ?>components/Flot/jquery.flot.categories.js"></script>
	<script src="<?php echo base_url(); ?>components/Flot/jquery.flot.time.js"></script>
<script>
var base_url = '<?=base_url()?>';
 
function sesi()
{ 
	
	var lokasi = $("#kabx").val();
	var tahun =  $("#xtahun").val();
	var bulan =  $("#xbulan").val();
	alert(base_url+"provinsi/set_sesi");
    $.ajax({
    type:"POST",
    url: base_url+ 'provinsi/set_sesi/'+ lokasi +'_'+ tahun +'_'+ bulan',
    data: "data=" + lokasi +'_'+ tahun +'_'+ bulan,
    success: function(result){
        
    }
    });

}
  </script>
  <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
  
  $(function($, undefined) {

    "use strict";

    // When ready.
    $(function() {
        
        var $form  = $( "#form" );
        var $input = $( "#myID" );

        $input.on( "keyup", function( event ) {

            // When user select text in the document, also abort.
            var selection = window.getSelection().toString();
            if ( selection !== '' ) {
                return;
            }
            
            // When the arrow keys are pressed, abort.
            if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
                return;
            }
            
            
            var $this = $( this );
            
            // Get the value.
            var input = $this.val();
            
            var input = input.replace(/[\D\s\._\-]+/g, "");
                    input = input ? parseInt( input, 10 ) : 0;

                    $this.val( function() {
                        return ( input === 0 ) ? "" : input.toLocaleString( "en-US" );
                    } );
        } );

    });
})(jQuery);
</script>

<script>
  $(function () {
    /*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
    var data = [], totalPoints = 100
	var cnt=0;
	var last_id = 0;
    var latitude;
	var longitude;
	
	function getDB(var type){
		
		var result=0;
	
		$.ajax({
        url: '<?php echo base_url(); ?>index.php/index_/get_data/1',
        dataType: 'json',
		async: false,
        success: function( response ) {
            result = response;	
        }
    });
	
	var dData = result.toString().split(',');
	var id = dData[0];
	var latitude = dData[1];
	var longitude = dData[2];
	var steering = dData[3];
	var sudut_kemiringan = dData[4];
	var speed = dData[5];
	var waktu = dData[6];
	var eData = steering;
	
	
	 if (type === 'sudut_kemiringan')
		eData = longitude;
	else if (type === 'speed')
		eData = speed;
	else if (type === 'waktu')
		eData = waktu;
	
	
	if(last_id<id){
		//	alert(result);
		if (data.length > 0)
        data = data.slice(1)
		
      // Do a random walk
      while (data.length < totalPoints) {

        var prev = data.length > 0 ? data[data.length - 1] : 50,
            y    = eData;

        if (y < 0) {
          y = 0
        } else if (y > 100) {
          y = 100
        }
        data.push(y)
      }
		
	}

      // Zip the generated y values with the x values
      var res = []
      for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]])
      }
			last_id = id;
      return res
	}
	
    var interactive_plot = $.plot('#steering', [ getDB()], {
      grid  : {
        hoverable  : true,
        borderColor: '#f3f3f3',
        borderWidth: 1,
        tickColor  : '#f3f3f3'
      },
      series: {
        shadowSize: 0,
        lines     : {
          show: true
        },
        points    : {
          show: true
        }
      },
      lines : {
        fill : false,
        color: ['#3c8dbc', '#f56954']
      },
      yaxis : {
		min : 0,
        max : 100,
        show: true
      },
      xaxis : {
       
		  show: true
      }
    })
	
	var speedx = $.plot('#speed', [ getDB()], {
      grid  : {
        hoverable  : true,
        borderColor: '#f3f3f3',
        borderWidth: 1,
        tickColor  : '#f3f3f3'
      },
      series: {
        shadowSize: 0,
        lines     : {
          show: true
        },
        points    : {
          show: true
        }
      },
      lines : {
        fill : false,
        color: ['#3c8dbc', '#f56954']
      },
      yaxis : {
		min : 0,
        max : 100,
        show: true
      },
      xaxis : {
       
		  show: true
      }
    })
	
    var updateInterval = 500 //Fetch data ever x milliseconds
    var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
   
   function update() {

      interactive_plot.setData([getDB('a')])
	  speedx.setData([getDB('speed')])
	 
      // Since the axes don't change, we don't need to call plot.setupGrid()
      interactive_plot.draw()
      if (realtime === 'on')
        setTimeout(update, updateInterval)
    }

    //INITIALIZE REALTIME DATA FETCHING
    if (realtime === 'on') {
      update()
    }
    //REALTIME TOGGLE
    $('#realtime .btn').click(function () {
      if ($(this).data('toggle') === 'on') {
        realtime = 'on'
      }
      else {
        realtime = 'off'
      }
      update()
    })
    /*
     * END INTERACTIVE CHART
     */

   
    //Initialize tooltip on hover
    $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
      position: 'absolute',
      display : 'none',
      opacity : 0.8
    }).appendTo('body')
    $('#line-chart').bind('plothover', function (event, pos, item) {

      if (item) {
        var x = item.datapoint[0].toFixed(2),
            y = item.datapoint[1].toFixed(2)

        $('#line-chart-tooltip').html(item.series.label + ' of ' + x + ' = ' + y)
          .css({ top: item.pageY + 5, left: item.pageX + 5 })
          .fadeIn(200)
      } else {
        $('#line-chart-tooltip').hide()
      }

    })
    /* END LINE CHART */

    /*
     * FULL WIDTH STATIC AREA CHART
     * -----------------
     */
    

  })

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
      + label
      + '<br>'
      + Math.round(series.percent) + '%</div>'
  }
</script>
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
</body>
</html>