{!! Form::open(['route' => 'clientes.store', 'id'=>'form']) !!}
<div class="row align-items-stretch mb-5">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('nombres', 'Nombre') !!}
            {!! Form::text('nombres', null, ['class' => 'form-control', 'placeholder' => 'Nombres']) !!}
            <small id="error-nombre" class="text-danger"></small>
        </div>
        <div class="form-group">
            {!! Form::label('apellidos', 'Apellidos') !!}
            {!! Form::text('apellidos', null, ['class' => 'form-control', 'placeholder' => 'Apellidos']) !!}
            <small id="error-apellidos" class="text-danger"></small>
        </div>
        <div class="form-group mb-md-0">
            {!! Form::label('cedula', 'Cedula') !!}
            {!! Form::text('cedula', null, ['class' => 'form-control', 'placeholder' => 'Cedula']) !!}
            <small id="error-cedula" class="text-danger"></small>
        </div>
        <div class="form-group mb-md-0">
            {!! Form::label('departamento', 'Departamento') !!}
            {!! Form::select('departamento_id', $departamentos , null, ['class' => 'form-control', 'id'=>'departamento_id']) !!}
            <small id="error-departamento" class="text-danger"></small>
        </div>
        <div class="form-group mb-md-0">
            {!! Form::label('ciudad', 'ciudad') !!}
            {!! Form::select('ciudad_id', [] , null, ['class' => 'form-control', 'id'=>'ciudad_id']) !!}
            <small id="error-ciudad" class="text-danger"></small>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('celular', 'Celular') !!}
            {!! Form::text('celular', null, ['class' => 'form-control', 'placeholder' => 'celular']) !!}
            <small id="error-celular" class="text-danger"></small>
        </div>
        <div class="form-group">
            {!! Form::label('correo', 'Correo') !!}
            {!! Form::text('correo', null, ['class' => 'form-control', 'placeholder' => 'email@email.com']) !!}
            <small id="error-correo" class="text-danger"></small>
        </div>
        <div class="form-group mb-md-0">
            {!! Form::checkbox('terminos', 1, false) !!} <span>Autorizo el tratamiento de mis datos de acuerdo con la
                finalidad establecida en la política de protección de datos personales. <a href="#">Haga clic
                aquí</a></span>
                <br />
                <small id="error-terminos" class="text-danger"></small>
        </div>
    </div>
</div>
<div class="text-center">
    <div class="form-group">
        {!! Form::submit('Registrarme', ['class' => 'btn btn-primary']) !!}
     </div>
</div>
{!! Form::close() !!}