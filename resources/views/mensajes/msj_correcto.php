  
       
       <html>
<head>
   <meta charset="utf-8">
   <title>SISTEMA DE INFORMACIÓN DE ESTUDIANTES  INDIGENAS DE EDUCACIÓN SUPERIOR |SIEMES</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
   <script>
      $(document).ready(function()
      {
         $("#mostrarmodal").modal("show");
      });
    </script>

    

</head>
<body>
   <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true"  data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
                    
               <form id=""  class="form_cunsulta" name="form" action="/vivienda" method="POST" role="Censo_General" class="pocicion_formulario">
				     	      {{ csrf_field() }}
      						
								<input  id="busqueda" name="texto" class="form-control"  placeholder="Digíte el número sin puntos ni comas" title="El nùmero de cèdula debe ser de 2 a 10 dígitos"  style="width: 160px"  style=""> 
								<input type="submit" id="boton" name="enviar" value="Ver información " class="boton tab-linker btn-block" style="width: 160px">
							  
						</form>
              <h3>  <img src="icon/save.png" width="50"      ></h3>
           </div> 
           <div class="modal-body">
              <h4><label style='color:#177F6B'>
              <?php  echo $msj; ?>  </h4>
              <div class="row">
          <div class="col-md-6">
          <div class="alert alert-success" role="alert">
          @foreach($details as $persona)
                        <p><strong>N° Documento::</strong>{{$persona-> id }} </p>
                        <p><strong>Tipo ID::</strong> </p>
                        <p><strong>Nombres::</strong> </p>
                        <p><strong>Apellidos::</strong>  </p>
                        <p><strong>Genero::</strong> </p>
                        <p><strong>Estado Civil::</strong>  </p>
                        <p><strong>Fecha Nacimiento::</strong> </p>
                        <p><strong>Edad Actual::</strong>  </p>
                        @endforeach
                        </div> 
          </div> 


         </div><!--FIN  col-md-6-->
                  
       </div>


           <div class="modal-footer">
           	<!--
          <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      -->  <button type="button" >
                              <a href="hogar_persona">Seguiente</a>
                         </button>
            
           </div>
      </div>
   </div>
</div>

   
</body>
</html>