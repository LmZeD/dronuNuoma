@extends('layouts.master')

@section('content')
    <form class="form-horizontal" enctype="multipart/form-data" action="{{route('customer.getAddProductForm.submit')}}" method="post">
        <fieldset>
        {{ csrf_field() }}
            <!-- Form Name -->
            <legend>Drono informacija</legend>

        <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="name">Drono modelis</label>
                <div class="col-md-4">
                    <input id="name" name="name" value="{{old('name')}}" type="text" placeholder="Drono modelis" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="description">Drono aprašymas</label>
                <div class="col-md-4">
                    <input id="description" name="description" value="{{old('description')}}"type="text" placeholder="Aprašymas" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="price">Kaina (valandinis tarifas)</label>
                <div class="col-md-4">
                    <input id="price" name="price" value="{{old('price')}}" placeholder="€/h" type="number" step="0.01" class="form-control input-md" required="">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="date_available">Galimas nuomos laikotarpis (iki pasirinktos dienos)</label>
                <div class="col-md-4">
                    <input id="date_available" name="date_available" value="{{old('date_available')}}" type="date" class="form-control input-md" required="">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="amount">Kiekis</label>
                <div class="col-md-4">
                    <input id="amount" name="amount" value="{{old('amount')}}" type="number" placeholder="Kiekis" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="size">Dydis (cm)</label>
                <div class="col-md-4">
                    <input id="size" name="size" value="{{old('size')}}" type="text" placeholder="ilgis x plotis x aukštis" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="weight">Masė (g)</label>
                <div class="col-md-4">
                    <input id="weight" name="weight" value="{{old('weight')}}" type="number" step="0.1" placeholder="g" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="product_type">Produkto tipas</label>
                <div class="col-md-4">
                    <select id="product_type" name="product_type" class="form-control">
                        <option value="-1">Pasirinkite</option>
                        @foreach($productTypes as $productType)
                            <option value="{{$productType->product_type_id}}">{{$productType->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="file">Produkto nuotrauka (.png ne didesnė nei 10mb)</label>
                <div class="col-md-4">
                    <input type="file" name="file" id="file">
                    <input type="hidden" value="{{csrf_token()}}" name="_token">
                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
                    <button id="submit" name="submit" class="btn btn-success">Pateikti</button>
                </div>
            </div>
        </fieldset>
    </form>
@endsection
