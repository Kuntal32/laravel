<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="description" content="">
	  <meta name="author" content="">
	  <title>Smart Adminpanel</title>
	  <!-- Bootstrap core CSS-->
	  <link href="{{ asset('public/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
	  <!-- Custom fonts for this template-->
	  <link href="{{ asset('public/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
	  <!-- Page level plugin CSS-->
	  <link href="{{ asset('public/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
	  <!-- Custom styles for this template-->
	  <link href="{{ asset('public/css/sb-admin.css') }}" rel="stylesheet">
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
	 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Smart Admin</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
     @guest
    
      @else
        <!--sidebar-->
       @section('sidebar')
           <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{ route('home') }}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Cms Pages</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="{{ route('page') }}">Page List</a>
            </li>
            <li>
              <a href="{{ route('page_create') }}">Create Page</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#imageGallery" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Image Galary</span>
          </a>
          <ul class="sidenav-second-level collapse" id="imageGallery">
            <li>
              <a href="{{ route('page') }}">Page List</a>
            </li>
            <li>
              <a href="{{ route('page_create') }}">Create Page</a>
            </li>
          </ul>
        </li>
       
      </ul>
       <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
        @show
      @endguest
      <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
             @else

            <li class="nav-item">
	          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
	            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
       		</li>
                
            @endguest
        </ul>

    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
        @include('admin.flash_message')
    	  @yield('content')
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
       
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
           
    			<a class="btn btn-primary" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
          </div>
        </div>
      </div>
    </div>
     <!-- Scripts -->
     <script src="{{ asset('public/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('public/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Page level plugin JavaScript-->
   
    <script src="{{ asset('public/vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('public/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('public/js/sb-admin.min.js') }}"></script>
    <!-- Custom scripts for this page-->
    <script src="{{ asset('public/js/sb-admin-datatables.min.js') }}"></script>
    
    <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>
    <script>
    ClassicEditor
        .create( document.querySelector( '#content' ))
        .catch( error => {
            console.error( error );
        } );
    </script>
    <style>
.ck-editor__editable {
    min-height: 200px;
    min-width:1067px;
}
</style>
  </div>
</body>
</html>