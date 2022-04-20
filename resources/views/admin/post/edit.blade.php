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
            <form method="post" action="{{ url('admin/edit-post/'.$post->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Category Name</label>
                <select class="form-control" name="category_id" id="">
                    <option >--Select Category --</option>
                    @foreach ($category as $cateitem)
                        <option value="{{ $cateitem->id }}" {{ $post->category_id == $cateitem->id ? 'Selected' : '' }} >{{ $cateitem->name }}</option>
                    @endforeach
                </select>
                </div>
                <div class="mb-3">
                    <label for="">Post Name</label>
                    <input type="text" name="name" value="{{ $post->name }}" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Slug</label>
                    <input type="text" name="slug" value="{{ $post->slug }}" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Description</label>
                    <textarea name="description" id="Mysummernote" class="form-control"  rows="5">{{ $post->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="">Youtube Iframe</label>
                    <input type="text" name="yt_iframe" value="{{ $post->yt_iframe }}" class="form-control" />
                </div>
                <h6>SEO Tags</h6>
                <div class="mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title" value="{{ $post->meta_title }}" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="">Meta Description</label>
                    <textarea name="meta_description" class="form-control"  rows="5">{{ $post->meta_description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="">Meta keywords</label>
                    <textarea name="meta_keyword" class="form-control"  rows="5">{{ $post->meta_keyword }}</textarea>
                </div>

                <h6>Status Mode</h6>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" {{ $post->status == '1' ? 'checked' : '' }} />
                    </div>
                    <div class="col-md-8 mb-3">
                        <button type="submit" class="btn btn-primary float-end">Update Post</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection