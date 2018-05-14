<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.11';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<footer role="footer-area" class="">
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-6 mb-3 mb-md-0">
						<ul class="list-item">
							<li><a href="<?php echo base_url(); ?>how-it-work">How It Works</a></li>
							<li><a href="<?php echo base_url(); ?>repair-in-bulk">Repair in Bulk</a></li>
							<li><a href="<?php echo base_url(); ?>book-a-repair">Book a Repair</a></li>
							<li><a href="<?php echo base_url(); ?>wireless-setup">Wireless Setup</a></li>
							<li><a href="<?php echo base_url(); ?>why-pcgarage">Why PC Garage</a></li>
							<li><a target="_blank" href="<?php echo base_url(); ?>blog">Our Blog</a></li>
						</ul>
					</div>
					<div class="col-md-2 col-6 mb-3 mb-md-0">
						<ul class="list-item">
							<li><a href="<?php echo base_url(); ?>about-company">About Company</a></li>
							<li><a href="<?php echo base_url(); ?>faqs">FAQs</a></li>
							<li><a href="<?php echo base_url(); ?>terms-and-conditions">Terms and Conditions</a></li>
							<li><a href="<?php echo base_url(); ?>career">Careers</a></li>
							<li><a href="<?php echo base_url(); ?>our-team">Our Team</a></li>
							<li><a href="<?php echo base_url(); ?>corporate-accounts">Corporate accounts</a></li>
						</ul>
					</div>
					<div class="col-md-2 col-6 mb-3 mb-md-0">
						<ul class="list-item">
							<h6 class="gothambold mb-3">Locations</h6>
								<?php /* $query = $this->db->query('SELECT * FROM vendor')->result();
								foreach($query as $l){ ?>
								<li><a href="<?php echo base_url(); ?>page/showlocationpage/<?php echo $l->id; ?>"><?php echo $l->fullname; ?></a></li>
							<?php } */ ?>
							<li><a href="<?php echo base_url(); ?>bridge-house">Bridge House</a></li>
							<li><a href="<?php echo base_url(); ?>nottingham">Nottingham </a></li>
							<li><a href="<?php echo base_url(); ?>ladbroke-grove">Ladbroke Grove</a></li>
							<li><a href="<?php echo base_url(); ?>littlehampton">Littlehampton</a></li>
							<li><a href="<?php echo base_url(); ?>camden-town">Camden Town</a></li>
						</ul>
					</div>
					<div class="col-md-3 col-6 mb-3 mb-md-0">
						<!-- TrustBox widget - Micro Review Count 
						<div class="trustpilot-widget" data-locale="en-US" data-template-id="5419b6a8b0d04a076446a9ad" data-businessunit-id="5a1bdaeb0000ff0005b1a5ab" data-style-height="20px" data-style-width="100%" data-theme="light">
						  <a href="https://www.trustpilot.com/review/www.pcgarage.uk.com" target="_blank">Trustpilot</a>
						</div>
						<!-- End TrustBox widget -->
					</div>
					<div class="col-md-3 col-6 mb-3 mb-md-0">
						<img src="<?php echo base_url(); ?>lib/frontend/img/logo.png" class="img-fluid" alt="footer logo" />
						<div class="fb-page mt-2" data-href="https://www.facebook.com/Pcgarage-1990249421186651" data-tabs="timeline" data-width="240" data-height="250" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/Pcgarage-1990249421186651" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Pcgarage-1990249421186651">Pcgarage</a></blockquote></div>
						<!--ul class="list-item-inline mt-4">
							<li><a href=""><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href=""><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
							<li><a href=""><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
							<li><a href=""><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						</ul-->
					</div>
				</div>
			</div>
			<section role="copy-right">
				© 2017 PC Garage Ltd. All Rights Reserved
			</section>
		</footer>
 <div class="modal fade" id="myModal4" role="dialog" >
     <div class="modal-dialog modal-sm" style='top:180px;'>
        <div class="modal-content">
          <!-- Modal content-->
      <div class="modal-content" style="text-align: center;">
        <div class="modal-body">
            <p>Do you have more issue?</p>
        </div>
        <div class="modal-footer1" style="text-align: center !important; margin: -14px 0 12px 0px;">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Yes</button>
            <button type="button" onclick="changeValue();" class="btn btn-danger" >No</button>
      </div>
      </div>
     </div>
  </div>
</div>
<div class="modal fade" id="SelectBrandFirst" role="dialog" >
    <div class="modal-dialog modal-sm" style='top:180px;'>
       <div class="modal-content">
        <div style="text-align: right;padding:5px">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		<div style="text-align: center;margin-bottom:5px">
            <p>Please select brand first</p>
        </div>
      </div>
	</div>
</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-1 m-0">
    <!-- Modal content-->
	<div class="modal-content track-order">
		<!--<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>-->
		<div class="modal-body p-5 text-center">
			<div class='row'>
				<div class='col-md-12'>
					<p><img style="width:80px;" src="<?php echo base_url(); ?>lib/frontend/img/track-order1.png" alt="Track your Device"/></p>
					<h4>Track your Device</h4>
					
					<div class='form-group'>
						<input type="hidden" id="site_url" value="<?php echo base_url(); ?>">
						<input type='text' style="padding:15px; font-size:13px;" name='' required placeholder="Repair ID" class='form-control track_order_id'>
					</div>
				</div>
				<div class='col-md-12'>
					<div class='form-group'>
						<button type="button" onclick='trackOrder()' class="btn btn-success btn-block">Submit</button>
					</div>
				</div>
			</div>
			<div class='row track_order_div' style='display: none;'>
				<div class='col-md-12 track_order_status'>
				</div>
			</div>
		</div>
	</div>
 </div>
</div>

<div id="RequestCallBack" class="modal fade" role="dialog">
  <div class="modal-dialog modal-dialog-1 m-0">
    <!-- Modal content-->
	<div class="modal-content track-order">
		<!--<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>-->
		<div class="modal-body p-5 text-center">
			<div class='row' id="requestCallDiv">
				<div class='col-md-12'>
					<h4>Request Call Back</h4>
					<p></p>
					<div class='form-group'>
						<input type='text' style="padding:15px; font-size:13px;" name='' id="rcbNmae" required placeholder="Enter Name" class='form-control mb-2'>
						<input type='text' onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" style="padding:15px; font-size:13px;" name='' id="rcbPhone" required placeholder="Enter Phone Number" class='form-control mb-2'>
						<input type='text' style="padding:15px; font-size:13px;" name='' id="rcbEmail" required placeholder="Enter Email" class='form-control mb-2'>
					</div>
				</div>
				<div class='col-md-12'>
					<div class='form-group'>
						<button type="button" onclick='requestCallBack()' class="btn btn-success btn-block">Submit</button>
					</div>
				</div>
			</div>
			<div class='row cllshortly' style='display: none;'>
				<div class='col-md-12'>
					<div class="alert alert-success cllshortly" role="alert">
						We will call you shortly.
					</div>
				</div>
			</div>
			<div class='row cllshortlyerr' style='display: none;'>
				<div class='col-md-12'>
					<div class="alert alert-success cllshortly" role="alert">
						Please check your Email and Phone number.<br/>
					</div>
				</div>
			</div>
		</div>
	</div>

  </div>
</div>


<script>
  function trackOrder()
    {
    var site_url=jQuery('#site_url').val();
    var track_order_id = $(".track_order_id").val();
	if(track_order_id==""){ $(".track_order_id").css('border','1px solid red'); } else { $(".track_order_id").css('border','1px solid #7F7F7F'); } 
            $.ajax({
                url:site_url+"repair/getorderstatus",
                data:'id='+track_order_id,
                        success: function(data){
                           $(".track_order_div").show();
                           $(".track_order_status").html(data);
                        }
            });

    }
	function requestCallBack()
    {
        var site_url=jQuery('#site_url').val();
		var name = $("#rcbNmae").val();
		var phone = $("#rcbPhone").val();
		var rcbEmail = $("#rcbEmail").val();
		var err=0;
		if(name==''){ $("#rcbNmae").css('border','1px solid red'); err++; }else{   $("#rcbNmae").css('border','1px solid rgba(0, 0, 0, 0.15)'); }		
		if(phone==''){ $("#rcbPhone").css('border','1px solid red'); err++ }else{   $("#rcbPhone").css('border','1px solid rgba(0, 0, 0, 0.15)'); }
		if(phone.length>10){ $("#rcbPhone").css('border','1px solid red'); err++ }else{   $("#rcbPhone").css('border','1px solid rgba(0, 0, 0, 0.15)'); }
		if(rcbEmail==''){ $("#rcbEmail").css('border','1px solid red'); err++ }else{   $("#rcbEmail").css('border','1px solid rgba(0, 0, 0, 0.15)'); }
		if(err>0){return;}
		
		$.ajax({
				url:site_url+"repair/callbackrequest",
				type: 'POST',
				data:{ name: name, phone : phone, cemail : rcbEmail} ,
						success: function(data){
						   $("#requestCallDiv").hide();
						   $(".cllshortly").show();
						}
			});

    }
    </script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-35847910-7"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'UA-35847910-7');
	</script>
</body>
</html>