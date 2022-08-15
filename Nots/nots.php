<?php


/************************************* Auth ui ********************************************************************/

/********  composer require laravel/ui
/********  php artisan ui bootstrap --auth  ****/

/**************************************  request link ***************************************************
 ****** if in route 
 *  {{request()->routeIs('detail')?' bg-light':null}}****
 * 
 * *****get id from route link
*     $grade_id = request()->route()->parameters['grade_id'];


/**********************   verify by email   **************************************************/

/*******  Auth::routes(['verify'=>true]);
/******* User extends Authenticatable implements MustVerifyEmail
 * 
 





