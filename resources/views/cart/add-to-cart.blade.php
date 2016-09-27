@extends('layouts.app')

@yield('content')

@section('content')

@if(Session::has('cart'))
<div class="row">
    <div class="col-md-8 col-md-offset-2 h1">Products Cart</div>

     <div class="col-md-8 col-md-offset-2">
     <table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Product Name</th>
      <th>Number of Products</th>
      <th>Product Price Total</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($products as $product)
    <tr>
      <th scope="row">#</th>
      <td>{{$product['item']['title']}}</td>
      <td>{{$product['qty']}}</td>
      <td>{{$product['price']}}</td>
      <td>
      	<div class="btn-group">
  		<a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="#">Action<span class="caret"></span></a>
  				<ul class="dropdown-menu">
    			  <li><a tabindex="-1" href="#">Reduce 1 Item</a></li>
				  <li><a tabindex="-1" href="#">Reduce All</a></li>
  				</ul>
		</div>
      </td>
    </tr>
    @endforeach
  </tbody>
  <td><strong class="btn btn-warning">Total Price : {{$totalPrice}}</strong></td>
</table> 
	<a href="#" class="col-md-12 btn btn-success">Check Out >></a>
</div>
</div>

@else
<div class="row">
    <div class="col-md-8 col-md-offset-2">No Items in Cart !!</div>
</div>
@endif

@endsection