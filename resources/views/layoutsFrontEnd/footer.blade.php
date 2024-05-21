<?php 
  $categories = DB::table('categories')->where('active', 1)->get();
?>
<!-- Footer -->
<footer class="text-center text-lg-start bg-white text-muted mt-3 ">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div class="d-flex">
      <a href="#" class="me-4 link-secondary">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#" class="me-4 link-secondary">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#" class="me-4 link-secondary">
        <i class="fab fa-google"></i>
      </a>
      <a href="#" class="me-4 link-secondary">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="#" class="me-4 link-secondary">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="# q" class="me-4 link-secondary">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-4 col-lg-4 col-xl-4 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-3">
            <i class="fas fa-gem me-3 text-secondary"></i>The Mini Mart
          </h6>
          <p>
            Thanks for visit our site, buying, and thanks for supported.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-5 col-lg-5 col-xl-5 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-3">
            Products
          </h6>
          @foreach($categories as $category)
          <b>
            <a href="#" class="text-reset nav-link">{{$category->name}}</a>
          </b>
          @endforeach
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-3">Contact</h6>
          <p><i class="fas fa-home me-3 text-secondary"></i> Phnom Penh, st 271, Cambodia</p>
          <p>
            <i class="fas fa-envelope me-3 text-secondary"></i>
            info@example.com
          </p>
          <p><i class="fas fa-phone me-3 text-secondary"></i> + 01 234 567 88</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
    The MINI MART Team.
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->