@extends('layouts.main')

@section('content')

    <div id="admin">
        <h1>Categories Admin Panel</h1><hr/>

        <p>You can create, view, and delete categories.</p>

        <h2>Categories</h2><hr/>

        <ul type="disc">
            @foreach($categories as $category)
                <li>
                    {{ $category->name }} -
                    {{ Form::open(array('url'=>'admin/categories/destroy', 'class' => 'form-inline')) }}
                    {{ Form::hidden('id', $category->id) }}
                    {{ Form::submit('Delete') }}
                    {{ Form::close() }}
                </li>
            @endforeach
        </ul>

        <h2>Create New Category</h2><hr/>

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

        {{ Form::open(array('url' => 'admin/categories/create')) }}
            <p>
            <div class="form-group">
                {{ Form::label('name') }}
                {{ Form::text('name') }}
            </div>
            </p>
            {{ Form::submit('Create Category', array('class' => 'secondary-cart-btn')) }}
        {{ Form::close() }}

    </div>
@stop