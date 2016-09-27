@extends('layouts.app')

@yield('content')

@section('content')
<div class="container marketing">
<div class="row">
    <div class="col-lg-6 h1">Products</div>
    <div class="col-lg-6">
       <p class="pull-right"><a class="btn btn-default" href="{{url('admin/products/create')}}" role="button">Create New Products</a></p>
    </div>
</div>

          <!-- Three columns of text below the carousel -->
          @foreach ($products->chunk(3) as $productchunk)
          <div class="row">
            @foreach($productchunk as $value)
            <div class="col-lg-4 text-center">
              <img class="col-lg-12 img-thumbnail" src="<?php echo url('/uploads') ?>/<?php echo $value->photo;?> " alt="Generic placeholder image" width="140" height="140">
              <h2><?php echo $value->title; ?></h2>
              <p><?php echo $value->descript; ?></p>
              <p class="well">$ <?php echo $value->price; ?></p>
              <p><a class="btn btn-default" href="{{route('AddtoCart', ['id'=>$value->id])}}" role="button">Add to Cart &raquo;</a></p>
            </div><!-- /.col-lg-4 -->
            @endforeach
          </div><!-- /.row -->
          @endforeach
@endsection


