<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SISCOL</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Styles -->

</head>

<body style="background: #BECFE6">

    <div clas="container-fluid">
        <br><br>
        <div class="row">
        <div class="col-1"></div>
        <div class="card border-primary mb-3  my-2 col-10">
            <div class="card-header">Notas</div>

            <div class="card-body text-primary">
                <h5 class="card-title">Listado de notas</h5>
                <div class="">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>Código Alumno</th>
                                <th>Apellidos </th>
                                <th>Nombres</th>
                                <th>Curso</th>
                                <th>Año Escolar</th>
                                <th>Sección</th>
                                <th>Nota 1er Bim.</th>
                                <th>Nota 2do Bim.</th>
                                <th>Nota 3er Bim.</th>
                                <th>Nota 4er Bim.</th>
                                <th>Prom. Final</th>


                            </thead>
                            <tbody>
                            @foreach ($alumno as $gra)
                            <tr>
                                <td>{{ $gra -> CodAlumno}}</td>
                                <td>{{ $gra -> ApellidoAlumno}}</td>
                                <td>{{ $gra -> NombreAlumno}}</td>
                                <td>{{ $gra -> NombreCurso}}</td>
                                <td>{{ $gra -> cod_AñoEscolar}}</td>
                                <td>{{ $gra -> cod_sección}}</td>
                                <td>{{ $gra -> NotaPrimBim}}</td>
                                <td>{{ $gra -> NotaSegunBim}}</td>
                                <td>{{ $gra -> NotaTercerBim}}</td>
                                <td>{{ $gra -> NotaCuartoBim}}</td>
                                <td>{{ $gra -> NotaFinal}}</td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</body>

</html>