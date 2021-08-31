@extends('front.layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-12" id="register">

            <div class="card col-md-8">
                <div class="card-body">

                    <h2 class="card-title">Masuk</h2>
                    <hr>

                    @if ( $errors->any() )

                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    @endif

                    @if ( session()->has('msg') )

                        <div class="alert alert-success">{{ session()->get('msg') }}</div>

                    @endif

                    <form action="/user/login" method="post">

                        @csrf

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" placeholder="Email" id="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" placeholder="Password" id="password"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-success btn-lg btn-block"> Masuk</button>
                        </div>

                        <div class="form-group text-center">
                            <h5>
                                Atau
                            </h5>
                        </div>

                        <div class="form-group">
                            <a href="{{  url('user/register') }}" class="btn btn-outline-info btn-lg btn-block">Daftar Disini</a>
                        </div>
                    </form>
                    
                </div>
            </div>


        </div>

    </div>
@endsection