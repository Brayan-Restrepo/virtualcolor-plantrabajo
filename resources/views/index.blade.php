<!DOCTYPE html>
<html>
<head>
	<title>PLAN DE TRABAJO</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/AdminLTE.css">
	<link rel="stylesheet" type="text/css" href="css/plantrabajo.css">
	<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  	<!-- bootstrap wysihtml5 - text editor -->
  	<link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

	<script type="text/javascript" src="js/jQuery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
	<!-- Bootstrap WYSIHTML5 -->
	<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
</head>
<body class="fondo">
	<div class="container border-top5">
		
		<section id="plan_trabajp">
			<div class="panel panel-primary">
				<div class="panel-heading"> 
					<h3 class="panel-title">Plan de Trabajo</h3> 
				</div>
			  	<div class="panel-body">
			  		{!! Form::open(['route' => 'plantrabajo.store', 'method'=>'POST', 'class'=>'', 'id'=>'form_estudiante']) !!}
			  		{!! Form::close() !!}
			  		<div class="row">
			  			<div class="col-lg-6">
			  				<div>
				  				<label>Fecha Inicio</label>
				  				<div class="input-group"> 
				  					<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-calendar"></i></span> 
				  					<input class="form-control" type="date" id="fecha-inicio" name="fecha-inicio" aria-describedby="basic-addon1"> 
				  				</div>
				  			</div>				  			
			  				<div>
				  				<label>Responsable</label>
				  				<div class="input-group"> 
				  					<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-user"></i></span> 
				  					<input class="form-control" type="text" id="responsable" name="responsable" aria-describedby="basic-addon1"> 
				  				</div>
				  			</div>
			    		</div>
			  			<div class="col-lg-6">
			  				<div>
				  				<label>Fecha Finalización</label>
				  				<div class="input-group"> 
				  					<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-calendar"></i></span> 
				  					<input class="form-control" type="date" id="fecha-finalizacion" name="fecha-finalizacion" aria-describedby="basic-addon1"> 
				  				</div>
				  			</div>
			  				<div>
				  				<label>Avance</label>
				  				<div class="input-group"> 
				  					<span class="input-group-addon" id="basic-addon1">%</span> 
				  					<input class="form-control" type="number" id="avance" name="avance" aria-describedby="basic-addon1"> 
				  				</div>
				  			</div>
			    		</div>
			  		</div>			    	
			    	<div class="row">
			            <div class="col-lg-12">

			            	<h3 class="box-title">Objetivos generales del SGSST PYMES</h3>
			                <textarea class="textarea" id="objetivo" placeholder="Objetivos generales del SGSST PYMES"></textarea>			              
			    		</div>
			  		</div>
			  		<div class="row">
			            <div class="col-lg-12">
				            <div class="form-group">
			                  <label for="exampleInputFile">Firma del empleador:</label>
			                  <input type="file" id="exampleInputFile">
			                </div>
			            </div>
			        </div>
			        <button class="btn btn-success pull-right" id="btn-guardar-plantrabajo">Guardar</button>
			  	</div>		 
			</div>
		</section>
		
		<section id="actividades">
			<input class="hide" type="text" id="plan_trabajo_id">
			<input class="hide" type="text" id="actividad_id">
			<div class="panel panel-primary">
				<div class="panel-heading"> 
					<h3 class="panel-title">Actividades</h3> 
				</div>
			  	<div class="panel-body">
			    	<div class="row">
			  			<div class="col-lg-4">
			  				<div class="form-group">
				  				<label>Sede</label>
			  					<select class="form-control" id="sede" name="sede" disabled="">
				                    <option value="Barrranquilla">Barrranquilla</option>
				                    <option value="Cali">Cali</option>
				                    <option value="Cartagena">Cartagena</option>
				                    <option value="Bogota">Bogota</option>
				                    <option value="Medellin">Medellin</option>
			                  	</select>
				  			</div>
				  		</div>
			  			<div class="col-lg-4">
			  				<div class="form-group">
				  				<label>Actividad</label>
				  				<div class="input-group"> 
				  					<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-calendar"></i></span> 
				  					<input class="form-control" type="text" id="actividad" name="actividad" aria-describedby="basic-addon1" disabled=""> 
				  				</div>
				  			</div>
				  		</div>
			  			<div class="col-lg-4">
			  				<div class="form-group">
				  				<label>Responsable</label>
				  				<div class="input-group"> 
				  					<span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-calendar"></i></span> 
				  					<input class="form-control" type="text" id="responsable-actividad" name="responsable-actividad" aria-describedby="basic-addon1" disabled=""> 
				  				</div>
				  			</div>
				  		</div>
				  	</div>
				  	<button class="btn btn-success pull-right" id="btn-guardar-actividad" disabled="">Guardar</button>

				  	<button class="btn btn-primary pull-right hide" id="btn-editar-actividad">Guardar</button>
			  	</div>			  	
			</div>
		</section>

		<section id="lista_actividades">
			<div class="panel panel-primary">
				<div class="panel-heading"> 
					<h3 class="panel-title">Lista Actividades</h3> 
				</div>
			  	<div class="panel-body">
			    	<table id="tabla-actividades" class="table table-bordered">
			    		<thead>
			    			<tr>
			    				<th>Sede</th>
			    				<th>Actividad</th>
			    				<th>Responsable</th>
			    				<th>% Avance</th>
			    				<th>Fecha Inicio</th>
			    				<th>Fecha Finalización</th>
			    				<th>Accion</th>
			    			</tr>
			    		</thead>
			    		<tbody>
			    			
			    		</tbody>
			    	</table>
			  	</div>			  
			</div>
		</section>	
	</div>
	<meta name="_token" content="{!! csrf_token() !!}" />
	<script type="text/javascript" src="js/planTrabajo.js"></script>	
</body>
</html>