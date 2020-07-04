{!! Form::open(array('url'=> 'personaldocente/docentes','method'=>'GET','autocomplete'=>'on', 'role'=>'search')) !!}
<div class="form-group">
<div class="form-group">
        <label>Buscar Por:</label>
        <select name="tipodebuscar" class="form-control-sidebar-bg-black-active">
        @if($tipodebuscar == "DNIDocente")
            <option value= "DNIDocente" selected>D.N.I.</option>
            <option value="NombreDocente">Nombre</option>
           
        @else
            <option value= "DNIDocente" >D.N.I.</option>
            <option value="NombreDocente" selected>Nombre</option>
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