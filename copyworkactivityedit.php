<div style="display: none" id="toCopyDiv">
      <div id="clonedInput1"  class=" col-sm-12 form_pad clonedInput repeatingSection tocopy">
      <input type="hidden" name="workactivity_a_id_1" id="workactivity_a_id_1" value="1" />
      <input type="hidden" name="hazardsCount[]" id="hazardsCount" value="1" />




        <div class="col-sm-7" id="workActivityNameCopy"><h3 class="workActivityNameCopy">Work Activity</h3></div>
		<div class="col-sm-5">
           <button class="col-sm-5 btn btn-danger deleteWorkActivity" style="margin-left:5px; margin-top:15px;">Remove work activity</button>
        </div>



                    <div class="col-sm-12">
                        <hr class="add_risk" />
                        <div class="col-sm-12 form-row">
                            <label class="col-sm-3" style="padding-left:0px;">Work Activity Name:</label>
                            <input class="col-sm-9" type="text" id="inputSaving" name="work_activity[]"  placeholder="" required />
                        </div>
                       <div class="clearfix"></div>
                       <hr class="add_activity"/>

                    </div>

                  <div class="col-sm-12 hazardSection hazardSectionCopy">



                        <div class="col-sm-6">
                          <div class="form-row">
                            <label class="col-sm-6">Hazard:</label>
                            <input rows="2" class="col-sm-6" type="text" id="inputSaving" name="Hazard[]"  placeholder="" required></input>
                          </div>
                          <div class="form-row">
                            <label class="col-sm-6">Possible Injury / Accident:</label>
                            <input rows="2" class="col-sm-6" type="text" id="inputSaving" name="InjuryAccident[]" placeholder="" required></input>
                          </div>
                          <div class="form-row">
                            <label class="col-sm-6">Existing Risk Control:</label>
                           <textarea class="col-sm-6" type="text" id="inputSaving" name="ExistingRiskControl[]" style="height:65px" placeholder=""></textarea>

                          </div>

                           <?php create_options_edit_copy("",$asTemplate); ?>

                          <div class="form-row">
                            <label class="col-sm-6">Action Date:</label>
                            <select class="col-sm-2 btn btn-default" id="inputSaving" name="actionDate[]">
                               <?php for ($i=1; $i < 32; $i++)
                              {
                                # code...
                                ?>
                                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php
                              }
                             ?>
                            </select>

                            <select class="col-sm-2 btn btn-default" id="inputSaving" name="actionMonth[]">
                              <?php for ($i=1; $i < 13; $i++)
                              {
                                # code...
                                ?>
                                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php
                              }
                             ?>
                            </select>

                            <select class="col-sm-2 btn btn-default" id="inputSaving" name="actionYear[]">
                              <?php for ($i=2016; $i < 2025; $i++)
                              {
                                # code...
                                ?>
                                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php
                              }
                             ?>

                            </select>

                          </div>

                        </div>






                        <div class="col-sm-6">



                          <div class="form-row">
                            <label class="col-sm-6">Risk Level:</label>
                            <label class="col-sm-6 riskLevel"></label>

                          </div>

                          <div class="form-row">
                            <label class="col-sm-6">Additional Risk Control:</label>

                            <textarea class="col-sm-6" type="text" id="inputSaving" name="additionalRiskContro[]" style="height:65px;"></textarea>


                          </div>
                          <div class="clearfix"></div>

                          <?php create_options_edit_copy("Second",$asTemplate); ?>

                        </div>
                       <div class="clearfix"></div>


                       <hr class="add_activity"/>

                      <div>
                       <input type="hidden" name="hazardsActionOfficerCount[]" id="hazardsActionOfficerCount" value="0" />

                        <div class="row form-row">
   <div class="col-sm-12">
      <button class="col-sm-2 btn btn-primary addActionMember" id="add_new_member">+Action Officer</button>


    </div>
</div>

<div id="clonedInput1" class="row repeatingActionOfficer">

     <div class="col-sm-6">
        <div class="row">
          <label class="col-sm-6">Action Officer:</label>
          <select name="actionOfficer[]" class="col-sm-6" type="text" id="inputSaving" placeholder="">
            <?php foreach ($raMembers as $raMember) {
              echo "<option value=".$raMember["id"].">".$raMember["name"]."</option>";
            }?>
          </select>

         </div>
      </div>
      <button class="col-sm-1 btn btn-danger deleteActonOfficer" style="margin-left:20px;">Remove</button>

</div>
                      </div>


                      <div class="clearfix"></div>
                      <hr class="add_activity"/>


                        <div class="clearfix"></div>


                       <div class="clearfix"></div>
                       <button class="col-sm-2 btn btn-success addHazards" id="add_new_work">+ Add hazards</button>
                       <button class="col-sm-2 btn btn-danger pull-right deleteHazards">Remove Hazards</button>
                      <div class="clearfix"></div>
                        <hr class="add_activity"/>
                        <button class="col-sm-5 btn btn-success addWorkActivity" id="add_new_work" style="margin-top:15px;">+ Add a new work activity</button>
                  </div>
          </div>

</div>
