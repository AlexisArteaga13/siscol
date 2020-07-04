{!! Form::open(array('url'=> 'distribucionacademica/alumnos','method'=>'GET','autocomplete'=>'on', 'role'=>'search')) !!}
<div class="form-group">
<div class="form-group">
        <label>Buscar Por:</label>
        <select name="tipodebuscar" class="form-control-sidebar-bg-black-active">
        @if($tipodebuscar == "CodAlumno")
            <option value= "CodAlumno" selected>D.N.I.</option>
            <option value="NombreAlumno">Nombre</option>
           
        @else
            <option value= "CodAlumno" >D.N.I.</option>
            <option value="NombreAlumno" selected>Nombre</option>
        @endif
        

        </select>
        <!--@php
        echo $tipodebuscar;
        @endphp !-->
    </div>
    <div class="input-group">
        <input type="text" class="form-control" name="searchText" placeholder="Buscar ..." value="{{$searchText}}">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </span>
    </div>
</div>
{{Form::close()}}