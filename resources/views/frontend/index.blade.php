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

@endsection