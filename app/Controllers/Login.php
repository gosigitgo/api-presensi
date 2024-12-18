<?php
  
namespace App\Controllers;
  
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use \Firebase\JWT\JWT;
  
class Login extends BaseController
{
    use ResponseTrait;
      
    public function index()
    {
        $userModel = new UserModel();
   
        $nip = $this->request->getVar('nip');
        $password = $this->request->getVar('password');
           
        $user = $userModel->where('nip', $nip)->first();
   
        if(is_null($user)) {
            return $this->respond(['error' => 'Invalid nip or password.'], 401);
        }
   
        $pwd_verify = password_verify($password, $user['password']);
   
        if(!$pwd_verify) {
            return $this->respond(['error' => 'Invalid nip or password.'], 401);
        }
  
        $key = getenv('JWT_SECRET');
        $iat = time(); // current timestamp value
        $exp = $iat + 3600;
  
        $payload = array(
            "iss" => "Issuer of the JWT",
            "aud" => "Audience that the JWT",
            "sub" => "Subject of the JWT",
            "iat" => $iat, //Time the JWT issued at
            "exp" => $exp, // Expiration time of token
            "nip" => $user['nip'],
        );
          
        $token = JWT::encode($payload, $key, 'HS256');
  
        $response = [
            'message' => 'Login Succesful',
            'token' => $token
        ];
          
        return $this->respond($response, 200);
    }
  
}