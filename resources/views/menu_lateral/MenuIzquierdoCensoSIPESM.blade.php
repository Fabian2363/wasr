<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/css/bootstrap-theme.css" rel="Stylesheet" type="text/css">
    <link href="/css/bootstrap_oferente.css" rel="Stylesheet" type="text/css">
</head>

<body>
    <form name="form1" method="post"  id="form1">
             <br>
        <div class="datos_user col-md-3 col-sm-12 col-xs-12">
      
                <p style="font-family: Arial;font-size:1.35em;color:#606060;font-weight:bold;margin-top:10px;"><strong>
                @lang('Proceso - WASR')
                </strong></p>
                
                <div class="pull-right">
                    @if (ceil($porcentaje) >= 100)
                        100%
                    @else
                        {{ceil($porcentaje)}}%    
                    @endif
                    
                </div>
                <div class="clearfix"></div>

                <div class=" progress">
                    <div id="PorcentajeHV" class="progress-bar progress-bar-success" style="width:{{ $porcentaje }}%;"></div>
                </div>

                <div class="clearfix"></div>
            
             <div class="clearfix"></div>
        </div>
        </div>
    </form>

</body>

</html>
