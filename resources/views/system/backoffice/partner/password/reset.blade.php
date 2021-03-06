@extends('layouts.backoffice.app') 
@section('css') @stop 

@section('body')

<div class="register-container full-height sm-p-t-30">
    <div class="d-flex justify-content-center flex-column full-height ">
        <div class="logo_text"><img src="{{ asset('img/logo.png') }}" alt="{{ config('app.name', 'BAB Casa') }}" height="60">  </div> 
        <h3>Réinitialiser le mot de passe </h3> 
        <form id="form-register" class="p-t-15" role="form" action="{{ url('password/reset') }}" method="post">
            @csrf
             {{$errors}}
            <div class="form-group-attached"> 
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="form-group form-group-default required">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" class="form-control">
                            <label class='error' for='email'></label>
                        </div>
                    </div>  
                </div>
                <input type="hidden" name="token" value="{{$token}}">
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="form-group form-group-default required">
                            <label for="password">Nouveaux mot de passe</label>
                            <input type="password" id="password" name="password" class="form-control">
                            <label class='error' for='password'>
                                @if($errors->has('password'))
                                    {{ $errors->first('password') }}
                                @endif
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-group-default required">
                            <label for="password_confirmation">Mot de passe confirmation</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"> 
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary btn-cons m-t-10" type="submit"> 
                Réinitialiser le mot de passe
            </button>
      
        </form>
    </div>
</div>
 

@stop 

@section('script') @stop
