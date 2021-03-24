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

</body>
</html>