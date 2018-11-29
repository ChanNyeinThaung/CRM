<?php

namespace App\Http\Controllers;

use App\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('id', 'desc')
                                ->paginate(5);

        return view('customers.index', [
            'customers' => $customers
        ]);
    }

    public function view($id)
    {
        $customer = Customer::find($id);
        return view('customers.view', [
            'customer' => $customer
        ]);
    }

    public function add()
    {
        return view('customers.add');
    }

    public function create()
    {
        $validator = validator(request()->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required'
        ]);

        if($validator->fails()) {
            return redirect('/customers/add')->withErrors($validator);
        }

        $customer = new Customer();
        $customer->name = request()->name;
        $customer->email = request()->email;
        $customer->phone = request()->phone;
        $customer->address = request()->address;
        $customer->save();

        return redirect('/customers')->with('info', 'A new customer added');
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('customers.edit', [
            'customer' => $customer
        ]);
    }

    public function update($id)
    {
        $validator = validator(request()->all(), [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required'
        ]);

        if($validator->fails()) {
            return redirect('/customers/edit/' . $id)->withErrors($validator);
        }

        $customer = Customer::find($id);
        $customer->name = request()->name;
        $customer->email = request()->email;
        $customer->phone = request()->phone;
        $customer->address = request()->address;
        $customer->save();

        return redirect('/customers')->with('info', 'A customer updated');
    }

    public function delete($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect('/customers')->with('info', 'A customer deleted');
    }
}
