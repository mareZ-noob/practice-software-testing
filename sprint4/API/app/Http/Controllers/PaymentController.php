<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PaymentController extends Controller
{
    /**
     * @OA\Post(
     *      path="/payment/check",
     *      operationId="checkPayment",
     *      tags={"Payment"},
     *      summary="Check payment",
     *      description="Check payment",
     *     @OA\RequestBody(
     *        @OA\MediaType(
     *                mediaType="application/json",
     *           @OA\Schema(
     *               title="PaymentRequest",
     *               @OA\Property(property="method",
     *                        type="string",
     *                        example="Credit Card"
     *               ),
     *               @OA\Property(property="account_name",
     *                        type="string",
     *                        example="John Doe"
     *               ),
     *               @OA\Property(property="account_number",
     *                        type="string",
     *                        example="9876543XX"
     *               )
     *             )
     *         )
     *     ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              title="PaymentResponse",
     *              @OA\Property(property="message", type="string", example="Success status"),
     *          )
     *      )
     * )
     */
    public function check(Request $request)
    {
        return $this->preferredFormat(['message' => 'Payment was successful'], ResponseAlias::HTTP_OK);
    }

}
