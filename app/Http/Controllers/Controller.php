<?php

/*
  You can create a controller via termianl using:
    php artisian make:controller FooController
  (be sure to use convention)

  To make a controller with CRUD functions, use:
    php artisan make:controller FooController --resource
*/
//NAMESPACE IS USED TO SCOPE FILE
namespace App\Http\Controllers;

//IMPORTING CLASSES INTO CURRENT CLASS
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
