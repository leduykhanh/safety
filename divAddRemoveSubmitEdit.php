<?php include_once 'config.php';
session_start();
include_once 'header.php';
if(!$_SESSION['adminid'])
{
    ?><script type="text/javascript">window.location.assign("index.php")</script>
    <?php
}

?>
  <style type="text/css">
    body { padding: 10px;}
    .clonedInput { border-radius: 5px; background-color: #def;}




    .red
    {
      color: red;
      font-size: 17px;
      font-weight: bolder;
    }
    .green
    {
      color: green;
      font-size: 17px;
      font-weight: bolder;
    }
    .yellow
    {
      color: yellow;
      font-size: 17px;
      font-weight: bolder;
    }

  </style>
 <script src="workactivity.js"></script>




<?php
if(isset($_GET['riskid']) && $_GET['riskid'] != '')
{
  $getRiskAssesmentSQl = "SELECT * FROM  `riskassessment` WHERE id = ".$_GET['riskid']."";
  $resultAllRiskAssesment=mysqli_query($con, $getRiskAssesmentSQl);
  $valueRisk = mysqli_fetch_assoc($resultAllRiskAssesment);

  //print_r($valueRisk);

  //get user details

  $getUserSQl = "SELECT * FROM  `staff_login` WHERE id = ".$valueRisk['createdBy']."";
  $resultAllUser=mysqli_query($con, $getUserSQl);
  $valueUser = mysqli_fetch_assoc($resultAllUser);


  //get all work activity
  $getAllWorkSql = "SELECT * FROM `workactivity` WHERE `riskId` = ".$valueRisk['id']."";
  $resultAllWork=mysqli_query($con, $getAllWorkSql);

  //get RA list
  $raMembers =(mysqli_query($con,"SELECT * FROM ramember"));

}
else
{

}
?>


<div class="container" style="border:2px solid black;">
<div style="border:1px solid #c0c0c0; padding:0 15px; float:left;">
<form method="post" action="riskmange.php?riskid=<?php echo $_GET['riskid'];?>" class="inlineForm" enctype="multipart/form-data">

    <?php
      $sqlRAMember = "SELECT * FROM  `ramember` WHERE  `id` in (select ramemberId  from risk_ramemeber where riskId =$_GET[riskid])";
      $resultRAMember=mysqli_query($con, $sqlRAMember);
      $numRAMamber =  mysqli_num_rows($resultRAMember);
      if($numRAMamber > 0)
      {

      }
      else
      {
        $numRAMamber = 1;
      }

    ?>
<input type="hidden" name="RA_MemberCount" id="RA_MemberCount" value="<?php echo $numRAMamber; ?>" />
   <input type="hidden" name="workactivityCount" id="workactivityCount" value="1" />


      <div class="col-sm-12 form_pad">
                <h3>Edit Risk Assessment</h3>
                <hr class="add_risk">
                <div class="col-sm-12 form-row">
                            <div class="col-sm-12">
                              <label class="col-sm-2">Project Title:</label>
                              <label class="col-sm-10"><input name="project_title" value="<?php echo $valueRisk['project_title'];?>"class="span4" type="text" id="inputSaving" placeholder="" required=""></label>
                            </div>
                </div>
                <div class="row form-row">
                    <div class="col-sm-6">
                        <div class="row">
                          <label class="col-sm-4">RA Leader:</label>
                          <label class="col-sm-8"><?php echo $valueUser['name']; ?></label>
                        </div>
                    </div>
                </div>

                <div class="row form-row">
                          <div class="col-sm-6">
							<div class="row">
                            <label class="col-sm-4">Company:</label>
                            <label class="col-sm-8">THI Engineering & Construction Pte Ltd</label>
                            </div>
                          </div>

                          <div class="col-sm-6">

                            <label class="col-sm-4">Reference No:</label>
                            <label class="col-sm-8">00<?php echo $valueRisk['id'];?></label>

                          </div>
                </div>


                <div class="row form-row">
                          <div class="col-sm-6">
<div class="row">
                            <label class="col-sm-4">Loaction:</label>
                            <label class="col-sm-8">
                              <textarea rows="2" name="location" class="span4" type="text" id="inputSaving" placeholder="" required value="<?php echo $valueRisk['location'];?>"><?php echo $valueRisk['location'];?></textarea></label>
                              </div>
                          </div>

                          <div class="col-sm-6">

                            <label class="col-sm-4">Creation Date:</label>
                            <label class="col-sm-8">
                               <input name="creationDate" class="span4 date" type="text" id="creationDate" placeholder="" required value="<?php echo date('d-m-Y', strtotime($valueRisk['createdDate']));?>"></label>


                            </label>

                          </div>
                </div>


                <div class="row form-row">
                            <div class="col-sm-6">
                            <div class="row">
                              <label class="col-sm-4">Risk Process:</label>
                              <label class="col-sm-8">
                                <textarea rows="2" name="process" class="span4" type="text" id="inputSaving" placeholder="" required value="<?php echo $valueRisk['process'];?>"><?php echo $valueRisk['process'];?></textarea>
                              </label>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <label class="col-sm-4">Expiry Date:</label>
                              <select  name="expiry_date">
                                <option value="1" selected>1</option>
                                <option value="2" >2</option>
                                <option value="3" >3</option>
                              </select>
                            </div>
                </div>
      </div>

<div class="row"><div class="col-sm-12"> <hr class="add_activity"></div></div>



        <button class="col-sm-2 btn btn-primary addMember" id="add_new_member" style="margin-bottom:10px">
        +Add RA Member</button>






              <?php

              if(mysqli_num_rows($resultRAMember) > 0)
              {


               while($valueRAMember = mysqli_fetch_assoc($resultRAMember))
               {
              ?>

                <div id="clonedInput1" class=" col-sm-12 form-row clonedInput repeatingMember">

                    <div class="col-sm-6">
                        <label class="col-sm-4">RA Members:</label>
                        <label class="col-sm-8">
                          <select  name="RA_Member[]" class="span4" type="text" id="inputSaving" placeholder="">
                            <?php foreach ($raMembers as $raMember) {
                              $selected = $valueRAMember["id"] == $raMember["id"]?"selected":"";
                              echo "<option $selected value=".$raMember["id"].">".$raMember["name"]."</option>";
                            }?>
                          </select>
                        <!-- <input name="RA_Member[]" class="span4" type="text" id="inputSaving" placeholder="" value="<?php echo $valueRAMember['name'];?>"> -->
                        </label>
                    </div>
                    <button class="col-sm-1 btn btn-danger deleteMember">Remove</button>

              </div>
              <?php
              }

              }
              else
              {

                ?>
                   <div id="clonedInput1" class=" col-sm-12 form-row clonedInput repeatingMember">

                    <div class="col-sm-6">
                        <label class="col-sm-4">RA Members:</label>
                        <label class="col-sm-8">
                          <select  name="RA_Member[]" class="span4" type="text" id="inputSaving" placeholder="">
                            <?php foreach ($raMembers as $raMember) {
                              echo "<option  value=".$raMember["id"].">".$raMember["name"]."</option>";
                            }?>
                          </select>
                        <!-- <input name="RA_Member[]" class="span4" type="text" id="inputSaving" placeholder="" value=""> -->
                        </label>
                    </div>
                    <button class="col-sm-1 btn btn-danger deleteMember">Remove</button>

                  </div>

                <?php
              }
              ?>
<div class="clearfix"></div>
<div class="row"><div class="col-sm-12"> <hr class="add_risk"></div></div>




<?php include_once('copyworkactivityedit.php');?>



<?php
while($valueAllWork = mysqli_fetch_assoc($resultAllWork))
{
?>        <div id="clonedInput1" class="col-sm-12 form_pad clonedInput repeatingSection">
          <div class="row">
              <div class="col-sm-7"><h3 class="workActivityName">Work Activity</h3></div>
                <div class="5">
                   <button class="col-sm-2 btn btn-success addWorkActivity" id="add_new_work" style="margin-top:15px;">+ Add a new work activity</button>

                   <input type="hidden" name="workactivity_a_id_1" id="workactivity_a_id_1" value="" />

                   <?php
                   //get all work activity
                    $getAllHazardsSql = "SELECT * FROM `hazard` WHERE `work_id` = ".$valueAllWork['work_id']."";
                    $resultAllHazards=mysqli_query($con, $getAllHazardsSql);
                    $numHazards = mysqli_num_rows($resultAllHazards);
                    if($numHazards > 0)
                    {
                      $numHazardsCount = $numHazards;
                    }
                    else
                    {
                      $numHazardsCount =  1;
                    }

                   ?>
                   <input type="hidden" name="hazardsCount[]" id="hazardsCount" value="<?php echo $numHazardsCount;?>" />

                  <button class="col-sm-2 btn btn-danger  deleteWorkActivity" style="margin-left:5px; margin-top:15px;">Remove work activity</button>
                 </div>
                </div>
                    <hr class="add_risk" />
                    <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                        <div class="col-sm-12 form-row">
                        <div class="row">
                            <label class="col-sm-3" style="padding-left:29px;">Work Activity Name:</label>
                            <input class="col-sm-9" type="text" id="inputSaving" name="work_activity[]" value="<?php echo $valueAllWork['name'];?>" placeholder="" style="width:72%; margin-left:9px;" required>
                        </div>
                        </div>
                        </div>

                       <div class="clearfix"></div>
                       <hr class="add_activity"/>

                    </div>
                    </div>
 <?php

  while($valueAllHazards = mysqli_fetch_assoc($resultAllHazards))
  {
  ?>

                  <div class="col-sm-12 hazardSection">
                  <div class="row">
                        <div class="col-sm-6">
                         <div class="row">
                            <label class="col-sm-6">Hazard:</label>

                            <textarea rows="2" type="text" class="col-sm-6" id="inputSaving" name="Hazard[]" value="<?php echo $valueAllHazards['name'];?>" placeholder="" required><?php echo $valueAllHazards['name'];?></textarea>

                          </div>
                          <div class="row">
                            <label class="col-sm-6">Possible Injury / Accident:</label>

                            <input type="text" class="col-sm-6" id="inputSaving" name="InjuryAccident[]" value="<?php echo $valueAllHazards['accident'];?>" placeholder="" required />

                          </div>
                          <div class="row">
                            <label class="col-sm-6">Existing Risk Control:</label>


                            <textarea  type="text" class="col-sm-6" id="inputSaving" name="ExistingRiskControl[]" rows="5" placeholder=""><?php echo $valueAllHazards['risk_control'];?></textarea>

                          </div>

                          <div class="row" >
                            <label class="col-sm-6">Severity:</label>

                            <select class="severity col-sm-6 btn btn-default "  id="inputSaving" name="severity[]">
                              <option value="-">Select severity</option>
                              <option value="5" <?php if($valueAllHazards['security'] == '5') echo 'selected="selected"';?>>(5) Catastrophic</option>
                              <option value="4" <?php if($valueAllHazards['security'] == '4') echo 'selected="selected"';?>>(4) Major</option>
                              <option value="3" <?php if($valueAllHazards['security'] == '3') echo 'selected="selected"';?>>(3) Moderate</option>
                              <option value="2" <?php if($valueAllHazards['security'] == '2') echo 'selected="selected"';?>>(2) Minor</option>
                              <option value="1" <?php if($valueAllHazards['security'] == '1') echo 'selected="selected"';?>>(1) Negligible</option>
                            </select>


                          </div>

                          <div class="row" >
                            <label class="col-sm-6">Likelihood:</label>

                            <select class="likelihood col-sm-6 btn btn-default " id="inputSaving" name="likelihood[]">
                              <option value="-">Select likelihood</option>
                              <option value="5" <?php if($valueAllHazards['likehood'] == '5') echo 'selected="selected"';?>>(5) Almost Certain</option>
                              <option value="4" <?php if($valueAllHazards['likehood'] == '4') echo 'selected="selected"';?>>(4) Frequent</option>
                              <option value="3" <?php if($valueAllHazards['likehood'] == '3') echo 'selected="selected"';?>>(3) Occasional</option>
                              <option value="2" <?php if($valueAllHazards['likehood'] == '2') echo 'selected="selected"';?>>(2) Remote</option>
                              <option value="1" <?php if($valueAllHazards['likehood'] == '1') echo 'selected="selected"';?>>(1) Rare</option>
                            </select>

                          </div>

                          <div class="row">
                            <label class="col-sm-6">Action Date:</label>

                             <?php
                            $time = strtotime($valueAllHazards['action_date']);

                            $yaer =  date('Y', $time);

                             $month = date('m', $time);

                            $day = date('d', $time);

                            ?>




                            <select class="col-sm-2 btn btn-default" id="inputSaving" name="actionDate[]">
                               <?php for ($i=1; $i < 32; $i++)
                              {
                                # code...
                                  if($day == $i)
                                  {
                                    $dSelcted = 'selected="selected"';
                                  }
                                  else
                                  {
                                    $dSelcted = '';
                                  }
                                ?>
                                  <option <?php echo $dSelcted;?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php
                              }
                             ?>
                            </select>

                            <select class="col-sm-2 btn btn-default" id="inputSaving" name="actionMonth[]">
                              <?php for ($i=1; $i < 13; $i++)
                              {
                                # code...
                                if($month == $i)
                                  {
                                    $mSelcted = 'selected="selected"';
                                  }
                                  else
                                  {
                                    $mSelcted = '';
                                  }
                                ?>
                                  <option <?php echo $mSelcted;?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php
                              }
                             ?>
                            </select>


                            <select class="col-sm-2 btn btn-default" id="inputSaving" name="actionYear[]">
                              <?php for ($i=2016; $i < 2025; $i++)
                              { if($yaer == $i)
                                  {
                                    $ySelcted = 'selected="selected"';
                                  }
                                  else
                                  {
                                    $ySelcted = '';
                                  }
                                # code...
                                ?>
                                  <option <?php echo $ySelcted;?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php
                              }
                             ?>

                            </select>




                          </div>


						            </div>
                        <div class="col-sm-6">
                          <?php
                          $likelihood = $valueAllHazards['likehood'];
                          $severity = $valueAllHazards['security'];
                          $htmlRisk = '';
                          $riskValue = $likelihood * $severity;
                          if($riskValue > 0 && $riskValue < 4)
                           {
                              $htmlRisk = '<span class="green">Low Risk</span>';

                           }
                           else if($riskValue > 3 && $riskValue < 13)
                           {
                              $htmlRisk = '<span class="yellow">Medium Risk</span>';
                           }
                           else if($riskValue > 13 && $riskValue < 26)
                           {
                              $htmlRisk = '<span class="red">High Risk - Additional Risk Control is required below</span>';
                           }
                           else
                           {
                              $htmlRisk = '';
                           }

                          ?>




                          <div class="row">
                            <label class="col-sm-6">Risk Level:</label>
                            <label class="col-sm-6 riskLevel"><?php echo $htmlRisk; ?></label>
                          </div>

                          <div class="row">
                            <label class="col-sm-6">Additional Risk Control:</label>

                          <textarea  type="text" class="col-sm-6" id="inputSaving" name="additionalRiskContro[]" style="height:65px;"><?php echo $valueAllHazards['risk_additional'];?></textarea>


                          </div>
                          <div class="clearfix"></div>

                          <div class="row">
                            <label class="col-sm-6">Severity:</label>

                            <select class="col-sm-6 severity btn btn-default" id="inputSaving" name="severitySecond[]">
                              <option value="-">Select severity</option>
                              <option value="5" <?php if($valueAllHazards['securitysecond'] == '5') echo 'selected="selected"';?>>(5) Catastrophic</option>
                              <option value="4" <?php if($valueAllHazards['securitysecond'] == '4') echo 'selected="selected"';?>>(4) Major</option>
                              <option value="3" <?php if($valueAllHazards['securitysecond'] == '3') echo 'selected="selected"';?>>(3) Moderate</option>
                              <option value="2" <?php if($valueAllHazards['securitysecond'] == '2') echo 'selected="selected"';?>>(2) Minor</option>
                              <option value="1" <?php if($valueAllHazards['securitysecond'] == '1') echo 'selected="selected"';?>>(1) Negligible</option>
                            </select>


                          </div>

                          <div class="row">
                            <label class="col-sm-6">Likelihood:</label>

                            <select class="col-sm-6 likelihood btn btn-default" id="inputSaving" name="likelihoodSecond[]">
                              <option value="-">Select likelihood</option>
                              <option value="5" <?php if($valueAllHazards['likehoodsecond'] == '5') echo 'selected="selected"';?>>(5) Almost Certain</option>
                              <option value="4" <?php if($valueAllHazards['likehoodsecond'] == '4') echo 'selected="selected"';?>>(4) Frequent</option>
                              <option value="3" <?php if($valueAllHazards['likehoodsecond'] == '3') echo 'selected="selected"';?>>(3) Occasional</option>
                              <option value="2" <?php if($valueAllHazards['likehoodsecond'] == '2') echo 'selected="selected"';?>>(2) Remote</option>
                              <option value="1" <?php if($valueAllHazards['likehoodsecond'] == '1') echo 'selected="selected"';?>>(1) Rare</option>
                            </select>

                          </div>
                          <div class="clearfix"></div>
                        </div>
                   </div>
                       <div class="clearfix"></div>
                        <hr class="add_activity"/>
                        <?php

                        $sqlActionOfficer = "SELECT * FROM  `actionofficer` WHERE  `hazardid` =$valueAllHazards[hazard_id]";

                        $resultAllActionOfficer=mysqli_query($con, $sqlActionOfficer);
                         $numActionOfficer =  mysqli_num_rows($resultAllActionOfficer);
                          if($numActionOfficer > 0)
                          {

                          }
                          else
                          {
                            $numActionOfficer = 1;
                          }
                          ?>

                      <div class="row form-row">

                        <div class="col-sm-12">
                          <button class="col-sm-2 btn btn-primary addActionMember" id="add_new_member">+Action Officer</button>
                           <input type="hidden" name="hazardsActionOfficerCount[]" id="hazardsActionOfficerCount" value="<?php echo $numActionOfficer;?>" />

                        </div>
                      </div>



                          <?php
                           if($numActionOfficer > 0)
                          {
                              while($valueActionOfficer = mysqli_fetch_assoc($resultAllActionOfficer))
                              {
                              ?>
                              <div id="clonedInput1" class="row repeatingActionOfficer">

                                    <div class="col-sm-6">
                                      <div class="row">
                                        <label class="col-sm-6">Action Officer:</label>
                                        <select name="actionOfficer[]" class="col-sm-6" type="text" id="inputSaving" placeholder="">
                                          <?php foreach ($raMembers as $raMember) {
                                              $selected = $valueActionOfficer["id"] == $raMember["id"]?"selected":"";
                                            echo "<option $selected value=".$raMember["id"].">".$raMember["name"]."</option>";
                                          }?>
                                        </select>
                                        <!-- <input name="actionOfficer[]" class="col-sm-6" type="text" id="inputSaving" placeholder=""  value="<?php echo $valueActionOfficer[name];?>" > -->
                                      </div>
                                    </div>
                                    <button class="col-sm-1 btn btn-danger deleteActonOfficer" style="margin-left:20px;">Remove</button>

                              </div>

                              <?php
                              }
                          }
                          else
                          {

                        ?>
                          <div id="clonedInput1" class="row repeatingActionOfficer">

                                    <div class="col-sm-6">
                                      <div class="row">
                                        <label class="col-sm-6">Action Officer:</label>
                                        <select name="actionOfficer[]" class="col-sm-6" type="text" id="inputSaving" placeholder="">
                                          <?php foreach ($raMembers as $raMember) {
                                            echo "<option  value=".$raMember["id"].">".$raMember["name"]."</option>";
                                          }?>
                                        </select>
                                        <!-- <input name="actionOfficer[]" class="col-sm-6" type="text" id="inputSaving" placeholder=""  value="" > -->
                                      </div>
                                    </div>
                                    <button class="col-sm-1 btn btn-danger deleteActonOfficer" style="margin-left:20px;">Remove</button>

                              </div>
                        <?php
                          }
                        ?>








                       <div class="clearfix"></div>
                       <button class="col-sm-2 btn btn-success addHazards" id="add_new_work">+ Add hazards</button>
                       <button class="col-sm-2 btn btn-danger pull-right deleteHazards">Remove Hazards</button>
                      <div class="clearfix"></div>
                        <hr class="add_activity"/>
                  </div>


  <?php
  }
  ?>
          </div>

<?php
  }
?>





        <div class="col-sm-12 form_pad">
            <h3>Declaration of Risk Assessment</h3>
            <hr class="add_risk" />
            <div class="row form-row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <label>I hereby confirm that all information above are accurate to my best knowledge.</label>
                </div>
            </div>



            <div class="row form-below">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class=" col-sm-8 btn-right">



                        <input class="btn btn-success draft" type="submit" value="Save as Draft" name="saveAsDraft"  >

                         <input class="btn btn-success draft" type="submit" value="Next" name="saveAsDraft" style="padding-left:30px; padding-right:30px;"  >
                         <input class="btn btn-danger" type="submit" id="cancel" value="Cancel" name="Cancel"   style="padding-left:30px; padding-right:30px;"   >


                    </div>
                </div>
            </div>

        </div>
</form>
</div>
</div>

<script type="text/javascript">
    document.getElementById("cancel").onclick = function () {
        location.href = "listwork_activity.php";
    };
</script>






<script type="text/javascript">

$('.draft').click(function(e){
  $("#toCopyDiv input").prop('required', false);


});
  //  $('#edit-submitted-first-name').prop('required', false);

</script>
 <?php include_once 'footer.php';?>
