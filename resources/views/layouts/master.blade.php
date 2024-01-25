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
    <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        ! function(a) {
            a.fn.datepicker.dates.ar = {
                days: ["الأحد", "الاثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة", "السبت", "الأحد"],
                daysShort: ["أحد", "اثنين", "ثلاثاء", "أربعاء", "خميس", "جمعة", "سبت", "أحد"],
                daysMin: ["ح", "ن", "ث", "ع", "خ", "ج", "س", "ح"],
                months: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر",
                    "نوفمبر", "ديسمبر"
                ],
                monthsShort: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر",
                    "نوفمبر", "ديسمبر"
                ],
                today: "هذا اليوم",
                rtl: 1
            }
        }(jQuery);

        $('.calender-button').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            clearBtn: false,
            todayHighlight: true,
            endDate: new Date(),
            startDate: new Date(2000, 1, 1),
            language: 'ar',
            rtl: true,
        }).on('changeDate', function(e) {
            var year = e.format('yyyy-mm-dd');
            window.location.href = "{{ url()->current() }}?published_at=" + year;
        });
    </script>
</body>

</html>
