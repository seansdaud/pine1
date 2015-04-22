<div class="search-all">
    <div class="row" style="margin:6px auto;">

        <div class="col-md-8 col-sm-8">
            <form method="get" action="{{ URL::route('search-arenas') }}" class="form-inline">
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group others" style="width:100% !important;">
                    <select class="form-control" style="width:100%;" name="price">
                      <option value="0">Minimum Price</option>
                      <?php for($i=0; $i<=5; $i++): ?>
                        <option value="<?php echo 1000 + (200*$i); ?>"><?php echo 1000 + (200*$i)."+"; ?></option>
                      <?php endfor; ?>
                    </select>
                </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group others" style="width:100% !important;">
                    <select class="form-control" style="width:100%;" name="location">
                      <option value="">City</option>
                      <?php $location = Arena::select("address")->groupBy("address")->get(); ?>
                      <?php foreach($location as $location): ?>
                          <?php if(!empty($location->address)): ?>
                            <option><?php echo $location->address; ?></option>
                          <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group others">
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <input type="text" style="width:100%;" id="start_time" name="start_time" placeholder="From" class="form-control" >
                      </div>
                      <div class="col-md-6 col-sm-6 col-xs-6">
                        <input type="text" style="width:100%;" id="end_time" name="end_time" placeholder="To" class="form-control">
                      </div>
                    </div>
                </div>
                  </div>
                  <div class="col-md-2">

                <button type="submit" style="width:100% !important;" class="btn btn-success btn-large">Search</button>                    
                  </div>
                </div>
                

                

                


            </form>
        </div>

        <div class="col-md-4 col-sm-4">
          <div class="form-group" style="margin-bottom:0px;">
              <label class="control-label sr-only" for="inputGroupSuccess4">Input group with success</label>
              <div class="input-group">

                <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>

                <select class="select-arena form-control">
                  <option value=""><option>

                    <?php $field=User::where('usertype', 2)->get(); ?>
                    <?php if (!$field->isEmpty()):?>
                    <?php foreach ($field as $key ): ?>
                     
                      <?php if (!empty($key->arena->name)):?>
                        <option value="<?php echo $key->id; ?>"><?php echo ucfirst($key->arena->name); ?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  <?php endif; ?>
                  
                </select>
              </div>              
          </div>
        </div>
    </div>
</div>