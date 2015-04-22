@extends('frontend.layout.main')

@section('content')
                                        <div class="modal-header" style="color:#F43C12;">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                       
                                        <h1 >Terms and Condition</h1>
                                        <h5><a href="{{ URL::route('helpme') }}">Help Me?</a></h5>
                                      </div>
                                           <div  style="color:#F43C12;">
                                                 <div class="row">
                                                                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                   tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                   quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                                   consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                                   cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                                   proident, sunt in culpa qui officia deserunt mollit anim id est laborum.                 
                                               
                                                 <?php $user= User::where('id',2)->get();   ?>
                                                <br/>
                                                <span class="">Time </span>:
                                                 <?php echo $key->start_time; ?>--<?php echo $key->end_time; ?>
                                                  <br/>
                                                  <span class="">Date </span>:
                                                 <?php echo $date; ?>
                                                 <br/>
                                                  <span class="">Arena </span>:
                                                 <?php echo $arena->name; ?>
                                                </div>
                                                <div class="row">
                                                <form action="http://dev.esewa.com.np/epay/main" method="post" class="form-horizontal" >
    
                                                       <div class="form-group">
                                                         <div class="checkbox"> <label><input type="checkbox" name="agree" id="agree" value="agree">I agree with these Terms and Conditions</label></div> <br/>
                                                       </div>
                                                       
                                                        <input value="<?php echo $key->price; ?>" name="tAmt" type="hidden">
                                                          <input value="<?php echo $key->price; ?>" name="amt" type="hidden">
                                                          <input value="0" name="txAmt" type="hidden">
                                                          <input value="0" name="psc" type="hidden">
                                                          <input value="0" name="pdc" type="hidden">
                                                          <input value="futsal" name="scd" type="hidden">
                                                          <input name="pid" value="newasd"   type="hidden" >
                                                          <input value="<?php echo URL::to('/success/'); ?>?q=su" type="hidden" name="su">
                                                          <input value="<?php echo URL::to('/failure/'); ?>?q=fu" type="hidden" name="fu">
                                                                                                            <div class="form-group">
                                                          <input type="submit" id="submitId" class="btn btn-primary" disabled="disabled" value="Accept & Book" />
                                                        </div>
                                                          {{ Form::token() }}
                                                     </form>

                                                </div>
                                            

@stop