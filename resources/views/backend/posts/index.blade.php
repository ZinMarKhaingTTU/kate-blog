@extends('layouts.backend')
@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="my-5">
            <h1 class="mt-4 d-inline">Posts</h1>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary float-end">Add Post</a>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Post Lists
            </div>
            <div class="card-body">
                <table id="" class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Title</th>
                            <th>photo</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody id="post_tbody">
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td><img src="{{ $post->photo }}" alt="" class="h-35 w-25"></td>
                            <td>
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <button class="btn btn-sm btn-danger delete" data-id="{{ $post->id }}"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</main>
<!-- Delete model-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header  bg-danger text-light">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Item Delete Comfirmation</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
         <h3 class="text-danger">Are you sure delete?</h3>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
          <form action="" method="POST" id="deleteForm">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <button type="submit" class="btn btn-danger">Yes</button>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#post_tbody').on('click','.delete',function(){
            var id = $(this).data('id');
            $('#deleteForm').prop('action','posts/'+id);
            $('#deleteModal').modal('show');
        })
    })
</script>
@endsection
