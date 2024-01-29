<!-- Core JS -->
<!-- build:js dashboard-assets/vendor/js/core.js -->
<script src="{{ asset('dashboard-assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('dashboard-assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('dashboard-assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('dashboard-assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

<script src="{{ asset('dashboard-assets/vendor/libs/hammer/hammer.js') }}"></script>

<script src="{{ asset('dashboard-assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>

<script src="{{ asset('dashboard-assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('dashboard-assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="{{ asset('dashboard-assets/vendor/libs/toastr/toastr.js') }}"></script>
<script src="{{ asset('dashboard-assets/vendor/libs/select2/select2.js') }}" defer></script>
<script src="{{ asset('dashboard-assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('dashboard-assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('dashboard-assets/js/dashboards-analytics.js') }}"></script>

{{-- Check if there any success messages and send them by alerts --}}
{{-- Check if the user came from back button and if so don't show the alert --}}
@if (session('success'))
    <script>
        $(document).ready(function() {
            if (!(window.performance && window.performance.navigation.type === window.performance.navigation
                    .TYPE_BACK_FORWARD)) {
                Swal.fire({
                    title: 'تم بنجاح',
                    html: '{!! session('success') !!}',
                    icon: 'success',
                    confirmButtonText: 'حسنا'
                });
            }
        });
    </script>
@endif
@if (session('error'))
    <script>
        $(document).ready(function() {
            if (!(window.performance && window.performance.navigation.type === window.performance.navigation
                    .TYPE_BACK_FORWARD)) {
                Swal.fire({
                    title: 'لم يتم',
                    text: '{{ session('error') }}',
                    icon: 'error',
                    confirmButtonText: 'حسنا'
                });
            }
        });
    </script>
@endif
@auth
    <script>
        function checkAll(category) {
            $("#" + category + " input[type=checkbox]").prop('checked', true);
        }
        $(document).ready(function() {
            // Add active class to the current page in the sidebar
            var url = window.location.href;
            // Remove any extra parameters from the url
            url = url.split("?")[0];
            var activePage = url;
            $('.menu-inner .menu-link').each(function() {
                var linkPage = this.href;
                if (activePage == linkPage) {
                    $(this).addClass("active");
                    $(this).parents('.menu-item').addClass("active");
                    $(this).parents('.menu-item').find('.menu-link').addClass("active");
                    $(this).parents('.menu-item').find('.menu-link').attr("aria-expanded", "true");
                    $(this).parents('.menu-item').find('.menu-toggle').parent(".menu-item").addClass(
                        "open");
                }
            });

            $(".select2").select2({
                maintainOrder: true
            });

            $(".select2").on("select2:select", function(evt) {
                var element = evt.params.data.element;
                var $element = $(element);

                $element.detach();
                $(this).append($element);
                $(this).trigger("change");
            });

            $(".remove-btn").click(function() {
                event.preventDefault();
                var btn = $(this);
                Swal.fire({
                    title: "هل أنت متأكد؟ سيتم حذف جميع البيانات المرتبطة بهذا العنصر !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: "نعم",
                    cancelButtonText: "لا",
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log(btn.closest("form").attr("action"));
                        // console.log(btn.parent("form").attr("action"));
                        btn.parent("form").submit();
                        btn.closest("form").submit();
                    }
                });
            });

            // On click any submit button disable it to prevent double click
            $("form").submit(function() {
                $(this).find(":submit").attr('disabled', 'disabled');
            });
        });
    </script>
@endauth
<style>
    #template-customizer {
        display: none !important;
    }
</style>
<script>
    setInterval(function() {
        $("#template-customizer").remove();
    }, 1000);
</script>
