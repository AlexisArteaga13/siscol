{!! Form::open(array('url'=> 'personaldocente/contratos/inicio/de/','method'=>'GET','autocomplete'=>'on', 'role'=>'search')) !!}
<div class="form-group">
<div class="form-group">
        <label>Buscar Por:</label>
        <select name="tipodebuscar" class="form-control-sidebar-bg-black-active">
        @if($tipodebuscar == "d.CodContrato")
            <option value= "d.CodContrato" selected>Código</option>
            <option value= "p.DNIDocente" >D.N.I. Docente</option>
            <option value="p.NombreDocente">Nombre Docente</option>
           
        @else
        @if($tipodebuscar == "p.DNIDocente")
            <option value= "d.CodContrato" >Código</option>
            <option value= "p.DNIDocente" selected>D.N.I. Docente</option>
            <option value="p.NombreDocente">Nombre Docente</option>
           
        @else
        <option value= "d.CodContrato" >Código</option>
            <option value= "p.DNIDocente" >D.N.I. Docente</option>
            <option value="p.NombreDocente" selected>Nombre Docente</option>
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