<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | Test</title>

    <!-- Bootstrap -->
    <link href="{{ URL::asset('assets/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ URL::asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ URL::asset('assets/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{ URL::asset('assets/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
    <!-- Add More Css -->
    <!-- Select2 -->
    <link href="{{ URL::asset('assets/select2/dist/css/select2.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ URL:: asset('css/custom.css') }}" rel="stylesheet">
    <style>
		a.edit-btn, a.delete-btn{
			margin: 0px; padding: 0px 5px;
		}
	</style>
    @stack('css')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentellela Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            @include('layouts.includes.quickinfo')
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            @include('layouts.includes.sidebar_menu')
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            @include('layouts.includes.menu_footer_buttons')
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        @include('layouts.includes.top_nav')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>
                      @yield('page-title')
                      <small>
                          @yield('page-desc')
                      </small>
                  </h3>
              </div>

             @include('layouts.includes.search')
            </div>
            <div class="clearfix"></div>

            <div class="row">
            	<div class="col-md-12 col-sm-12 col-xs-12">
               	 	<div class="x_panel">
               	 		<div class="x_title">
							<h2>@yield('widget-title')<small>@yield('widget-desc')</small></h2>
							@yield('actions')
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
                          		<p class="text-muted font-13 m-b-30">@yield('table-description')</p>
								@yield('content')
						</div>
					</div>              
				</div>
			</div>
		</div>
	</div>
    <!-- /page content -->

        <!-- footer content -->
        @include('layouts.includes.footer')
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src=" {{ URL::asset('assets/jquery/dist/jquery.min.js') }} "></script>
    <!-- Bootstrap -->
    <script src="{{ URL::asset('assets/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ URL::asset('assets/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ URL::asset('assets/nprogress/nprogress.js') }}"></script>
    <!-- Datatables -->
    <script src="{{ URL::asset('assets/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ URL::asset('assets/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ URL::asset('assets/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ URL::asset('assets/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ URL::asset('assets/datatables.net-scroller/js/datatables.scroller.min.js') }}"></script>
    <script src="{{ URL::asset('assets/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/pdfmake/build/vfs_fonts.js') }}"></script>
    
    <!-- Add More Template Scripts -->
    <!-- Select2 -->
    <script src="{{ URL::asset('assets/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- validator -->
    <script src="{{ URL::asset('assets/validator/validator.min.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="js/custom.js"></script>
    @stack('scripts')

    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        var table = $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
    
    <!-- Select2 -->
    <script>
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Select an Option",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
    </script>
    <!-- /Select2 -->
  </body>
</html>