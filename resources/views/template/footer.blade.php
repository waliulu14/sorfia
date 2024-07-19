<!-- content-wrapper ends -->
<!-- partial:partials/_footer.html -->
<footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
              Copyright © <span id="copyright-year"></span>.
              <a href="" target="_blank">Toko Parfum</a>
              All rights reserved.
            </span>
    </div>
    <div class="d-sm-flex justify-content-center justify-content-sm-between">

    </div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<!-- untuk tahun coppy -->


<script>
    document.addEventListener("DOMContentLoaded", function () {
        var currentYear = new Date().getFullYear();
        var copyrightElement = document.getElementById("copyright-year");
        if (copyrightElement) {
            copyrightElement.textContent = currentYear;
        }
    });
</script>


<!-- tanggal  -->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var today = new Date();
        var day = today.getDate();
        var month = today.toLocaleString('default', { month: 'short' });
        var year = today.getFullYear();
        var formattedDate = day + " " + month + " " + year;
        var buttonElement = document.getElementById("dropdownMenuDate2");
        if (buttonElement) {
            buttonElement.innerHTML = '<i class="mdi mdi-calendar"></i> Today (' + formattedDate + ')';
        }
    });
</script>


<!-- ganti gambar dashboard -->

<!-- <script>
  document.addEventListener("DOMContentLoaded", function () {
    var images = [".backend/images/dashboard/slider1.png",".backend/images/dashboard/people.png", ".backend/images/dashboard/people2.png", ".backend/images/dashboard/people3.png"];
    var currentIndex = 0;
    var imageElement = document.querySelector(".card-people img");

    function changeImage() {
      currentIndex = (currentIndex + 1) % images.length;
      imageElement.src = images[currentIndex];
    }

    setInterval(changeImage, 5000);
  });
</script> -->

<!-- Core JS -->
<script src="{{ asset('backend/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- Plugin JS for this page -->
<script src="{{ asset('backend/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('backend/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('backend/js/dataTables.select.min.js') }}"></script>
<!-- End plugin JS for this page -->
<!-- Custom JS -->
<script src="{{ asset('backend/js/off-canvas.js') }}"></script>
<script src="{{ asset('backend/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('backend/js/template.js') }}"></script>
<script src="{{ asset('backend/js/settings.js') }}"></script>
<script src="{{ asset('backend/js/todolist.js') }}"></script>
<script src="{{ asset('backend/js/dashboard.js') }}"></script>
<script src="{{ asset('backend/js/Chart.roundedBarCharts.js') }}"></script>




<!-- End custom js for this page-->
</body>

</html>
