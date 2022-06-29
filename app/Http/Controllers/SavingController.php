<?php

namespace App\Http\Controllers;

use App\Models\Saving;
use App\Models\Transaction;
use Illuminate\Http\Request;

class SavingController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $savings = $user->savings;
        return view('saving.index', compact('savings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "target" => "required|integer|min:100000",
            "due_date" => "required|date|after:" . date('Y-m-d'),
            "period" => "required|string|in:daily,weekly,monthly",
        ]);

        $user = $request->user();
        $user->savings()->create($request->except('_token'));

        return redirect()->back()->withMessage('Tabungan baru telah dibuat, Selamat menabung');
    }

    public function detail(Saving $saving)
    {
        $saving->load('transactions', 'user.wallet');
        return view('saving.detail', compact('saving'));
    }

    public function start(Request $request, Saving $saving)
    {
        $request->validate([
            "amount" => "required|integer|min:10000",
        ]);

        $user = $request->user();
        $wallet = $user->wallet;

        $data = $request->except('_token');
        $data['saving_id'] = $saving['id'];
        $data['category'] = Transaction::CATEGORY_DEPOSIT;
        $transaction = $wallet->transactions()->create($data);

        return redirect()->route('my.saving.upload', $transaction['id'])->withMessage('Oke, Silahkan lakukan transfer sesuai instruksi');
    }

    public function upload(Request $request, Transaction $transaction)
    {
        $wallet = $request->user()->wallet;
        if ($transaction['status'] !== Transaction::STATUS_PENDING && $transaction['wallet_id'] !== $wallet['id']) {
            abort(404);
        }
        return view('saving.upload', compact('transaction'));
    }

    public function updatePayment(Request $request, Transaction $transaction)
    {
        $wallet = $request->user()->wallet;
        if ($transaction['status'] !== Transaction::STATUS_PENDING && $transaction['wallet_id'] !== $wallet['id']) {
            abort(404);
        }

        $request->validate([
            'payment_proof' => "required|file|mimes:jpeg,png,jpg,gif,svg|max:1000"
        ]);

        $image_path = $transaction['payment_proof'];
        if ($request->file('payment_proof') != '') {
            $main_image = uniqid() . '.' . $request->file('payment_proof')->getClientOriginalExtension();
            $request->file('payment_proof')->move(storage_path('app/public/payment_proof'), $main_image);
            $image_path = '/storage/payment_proof/' . $main_image;
        }
        $transaction['payment_proof'] = $image_path;
        $transaction['status'] = Transaction::STATUS_WAITING_APPROVAL;
        $transaction->save();

        return redirect()->route('my.saving.detail', $transaction['saving_id'])->withMessage('Payment proof uploaded');
    }
}
