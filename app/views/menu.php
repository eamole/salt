<?php

Menu::make('menuBar',function($menu) {

	$menu->add("Therapists" , ['route' => 'therapistsDisplayAll' ,'class' => 'navbar' ] );
	$menu->add("Clients" 	, ['route' => 'clientsDisplayAll' ,'class' => 'navbar' ] );
	// $menu->add("Appointments" , ['route' => 'threapistsDisplayAll'] );
	// $menu->add("Login" , ['route' => 'threapistsDisplayAll'] );

});
