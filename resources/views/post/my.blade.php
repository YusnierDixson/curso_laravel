@extends('layouts.app')
@section('content')
<div class="container">
    @foreach ($posts as $post)
    <div class="card mb-4" style="width: 18rem;">
       <div class="card-body">
         <h5 class="card-title">{{ $post->title }}</h5>

         <p class="card-text">{{ $post->content }}</p>
         <a href="{{ route('post.show',['post'=>$post]) }}" class="btn btn-primary" >Read more</a>
         <a href="{{ route('post.edit',['post'=>$post]) }}" class="btn btn-primary ml-2" >Editar</a>
         <form action="{{ route('post.destroy',['post'=>$post]) }}" method="post">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger">Detele</button>
        </form>
       </div>

    </div>
    @endforeach


</div>

@endsection
