<div class="search-all">
    <div class="row" style="margin:6px auto;">

        <div class="col-md-8 col-sm-8">
            <form method="get" action="{{ URL::route('search-arenas') }}" class="form-inline">
                <div class="form-group others">
                    <label>Price</label>
                    <select class="form-control" name="price">
                      <option value="0">Select Minimum Price</option>
                      <?php for($i=0; $i<=5; $i++): ?>
                        <option value="<?php echo 1000 + (200*$i); ?>"><?php echo 1000 + (200*$i)."+"; ?></option>
                      <?php endfor; ?>
                    </select>
                </div>

                <div class="form-group others">
                    <label>Location</label>
                    <select class="form-control" name="location">
                      <option value="">Select City</option>
                      <?php $location = Arena::distinct("address")->get(); ?>
                      <?php foreach($location as $location): ?>
                          <?php if(!empty($location->address)): ?>
                            <option><?php echo $location->address; ?></option>
                          <?php endif; ?>
                      <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group others">
                    <label>Time</label>
                    <input type="text" id="start_time" name="start_time" placeholder="From" class="form-control" style="width:90px;">
                    <input type="text" id="end_time" name="end_time" placeholder="To" class="form-control" style="width:90px;">
                </div>

                <button type="submit" class="btn btn-success btn-large">Search</button>

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