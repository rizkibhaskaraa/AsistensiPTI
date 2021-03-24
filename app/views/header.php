<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Web Control Station</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/AdminLT.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Daterange picker -->

  
  
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <!--link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">  -->
  <body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Web Control Station</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
	
		<li ><a style="padding:10px 10px 10px 10px;" href="<?php echo base_url(); ?>export"><div class="btn-primary btn btn-block btn-sm"><i class="fa fa-fw fa-file-excel-o"></i><span> Download Excel</span></div></a>	 </li> 
		
           <li ><a  style="padding:10px 10px 10px 10px;" href="<?php echo base_url('index_/logout')?>"><div class="btn-primary btn btn-block btn-sm"><i class="fa fa-sign-out"></i><span> Keluar</span></div></a>	 </li>
          <li>
            <a href="#" data-toggle="modal" data-target="#myModal" ><i class="fa fa-gears"></i></a>
          </li>
        </ul>
		
      </div>
    </nav>
  </header>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Pengaturan </h4>
        </div>
        <div class="modal-body">
          
          <div class="modal-header">
            <button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">Ubah Periode</h4>
          </div>
          <form action="<?php echo base_url('viewer/set_sesi'); ?>" class="form-horizontal" id="periodeform" method="post" accept-charset="utf-8">
              <div class="modal-body">
                    <div class="form-group">
                      
                        <!--<select class="form-control select2" style="width: 100%;">-->
        <?php if($_SESSION['level'] == 'provinsi') :?> 
		<label for="filterArea" class="col-sm-2 control-label">Kab/Kota</label>
        <div class="col-sm-10">
		<select name="kabx" id="kabx" class="form-control">						
		<option value="lampung" <?php $e=''; if($_SESSION['lokasi'] == 'lampung') $e = 'selected = "selected"'; echo $e; ?> >-- Semua Kabupaten/Kota --</option>	
		<?php if (!empty($dbh)){
		foreach($dbh->result() as $kab)
		{	$e='';
			if($_SESSION['lokasi'] == $kab->nama_kab) $e = 'selected = "selected"';
			echo '<option value="'.$kab->lokasi.'" '.$e.'>'.$kab->lokasi.'</option>';
		}
		}
		?>
		
		</select> <?php  endif; ?>
                      </div>
                    </div>
                     <?php	$split = explode(' ', $_SESSION['periode']); ?>               
                    <div class="form-group">
                      <label for="fl_tahun" class="col-sm-2 control-label">Tahun</label>
                      <div class="col-sm-10">
                        <!--<input type="text" class="form-control" id="fl_tahun" placeholder="Tahun" value="2017">-->
                        <select name="fl_tahun" id="xtahun" class="form-control">
						<?php for($y=2017;$y<=(int)date('Y');$y++){
								$e='';
								if ((int)$split[1] == $y) $e='selected = "selected"';
								echo '<option '.$e.'value="'.$y.'">'.$y.'</option>';
							 }
								?>
						</select>
                      </div>
                    </div>
                    <div class="form-group" style="margin-bottom:0">
                      <label for="fl_bulan" class="col-sm-2 control-label">Bulan</label>
                      <div class="col-sm-10"> 
						
                        <select name="fl_bulan" id="xbulan" class="form-control">
							<option <?php if ($split[0] == 'Januari') echo 'selected = "selected"' ?> value="Januari">Januari</option>
							<option <?php if ($split[0] == 'Februari') echo 'selected = "selected"' ?> value="Februari">Februari</option>
							<option <?php if ($split[0] == 'Maret') echo 'selected = "selected"' ?> value="Maret">Maret</option>
							<option <?php if ($split[0] == 'April') echo 'selected = "selected"' ?> value="April">April</option>
							<option <?php if ($split[0] == 'Mei') echo 'selected = "selected"' ?> value="Mei">Mei</option>
							<option <?php if ($split[0] == 'Juni') echo 'selected = "selected"' ?> value="Juni">Juni</option>
							<option <?php if ($split[0] == 'Juli') echo 'selected = "selected"' ?> value="Juli">Juli</option>
							<option <?php if ($split[0] == 'Agustus') echo 'selected = "selected"' ?> value="Agustus">Agustus</option>
							<option <?php if ($split[0] == 'September') echo 'selected = "selected"' ?> value="September">September</option>
							<option <?php if ($split[0] == 'Oktober') echo 'selected = "selected"' ?> value="Oktober">Oktober</option>
							<option <?php if ($split[0] == 'November') echo 'selected = "selected"' ?> value="November">November</option>
							<option <?php if ($split[0] == 'Desember') echo 'selected = "selected"' ?> value="Desember" >Desember</option>
						</select>
                      </div>
                    </div>
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-flat btn-default pull-left" type="button">Batal</button>
               
				 <input type="submit" class="btn btn-flat btn-primary" onclick="sesi();" id="btn_simpan" value="Ubah" />
              </div>
          </form>        
        </div>
        
      </div>
    </div>
  </div>
