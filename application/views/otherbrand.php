<?php $this->load->view('front/header'); ?>
<style>
   .heading h4{
   text-align: center;
   margin-bottom: 50px;
   font-weight:900;
   font-size: 24px;
   }
   .form-brand{
   font-size: 12px;
   margin-bottom: 15px;
   height: calc(2.25rem + 2px);
   }
   .form-problem{
   font-size: 12px;
   margin-bottom: 15px;
   }
   .form-name{
   font-size: 12px;
   margin-bottom: 15px;
   height: calc(2.25rem + 2px);
   }
   .form-add{
   font-size: 12px;
   margin-bottom: 25px;
   height: calc(2.25rem + 2px);
   }
   .btn-blue {
   background: #03304F !important;
   color: #fff;
   font-size: 14px;
   }
   .btn-block {
   display: block;
   width: 100%;
   }
</style>
<main role="main-wrapper" class="inner-page-holder py-70">
   <div class="container">
      <div class="row">
         <div class="col-md-9" style="margin:auto;">
            <div class="white_bg_custom">
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
               <div class="px-5 py-5" style="background-color:#ffffff;">
                  <div class="heading text-center">
                     <h4>Please fill the form to get your reference number for walk in service! </h4>
                  </div>
                  <form method="post" class="form-group" id="" action="<?php echo base_url('repair/otherBrand');?>">
                      <div class="row form-brand">
                         <div class="col-md-6">
                            <input class="form-control" required name='brand' placeholder="Brand" type="text" value="<?php echo set_value('brand');?>">
                         </div>
                         <div class="col-md-6">
                            <input class="form-control" name='model' required   placeholder="Model" type="text" value="<?php echo set_value('model');?>">
                         </div>
                      </div>
                      <div class="row form-problem">
                         <div class="col-md-12">
                            <textarea name="issue" id="issue" cols="30" rows="10" placeholder="Problem" required="" class="form-control" style="height: 100px;"><?php echo set_value('issue');?></textarea>
                         </div>
                      </div>
                      <div class="row form-name">
                         <div class="col-md-6">
                            <input class="form-control" name='cname' placeholder="Name" type="text" required="" value="<?php echo set_value('cname');?>">
                         </div>
                         <div class="col-md-6">
                            <input class="form-control" name='email' placeholder="Email" type="email" required="" value="<?php echo set_value('email');?>">
                         </div>
                      </div>
                      <div class="row form-add">
                         <div class="col-md-6">
                            <textarea name="address" id="address" cols="30" rows="10" placeholder="Address" class="form-control" style="height: 39px;" required="" ><?php echo set_value('address');?></textarea>
                         </div>
                         <div class="col-md-6">
                            <input class="form-control phone" name='phone' placeholder="Phone" type="text" required="" value="<?php echo set_value('phone');?>">
                            <i class="form-control-feedback phone_error" data-fv-icon-for="" style="display: none; color: red;">Phone No should be 10 digit!</i>
                         </div>
                      </div>
                      <div class="row">
                         <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary" style="border-radius: 20px;padding: 10px 45px;font-size: 14px;background: #003150;">SEND</button>
                         </div>
                      </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>
<?php $this->load->view('front/footer'); ?>

<script src="<?php echo base_url(); ?>lib/frontend/js/custom.js"></script>

