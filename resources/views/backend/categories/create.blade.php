@extends('backend.layouts.app')

@section('title')
    Category Create
@endsection
@push('css')
@endpush

@section('content')

    <div class="d-flex justify-content-between">
        <h6 class="mb-0 text-uppercase"> Category Lists </h6>
        <span class="badge bg-info"><a class="text-white" href="{{ route('categories.index') }}"> Categories </a></span>
    </div>
    <hr/>
    <div class="row  py-5">
        <div class="col-12 col-sm-6 col-md-12 mx-auto">
            <div class=" p-3">
                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="custom_serial_number">Custom Serial Number: </label>
                                <input type="number" name="custom_serial_number" class="form-control"
                                       value="{{ old('custom_serial_number') }}" id="custom_serial_number">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group p-2">
                                <label for="photo">Photo: </label>
                                <input type="file" name="photo" class="form-control" id="photo">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group p-2">
                                <div class="form-check form-switch">
                                    <input name="status" class="form-check-input" type="checkbox" id="status" checked="">
                                    <label class="form-check-label" for="status"> Publish / Unpublish </label>
                                </div>
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

@section('script')
@endsection
