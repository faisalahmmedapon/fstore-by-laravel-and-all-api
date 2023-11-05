@extends('backend.layouts.app')

@section('title')
    Setting Update
@endsection

@section('content')

    <div class="d-flex justify-content-end">
        <span class="badge bg-success"><a href="{{route('settings')}}"> Setting Lists </a></span>
    </div>

    <div class="row">
        <div class="col-12 col-sm-6 col-md-12 mx-auto">
            <div class=" p-3">

                <form action="{{route('update.setting')}}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-primary" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                                           aria-selected="true">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"><i class="bx bx-home font-18 me-1"></i>
                                                </div>
                                                <div class="tab-title">Home</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#primaryimages" role="tab"
                                           aria-selected="false" tabindex="-1">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                                                </div>
                                                <div class="tab-title">Images</div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#primarysocials" role="tab"
                                           aria-selected="false" tabindex="-1">
                                            <div class="d-flex align-items-center">
                                                <div class="tab-icon"><i class="bx bx-microphone font-18 me-1"></i>
                                                </div>
                                                <div class="tab-title">Socials</div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content py-3">
                                    <div class="tab-pane fade active show" id="primaryhome" role="tabpanel">
                                        @foreach($settings as $setting)

                                            @if($setting->type == 'text')
                                                <div class="col-md-6">
                                                    <div class="form-group p-2">
                                                        <label for="{{$setting->key}}"
                                                               class="uppercase"> {{app_name()}} {{ucfirst($setting->key)}}: </label>
                                                        <input type="{{$setting->type}}" name="{{$setting->key}}"
                                                               class="form-control"
                                                               value="{{$setting->value}}" id="{{$setting->key}}">
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="tab-pane fade" id="primaryimages" role="tabpanel">
                                        @foreach($settings as $setting)

                                            @if($setting->type == 'file')
                                                <div class="col-md-6">
                                                    <div class="form-group p-2">
                                                        <label for="{{$setting->key}}"
                                                               class="uppercase">{{app_name()}} {{ucfirst($setting->key)}} :</label>
                                                        <input type="{{$setting->type}}" name="{{$setting->key}}"
                                                               class="form-control" id="{{$setting->key}}" value="{{$setting->value}}">
                                                        <img width="100px" src="{{$setting->value ? 'https://1000logos.net/wp-content/uploads/2016/10/Apple-Logo.png' : ''}}">
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="tab-pane fade" id="primarysocials" role="tabpanel">
                                        @foreach($settings as $setting)

                                            @if($setting->type == 'socials')
                                                <div class="col-md-6">
                                                    <div class="form-group p-2">
                                                        <label for="{{$setting->key}}"
                                                               class="uppercase">{{app_name()}} {{ucfirst($setting->key)}}: </label>
                                                        <input type="{{$setting->type}}" name="{{$setting->key}}"
                                                               class="form-control"
                                                               value="{{$setting->value}}" id="{{$setting->key}}">
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group p-2">
                                <button type="submit" class="btn btn-sm btn-success"> Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
