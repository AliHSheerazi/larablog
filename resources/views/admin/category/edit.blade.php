@extends('layouts.master')

@section('title','Category')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
        <h4 class="">Add Category</h4>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
            @endif
            <form method="post" action="{{ url('admin/edit-category/'.$category->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">category Name</label>
                    <input type="text" name="name" value="{{ $category->name }}" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{ $category->slug }}" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control"  rows="5">{{ $category->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="">Image</label>
                    <input type="file" name="image" value="{{ $category->image }}" class="form-control" />
                </div>
                <h6>SEO Tags</h6>
                <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ $category->meta_title }}" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" class="form-control"  rows="5">{{ $category->meta_description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="">Meta keywords</label>
                    <textarea name="meta_keyword" class="form-control"  rows="5">{{ $category->meta_keyword }}</textarea>
                </div>

                <h6>Status Mode</h6>
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label for="">Navebar Status</label>
                        <input type="checkbox" name="navebar_status" {{ $category->navbar_status == '1' ? 'checked' : '' }}  />
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked' : '' }} />
                    </div>
                    <div class="col-md-6 mb-3">
                    </div>
                    <div class="col-md-2 mb-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">ypdate Category</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection