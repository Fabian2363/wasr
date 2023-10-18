@extends('layouts.menu')

@section('content')


      
    
                                     
                   {{ Form::open(['route' => 'educacion_salud_propia.store']) }}

                        @include('educacion_salud_propia.partials.form')
                        
                        {{ Form::close() }}
             
               
@endsection