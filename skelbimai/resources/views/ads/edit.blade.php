@extends('layouts.app')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit ad info') }}</div>

                    <div class="card-body">
                        <form class="form" method="post" action="{{ route('ad.update', $ad->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input value="{{$ad->title}}" type="text" name="title" class="form-control"
                                       placeholder="Pavadinimas">
                                <textarea name="content" class="form-control">
                                    {{$ad->content}}
                                </textarea>
                                <input value="{{ $ad->image }}"name="image" type="text" class="form-control" placeholder="image.jpg">
                                <input value="{{ $ad->years }}"name="years" type="text" class="form-control" placeholder="1990">
                                <input value="{{ $ad->vin }}"name="vin" type="text" class="form-control" placeholder="vin">
                                <input value="{{ $ad->price }}"name="price" type="number" class="form-control" placeholder="price">
                                <select name="color_id" class="form-control">
                                    <option>Color</option>
                                    @foreach($colors as $color)
                                        @if ($color->id == $ad->color_id)
                                            <option selected value="{{$color->id}}">{{$color->name}}</option>
                                        @else
                                            <option value="{{$color->id}}">{{$color->name}}</option>
                                        @endif
                                        
                                    @endforeach
                                </select>
                                <select name="manufacturer_id" class="form-control">
                                    <option>Manufacturer</option>
                                    @foreach($manufacturers as $manufacturer)
                                        @if($manufacturer->id == $ad->manufacturer_id)
                                            <option selected value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                                        @else
                                            <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <select name="model_id" class="form-control">
                                    <option>Car model</option>
                                    @foreach($carModels as $carModel)
                                        @if($carModel->id == $ad->model_id)
                                            <option selected value="{{$carModel->id}}">{{$carModel->name}}</option>
                                        @else
                                            <option value="{{$carModel->id}}">{{$carModel->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <select name="type_id" class="form-control">
                                    <option>Type</option>
                                    @foreach($types as $type)
                                        @if($type->id == $ad->type_id)
                                            <option selected value="{{$type->id}}">{{$type->name}}</option>
                                        @else
                                            <option value="{{$type->id}}">{{$type->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <input type="submit" value="Redaguoti" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection