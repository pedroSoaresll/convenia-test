<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SellerRequest;
use App\Seller;
use Illuminate\Http\Request;
use Mockery\Exception;


class SellerController extends Controller
{
    /**
     * route -> api/seller/create | POST
     * EXAMPLE
     *
     * {"name" : "Pedro", "email" : "pedro@email.com"}
     * _____________________________________
     *
     * @param SellerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(SellerRequest $request) {

        $Seller = new Seller();

        $res = [
            'code' => 200,
            'data' => ['message' => "Vendedor $request->name salvo com sucesso"]
        ];

        try{

            if( !$Seller->insert($request->all()) )
                throw new Exception("Não foi possível salvar o vendedor", 400);

        } catch(Exception $e) {
            $res['code'] = $e->getCode();
            $res['data']['message'] = $e->getMessage();
        }

        return response()->json($res, $res['code']);

    }


    /**
     * route -> api/seller/all | GET
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function listAll(Request $request) {

        $Seller = Seller::with('sale')->get();
        return response()->json($Seller, 200);

    }


    /**
     *  route -> api/seller/{id}
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request, $id) {

        $Seller = Seller::with('sale')->find($id);
        return response()->json($Seller, 200);

    }
}
