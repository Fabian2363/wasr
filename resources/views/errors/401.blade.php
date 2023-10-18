
@extends('errors::layout')

<style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

           

            .logo{
                margin-block-start: 140px;
                 margin-inline-start: 380px;
            }
          
            .boton_personalizado{
            text-decoration: none;
              padding: 10px;
             font-weight: 600;
             font-size: 20px;
            color: #ffffff;
            background-color: #1883ba;
            border-radius: 6px;
            border: 2px solid #0016b0;
            margin-inline-start: 599px;
  }
        </style>
                
                

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="logo"> 
                     <img  tyle="width:40px" src="{{ asset('images/401.jpg') }}" alt="">
                </div>
                <br>
                <br>

                <a class="boton_personalizado" href="{{ url('home') }}">Aceptar</a>
  
</body>
</html>


