<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {{ Form::label('product_name', 'Nama Produk') }}
    {{ Form::text('name',$product->name,['class'=>'form-control border-input','placeholder'=>'Kimchi']) }}
    <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
    {{ Form::label('price', 'Harga') }}
    {{ Form::text('price',$product->price,['class'=>'form-control border-input','placeholder'=>'25000']) }}
    <span class="text-danger">{{ $errors->has('price') ? $errors->first('price') : '' }}</span>
</div>

<div class="form-group {{ $errors->has('stock') ? 'has-error' : '' }}">
    {{ Form::label('stock', 'Stok') }}
    {{ Form::text('stock',$product->stock,['class'=>'form-control border-input','placeholder'=>'10']) }}
    <span class="text-danger">{{ $errors->has('stock') ? $errors->first('stock') : '' }}</span>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    {{ Form::label('description', 'Deskripsi') }}
    {{ Form::textarea('description',$product->description,['class'=>'form-control border-input','placeholder'=>'Deskripsi']) }}
    <span class="text-danger">{{ $errors->has('description') ? $errors->first('description') : '' }}</span>
</div>

<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    {{ Form::label('file','File') }}
    {{ Form::file('image', ['class'=>'form-control border-input', 'id' => 'image']) }}
    <div id="thumb-output"></div>
    <span class="text-danger">{{ $errors->has('image') ? $errors->first('description') : '' }}</span>
</div>