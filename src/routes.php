<?php

Route::group( ['prefix' => 'shipping', 'middleware' => 'auth', 'namespace' => 'Lukesnowden\Ragdoll\Controllers'], function() {

	Route::get( '/', 			['as' => 'ragdoll.dash', 'uses' => 'BaseController@showDashboard' ]);
	Route::get( '/groups', 		['as' => 'ragdoll.groups', 'uses' => 'BaseController@showGroups' ]);
	Route::get( '/zones', 		['as' => 'ragdoll.zones', 'uses' => 'BaseController@showZones' ]);
	Route::get( '/postcodes', 	['as' => 'ragdoll.postcodes', 'uses' => 'BaseController@showPostcodes' ]);

});