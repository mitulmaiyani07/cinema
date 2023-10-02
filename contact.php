<?php
$title = "Contact";
require('header.php');
?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <form class="contact_bg">
        <div class="row">
          <div class="col-md-12">
            <div class="title">
              <h2 class="page-title">Get in touch</h2>
            </div>
            <div class="col-md-12">
              <input class="contactus" placeholder="Full Name*" type="text" name="fullname">
            </div>
            <div class="col-md-12">
              <input class="contactus" placeholder="Email Address*" type="text" name="email_address">
            </div>
            <div class="col-md-12">
              <input class="contactus" placeholder="Contact No." type="text" name="phone_no">
            </div>
            <div class="col-md-12">
              <textarea class="textarea" placeholder="Message*" type="text" name="message"></textarea>
            </div>
            <div class="col-md-12">
              <button class="btn w-100">Submit</button>
            </div>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>


<?php require('footer.php'); ?>