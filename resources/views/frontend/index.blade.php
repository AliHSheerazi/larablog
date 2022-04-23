@extends('layouts.app')

@section('title', "BLOG")
@section('content')

<div class="bg-danger py-5">
 <div class="container">
     <div class="row">
         <div class="col md-12">
            <div class="owl-carousel category-carousel owl-theme">
                @foreach ($category as $cate_item)
                    <div class="item">
                        <a href="{{ url('tutorial/' .$cate_item->slug) }}" class="text-decoration-none">
                            <div class="card">
                                <img src="{{ asset('uploads/category/'.$cate_item->image) }}" alt="Image">
                                <div class="card-body text-center">
                                    <h5 class="text-dark">{{ $cate_item->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
         </div>
     </div>
 </div>
</div>

<div class="py-1 bg-gray">
    <div class="container">
        <div class="row">
            <div class="border text-center p-3">
                <h3>Advertise here</h3>
            </div>
        </div>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>AH Blogging</h4>
                <div class="underline"></div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>All Categories</h4>
                <div class="underline"></div>
            </div>
            @foreach ($category as $cateitem)
                <div class="col-md-3">
                    <div class="card card-body mb-3">
                        <a href="{{ url('tutorial/' . $cateitem->slug) }}" class="text-decoration-none">
                            <h5 class="text-dark mb-0" >{{ $cateitem->name }}</h5>
                        </a>    
                    </div>    
                </div>    
            @endforeach
            
        </div>
    </div>
</div>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Latest Posts</h4>
                <div class="underline"></div>
            </div>
            <div class="col-md-8">
                @foreach ($latest_post as $postitem)
                    <div class="card card-body mb-3">
                        <a href="{{ url('tutorial/'. $postitem->category->slug .'/' . $postitem->slug) }}" class="text-decoration-none">
                            <h5 class="text-dark mb-0" >{{ $postitem->name }}</h5>
                        </a>    
                    </div>    
                @endforeach
            </div>
            <div class="col-md-4">
                <div class="border text-center p-3">
                    <h3>Advertise here</h3>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection