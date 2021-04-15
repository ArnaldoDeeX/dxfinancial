<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Models\Customers;
use App\Models\Gateway;
use App\Models\Invoices;
use App\Models\Operators;
use App\Models\Plans;
use Illuminate\Http\Request;

class App extends Controller
{

    public function test()
    {
      
    }

    public function customersInvoices(Request $request)
    {
        // return view('app/checkout', [
        //     "pref" => (new Gateway())->generate("Plano Pro", 29.90, "teste@teste.com")
        // ]);

        if ($request->isMethod("POST")) {
            if (!$request->input('delete')) {
                (new Invoices())->insert([
                    "email" => $request->input('email'),
                    "value" => $request->input('value'),
                    "expireat" => $request->input('expireat'),
                    "status" => 1,
                    "url" => (new Gateway())->generate($request->input('charge'), $request->input('value'), $request->input('email'))->init_point,
                ]);
            }
        }

        return view('app/invoices', [
            'invoices' => (new Invoices())->all(),
        ]);

    }

    public function ipn(Request $request)
    {
        (new Gateway())->ipn($request->get('data_id'));
        // dd((new Gateway())->ipn("1234924264"));
    }

    public function login(Request $request)
    {

        if (Auth::is_logged()) {
            return redirect('app');
        }

        if ($request->email) {
            $check = (new Operators())->where('email', $request->email)->where('password', $request->password)->first();
            if ($check) {
                $request->session()->put('auth', (object) $check);

                return redirect('app');
            } else {
                return redirect('login')->withMessage('Usuário ou senha inválidos.');
            }
        }

        return view('app/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function dashboard()
    {
        return view('app/home', [
            "customers" => (new Customers())->where('status', 1)->count(),
            "plans" => (new Plans())->count(),
        ]);
    }

    public function customers(Request $request)
    {

        if ($request->isMethod('POST')) {
            if ($request->input('id') && !$request->input('update') && !$request->input('delete')) {
                $search = (new Customers())->where('id', $request->input('id'))->first();
                return $search->toJson();
            }

            if ($request->input('id') && $request->input('update') && !$request->input('delete')) {

                (new Customers())->where('id', $request->input('id'))->update([
                    'name' => trim($request->input('name'), "'"),
                    'email' => $request->input('email'),
                    'plan' => $request->input('plan'),
                    'expireat' => $request->input('expireat'),
                    'status' => $request->input('status'),
                ]);
            }

            if ($request->input('name') && !$request->input('update') && !$request->input('delete')) {
                $search = (new Customers())->where('email', $request->input('email'))->first();
                if ($search) {
                    return redirect('app/customers')->withMessage('userExists');
                }

                (new Customers())->insert([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'plan' => $request->input('plan'),
                    'expireat' => $request->input('expireat'),
                    'status' => 1,
                ]);
            }

            if ($request->input('delete')) {
                (new Customers())->where('id', $request->input('id'))->delete();
            }
        }

        return view('app/customers', [
            "customers" => (new Customers())->orderBy('id', 'DESC')->paginate(15),
            "plans" => (new Plans())->all(),
        ]);
    }

    public function plans(Request $request)
    {
        if ($request->isMethod('POST')) {
            if ($request->input('delete')) {
                (new Plans())->where('id', $request->input('delete'))->delete();
            }

            if ($request->input('id') && !$request->input('update')) {
                $search = (new Plans())->where('id', $request->input('id'))->first();
                return $search->toJson();
            }

            if ($request->input('plan') && !$request->input('update')) {
                (new Plans())->insert([
                    'plan' => $request->input('plan'),
                    'price' => $request->input('price'),
                ]);
            }

            if ($request->input('update')) {
                (new Plans())->where('id', $request->id)->update([
                    'plan' => $request->input('plan'),
                    'price' => $request->input('price'),
                ]);
            }
        }

        return view('app/plans', [
            'plans' => (new Plans())->paginate(15),
        ]);
    }

    public function invoices()
    {
        return view('app/invoices');
    }

}
