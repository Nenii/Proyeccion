  <script src="asserts/vendor/jquery/jquery.min.js"></script>
  <script src="asserts/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="asserts/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="asserts/js/sb-admin-2.min.js"></script>
  <script src="asserts/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="asserts/vendor/jquery/jquery.min.js"></script>
  <script src="asserts/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="asserts/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="asserts/js/rounded-counter/jquery.countdown.min.js"></script>
  <script src="asserts/js/rounded-counter/jquery.knob.js"></script>
  <script src="asserts/js/rounded-counter/jquery.appear.js"></script>
  <script src="asserts/js/rounded-counter/knob-active.js"></script>
  <script src="asserts/js/demo/datatables-demo.js"></script>
  <script src="asserts/vendor/jquery/jquery.min.js"></script>
  <script src="asserts/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="asserts/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="asserts/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
  <script src="asserts/js/Swal.js"></script>
  <script type="text/javascript">
  function myFunction() {
    const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  Toast.fire({
    icon: 'success',
    title: 'Buen trabajo'
  })
}
</script>
</body>
</html>
