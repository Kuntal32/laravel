@extends('admin.layouts.csgo')

@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Page list</li>
      </ol>
   
       <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Page List</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th>Created</th>
                 <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Title</th>
                  <th>Content</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
              @foreach($pages as $page)
                <tr>
                  <td>{{ $page->name }}</td>
                  <td>{{ $page->title }}</td>
                  <td>{{ $page->content }}</td>
                  <td>{{ $page->created_at }}</td>
                  <td><a class="btn btn-primary" href="{{ route('edit_page', $page->page_id) }}">Edit</a></td>
                </tr>
               @endforeach
              </tbody>
            </table>
          </div>
        </div>
       
      </div>

    

@endsection
