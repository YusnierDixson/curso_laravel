@extends('layouts.app')
@section('content')
<div class="container">
    @foreach ($posts as $post)
    <div class="card mb-4" style="width: 18rem;">
       <div class="card-body">
         <h5 class="card-title">{{ $post->title }}</h5>

         <p class="card-text">{{ $post->content }}</p>

       </div>
    </div>
    @endforeach
    {{ $posts->links() }}

</div>

@endsection
