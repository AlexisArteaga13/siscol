<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$cat->cod_matricula}}">
    {{Form::Open(array('action'=> array('MatriculaController@destroy',$cat->cod_matricula,$cat ->cod_colegio),'method'=>'delete'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Eliminar Matrícula</h4>
            </div>
            <div class="modal-body">
                <p>Confirme si desea Eliminar La Matrícula</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Cerrar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
           
            </div>
        </div>
    </div>
    {{Form::close()}}
</div>