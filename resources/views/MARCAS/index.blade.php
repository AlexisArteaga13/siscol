@extends('layouts.app')

@section('content')


<div >
            <div class="panel-heading">
                    Marcas
                    @can('marcas.create')
                    <a href="{{ route('marcas.create') }}" 
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
            </th>

        </tr>
    </thead>
    <tbody>
    <?php foreach($marcas as $r): ?>
        <tr>
            <td><?php echo $r->Nombre; ?></td>
            @can('marcas.edit')
                <td width="10px">
                <a href="{{ route('marcas.edit', $r->id) }}" 
                                    class="btn btn-sm btn-default">
                                        editar
                 </a>
                </td>
            @endcan
            @can('marcas.destroy')
                    <td width="10px">
                        {!! Form::open(['route' => ['marcas.destroy', $r->id], 
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
