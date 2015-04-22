
 <tr >
                    <td data-th="Role">
                      <?php echo $key->start_time; ?>--<?php echo $key->end_time; ?>
                    </td>
                      @if($flag==1) 
                      <td data-th="Add to Page">
                        <input  type="button"  class="btn btn-danger"  value="Booked" >
                      </td>
                      @else
                      <td data-th="Add to Page">
                        <input  type="button"  class="btn btn-primary"  value="Available" >
                      </td>
                      @endif

                      
                      @if($flag==1) 
                        <?php $user= User::where('id',$getuser)->get();   
                      ?>
                      <td data-th="Configure">
                          <input  type="button"  class="btn btn-danger"  value="<?php  echo $user[0]->name; ?>" >
                      </td>
                      @else
                      <td data-th="Configure">
                        <!-- Button trigger modal -->
<button type="button"  class="btn btn-success"   data-toggle="modal" data-target="#myModal">
Book
</button>
                   <div class="modal fade" role="dialog"  id="myModal" >
                         
                                  <div class="modal-dialog">
                                    <div class="modal-content">

                                       <div class="first-dai">
                                      <div class="modal-header" style="color:#F43C12;">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                       
                                        <h1 class="modal-title">Choose Booking Type</h1>
                                        <h5><a href="{{ URL::route('helpme') }}">Help Me?</a></h5>
                                      </div>                                      <div class="modal-body" style="color:#F43C12;">
                                      <div class="row">
                                      <div class="col-md-6"> <a href="#"  onclick="myFunction('<?php echo $arena->phone; ?>')"style="background-image:url(<?php echo asset('/assets/img/phoneicon.png'); ?>); background-position:center 20%; display:block; height:131px; max-width:100%; margin:0 auto; background-repeat: no-repeat;"></a></div>
                     <?php if(Auth::check()):?>
                                        <div class="col-md-6"> <a href="#" onclick="mychange('second-dai')" style="background-image:url(<?php echo asset('/assets/img/Esewalogo.jpg'); ?>); background-position:center 20%; display:block; height:131px; max-width:100%; margin:0 auto; background-repeat: no-repeat;"></a></div>
                                        <div class="col-md-6"> <a href="#" style="background-image:url(<?php echo asset('/assets/img/gpoints.jpg'); ?>); background-position:center 20%; display:block; height:131px; max-width:100%; margin:0 auto; background-repeat: no-repeat;"></a></div>
                      <?php else: ?>
                                      <div class="col-md-6"><a href="#" onclick="myerror()" style="background-image:url(<?php echo asset('/assets/img/Esewalogo.jpg'); ?>); background-position:center 20%; display:block; height:131px; max-width:100%; margin:0 auto; background-repeat: no-repeat;"></a></div>
                                        <div class="col-md-6"> <a href="#" onclick="myerror()" style="background-image:url(<?php echo asset('/assets/img/gpoints.jpg'); ?>); background-position:center 20%; display:block; height:131px; max-width:100%; margin:0 auto; background-repeat: no-repeat;"></a></div>
                      <?php endif; ?>
                                      </div>
                                       </div>
                                       </div>
                                       <div class="second-dai" >
                                        <div class="modal-header" style="color:#F43C12;">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                       
                                        <h1 class="modal-title">Terms and Condition</h1>
                                        <h5><a href="{{ URL::route('helpme') }}">Help Me?</a></h5>
                                      </div>
                                           <div class="modal-body" style="color:#F43C12;">
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
                                            </div>
                                         
                                       </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close                                      </div>
                                    </div><!-- /.modal-content -->
                                  </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                      </td>
                      @endif
                    <td data-th="View">
                    @if($flag==1) 
                    Rs.<?php echo $price; ?>
                      @else
                      Rs.<?php echo $key->price; ?>
                    @endif  
                    </td>
                  
              </tr>
