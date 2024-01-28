<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <x-layouts.head />
</head>

<body>

    <x-layouts.header />

    @yield('content')

    <!-- Footer -->
    <footer class="text-center mt-5">
        <p>&copy; {{ config('app.name') }} {{ date('Y') }}. جميع الحقوق محفوظة.</p>
    </footer>

    <!-- Add Bootstrap JS and Popper.js -->
    <script src="{{ asset('assets/js/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}?123"></script>
    <script>
        setInterval(() => {
            window.scrollTo(0, window.scrollY);
        }, 100);

        $('.calender-button').datepicker({
            format: 'yyyy',
            viewMode: 'years',
            minViewMode: 'years',
            autoclose: true,
            clearBtn: true,
            todayHighlight: false,
            endDate: new Date(),
            language: 'ar',
        }).on('changeDate', function(e) {
            var year = e.format('yyyy');
            window.location.href = "{{ url()->current() }}?published_at=" + year;
        });

        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (currentScrollPos <= 30) {
                $('header').removeClass('header-scroll');
                $('.header-placeholder').removeClass('header-placeholder-scroll');
            } else {
                $('header').addClass('header-scroll');
                $('.header-placeholder').addClass('header-placeholder-scroll');
            }
            prevScrollpos = currentScrollPos;
        };
    </script>
    <script>
        $("body").on("click", ".view-report", function() {
            var link = $(this).data('link');
            $("#legacy-link").attr("pdf-link", link);
            var link = "https://docs.google.com/gview?url=" + link + "&embedded=true";
            $("#viewer-iframe").hide();
            $("#loading").show();
            $("#viewer-iframe").attr('src', link).on('load', function() {
                $("#loading").hide();
                $("#viewer-iframe").show();
            });
        });

        $("body").on("click", "#legacy-link", function() {
            var link = $(this).attr('pdf-link');

            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                window.open(link, '_blank');
                return;
            }

            $("#viewer-iframe").hide();
            $("#loading").show();
            $("#viewer-iframe").attr('src', link).on('load', function() {
                $("#loading").hide();
                $("#viewer-iframe").show();
            });
        });
    </script>
</body>

</html>
