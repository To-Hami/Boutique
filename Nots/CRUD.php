<?php


/************************************* store ****************************************************************/

$request_data = $request->except(['password']);

$request_data['password'] = bcrypt($request->password);

$user = User::create($request->data);




