<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$gra->idnota}}">
    {{Form::Open(array('action'=> array('VerAlumnosController@destroy',$gra->idnota,$gra->id_detalle),'method'=>'delete'))}}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Eliminar Al Alumno Del Curso</h4>
            </div>
            <div class="modal-body">
                <p>Confirme si desea Eliminar Al Alumno Del Curso</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"> Cerrar</button>
                <button type="submit" class="btn btn-primary">Confirmar</button>
           
            </div>
        </div>
    </div>
    {{Form::close()}}
</div>