@extends('layouts.master')

@section('content')
    <form class="form-horizontal" enctype="multipart/form-data" action="{{route('customer.getUpdateProductForm.submit',['id' => $product['product_id']])}}" method="post">
        <fieldset>

        <!-- Form Name -->
            <legend>{{$product['name']}} redagavimas</legend>
        {{ csrf_field() }}
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="price">Kaina (valandinis tarifas)</label>
                <div class="col-md-4">
                    <input id="price" name="price" value="{{old('price')}}" placeholder="{{$product['price']}}€/h" type="number" step="0.01" class="form-control input-md" required="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="date_available">Galimas nuomos laikotarpis (iki pasirinktos dienos)</label>
                <div class="col-md-4">
                    <input id="date_available" name="date_available" value="{{$product['date_available']}}" type="date" class="form-control input-md" required="">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="amount">Kiekis</label>
                <div class="col-md-4">
                    <input id="amount" name="amount" value="{{old('amount')}}" type="number" placeholder="{{$product['amount']}}" class="form-control input-md" required="">
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="product_status_id">Keisti produkto statusą (esamas: <strong>{{$currentProductStatus}}</strong>)</label>
                <div class="col-md-4">
                    <select id="product_status_id" name="product_status_id" class="form-control">
                        <option value="-1">Pasirinkite</option>
                        @foreach($productStatuses as $productStatus)
                            <option value="{{$productStatus->product_status_id}}">{{$productStatus->name}} ({{$productStatus->description}})</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="file">Nauja produkto nuotrauka (.png ne didesnė nei 10mb)</label>
                <label class="col-md-4 control-label" for="file">Palikite tuščią, jei nenorite keisti</label>
                <div class="col-md-4">
                    <input type="file" name="file" id="file">
                    <input type="hidden" value="{{csrf_token()}}" name="_token">
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
                    <button id="submit" name="submit" class="btn btn-success">Atnaujinti</button>
                </div>
            </div>
            <a href="{{route('customer.getProfile')}}" class="btn btn-default">Grįžti atgal</a>
        </fieldset>
    </form>
@endsection
