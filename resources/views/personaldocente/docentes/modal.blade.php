<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$cat -> DNIDocente}}">
    {{Form::Open(array('action'=> array('DocenteController@destroy',$cat -> DNIDocente),'method'=>'delete'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Eliminar Docente</h4>
            </div>
            <div class="modal-body">
                <p>Confirme si desea Eliminar el Docente</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Cerrar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
           
            </div>
        </div>
    </div>
    {{Form::close()}}
</div>