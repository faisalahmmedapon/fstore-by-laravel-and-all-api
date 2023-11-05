@extends('backend.layouts.app')

@section('title')
    | Permissions Create
@endsection

@section('content')

    <div class="d-flex justify-content-between">
        <h6 class="mb-0 text-uppercase"> Permissions Lists </h6>
        <span class="badge bg-info"><a class="text-white" href="{{ route('permissions.index') }}"> Permissions </a></span>
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

    <section class="content">
        <div class="container-fluid">
            <div class="row  py-5">
                <div class="col-12 col-sm-6 col-md-8 mx-auto">
                    <div class=" p-3">
                        <form action="{{route('permissions.store')}}" method="POST">
                            @csrf
                            <div class="form-group p-2">
                                <label for="name"> Name: </label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}" id="name">
                            </div>
                            <div class="form-group p-2">
                                <button type="submit" class="btn btn-success px-5"><i class="fa ">Submit</i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
