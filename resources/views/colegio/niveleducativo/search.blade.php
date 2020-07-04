<div class="form-group">

<div class="form-group">
{!! Form::open(array('action'=> array('NivelController@index','tipodebusqueda'=> 'null','busqueda'=>'null',$cat->cod_colegio),'method'=>'POST'))}}
{{ csrf_field() }}
        <label>Buscar Por:</label>
        <select name="tipodebuscar" class="form-control-sidebar-bg-black-active">
        @if($tipodebuscar == "n.cod_nivel")
        <option value= "n.cod_nivel" selected>Código de Nivel</option>
            <option value="n.nombre_nivel">Nombre de Nivel</option>
            <option value="c.cod_colegio">Codigo de colegio</option>
            <option value="c.Nombre_colegio">Nombre de colegio</option>
        @else
        @if($tipodebuscar == "n.nombre_nivel")
            <option value= "n.cod_nivel" >Código de Nivel</option>
            <option value="n.nombre_nivel" selected>Nombre de Nivel</option>
            <option value="c.cod_colegio">Codigo de colegio</option>
            <option value="c.Nombre_colegio">Nombre de colegio</option>
        @else 
        @if($tipodebuscar == "c.cod_colegio")
            <option value= "n.cod_nivel" >Código de Nivel</option>
            <option value="n.nombre_nivel" >Nombre de Nivel</option>
            <option value="c.cod_colegio" selected>Codigo de colegio</option>
            <option value="c.Nombre_colegio">Nombre de colegio</option>
        @else
            <option value= "n.cod_nivel" >Código de Nivel</option>
            <option value="n.nombre_nivel" >Nombre de Nivel</option>
            <option value="c.cod_colegio">Codigo de colegio</option>
            <option value="c.Nombre_colegio"  selected>Nombre de colegio</option>
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
        
            <button type="submit" class="btn btn-primary">Buscar</button>
   
        {{Form::close()}}
    </div>
</div>
