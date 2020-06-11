
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                @if (session('notification'))
                    <div class="alert alert-success">
                        {{ session('notification') }}
                    </div>
                @endif

            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                
                </div>
            </div>
        </div>
    </div>

                <br/>

                <div>
                <a href="{{ URL::route('create.post') }}">Create New Post</a>
                </div>
             

                @if ($posts ?? '')

                <br/>

                <div>

                Filter:

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Publication Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post) 
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->description }}</td>
                            <td>{{ $post->publication_date }}</td>
                            <td>

                            @can('destroy_post')
                            <a href="{{ route('posts.destroy', $post->id) }}">Eliminar</a>
                            @else
                                -
                            @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                </div>

                {{ $posts->links() }}

                @endif

</div>

@endsection

