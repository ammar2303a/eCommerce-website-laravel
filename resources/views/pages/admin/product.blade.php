@extends('layouts.admintemplate')

@section('adminContent')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
         <!-- Main content -->
         <section class="content">
          <h3 class="text-center">View & Manage Categories</h3>
         <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mt-5" data-toggle="modal" data-target="#exampleModal">
<i class="fa fa-plus" aria-hidden="true"></i> Add Productsa           
</button>
<button type="button" class="btn btn-primary mt-5" data-toggle="modal" data-target="#exampleModal">
 <i class="fa fa-plus" aria-hidden="true"></i> Import
</button>
<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-md-10">
      <table class="table table-bordered table-hover text-center mx-auto ">
        <thead>
          <tr>
            <th>Code</th>
            <th>Product Title</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Image</th>
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
          @foreach($product as $item)
    <tr>
            <td>{{$item->pid}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->categoryName}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->image}}</td>
            <td>Edit| Delete</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</section>

</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter Product Detail</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/addproduct" method="post" enctype="multipart/form-data" >
        @csrf
      <div class="form-group">
               
      <div class="modal-body">
       
                <label for="" class="text-primary">Product title</label>
                <input type="text" class="form-control" name="p_title">
            </div>
            <div class="form-group">
               
      <div class="modal-body">
       
                <label for="" class="text-primary">Price</label>
                <input type="text" class="form-control" name="p_price">
            </div>
            <div class="modal-body">
       
       <label for="" class="text-primary">Quantity</label>
       <input type="text" class="form-control" name="p_quantity">
   </div>
   <div class="modal-body">
       
       <label for="" class="text-primary">Image</label>
       <input type="file" class="form-control" name="p_image">
   </div>
   <div class="modal-body">
       
       <label for="" class="text-primary">Category</label>
       <select name="p_category" id="" class="form-control">
        <option value="" dissabled selected>--Select--</option>
        @foreach($category as $item)
        <option value="{{$item->id}}">{{$item->CategoryName}}</option>
        @endforeach
       </select>
   </div>
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

@endsection