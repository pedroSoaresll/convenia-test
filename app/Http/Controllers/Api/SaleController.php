<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSaleRequest;
use App\Sale;
use App\Seller;
use Illuminate\Http\Request;
use Mockery\Exception;

class SaleController extends Controller
{
    /**
     * EXEMPLE POST
     *
     * {"value" : 400.00, "seller_id" : 1}
     * ______________________________________
     *
     * @param CreateSaleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreateSaleRequest $request) {

        $res = [
            'code' => 200,
            'data' => ['message' => "Venda criada"]
        ];

        $Sale = new Sale();

        try {
            // prepare data sale to save
            $Sale->value = $request->value;
            $Sale->seller_id = $request->seller_id;
            $Sale->date = date('Y-m-d H:m:i');
            $Sale->comission = number_format($request->value * .085, 2);

            // save new sale
            if( !$Sale->save() )
                throw new Exception("Não foi possível inserir a venda", 400);

            // get data seller
            $Seller = Seller::find($request->seller_id);

            // response
            $res['data']['name'] = $Seller->name;
            $res['data']['email'] = $Seller->email;
            $res['data']['comission'] = $Sale->comission;

        } catch (Exception $e) {
            $res['code'] = $e->getCode();
            $res['data']['message'] = $e->getMessage();
        }

        return response()->json($res, $res['code']);
    }
}
