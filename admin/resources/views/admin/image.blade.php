@extends('admin.layouts.csgo')

@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Image list</li>
      </ol>
   
       <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Image List</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
              @foreach($images as $image)
                <tr>
                  <td>{{ $image->title }}</td>
                  <td>{{ $image->description }}</td>
                  <td><img src="{{ URL::to('public/images/'.$image->image) }}" width="60" height="60"/></td>
                  <td>{{ $image->created_at }}</td>
                  <td><a class="btn btn-primary" href="{{ route('ImageEdit', $image->image_id) }}">Edit</a>  <a class="btn btn-danger"  data-toggle="modal" data-target="#alertimageModal" onClick="modal('{{$image->image_id}}','{{$image->image}}');" >Delete</a></td>
                </tr>
               @endforeach
              </tbody>
            </table>
          </div>
        </div>
       
      </div>

    <script type="text/javascript">
     function modal(id,image_name){
      $('#image_id_modal').val(id);
      $('#image_name').val(image_name);
     }

    </script>

@endsection
