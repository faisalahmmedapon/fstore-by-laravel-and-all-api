@extends('backend.layouts.app')

@section('title')
    Role Create
@endsection

@section('content')



    <div class="d-flex justify-content-between">
        <h6 class="mb-0 text-uppercase"> Role Lists </h6>
        <span class="badge bg-info"><a class="text-white" href="{{ route('roles.index') }}"> Roles </a></span>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <hr/>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 mx-auto">
            <div class=" p-3">
                <form action="{{route('roles.store')}}" method="POST">
                    @csrf
                    <div class="form-group p-2">
                        <label for="name"> New Role Name: </label>
                        <input type="text" name="name" placeholder="new role name" class="form-control"
                               value="{{old('name')}}" id="name">
                    </div>


                    <div class="form-group p-2">

                        <div class="d-flex justify-content-between">
                            <div>
                                <input type="checkbox" class="mb-0 text-uppercase" id="checkAll"/>
                                <label class="form-check-label" for="checkAll">
                                    Permission
                                </label>
                            </div>
                        </div>
                        <hr/>
                        @foreach($permission as $value)
                            <div class="form-check">
                                <input name="permission[]" class="form-check-input permission" type="checkbox"
                                       value="{{$value->id}}" id="permission{{$value->id}}">
                                <label class="form-check-label" for="permission{{$value->id}}">
                                    {{ $value->name }}
                                </label>
                            </div>
                        @endforeach

                    </div>
                    <div class="form-group p-2">
                        <button type="submit" class="btn btn-success btn-sm text-white"> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('script')

    <script type="text/javascript">
        $("#checkAll").change(function () {
            var status = $(this).is(":checked") ? true : false;
            $(".permission").prop("checked", status);
        });
    </script>

@endsection
