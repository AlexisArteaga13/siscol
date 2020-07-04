<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// RUTAS DEL AJAX
Route::get('ajaxcontrato/','ContratoController@getValidaridcontrato');
Route::get('ajaxmatricula/','MatriculaController@getValidaridmatricula');
Route::get('ajaxanestudio/','AnEscolarController@getValidarAnEstudio');
Route::get('ajaxcolegio/','ColegioController@getValidarColegio');
Route::get('ajaxnivel/','NivelController@getValidaridNivel');
Route::get('ajaxidgrado/','GradoController@getValidaridGrado');
Route::get('ajaxidseccion/','SeccionController@getValidaridseccion');
Route::get('ajaxidcurso/','CursoController@getValidaridCurso');
Route::get('ajaxdetallecurso/','DetalleCursoController@obteneranestudio');
Route::get('ajaxgrados/{id}','NivelController@getNivel');
Route::get('ajaxseccion/{id}','SeccionController@getSeccion');
Route::get('ajaxcurso/{id}','CursoController@getCurso');

Route::get('ajaxobtnseccion/{id} ','SeccionController@getSeccionesorigi');
Route::get('ajaxvalidarmatricula/{id}','MatriculaController@getValidarMatricula');
Route::get('ajaxvalidaralumno/{id}','AlumnoController@getValidarAlumno');
Route::get('ajaxvalidarnivel/{id}','NivelController@getValidarNivel');
Route::get('ajaxvalidargrado/{id}','GradoController@getValidarGrado');
Route::get('ajaxvalidarseccion/{id}','SeccionController@getValidarSeccion');
Route::get('ajaxvalidarcurso/{id}','CursoController@getValidarCurso');
//RUTAS DE LOGEO
Route::get('/inicio','InicioController@inicio');
Route :: get('/registrar','InicioController@registrousuario')->name('registrare');
Route :: post('/nuevousuario','InicioController@guardarnuevo')->name('registro');
Route::get('/usuario/inicio','InicioController@index')->name('usuario.index');
Route::get('usuario/a/editar/con/codigo/{usuario}','InicioController@edit')->name('usuario.edit');
Route::patch('usuario/a/editar/{usuario}','InicioController@update')->name('usuario.update');
Route::delete('usuario/destroy/a/eliminar/con/codigo/{id}','InicioController@destroy')->name('usuario.destroy');

//////////
Route::get('/home', 'HomeController@index')->name('home');
Route:: resource('/colegio/instituciones','ColegioController');
//Rutas de Niveles ::::
Route::post('colegio/niveleducativo/{id}/create/nuevo/nivel/de/estudios','NivelController@create') ;
Route:: post('/colegio/niveleducativo/{tipodebusqueda?}/{busqueda?}/{id}','NivelController@index');
Route:: post('colegio/niveleducativo/{niveleducativo}/{cod_col}edit','NivelController@edit') ;

Route :: get ('colegio/niveleducativo/show/{id}','NivelController@show');
Route :: post ('colegio/niveleducativo','NivelController@store')->name('nivel.storage');
Route :: post ('colegio/niveleducativo/eliminar/{niveleducativo}','NivelController@destroy'); 
Route :: patch ('colegio/niveleducativo/update/{niveleducativo}','NivelController@update')->name('niveleducativo.update');
////Rutas De GRADOS:
Route :: post('/distribucionaulas/grados/actualizar/{niveleducativo}/actual','GradoController@update')->name('grados.update');
Route:: post('distribucionaulas/grados/{niveleducativo}/{cod_col}/edit','GradoController@edit');
Route:: post('/distribucionaulas/grados/{codnivel}/{codcolegio}','GradoController@index')-> name('grado.index'); 
Route :: get ('distribucionaulas/grados/ver/{id}/view','GradoController@show');
Route :: post ('distribucionaulas/grados/','GradoController@store')-> name('grado.storage');
Route:: post('/distribucionaulas/grados/crearemos/{codigocolegio}/creaciones/nuevos/grados/{codigonivel}','GradoController@crear') -> name('grado.create');
//Route:: post('/distribucionaulas/grados/crearemos/{codigocolegio}/creaciones/nuevos/grados','GradoController@crear') -> name('grado.create');

Route :: delete ('/distribucionaulas/grados/eliminar/{codigo}','GradoController@destroy'); 
////RUTAS  SECCIONES 
/////
Route :: patch('distribucionaulas/secciones/actualizar/{niveleducativo}/actual','SeccionController@update')->name('secciones.update');
Route :: post('distribucionaulas/secciones/listado/{grado?}/index/{colegio}/{nivel?}','SeccionController@index')->name('secciones.index');
Route:: post('distribucionaulas/secciones/{niveleducativo}/{cod_col}/edit','SeccionController@edit');
Route:: post('/distribucionaulas/secciones/crear/{codigocolegio}/{codnivel?}/{codgrado?}','SeccionController@create') -> name('secciones.create');
Route :: post ('/distribucionaulas/secciones/','SeccionController@store')-> name('secciones.store');
Route :: get ('/distribucionaulas/secciones/ver/{id}/view/{codgrado}/{codnivel}/curso/registrado','SeccionController@show');
Route :: delete ('/distribucionaulas/secciones/eliminar/{codigo}','SeccionController@destroy'); 


////// RUTAS DE CURSOS
Route :: post('distribucionacademica/cursos/{grado?}/index/{colegio}/listado/{nivel?}','CursoController@index')->name('cursos.index');
Route:: post('distribucionacademica/cursos/{niveleducativo}/{cod_col}/edit','CursoController@edit');
Route:: post('distribucionacademica/crear/cursos/crear/{codigocolegio}/{codgrado?}/{codnivel?}','CursoController@create') -> name('cursos.create');
Route :: get ('distribucionacademica/cursos/ver/{id}/view/{codnivel}/grado/{codgrado}','CursoController@show');
Route :: patch('distribucionacademica/cursos/actualizar/{codigo}/actual','CursoController@update')->name('cursos.update');
Route :: post ('distribucionacademica/cursos/','CursoController@store')-> name('cursos.store');
Route :: delete ('distribucionacademica/cursos/eliminar/{codigo}','CursoController@destroy'); 


////// RUTAS DE Detalles del curso
Route :: post('distribucionacademica/detallecursos/{grado?}/{docente}/{colegio}/{codcol}/{namenivel}','DetalleCursoController@index')->name('detallecursos.index');
Route:: post('distribucionacademica/detallecursos/{codigodetalle}/edit/{colegio}/edit','DetalleCursoController@edit');
Route:: post('distribucionacademica/detallecursos/crear/{colegio}/{grado}/{nivel}/{curso}/crear/nuevo/detalle','DetalleCursoController@create') -> name('detallecursos.create');
Route :: get ('distribucionacademica/ver/detallecursos/{id}/view','DetalleCursoController@show');
Route :: patch('distribucionacademica/detallecursos/actualizar/{codigo}/actual','DetalleCursoController@update')->name('detallecursos.update');
Route :: post ('distribucionacademica/detallecursos/','DetalleCursoController@store')-> name('detallecursos.store');
Route :: delete ('distribucionacademica/detallecursos/eliminar/{codigo}','DetalleCursoController@destroy'); 

//////

////// RUTAS DE Matriculasfdfdf
Route:: get('distribucionacademica/matriculas/nueva/matricula/{colegio}','MatriculaController@create') -> name('matriculas.create');
Route :: post('distribucionacademica/matriculas/{colegio}/matricula','MatriculaController@index')->name('matriculas.index');
Route:: post('distribucionacademica/matriculas/{codigomatricula}/edit/{colegio}/edit','MatriculaController@edit');
Route :: get ('distribucionacademica/matriculas/ver/{id}/view','MatriculaController@show');
Route :: patch('distribucionacademica/matriculas/actualizar/{codigo}/actual','MatriculaController@update')->name('matriculas.update');
Route :: post ('distribucionacademica/matriculas/','MatriculaController@store')-> name('matriculas.store');
Route :: delete ('distribucionacademica/matriculas/eliminar/{codigo}/borrar/{colegio}/destroy','MatriculaController@destroy'); 

//////RUTAS NOTAS
Route :: post('modulos/soydocente/vistaprincipal/{dnidocente}','NotaController@vistaprincipaldocente')->name('nota.vistaprincipaldocente');
Route :: post('modulos/soydocente/vistaprincipal/ver/seccionesdelgrado/{dnidocente}/{codcurso}/{nombregrado}','NotaController@versecciones')->name('nota.versecciones');
Route :: get('modulos/soydocente/notas/del/curso/{dnidocente}/{codcurso}/{nombregrado}','NotaController@vernotas')->name('nota.vernotas');
Route :: post('modulos/soydocente/notas/ponernota/del/curso/{id}/{nombrecolegio}/{profesor}/{codcurso}/{seccion}','NotaController@ponernota')->name('nota.ponernota');
Route :: patch('modulos/soydocente/notas/actualizacion/denotas/curso/{id}/{profesor}/{codcurso}/{seccion}','NotaController@update')->name('notas.update');

////////RUTA VER ALUMNOS
Route :: get('distribucion/veralumno/asignado/del/curso/{detalle}/{codcurso?}/{namedocente?}/{codseccion?}','VerAlumnosController@versusalumnos')->name('alumnos.veralumnos');
Route :: post('distribucion/guardarnuevoalumno/asignado/del/curso/{detalle}/{codseccion}','VerAlumnosController@nuevoalumnodecurso')->name('alumnos.nuevoalumno');
Route :: post ('distribucion/guardarnuevoalumno','VerAlumnosController@store')-> name('nuevoalumno.store');
Route :: delete ('distribucion/eliminaralumnodelcurso/{codigo}/{detalle}','VerAlumnosController@destroy'); 
//// RUTA SEGUIMIENTO
Route :: get('modulos/soyapoderado/principal','SeguimientoController@inicio')->name('apoderado.inicio');
Route :: get('soyapoderado/buscar','SeguimientoController@buscar')->name('apoderado.buscar');

//// RUTA DE CONTRATOS
Route::delete ('contratos/eliminar/{contrato}/{colegio}','ContratoController@destroy')->name('contratos.destroy');

Route::get('personaldocente/contratos/inicio/de/{contrato}','ContratoController@index')->name('contrato.index');
Route::post('personaldocente/contratos/create/{colegio}','ContratoController@create')->name('contrato.create');
Route::post('personaldocente/contratos','ContratoController@store')->name('contrato.store');
Route::patch('personaldocente/contratos/actualizar/{contrato}','ContratoController@update')->name('contratos.update');
Route::get('personaldocente/contratos/editar/{contrato}','ContratoController@edit')->name('contratos.edit');

////RUTAS DE AUTENTICACION



Route:: resource('colegio/anescolar','AnEscolarController');
Route:: resource('personaldocente/docentes','DocenteController');
//Route:: resource('personaldocente/contratos','ContratoController');
//Route:: resource('distribucionaulas/secciones','SeccionController');
Route:: resource('distribucionacademica/alumnos','AlumnoController');



Route::middleware(['auth'])->group(function () {
	//Roles
	Route::post('roles/store', 'RoleController@store')->name('roles.store')
		->middleware('permission:roles.create');

	Route::get('roles', 'RoleController@index')->name('roles.index')
		->middleware('permission:roles.index');

	Route::get('roles/create', 'RoleController@create')->name('roles.create')
		->middleware('permission:roles.create');

	Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
		->middleware('permission:roles.edit');

	Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
		->middleware('permission:roles.show');

	Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
		->middleware('permission:roles.destroy');

	Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
		->middleware('permission:roles.edit');
	//Users
	Route::get('users', 'UserController@index')->name('users.index')
		->middleware('permission:users.index');

	Route::put('users/{user}', 'UserController@update')->name('users.update')
		->middleware('permission:users.edit');

	Route::get('users/{user}', 'UserController@show')->name('users.show')
		->middleware('permission:users.show');

	Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
		->middleware('permission:users.destroy');

	Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
		->middleware('permission:users.edit');


		
	//Productos
	Route::post('productos/store', 'ProductosController@store')->name('productos.store')
		->middleware('permission:productos.create');

	Route::get('productos', 'ProductosController@index')->name('productos.index')
		->middleware('permission:productos.index');

	Route::get('productos/create', 'ProductosController@create')->name('productos.create')
		->middleware('permission:productos.create');

	Route::put('productos/{productos}', 'ProductosController@update')->name('productos.update')
		->middleware('permission:productos.edit');

	Route::get('productos/{productos}', 'ProductosController@show')->name('productos.show')
		->middleware('permission:productos.show');

	Route::delete('productos/{productos}', 'ProductosController@destroy')->name('productos.destroy')
		->middleware('permission:productos.destroy');

	Route::get('productos/{productos}/edit', 'ProductosController@edit')->name('productos.edit')
		->middleware('permission:productos.edit');


	//CATEGORIAS
	Route::post('categorias/store', 'CategoriasController@store')->name('categorias.store')
		->middleware('permission:categorias.create');

	Route::get('categorias', 'CategoriasController@index')->name('categorias.index')
		->middleware('permission:categorias.index');

	Route::get('categorias/create', 'CategoriasController@create')->name('categorias.create')
		->middleware('permission:categorias.create');

	Route::put('categorias/{id}', 'CategoriasController@update')->name('categorias.update')
		->middleware('permission:categorias.edit');

	Route::get('categorias/{id}', 'CategoriasController@show')->name('categorias.show')
		->middleware('permission:categorias.show');

	Route::delete('categorias/{id}', 'CategoriasController@destroy')->name('categorias.destroy')
		->middleware('permission:categorias.destroy');

	Route::get('categorias/{id}/edit', 'CategoriasController@edit')->name('categorias.edit')
		->middleware('permission:categorias.edit');


		//MARCAS
	Route::post('marcas/store', 'MarcasController@store')->name('marcas.store')
		->middleware('permission:marcas.create');

	Route::get('marcas', 'MarcasController@index')->name('marcas.index')
		->middleware('permission:marcas.index');

	Route::get('marcas/create', 'MarcasController@create')->name('marcas.create')
		->middleware('permission:marcas.create');

	Route::put('marcas/{id}', 'MarcasController@update')->name('marcas.update')
		->middleware('permission:marcas.edit');

	Route::get('marcas/{id}', 'MarcasController@show')->name('marcas.show')
		->middleware('permission:marcas.show');

	Route::delete('marcas/{id}', 'MarcasController@destroy')->name('marcas.destroy')
		->middleware('permission:marcas.destroy');

	Route::get('marcas/{id}/edit', 'MarcasController@edit')->name('marcas.edit')
		->middleware('permission:marcas.edit');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
