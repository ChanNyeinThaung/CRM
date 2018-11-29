@extends('layouts/app')

@section('content')
    <div class="container">

        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link @if($status === 'all') active @endif" href="{{ url('/complains') }}">
                    All Complains
                    <span class="badge badge-secondary">{{ $count_all }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($status === '0') active @endif" href="{{ url('/complains/filter/0') }}">
                    New <span class="badge badge-danger">{{ $count_new }}</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle nav-link @if($status > 0) active @endif" href="#" data-toggle="dropdown">
                    Filter
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ url('/complains/filter/1') }}">
                        Assigned
                    </a>
                    <a class="dropdown-item" href="{{ url('/complains/filter/2') }}">
                        WIP
                    </a>
                    <a class="dropdown-item" href="{{ url('/complains/filter/3') }}">
                        Done
                    </a>
                    <a class="dropdown-item" href="{{ url('/complains/filter/4') }}">
                        Closed
                    </a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/complains/add') }}">
                    <i class="fa fa-plus-circle"></i> Add Complain
                </a>
            </li>
        </ul>
        <br>

        @if(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif

        <table class="table table-striped table-bordered">
            <tr>
                <td>#</td>
                <td>Subject</td>
                <td>Product</td>
                <td>Customer</td>
                <td>Assign To</td>
                <td>Status</td>
            </tr>
            @foreach($complains as $complain)
                <tr>
                    <td>{{ $complain->id }}</td>
                    <td>
                        <a href="{{ url('/complains/view/' . $complain->id) }}">
                            {{ $complain->subject }}
                        </a>
                        <span class="badge badge-secondary">{{ count($complain->comments) }}</span>
                    </td>
                    <td>
                        <a href="{{ url('/products/view/' . $complain->product->id) }}">
                            {{ $complain->product->name }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ url('/customers/view/' . $complain->customer->id) }}">
                            {{ $complain->customer->name }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ url('/users/view/' . $complain->user->id) }}">
                            <i class="fa fa-user"></i> {{ $complain->user->name }}
                        </a>
                    </td>
                    <td>
                        <span class="badge badge-{{ config('crm.badge')[$complain->status] }}">
                            {{ config('crm.status')[$complain->status] }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $complains->links() }}
    </div>
@endsection
