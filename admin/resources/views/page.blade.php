@extends('layouts.csgo')

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
                  <th>Description</th>
                  <th>Created</th>
                  <th>Edited</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Created</th>
                  <th>Edited</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                </tr>
               
              </tbody>
            </table>
          </div>
        </div>
       
      </div>

    

@endsection
