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
                                      <div class="modal-header" style="color:#F43C12;">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h1 class="modal-title">Choose Booking Type</h1>
                                      </div>
                                      <div class="modal-body" style="color:#F43C12;">
                                      <div class="row">
                                        <div class="col-md-6"> <a href="#" style="background-image:url(<?php echo asset('/assets/img/Esewalogo.jpg'); ?>); background-position:center 20%; display:block; height:131px; max-width:100%; margin:0 auto; background-repeat: no-repeat;"></a>
</div>
<div class="col-md-6"> <a href="#"  onclick="myFunction(<?php echo $arena->phone; ?>)"style="background-image:url(<?php echo asset('/assets/img/phoneicon.png'); ?>); background-position:center 20%; display:block; height:131px; max-width:100%; margin:0 auto; background-repeat: no-repeat;"></a>
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
