@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">{{__('Dashboard')}}</div>
                    @if ($user->roles_id == 1)
                        Role is admin

                    @else
                        Role is User

                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
