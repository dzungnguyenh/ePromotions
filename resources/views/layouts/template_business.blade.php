@include ('layouts.header')
  <!-- Left side column. contains the logo and sidebar -->
  @include ('layouts.left_bar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      @yield ('main-content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
@include ('layouts.footer')
