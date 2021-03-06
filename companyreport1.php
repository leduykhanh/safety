<?php
session_start();
include_once 'config.php';
 //print_r($_SESSION);
 if(isset($_SESSION['adminid'])=='')
 {
 	?>
 	<script type="text/javascript">window.location.assign('index.php');</script>
 <?php
 }

?>
<!DOCTYPE html>

<html>
<head>



    <meta charset="utf-8">
    <title>Inventory of Work Activities and Hazards Indetification</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/template.css">
      </head>


<body>
    <div id="container">


<?php
 // risk assessment details
        $sqlRisk = "SELECT * FROM riskassessment where id = $_GET[riskid]";
        $resultlRisk = mysqli_query($con, $sqlRisk);
        $riskRowCount= mysqli_num_rows($resultlRisk);
        $risk = mysqli_fetch_assoc($resultlRisk);

        $getAllWorkSql = "SELECT * FROM `workactivity` WHERE `riskId` = ".$_GET['riskid']." ORDER BY  `work_id` ASC ";
        $resultAllWork=mysqli_query($con, $getAllWorkSql);
        $totalWorkActivity = mysqli_num_rows($resultAllWork);

        $valueAllWork = mysqli_fetch_assoc($resultAllWork);

		//get user details
		    $getAllUserSql = "SELECT * FROM `staff_login` WHERE `id` = ".$risk['createdBy']."";
        $resultAlluser=mysqli_query($con, $getAllUserSql);
        //Get Approvers details:
        $appoverSingature = "";
        $appoverName = "";
        $appoverDesignation = "";
        $getApproverSql = "SELECT * FROM `approvingmanager` WHERE `email` = '".$risk['approverEmail']."'";
        $resuApprover=mysqli_query($con, $getApproverSql);

        if(mysqli_num_rows($resuApprover) > 0){
          $approver = mysqli_fetch_assoc($resuApprover);
          //var_dump($approver);
          $appoverSingature = $approver["image"];
          $appoverName = $approver["name"];
          $appoverDesignation = $approver["designation"];
        };
       // $totalWorkActivity = mysqli_num_rows($resultAlluser);

        $valueAllUser = mysqli_fetch_assoc($resultAlluser);
        $romans = array("1"=>"I","2"=>"II","3"=>"III","4"=>"IV","5"=>"V","-"=>"-",""=>"");
function create_header($page_number,$risk){
	?>
	<div class="main-header" style="width:756pt; background: #fff; top: 0;">
			<!-- <div style="left:-100pt">
				<img src="images/PentaOcean.jpg" width="100" style="margin-left:-100pt;display:inline;float:left" />

			</div> -->
			<div class="right_side">
				<table>
					<tr>
						<td style="width: 615.2pt;">
              <div style="">
                <img src="images/PentaOcean.jpg" width="100" style="margin-left:-0pt;display:inline;float:left" />

              </div>
							<div><strong>PENTA-OCEAN CONSTRUCTION CO., LTD.</strong></div>
							<div><strong style="text-transform: uppercase;"><?php echo $risk["project_title"];?></strong></div>
						</td>
						<td style="width: 140.8pt;">
							<div><strong>WSH Form 02-2  </strong></div>
							<div> Revision:  <?php echo $risk["revisionNumber"]; ?></div>
							<div> Sheet:  Page <?php echo $page_number; ?> of 10</div>
							<div> Dated:  <?php echo date('d-m-Y', strtotime($risk['createdDate']));?></div>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<div class="text-center"><strong>Risk Assessment for <span class="under-line"> <?php echo $risk["process"];?> </span></strong></div>
							<div class="text-center"><strong>Undertaken by <span class="under-line"> THI Engineering & Construction Pte Ltd  </span></strong></div>

						</td>
					</tr>
				</table>
			</div>
		</div>
	<?php

};
function getRiskLabel($s,$l){
  $r=$s * $l;
  $Label = "-";
  if($r>0 && $r<4){return "A";}
  if($r>3 && $r<7){
    if($s==2 && $l==2) return "A";
    return "B";
  }
  if($r>6 && $r<16){return "C";}
  if($r>15){return "D";}
  return $Label;
}

?>
	<div class="page">
		<?php create_header(1,$risk); ?>
		<div >
			<table>
				<tr>
					<td class="text-center" style="width:756pt;font-size:22px;padding: 100pt 100pt 50pt 100pt;height: 395pt; margin-top:30pt;">
						<strong style="text-transform: uppercase;">
						RISK ASSESSMENT FOR THE


						<?php echo $risk["process"];?>
						</strong>
					</td>
				</tr>
			</table>

		</div>
	</div>
	<div class="page">
		<?php create_header(2,$risk); ?>
		<h4>Risk Matrices</h4>
		<div>1. Assessment of <strong>Severity (Consequence)</strong> - with the existing risk controls in consideration, each Risk Assessment Team (RAT) member is to rate the most likely severity outcome of the possible injury or ill-health identified: see <span class="under-line">Table 1</span> below.</div>
		<div >
			<h3>Table-1</h3>
			<table class="table bordertable" border="0">
					<tbody>
           <tr class="table-firstrow"><th width="10%">No</th><th width="5%">Consequence </th><th width="5%">Rating </th><th>Description (*) </th></tr>
					 <tr><td>1</td><td>Catastrophic</td><td>1</td><td>Fatality, fatal diseases or multiple major injuries; or <br>
						Loss of whole production for greater than 10 calendar days; or <br>
					 	Total loss in excess of S$3 million.</td></tr>
					 	<tr><td>2</td><td>Critical</td><td>2</td><td>Serious injuries or life-threatening occupational disease (includes amputations, major fractures, multiple injuries, occupational cancer, acute poisoning); or <br>
					 	Damage to works or plants causing delays greater than 3 but up to 10 calendar days; or <br>
					 	Total loss in excess of S$1 million but up to S$3 million </td></tr>
					 	<tr><td>3</td><td>Marginal</td><td>3</td><td>Injury requiring medical treatment or ill-health leading to disability (includes lacerations, burns, sprains, minor fractures, dermatitis, deafness, work-related upper limb disorders) ; or <br>
					 	Damage to works or plants causing delays greater than 1 but up to 3 calendar days; or <br>
					 	Total loss in excess of S$0.3 million but up to S$1 million <br> </td></tr>
					 	<tr><td>4</td><td>Negligible</td><td>4</td><td>Not likely to cause injury or ill-health, or requiring first-aid only (includes minor cuts and bruises, irritation, ill-health with temporary discomfort); or <br>
					 	Damage to works or plants causing delays up to 1 calendar day; or <br>
					 	Total loss up to S$0.3 million </td></tr>
					</tbody>
			</table>
		</div>
	</div>

	<div class="page">
		<?php create_header(3,$risk); ?>
		<p>2. Assessment of <strong>Likelihood</strong> - with the existing risk controls in consideration, each Risk Assessment Team (RAT) member is to rate the likelihood hazard that may cause the possible injury or ill-health: see <u>Table 2</u> below.</p>
		<h3>Table-2</h3>
		<table class="table bordertable" border="1">
				<tbody>
          <tr class="table-firstrow"><th width="15%">Likelihood </th><th width="15%">Rating </th><th>Description</th></tr>
					 <tr><td>Frequent </td><td>I </td><td>Likely to occur 12 times or more per year</td></tr>
					 <tr><td>Probable </td><td>II </td><td>Likely to occur 4 times per year </td></tr>
					 <tr><td>Occasional </td><td>III </td><td>Likely to occur once a year </td></tr>
					 <tr><td>Remote </td><td>IV </td><td>Likely to occur once in 5 year </td></tr>
				</tbody>
		</table>
  </div>
  <div class="page">
    <?php create_header(4,$risk); ?>
		<p>3. <strong>Risk Category</strong> provides the useful framework to classify risks identified: see <u>Table 3</u> below.</p>
		<h3>Table-3</h3>
		<table class="table bordertable" border="1">

			<tbody><tr class="table-firstrow"><th rowspan="3" colspan="3">Risk Category</th><th colspan="4">Accident Severity Category</th></tr>

			 <tr><td>1</td><td>2</td><td>3</td><td>4</td></tr>
			 <tr><td>Catastrophic</td><td>Critical</td><td>Marginal</td><td>Negligible</td></tr>
			 <tr><td rowspan="4">Accident Frequency Category</td><td>I</td><td>Frequent </td><td bgcolor="#FF0000">A</td><td bgcolor="#FF0000">A</td><td bgcolor="#FF0000">A</td><td bgcolor="#FF9900">B</td></tr>
			 <tr><td>II</td><td>Probable </td><td bgcolor="#FF0000">A</td><td bgcolor="#FF0000">A</td><td bgcolor="#FF9900">B</td><td bgcolor="#FFFF00">C</td></tr>
			 <tr><td>III</td><td>Occasional </td><td bgcolor="#FF0000">A</td><td bgcolor="#FF9900">B</td><td bgcolor="#FFFF00">C</td><td bgcolor="#FFFF00">C</td></tr>
			 <tr><td>IV</td><td>Remote </td><td bgcolor="#FF9900">B</td><td bgcolor="#FFFF00">C</td><td bgcolor="#FFFF00">C</td><td bgcolor="#00FF00">D</td></tr>

			</tbody>
		</table>
	</div>
	<div class="page">
		<?php create_header(5,$risk); ?>
		<p>4. Action for <strong>Risk Index </strong> the following actions are to be implemented based on the current Risk Level, as shown in <u>Table 4</u> below.</p>
		<h3>Table-4</h3>
		<table class="table bordertable" border="1">
			<thead><tr class="table-firstrow"><th width="10%">Risk Index</th><th>Description</th><th>Definition / Actions</th></tr></thead>
			<tbody>
				<tr><td>A</td><td>Intolerable</td><td>The risk is unacceptable. The risk shall be reduced at least to tolerable or undesirable category regardless of the costs of risk mitigation. Senior management attention needed with action plans and management responsibility specified. Work must not start until risk has been reduced. If risk cannot be reduced, the related activity or the project should not proceed.</td></tr>
				<tr><td>B</td><td>Undesirable</td><td>This risk is only acceptable if further risk reduction is not practicable. The measures implemented shall be such as to reduce the risk as low as reasonably practical. Management attention is required. Risk mitigation measures shall be identified with management responsibility assigned. </td></tr>
				<tr><td>C</td><td>Tolerable</td><td>This risk is acceptable subject to demonstration that the level of risk is as low as reasonably practical. The hazard shall be managed by routine procedures throughout the project. </td></tr>
				<tr><td>D</td><td>Acceptable</td><td>This risk is acceptable </td></tr>
			</tbody>
		</table>
	</div>

	<div class="page">
		<?php create_header(6,$risk); ?>
		<h4>Risk Control</h4>
		<p><u>Hierarchy of Control</u></p>
		<p>The control of hazards and reduction of risks can be accomplished by following the WSH Hierarchy of Control (see Figure 1). These control measures are not usually mutually exclusive. Generally, it may be more effective to use multiple control measures, for example, engineering controls work better with administrative controls like training and Safe Work Procedures.</p>
		<div><u>Figure 1</u></div>
		<table border="1" class="table bordertable text-center aligncenter">
			<tbody><tr>
				<td class="green">ELMINATION</td><td><strong>Most Effective</strong></td><td class="green">Change design to eliminate risky maintenance works</td>
			</tr>

			<tr>
				<td class="blue">SUBSTITUTION</td><td rowspan="3"><img src="images/arrow-aqua.png"></td><td class="blue">Use of less flammable construction materials</td>
			</tr>
			<tr>
				<td class="light-green">ENGINEER CONTROLS</td><td class="light-green">Design-in-safe access for building maintenance</td>
			</tr>
			<tr>
				<td class="yellow">ADMINISTRATIVE CONTROL</td><td class="yellow">Implement safe work procedure for maintenance</td>
			</tr>

			<tr>
				<td class="orange">PERSONAL PROTECTION EQUIPMENT (PPE)</td><td><strong>Least Effective</strong></td><td class="orange">Provision and correct use of safety restraint, harness, and soon.</td>
			</tr>
			<tr>
				<td>WSH Hierarchy of Control</td><td></td><td>Example</td>
			</tr>
		</tbody></table>
	</div>
  <div class="page">
    <?php create_header(7,$risk); ?>
    <h3>Inventory of Work Activities and Harzards Identification</h3>
    <table id="risk_register_2" style="width:756pt;">
        <!-- <tr >
                    <td rowspan="1" colspan="4" style="width:75%"><b>Department:CAK & FG Survey  Pte Ltd</b></td>
                    <td rowspan="1" colspan="1" style="width:25%"><b>Date <?php echo $date = date('d-m-Y', strtotime($risk['createdDate']));?></b></td>
        </tr> -->
         <tr style="background-color:#817F88; color:white;">
                     <td rowspan="1" style="width:5%"><b>S/No</b></td>
                     <td rowspan="1" style="width:45%"><b>Process/Location</b></td>
                     <td rowspan="1" style="width:50%"><b>Work Activities</b></td>

                </tr>
        <tr>
                     <td rowspan="1" >1</td>
                     <td rowspan="1" ><?php echo wordwrap ($risk['process'], 15, "\n", 1);?> at <?php echo $risk['location'];?></td>
                     <td rowspan="1" ><?php echo $valueAllWork['name'];?></td>

                </tr>
       <?php
       $risCount = 1;
       while($valueAllWork = mysqli_fetch_assoc($resultAllWork))
       {
        if($risCount == 1)
        {

       ?>


       <tr>
           <td rowspan="1"><b><?php echo $risCount+1;?></b></td>
           <td rowspan="1"></td>
           <!-- <td rowspan="1" ><?php echo wordwrap ($risk['process'], 15, "\n", 1);?> at <?php echo $risk['location'];?></td> -->
           <td rowspan="1" ><?php echo $valueAllWork['name'];?></td>

        </tr>
        <?php
        $risCount++;
        }
        else
        {
        ?>
        <tr>
          <td rowspan="1"><b><?php echo $risCount+1;?></b></td>
          <td rowspan="1"></td>
          <!-- <td rowspan="1" ><?php echo wordwrap ($risk['process'], 15, "\n", 1);?> at <?php echo $risk['location'];?></td> -->
          <td rowspan="1" ><?php echo $valueAllWork['name'];?></td>

        </tr>
    <?php
        $risCount++;
        }//else if ends
        }//while ends
    ?>
     <!-- <tr>
                     <td rowspan="1" ><b><?php echo $risCount+1;?></b></td>
                    </b></td>

                     <td colspan="2" ><b></b></td>
                     <td rowspan="1" ><b>Total:<?php echo $totalWorkActivity;?> Pages</b></td>
                     <td rowspan="1" ><b>Reference Number P-0<?php echo $risk['id']; echo $risk['id'];?></b></td>

                </tr> -->
    </table>

    <br />
    <strong>Note:</strong>
    <ol>


        <li>
            This form is to be completed before filling in the Risk Assessment Form.
        </li>
        <li>
            The contents of the Work Activity column in the Inventory of Work Activities Form is to be copied over to the Work Activity column in the Risk Assessment Form
        </li>
    </ol>
    <br />
    <br />
  </div>
  <div class="page">
    <?php create_header(8,$risk); ?>
     <!-- <h1>Risk Assessment Form </h1> -->

        <?php
         $today = date('d-m-Y');

        //get all the ra leader from signe table for the risk assesment

        $sqlSigning = "SELECT * FROM signing where riskid = $_GET[riskid]";
        $resultlSigning = mysqli_query($con, $sqlSigning);
        $signingRowCount= mysqli_num_rows($resultlSigning);
        ?>



            <table id="risk_register_2" style="width:756pt;">
            <?php
            $signee = mysqli_fetch_assoc($resultlSigning);
            $sqlRAMember = "SELECT * FROM  `ramember` WHERE  `id` in (SELECT ramemberId as id from risk_ramemeber WHERE `riskId` = $_GET[riskid])";
            $resultlRAMember = mysqli_query($con, $sqlRAMember);
            $RAMemberRowCount= mysqli_num_rows($resultlRAMember);
            $raMember = mysqli_fetch_assoc($resultlRAMember);

            ?>
            <tr >
                    <td rowspan="1" colspan="1" style="width:15%;vertical-align: middle;"><strong>Company:</strong></td>
                    <td rowspan="1" colspan="1" style="width:20%;vertical-align: middle;"><strong>THI Engineering & Construction P/L</strong></td>
                    <td rowspan="1" colspan="1" style="width:25%;vertical-align: middle;"><strong>Risk Assessment Team (RAT)</strong></td>
                    <td rowspan="1" colspan="1" style="width:15%;vertical-align: middle;"><strong>Name</strong></td>
                    <td rowspan="1" colspan="1" style="width:15%;vertical-align: middle;"><strong>Designation</strong></td>
                    <td rowspan="1" colspan="1" style="width:15%;vertical-align: middle;"><strong>Signature</strong></td>

                    <!-- <td rowspan="6" colspan="1" style="width:10%;vertical-align: middle;">Reference Number<h1>P-0<?php echo $risk['id'];?></h1></td> -->

                </tr>
                 <tr>
                     <td rowspan="1" colspan="1" style="width:15%">Process:</td>
                     <td rowspan="1" colspan="1" style="width:20%"><?php echo wordwrap ($risk['process'], 15, "\n", 1);?></td>
                     <td rowspan="1" colspan="1" style="width:15%">1)RAT Leader</td>
                     <td rowspan="1" colspan="1" style="width:15%"><?php echo $valueAllUser['name'];?></td>
                     <td rowspan="1" colspan="1" style="width:15%"><?php echo $valueAllUser['designation'];?></td>
                     <td rowspan="1" colspan="1" style="width:15%"><?php echo '<img width="80" src="staff/'.$valueAllUser["signature"].'"/>'; ?></td>

                </tr>
                <tr>
                     <td rowspan="<?php echo $RAMemberRowCount; ?>" colspan="1"style="width:15%">Activity Location:</td>
                     <td rowspan="<?php echo $RAMemberRowCount; ?>" colspan="1" style="width:20%" ><?php echo $risk['location'];?></td>
                     <td rowspan="1" colspan="1" style="width:25%">2)RAT Member</td>
                     <td rowspan="1" colspan="1" style="width:25%"><?php  echo $raMember['name'];?></td>
                     <td rowspan="1" colspan="1" style="width:25%"><?php echo $raMember['designation'];?></td>
                     <td rowspan="1" colspan="1" style="width:25%"> <?php echo $raMember['name']?"<img width='80' src='staff/".$raMember['signature']."'>":""; ?></td>
                </tr>
                <?php $i=0;
                foreach($resultlRAMember as $ra ){
                    $i++;
                    if ($i==1) continue;
                  ?>
                <tr>
                  <td rowspan="1" colspan="1" style=""><?php echo $i+1 ; ?>)RAT Member</td>
                  <td rowspan="1" colspan="1" style=""><?php  echo $ra['name'];?></td>
                  <td rowspan="1" colspan="1" style=""><?php echo $ra['designation'];?></td>
                  <td rowspan="1" colspan="1" style=""> <?php echo $ra['name']?"<img width='80' src='staff/".$ra['signature']."'>":""; ?></td>
                </tr>
                <?php } ?>
                <tr>

                  <td rowspan="1" colspan="3" style="vertical-align: middle;">
                    Approved By: <?php echo $appoverName;
                                      if ($appoverDesignation!="") echo "(".$appoverDesignation.")";
                                  ?>
                    </br>
                    Date and Signature:<?php if($risk['approveDate'] !=null)
                                         {
                                           echo $date = date('d-m-Y', strtotime($risk['approveDate']));
                                         }
                             if($risk['status'] ==2)
                                   {
                        echo '<img width="120" src="staff/'.$signee["signature"].'"/>';
                      }
                      ?>
                    </td>
                     <td rowspan="1" colspan="3"></td>
                </tr>

                <tr>
                     <td rowspan="1" colspan="1">Assessment Date:</td>
                     <td rowspan="1" colspan="1" ><?php echo date('d-m-Y', strtotime($risk['createdDate']));?></td>
                     <td rowspan="3" colspan="4"><strong>Remarks:</strong>
                       <br />
                       <br />
                       Risk assessment will be reviewed every 12 monthly.<br />
                       It should be reviewed immediately if there are any new risk/hazard introduced and accident encountered.
                     </td>
                </tr>
                <tr>
                     <td rowspan="1" colspan="1" style="width:15%">Last Review Date:</td>
                     <td rowspan="1" colspan="1" style="width:20%"><?php if($risk['approveDate'] !=null)
                                {
        							echo $date = date('d-m-Y', strtotime($risk['approveDate']));
        						}
        						?></td>
                </tr>
                <tr>
                     <td rowspan="1" colspan="1" >Next Review Date:</td>
                     <td rowspan="1" colspan="1" >
                       <?php

                       if($risk['approveDate'] !=null)
                                    {
                                      echo $date = date('d-m-Y', strtotime('+'.$risk["expiry_date"].' years - 1 days', strtotime($risk['approveDate'])));

                                    }
                                    else if($risk['createdDate'] != null)
                                    {
                          echo $date = date('d-m-Y', strtotime('+'.$risk["expiry_date"].' years - 1 days', strtotime($risk['createdDate'])));
                        }
                        else
                        {
                          echo '';
                        }


                       ?>
                   </td>
                </tr>
                </table>
    </div>
    <div class="page" style="background-color: #FFF;
    			margin : 10pt 0pt 10pt 0pt;
    			width:800pt;
          height:auto;
    			padding: 22pt;">
          <?php create_header(9,$risk); ?>
      <table style="width:756pt;">

      <!-- <tr style="background-color:#817F88; color:white;">
           <td rowspan="1" colspan="3"><b>Hazard Identification</b></td>
           <td rowspan="1" colspan="5"><b>Risk Evaluation</b></td>
           <td rowspan="1" colspan="7"><b>Risk Control</b></td>

      </tr> -->


      <tr style="background-color:#FFF; color:blue;">
           <td rowspan="2" colspan="1"><b>No</b></td>
           <td rowspan="2" colspan="1"><b>Work Activity</b></td>
           <td rowspan="2" colspan="1"><b>Hazard</b></td>
           <td rowspan="2" colspan="1"><b>Possible Accident / III-Health & Persons-at-Risk</b></td>
           <td rowspan="2" colspan="1"><b>Existing Risk Controls</b></td>
           <td rowspan="1" colspan="3"><b>Initial Risk Index</b></td>
           <td rowspan="2" colspan="1"><b>Additional Risk Controls</b></td>
           <td rowspan="1" colspan="3"><b>Residual Risk Index</b></td>
           <td rowspan="1" colspan="3"><b>Risk Owner (Action Officer)</b></td>

      </tr>
      <tr>
        <td rowspan="1" colspan="1"><b>S</b></td>
        <td rowspan="1" colspan="1"><b>L</b></td>
        <td rowspan="1" colspan="1"><b>R</b></td>
        <td rowspan="1" colspan="1"><b>S</b></td>
         <td rowspan="1" colspan="1"><b>L</b></td>
         <td rowspan="1" colspan="1"><b>R</b></td>
         <td rowspan="1" colspan="1"><b>Name</b></td>
          <td rowspan="1" colspan="1"><b>Designation</b></td>
          <td rowspan="1" colspan="1"><b>Follow-up period</b></td>
      </tr>
  <?php
      //get total work activity

       $getAllWorkSql = "SELECT * FROM `workactivity` WHERE `riskId` = ".$_GET['riskid']." ORDER BY  `work_id` ASC ";
       $resultAllWork=mysqli_query($con, $getAllWorkSql);
       $totalWorkActivity = mysqli_num_rows($resultAllWork);
     $riskids = 1;
      $m=0;
while($valueAllWork = mysqli_fetch_assoc($resultAllWork))
      {
          $m++;
//number of hazards in workactivity
        $getAllHazardsSql = "SELECT * FROM `hazard` WHERE `work_id` = ".$valueAllWork['work_id']." ORDER BY `hazard_id` ASC";
       $resultAllHazards=mysqli_query($con, $getAllHazardsSql);
       $totalHazards = mysqli_num_rows($resultAllHazards);

          $hazrdsControl = 1;
          while($hzardsValue = mysqli_fetch_assoc($resultAllHazards))

          {

              if($hazrdsControl == 1)
              {


                ?>

            <tr>
                <td rowspan="<?php echo $totalHazards;?>" colspan="1"> <?php echo $m; ?></td>
                <td rowspan="<?php echo $totalHazards;?>" colspan="1">  <?php echo $valueAllWork['name'];?></td>
                <td rowspan="1" colspan="1"> <?php echo $hzardsValue['name'];?></td>


                <td rowspan="1" colspan="1" style="text-align: justify;"> <?php echo $hzardsValue['accident'];?> </td>

                <td rowspan="1" colspan="1" style="text-align: left;white-space:pre;"> <?php echo wordwrap ($hzardsValue['risk_control'], 15, "\n", 1);?> </td>
                <td rowspan="1" colspan="1"> <?php echo $hzardsValue['security'];?></td>
                <td rowspan="1" colspan="1"> <?php echo $romans[$hzardsValue['likehood']];?> </td>

                            <?php
        $RPN_Label = "-";$RPN_TWOLabel="-";
        if($hzardsValue['likehood']=="-"|| $hzardsValue['security']=="-")
        {
          $RPN_Label="-";
        }
        else
        {
          $RPN_Label = getRiskLabel($hzardsValue['security'],$hzardsValue['likehood']);
        }
        ?>

         <td rowspan="1" colspan="1"><?php echo $RPN_Label;?></td>
         <td rowspan="1" colspan="1" style="text-align: left;white-space:pre" ><?php echo wordwrap ($hzardsValue['risk_additional'], 30, "\n", 1);?></td>

        <?php
        if($hzardsValue['risk_additional']=="")
        {
          $securitysecond="-";
          $likehoodsecond="-";
          $RPN_TWOLabel="-";
        }
        else
        {
          $securitysecond= $hzardsValue['securitysecond'];
          $likehoodsecond= $hzardsValue['likehoodsecond'];
          $RPN_TWOLabel=getRiskLabel($hzardsValue['securitysecond'], $hzardsValue['likehoodsecond']);
        }
        ?>

                           <td rowspan="1" colspan="1"><?php echo $securitysecond;?></td>

                           <td rowspan="1" colspan="1"><?php echo $romans[$likehoodsecond];?></td>

                          <td rowspan="1" colspan="1"><?php echo $RPN_TWOLabel;?> </td>

                         <td rowspan="1" colspan="1"> <?php

                               $getAllActtionOfficerSql = "SELECT * FROM `ramember` WHERE `id` in (SELECT ramemberId FROM `hazard_actionofficer` WHERE `hazardid` = ".$hzardsValue['hazard_id'].")";
                                    $resultActtionOfficer = mysqli_query($con, $getAllActtionOfficerSql);


                                    foreach($resultActtionOfficer as $valueAllActionOfficer)
                                    {
                                      echo "<div>".$valueAllActionOfficer["name"]."</div>";//"<div><img width='40' src='staff/".$valueAllActionOfficer["signature"]."'/></div>";
                                    }



                            ?> </td>

                             <?php
        if($hzardsValue['risk_additional']=="")
        {
          $action_date="-";
        }
        else
        {
          // $action_date= date('d-m-Y', strtotime($hzardsValue['action_date']));
          $action_date = $hzardsValue['action_date']?$hzardsValue['action_date']:"";
        }
        ?>



            <td rowspan="1" colspan="1"> <?php
              foreach($resultActtionOfficer as $valueAllActionOfficer)
              {
                echo "<div>".$valueAllActionOfficer["designation"]."</div>";
              }?>
           </td>
            <td rowspan="1" colspan="1"> <?php echo  $action_date; ?> </td>
                       </tr>
      <?php
                  }
                  else
                  {
                      ?>
                          <tr>
                            <td rowspan="1" colspan="1"> <?php echo $hzardsValue['name'];?> </td>
                            <td rowspan="1" colspan="1"> <?php echo $hzardsValue['accident'];?> </td>
                            <td rowspan="1" colspan="1"> <?php echo $hzardsValue['risk_control'];?> </td>
                            <td rowspan="1" colspan="1"> <?php echo $hzardsValue['security'];?></td>
                            <td rowspan="1" colspan="1"> <?php echo $romans[$hzardsValue['likehood']];?> </td>
                            <td rowspan="1" colspan="1"><?php echo getRiskLabel($hzardsValue['security'], $hzardsValue['likehood']);?>
                           </td>
                            <td rowspan="1" colspan="1" style="text-align: left;white-space:pre"> <?php echo wordwrap ($hzardsValue['risk_additional'], 30, "\n", 1);?> </td>
                              <?php
        $RPNLabel = "-";
        if($hzardsValue['risk_additional']=="")
        {
          $securitysecond="-";
          $likehoodsecond="-";
          $RPNLabel="-";
        }
        else
        {
          $securitysecond= $hzardsValue['securitysecond'];
          $likehoodsecond= $hzardsValue['likehoodsecond'];
          $RPNLabel=getRiskLabel($hzardsValue['securitysecond'], $hzardsValue['likehoodsecond']);

        }
        ?>


                        <td rowspan="1" colspan="1"><?php echo $securitysecond;?></td>

                        <td rowspan="1" colspan="1"><?php echo $romans[$likehoodsecond];?></td>

                        <td rowspan="1" colspan="1"><?php echo $RPNLabel;?>
                        </td>

                        <td rowspan="1" colspan="1"> <?php

                                 $getAllActtionOfficerSql = "SELECT * FROM `ramember` WHERE `id` in (SELECT ramemberId FROM `hazard_actionofficer` WHERE `hazardid` = ".$hzardsValue['hazard_id'].")";
                                      $resultActtionOfficer = mysqli_query($con, $getAllActtionOfficerSql);


                                      foreach($resultActtionOfficer as $valueAllActionOfficer)
                                      {
                                        echo "<div>".$valueAllActionOfficer["name"]."</div>";//"<div><img width='40' src='staff/".$valueAllActionOfficer["signature"]."'/></div>";
                                      }



                          ?> </td>
                               <?php
        if($hzardsValue['risk_additional']=="")
        {
          $action_date="-";
        }
        else
        {
          // $action_date= date('d-m-Y', strtotime($hzardsValue['action_date']));
          $action_date = $hzardsValue['action_date']?$hzardsValue['action_date']:"";
        }
        ?>



        <td rowspan="1" colspan="1"> <?php
          foreach($resultActtionOfficer as $valueAllActionOfficer)
          {
            echo "<div>".$valueAllActionOfficer["designation"]."</div>";
          }?>
       </td>
          <td rowspan="1" colspan="1"> <?php echo  $action_date; ?></td>
                        </tr>
                      <?php
                  }
                  $hazrdsControl++;
              }//hazards while contols


}//end of while  workactivity
       ?>

  </table>
  <br />
  <br />
    </div>
    <div class="page">
      <?php create_header(10,$risk); ?>
            <div style="width:45%;float:left">
            			<table class="table bordertable" border="1">
            			<tbody><tr><th rowspan="0">Prepared By: <br> Contractor RA Leader <p><?php echo $valueAllUser['name'];?></p></th>
                    <th rowspan="0">Approved By: <br>Contractor Senior Management <p><?php echo $appoverName;?></p></th></tr>
            			<tr class="table-firstrow"><th>Designation:  WSHC</th><th>Designation:  <?php echo $appoverDesignation;?></th></tr>
             <tr><td>Signature: <?php echo $valueAllUser["signature"]!=""?'<img width="80" src="staff/'.$valueAllUser["signature"].'"/>':""; ?> <br> Date: <?php echo date('d-m-Y', strtotime($risk['createdDate']));?> </td>
               <td>Signature: <?php echo $appoverSingature!=""?'<img width="80" src="staff/'.$appoverSingature.'"/>':"";?> <br> Date: <?php  echo $risk['approveDate']!=null?date('d-m-Y', strtotime($risk['approveDate'])):"";?></td></tr>
             </tbody>
            			</table>
            </div>
            <div style="width:45%;float:right">
        			<table class="table bordertable" border="1">
        				<tbody><tr><th>Reviewed By: <br> POC Risk Management Team (RMT) <p>Date of Review: <?php echo $risk["revisionDate"]!=null?date('d-m-Y', strtotime($risk['revisionDate'])):"";?></p></th><th colspan="2">Status*: (Acp  /  Acp w/c  / Not Acp)</th></tr>
        				<tr class="table-firstrow"><th>Name</th><th>Designation: </th><!--<th>Signature</th>--></tr>
        					</tbody><tbody>


        					</tbody>
        			</table>
        		</div>
            <div style="width:30%">
              <table class="table bordertable" border="1">
              	<thead>
              		<tr class="table-firstrow"><th>Status*</th><th>*Delete where appropriate</th></tr>
              	</thead>
              	<tbody>
               		<tr><td>Acp</td><td>Accepted</td></tr>
               		<tr><td>Acp w/c</td><td>Accepted with comments</td></tr>
               		<tr><td>Not Acp</td><td>Not Accepted</td></tr>
              	</tbody>
              </table>
            </div>
    </div>
<br>
 </div>
 <div class ="no-print" style="margin: 0 auto; width: 100px; text-align: center;position:fixed;left:2px;top:50%"><button onClick="window.print()">Print</button></div>
<script src="js1/jquery.js"></script>
<!-- <script src="js/splitPage.js"></script> -->
    </body>
    </html>
