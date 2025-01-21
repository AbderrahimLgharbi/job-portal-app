<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>General Dashboard &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}">

    @notifyCss

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">


            @include('admin.layouts.sidebar')

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>



            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; {{ date('Y') }} <div class="bullet"></div> Design By <a target="_blank"
                        href="https://portfolio-lgharbi.vercel.app/">Abderrahim LGHARBI</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('admin/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/stisla.js ') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js ') }}"></script>

    <x-notify::notify />
    @notifyJs

    <!-- Template JS File -->
    <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom.js ') }}"></script>

    <!-- JS Libraies -->
    <script src="assets/modules/sweetalert/sweetalert.min.js"></script>

    <script>
        $(".delete-industry").on('click', function(e) {
            e.preventDefault();
            swal({
                    title: 'Are you sure?',
                    text: 'Once deleted, you will not be able to recover this imaginary file!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        let url = $(this).attr('href'); // Get URL from 'href' attribute

                        $.ajax({
                            method: 'DELETE', // HTTP method
                            url: url, // URL for the delete operation
                            data: {
                                _token: "{{ csrf_token() }}"
                            }, // CSRF token for security
                            success: function(response) {
                                window.location.reload(); // Reload page on success
                            },
                            error: function(xhr, status, error) {
                                console.log(xhr); // Log error for debugging
                                swal(eeror.message, {
                                    icon: 'error', // Display success message
                                });
                            }
                        });


                    }
                });
        });
    </script>
</body>

</html>
