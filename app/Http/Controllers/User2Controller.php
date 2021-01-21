<?php 
    namespace App\Http\Controllers;
    
    use Illuminate\Http\Response;
    use App\Traits\ApiResponser; //standardized code for api response
    use Illuminate\Http\Request;  //handling http request in lumen 
    use DB;
    use App\Services\User2Service;

    Class User2Controller extends Controller {     
        use ApiResponser;
        
        public $user1Service;

        public $user2Service;

        public function __construct(User2Service $user2Service){
            $this->user2Service = $user2Service;
        }

        public function getUsers(){     
            return $this->successResponse($this->user2Service->obtainUsers2());    
        }
        
        public function addUser(Request $request){
            return $this->successResponse($this->user2Service->createUser2($request->all(), Response::HTTP_CREATED));
        }

        public function show($id){
            return $this->successResponse($this->user2Service->obtainUser2($id));
        }

        public function update(Request $request, $id){
            return $this->successResponse($this->user2Service->editUser2($request->all(), $id));
        }

        public function delete($id){
            return $this->successResponse($this->user2Service->deleteUser2($id));
        }


    }