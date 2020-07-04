<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$prod->cod_nivel}}">
    {{Form::Open(array('action'=> array('NivelController@destroy','id' =>$prod->cod_nivel),'method'=>'post'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Eliminar Nivel Educativo</h4>
            </div>
            <div class="modal-body">
                <p>Confirme si desea Eliminar el Nivel Educativo</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Cerrar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
           
            </div>
        </div>
    </div>
    {{Form::close()}}
</div>