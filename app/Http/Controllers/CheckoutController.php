<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Trang checkout
    public function index()
    {
        $cart = session('cart', []);
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        return view('checkout.index', compact('cart', 'total'));
    }
    //Phương thức thanh toán
    public function bankPayment($orderId)
    {
        $order = Order::findOrFail($orderId);

        return view('payment.bank', compact('order'));
    }

//     public function payWithMomo($order)
//     {
//         $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

//         $partnerCode = 'MOMO';
//         $accessKey = 'F8BBA842ECF85';
//         $secretKey = 'K951B6PE1waDMi640xX08PD3vg6EkVlz';
//         $orderInfo = "Thanh toán đơn hàng #$order->id";
//         $amount = $order->total;
//         $orderId = $order->id . "_" . time();
//         $redirectUrl = route('payment.momo.return');
//         $ipnUrl = route('payment.momo.return');

//         $requestId = time() . "";
//         $requestType = "captureWallet";

//         $rawHash = "accessKey=$accessKey&amount=$amount&extraData=&ipnUrl=$ipnUrl&orderId=$orderId&orderInfo=$orderInfo&partnerCode=$partnerCode&redirectUrl=$redirectUrl&requestId=$requestId&requestType=$requestType";

//         $signature = hash_hmac("sha256", $rawHash, $secretKey);

//         $data = [
//             'partnerCode' => $partnerCode,
//             'partnerName' => "MoMoTest",
//             'storeId' => "MoMoTestStore",
//             'requestId' => $requestId,
//             'amount' => $amount,
//             'orderId' => $orderId,
//             'orderInfo' => $orderInfo,
//             'redirectUrl' => $redirectUrl,
//             'ipnUrl' => $ipnUrl,
//             "lang" => "vi",
//             'extraData' => "",
//             'requestType' => $requestType,
//             'signature' => $signature
//         ];

//         $ch = curl_init($endpoint);
//         curl_setopt($ch, CURLOPT_POST, 1);
//         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

//         $result = curl_exec($ch);
//         curl_close($ch);

//         $jsonResult = json_decode($result, true);

//         return redirect($jsonResult['payUrl']);
//     }

//     public function payWithZaloPay($order)
// {
//     $endpoint = "https://sb-openapi.zalopay.vn/v2/create";

//     $config = [
//         "appid" => 2553,
//         "key1" => "sdasd123123sdasd",
//         "key2" => "asd123123123asdasd"
//     ];

//     $orderData = [
//         "app_id" => $config["appid"],
//         "app_trans_id" => date("ymd")."_".$order->id,
//         "app_user" => "user_".auth()->id(),
//         "item" => "[]",
//         "amount" => $order->total,
//         "desc" => "Thanh toán đơn hàng #".$order->id,
//         "bank_code" => "",
//         "redirect_url" => route('payment.zalopay.return'),
//         "callback_url" => route('payment.zalopay.return'),
//     ];

//     $data = $orderData["app_id"] . "|" . $orderData["app_trans_id"] . "|" . $orderData["app_user"] . "|" . $orderData["amount"]
//         . "|" . $orderData["item"] . "|" . $orderData["desc"];

//     $orderData["mac"] = hash_hmac("sha256", $data, $config["key1"]);

//     $ch = curl_init($endpoint);
//     curl_setopt($ch, CURLOPT_POST, 1);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($orderData));
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

//     $result = curl_exec($ch);
//     curl_close($ch);

//     $json = json_decode($result, true);

//     return redirect($json['order_url']);
// }




    // Xử lý đặt hàng
    public function placeOrder(Request $request)
    {
        $data = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'nullable|email',
            'customer_phone' => 'nullable|regex:/^0[0-9]{9}$/',
            'shipping_address' => 'required|string',
            'payment_method' => 'required|in:cod,bank,momo',
        ]);

        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng rỗng');
        }

        $subtotal = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $shipping_fee = 0; // tính sau cũng được
        $tax = 0;

        DB::beginTransaction();
        try {
            $order = Order::create([
                'user_id' => auth()->id(),
                'customer_name' => $data['customer_name'],
                'customer_email' => $data['customer_email'],
                'customer_phone' => $data['customer_phone'],
                'shipping_address' => $data['shipping_address'],
                'payment_method' => $data['payment_method'],
                'subtotal' => $subtotal,
                'shipping_fee' => $shipping_fee,
                'tax' => $tax,
                'total' => $subtotal + $shipping_fee + $tax,
                'status' => 'pending',
            ]);

            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'product_name' => $item['name'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'subtotal' => $item['price'] * $item['quantity'],
                ]);
            }

            DB::commit();

            session()->forget('cart');
            // return redirect('/')->with('success', 'Đặt hàng thành công!');
            if ($data['payment_method'] === 'cod') {
                return redirect('/')->with('success', 'Đặt hàng thành công! Bạn sẽ thanh toán khi nhận hàng.');
            }

            // Các phương thức khác → chuyển sang trang hướng dẫn thanh toán DEMO
            return redirect()->route('checkout.paymentGuide', $order->id);

            // TÁCH LUỒNG THANH TOÁN
            // if ($order->payment_method === 'cod') {
            //     return redirect('/')->with('success', 'Đặt hàng thành công! Thanh toán khi nhận hàng.');
            // }

            // if ($order->payment_method === 'bank') {
            //     return redirect()->route('payment.bank', $order->id);
            // }

            // if ($order->payment_method === 'momo') {
            //     return $this->payWithMomo($order);
            // }

            // if ($order->payment_method === 'zalopay') {
            //     return $this->payWithZaloPay($order);
            // }

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('checkout.index')->with('error', 'Lỗi: ' . $e->getMessage());
        }
    }

    public function paymentGuide($orderId)
    {
        $order = Order::findOrFail($orderId);

        return view('checkout.payment_guide', compact('order'));
    }

    public function confirmPayment($orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->status = 'paid'; // demo thôi
        $order->save();

        return redirect('/')->with('success', 'Thanh toán đã được xác nhận!');
    }
}
