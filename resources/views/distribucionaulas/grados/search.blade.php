{!! Form::open(array('url'=> 'distribucionaulas/grados','method'=>'GET','autocomplete'=>'on', 'role'=>'search')) !!}
<div class="form-group">
<div class="form-group">
        <label>Buscar Por:</label>
        <select name="tipodebuscar" class="form-control-sidebar-bg-black-active">
        @if($tipodebuscar == "g.cod_grado")
            <option value= "g.cod_grado" selected>Código de Grado</option>
            <option value="g.nombre_grado">Nombre de Grado</option>
            <option value="g.cod_nivel">Codigo de nivel</option>
            <option value="n.nombre_nivel">Nombre de nivel</option>
            <option value="c.cod_colegio">Codigo de Colegio</option>
            <option value="c.Nombre_colegio">Nombre de Colegio</option>
        @else
        @if($tipodebuscar == "g.nombre_grado")
            <option value= "g.cod_grado" >Código de Grado</option>
            <option value="g.nombre_grado" selected>Nombre de Grado</option>
            <option value="g.cod_nivel">Codigo de nivel</option>
            <option value="n.nombre_nivel">Nombre de nivel</option>
            <option value="c.cod_colegio">Codigo de Colegio</option>
            <option value="c.Nombre_colegio">Nombre de Colegio</option>
        @else 
        @if($tipodebuscar == "g.cod_nivel")
        <option value= "g.cod_grado" >Código de Grado</option>
            <option value="g.nombre_grado" >Nombre de Grado</option>
            <option value="g.cod_nivel" selected>Codigo de nivel</option>
            <option value="n.nombre_nivel">Nombre de nivel</option>
            <option value="c.cod_colegio">Codigo de Colegio</option>
            <option value="c.Nombre_colegio">Nombre de Colegio</option>
        @else
        @if($tipodebuscar == "n.nombre_nivel")
        <option value= "g.cod_grado" >Código de Grado</option>
            <option value="g.nombre_grado" >Nombre de Grado</option>
            <option value="g.cod_nivel">Codigo de nivel</option>
            <option value="n.nombre_nivel" selected>Nombre de nivel</option>
            <option value="c.cod_colegio">Codigo de Colegio</option>
            <option value="c.Nombre_colegio">Nombre de Colegio</option>
        @else
        @if($tipodebuscar == "c.cod_colegio")
        <option value= "g.cod_grado" >Código de Grado</option>
            <option value="g.nombre_grado" >Nombre de Grado</option>
            <option value="g.cod_nivel">Codigo de nivel</option>
            <option value="n.nombre_nivel">Nombre de nivel</option>
            <option value="c.cod_colegio" selected>Codigo de Colegio</option>
            <option value="c.Nombre_colegio">Nombre de Colegio</option>
        @else
        <option value= "g.cod_grado" >Código de Grado</option>
            <option value="g.nombre_grado" >Nombre de Grado</option>
            <option value="g.cod_nivel">Codigo de nivel</option>
            <option value="n.nombre_nivel">Nombre de nivel</option>
            <option value="c.cod_colegio" >Codigo de Colegio</option>
            <option value="c.Nombre_colegio" selected>Nombre de Colegio</option>
        @endif
        @endif
        @endif
        @endif
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