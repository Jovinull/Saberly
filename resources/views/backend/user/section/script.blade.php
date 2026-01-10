<!-- template js files -->
<script src="{{ asset('frontend/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/isotope.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('frontend/js/fancybox.js') }}"></script>
<script src="{{ asset('frontend/js/chart.js') }}"></script>
<script src="{{ asset('frontend/js/doughnut-chart.js') }}"></script>
<script src="{{ asset('frontend/js/bar-chart.js') }}"></script>
<script src="{{ asset('frontend/js/line-chart.js') }}"></script>
<script src="{{ asset('frontend/js/datedropper.min.js') }}"></script>
<script src="{{ asset('frontend/js/emojionearea.min.js') }}"></script>
<script src="{{ asset('frontend/js/animated-skills.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.MultiFile.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-te-1.4.0.min.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>

<!----Sweet Alert---->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.11.3/dist/echo.js"></script>

<script type="application/json" id="flash-messages">
{!! json_encode([
  'success' => session('success'),
  'error' => session('error'),
], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) !!}
</script>

<script>
  const flashEl = document.getElementById('flash-messages');
  const flash = flashEl ? JSON.parse(flashEl.textContent || '{}') : {};

  const flashSuccess = flash.success || null;
  const flashError = flash.error || null;

  if (flashSuccess) {
    Swal.fire({
      toast: true,
      position: 'top-end',
      icon: 'success',
      title: flashSuccess,
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
    });
  } else if (flashError) {
    Swal.fire({
      toast: true,
      position: 'top-end',
      icon: 'error',
      title: flashError,
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
    });
  }
</script>

<script src="{{ asset('customjs/wishlist/index.js') }}"></script>
<script src="{{ asset('customjs/cart/index.js') }}"></script>

@stack('scripts')
