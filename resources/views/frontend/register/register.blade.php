@extends('frontend.master')
@section('content')

<div class="container">
    <div class="row">
        <div class="col -md 6-md-ofset-md-0">
            <h3 class="text-center mt-4"> Register Your Account </h3>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(session()->has('message'))
            <div class="alart alart {{session('type')}}">
            {{session('message')}}
            </div>
            @endif
            <form action="{{route('register')}}" method="post" class="form form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="full name">Full Name</label>
                    <input type="text" required name="full_name" class="form-control" id="formGroupExampleInput" placeholder="Name">
                </div>

                <div class="form-group">
                    <label for="">Email Address</label>
                    <input name ="email"  required class="form-control" id="email" placeholder="Enter email">
                </div>

                <div class="form-group">
                    <label for="">Phone no</label>
                    <input name ="phone" required class="form-control" id="phone" placeholder="Enter phone">
                </div>


                <div class="form-group">
                    <label for="">Password</label>
                    <input name="password" class="form-control" id="phone" placeholder="Enter passward">
                </div>


                <!-- <div class="form-group">
                    <label for="">Confirm Passward</label>
                    <input name required="passward_confirmation" class="form-control" id="phone" placeholder="Enter passward again">
                </div> -->


                <button type="submit" class="btn btn-primary">Submit</button>


            </form>
        </div>
    </div>
</div>



@endsection