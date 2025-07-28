<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Mehradsadeghi\FilterQueryString\FilterQueryString;

/** @OA\Schema(
 *     schema="InvoiceRequest",
 *     type="object",
 *     title="InvoiceRequest",
 *     properties={
 *         @OA\Property(property="first_name", type="string", example="John"),
 *         @OA\Property(property="last_name", type="string", example="Doe"),
 *         @OA\Property(property="email", type="string", example="john.doe@example.com"),
 *         @OA\Property(property="billing_address", type="string"),
 *         @OA\Property(property="billing_city", type="string"),
 *         @OA\Property(property="billing_country", type="string"),
 *         @OA\Property(property="billing_state", type="string"),
 *         @OA\Property(property="billing_postcode", type="string"),
 *         @OA\Property(property="total", type="number"),
 *         @OA\Property(property="payment_method", type="string", example="Cash on Delivery"),
 *         @OA\Property(property="payment_account_name", type="string", example="John Doe"),
 *         @OA\Property(property="payment_account_number", type="string", example="0987654345"),
 *         @OA\Property(property="invoicelines", type="array", @OA\Items(ref="#/components/schemas/InvoiceLineResponse"))
 *     }
 * )
 *
 * @OA\Schema(
 *     schema="InvoiceResponse",
 *     type="object",
 *     title="InvoiceResponse",
 *     properties={
 *         @OA\Property(property="id", type="integer", example=1),
 *         @OA\Property(property="first_name", type="string"),
 *         @OA\Property(property="last_name", type="string"),
 *         @OA\Property(property="email", type="string"),
 *         @OA\Property(property="invoice_date", type="string", example="2022-10-20 09:49:45"),
 *         @OA\Property(property="invoice_number", type="string", example="INV-2022000002"),
 *         @OA\Property(property="billing_address", type="string"),
 *         @OA\Property(property="billing_city", type="string"),
 *         @OA\Property(property="billing_country", type="string"),
 *         @OA\Property(property="billing_state", type="string"),
 *         @OA\Property(property="billing_postcode", type="string"),
 *         @OA\Property(property="total", type="number"),
 *         @OA\Property(property="payment_method", type="string", example="Cash on Delivery"),
 *         @OA\Property(property="payment_account_name", type="string", example="Jogn Doe"),
 *         @OA\Property(property="payment_account_number", type="string", example="0987654345"),
 *         @OA\Property(property="status", type="string", example="COMPLETED"),
 *         @OA\Property(property="status_message", type="string", example=""),
 *         @OA\Property(property="invoicelines", type="array", @OA\Items(ref="#/components/schemas/InvoiceLineResponse"))
 *     }
 * )
 */
class Invoice extends BaseModel
{
    use FilterQueryString;

    protected $filters = ['in', 'sort', 'starts_with'];
    protected $table = 'invoices';
    protected $fillable = ['first_name', 'last_name', 'invoice_date', 'invoice_number', 'billing_address', 'billing_city', 'billing_state', 'billing_country', 'billing_postcode', 'total', 'payment_method', 'payment_account_name', 'payment_account_number'];

    public function invoicelines(): HasMany
    {
        return $this->hasMany('App\Models\Invoiceline');
    }
}
