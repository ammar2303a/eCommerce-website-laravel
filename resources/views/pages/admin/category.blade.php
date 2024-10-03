<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
@extends('layouts.admintemplate')

@section('adminContent')
   <!-- Right side column. Contains the navbar and content of the page -->
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
  Add Categories
</button>

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-md-10">
      <table border="1" style="width:80%; " class="text-center">
        <thead>
          <tr>
            <th>S.NO</th>
            <th>Category Name</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach(  $fetchCategory as $items)
          <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$items->CategoryName}}</td>
          @if($items->Status == "Active")
          <td style="color:green" >{{$items->Status}}</td>
          @else
          <td style="color:red">{{$items->Status}}</td>
          @endif
          <td><button type="button" class="fa fa-edit mt-5 btnedit" data-toggle="modal" data-target="#editModal" value="{{$items->id}}"></button>
  </td>
          @endforeach
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</section>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enter Category Detail</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/addcCategory">
        @csrf
      <div class="form-group">
               
      <div class="modal-body">
       
                <label for="" class="text-primary">Category Name</label>
                <input type="text" class="form-control" name="category_name">
            </div>
            <div class="form-group">
               
      <div class="modal-body">
       
                <label for="" class="text-primary">Category Description</label>
                <textarea type="text" class="form-control" name="category_desc"></textarea>
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

</div>
<!-- --------------- -->

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Category Detail</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/updcategory">
        @csrf
        <input type="hidden" name="edit_category_id" id="edit_category_id">
        <div class="modal-body">
      <div class="form-group">
               
                <label for="" class="text-primary">Category Name</label>
                <input type="text" class="form-control" name="edit_category_name"  id="edit-category_name">
            </div>
            <div class="form-group">
               
               <div class="modal-body">
                
                         <label for="" class="text-primary">Category Description</label>
                         <textarea type="text" class="form-control" name="edit_category_desc"></textarea>
                     </div>
                 
            <div class="form-group">
               
                <label for="" class="text-primary">Status</label>
                <select class="form-control" name="category_status" id="category_status">
                  <option value="Active">Active</option>
                  <option value="InActive">InActive</option>
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

</div>

<script>
 $(document).ready(function(){
  $('.btnedit').on('click', function(){
    var cat_id = $(this).val();
    // alert(cat_id);
    $.ajax({
      url: 'editCategory/'+cat_id,
      method: 'GET',
      success: function(data){
        console.log(data);
        $.each(data, function(key, value){
          // console.log(value['id'])
          $('#edit-category_name').val(value['CategoryName'])
          $('#edit_category_desc').val(value['Description'])
          $('#edit_category_id').val(value['id'])
          $('#category_status').val(value['Status'])
        })
      }
    })
  })
 })
 
</script>
@endsection