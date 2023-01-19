<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * @OA\Post (
     *      path="/api/order",
     *      operationId="storeOrder",
     *      tags={"storeOrder"},
     *      summary="Store order",
     *      description="Returns stored order",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\Schema(
     *               type="object",
     *               required={"payment_gateway","appointment_date", "status"},
     *               @OA\Property(property="payment_gateway", type="text"),
     *               @OA\Property(property="appointment_date", type="text"),
     *               @OA\Property(property="status", type="text")
     *          ),
     *          @OA\JsonContent(ref="#/components/schemas/StoreOrderRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful store",
     *          @OA\JsonContent(ref="#/components/schemas/OrderResource")
     *       ),
     *      @OA\Response(
     *          response=500,
     *          description="Server Error"
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function store(StoreOrderRequest $request)
    {
        if ($order = Order::create($request->all())) {
            return response()->json(new OrderResource($order));
        } else {
            return response()->json(['Server error'], 500);
        }
    }

    /**
     * @OA\Get(
     *      path="/api/order/{order}",
     *      operationId="getOrderByID",
     *      tags={"getOrderByID"},
     *      summary="Get details of single order by id",
     *      description="Returns a json object with order details",
     *      @OA\Parameter(
     *          name="order",
     *          in="path",
     *          required=true,
     *          description="Enter Order ID",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful get order details by id",
     *          @OA\JsonContent(ref="#/components/schemas/OrderResource")
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="No api found",
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Server Error"
     *      )
     *   )
     */
    public function show(Order $order)
    {
        return response()->json(new OrderResource($order));
    }

    /**
     * @OA\Put(
     *      path="/api/order/{order}",
     *      operationId="updateOrder",
     *      tags={"UpdateOrder"},
     *      summary="Update existing order",
     *      description="Returns updated order",
     *      @OA\Parameter(
     *          name="order",
     *          in="path",
     *          required=true,
     *          description="Enter Order ID",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *            @OA\Schema(
     *               type="object",
     *               required={"payment_gateway","appointment_date", "status"},
     *               @OA\Property(property="payment_gateway", type="text"),
     *               @OA\Property(property="appointment_date", type="text"),
     *               @OA\Property(property="status", type="text")
     *            ),
     *          @OA\JsonContent(ref="#/components/schemas/UpdateOrderRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful updated",
     *          @OA\JsonContent(ref="#/components/schemas/OrderResource")
     *       ),
     *      @OA\Response(
     *          response=500,
     *          description="Server Error"
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        if ($order->update($request->all())) {
            return response()->json(new OrderResource($order));
        } else {
            return response()->json(['Server error'], 500);
        }
    }

    /**
     * @OA\Delete(
     *      path="/api/order/{order}",
     *      operationId="deleteOrderByID",
     *      tags={"deleteOrderByID"},
     *      summary="Delete the order",
     *      description="Returns boolean status",
     *      @OA\Parameter(
     *          name="order",
     *          in="path",
     *          required=true,
     *          description="Enter Order ID",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful deleted",
     *       ),
     *      @OA\Response(
     *          response=500,
     *          description="Server Error"
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function destroy(Order $order)
    {
        if ($order->delete()) {
            return response()->json(['status' => true]);
        } else {
            return response()->json(['Server error'], 500);
        }
    }

    /**
     * @OA\Post(
     *      path="/api/order/all",
     *      operationId="getOrderAll",
     *      tags={"getOrderAll"},
     *      summary="Get list of orders",
     *      description="Returns list of orders",
     *      @OA\RequestBody(
     *         @OA\JsonContent()
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=500,
     *          description="Server error occurred",
     *      )
     *     )
     */
    public function getOrderAll(Request $request)
    {
//        Sample Request
//        {
//            "pagination": {
//                "perPage": 10
//            },
//            "limit": 0,
//            "offset": 4,
//                "sorting": {
//                    "order": "desc",
//                    "column": "id"
//                }
//        }
        $orders = DB::table('orders');
        $orders = $request->offset ? $orders->offset($request->offset) : $orders;
        $orders = $request->limit ? $orders->limit($request->limit) : $orders;
        $orders = $request->sorting ? $orders->orderBy($request->sorting['column'], $request->sorting['order']) : $orders;
        $orders = $request->pagination ? $orders->paginate($request->pagination['perPage']) : $orders->get();
        if ($orders) {
            return response()->json(new OrderResource($orders));
        } else {
            return response()->json(["Error occurred"], 500);
        }

    }

    /**
     * @OA\Post (
     *      path="/api/order/updateStatus/{order}",
     *      operationId="updateOrderStatus",
     *      tags={"updateOrderStatus"},
     *      summary="Update existing order status",
     *      description="Returns updated order",
     *      @OA\Parameter(
     *          name="order",
     *          in="path",
     *          required=true,
     *          description="Enter Order ID",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *            @OA\Schema(
     *               type="object",
     *               required={"status"},
     *               @OA\Property(property="status", type="text"),
     *            ),
     *          @OA\JsonContent(ref="#/components/schemas/UpdateOrderRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful status updated",
     *          @OA\JsonContent(ref="#/components/schemas/OrderResource")
     *       ),
     *      @OA\Response(
     *          response=500,
     *          description="Server Error"
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function updateOrderStatus(UpdateOrderRequest $request, Order $order)
    {
//        Sample request
//        {
//            "status": "pending"
//        }
        if ($order->status != $request->status) {
            if ($order->update(['status' => $request->status])) {
                return response()->json($order);
            } else {
                return response()->json(['Error occurred'], 500);
            }
        } else {
            return response()->json(['Already have ' . $request->status . ' status']);
        }

    }
}
