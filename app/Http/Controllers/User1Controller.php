<?php 
    namespace App\Http\Controllers;
    
    use Illuminate\Http\Response;
    use App\Traits\ApiResponser; //standardized code for api response
    use Illuminate\Http\Request;  //handling http request in lumen 
    use DB;
    use App\Services\User1Service;
    
    Class User1Controller extends Controller {     
        use ApiResponser;
     
        public $user1Service;

        public $user2Service;

        public function __construct(User1Service $user1Service){
            $this->user1Service = $user1Service;
        }

        public function getUsers(){   
            return $this->successResponse($this->user1Service->obtainUsers1());      
        }
        
        public function addUser(Request $request){
            return $this->successResponse($this->user1Service->createUser1($request->all(), Response::HTTP_CREATED));
        }

        public function show($id){
            return $this->successResponse($this->user1Service->obtainUser1($id));
        }

        public function update(Request $request, $id){
            return $this->successResponse($this->user1Service->editUser1($request->all(), $id));
        }

        public function delete($id){
            return $this->successResponse($this->user1Service->deleteUser1($id));
        }


    }