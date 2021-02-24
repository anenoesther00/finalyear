@include('layouts.partials.header')
<!--silder bar-->


<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    @include('layouts.partials.sidebar')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @include('layouts.partials.topbar')
       

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
        
@yield('content')
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      @include('layouts.partials.footer')
      <!--endfooter-->