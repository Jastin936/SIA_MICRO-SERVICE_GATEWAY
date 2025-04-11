<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use DB;
use App\Services\User1Service;
use App\Services\User2Service;

class User1Controller extends Controller {
    use ApiResponser;

    /**
     * The service to consume the User1 Microservice
     * @var User1Service
     */
    public $user1Service;

    /**
     * The service to consume the User2 Microservice
     * @var User2Service
     */
    public $user2Service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(User1Service $user1Service, User2Service $user2Service){
        $this->user1Service = $user1Service;
        $this->user2Service = $user2Service;
    }

    /**
    * Return the list of users
    * @return Illuminate\Http\Response
    */
    public function index()
    {
        return $this->successResponse($this->user1Service->obtainUsers1());
    }

    /**
    * Return the list of users
    * @return Illuminate\Http\Response
    */
    public function addUser(Request $request ){

        if ($request->jobid <= 3)
        {
            $this->user1Service->obtainUserJob($request->jobid);
        }
        else
        {
            $this->user2Service->obtainUserJob($request->jobid);
        }

        return $this->successResponse($this->user1Service->createUser1($request->all(), Response::HTTP_CREATED));
    }

    public function getError(Request $request){
        return $request->code;
    }

    /**
    * Obtains and show one user
    * @return Illuminate\Http\Response
    */
    public function show($id)
    {
        return $this->successResponse($this->user1Service->obtainUser1($id));
    }


    /**
    * Update an existing author
    * @return Illuminate\Http\Response
    */
    public function update(Request $request,$id)
    {
        return $this->successResponse($this->user1Service->editUser1($request->all(),$id));
    }

    /**
    * Remove an existing user
    * @return Illuminate\Http\Response
    */
    public function delete($id)
    {
        return $this->successResponse($this->user1Service->deleteUser1($id));
    }
}