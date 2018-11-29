@extends('layouts/app')
@section('content')
    <div class="container">
        <h2>Edit Customer</h2>

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
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $customer->name }}">|
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="{{ $customer->email }}">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}">
            </div>
            <div class="form-group">
                <label>Address</label>
                <textarea name="address" class="form-control">{{ $customer->address }}</textarea>
            </div>
            <input type="submit" value="Update Customer" class="btn btn-primary">
        </form>
    </div>
@endsection
