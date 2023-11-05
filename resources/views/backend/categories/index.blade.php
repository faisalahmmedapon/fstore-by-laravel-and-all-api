@extends('backend.layouts.app')

@section('title')
    Categories
@endsection



@push('css')
@endpush

@section('content')
    <div class="d-flex justify-content-between">
        <h6 class="mb-0 text-uppercase"> Categories </h6>
        <span class="badge bg-info"><a class="text-white" href="{{route('categories.create')}}"> New Category </a></span>
    </div>

    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Position Number</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $key => $category)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <img width="50" height="32" src="{{asset($category->photo)}}"
                                     alt="{{ $category->name }}"/>
                            </td>
                            <td>{{ $category->custom_serial_number }}</td>


                            <td>
                                @if($category->status == '1')
                                    <span class="badge bg-success"> Active </span>
                                @else
                                    <span class="badge bg-danger"> Inactive </span>
                                @endif
                            </td>
                            <td class="d-flex">
                                @can('category-list')
                                    <button type="button" class=" category_edit_btn btn btn-warning" value="{{$category->id}}" ><i
                                            class="lni lni-highlight-alt"></i></button>
                                @endcan
                                @can('category-edit')
                                    <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm"><i
                                            class="lni lni-eye"></i></a>
                                @endcan
                                @can('category-delete')
                                    <form method="POST" action="{{ route('categories.destroy', $category->id) }}"
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


@section('script')

@endsection
