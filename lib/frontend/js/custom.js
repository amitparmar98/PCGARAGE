var site_url=jQuery('#site_url').val();
var brand_id_c = jQuery('#brand_id_c').val();
var subbrand_id_c = jQuery('#subbrand_id_c').val();


function moveNextPrev(divId,currId){
	// alert(divId);
	// alert(currId);
	
	var ff=0;
	jQuery('#srorder_'+divId).find('.repair-box').each(function( index ) {
	  if($(this).hasClass('active')){
		  ff=1;
	  }
	});
	if(ff==0){
		if(divId==3 && currId==2){
			jQuery("#SelectBrandFirst").modal("show");
			return;
		}
	}
	jQuery('#srorder_'+currId).addClass('d-none');
	jQuery('#srorder_'+divId).removeClass('d-none');
}
function moveNextPrev1(divId,currId){
	jQuery('#srorder1_'+currId).addClass('d-none');
	jQuery('#srorder_'+divId).removeClass('d-none');
}

/* very first function that run on which device need repair section */
function getstart(PID){
	jQuery('.getChildBrand .repair-box').removeClass('active'); 
	jQuery('#brand_'+PID).addClass('active');
	jQuery('#srorder_0').addClass('d-none');
	jQuery('#srorder_1').removeClass('d-none');
	
        var imgt = $(".brand_img_"+PID).attr('src');
	var brandName = $(".brand_name_"+PID).text();
	$(".selectedDeviceImg").attr('src',imgt);
	$(".selectedDeviceImg").attr('alt',brandName);
	$(".selectedDeviceName").text(brandName);
      $(".selectedBrandLi").hide();
          $(".selectedModalLi").hide();
          
           $(".allissue").remove();
           $(".estimated_price").text('0');
           $(".device-n").val(PID);
     
    $('#BranDS').html('<img class="loder1" style="display: none; margin-left: 18%;" src="uploads/loder/loder1.gif" class="img-fluid" alt="loder">');
        
	$.ajax({
		type: "POST",
		url: site_url+"repair/getBrand",
		data:'id='+PID,
		success: function(data){
			jQuery('#BranDS').html(data);
			jQuery('#srorder_2').removeClass('d-none');
	jQuery('#srorder_0').addClass('d-none');
	jQuery('#srorder_1').addClass('d-none');
        
        
                             if(brand_id_c > 0)
        {
//           
//            $(".getBrandModal").ckick();
                  
        }

      
			$('.getBrandModal').click(function(){
       
				var bid=$(this).data('brandid');
				var brandName1=$(this).data('brandname1');
                            $('#ModaLS').html('<img class="loder1" style="display: none; margin-left: 18%;" src="uploads/loder/loder1.gif" class="img-fluid" alt="loder">');
                             
				 var brandImg = $(".brand1_img_"+bid).attr('src');
					/* thkka start*/				
					/* $(".selectedBrandImg").attr('src',brandImg);	 
					var brandImg = brandImg.replace(/png/g,'jpg');
					                alert(brandImg); */				
					$(".selectedBrandImg").attr('src',brandImg);			
					$(".selectedBrandImg").attr('alt',brandName1);			
					/* thkka end*/
					$(".selectedBrandName").text(brandName1);
					$(".selectedBrandLi").show();
					$(".selectedModalLi").hide();
					$(".allissue").remove();
					$(".estimated_price").text('0');
                                        $(".brand-n").val(bid);
                                
				jQuery('.getBrandModal .repair-box').removeClass('active'); 
				jQuery('#brand_'+bid).addClass('active');
				$.ajax({
					type: "POST",
					url: site_url+"repair/getBrandModal",
					data:'id='+bid,
					success: function(data){
						jQuery('#ModaLS').html(data);
						jQuery('#srorder_3').removeClass('d-none');
						jQuery('#srorder_2').addClass('d-none');
						$('.selectModal').click(function(){
							var bid=$(this).data('mbrandid');
							var mid=$(this).data('modalid');
                                                         $('#IssuES').html('<img class="loder1" style="display: none; margin-left: 18%;" src="uploads/loder/loder1.gif" class="img-fluid" alt="loder">');
                                                          var modalImg = $(".brandModalImg_"+mid).attr('src');
                                                            var modalName = $(".brandModalName_"+mid).text();
                                                            
                                                            $(".selectedModalImg").attr('src',modalImg);
                                                            $(".selectedModalImg").attr('alt',modalName);
                                                            $(".selectedModalName").text(modalName);
                                                            $(".selectedModalLi").show();
                                                            
                                                             $(".allissue").remove();
                                                             $(".estimated_price").text('0');
                                                        
                                                         $(".modal-n").val(mid);
                                                        
                                                        
							jQuery('.selectModal .repair-box').removeClass('active'); 
							jQuery('#MOdal_'+mid).addClass('active');
							$.ajax({
								type: "POST",
								url: site_url+"repair/isssues",
								data:'id='+mid,
								success: function(data){
									jQuery('#IssuES').html(data);
                                                                        
                                                                        jQuery('#srorder_4').removeClass('d-none');
						jQuery('#srorder_3').addClass('d-none');
                                                                        
                        $('.selectIssue').click(function(){
							
                            var issueId=$(this).data('missueid');
							var issuePrice=$(this).data('missueprice');
                            var issueImg = $(".selectedIssueImg_"+issueId).attr('src');
                            var issueName = $(".selectedIssueName_"+issueId).text();                            
                                                        
                                                        $(".orderform").prepend('<input type="hidden" name="issue[]"  class="issue-n issue_n_'+issueId+'" value="'+issueId+'" data-iName="'+issueName+'">');
                                                        
                                                          
                                                            
//                                                            $(".selectedModalImg").attr('src',modalImg);
//                                                            $(".selectedModalName").text(modalName);
//                                                            $(".selectedModalLi").show();
                                                         
                                                            var html = '';
                                                            var html2 = '';
                                                            html = '<li class="media allissue allissueapi singleIssue_'+issueId+'"><img class="d-flex" src="'+issueImg+'" alt="'+issueName+'" /><div class="media-body">'+issueName+'<span class="price">£ '+issuePrice+' <a href="javascript:void(0);" onclick=javascript:removeissue('+issueId+','+issuePrice+'); class="pull-right"><img class="m-0" src="'+site_url+'lib/frontend/img/cross.png" alt="cross" style="width: 17px;"></a></span></div></li>';  
                                                            html2 = '<div class="col-sm-6 m-0 allissue singleIssue_'+issueId+'"><div class="media"><img class="d-flex mr-3" style="width:15px;" src="'+issueImg+'" alt="'+issueName+'" /><div class="media-body">'+issueName+'<span class="price">£ '+issuePrice+'</span></div></div></div>';
							    html33 = '<li class="media issue_next_button" style="">\n\
                                                                            <div class="row">\n\
                                                                              <div class="col-md-12">\n\
                                                                              <p>I am done, show me the fixing price.</p>\n\
  </div>                                                                 <div class="col-md-12" style="text-align: center;">\n\
									<button type="button" onclick="changeValue();" style="border-radius: 20px;padding: 10px 45px;font-size: 14px;background: #003150;" class="btn btn-primary">Next</button>\n\
                                                                            </div>        </div>\n\
                                                                            </li>';				    
                                                                  
                                                        var totalPrice = $(".estimated_price").text();
                                                         if ($('#IssUes_'+issueId).hasClass('active')){
                                                             
                                                                    totalPrice = parseFloat(totalPrice) - parseFloat(issuePrice);
                                                                    $(".singleIssue_"+issueId).remove();
                                                                    $(".issue_n_"+issueId).remove();
                                                                    jQuery('#IssUes_'+issueId).removeClass('active');
                                                                } else {
//                                                                    $('#myModal3').modal('toggle');
                                                                         totalPrice = parseFloat(totalPrice) + parseFloat(issuePrice);
                                                                         
                                                                         $(".issue_next_button").remove();
                                                                     $('.IssueList').append(html);   
                                                                     $('.IssueList').append(html33);   
                                                                     $('.lastpage').append(html2);   
                                                                  jQuery('#IssUes_'+issueId).addClass('active');
                                                                  }
                                                                  
                                                                  $(".estimated_price").text(totalPrice.toFixed(2));
                                                                  
                                                                  
                                                                    $(".total_price1").each(function( index1 ) {
                                                                                var service_price = $(this).text();

                                                                               var totalPrice1 = $(".estimated_price").text();
                                                                               var total_service = parseFloat(totalPrice1) + parseFloat(service_price);
																					total_service=total_service.toFixed(2);
                                                                             $(".total_price2").each(function( index ) {
                                                                                 if(index == index1)
                                                                                 {

                                                                                $(this).text(total_service); 
                                                                                 }

                                                                             });


                                                                        });
                                                                  
//							jQuery('.selectModal .repair-box').removeClass('active'); 
							
//						 jQuery('#srorder_5').removeClass('d-none');
//						jQuery('#srorder_4').addClass('d-none');
                                                                 
						}); 
                                                                        
                                                                        
								}
							});
						});
					}
				});
			});
		}
	});
}
function getstart1(PID){
	jQuery('.getChildBrand .repair-box').removeClass('active'); 
	jQuery('#brand_'+PID).addClass('active');
	jQuery('#srorder_0').addClass('d-none');
	jQuery('#srorder_1').removeClass('d-none');
	
        var imgt = $(".brand_img_"+PID).attr('src');
	var brandName = $(".brand_name_"+PID).text();
	$(".selectedDeviceImg").attr('src',imgt);
	$(".selectedDeviceImg").attr('alt',brandName);
	$(".selectedDeviceName").text(brandName);
      $(".selectedBrandLi").hide();
          $(".selectedModalLi").hide();
          
           $(".allissue").remove();
           $(".estimated_price").text('0');
           $(".device-n").val(PID);
     
    $('#BranDS').html('<img class="loder1" style="display: none; margin-left: 18%;" src="uploads/loder/loder1.gif" class="img-fluid" alt="loder">');
        
	$.ajax({
		type: "POST",
		url: site_url+"repair/getBrand",
		data:'id='+PID,
		success: function(data){
			jQuery('#BranDS').html(data);
			jQuery('#srorder_2').removeClass('d-none');
	jQuery('#srorder_0').addClass('d-none');
	jQuery('#srorder_1').addClass('d-none');
        

			
       
				var bid = '6';
				var brandName1 = 'Iphone';
                            $('#ModaLS').html('<img class="loder1" style="display: none; margin-left: 18%;" src="uploads/loder/loder1.gif" class="img-fluid" alt="loder">');
                             
				 var brandImg = $(".brand1_img_"+bid).attr('src');
					$(".selectedBrandImg").attr('src',brandImg);
					$(".selectedBrandImg").attr('alt',brandName1);
					$(".selectedBrandName").text(brandName1);
					$(".selectedBrandLi").show();
					$(".selectedModalLi").hide();
					$(".allissue").remove();
					$(".estimated_price").text('0');
                                        $(".brand-n").val(bid);
                                
				jQuery('.getBrandModal .repair-box').removeClass('active'); 
				jQuery('#brand_'+bid).addClass('active');
				$.ajax({
					type: "POST",
					url: site_url+"repair/getBrandModal",
					data:'id='+bid,
					success: function(data){
						jQuery('#ModaLS').html(data);
						jQuery('#srorder_3').removeClass('d-none');
						jQuery('#srorder_2').addClass('d-none');
						$('.selectModal').click(function(){
							var bid=$(this).data('mbrandid');
							var mid=$(this).data('modalid');
                                                         $('#IssuES').html('<img class="loder1" style="display: none; margin-left: 18%;" src="uploads/loder/loder1.gif" class="img-fluid" alt="loder">');
                                                          var modalImg = $(".brandModalImg_"+mid).attr('src');
                                                            var modalName = $(".brandModalName_"+mid).text();
                                                            
                                                            $(".selectedModalImg").attr('src',modalImg);
                                                            $(".selectedModalImg").attr('alt',modalName);
                                                            $(".selectedModalName").text(modalName);
                                                            $(".selectedModalLi").show();
                                                            
                                                             $(".allissue").remove();
                                                             $(".estimated_price").text('0');
                                                        
                                                         $(".modal-n").val(mid);
                                                        
                                                        
							jQuery('.selectModal .repair-box').removeClass('active'); 
							jQuery('#MOdal_'+mid).addClass('active');
							$.ajax({
								type: "POST",
								url: site_url+"repair/isssues",
								data:'id='+mid,
								success: function(data){
									jQuery('#IssuES').html(data);
                                                                        
                                                                        jQuery('#srorder_4').removeClass('d-none');
						jQuery('#srorder_3').addClass('d-none');
                                                                        
                                                                       $('.selectIssue').click(function(){
							
                                                      
                                                       var issueId=$(this).data('missueid');
							var issuePrice=$(this).data('missueprice');
                                                        var issueImg = $(".selectedIssueImg_"+issueId).attr('src');
                                                            var issueName = $(".selectedIssueName_"+issueId).text();
                                                        
                                                        $(".orderform").prepend('<input type="hidden" name="issue[]"  class="issue-n issue_n_'+issueId+'" value="'+issueId+'" data-iName="'+issueName+'">');
                                                        
                                                                                                                      
//                                                            $(".selectedModalImg").attr('src',modalImg);
//                                                            $(".selectedModalName").text(modalName);
//                                                            $(".selectedModalLi").show();
                                                         
                                                            var html = '';
                                                            var html2 = '';
                                                            html = '<li class="media allissue allissueapi singleIssue_'+issueId+'"><img class="d-flex" src="'+issueImg+'" alt="'+issueName+'" /><div class="media-body">'+issueName+'<span class="price">£ '+issuePrice+' <a href="javascript:void(0);" onclick=javascript:removeissue('+issueId+','+issuePrice+'); class="pull-right"><img class="m-0" src="'+site_url+'lib/frontend/img/cross.png" alt="cross" style="width: 17px;"></a></span></div></li>';  
                                                            html2 = '<div class="col-sm-6 m-0 allissue singleIssue_'+issueId+'"><div class="media"><img class="d-flex mr-3" style="width:15px;" src="'+issueImg+'" alt="'+issueName+'" /><div class="media-body">'+issueName+'<span class="price">£ '+issuePrice+'</span></div></div></div>';
							    html33 = '<li class="media issue_next_button" style="">\n\
                                                                            <div class="row">\n\
                                                                              <div class="col-md-12">\n\
                                                                              <p>I am done, show me the fixing price.</p>\n\
  </div>                                                                 <div class="col-md-12" style="text-align: center;">\n\
									<button type="button" onclick="changeValue();" style="border-radius: 20px;padding: 10px 45px;font-size: 14px;background: #003150;" class="btn btn-primary">Next</button>\n\
                                                                            </div>        </div>\n\
                                                                            </li>';				    
                                                                  
                                                        var totalPrice = $(".estimated_price").text();
                                                         if ($('#IssUes_'+issueId).hasClass('active')){
                                                             
                                                                    totalPrice = parseFloat(totalPrice) - parseFloat(issuePrice);
                                                                    $(".singleIssue_"+issueId).remove();
                                                                    $(".issue_n_"+issueId).remove();
                                                                    jQuery('#IssUes_'+issueId).removeClass('active');
                                                                } else {
//                                                                    $('#myModal3').modal('toggle');
                                                                         totalPrice = parseFloat(totalPrice) + parseFloat(issuePrice);
                                                                         
                                                                         $(".issue_next_button").remove();
                                                                     $('.IssueList').append(html);   
                                                                     $('.IssueList').append(html33);   
                                                                     $('.lastpage').append(html2);   
                                                                  jQuery('#IssUes_'+issueId).addClass('active');
                                                                  }
                                                                  
                                                                  $(".estimated_price").text(totalPrice.toFixed(2));
                                                                  
                                                                  
                                                                    $(".total_price1").each(function( index1 ) {
                                                                                var service_price = $(this).text();

                                                                               var totalPrice1 = $(".estimated_price").text();
                                                                               var total_service = parseInt(totalPrice1) + parseInt(service_price);
																			   total_service=total_service.toFixed(2);
                                                                             $(".total_price2").each(function( index ) {
                                                                                 if(index == index1)
                                                                                 {

                                                                                $(this).text(total_service); 
                                                                                 }

                                                                             });


                                                                        });
                                                                  
//							jQuery('.selectModal .repair-box').removeClass('active'); 
							
//						 jQuery('#srorder_5').removeClass('d-none');
//						jQuery('#srorder_4').addClass('d-none');
                                                                 
						}); 
                                                                        
                                                                        
								}
							});
						});
					}
				});
			
		}
	});
}

/* for getting brands like iphone,samsung,sony etc... */
$('.sertab').click(function(){

	if(site_user_id)
	{
			$.ajax({

		     url:  site_url+'repair/getRepairUserDetailById',
		     type: 'POST',
		     dataType: 'json',
		     data : {site_user_id: site_user_id},
		     success : function (data){

	     	if(data)
	     	{
	     		//$('#login_success').show();
	     		//$('#login_error').hide();
	     		$('#repair_login_div').hide();
	     		$('.site_user_id').val(data.user_id);     		
	     		$('.cname').val(data.first_name);     		
	     		$('.email').val(data.email);
	     		$('.phone').val(data.phone);
	     		$('.address').val(data.address);     		
	     		$('.post_code').val(data.postcode);
	     		$('.walkingdatetime').val(data.walkingdatetime);
	     		$('.color').val(data.color);
	     		$('.branch').val(data.vendor_id);	     		
	     		$('.password_div').hide();
	     		$('.cpassword_div').hide();
	     		$('.password').removeAttr('required');
	     		$('.cpassword').removeAttr('required');

	     	}

	     	else
	     	{
	     		//$('#login_error').show();
	     		//$('#login_success').hide();
	     		//$('.password_div').hide();
	     		//$('.cpassword_div').hide();
	     	}

	      }
	   });
	}
	
    var serid 			= 	$(this).data('serviceid');  			
       
        $(".serboxtab").removeClass('active');
        $(".box-tab_"+serid).addClass('active');
        $(".service-n").val(serid);
     
        jQuery('#srorder_5').addClass('d-none');
        
//        $(".formdiv :input").attr("disabled", true);
//        $('.formdiv_'+serid+' :input').attr("disabled", false);
//        jQuery('.formdiv').prop("disabled",true);
//        jQuery('.formdiv_'+serid).prop("disabled",false);
      
	jQuery('#srorder1_'+serid).removeClass('d-none');
//	jQuery('.repair-tab').removeClass('d-none');
});




$('.getChildBrand').click(function(){	
    
    $('#BranDS').html('<img class="loder1" style="display: none; margin-left: 18%;" src="uploads/loder/loder1.gif" class="img-fluid" alt="loder">');
	var bid=$(this).data('brandid');
     var imgt = $(".brand_img_"+bid).attr('src');
	var brandName = $(".brand_name_"+bid).text();
	$(".selectedDeviceImg").attr('src',imgt);
	$(".selectedDeviceImg").attr('alt',brandName);
	$(".selectedDeviceName").text(brandName);
     $(".selectedBrandLi").hide();
         $(".selectedModalLi").hide();
          $(".allissue").remove();
          $(".estimated_price").text('0');
        
          $(".device-n").val(bid);
        
        
	jQuery('.getChildBrand .repair-box').removeClass('active'); 
	jQuery('#brand_'+bid).addClass('active');
	$.ajax({
		type: "POST",
		url: site_url+"repair/getBrand",
		data:'id='+bid,
		success: function(data){
			jQuery('#BranDS').html(data);
			jQuery('#srorder_2').removeClass('d-none');
	jQuery('#srorder_0').addClass('d-none');
	jQuery('#srorder_1').addClass('d-none');
			$('.getBrandModal').click(function(){
				var bid=$(this).data('brandid');
                             $(".brand-n").val(bid);
                                $('#ModaLS').html('<img class="loder1" style="display: none; margin-left: 18%;" src="uploads/loder/loder1.gif" class="img-fluid" alt="loder">');
       var brandImg = $(".brand1_img_"+bid).attr('src');
	var brandName1=$(this).data('brandname1');
        $(".selectedBrandName").text(brandName1);
        
	$(".selectedBrandImg").attr('src',brandImg);
	$(".selectedBrandImg").attr('alt',brandName1);
	$(".selectedBrandLi").show();
         $(".selectedModalLi").hide();
                                $(".allissue").remove();
                                                                $(".estimated_price").text('0'); 
                                
                                
				jQuery('.getBrandModal .repair-box').removeClass('active'); 
				jQuery('#brand_'+bid).addClass('active');
				$.ajax({
					type: "POST",
					url: site_url+"repair/getBrandModal",
					data:'id='+bid,
					success: function(data){
						jQuery('#ModaLS').html(data);
						jQuery('#srorder_3').removeClass('d-none');
						jQuery('#srorder_2').addClass('d-none');
						$('.selectModal').click(function(){
                                                     $('#IssuES').html('<img class="loder1" style="display: none; margin-left: 18%;" src="uploads/loder/loder1.gif" class="img-fluid" alt="loder">');
							var bid=$(this).data('mbrandid');
							var mid=$(this).data('modalid');
                                                        
                                                        
                                                          $(".modal-n").val(mid);
                                                        
                                                            var modalImg = $(".brandModalImg_"+mid).attr('src');
                                                            var modalName = $(".brandModalName_"+mid).text();
                                                            
                                                            $(".selectedModalImg").attr('src',modalImg);
                                                            $(".selectedModalImg").attr('alt',modalName);
                                                            $(".selectedModalName").text(modalName);
                                                            $(".selectedModalLi").show();
                                                              $(".allissue").remove();
                                                                $(".estimated_price").text('0');
                                                        
							jQuery('.selectModal .repair-box').removeClass('active'); 
							jQuery('#MOdal_'+mid).addClass('active');
							$.ajax({
								type: "POST",
								url: site_url+"repair/isssues",
								data:'id='+mid,
								success: function(data){
									jQuery('#IssuES').html(data);
                                                                        
                                                                        jQuery('#srorder_4').removeClass('d-none');
						jQuery('#srorder_3').addClass('d-none');
                                                                        
                                                                           $('.selectIssue').click(function(){
							
                                                        
                                                        
							var issueId=$(this).data('missueid');
							var issuePrice=$(this).data('missueprice');
                                                        var issueImg = $(".selectedIssueImg_"+issueId).attr('src');
                                                            var issueName = $(".selectedIssueName_"+issueId).text();
                                                        $(".orderform").prepend('<input type="hidden" name="issue[]"  class="issue-n issue_n_'+issueId+'" value="'+issueId+'" data-iName="'+issueName+'">');
                                                        
                                                         
                                                         
                                                            var html = '';
                                                            var html2 = '';
                                                            html = '<li class="media allissue allissueapi singleIssue_'+issueId+'"><img class="d-flex" src="'+issueImg+'" alt="'+issueName+'" /><div class="media-body">'+issueName+'<span class="price">£ '+issuePrice+' <a href="javascript:void(0);" onclick=javascript:removeissue('+issueId+','+issuePrice+'); class="pull-right"><img class="m-0" src="'+site_url+'lib/frontend/img/cross.png" alt="cross" style="width: 17px;"></a></span></div></li>';  
                                                            html2 = '<div class="col-sm-6 m-0 allissue singleIssue_'+issueId+'"><div class="media"><img class="d-flex mr-3" style="width:15px;" src="'+issueImg+'" alt="'+issueName+'" /><div class="media-body">'+issueName+'<span class="price">£ '+issuePrice+'</span></div></div></div>';
								 html33 = '<li class="media issue_next_button" style="">\n\
                                                                            <div class="row">\n\
                                                                              <div class="col-md-12">\n\
                                                                              <p>I am done, show me the fixing price.</p>\n\
  </div>                                                                 <div class="col-md-12" style="text-align: center;">\n\
									<button type="button" onclick="changeValue();" style="border-radius: 20px;padding: 10px 45px;font-size: 14px;background: #003150;" class="btn btn-primary">Next</button>\n\
                                                                            </div>        </div>\n\
                                                                            </li>';					    
                                                                  
                                                        var totalPrice = $(".estimated_price").text();
                                                         if ($('#IssUes_'+issueId).hasClass('active')){
                                                                    totalPrice = parseFloat(totalPrice) - parseFloat(issuePrice);
                                                                    $(".singleIssue_"+issueId).remove();
                                                                    $(".issue_n_"+issueId).remove();
                                                                    jQuery('#IssUes_'+issueId).removeClass('active');
                                                                } else {
                                                                    $('.issue_next_button').remove();
//                                                                    $('#myModal3').modal('toggle');
                                                                         totalPrice = parseFloat(totalPrice) + parseFloat(issuePrice);
                                                                     $('.IssueList').append(html);   
                                                                     $('.IssueList').append(html33);   
                                                                     $('.lastpage').append(html2);   
                                                                  jQuery('#IssUes_'+issueId).addClass('active');
                                                                  }
                                                                  
                                                                  $(".estimated_price").text(totalPrice.toFixed(2));
                                                              
                                                                    $(".total_price1").each(function( index1 ) {
                                                                                var service_price = $(this).text();

                                                                               var totalPrice1 = $(".estimated_price").text();
                                                                               var total_service = parseInt(totalPrice1) + parseInt(service_price);
																			   total_service=total_service.toFixed(2);
                                                                             $(".total_price2").each(function( index ) {
                                                                                 if(index == index1)
                                                                                 {

                                                                                $(this).text(total_service); 
                                                                                 }

                                                                             });


                                                                        });
                                                                
//							jQuery('.selectModal .repair-box').removeClass('active'); 
//							     jQuery('#srorder_5').removeClass('d-none');
//						jQuery('#srorder_4').addClass('d-none');
						
						}); 
								}
							});
						});
					}
				});
			});
			
		}
	});
});
 
 
 function removeissue(issueId,issuePrice){
    
	var totalPrice = $(".estimated_price").text();
    totalPrice = parseFloat(totalPrice) - parseFloat(issuePrice);
    $(".estimated_price").text(totalPrice.toFixed(2));
      
      
    $(".issue_n_"+issueId).remove();
      
      
	$(".total_price1").each(function( index1 ) {
		var service_price = $(this).text();
		var totalPrice1 = $(".estimated_price").text();
		var total_service = parseFloat(totalPrice1) + parseFloat(service_price);
		total_service=total_service.toFixed(2);
		$(".total_price2").each(function( index ) {
			if(index == index1){
				$(this).text(total_service); 
			}
		});
	});
    
	$(".singleIssue_"+issueId).remove();
    jQuery('#IssUes_'+issueId).removeClass('active');
	
	/* after removing all issue user will jump to issue screen*/
	if(totalPrice==0){
		jQuery('#srorder_5').addClass('d-none');
		jQuery('#srorder_4').removeClass('d-none');
	}
 }
 
 function showBrands()
 {
      $(".getBrandModal").show();
      $(".getBrandModal1").remove();
 }
 function showIssue()
 {
      $(".selectIssue").show();
      $(".selectIssue1").remove();
 }
 function showModal()
 {
      $(".selectModal").show();
      $(".selectModal1").remove();
 }
 function serviceOffice(oid)
 {
      $(".office-n").val(oid);
     
 }
 function changeValue()
 {
//      $("#myModal3").modal('hide');
      jQuery('#srorder_5').removeClass('d-none');
      jQuery('#srorder_4').addClass('d-none');
      
      $(".issue_next_button").hide();
     
 }
 

 
 $(document).ready(function()
 {
    if(brand_id_c > 0)
    {
        if(subbrand_id_c > 0)
        {
          getstart1(brand_id_c);  
        }
        else
        {
            getstart(brand_id_c);
        }
        
        
    }
 });

 $('#repair_login_form').submit(function(e){

    $.ajax({

     url:  site_url+'repair/getRepairUserDetail',
     type: 'POST',
     dataType: 'json',
     data : $(this).serialize(),
     success : function (data){

     	if(data)
     	{
     		$('#login_success').show();
     		$('#login_error').hide();
     		$('#repair_login_div').hide();
     		$('.site_user_id').val(data.user_id);     		
     		$('.cname').val(data.first_name);     		     		
     		$('.email').val(data.email);
     		$('.email_error').hide();
     		$('.phone').val(data.phone);
     		$('.address').val(data.address);     		
     		$('.post_code').val(data.postcode);
     		$('.walkingdatetime').val(data.walkingdatetime);
     		$('.color').val(data.color);
     		$('.branch').val(data.vendor_id);     		
     		$('.password_div').hide();
     		$('.cpassword_div').hide();
     		$('.password').removeAttr('required');
     		$('.cpassword').removeAttr('required');

     	}

     	else
     	{
     		$('#login_error').show();
     		$('#login_success').hide();
     		//$('.password_div').hide();
     		//$('.cpassword_div').hide();
     	}

      }
   });
    e.preventDefault();
});

 $('.email').focusout(function(){

 	if($(this).val() !='')
 	{
 		var email = $(this).val();
 		$.ajax({

 			url: site_url+'repair/chkEmailUnique',
 			dataType: 'json',
 			type: 'POST',
 			data: {email: email},

 			success: function(data)
 			{
 				if(data)
 				{
 					$('.email_error').show();
 					$(this).val('');
 				}
 			}

 		});
 	}


 });

$('.phone').focusout(function(){

	if($(this).val().length != 10)
	{
		$('.phone_error').show();
		$(this).val('');
		$(this).addAttr('required');
	}

	else
	{
		$('.phone_error').hide();
		$(this).removeAttr('required');
	}
});

 
 
 /* function sendDataToCms(){
	
	var jsonData = JSON.stringify([
					{
						"Attribute": "FirstName",
						"Value": jQuery('input[name="cname"]').val()
					},
					{
						"Attribute": "EmailAddress",
						"Value": jQuery('input[name="email"]').val()
					},
					{
						"Attribute": "Mobile",
						"Value": jQuery('input[name="phone"]').val()
					},
					{
						"Attribute": "mx_Street1",
						"Value": jQuery('input[name="address"]').val()
					},
					{
						"Attribute": "mx_Postal_Code",
						"Value": jQuery('input[name="post_code"]').val()
					},
					{
						"Attribute": "Notes",
						"Value": jQuery('textarea[name="message"]').val()
					}
				]);
	var isSues="";
	$( "#srorder1_3 .issue-n" ).each(function( index ) {
	   isSues=isSues+$(this).attr('data-iName')+", ";
	});
	
	 $.ajax({
			type: "POST",
			url: "https://api-in21.leadsquared.com/v2/LeadManagement.svc/Lead.Capture?accessKey=u$rb8a2c2f7d22dd7f46011838ee1d2da3f&secretKey=fe8662b18f1c2da5b9797307e0e04bb614519b03",
			dataType: "json",                  
            data: jsonData,
            contentType: "application/json",
			success: function(data){
				var jsonData2 = JSON.stringify({
					"RelatedProspectId": '"'+data.Message.RelatedId+'"',
					"ActivityEvent": 201,
					"ActivityNote": "Testing activity note",
					"ActivityDateTime": "2018-02-16 12:13:44",
					"Fields": [
						{
							"Attribute": "mx_Custom_1",
							"Value": '"'+jQuery('#dType').text()+'"'
						},
						{
							"Attribute": "mx_Custom_2",
							"Value": '"'+jQuery('#dBrand').text()+'"'
						},
						{
							"Attribute": "mx_Custom_3",
							"Value": '"'+jQuery('#dModal').text()+'"'
						},
						{
							"Attribute": "mx_Custom_4",
							"Value": '"'+isSues+'"'
						}
					]
				}); 
				 
				$.ajax({
					type: "POST",
					url: "https://api-in21.leadsquared.com/v2/ProspectActivity.svc/Create?accessKey=u$rb8a2c2f7d22dd7f46011838ee1d2da3f&secretKey=fe8662b18f1c2da5b9797307e0e04bb614519b03",
					dataType: "json",                  
					data: jsonData2,
					contentType: "application/json",
					success: function(data){
						alert(data);
						//var res=JSON.stringify(data);
						alert(data.Message.RelatedId);
					}
			 });
			}
	 });
 } */