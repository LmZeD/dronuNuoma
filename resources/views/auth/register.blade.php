@extends('layouts.master')
@section('content')
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{$error}}</p>
        @endforeach
    @endif
    <form class="form-horizontal" action="{{route('customer.register')}}" method="post">
        <fieldset>
            <!-- Form Name -->
            <legend>Registracija</legend>
        {{ csrf_field() }}
        <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="fname">First Name</label>
                <div class="col-md-4">
                    <input id="fname" name="fname" value="{{old('fname')}}" type="text" placeholder="Enter your first name" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="lname">Last Name</label>
                <div class="col-md-4">
                    <input id="lname" name="lname" value="{{old('lname')}}"type="text" placeholder="Enter your last name" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="birth_date">Birth Date</label>
                <div class="col-md-4">
                    <input id="birth_date" name="birth_date" value="{{old('birth_date')}}" type="date" class="form-control input-md" required="">
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="email">Email</label>
                <div class="col-md-4">
                    <input id="email" name="email" value="{{old('email')}}" type="text" placeholder="Enter your email id" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="contact">Contact no.</label>
                <div class="col-md-4">
                    <input id="contact" name="contact" value="{{old('contact')}}" type="text" placeholder="Enter your contact no." class="form-control input-md" required="">

                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="gender">Lytis</label>
                <div class="col-md-4">
                    <select id="gender" name="gender" class="form-control">
                        <option value="-1">Pasirinkite</option>
                        @foreach($genders as $gender)
                            <option value="{{$gender['id']}}">{{$gender['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="password">Password</label>
                <div class="col-md-4">
                    <input id="password" name="password" type="password" placeholder="Enter a password" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Password input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="password_confirmation">Password</label>
                <div class="col-md-4">
                    <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm password" class="form-control input-md" required="">

                </div>
            </div>

            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="signup"></label>
                <div class="col-md-4">
                    <button id="signup" name="signup" class="btn btn-success">Sign Up</button>
                </div>
            </div>
        </fieldset>
    </form>
@endsection