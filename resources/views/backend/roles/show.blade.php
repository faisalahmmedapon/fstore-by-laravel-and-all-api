@extends('backend.layouts.app')

@section('title')
    Role Details
@endsection

@section('content')

    <div class="d-flex justify-content-end">
        @can('role-list')
            <span class="badge bg-info"> <a class="text-white"  href="{{route('roles.index')}}"> Role Lists </a> </span>
        @endif
    </div>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 mx-auto shadow p-5">
            <div class="card-body">
                <div class="card-header text-center font-50">
                    {{ $role->name }}
                </div>
                <strong>Has Permissions: </strong>
                @if(!empty($rolePermissions))
                    <br>
                    <ul class="list-group">
                        @foreach($rolePermissions as $permission)
                            <li class="list-group-item">{{ $permission->name }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

@endsection

