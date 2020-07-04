{!! Form::open(array('url'=> 'colegio/instituciones','method'=>'GET','autocomplete'=>'on', 'role'=>'search')) !!}
<div class="form-group">
<div class="form-group">
        <label>Buscar Por:</label>
        <select name="tipodebuscar" class="form-control-sidebar-bg-black-active">
        @if($tipodebuscar == "cod_colegio")
        <option value= "cod_colegio" selected>Código</option>
            <option value="Nombre_colegio">Nombre</option>
           
        @else
        
        <option value= "cod_colegio" >Código</option>
            <option value="Nombre_colegio" selected>Nombre</option>
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