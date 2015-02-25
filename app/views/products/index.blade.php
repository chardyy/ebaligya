@extends('layouts.main')

@section('content')

    <div id="admin">
        <h1>Products Admin Panel</h1><hr/>

        <p>You can create, view, and delete products.</p>

        <h2>Products</h2><hr/>

        <ul type="disc">
            @foreach($products as $product)
            <li>
                {{ HTML::image($product->image, $product->title, array('width' => '50')) }}
                {{ $product->title }} -
                {{ Form::open(array('url'=>'admin/products/destroy', 'class' => 'form-inline')) }}
                {{ Form::hidden('id', $product->id) }}
                {{ Form::submit('Delete') }}
                {{ Form::close() }} -

                {{ Form::open(array('url' => 'admin/products/toggle-availability', 'class' => 'form-inline')) }}
                {{ Form::hidden('id',$product->id) }}
                {{ Form::select('availability', array('1' => 'In Stock', '0' => 'Out of Stock'), $product->availability) }}
                {{ Form::submit('Update') }}
                {{ Form::close() }}
            </li>
            @endforeach
        </ul>

        <h2>Create New Product</h2><hr/>

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

        {{ Form::open(array('url' => 'admin/products/create', 'files' => true)) }}
        <p>
            {{ Form::label('category_id', 'Category') }}
            {{ Form::select('category_id', $categories) }}
        </p>

        <p>
            {{ Form::label('title') }}
            {{ Form::text('title') }}
        </p>

        <p>
            {{ Form::label('description') }}
            {{ Form::textarea('description') }}
        </p>

        <p>
            {{ Form::label('price') }}
            {{ Form::text('price', null, array('class' => 'form-price')) }}
        </p>

        <p>
            {{ Form::label('image', 'Choose an Image') }}
            {{ Form::file('image') }}
        </p>

        {{ Form::submit('Create Product', array('class' => 'secondary-cart-btn')) }}
        {{ Form::close() }}

    </div>
@stop