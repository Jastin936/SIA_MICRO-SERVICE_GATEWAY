<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\User1Service;

class UserController extends Controller {
    use ApiResponser;

    private $request;

    public function __construct(Request $request){
        $this->request = $request;
    }

    /**
    * Return the list of users
    * @return Illuminate\Http\Response
    */
    public function index()
    {
      
    }


    public function addUser(Request $request ){
       
    }

    /**
    * Obtains and show one user
    * @return Illuminate\Http\Response
    */
    public function show($id)
    {
       
    }

    /**
    * Update an existing author
    * @return Illuminate\Http\Response
    */
    public function update(Request $request,$id)
    {
        
    }

    /**
    * Remove an existing user
    * @return Illuminate\Http\Response
    */
    public function delete($id)
    {
    
    }
}