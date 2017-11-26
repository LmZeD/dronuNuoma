@extends('layouts.master')

@section('content')
    <form class="form-horizontal" enctype="multipart/form-data" action="{{route('customer.getCreateMessageForm.submit')}}" method="post">
        <fieldset>
        {{ csrf_field() }}
        <!-- Form Name -->
            <legend>Sukurti žinutę administratoriui (žinutė nėra anonimiška)</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="message">Žinutė administratoriui</label>

                    <input id="message" name="message" value="{{old('message')}}"type="text"
                           placeholder="Čia galite palikti pastebėjimus ar nusiskundimus" class="form-control input-md" required="">

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
