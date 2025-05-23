<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use DB;
use App\Services\User2Service;

class User2Controller extends Controller {
    use ApiResponser;

    /**
    * The service to consume the User1 Microservice
    * @var User2Service
    */
    public $user2Service;

    /**
    * Create a new controller instance
    * @return void
    */
    public function __construct(User2Service $user2Service){
        $this->user2Service = $user2Service;
    }

    /**
    * Return the list of users
    * @return Illuminate\Http\Response
    */
    public function index()
    {
        return $this->successResponse($this->user2Service->obtainUsers2());
    }

    /**
    * Return the list of users
    * @return Illuminate\Http\Response
    */
    public function addUser(Request $request ){
        return $this->successResponse($this->user2Service->createUser2($request->all(), Response::HTTP_CREATED));
    }

    /**
    * Obtains and show one user
    * @return Illuminate\Http\Response
    */
    public function show($id)
    {
        return $this->successResponse($this->user2Service->obtainUser2($id));
    }


    /**
    * Update an existing author
    * @return Illuminate\Http\Response
    */
    public function update(Request $request,$id)
    {
        return $this->successResponse($this->user2Service->editUser2($request->all(),$id));
    }

    /**
    * Remove an existing user
    * @return Illuminate\Http\Response
    */
    public function delete($id)
    {
        return $this->successResponse($this->user2Service->deleteUser2($id));
    }
}