@extends('layouts/app')
@section('content')
    <div class="container">
        <h2>Customer List</h2>

        @if(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif

        <table class="table table-striped table-bordered">
            <tr>
                <th>ID</th> <th>Name</th> <th>Email</th> <th>Phone</th> <th>#</th>
            </tr>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td><a href="{{ url('customers/view/' . $customer->id) }}">{{ $customer->name }}</a></td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>
                        <a href="{{ url('customers/edit/' . $customer->id) }}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ url('customers/delete/' . $customer->id) }}" class="text-danger">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>

        {{ $customers->links() }}
    </div>
@endsection
