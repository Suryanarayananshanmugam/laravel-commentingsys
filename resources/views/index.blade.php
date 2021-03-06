@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Image </th>
                    <th>Date</th>
                    <th>Action</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->img }}</td>
                    <td>{{ $post->created_at }}</td>
                    
                    <td>
                        <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Show Post</a>
                    </td>
                    <td>
                        <a href="{{ route('post.update', $post->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <a href="{{ route('post.delete', $post->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection