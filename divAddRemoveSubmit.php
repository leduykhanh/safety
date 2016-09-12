<?php session_start(); include_once 'header.php';
include_once 'listwork_function.php';
include_once 'config.php';
if(!$_SESSION['adminid'])
{
    ?><script type="text/javascript">window.location.assign("index.php")</script>
    <?php
}

?>
  <style type="text/css">
    body { padding: 10px;}
    .clonedInput { padding: 10px; border-radius: 5px; background-color: #def;}



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

	.ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all
	{
		width:327;
	}

  </style>
  <?php
    $raMembers =(mysqli_query($con,"SELECT * FROM ramember"));
    // foreach ($raMembers as $raMember) {
    //   var_dump($raMember["name"]);
    // }
  ?>
<script type='text/javascript' src="js/divAddRemoveSubmit.js" ></script>

<div class="container" style="border:2px solid black;">

<form method="post" action="riskmange.php" class="inlineForm" enctype="multipart/form-data">


  <input type="hidden" name="RA_MemberCount" id="RA_MemberCount" value="1" />
   <input type="hidden" name="workactivityCount" id="workactivityCount" value="1" />


      <div class="col-sm-12 form_pad">
                <h3>Add a New Risk Assessment</h3>
                <hr class="add_risk">
		            <div class="col-sm-12 form-row">
                            <div class="col-sm-12">
                              <label class="col-sm-2">Project Title:</label>
                              <label class="col-sm-10"><input name="project_title" class="span4" type="text" id="inputSaving" placeholder="" required=""></label>
                            </div>
                </div>
                <div class="col-sm-12 form-row">
                            <div class="col-sm-6">
                              <label class="col-sm-4">RA Leader:</label>
                              <label class="col-sm-8"><?php echo $_SESSION['name']; ?></label>
                            </div>
                </div>

                <div class="col-sm-12 form-row">
                          <div class="col-sm-6">

                            <label class="col-sm-4">Company:</label>
                            <label class="col-sm-8">THI Engineering & Construction Pte Ltd</label>
                          </div>

                          <div class="col-sm-6">

                            <label class="col-sm-4">Reference No:</label>
                            <label class="col-sm-8">0000 (Ref. No. will be auto generated when saved.)</label>

                          </div>
                </div>


                <div class="col-sm-12 form-row">
                          <div class="col-sm-6">

                            <label class="col-sm-4">Risk Location:</label>
                            <label class="col-sm-8">
                              <textarea rows="2" name="location" class="span4" type="text" id="inputSaving" placeholder="" required></textarea></label>
                          </div>

                          <div class="col-sm-6">

                            <label class="col-sm-4">Creation Date:</label>
                            <label class="col-sm-8">
                               <input name="creationDate" class="span4 date" type="text" id="creationDate" placeholder="" required></label>


                            </label>

                          </div>
                </div>


                <div class="col-sm-12 form-row">
                            <div class="col-sm-6">
                              <label class="col-sm-4">Risk Process:</label>
                              <label class="col-sm-8">
                                <textarea rows="2" name="process" class="span4" type="text" id="inputSaving" placeholder="" required></textarea>
                              </label>
                            </div>

                </div>
				<div class="col-sm-12 form-row onlyfortemplate5" style="display: block;">
                    <div class="col-sm-6">
                              <label class="col-sm-4">Stage contract:</label>
                              <label class="col-sm-8">
                                <input name="stage_contract" class="span4" type="text" id="inputSaving" placeholder="">
                              </label>
                    </div>

                    <div class="col-sm-6">
                              <label class="col-sm-4">Site Contract:</label>
                              <label class="col-sm-8">
                                <input name="site_contract" class="span4" type="text" id="inputSaving" placeholder="">
                              </label>
                    </div>

                    <div class="col-sm-6">
                              <label class="col-sm-4">Package:</label>
                              <label class="col-sm-8">
                                <input name="riskpackage" class="span4" type="text" id="inputSaving" placeholder="">
                              </label>
                    </div>

                    <div class="col-sm-6">
                              <label class="col-sm-4">STAGE:</label>
                              <label class="col-sm-8">
                                <input name="riskstage" class="span4" type="text" id="inputSaving" placeholder="">
                              </label>
                    </div>
                </div>
				<div class="row">
			        <div class="col-md-12 col-md-offset-1">
			        		<div class="row">
			        			<!-- <div class="col-xs-2">
			        				<img src="http://placehold.it/160x100" class="img-responsive img-radio">
			        				<button type="button" class="btn btn-primary btn-radio active">Template1</button>
			        				<input type="checkbox" name="template" value="temp1" id="left-item" class="hidden" checked="checked">
			        			</div> -->
			        			<div class="col-xs-2">
			        				<img src="images/template2logo.png" class="img-responsive img-radio" style="opacity: 1;">
			        				<button type="button" class="btn btn-primary btn-radio active">Penta Ocean</button>
			        				<input type="checkbox" name="template" value="1" id="middle-item" class="hidden">
			        			</div>
			        			<div class="col-xs-2">
			        				<img src="images/template3logo.png" class="img-responsive img-radio">
			        				<button type="button" class="btn btn-primary btn-radio">THI E&amp;C</button>
			        				<input type="checkbox" name="template" value="2" id="right-item" class="hidden">
			        			</div>
			        			<div class="col-xs-2">
			        				<img src="images/template4logo.png" class="img-responsive img-radio">
			        				<button type="button" class="btn btn-primary btn-radio">SK E&amp;C</button>
			        				<input type="checkbox" name="template" value="3" id="right-item" class="hidden">
			        			</div>
			        			<div class="col-xs-2">
			        				<img src="images/template5logo.png" class="img-responsive img-radio">
			        				<button type="button" class="btn btn-primary btn-radio">LTA</button>
			        				<input type="checkbox" name="template" value="4" id="right-item" class="hidden">
			        			</div>
			        		</div>
			        </div>
			    </div>
                <div class="col-sm-12"> <hr class="add_activity"></div>


               <div class="col-sm-12 form-row">

                  <button class="col-sm-2 btn btn-primary addMember" id="add_new_member">
                    +Add RA Member</button>

               </div>

                <div class="clear-fix"></div>



                <div id="clonedInput1" class=" col-sm-12 form-row clonedInput repeatingMember">

                    <div class="col-sm-6">
                        <label class="col-sm-4">RA Members:</label>
                        <label class="col-sm-8">
                        <select  name="RA_Member[]" class="span4" type="text" id="inputSaving" placeholder="">
                          <?php foreach ($raMembers as $raMember) {

                            echo "<option value=".$raMember["id"].">".$raMember["name"]."</option>";
                          }?>
                        </select>
                        </label>
                    </div>
                    <button class="col-sm-1 btn btn-danger deleteMember">Remove</button>

              </div>






<div class="col-sm-12"> <hr class="add_risk"></div>

<div style="display:none" id="toCopyDiv">
      <div id="clonedInput1"  class=" col-sm-12 form_pad clonedInput repeatingSection tocopy">

              <div class="col-sm-7"><h3>Work Activity 2 </h3></div>
			  <?php $name = "";?>

                   <button class="col-sm-2 btn btn-success addWorkActivity" id="add_new_work">+ Add a new work activity</button>

                   <input type="hidden" name="workactivity_a_id_1" id="workactivity_a_id_1" value="1" />
                   <input type="hidden" name="hazardsCount[]" id="hazardsCount" value="1" />




                  <button class="col-sm-2 btn btn-danger  deleteWorkActivity " style="margin-left:5px;">Remove work action</button>


                    <div class="col-sm-12">
                        <hr class="add_risk" />
                        <div class="col-sm-12 form-row">
                            <label class="col-sm-3">Work Activity Name:</label>
                            <input class="col-sm-9" type="text" id="inputSaving" name="work_activity[]" value="<?php echo $name;?>" placeholder="" required>
                        </div>
                       <div class="clearfix"></div>
                       <hr class="add_activity"/>

                    </div>

                  <div class="col-sm-12 hazardSection hazardSectionCopy">



                        <div class="col-sm-6 form-row">
                          <div class="form-row">
                            <label class="col-sm-6">Hazard:</label>
                            <textarea rows="2" class="col-sm-6" type="text" id="inputSaving" name="Hazard[]" value="<?php echo $name;?>" placeholder="" required></textarea>
                          </div>
                          <div class="form-row">
                            <label class="col-sm-6">Possible Injury / Accident:</label>
                            <textarea rows="2" class="col-sm-6" type="text" id="inputSaving" name="InjuryAccident[]" value="<?php echo $name;?> " placeholder="" required></textarea>
                          </div>
                          <div class="form-row">
                            <label class="col-sm-6">Existing Risk Control:</label>
                        <textarea class="col-sm-6" type="text" id="inputSaving" name="ExistingRiskControl[]" style="height:65px" placeholder="" ><?php echo $name;?></textarea>



                          </div>

                          <?php create_options("") ;?>


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






                        <div class="col-sm-6 form-row">



                          <div class="form-row">
                            <label class="col-sm-4">Risk Level:</label>
                            <label class="col-sm-8 riskLevel" name="riskLevel"></label>

                          </div>

                          <div class="form-row">
                            <label class="col-sm-6">Additional Risk Control:</label>

                            <textarea class="col-sm-6" type="text" id="inputSaving" name="additionalRiskContro[]" style="height:65px;"></textarea>


                          </div>
                          <div class="clearfix"></div>

                          <?php create_options("Second"); ?>

                        </div>
                       <div class="clearfix"></div>


                       <hr class="add_activity"/>



                       <div class="col-sm-12 form-row">
                             <input type="hidden" name="hazardsActionOfficerCount[]" id="hazardsActionOfficerCount" value="1" />
                                <div class="row col-sm-12 form-row">

                                    <button class="col-sm-2 btn btn-primary addActionMember" id="add_new_member">+Action Officer</button>
                                </div>
                                <div id="clonedInput1" class="row repeatingActionOfficer">

                                    <div class="col-sm-6">

                                        <label class="col-sm-6">Action Officer:</label>
                                        <select name="actionOfficer[]" class="col-sm-6" type="text" id="inputSaving" placeholder="">
                                          <?php foreach ($raMembers as $raMember) {
                                            echo "<option value=".$raMember["id"].">".$raMember["name"]."</option>";
                                          }?>
                                        </select>
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
                  </div>
          </div>

</div>

          <div id="clonedInput1" class=" col-sm-12 form_pad clonedInput repeatingSection">

              <div class="col-sm-7"><h3>Work Activity 1</h3></div>

                   <button class="col-sm-2 btn btn-success addWorkActivity" id="add_new_work">+ Add a new work activity</button>

                   <input type="hidden" name="workactivity_a_id_1" id="workactivity_a_id_1" value="" />
                   <input type="hidden" name="hazardsCount[]" id="hazardsCount" value="1" />




                  <button class="col-sm-2 btn btn-danger deleteWorkActivity" style="margin-left: 5px;">Remove work activity</button>


                    <div class="col-sm-12">
                        <hr class="add_risk" />
                        <div class="col-sm-12 form-row">
                            <label class="col-sm-3" >Work Activity Name:</label>
                            <input class="col-sm-9" type="text" id="inputSaving" name="work_activity[]" value="<?php echo $name;?>" placeholder="" required>
                        </div>
                       <div class="clearfix"></div>
                       <hr class="add_activity"/>

                    </div>

                  <div class="col-sm-12 hazardSection">



                        <div class="col-sm-6 form-row">
                          <div class="form-row">
                            <label class="col-sm-6">Hazard:</label>
                            <textarea rows="2" class="col-sm-6" type="text" id="inputSaving" name="Hazard[]" value="<?php echo $name;?>" placeholder="" required></textarea>
                          </div>
                          <div class="form-row">
                            <label class="col-sm-6">Possible Injury / Accident:</label>
                            <textarea rows="2" class="col-sm-6" type="text" id="inputSaving" name="InjuryAccident[]" value="<?php echo $name;?> " placeholder="" required></textarea>
                          </div>
                          <div class="form-row">
                            <label class="col-sm-6">Existing Risk Control:</label>
                            <textarea class="col-sm-6" type="text" id="inputSaving" name="ExistingRiskControl[]" style="height:65px" placeholder=""><?php echo $name;?></textarea>
                          </div>

                            <?php create_options(""); ?>

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






                        <div class="col-sm-6 form-row">



                          <div class="form-row">
                            <label class="col-sm-6">Risk Level:</label>
                            <label class="col-sm-8 riskLevel" name="riskLevel"></label>
                          </div>

                          <div class="form-row">
                            <label class="col-sm-6">Additional Risk Control:</label>

                            <textarea class="col-sm-6" type="text" id="inputSaving" name="additionalRiskContro[]" style="height:65px;"></textarea>


                          </div>
                          <div class="clearfix"></div>

                          <?php create_options("Second"); ?>
                        </div>
                       <div class="clearfix"></div>


                       <hr class="add_activity"/>


                            <div class="col-sm-12 form-row">
                             <input type="hidden" name="hazardsActionOfficerCount[]" id="hazardsActionOfficerCount" value="1" />
                                <div class="row col-sm-12 form-row">

                                    <button class="col-sm-2 btn btn-primary addActionMember" id="add_new_member">+Action Officer</button>
                                </div>
                                <div id="clonedInput1" class="row repeatingActionOfficer">

                                    <div class="col-sm-6">

                                        <label class="col-sm-6">Action Officer:</label>
                                        <select name="actionOfficer[]" class="col-sm-6" type="text" id="inputSaving" placeholder="">
                                          <?php foreach ($raMembers as $raMember) {
                                            echo "<option value=".$raMember["id"].">".$raMember["name"]."</option>";
                                          }?>
                                        </select>
                                    </div>
                                    <button class="col-sm-1 btn btn-danger deleteActonOfficer" style="margin-left:20px;">Remove</button>
                                </div>
                            </div>





                      <div class="clearfix"></div>
                      <hr class="add_activity"/>


                        <div class="clearfix"></div>
                       <button class="col-sm-2 btn btn-success addHazards" id="add_new_work">+ Add hazards</button>
                       <button class="col-sm-2 btn btn-danger pull-right deleteHazards">Remove Hazards</button>
                      <div class="clearfix"></div>
                        <hr class="add_activity"/>
                  </div>
          </div>

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



<script type="text/javascript">
    document.getElementById("cancel").onclick = function () {
        location.href = "listwork_activity.php";
    };
</script>




<script type="text/javascript">

$('.draft').click(function(e){
  $("#toCopyDiv input").prop('required', false);


});

$(".template1options").hide();
$(".template5options").hide();

$(".actiondatebox").hide();
$(".onlyfortemplate5").hide();

    	$('.btn-radio:first').addClass('active')
            .siblings('input').prop('checked',true)
    		.siblings('.img-radio').css('opacity','1');


$(function () {
    $('.btn-radio').click(function(e) {
        $('.btn-radio').not(this).removeClass('active')
    		.siblings('input').prop('checked',false)
            .siblings('.img-radio').css('opacity','0.2');
    	$(this).addClass('active')
            .siblings('input').prop('checked',true)
    		.siblings('.img-radio').css('opacity','1');
        var templatename = $(this).html();
        // alert(templatename);
        if( (templatename == "Penta Ocean") ||  (templatename == "SK E&amp;C")||  (templatename == "LTA") )
        {
            $(".template1options").hide();
            $(".template2options").show();
            $(".template5options").hide();
            $(".actiondatebox").hide();
            $(".onlyfortemplate5").hide();
            $(".remarksboxx").show();
            $(".reviewmembersbox").show();
            $('.followuplabel').html("Follow up Period:");
            // $(".subworkhead").hide();

            if(templatename=="Penta Ocean")
            {

              // $(".subworkhead").show();
            }

            if(templatename=="LTA")
            {
              $(".onlyfortemplate5").show();
              $(".template2options").hide();
              $(".template5options").show();
              $(".reviewmembersbox").hide();
              $('.followuplabel').html("Risk Exposure Period:");

            }
            if(templatename=="SK E&amp;C")
            {
              $(".remarksboxx").hide();
              $('.followuplabel').html("Follow Up Date:");
              $('.severity2 option[value="1"]').text("(I) Catastrophic");
              $('.severity2 option[value="2"]').text("(II) Critical");
              $('.severity2 option[value="3"]').text("(III) Marginal");
              $('.severity2 option[value="4"]').text("(IV) Negligible");

              $('.severitysecond option[value="1"]').text("(I) Catastrophic");
              $('.severitysecond option[value="2"]').text("(II) Critical");
              $('.severitysecond option[value="3"]').text("(III) Marginal");
              $('.severitysecond option[value="4"]').text("(IV) Negligible");


            }
        }
        else{
            $(".template1options").show();
            $(".template2options").hide();
            $(".template5options").hide();

            $(".actiondatebox").show();
            $(".onlyfortemplate5").hide();
            $(".remarksboxx").show();
            // $(".subworkhead").show();

            $(".reviewmembersbox").hide();   //hide for THI
            $('.followuplabel').html("Follow up Period:");


        }


    });
});


  //  $('#edit-submitted-first-name').prop('required', false);

</script>
 <?php include_once 'footer.php';?>
