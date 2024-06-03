@extends('template.app')

@section('vite_head')
    @vite('resources/css/auth/login.css')
@endsection

@section('content')
<div class="container">
    <div class="row form__padding-top">
        <div class="col s12 m6 offset-m3 ">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Login</span>
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate" name="email" required>
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate" name="password" required>
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Login
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
