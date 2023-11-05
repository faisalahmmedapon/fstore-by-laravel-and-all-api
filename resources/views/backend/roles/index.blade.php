@extends('backend.layouts.app')

@section('title')
    Roles
@endsection



@push('css')

@endpush

@section('content')


    <div class="d-flex justify-content-between">
        <h6 class="mb-0 text-uppercase"> Permissions </h6>
        <span class="badge bg-info"><a class="text-white" href="{{ route('roles.create') }}"> New Roles </a></span>

    </div>
    <hr/>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>
                                <span class="badge bg-info"><a class="text-white" href="{{ route('roles.show',$role->id) }}"> {{ $role->name ?? '' }} </a></span>
                            </td>
                            <td class="d-flex">
                                @can('role-list')
                                    <a href="{{ route('roles.edit',$role->id) }}" class="btn btn-sm"><i
                                            class="lni lni-highlight-alt"></i></a>
                                @endcan
                                @can('role-edit')
                                    <a href="{{ route('roles.show',$role->id) }}" class="btn btn-sm"><i
                                            class="lni lni-eye"></i></a>
                                @endcan
                                @can('role-delete')
                                    <form method="POST"
                                          action="{{route('roles.destroy',$role->id)}}"
                                          onsubmit="return confirm('Are you sure ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm" type="submit"><i class="lni lni-cross-circle"></i>
                                        </button>

                                    </form>
                                @endcan
                            </td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection


@push('js')



@endpush


