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
                           <h2>Login</h2>
                        </div>
                        <div class="col-md-6 mb-5" style="margin: auto;">
                           <form action="<?php echo base_url('login/chkLogin');?>" method="POST">
                              <div class="row">
                                 <div class="col-md-12 sellinputholder">
                                    <input class="form-control form-control1" required="" name="uemail" placeholder="Email" type="email">
                                 </div>
                                 <div class="col-md-12 sellinputholder">
                                    <input class="form-control form-control1" required="" name="upassword" placeholder="Password" type="password">
                                    <a href="<?php echo base_url('login/forgotPassword');?>" style="float: right;">Forgot Password</a>
                                 </div>
                                 <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btnSellLogin">Login</button>
                                    
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

