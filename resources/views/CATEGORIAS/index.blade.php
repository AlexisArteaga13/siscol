@extends('layouts.app')

@section('content')


<div >

<div class="panel-heading">
                    CATEGORIAS
                    @can('categorias.create')
                    <a href="{{ route('categorias.create') }}" 
                    class="btn btn-sm btn-primary pull-right">
                        Crear
                    </a>
                    @endcan
                </div>

<table class="table  table-striped  table-hover" id="tabla">
    <thead>
        <tr>
            <th style="width:120px; background-color: #5DACCD; color:#fff">Nombre</th>
            <th style="width:120px; background-color: #5DACCD; color:#fff"></th>
            <th style="width:120px; background-color: #5DACCD; color:#fff">
            

        </tr>
    </thead>
    <tbody>
    <?php foreach($categorias as $r): ?>
        <tr>
            <td><?php echo $r->Nombre; ?></td>
            @can('categorias.edit')
                <td width="10px">
                <a href="{{ route('categorias.edit', $r->id) }}" 
                                    class="btn btn-sm btn-default">
                                        editar
                 </a>
                </td>
            @endcan
            @can('categorias.destroy')
                    <td width="10px">
                        {!! Form::open(['route' => ['categorias.destroy', $r->id], 
                                    'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">
                                            Eliminar
                                        </button>
                         {!! Form::close() !!}
                    </td>
            @endcan
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
</div>
@endsection
