<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MercadoPago;
use App\Models\Invoices;

class Gateway extends Model
{
  use HasFactory;

  public function generate($product, $value, $payerEmail)
  {

    MercadoPago\SDK::setAccessToken(config('app.MP_ACCESS_TOKEN'));

    $payer = new MercadoPago\Payer();
    $payer->email = $payerEmail;
    $payer->name = "DeeX";


    $preference = new MercadoPago\Preference();

    // Cria um item na preferência
    $item = new MercadoPago\Item();
    $item->title = $product;
    $item->quantity = 1;
    $item->unit_price = $value;
    $preference->items = array($item);
    $preference->payer = $payer;
    $preference->expires = true;
    $preference->payment_methods = array(
      "excluded_payment_types" => array(
        array("id" => "ticket"),
        array("id" => "bank_transfer")
      ),
      "installments" => 5
    );

    $preference->save();
    return $preference;
  }

  public function ipn($id)
  {
    MercadoPago\SDK::setAccessToken(config('app.MP_ACCESS_TOKEN'));

    (object)$payment = MercadoPago\Payment::find_by_id($id);

    if ($payment->status == "approved") {

      if ($payment->description == "Plano Pro") {
        (new Customers())->where('email', $payment->payer->email)->update([
          "Plan" => "Pro"
        ]);
      }
    }

    if ($payment->status == "rejected") {
      (new Invoices())->where('email', $payment->payer->email)->where('status', 1)->update([
        "status" => 2
      ]);
    }

    // dd($payment);
  }
}
