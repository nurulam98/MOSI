<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MOSI</title>
	<link href="dist/css/bootstrap.css" rel="stylesheet">
	<script type="text/javascript" src="dist/js/jquery-3.4.1.js"></script>
	<script type="text/javascript" src="dist/js/bootstrap.js"></script>
</head>
<body>
	<div class="container">
		<marquee behavior="scroll"><h1 class="text-center">SISTEM ANTRIAN DANTO SPORT</h1></marquee>
        <hr>
        <form action="hasil.php" target="_blank" method="POST">
            <div style="float:left;width:500px;">
            	<div style="width:500px;text-align:center;font-weight:bold;padding:10px;">DATA ANTRIAN</div>
	        	<table class="table table-borderless" id="antrian">
	        		<tbody>
	        			<tr>
	        				<td>Data Waktu Antrian</td>
	        			</tr>
	        		</tbody>
	        		<tbody>
	        			<tr>
	        				<td>
	        					<div class="row">
						        	<div class="input-group">
									  <input type="text" class="form-control" name="ant">
									</div>    	
						        </div>
			    			</td>
	        			</tr>
	        		</tbody>
	        	</table>
            </div>
            <div style="float:left; width:500px;">
            	<div style="width:500px;text-align:center;font-weight:bold;padding:10px;">DATA PELAYANAN</div>
	        	<table class="table table-borderless" id="pelayanan" style="margin-left: 20px;">
	        		<tbody>
	        			<tr>
	        				<td>Data Waktu PELAYANAN</td>
	        			</tr>
	        		</tbody>
	        		<tbody>
	        			<tr>
	        				<td>
	        					<div class="row">
						        	<div class="input-group">
									  <input type="text" class="form-control" name="plyn">
									</div>    	
						        </div>
			    			</td>
	        			</tr>
	        		</tbody>
	        	</table>
            </div>
            <div style="float:left;">
            	<div style="width:1000px;text-align:center;font-weight:bold;padding:10px;">Bilangan Acak</div>
	        	<table class="table table-borderless" id="pelayanan">
	        		<tbody>
	        			<tr>
	        				<td>
	        					<div class="form-group col-sm-4">
								    <label>Bilangan acak yang akan dibangkitkan</label>
								    <input type="text" class="form-control" name="bil_acak">
								  </div>
			    			</td>
	        			</tr>
	        			<tr>
	        				<td>
	        					<div class="row">
                                  <div class="col-xs-12" style="margin-left:30px;">
                                    <label>Konstanta Pengali</label>
								    <input type="text" class="form-control" name="kons_a">     
                                  </div>
                                  <div class="col-xs-12" style="margin-left:10px;">
                                    <label>Konstanta Increment</label>
								    <input type="text" class="form-control" name="kons_i">
                                  </div>
                                </div>
			    			</td>
	        			</tr>
	        			<tr>
	        				<td>
	        					<div class="row">
                                  <div class="col-xs-12" style="margin-left:30px;">
                                    <label>Modulus</label>
								    <input type="text" class="form-control" name="modul">     
                                  </div>
                                  <div class="col-xs-12" style="margin-left:10px;">
                                    <label>Nilai Awal</label>
								    <input type="text" class="form-control" name="z0">
                                  </div>
                                </div>
			    			</td>
	        			</tr>
	        		</tbody>
	        	</table>
            </div>
            <div style="float:left;width:950px;margin-top:50px;text-align:center;"><button type="submit">Proses</button></div>
        </form>
    </div>
</body>
</html>