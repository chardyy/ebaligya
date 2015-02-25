@extends('layouts.main')

@section('content')

    <div id="new-account">
        <h2>Create New Account</h2>
        <hr>

        @if($errors->has())
            <div id="form-errors">
                <p>The following errors have occured: </p>

                <ul type="disc">
                    @foreach($errors->all()  as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{ Form::open(array('url'=>'users/create')) }}
        <p>
            {{ HTML::image('img/user-icon.gif', 'User') }}
            {{ Form::text('firstname', null, ['placeholder' => 'Firstname']) }}
        </p>

        <p>
            {{ HTML::image('img/user-icon.gif', 'User') }}
            {{ Form::text('lastname', null, ['placeholder' => 'Lastname']) }}
        </p>

        <p>
            {{ HTML::image('img/email.gif', 'Email Address') }}
            {{ Form::text('email', null, ['placeholder' => 'E-mail']) }}
        </p>
        <p>
            {{ HTML::image('img/password.gif', 'Password') }}
            {{ Form::password('password', ['placeholder' => 'Password']) }}
        </p>
        <p>
            {{ HTML::image('img/password.gif', 'Password') }}
            {{ Form::password('password_confirmation', ['placeholder' => 'Confirm Password']) }}
        </p>
        {{ Form::submit('Create New Account',array('class' => 'secondary-cart-btn')) }}
        {{ Form::close() }}
    </div>

@stop