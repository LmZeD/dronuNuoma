@extends('layouts.master')

@section('content')
    <form class="form-horizontal" action="{{route('admin.sendMailForm.submit')}}" method="post">
        <fieldset>
        {{ csrf_field() }}
        <!-- Form Name -->
            <legend>Siųsti laišką</legend>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="email">El. paštas</label>
                <div class="col-md-4">
                    <input  name="email"  type="email" placeholder="email" class="form-control input-md" required="">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="title">Pranešimas</label>
                <div class="col-md-4">
                    <input name="title" type="text" placeholder="" class="form-control input-md" required="">

                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
                    <button id="submit" name="submit" class="btn btn-success">Siųsti</button>
                </div>
            </div>

        </fieldset>
    </form>
@endsection
