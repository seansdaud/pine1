@extends('frontend.layout.main')

@section('content')
                                       
                                       <div class="row" style="margin-bottom:10px;">
												<div class="col-md-6">
													<div class="cat-name">
										                <span class="base schedule"> <h4 >Terms and Condition</h4></span>
										                <span class="arrow"></span>
									                </div>
												</div>
											</div>
                                       
                                        <h5><a href="{{ URL::route('helpme') }}">Help Me?</a></h5>
                                     
                                       <div class="row" style="margin-bottom:10px; margin-left:1%">



                                                                   Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                                   tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                                                   quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                                   consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                                                   cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                                                   proident, sunt in culpa qui officia deserunt mollit anim id est laborum.                 
                                               
                                                <br/>
                                                <span class="">Time </span>:
                                                 <?php echo $time; ?>
                                                  <br/>
                                                  <span class="">Date </span>:
                                                 <?php echo $date; ?>
                                                 <br/>
                                                  <span class="">Arena </span>:
                                                 <?php echo $name; ?>
                                               
                                                <form action="http://dev.esewa.com.np/epay/main" method="post" class="form-horizontal" >
    
                                                       <div class="form-group">
                                                         <div class="checkbox"> <label><input type="checkbox" name="agree" id="agree" value="agree">I agree with these Terms and Conditions</label></div> <br/>
                                                       </div>
                                                       
                                                        <input value="<?php echo $price; ?>" name="tAmt" type="hidden">
                                                          <input value="<?php echo $price; ?>" name="amt" type="hidden">
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
                                                </div>
                                            

@stop