<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Welcome to Sistem RSUA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  {{-- <link href="{{ asset('admin/assets/img/logo.jpg') }}" rel="icon">
  <link href="{{ asset('admin/assets/img/logo.jpg') }}" rel="apple-touch-icon"> --}}

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

  {{-- select2 --}}
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link href="{{ asset('admin/assets/css/select2-custom.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          @include('result')
          <div class="row justify-content-center">
            <div class="col-md-5 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="#" class="logo d-flex align-items-center w-auto">
                  {{-- <img src="{{ url('admin/assets/img/logo.jpg') }}" alt=""> --}}
                  <span class="d-none d-lg-block">Sistem RSUA</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3 w-100">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">@yield('page-content-title')</h5>
                  </div>
                  @yield('page-content-body')                    
                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <!-- Vendor JS Files -->
  <script src="{{ asset('admin/assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  {{-- select2 --}}
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('admin/assets/js/main.js') }}"></script>
  <script>
      $(document).ready(function() {
          $('.select-picker').select2({});
          // for display myimg
          $('#myimg').change(function(){
              let reader = new FileReader();
              reader.onload = (e) => {
              $('#preview-myimg').attr('src', e.target.result);
              }
              reader.readAsDataURL(this.files[0]);
          });
      });
  </script>

</body>

</html>