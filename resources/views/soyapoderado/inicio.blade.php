<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SISCOL</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Styles -->

</head>

<body style="background: #BECFE6">

    <div class="container-fluid">
        <br><br><br>
    <div class="row">
    <div class="col-3"></div>
    <div class="card col-6 bg-secondary border-primary mb-3">
        <div class="card-header ">
            <h2 class="text-white">BIENVENIDO, PUEDE CONSULTAR LAS NOTAS DE ACUERDO A LOS CAMPOS REQUERIDOS<h2>
        </div>
        <div class="card-body">
        {!!Form :: open(array('url' => 'soyapoderado/buscar','method'=>'GET','autocomplete'=>'off'))!!}
        {{Form :: token()}}
        <div class="container"></div>
        <div class="col align-text-center">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Ingrese Código de Matrícula:</label>
                    <input type="text" name="cod_matricula" required class="form-control" placeholder="Código ...">

                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Ingrese DNI de Alumno:</label>
                    <input type="text" name="cod_alumno" required class="form-control" placeholder="Código ...">

                </div>
                <!-- (**En caso de NO recordar sus código, solicitelo**) !-->
            </div>

        </div>

        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 align-self-center text-center">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                    <button class="btn btn-danger" type="reset">Cancelar</button> </div>

            </div>

        </div>
        {!! Form::close()!!}
        </div>
    </div>
    </div>
    </div>
    
</body>

</html>