@extends('layouts/app')
@section('content')
    <div class="container">
        <h3>New Complain</h3>
        <hr>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label><i class="fa fa-font"></i> Subject</label>
                <input type="text" name="subject" class="form-control">
            </div>
            <div class="form-group">
                <label><i class="fa fa-align-left"></i> Detail</label>
                <textarea name="detail" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label><i class="fa fa-users"></i> Customer</label>
                <select name="customer_id" class="form-control" id="customers">
                    <option value="">-- Choose Customer --</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}"
                            data-phone="{{ $customer->phone }}"
                            data-email="{{ $customer->email }}">
                            {{ $customer->name }}
                        </option>
                    @endforeach
                </select>
                <small class="form-text text-muted">
                    Email: <span id="customer-email">N/A</span>,
                    Phone: <span id="customer-phone">N/A</span>
                </small>
            </div>
            <div class="form-group">
                <label><i class="fa fa-mobile-alt"></i> Product</label>
                <select name="product_id" class="form-control" id="products">
                    <option value="">-- Choose Product --</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}"
                            data-brand="{{ $product->brand }}"
                            data-model="{{ $product->model }}">
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
                <small class="form-text text-muted">
                    Brand: <span id="product-brand">N/A</span>,
                    Model: <span id="product-model">N/A</span>
                </small>
            </div>
            <input type="submit" value="Add Complain" class="btn btn-primary">
        </form>
    </div>
@endsection
