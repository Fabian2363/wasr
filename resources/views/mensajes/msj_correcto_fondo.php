   
       <html>
<head>
   <meta charset="utf-8">
   <title>SISTEMA DE INFORMACIÓN DE ESTUDIANTES   MISAK DE EDUCACIÓN SUPERIOR |SIEMES</title>
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
          
              <h3>  <img src="icon/save.png" width="200"      ></h3>
           </div> 
           <div class="modal-body">
              <h4><label style='color:#177F6B'>
              <?php  echo $msj; ?>  </h4>

                  
       </div>


           <div class="modal-footer">
           	<!--
          <a href="#" data-dismiss="modal" class="btn btn-danger">Cerrar</a>
      -->  <button type="button" >
                              <a href="Informacion_General">Terminar con el proceso</a>
                         </button>
            
           </div>
      </div>
   </div>
</div>

   
</body>
</html>