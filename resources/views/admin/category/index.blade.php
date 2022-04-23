@extends('layouts.master')

@section('title','Category')

@section('content')
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="{{ url('admin/delete-category') }}" >
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <input type="hidden" name="category_delete_id" id="category_id">
                <h5>Are you sure you want to delete category ?</h5>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Delete Category</button>
              </div>
        </form>
      </div>
    </div>
  </div>
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4>View Cataegory
                <a href="{{ url('admin/add-category') }}" class="btn btn-primary btn-sm float-end">Add Category</a>
            </h4>
        </div>
        <div class="card-body">

            @if(session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <table id="myDatatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <img src="{{ asset('uploads/category/'. $item->image ) }}" width="50px" height="50px" alt="">
                        </td>
                        <td>{{ $item->status == '1' ? 'hiddend' : 'Shown' }}</td>
                        <td>
                            <a href="{{ url('admin/edit-category/'.$item->id) }}" class="btn btn-success">Edit</a>
                        </td>
                        <td>
                            {{-- <a href="{{ url('admin/delete-category/'.$item->id) }}" class="btn btn-danger">Delete</a> --}}
                            <button value="{{ $item->id }}" type="button" class="btn btn-danger deletecategorybutton">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
   
    
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $(document).on('click','.deletecategorybutton', function(e){
            e.preventDefault();

            var category_id =  $(this).val();
            $('#category_id').val(category_id);
            $('#deletemodal').modal('show');
        });
    });
</script>
@endsection