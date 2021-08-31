<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Http\Request;


class UserProfileController extends Controller
{
    public function index() {
        $id = auth()->user()->id;
        $user = User::where('id', $id)->first();

        return view('front.profile.index', compact('user'));
    }

    public function show($id) {
        $order = Order::find($id);
        return view('front.profile.details', compact('order'));
    }

    public function verifyPayment(Request $request, $id) {
        $order = Order::find($id);
        if ($request->hasFile('payment')) {
            $payment = $request->payment;
            $payment->move('uploads', $payment->getClientOriginalName());
            $order->payment = $request->payment->getClientOriginalName();
        }

        $order->update([
            'payment' => $order->payment,
            'status' => 'Verifying'
        ]);

        $request->session()->flash('msg', 'Wait for your payment to verified by Admin');
        return redirect()->back();
    }
}
