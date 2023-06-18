<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Modelikan;
use CodeIgniter\Controller;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Ikan extends ResourceController
{
    use ResponseTrait;

    public function index()
    {
        // $authorization = apache_request_headers()["Authorization"];
        // $tokenKey = getenv('TOKEN_KEY');
        // $token = null;
        // $authHeader = $this->request->getServer('HTTP_AUTHORIZATION');
        // $arr = explode(" ", $authHeader);
        // $token = $arr[0];
        // // var_dump($authHeader);
        // // var_dump($this->request->getHeaders());

        // if ($token) {
        // try {
        // $decode = JWT::decode($token, $tokenKey, array('HS384'));
        // $decode = JWT::decode($token, $tokenKey, ['HS256'], false);
        // $decode = JWT::decode($token, $tokenKey, ['HS256']);
        // if ($decode) {
        $modelIkan = new Modelikan();
        $data =  $modelIkan->findAll();

        return $this->respond($data, 200);
        // }
        // } catch (\Exception $e) {
        //     $output = [
        //         'message' => 'Akses Ditolak !!',
        //         'status' => 401,
        //         'error' => $e->getMessage()
        //     ];
        //     return $this->respond($output, 401);
        // }
        // }
    }

    public function show($id_ikan = null)
    {
        $modelIkan = new Modelikan();
        $data =  $modelIkan->where('id_ikan', $id_ikan)->first();

        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Maaf' . $id_ikan . 'Tidak Ditemukan');
        }
    }

    public function create()
    {
        $modelIkan = new Modelikan();
        $data = [
            'kode_ikan' => $this->request->getPost('kode_ikan'),
            'nama_ikan' => $this->request->getPost('nama_ikan'),
            'kategori' => $this->request->getPost('kategori'),
            'harga' => $this->request->getPost('harga')
        ];
        $data = json_decode(file_get_contents('php://input', true));
        $modelIkan->insert($data);
        $response = [
            'status' => 201,
            'error' => null,
            'message' => [
                'success' => 'Data Berhasil Disimpan !!'
            ]
        ];
        return $this->respond($response, 201);
    }

    public function update($id_ikan = null)
    {
        $modelIkan = new Modelikan();
        $json = $this->request->getJSON();
        if ($json) {
            $data = [
                'kode_ikan' => $json->kode_ikan,
                'nama_ikan' => $json->nama_ikan,
                'kategori' => $json->kategori,
                'harga' => $json->harga,
            ];
        }

        $modelIkan->update($id_ikan, $data);
        $response = [
            'status' => 201,
            'error' => null,
            'message' => [
                'success' => 'Data Updated !!'
            ]
        ];

        return $this->respond($response);
    }

    public function delete($id_ikan = null)
    {
        $modelIkan = new Modelikan();
        $cekData = $modelIkan->find($id_ikan);
        if ($cekData) {
            $modelIkan->delete($id_ikan);
            $response = [
                'status' => 200,
                'error' => null,
                'message' => [
                    'success' => 'Data Berhasil Dihapus !!'
                ]
            ];
            return $this->respondDeleted($response);
        }
    }
}
