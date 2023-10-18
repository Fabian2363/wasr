@extends('layouts.menu')

@section('content')

<head>
    <meta charset="utf-8">

    <style>
      

        table{
            margin: 0 auto;
            width: 850px;
            margin-bottom: 20px;
        }

        table, th, td{
            border: solid 0.1px rgba(0, 0, 0, 0.12156862745098039);;
            text-align: center;
            text-transform: uppercase;
        }

        td{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }

        th{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 15px;
        }

        .header{
            background-color: rgb(50, 123, 178);
            color: white;
        }

        .sub-header{
            background-color: rgb(36, 63, 120);
            color: white;
        }

        .field{
            background-color: rgb(221, 221, 221);
        }

        .buttonRedirect{
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

</head>
  <BR>
  <BR>
 
<body>
    
    {{-- Tabla de info de la vivienda --}}
    <table id="vivienda" cellspacing="0" cellpadding="0">
      <!--  <thead>
            <tr>
                <td colspan="3">
                    <img src="{{ asset('images/logo_v1-1.jpg') }}"
                        width="290px"></td>
                <td colspan="2" valing="middle" class="contenido">Fecha Censo:</td>
                <td colspan="2" valing="middle">--</td>

            </tr>
            <tr class="header">
                <th colspan="6">Certificado del censo poblacional</th>
            </tr>
          
        </thead>-->
        <tbody>
           
        </tbody>
    </table>

    <table id="mimbros_familia" cellspacing="0" cellpadding="0">
        <thead>
            <tr class="sub-header">
                <th colspan="6">Informacion de los mimbros de la familia</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th class="field">N° Documento</th>
                <th class="field">Tipo Documento</th>
                <th class="field" colspan="2">Nombre completo</th>
                <th class="field">Parentesco</th>
                <th class="field">Estado civil</th>
                <th class="field">Edad</th>
            </tr>
            @foreach ($datos as $persona)
                <tr>
                    <td>{{ $persona->docomento_persona }}</td>
                    <td>{{ $persona->tipo_identificacion }}</td>
                    <td colspan="2">{{ "$persona->nombres $persona->apellidos"}}</td>
                    <td>{{ $persona->parentesco }}</td>
                    <td>{{ $persona->estado_civil }}</td>
                    <td>{{ $persona->fecha_nacimiento }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="buttonRedirect">
        <a href="/Informacion-hogar">Volver a consulta Hogar</a>
    </div>

    <script>
        (function (global) { 

            if(typeof (global) === "undefined") {
                throw new Error("window is undefined");
            }

            var _hash = "!";
            var noBackPlease = function () {
                global.location.href += "#";

                // making sure we have the fruit available for juice (^__^)
                global.setTimeout(function () {
                    global.location.href += "!";
                }, 50);
            };

            global.onhashchange = function () {
                if (global.location.hash !== _hash) {
                    global.location.hash = _hash;
                }
            };

            global.onload = function () {            
                noBackPlease();

                // disables backspace on page except on input fields and textarea..
                document.body.onkeydown = function (e) {
                    var Elm = e.target.nodeName.toLowerCase();
                    if (e.which === 8 && (Elm !== 'input' && Elm  !== 'textarea')) {
                        e.preventDefault();
                    }
                    // stopping event bubbling up the DOM tree..
                    e.stopPropagation();
                };          
            }

        })(window);
    </script>
   <br><br><br><br>
@endsection