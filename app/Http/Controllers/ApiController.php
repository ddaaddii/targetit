<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Endereco;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function cadastrar_endereco(Request $request)
    {
        if($request->has('token')){
            $token = $request->token;
            $config = Config::find(1);
            $config_token = $config->api_token;

            if($token == $config_token){
                if($request->has('endereco')){
                    $endereco = $request->endereco;
                    $data = $endereco;
                    Endereco::create($data);
                    return response('Endereço cadastrado com sucesso.', 200); 
                } else {
                    return response('Erro ao enviar o endereço.', 500); 
                }
            } else {
                return response('Erro no envio. Token inválido.', 401); 
            }
        } else {
            return response('Erro ao enviar o endereço. Token não encontrado', 500); 
        }
    }
}
