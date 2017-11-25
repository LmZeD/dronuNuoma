@extends('layouts.master')

@section('content')
    <form class="form-horizontal" action="{{route('admin.getAddShopForm.submit')}}" method="post">
        <fieldset>
        {{ csrf_field() }}
        <!-- Form Name -->
            <legend>Nuomos punkto adresas</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="address">Adresas</label>
                <div class="col-md-4">
                    <input id="address" name="address" value="{{old('address')}}" type="text" placeholder="Adresas" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="zip">Pašto kodas</label>
                <div class="col-md-4">
                    <input id="zip" name="zip" value="{{old('zip')}}"type="text" placeholder="LT-11111" class="form-control input-md" required="">

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
                    <button id="submit" name="submit" class="btn btn-success">Pateikti</button>
                </div>
            </div>

        </fieldset>
    </form>
@endsection
