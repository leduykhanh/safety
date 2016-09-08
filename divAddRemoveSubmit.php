<?php session_start(); include_once 'header.php';

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
<script type='text/javascript'>//<![CDATA[
$(window).load(function(){
// Add a new repeating section
var attrs = ['for', 'id', 'value'];
function resetAttributeNames(section) {
    var tags = section.find('input, label'), idx = section.index();
    tags.each(function() {
      var $this = $(this);
      $.each(attrs, function(i, attr) {
        var attr_val = $this.attr(attr);
        if (attr_val) {
            $this.attr(attr, attr_val.replace(/_\d+$/, '_'+(idx + 1)));



        }

      })


    })
}

function resetHazaradsAttributeNames(section) {
    var tags = section.find('input, label'), idx = section.index();
    tags.each(function() {
      var $this = $(this);
      $.each(attrs, function(i, attr) {
        var attr_val = $this.attr(attr);
        if (attr_val) {
            $this.attr(attr, attr_val.replace(/_\d+$/, '_'+(idx + 1)));



        }
      })


    })
}

$('.addMember').click(function(e){
        e.preventDefault();
        var MemberCount = $('#RA_MemberCount').val();
        if(MemberCount >= 5)
        {
           alert("You can't add more than 5 RA Member");
            return;
        }

        var toRepeatingGroup = $('.repeatingMember').first();
        var lastRepeatingGroup = $('.repeatingMember').last();
        var cloned = toRepeatingGroup.clone(true);
        cloned.insertAfter(lastRepeatingGroup);


        resetAttributeNames(cloned);



        var newMemberCount = parseInt(MemberCount) +1;
        $('#RA_MemberCount').val(newMemberCount);

    });


    $('.deleteMember').click(function(e){
        e.preventDefault();
        var current_fight = $(this).parent('div');
        var other_fights = current_fight.siblings('.repeatingMember');
        if (other_fights.length === 0) {
            alert("You should atleast have one RA Member");
            return;
        }
        current_fight.slideUp('slow', function() {
            current_fight.remove();
            var MemberCount = $('#RA_MemberCount').val();
            var newMemberCount = parseInt(MemberCount) -1;
            $('#RA_MemberCount').val(newMemberCount);
            // reset fight indexes
            other_fights.each(function() {
               resetAttributeNames($(this));
            })

        })



    });



$('.addWorkActivity').click(function(e){
        e.preventDefault();
        var toRepeatingGroup = $('.tocopy').first();
        var lastRepeatingGroup = $('.repeatingSection').last();
        var cloned = toRepeatingGroup.clone(true);
        cloned.insertAfter(lastRepeatingGroup);


        resetAttributeNames(cloned);


        var workactivityCount = $('#workactivityCount').val();
        var newworkactivityCount = parseInt(workactivityCount) +1;
        $('#workactivityCount').val(newworkactivityCount);

    });



$('.addHazards').click(function(e){
        e.preventDefault();

        var currentHazardCounts = $(this).parent().parent().find('#hazardsCount').val();
        var nextHzardsCounts = parseInt(currentHazardCounts) + 1;
        $(this).parent().parent().find('#hazardsCount').val(nextHzardsCounts);




        var lastRepeatingGroup = $('.hazardSectionCopy').first();
        var cloned = lastRepeatingGroup.clone(true)


        cloned.insertAfter($(this).parent('div'));
        resetHazaradsAttributeNames(cloned)
    });

$('.addActionMember').click(function(e){
        e.preventDefault();

        var currentHazardsActionOfficerCount = $(this).parent().parent().find('#hazardsActionOfficerCount').val();

        if(currentHazardsActionOfficerCount >= 5)
        {
           alert("You can't add more than 5 Action Officers");
            return;
        }

        var nextHazardsActionOfficerCount = parseInt(currentHazardsActionOfficerCount) + 1;
        $(this).parent().parent().find('#hazardsActionOfficerCount').val(nextHazardsActionOfficerCount);




        var lastRepeatingGroup = $('.repeatingActionOfficer').last();
        var cloned = lastRepeatingGroup.clone(true)


        cloned.insertAfter($(this).parent('div'));
        resetHazaradsAttributeNames(cloned)
    });

$('.deleteActonOfficer').click(function(e){
        e.preventDefault();
        var current_fight = $(this).parent('div');
        var other_fights = current_fight.siblings('.repeatingActionOfficer');
        if (other_fights.length === 0) {
            alert("You should atleast have one Action officer Member");
            return;
        }
        current_fight.slideUp('slow', function() {
              var currentHazardsActionOfficerCount = $(this).parent().parent().find('#hazardsActionOfficerCount').val();
             var nextHazardsActionOfficerCount = parseInt(currentHazardsActionOfficerCount) - 1;
            $(this).parent().parent().find('#hazardsActionOfficerCount').val(nextHazardsActionOfficerCount);
            current_fight.remove();


            // reset fight indexes
            other_fights.each(function() {
               resetAttributeNames($(this));
            })

        })



    });

// Delete a repeating section
$('.deleteWorkActivity').click(function(e){
        e.preventDefault();
        var current_fight = $(this).parent('div');
        var other_fights = current_fight.siblings('.repeatingSection');
        if (other_fights.length === 0) {
            alert("You should atleast have one workactivity");
            return;
        }
        current_fight.slideUp('slow', function() {
            current_fight.remove();

            // reset fight indexes
            other_fights.each(function() {
               resetAttributeNames($(this));
            })

        })
        var workactivityCount = $('#workactivityCount').val();
        var newworkactivityCount = parseInt(workactivityCount) -1;
        $('#workactivityCount').val(newworkactivityCount);


    });








// Delete a repeating section
$('.deleteHazards').click(function(e){
        e.preventDefault();

        var current_fight = $(this).parent('div');
        var other_fights = current_fight.siblings('.hazardSection');
        if (other_fights.length === 0) {
            alert("You should atleast have one hazards");
            return;
        }
        current_fight.slideUp('slow', function() {
            current_fight.remove();

            // reset fight indexes
            other_fights.each(function() {
               resetAttributeNames($(this));
            })

        })

        var currentHazardCounts = $(this).parent().parent().find('#hazardsCount').val();
        var nextHzardsCounts = parseInt(currentHazardCounts) - 1;
        $(this).parent().parent().find('#hazardsCount').val(nextHzardsCounts);


    });




$(".date").datepicker();

//likelihood chnage
$('.likelihood').on('change', function()
{
  var likelihood = parseInt(this.value);
      var severity  =  parseInt($(this).parent().siblings().find('.severity').val());
      var riskValue = likelihood * severity;


     if(riskValue > 0 && riskValue < 4)
     {
        var htmlRisk = '<span class="green">Low Risk</span>';

     }
     else if(riskValue > 3 && riskValue < 13)
     {
        var htmlRisk = '<span class="yellow">Medium Risk</span>';
     }
     else if(riskValue > 13 && riskValue < 26)
     {
        var htmlRisk = '<span class="red">High Risk - Additional Risk Control is required below</span>';
     }
     else
     {
        var htmlRisk = '';
     }

 //alert(htmlRisk+$(this).parent().parent().siblings().find('.riskLevel').html());



 $(this).parent().parent().siblings().find('.riskLevel').empty().append(htmlRisk);


});


$('.severity').on('change', function()
{
	   // or $(this).val()
	  var severity = parseInt(this.value);
	  var likelihood  =  parseInt($(this).parent().siblings().find('.likelihood').val());
	  var riskValue = likelihood * severity;


	 if(riskValue > 0 && riskValue < 4)
	 {
	    var htmlRisk = '<span class="green">Low Risk</span>';

	 }
	 else if(riskValue > 3 && riskValue < 13)
	 {
	 	var htmlRisk = '<span class="yellow">Medium Risk</span>';
	 }
	 else if(riskValue > 13 && riskValue < 26)
	 {
	 	var htmlRisk = '<span class="red">High Risk - Additional Risk Control is required below</span>';
	 }
	 else
	 {
	 	var htmlRisk = '';
	 }


 //alert(htmlRisk+$(this).parent().parent().siblings().find('.riskLevel').html());



 $(this).parent().parent().siblings().find('.riskLevel').empty().append(htmlRisk);

});





/*$('.date').each(function(e){

  attrName = $(this).attr("id");
alert(attrName);
    $(this).datepicker();
});*/


});//]]>

</script>



<div class="container" style="border:2px solid black;">

<form method="post" action="riskmange.php" class="inlineForm" enctype="multipart/form-data">


  <input type="hidden" name="RA_MemberCount" id="RA_MemberCount" value="1" />
   <input type="hidden" name="workactivityCount" id="workactivityCount" value="1" />


      <div class="col-sm-12 form_pad">
                <h3>Add a New Risk Assessment</h3>
                <hr class="add_risk">
		            <div class="col-sm-12 form-row">
                            <div class="col-sm-8">
                              <label class="col-sm-4">Project Title:</label>
                              <label class="col-sm-8"><input name="project_title" class="span4" type="text" id="inputSaving" placeholder="" required=""></label>
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
                            <label class="col-sm-8">QE Safety Consultancy Pte Ltd</label>
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
                              <input name="location" class="span4" type="text" id="inputSaving" placeholder="" required></label>
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
                                <input name="process" class="span4" type="text" id="inputSaving" placeholder="" required>
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
                        <input  name="RA_Member[]" class="span4" type="text" id="inputSaving" placeholder="">
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
                        <div class="col-sm-6 form-row">
                            <label class="col-sm-6">Work Activity Name:</label>
                            <input class="col-sm-6" type="text" id="inputSaving" name="work_activity[]" value="<?php echo $name;?>" placeholder="" required>
                        </div>
                       <div class="clearfix"></div>
                       <hr class="add_activity"/>

                    </div>

                  <div class="col-sm-12 hazardSection hazardSectionCopy">



                        <div class="col-sm-6 form-row">
                          <div class="form-row">
                            <label class="col-sm-6">Hazard:</label>
                            <input class="col-sm-6" type="text" id="inputSaving" name="Hazard[]" value="<?php echo $name;?>" placeholder="" required>
                          </div>
                          <div class="form-row">
                            <label class="col-sm-6">Possible Injury / Accident:</label>
                            <input class="col-sm-6" type="text" id="inputSaving" name="InjuryAccident[]" value="<?php echo $name;?> " placeholder="" required>
                          </div>
                          <div class="form-row">
                            <label class="col-sm-6">Existing Risk Control:</label>
                        <textarea class="col-sm-6" type="text" id="inputSaving" name="ExistingRiskControl[]" style="height:65px" placeholder="" ><?php echo $name;?></textarea>



                          </div>

                          <div class="form-row">
                            <label class="col-sm-6">Severity:</label>

                            <select class="severity col-sm-6 btn btn-default  " id="inputSaving" name="severity[]">
                              <option value="-">Select severity</option>
                              <option value="5">(5) Catastrophic</option>
                              <option value="4">(4) Major</option>
                              <option value="3">(3) Moderate</option>
                              <option value="2">(2) Minor</option>
                              <option value="1">(1) Negligible</option>
                            </select>


                          </div>

                          <div class="form-row">
                            <label class="col-sm-6">Likelihood:</label>
                            <select class="likelihood col-sm-6 btn btn-default " id="inputSaving" name="likelihood[]">
                              <option value="-">Select likelihood</option>
                              <option value="5">(5) Almost Certain</option>
                              <option value="4">(4) Frequent</option>
                              <option value="3">(3) Occasional</option>
                              <option value="2">(2) Remote</option>
                              <option value="1">(1) Rare</option>
                            </select>
                          </div>

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

                          <div class="form-row">
                            <label class="col-sm-6">Severity:</label>

                            <select class="severity col-sm-6 btn btn-default  " id="inputSaving" name="severitySecond[]">
                            <option value="-">Select severity</option>
                               <option value="5">(5) Catastrophic</option>
                              <option value="4">(4) Major</option>
                              <option value="3">(3) Moderate</option>
                              <option value="2">(2) Minor</option>
                              <option value="1">(1) Negligible</option>
                            </select>


                          </div>

                          <div class="form-row">
                            <label class="col-sm-6">Likelihood:</label>
                            <select class="likelihood col-sm-6 btn btn-default  " id="inputSaving" name="likelihoodSecond[]">
                              <option value="-">Select likelihood</option>
                              <option value="5">(5) Almost Certain</option>
                              <option value="4">(4) Frequent</option>
                              <option value="3">(3) Occasional</option>
                              <option value="2">(2) Remote</option>
                              <option value="1">(1) Rare</option>
                            </select>
                          </div>







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
                                        <input name="actionOfficer[]" class="col-sm-6" type="text" id="inputSaving" placeholder="">
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
                        <div class="col-sm-6 form-row">
                            <label class="col-sm-6" >Work Activity Name:</label>
                            <input class="col-sm-6" type="text" id="inputSaving" name="work_activity[]" value="<?php echo $name;?>" placeholder="" required>
                        </div>
                       <div class="clearfix"></div>
                       <hr class="add_activity"/>

                    </div>

                  <div class="col-sm-12 hazardSection">



                        <div class="col-sm-6 form-row">
                          <div class="form-row">
                            <label class="col-sm-6">Hazard:</label>
                            <input class="col-sm-6" type="text" id="inputSaving" name="Hazard[]" value="<?php echo $name;?>" placeholder="" required>
                          </div>
                          <div class="form-row">
                            <label class="col-sm-6">Possible Injury / Accident:</label>
                            <input class="col-sm-6" type="text" id="inputSaving" name="InjuryAccident[]" value="<?php echo $name;?> " placeholder="" required>
                          </div>
                          <div class="form-row">
                            <label class="col-sm-6">Existing Risk Control:</label>
                            <textarea class="col-sm-6" type="text" id="inputSaving" name="ExistingRiskControl[]" style="height:65px" placeholder=""><?php echo $name;?></textarea>
                          </div>

                          <div class="form-row">
                            <label class="col-sm-6">Severity:</label>

                            <select class="severity col-sm-6 btn btn-default  " id="inputSaving" name="severity[]">
                              <option value="-">Select severity</option>
                              <option value="5">(5) Catastrophic</option>
                              <option value="4">(4) Major</option>
                              <option value="3">(3) Moderate</option>
                              <option value="2">(2) Minor</option>
                              <option value="1">(1) Negligible</option>
                            </select>


                          </div>

                          <div class="form-row">
                            <label class="col-sm-6">Likelihood:</label>
                            <select class="likelihood col-sm-6 btn btn-default  " id="inputSaving" name="likelihood[]">
                              <option value="-">Select likelihood</option>
                              <option value="5">(5) Almost Certain</option>
                              <option value="4">(4) Frequent</option>
                              <option value="3">(3) Occasional</option>
                              <option value="2">(2) Remote</option>
                              <option value="1">(1) Rare</option>
                            </select>
                          </div>

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

                          <div class="form-row">
                            <label class="col-sm-6">Severity:</label>

                            <select class="severity col-sm-6 btn btn-default " id="inputSaving" name="severitySecond[]">
                              <option value="-">Select severity</option>
                              <option value="5">(5) Catastrophic</option>
                              <option value="4">(4) Major</option>
                              <option value="3">(3) Moderate</option>
                              <option value="2">(2) Minor</option>
                              <option value="1">(1) Negligible</option>
                            </select>


                          </div>

                          <div class="form-row">
                            <label class="col-sm-6">Likelihood:</label>
                            <select class="likelihood col-sm-6 btn btn-default " id="inputSaving" name="likelihoodSecond[]">
                              <option value="-">Select likelihood</option>
                              <option value="5">(5) Almost Certain</option>
                              <option value="4">(4) Frequent</option>
                              <option value="3">(3) Occasional</option>
                              <option value="2">(2) Remote</option>
                              <option value="1">(1) Rare</option>
                            </select>
                          </div>







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
                                        <input name="actionOfficer[]" class="col-sm-6" type="text" id="inputSaving" placeholder="">
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
            .siblings('.img-radio').css('opacity','0.5');
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
