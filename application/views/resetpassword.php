<?php $this->load->view('front/header'); ?>
<main role="main-wrapper" class="inner-page-holder">
   <div class="container">
      <section role="repair-holder">
         <div class="row mb-5">
            <div class="col-sm-12">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="heading">
                        <h4></h4>
                     </div>
                  </div>
               </div>
               <div class="white-bg mb-5">
                  <div class="px-5 mt-5">
                     <div class="row">
                        <div class="col-md-12">
                        	<?php
			                  if($this->session->flashdata('message'))
			                  {
			                     $message  = $this->session->flashdata('message');
			                  ?>
			               <div class="<?php echo $message['class'];?>" role="alert">
			                  <?php echo $message['message'];?>
			               </div>
			               <?php
			                  }
			                  
			                  ?>   
                           <h4>RESET PASSWORD</h4>
                        </div>
                        <div class="col-md-6 mb-5" style="margin: auto;">
                           <form action="<?php echo base_url('login/savePassword');?>" method="POST">
                              <div class="row">
                                  <div class="col-md-12">
                                    <input class="form-control form-control1" required="" name="password" placeholder="New Password" type="password">
                                    <input type="hidden" value="<?php echo isset($decode_email) ? $decode_email : ''?>" class="form-control form-control1" name="email">
                                 </div> 
                                 <div class="col-md-12">
                                    <input class="form-control form-control1" required="" name="cpassword" placeholder="Confirm Password" type="password">
                                 </div>                              
                                 <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>                                 
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
</main>
<?php $this->load->view('front/footer'); ?>

