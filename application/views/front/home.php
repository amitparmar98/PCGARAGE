<?php $this->load->view('front/header'); ?>	

	<main role="main-wrapper">
			<section role="section1" class="default-padding">
				<div class="container">
					<div class="row">
						<p>Search for your device</p>
						<div class="form-group">
							<input class="devname form-control" type="text" ></input> 
						</div>
						<div class="form-group">
							<a href="#" class="form-control btn btn-primary submit">Submit</a>
						</div>
						<div class="api">
							
						</div>
					</div>
				</div>
				<?php
				// $json_string = 'https://example.com/jsondata.json';
				// $jsondata = file_get_contents($json_string);
				// $obj = json_decode($jsondata,true);
				// echo "<pre>";
				// print_r($obj);
				?>
				<div class="container">
					<div class="row">
						<div class="col-sm-4" role="left-area">
							<form method="POST" action="">
								<div class="select">
									<select id="BranD">
										<option>Select brand</option>
									</select>
								</div>
								<div class="select">
									<select id="ModaL">
										<option>Select model</option>
									</select>
								</div>
								<div class="select">
									<select>
										<option>Age of device</option>
									</select>
								</div>
								<div class="select">
									<select>
										<option>Color</option>
									</select>
								</div>
								<div class="select">
									<select>
										<option>Compromised function</option>
									</select>
								</div>
								<div class="select">
									<select>
										<option>Purchasing Price</option>
									</select>
								</div>
								<div class="select">
									<select>
										<option>Expected price</option>
									</select>
								</div>
							</form>
							<!--form method="POST" action="<?php echo base_url(); ?>index.php/home/frontform">
								<div class="select">
									<select name="brand" id="BranD">
										<option value="">Select brand</option>
										<option value="Iphone">Iphone</option>
									</select>
								</div>
								<div class="select">
									<select name="modal" id="ModaL">
										<option value="">Select model</option>
										<option value="Iphone 7">Iphone 7</option>
									</select>
								</div>
								<div class="select">
									<select name="age_of_device">
										<option value="">Age of device</option>
										<option value="1 Year">1 Year</option>
									</select>
								</div>
								<div class="select">
									<select name="color">
										<option value="">Color</option>
										<option value="Grey">Grey</option>
									</select>
								</div>
								<!--div class="select">
									<select>
										<option>Compromised function</option>
										<option>Compromised function</option>
									</select>
								</div-->
								<!--div class="select">
									<select name="purchase_price">
										<option>Purchasing Price</option>
										<option value="70000">70000</option>
									</select>
								</div>
								<div class="select">
									<select name="exp_price">
										<option>Expected price</option>
										<option value="40000">40000</option>
									</select>
								</div>
								<div class="col-sm-12 text-xs-center">
									<button type="submit" class="btn btn-default">submit</button>
							</div>
							</form-->
						</div>
					</div>
				</div>
			</section>
			<section role="section2" style="background:#f1f1f1;" class="default-padding">
				<div class="container" style="max-width:700px;">
					<h4>Get a cash estimate</h4>
					<div class="row">
						<form method="POST" action="<?php echo base_url(); ?>index.php/home">
							<div class="col-sm-6">
								<input type="text" name="names" class="form-control" placeholder="Name" />
							</div>
							<div class="col-sm-6">
								<input type="text" name="emails" class="form-control" placeholder="Email" />
							</div>
							<div class="col-sm-6">
								<input type="text" name="phones" class="form-control" placeholder="Phone no." />
							</div>
							<div class="col-sm-6">
								<input type="text" name="call_time" class="form-control" placeholder="Call back time" />
							</div>
							<div class="col-sm-12 text-xs-center">
								<button type="submit" class="btn btn-default">submit</button>
							</div>
						</form>
					</div>
				</div>
			</section>
		</main>
		<script type="text/javascript">

$('.submit').on('click', function() {

	// set token globally
	//$.fn.fonoApi.options.token = "xxx";

	$('.api').fonoApi({
		token : "4e29b1db99d99fa21756f97c7cb6fd244ef733ce8a9e90fe",
		device : $('.devname').val(),
		limit : 50,
		template : function() {

			// argument contains the data object // *returns html content
			return $.map(arguments, function(obj, i) {

				content  = '<h3>'+ obj.DeviceName + '</h3>';
				content += '<table class="table table-striped" style="width:100%">';
				content += '<tr><th>info</th><th>Description</th></tr>';
				var i=0;
				for(var key in obj){
					i++;
					if(i==1)$('#ModaL').append('<option>'+obj[key]+'</option>');
					if(i==2)$('#BranD').append('<option>'+obj[key]+'</option>');
				  content += "<tr><td>" + key + "</td><td>" + obj[key] + "</td><tr>";
				}

				content += "</table>";
				return $('<div class="table-responsive"></div>').append(content);
			});

		}
	});

});

</script>
<?php $this->load->view('front/footer'); ?>