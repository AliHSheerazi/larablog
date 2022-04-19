@extends('layouts.master')

@section('title','Category')

@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
        <h4 class="">Add Post</h4>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
            @endif
            <form method="post" action="{{ url('admin/add-post') }}">
                @csrf
                <div class="mb-3">
                    <label for="">Category Name</label>
                <select class="form-control" name="category_id" id="">
                    @foreach ($category as $cateitem)
                        <option value="{{ $cateitem->id }}">{{ $cateitem->name }}</option>
                    @endforeach
                </select>
                </div>
                <div class="mb-3">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control"  rows="5"></textarea>
                </div>
                <div class="mb-3">
                    <label for="">Youtube Iframe</label>
                    <input type="text" name="yt_iframe" class="form-control" />
                </div>
                <h6>SEO Tags</h6>
                <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" class="form-control"  rows="5"></textarea>
                </div>
                <div class="mb-3">
                    <label for="">Meta keywords</label>
                    <textarea name="meta_keyword" class="form-control"  rows="5"></textarea>
                </div>

                <h6>Status Mode</h6>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status"  />
                    </div>
                    <div class="col-md-8 mb-3">
                        <button type="submit" class="btn btn-primary float-end">Save Post</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection