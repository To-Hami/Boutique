<?php


/************************************* validation in the controller ****************************************************************/

public function store (Request $request){

$request->validate([

    'name' => 'required',
    'password' => 'required|confirmed'
]);

/*******it will take message from file translate ar/validation  */


}

/*******************************************        **********************************************************/







