<?php
 
namespace App\Controllers;
 
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\VersionModel;
 
class Version extends BaseController
{
    use ResponseTrait;
     
    public function index()
    {
        $version = new VersionModel();
        //return $this->respond(['users' => $users->findAll()], 200);
        $response = [
            'error' => null,
            'data' => $version->where('active', '1')->first()
        ];
        return $this->respond($response,200);
    }
}