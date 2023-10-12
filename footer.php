<footr>
  <div class="footer py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12 logo_section pb-5">
          <div class="full">
            <div class="center-desk">
              <div class="footer-logo">
                <a href="/cinema/"><img src="images/white-logo.png" alt="Cinema" /></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 ">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
              <div class="address">
                <ul class="loca">
                  <a href="#"><img src="icon/call.png" alt="#" /></a>+91 9409002090
                  </li>
                  <li>
                    <a href="#"><img src="icon/email.png" alt="#" /></a>mitpatel0720@gmail.com
                  </li>
                </ul>


              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="copyright">
        <p>Designed By <a href="/cinema/">Mr.Mitul Maiyani</a></p>
      </div>
    </div>
  </div>
</footr>
<!-- end footer -->
<!-- Javascript files-->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/plugin.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script type="text/javascript">
  $(function() {
    var url = window.location.pathname,
      urlRegExp = new RegExp(url.replace(/\/$/, '') + "$");
    $('.main-menu a').each(function() {
      if (urlRegExp.test(this.href.replace(/\/$/, ''))) {
        $(this).parent().addClass('active');
      }
    });
  });
</script>



</body>

</html>