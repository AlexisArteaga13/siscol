
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Nivel al que pertenece</label>
                    <select id="cod_nivel" name="cod_nivel" class="form-control dynamic" data-dependent="colegio">
                        <option>--Selecciona--</option>
                        @foreach ($nivel as $cat)
                        <option value="{{$cat -> cod_nivel}}">{{$cat -> nombre_nivel}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @include ('distribucionacademica.matriculas.comprobargrado')