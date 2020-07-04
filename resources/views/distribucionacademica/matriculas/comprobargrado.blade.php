<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Grado al que pertenece</label>
                    <select id="cod_grado" name="cod_grado" class="form-control dynamic" data-dependent="colegio">
                        <option>--Selecciona--</option>
                        @foreach ($grado as $cat)
                        <option value="{{$cat -> cod_grado}}">{{$cat -> nombre_grado}}</option>
                        @endforeach
                    </select>
                </div>
            </div>