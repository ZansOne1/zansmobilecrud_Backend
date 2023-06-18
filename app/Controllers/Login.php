<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Config\Services;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Models\Modelauth;

class Login extends ResourceController
{
    use ResponseTrait;
    public function index()
    {
        $modelLogin = new Modelauth();

        $iduser = $this->request->getVar('iduser');
        $password = $this->request->getVar('password');

        $cekUser = $modelLogin->ceklogin($iduser);
        if (count($cekUser->getResultArray()) > 0) {
            $row = $cekUser->getRowArray();
            $password_hash_user = $row['password'];
            if (password_verify($password, $password_hash_user)) {
                $issuedat_claim = time();
                $expired_claim = $issuedat_claim + 60;
                $token = array(
                    "iat" => $issuedat_claim,
                    "exp" => $expired_claim
                );
                $token = JWT::encode($token, getenv('TOKEN_KEY'), 'HS256');

                $output = [
                    'status' => 200,
                    'message' => 'Berhasil Login',
                    "token" => $token,
                    "email" => $row['email'],
                    "iduser" => $row['iduser'],
                    "expireAt" => $expired_claim
                ];
                return $this->respond($output, 200);
            }
        } else {
            return $this->failNotFound('Maaf User Tidak Ditemukan !!');
        }
    }
}
