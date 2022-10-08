<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Customer::class);
        $items=Customer::search()->paginate(5);
        return view('admin.customers.index',compact('items'));
    }
}
