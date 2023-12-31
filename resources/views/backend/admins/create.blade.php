@extends('backend.layouts.app')

@section('title')
    Admin Create
@endsection

@section('content')

    <div class="d-flex justify-content-between">
        <h6 class="mb-0 text-uppercase"> Admin Lists </h6>
        <span class="badge bg-info"><a class="text-white" href="{{ route('admins.index') }}"> Admins </a></span>
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
    <div class="row  py-5">
        <div class="col-12 col-sm-6 col-md-12 mx-auto">
            <div class=" p-3">
                <form action="{{ route('admins.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group p-2">
                                <label for="name">Name: </label>
                                <input type="text" name="name" class="form-control"
                                       value="{{ old('name') }}" id="name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group p-2">
                                <label for="email"> Email: </label>
                                <input type="text" name="email" class="form-control"
                                       value="{{ old('email') }}" id="email">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group p-2">
                                <label for="password"> Password: </label>
                                <input type="text" name="password" class="form-control"
                                       value="{{ old('password') }}" id="password">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group p-2">
                                <label for="password_confirmation"> Confirm Password: </label>
                                <input type="text" name="password_confirmation" class="form-control"
                                       value="{{ old('password_confirmation') }}" id="password_confirmation">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group p-2">
                                <label for="password_confirmation"> Role: </label>
                                <select class="multiple-select select2-hidden-accessible" multiple="" tabindex="-1"
                                        aria-hidden="true" name="roles[]">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role }}">{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-6">
                            <div class="form-group p-2">
                                <button type="submit" class="btn btn-sm btn-success"> Submit </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
