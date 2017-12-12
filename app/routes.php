
<?php



Route::get('/', 'HomeController@index');
Route::get('/a', 'HomeController@a');
Route::get('/nyheder', 'HomeController@nyheder');
Route::get('/ovne', 'HomeController@ovne');
Route::get('/ovne/{name}/listItems', 'HomeController@ovnItems');
Route::get('/ovne/{name}/listItems/{id}', 'HomeController@showOvnItem');

Route::get('/tilbehør', 'HomeController@tilbehør');
Route::get('/tilbehør/{name}/listItems', 'HomeController@tilbehørItems');

Route::get('/kontakt', 'HomeController@kontakt');
Route::get('/advSearch', 'HomeController@advSearch');


Route::get('/admin', 'AdminController@login');
Route::group(array('before' => 'csrf'), function(){
	Route::post('/', array('uses' => 'AdminController@postSearch', 'as' =>'postSearch'));
	Route::post('/', array('uses' => 'AdminController@postAdvSearch', 'as' =>'postAdvSearch'));
 	Route::post('/admin', array('uses' => 'AdminController@postLogin', 'as' =>'postLogin'));
 	Route::post('/kontakt', array('uses' => 'HomeController@postKontakt', 'as' =>'postKontakt'));

 	});


Route::group(array('before' => 'auth'), function(){

	Route::get('/admin/logout', 'AdminController@logout');

	Route::get('/admin/editForside', 'AdminController@retForside');

	Route::get('/admin/createNyOvn', 'OvnController@createNyOvn');
	Route::get('/admin/listOvne', 'OvnController@listOvne');
	Route::get('/admin/editOvn/{id}', 'OvnController@editOvn');
	Route::get('/admin/deleteOvn/{id}', 'OvnController@deleteOvn');

	Route::get('/admin/{name}/createNyOvnItem', 'OvnController@createNyOvnItem');
	Route::get('/admin/{name}/list', 'OvnController@listOvnItems');
	Route::get('/admin/{name}/editOvnItem/{id}', 'OvnController@editOvnItem');
	Route::get('/admin/{name}/deleteOvnItem/{id}', 'OvnController@deleteOvnItem');

	Route::get('/admin/createNyTilbehør', 'AccessoryController@createNyTilbehør');
	Route::get('/admin/listTilbehør', 'AccessoryController@listTilbehør');
	Route::get('/admin/editTilbehør/{id}', 'AccessoryController@editTilbehør');
	Route::get('/admin/deleteTilbehør/{id}', 'AccessoryController@deleteTilbehør');

	Route::get('/admin/{name}/createNyTilbehørItem', 'AccessoryController@createNyTilbehørItem');
	Route::get('/admin/{name}/listTilbehørItems', 'AccessoryController@listTilbehørItems');
	Route::get('/admin/{name}/editTilbehørItem/{id}', 'AccessoryController@editTilbehørItem');
	Route::get('/admin/{name}/deleteTilbehørItem/{id}', 'AccessoryController@deleteTilbehørItem');

	Route::get('/admin/createTilbud', 'OvnController@createTilbud');
	Route::get('/admin/listTilbud', 'OvnController@listTilbud');
	Route::get('/admin/editTilbud/{id}', 'OvnController@editTilbud');
	Route::get('/admin/deleteTilbud/{id}', 'OvnController@deleteTilbud');


	Route::get('/admin/createNyhed', 'AdminController@createNyhed');
	Route::get('/admin/listNyheder', 'AdminController@listNyheder');
	Route::get('/admin/editNyhed/{id}', 'AdminController@editNyhed');
	Route::get('/admin/deleteNyhed/{id}', 'AdminController@deleteNyhed');

	Route::get('/admin/listKontakt', 'AdminController@listKontakt');
	Route::get('/admin/editKontakt/{id}', 'AdminController@editKontakt');


	Route::group(array('before' => 'csrf'), function(){
		Route::post('/admin/editForside', array('uses' => 'AdminController@postRetForside', 'as' =>'postRetForside'));

		Route::post('/admin/createNyOvn', array('uses' => 'OvnController@postCreateNyOvn', 'as' =>'postCreateNyOvn'));
		Route::post('/admin/editOvn/{id}', array('uses' => 'OvnController@postEditOvn', 'as' =>'postEditOvn'));

		Route::post('/admin/{name}/createNyOvnItem', array('uses' => 'OvnController@postCreateOvnItem', 'as' =>'postCreateOvnItem'));
		Route::post('/admin/{name}/editOvnItem/{id}', array('uses' => 'OvnController@postEditOvnItem', 'as' =>'postEditOvnItem'));


		Route::post('/admin/createNyTilbehør', array('uses' => 'AccessoryController@postCreateNyTilbehør', 'as' =>'postCreateNyTilbehør'));
		Route::post('/admin/editTilbehør/{id}', array('uses' => 'AccessoryController@postEditTilbehør', 'as' =>'postEditTilbehør'));

		Route::post('/admin/{name}/createNyTilbehørItem', array('uses' => 'AccessoryController@postCreateTilbehørItem', 'as' =>'postCreateTilbehørItem'));
		Route::post('/admin/{name}/editTilbehørItem/{id}', array('uses' => 'AccessoryController@postEditTilbehørItem', 'as' =>'postEditTilbehørItem'));

		
		Route::post('/admin/tilbud', array('uses' => 'OvnController@postCreateTilbud', 'as' =>'postCreateTilbud'));
		Route::post('/admin/editTilbud/{id}', array('uses' => 'OvnController@postEditTilbud', 'as' =>'postEditTilbud'));

		Route::post('/admin/editKontakt/{id}', array('uses' => 'AdminController@postEditKontakt', 'as' =>'postEditKontakt'));

		Route::post('/admin/createNyhed', array('uses' => 'AdminController@postCreateNyhed', 'as' =>'postCreateNyhed'));
		Route::post('/admin/editNyhed/{id}', array('uses' => 'AdminController@postEditNyhed', 'as' =>'postEditNyhed'));
		
		
		

	 });
});

