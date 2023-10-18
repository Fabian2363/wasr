<style>
    table{
        text-align: center;
    }
    table>head>tr:first-child{
        font-size: 50px;
    }
</style>
<table>
    <thead>
        <tr >
            <td colspan="4" rowspan="3">
                <img src="{{ public_path('images/logo_v1.jpg') }}" alt="logo" width="300px">
            </td>
            <td colspan="13" rowspan="3">FORMATO LISTADO CENSAL ANEXO </td>
            <td colspan="2">Código:</td>
        </tr>
        <tr>
            <td colspan="2">Versión:</td>
        </tr>
        <tr>
            <td colspan="2">Vigente Desde: </td>
        </tr>
        <tr>
            <th>#</th>
            <th>VIGENCIA </th>
            <th>RESGUARDO INDIGENA</th>
            <th>COMUNIDAD INDIGENA</th>
            <th>FAMILIA</th>
            <th>TIPO IDENTIFICACION</th>
            <th>NUMERO DOCUMENTO</th>
            <th>NOMBRES</th>
            <th>APELLIDOS</th>
            <th>FECHA NACIMIENTO</th>
            <th>PARENTESCO</th>
            <th>SEXO</th>
            <th>ESTADO CIVIL</th>
            <th>PROFESION</th>
            <th>ESCOLARIDAD</th>
            <th>INTEGRANTES</th>
            <th>DIRECCION</th>
            <th>TELEFONO</th>
            <th>USUARIO</th>
        </tr>
    </thead>
    <tbody>

        @foreach($personas as $key=> $persona)
            <tr>

                <td> {{ $key+1 }}</td>
                <td>{{ $persona->vigencia }}</td>
                <td>{{ $persona->resguardo }}</td>
                <td>{{ $persona->comunidad_indigena }}</td>
                <td>{{ $persona->familia }}</td>
                <td>{{ $persona->tipo_identificacion }}</td>
                <td>{{ $persona->docomento_persona }}</td>
                <td>{{ $persona->nombres }}</td>
                <td>{{ $persona->apellidos }}</td>
                <td>{{ Carbon\Carbon::parse($persona->fecha_nacimiento)->format('m/d/Y') }}</td>
                <td>{{ $persona->parentesco }}</td>
                <td>{{ $persona->sexo }}</td>
                <td>{{ $persona->estado_civil }}</td>
                <td>{{ $persona->profesion }}</td>
                <td>{{ $persona->escolaridad }}</td>
                <td>{{ $persona->integrantes }}</td>
                <td>{{ $persona->vereda }}-Sector-{{ $persona->sector }}
                </td>
                <td>{{ $persona->telefono }}</td>
                <td>CABILDO DE GUAMBIA</td>
            </tr>
        @endforeach
    </tbody>
</table>