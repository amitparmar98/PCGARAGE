var site_url=jQuery('#site_url').val();
var brand_id_c = jQuery('#brand_id_c').val();


function moveNextPrev(divId,currId){
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
	$(".selectedDeviceName").text(brandName);
      $(".selectedBrandLi").hide();
          $(".selectedModalLi").hide();
          
           $(".allissue").remove();
           $(".estimated_price").text('0');
           $(".device-n").val(PID);
           
           
           
     
	$('#BranDS').html('<img class="loder1" style="display: none; margin-left: 18%;" src="<?php echo base_url(); ?>uploads/loder/loder1.gif" class="img-fluid" alt="">');
        
	$.ajax({
		type: "POST",
		url: site_url+"repair/getBrand",
		data:'id='+PID,
		success: function(data){
			jQuery('#BranDS').html(data);
			jQuery('#srorder_2').removeClass('d-none');
	jQuery('#srorder_0').addClass('d-none');
	jQuery('#srorder_1').addClass('d-none');
			$('.getBrandModal').click(function(){
				var bid=$(this).data('brandid');
				var brandName1=$(this).data('brandname1');
                            $('#ModaLS').html('<img class="loder1" style="display: none; margin-left: 18%;" src="<?php echo base_url(); ?>uploads/loder/loder1.gif" class="img-fluid" alt="">');
                             
				 var brandImg = $(".brand1_img_"+bid).attr('src');
					$(".selectedBrandImg").attr('src',brandImg);
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
                                                         $('#IssuES').html('<img class="loder1" style="display: none; margin-left: 18%;" src="<?php echo base_url(); ?>uploads/loder/loder1.gif" class="img-fluid" alt="">');
                                                          var modalImg = $(".brandModalImg_"+mid).attr('src');
                                                            var modalName = $(".brandModalName_"+mid).text();
                                                            
                                                            $(".selectedModalImg").attr('src',modalImg);
                                                            $(".selectedModalName").text(modalName);
                                                            $(".selectedModalLi").show();
                                                            
                                                             $(".allissue").remove();
                                                                $(".estimated_price").text('0');
                                                        
                                                         $(".modal-n").val(mid);
                                                        
                                                        
							jQuery('.selectModal .repair-box').removeClass('active'); 
							jQuery('#MOdal_'+mid).addClass('active');
                                                           jQuery('#srorder_4').removeClass('d-none');
						jQuery('#srorder_3').addClass('d-none');
                                                
                                                $('.phoneswitch').click(function(){
                                                    
                                                $(".switchonoff").show();
                                                $(".switchonoffimg").attr('src',imgt);
                                                
                                                if($(this).val() == 1)
                                                {
                                                   $(".switchonoffName").text('Yes'); 
                                                     jQuery('#srorder_5').removeClass('d-none');
						jQuery('#srorder_4').addClass('d-none');
                                                }
                                                else
                                                {
                                                    $(".switchonoffName").text('No'); 
                                                    
                                                        jQuery('#srorder_5').removeClass('d-none');
						jQuery('#srorder_4').addClass('d-none');
                                                }
                                                    
                                                });
                                                        
							$.ajax({
								type: "POST",
								url: site_url+"repair/isssues",
								data:'id='+mid,
								success: function(data){
									jQuery('#IssuES').html(data);
                                                                        
//                                                                        jQuery('#srorder_4').removeClass('d-none');
//						jQuery('#srorder_3').addClass('d-none');
                                                                        
                                                                       $('.selectIssue').click(function(){
							
                                                      
                                                       var issueId=$(this).data('missueid');
							var issuePrice=$(this).data('missueprice');
                                                        
                                                        
                                                        $(".orderform").prepend('<input type="hidden" name="issue[]"  class="issue-n issue_n_'+issueId+'" value="'+issueId+'">');
                                                        
                                                          var issueImg = $(".selectedIssueImg_"+issueId).attr('src');
                                                            var issueName = $(".selectedIssueName_"+issueId).text();
                                                            
//                                                            $(".selectedModalImg").attr('src',modalImg);
//                                                            $(".selectedModalName").text(modalName);
//                                                            $(".selectedModalLi").show();
                                                         
                                                            var html = '';
                                                            var html2 = '';
                                                            html = '<li class="media allissue singleIssue_'+issueId+'"><img class="d-flex" src="'+issueImg+'" alt="" /><div class="media-body">'+issueName+'<a href="javascript:void(0);" onclick=javascript:removeissue('+issueId+','+issuePrice+'); class="pull-right"><img class="m-0" src="'+site_url+'lib/frontend/img/cross.png" alt="" /></a></div></li>';  
                                                            html2 = '<div class="col-sm-6 m-0 allissue singleIssue_'+issueId+'"><div class="media"><img class="d-flex mr-3" style="width:15px;" src="'+issueImg+'" alt="" /><div class="media-body">'+issueName+'<span class="price">£ '+issuePrice+'</span></div></div></div>';
													    
                                                                  
                                                        var totalPrice = $(".estimated_price").text();
                                                         if ($('#IssUes_'+issueId).hasClass('active')){
                                                             
                                                                    totalPrice = parseInt(totalPrice) - parseInt(issuePrice);
                                                                    $(".singleIssue_"+issueId).remove();
                                                                    $(".issue_n_"+issueId).remove();
                                                                    jQuery('#IssUes_'+issueId).removeClass('active');
                                                                } else {
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
                                                                  
                                                                   $('.accessories').click(function(){
                                                                         html33 = '<li class="media issue_next_button" style="">\n\
                                                                            <div class="row">\n\
                                                                               </div>                                                                 <div class="col-md-12" style="text-align: center;">\n\
									<button type="button" onclick="changeValue1();" style="border-radius: 20px;padding: 10px 45px;font-size: 14px;background: #003150;" class="btn btn-primary">Next</button>\n\
                                                                                </div>\n\
                                                                            </li>';	
                                                                       var aid=$(this).data('accessoriesid');
                                                                        var accImg = $(".accImg_"+aid).attr('src');
                                                                        var accName = $(".accName_"+aid).text();
                                                                        
                                                                                if ($('#acclist_'+aid).hasClass('active')){
                                                                                     $(".accId_"+aid).remove();
                                                                                     $(".acc_n_"+aid).remove();
                                                                    jQuery('#acclist_'+aid).removeClass('active');
                                                                } else {
                                                                        html = '<li class="media allacc accId_'+aid+'"><img class="d-flex" src="'+accImg+'" alt="" /><div class="media-body">'+accName+'<a href="javascript:void(0);" class="pull-right"></a></div></li>';  
                                                                    
                                                                           $('.issue_next_button').remove();
                                                                           
                                                                      $(".orderform").prepend('<input type="hidden" name="accessories[]"  class="acc_n_'+aid+'" value="'+accName+'">');
                                                                      
                                                                     $('.IssueList').append(html);
                                                                     $('.IssueList').append(html33);
                                                                  jQuery('#acclist_'+aid).addClass('active');
                                                                  }
                                                                            
                                                                        
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

/* for getting brands like iphone,samsung,sony etc... */
$('.sertab').click(function(){
    var serid = $(this).data('serviceid');
       
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
    
    $('#BranDS').html('<img class="loder1" style="display: none; margin-left: 18%;" src="<?php echo base_url(); ?>uploads/loder/loder1.gif" class="img-fluid" alt="">');
	var bid=$(this).data('brandid');
     var imgt = $(".brand_img_"+bid).attr('src');
	var brandName = $(".brand_name_"+bid).text();
	$(".selectedDeviceImg").attr('src',imgt);
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
                                $('#ModaLS').html('<img class="loder1" style="display: none; margin-left: 18%;" src="<?php echo base_url(); ?>uploads/loder/loder1.gif" class="img-fluid" alt="">');
       var brandImg = $(".brand1_img_"+bid).attr('src');
	var brandName1=$(this).data('brandname1');
        $(".selectedBrandName").text(brandName1);
        
	$(".selectedBrandImg").attr('src',brandImg);
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
                                                     $('#IssuES').html('<img class="loder1" style="display: none; margin-left: 18%;" src="<?php echo base_url(); ?>uploads/loder/loder1.gif" class="img-fluid" alt="">');
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
                                                        
                                                                  jQuery('#srorder_4').removeClass('d-none');
						jQuery('#srorder_3').addClass('d-none');
                                                
                                                $('.phoneswitch').click(function(){
                                                    
                                                $(".switchonoff").show();
                                                $(".switchonoffimg").attr('src',imgt);
                                                
                                                if($(this).val() == 1)
                                                {
                                                   $(".switchonoffName").text('Yes'); 
                                                     jQuery('#srorder_5').removeClass('d-none');
						jQuery('#srorder_4').addClass('d-none');
                                                }
                                                else
                                                {
                                                    $(".switchonoffName").text('No'); 
                                                    
                                                        jQuery('#srorder_5').removeClass('d-none');
						jQuery('#srorder_4').addClass('d-none');
                                                }
                                                    
                                                });
                                                        
							jQuery('#MOdal_'+mid).addClass('active');
							$.ajax({
								type: "POST",
								url: site_url+"repair/isssues",
								data:'id='+mid,
								success: function(data){
									jQuery('#IssuES').html(data);
                                                                        
//                                                                        jQuery('#srorder_4').removeClass('d-none');
//						jQuery('#srorder_3').addClass('d-none');
                                                                        
                                                                           $('.selectIssue').click(function(){
							
                                                        
                                                        
							var issueId=$(this).data('missueid');
							var issuePrice=$(this).data('missueprice');
                                                        
                                                        $(".orderform").prepend('<input type="hidden" name="issue[]"  class="issue-n issue_n_'+issueId+'" value="'+issueId+'">');
                                                        
                                                          var issueImg = $(".selectedIssueImg_"+issueId).attr('src');
                                                            var issueName = $(".selectedIssueName_"+issueId).text();
                                                            
//                                                            $(".selectedModalImg").attr('src',modalImg);
//                                                            $(".selectedModalName").text(modalName);
//                                                            $(".selectedModalLi").show();
                                                         
                                                            var html = '';
                                                            var html2 = '';
                                                            html = '<li class="media allissue singleIssue_'+issueId+'"><img class="d-flex" src="'+issueImg+'" alt="" /><div class="media-body">'+issueName+'<a href="javascript:void(0);" onclick=javascript:removeissue('+issueId+','+issuePrice+'); class="pull-right"><img class="m-0" src="'+site_url+'lib/frontend/img/cross.png" alt="" /></a></div></li>';  
                                                            html2 = '<div class="col-sm-6 m-0 allissue singleIssue_'+issueId+'"><div class="media"><img class="d-flex mr-3" style="width:15px;" src="'+issueImg+'" alt="" /><div class="media-body">'+issueName+'<span class="price">£ '+issuePrice+'</span></div></div></div>';
													    
                                                                  
                                                        var totalPrice = $(".estimated_price").text();
                                                         if ($('#IssUes_'+issueId).hasClass('active')){
                                                                    totalPrice = parseInt(totalPrice) - parseInt(issuePrice);
                                                                    $(".singleIssue_"+issueId).remove();
                                                                    $(".issue_n_"+issueId).remove();
                                                                    jQuery('#IssUes_'+issueId).removeClass('active');
                                                                } else {
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
 
 
 function removeissue(issueId,issuePrice)
 {
      var totalPrice = $(".estimated_price").text();
      totalPrice = parseInt(totalPrice) - parseInt(issuePrice);
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
 });