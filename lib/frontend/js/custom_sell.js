var site_url=jQuery('#site_url').val();
var brand_id_c = jQuery('#brand_id_c').val();


function moveNextPrev(divId,currId)
{
	
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

/* for getting brands like iphone,samsung,sony etc... */
$('.sertab').click(function(){
    var serid = $(this).data('serviceid');
	$(".serboxtab").removeClass('active');
	$(".box-tab_"+serid).addClass('active');
	$(".service-n").val(serid);
	jQuery('#srorder_5').addClass('d-none');
	jQuery('#srorder1_'+serid).removeClass('d-none');
});




jQuery(document).ready(function(){	

	$('.getBrandModal').click(function(){

		var bid=$(this).data('brandid');
		$(".brand-n").val(bid);
		$('#ModaLS').html('<img class="loder1" style="display: none; margin-left: 18%;" src="https://pcgarage.uk.com/uploads/loder/loder1.gif" class="img-fluid" alt="">');
		var brandImg = $(".brand1_img_"+bid).attr('src');
		var brandName1=$(this).data('brandname1');
		$(".selectedBrandName").text(brandName1);

		$(".selectedBrandImg").attr('src',brandImg);
		$(".selectedBrandLi").show();
		//$(".selectedModalLi").hide();
		$(".allissue").remove();
		$(".estimated_price").text('0'); 
						
						
		jQuery('.getBrandModal .repair-box').removeClass('active'); 
		jQuery('#brand_'+bid).addClass('active');
		$.ajax({
			type: "POST",
			url: site_url+"sell/getBrandModal",
			data:'id='+bid,
			success: function(data){
				jQuery('#ModaLS').html(data);
				jQuery('#srorder_2').removeClass('d-none');
				jQuery('#srorder_1').addClass('d-none');


			//--------- Mobile Modal------------- //

			$('.selectModal').click(function(){


				$('#IssuES').html('<img class="loder1" style="display: none; margin-left: 18%;" src="https://pcgarage.uk.com/uploads/loder/loder1.gif" class="img-fluid" alt="">');
				var bid=$(this).data('mbrandid');
				var mid=$(this).data('modalid');
												
				$(".modal-n").val(mid);

				var modalImg = $(".brandModalImg_"+mid).attr('src');
				var modalName = $(".brandModalName_"+mid).text();
				
				$(".selectedModalImg").attr('src',modalImg);

				$(".selectedModalName").text(modalName);
				$(".selectedModalLi").show();
				$(".allissue").remove();
				$(".estimated_price").text('0');

				jQuery('.selectModal .repair-box').removeClass('active'); 
												
				jQuery('#srorder_3').removeClass('d-none');
				jQuery('#srorder_2').addClass('d-none');									
				
			//-----End-----//

			//-------Memory------//

			$(document).on('click','.memory',function(){

				var memory 		=	$(this).data('memory');
				var memoryId 	= 	$(this).data('memoryid');
				var memoryName	=	$(this).data('memoryname');
				var memory_img 	=	$('#memory_img_'+memoryId).attr('src');

				$('.memory-n').val(memory);

				$('.memory .repair-box').removeClass('active'); 
				$('#memory_div_'+memoryId).addClass('active');

				$(".selectedMemoryImg").attr('src',memory_img);
				$(".selectedMemoryName").text(memoryName);
				$(".selectedModalLi").show();

				$('#srorder_3').addClass('d-none');
				$('#srorder_4').removeClass('d-none');

			//----------End---------------//

			//--Does the mobile switch on--//

				$('.phoneswitch').click(function(){

					$('.phone-n').val($(this).val());
											
					$(".switchonoff").show();				
											
					if($(this).val() == 1)
					{
					   $(".switchonoffName").text('Yes'); 						
					}

					else
					{
						$(".switchonoffName").text('No'); 				
							
					}

					jQuery('#srorder_5').removeClass('d-none');
					jQuery('#srorder_4').addClass('d-none');
											
			});

		//-------End-------//


		});
												
			jQuery('#MOdal_'+mid).addClass('active');
			$.ajax({
				type: "POST",
				url: site_url+"sell/isssues",
				data:'id='+mid,
				success: function(data){
					jQuery('#IssuES').html(data);
																
//                  jQuery('#srorder_4').removeClass('d-none');
//					jQuery('#srorder_3').addClass('d-none');

//-------------select Issues--------------------//
																
		 	$('.selectIssue').click(function(){				
												
												
			var issueId		=	$(this).data('missueid');
			var issuePrice	=	$(this).data('missueprice');
			var issue 		=	$('#issue').val();

			var issueImg = $(".selectedIssueImg_"+issueId).attr('src');
			var issueName = $(".selectedIssueName_"+issueId).text();


			if(issue.indexOf(issueName) == -1)
			{
				var issue_str = issue+(issue.length>0?',':'')+issueName;					
				$('#issue').val(issue_str);
			}
												
			$(".orderform").prepend('<input type="hidden" name="issue[]"  class="issue-n issue_n_'+issueId+'" value="'+issueId+'">');
			
								
	//            $(".selectedModalImg").attr('src',modalImg);
	//            $(".selectedModalName").text(modalName);
	//            $(".selectedModalLi").show();
				 
				var html = '';
				var html2 = '';
			    html = '<li class="media allissue singleIssue_'+issueId+'"><img class="d-flex" src="'+issueImg+'" alt="" /><div class="media-body">'+issueName+'<a href="javascript:void(0);" onclick="removeissue('+issueId+','+issuePrice+',\''+issueName+'\');" class="pull-right"><img class="m-0" src="'+site_url+'lib/frontend/img/cross.png" alt="" /></a></div></li>';  
				html2 = '<div class="col-sm-6 m-0 allissue singleIssue_'+issueId+'"><div class="media"><img class="d-flex mr-3" style="width:15px;" src="'+issueImg+'" alt="" /><div class="media-body">'+issueName+'</div></div></div>';
				
					  
				var totalPrice = $(".estimated_price").text();

			if ($('#IssUes_'+issueId).hasClass('active'))
			{

				totalPrice = parseInt(totalPrice) - parseInt(issuePrice);
				$(".singleIssue_"+issueId).remove();
				//$(".issue_n_"+issueId).remove();
				jQuery('#IssUes_'+issueId).removeClass('active');
			} 

			else
			{
				$('#myModal3').modal('toggle');
					 totalPrice = parseInt(totalPrice) + parseInt(issuePrice);
				$('.IssueList').append(html);   
				$('.lastpage').append(html2);   
			  	jQuery('#IssUes_'+issueId).addClass('active');
			}
					  
				$(".estimated_price").text(totalPrice);
				  
				$(".total_price1").each(function( index1 ) {
				var service_price = $(this).text();

				var totalPrice1 = $(".estimated_price").text();
				var total_service = parseInt(totalPrice1) + parseInt(service_price);

				$(".total_price2").each(function( index ) {

				 if(index == index1)
				 {
					$(this).text(total_service); 
				 }

				});


					});
				
				}); 

//---------------End------------------------------//

				$(document).on('click','.accessories',function(){


					var acc_id 		=	$(this).data('accessoriesid');
					var acc_name 	= 	$(this).data('accessoryname');					
					var acc_img 	=	$('#acc_img_'+acc_id).attr('src');
					var accessories =	$('#accessory').val();

					if(accessories.indexOf($(this).attr('data-accessoryname')) == -1)
					{

						var acc_str = accessories+(accessories.length>0?',':'')+acc_name;					
						
						$('#accessory').val(acc_str);
					}

					var html = '';
					var html2 = '';
				    html = '<li class="media allaccessories singleAccessory_'+acc_id+'"><img class="d-flex" src="'+acc_img+'" alt="" /><div class="media-body">'+acc_name+'<a href="javascript:void(0);" onclick=javascript:removeAccessories("'+acc_name+'",'+acc_id+'); class="pull-right"><img class="m-0" src="'+site_url+'lib/frontend/img/cross.png" alt="" /></a></div></li>';  
					html2 = '<div class="col-sm-6 m-0 allaccessories singleAccessory_'+acc_id+'"><div class="media"><img class="d-flex mr-3" style="width:15px;" src="'+acc_img+'" alt="" /><div class="media-body">'+acc_name+'</div></div></div>';

					if ($('#acc_div_'+acc_id).hasClass('active'))
					{						
						$(".singleAccessory_"+acc_id).remove();
						//$(".issue_n_"+issueId).remove();
						jQuery('#acc_div_'+acc_id).removeClass('active');
					} 

					else
					{						
						$('.IssueList').append(html);   
						$('.lastpage').append(html2);   
					  	jQuery('#acc_div_'+acc_id).addClass('active');
					}
/*
					$('.acc-n').val(acc_name);

					$('.accessories .repair-box').removeClass('active'); 
					$('#acc_div_'+acc_id).addClass('active');

					$(".selectedAccImg").attr('src',acc_img);
					$(".selectedAccName").text(acc_name);
					$(".selectedModalLi").show();

					$('#srorder_5').addClass('d-none');
					$('#srorder_6').removeClass('d-none');*/

				});

						}
					});
				});
			}
		});
	});
});

function removeAccessories(acc_name,accId) 
{
	
	var acc_array 	= 	[];
	var acc_str 	=	'';

	acc_array 		=	$('#accessory').val().split(',');

	for(var i=0; i<acc_array.length;i++)
	{

		if(acc_array[i] != acc_name)
		{			
			var acc_str = acc_array[i]+(acc_str.length>0?',':'')+acc_str;			
			
		}

	}

	$('#accessory').val(acc_str);

	$(".singleAccessory_"+accId).remove();
	jQuery('#acc_div_'+accId).removeClass('active');
}
 
 
 function removeissue(issueId,issuePrice,issueName)
{
  	var totalPrice 		= $(".estimated_price").text();
  	totalPrice 			= parseInt(totalPrice) - parseInt(issuePrice);

  	var issue_array 	= 	[];
 	var issue_str 		=	'';

  	issue_array 		=	$('#issue').val().split(',');

	for(var i=0; i<issue_array.length;i++)
	{

		if(issue_array[i] != issueName)
		{			
			var issue_str = issue_str+(issue_str.length>0?',':'')+issue_array[i];		
			
		}

	}
	

	$('#issue').val(issue_str);


      $(".estimated_price").text(totalPrice);      
      
      $(".issue_n_"+issueId).remove();      
      
      $(".total_price1").each(function( index1 ) {
        var service_price = $(this).text();
        
       var totalPrice1 = $(".estimated_price").text();
       var total_service = parseInt(totalPrice1) + parseInt(service_price);
     $(".total_price2").each(function( index ) {
         if(index == index1)
         {
            
        $(this).text(total_service); 
         }
         
     });
          
          
});
       
      
$(".singleIssue_"+issueId).remove();
jQuery('#IssUes_'+issueId).removeClass('active');
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
      $("#myModal3").modal('hide');
      jQuery('#srorder_6').removeClass('d-none');
      jQuery('#srorder_5').addClass('d-none');
     
 }
 function changeValue1()
 {
//      $("#myModal3").modal('hide');
      jQuery('#srorder_7').removeClass('d-none');
      jQuery('#srorder_6').addClass('d-none');
     
 }
 
 $(document).ready(function()
 {
    if(brand_id_c > 0)
    {
        getstart(brand_id_c);
    }

    if(userId)
    {    	
    		$.ajax({

		     url:  site_url+'sell/getUserDetailById',
		     type: 'POST',
		     dataType: 'json',
		     data : {userId: userId},
		     success : function (data){

		     	if(data)
		     	{
		     		//$('#login_success').show();
		     		//$('#login_error').hide();
		     		$('#sell_login_div').hide();
		     		$('#site_user_id').val(data.user_id);
		     		$('#ctitle').val(data.title);
		     		$('#cname').val(data.first_name);
		     		$('#sname').val(data.surname);
		     		$('#email').val(data.email);
		     		$('#phone').val(data.phone);
		     		$('#chouseno').val(data.house_no);
		     		$('#cstreetaddress').val(data.street);
		     		$('#ctown').val(data.city);
		     		$('#country').val(data.country);
		     		$('#postcode').val(data.postcode);
		     		$('.password_div').hide();
		     		$('.cpassword_div').hide();
		     		$('#password').removeAttr('required');
		     		$('#cpassword').removeAttr('required');

		     	}

		     	else
		     	{
		     		$('#login_error').show();
		     		$('#login_success').hide();		     		
		     	}

		      }
  		 });
    }
 });

 $('#sell_login_form').submit(function(e){

    $.ajax({

     url:  site_url+'sell/getUserDetail',
     type: 'POST',
     dataType: 'json',
     data : $(this).serialize(),
     success : function (data){

     	if(data)
     	{
     		$('#login_success').show();
     		$('#login_error').hide();
     		$('#sell_login_div').hide();
     		$('#site_user_id').val(data.user_id);
     		$('#ctitle').val(data.title);
     		$('#cname').val(data.first_name);
     		$('#sname').val(data.surname);
     		$('#email').val(data.email);
     		$('#phone').val(data.phone);
     		$('#chouseno').val(data.house_no);
     		$('#cstreetaddress').val(data.street);
     		$('#ctown').val(data.city);
     		$('#country').val(data.country);
     		$('#postcode').val(data.postcode);
     		$('.password_div').hide();
     		$('.cpassword_div').hide();
     		$('#password').removeAttr('required');
     		$('#cpassword').removeAttr('required');

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