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
    <title>Inventory of Work Activities</title>
	<link rel="stylesheet" type="text/css" href="css/template.css">
      </head>


<body>
    <div class="container">


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
       // $totalWorkActivity = mysqli_num_rows($resultAlluser);

        $valueAllUser = mysqli_fetch_assoc($resultAlluser);
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
function create_header($page_number,$risk){
	?>
	<div class="main-header" style="width:756pt; background: #fff; top: 0;">
			<div class="right_side">
				<table>
					<tr>
						<td style="width: 615.2pt;">
							<div><img src="images/THI_Engineering_and_construction_pte ltd.png" width="100" /></div>
							<div><strong>THI ENGINEERING AND CONSTRUCTION PTE LTD</strong></div>
							<div><strong style="text-transform: uppercase;"><?php echo $risk["project_title"];?></strong></div>
						</td>
						<td style="width: 140.8pt;">
							<div><strong>WSH Form 02-2  </strong></div>
							<div> Revision:  00</div>
							<div> Sheet:  Page <?php echo $page_number; ?> of 9</div>
							<div> Dated:  <?php echo date('d-m-Y', strtotime($risk['createdDate']));?></div>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<div class="text-center"><strong>Risk Assessment for <span class="under-line"> <?php echo $risk["process"];?> </span></strong></div>
							<div class="text-center"><strong>Undertaken by <span class="under-line"> QE Safety Consultancy  </span></strong></div>

						</td>
					</tr>
				</table>
			</div>
		</div>
	<?php

}

?>
	<div class="page">
		<?php create_header(1,$risk); ?>
    <div>
		<table class="table bordertable" width="100%">
			<tbody><tr bgcolor="#e6e6e6">
				<td><b>Revision</b></td>
				<td><b>00</b></td>
				<td rowspan="2"><b>Signature</b></td>
				<td><b>01</b></td>
				<td rowspan="2"><b>Signature</b></td>
				<td><b>02</b></td>
				<td rowspan="2"><b>Signature</b></td>
			</tr>

			 <tr>
				 <td><b>Date</b></td>
				 <td><?php echo date('d-m-Y', strtotime($risk['createdDate']));?></td>

				 <td><?php echo date('d-m-Y', strtotime($risk['approveDate']));?></td>

				 <td></td>

			 </tr>
			 <tr>
				 <td><b>Originated by</b></td>
				 <td><?php echo $valueAllUser['name'];?></td>
				 <td><?php echo '<img width="80" src="staff/'.$valueAllUser["signature"].'"/>'; ?></td>
				 <td><?php echo $appoverName;?></td>
				 <td><?php echo $appoverSingature!=""?'<img width="80" src="staff/'.$appoverSingature.'"/>':""; ?></td>
				 <td></td>
				 <td></td>
			 </tr>
			 <tr>
				 <td><b>Approved by</b></td>
				 <td></td>
				 <td></td>
				 <td></td>
				 <td></td>
				 <td></td>
				 <td></td>
			 </tr>

		</tbody>
  </table>
</div>
    <div style=" margin-top:30pt;">
      <table>
        <tr>
          <td class="text-center" style="width:756pt;font-size:22px;padding: 100pt 100pt 50pt 100pt;height: 100pt;">
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
    <div class="risk_matrices">
		    Risk Matrices
	   </div>
     <div class="assessment">
		<p>1. Assessment of <strong>Severity</strong> - with the existing risk controls in consideration, each Risk Assessment Team (RAT) member is to rate the most likely severity outcome of the possible injury or ill-health identified: see <u>Table 1</u> below.</p>
	<h3>Table-1</h3>
	<table width="100%" class="table bordertable">
		<tbody><tr class="table-firstrow">
			<th width="15%">Severity (S)</th><th>Description</th>
		</tr>

		<tr>
			<td>(5) Catastrophic</td><td>Fatality, fatal diseases or multiple major injuries.</td>
		</tr>
		<tr>
				<td>(4) Major</td><td>Serious injuries or life-threatening occupational disease (includes amputations, major fractures, multiple injuries, occupational cancer, acute poisoning).</td>
			</tr>

			<tr>
				<td>(3) Moderate</td><td>Injury requiring medical treatment or ill-health leading to disability (includes lacerations, burns, sprains, minor fractures, dermatitis, deafness, work-related upper limb disorders).</td>
			</tr>

			<tr>
				<td>(2) Minor</td><td>Injury or ill-health requiring first-aid only (includes minor cuts and bruises, irritation, ill-health with temporary discomfort).</td>
			</tr>

			<tr>
				<td>(1) Negligible</td><td>Not likely to cause injury or ill-health</td>
			</tr>
	</tbody></table>
	</div>
  </div>
  <div class="page">
    <?php create_header(3,$risk); ?>
    <div class="assessment">
			2.	Assessment of <strong>Likelihood</strong> - with the existing risk controls in consideration, each Risk Assessment Team (RAT) member is to rate the likelihood hazard that may cause the possible injury or ill-health: see Table 2 below.
			</div>
      <br />
      <h3>Table 2</h3>
      <table class="table bordertable" width="100%">
			<tbody><tr class="table-firstrow">
				<th>Likelihood (L)</th>
				<th>Description</th>
			</tr>
			<tr>
				<td>(1) Rare</td>
				<td>Not expected to occur but still possible.</td>
			</tr>
			<tr>
				<td>(2) Remote</td>
				<td>Not likely to occur under normal circumstances.</td>
			</tr>
			<tr>
				<td>(3) Occasional</td>
				<td>Possible or known to occur</td>
			</tr>
			<tr>
				<td>(4) Frequent</td>
				<td>Common occurrence.</td>
			</tr>
			<tr>
				<td>(5) Almost Certain</td>
				<td>Continual or repeating experience.</td>
			</tr>
		</tbody></table>
  </div>
  <div class="page">
    <?php create_header(4,$risk); ?>
    <div class="assessment">
			3.	<strong>Risk Matrix </strong> the useful framework to classify risks identified: see Table 3 below
		</div>
    <br />
    <h3>Table 3</h3>
    <table class="table bordertable" width="100%">
 	<tbody><tr class="">
 		<th width="15%" style="padding:0px;"><img src="images/td-head.png"></th>
 		<th>(1) Rare </th>
 		<th>(2) Remote</th>
 		<th>(3) Occasional</th>
 		<th>(4) Frequent</th>
 		<th>(5) Almost Certain</th>
 	</tr>
 	<tr>
 		<td>(5) Catastrophic</td>
 		<td class="yellow">(5) Medium</td>
 		<td class="yellow">(10) Medium</td>
 		<td class="pink">(15) High</td>
 		<td class="pink">(20) High</td>
 		<td class="pink">(25) High</td>
 	</tr>
 	<tr>
 		<td>(4) Major </td>
 		<td class="yellow">(4) Medium</td>
 		<td class="yellow">(8) Medium</td>
 		<td class="yellow">(12) Medium</td>
 		<td class="pink">(16) High</td>
 		<td class="pink">(20) High</td>
 	</tr>
 	<tr>
		<td>(3) Moderate </td>
		<td class="dim-green">(3) Low</td>
		<td class="yellow">(6) Medium</td>
		<td class="yellow">(9) Medium</td>
		<td class="yellow">(12) Medium</td>
		<td class="pink">(15) High</td>
	</tr>
	<tr>
		<td>(2) Minor  </td>
		<td class="dim-green">(2)Low</td>
		<td class="yellow">(4) Medium</td>
		<td class="yellow">(6) Medium</td>
		<td class="yellow">(8) Medium</td>
		<td class="pink">(10) High</td>
	</tr>
	<tr>
		<td>(1) Negligible </td>
		<td class="dim-green">(1)Low</td>
		<td class="dim-green">(2) Low</td>
		<td class="dim-green">(3) Low</td>
		<td class="yellow">(4) Medium</td>
		<td class="yellow">(5) Medium</td>
	</tr>
	<tr>
		<td colspan="6">[Risk Level:  H = High Risk (15 ~ 25)   M = Medium Risk (4 ~ 14)   L = Low Risk (1 ~ 3)]</td>
	</tr>

</tbody></table>
  </div>
  <div class="page">
    <?php create_header(5,$risk); ?>
    <br />
    <h3>Table 4</h3>
    <table class="table bordertable">
	<tbody><tr class="table-firstrow ">
		<th>Risk Level</th>
		<th>Risk Acceptability</th>
		<th>Recommended Actions</th>
	</tr>
	<tr class="dim-green">
		<td>Low Risk</td>
		<td>Acceptable</td>
		<td>- No additional risk control measures may be needed.<br>
		- Frequent review and monitoring of hazards are required to ensure that the risk level assigned is accurate and does not increase over time.</td>
	</tr>

	<tr class="yellow">
		<td>Medium Risk</td>
		<td>Tolerable</td>
		<td>- A careful evaluation of the hazards should be carried out to ensure that the risk level is reduced to as low as reasonably practicable (ALARP) within a defined time period.<br>
		- Interim risk control measures, such as administrative controls or PPE, may be implemented while longer term measures are being established.<br>
		- Management attention is required.
		</td>
	</tr>

	<tr class="pink">
		<td>High Risk</td>
		<td>Not acceptable</td>
		<td>-	High Risk level must be reduced to at least Medium Risk before work commences.<br>
-	There should not be any interim risk control measures. Risk control measures should not be overly dependent on PPE or appliances.<br>
-	If practicable, the hazard should be eliminated before work commences.<br>
-	Management review is required before work commences.
		</td>
	</tr>

</tbody></table>
  </div>
  <div class="page">
    <?php create_header(6,$risk); ?>
    <h4>Risk Control</h4>
    <p><u>Hierarchy of Control</u></p>
    <p>The control of hazards and reduction of risks can be accomplished by following the WSH Hierarchy of Control (see Figure 1). These control measures are not usually mutually exclusive. Generally, it may be more effective to use multiple control measures, for example, engineering controls work better with administrative controls like training and Safe Work Procedures.</p>
    <div><u>Figure 1</u></div>
    <table class="table bordertable aligncenter" width="100%">
			<tbody><tr>
				<td class="green">ELMINATION</td>
				<td><strong>Most Effective</strong></td>
				<td class="green">Change design to eliminate risky maintenance works</td>
			</tr>

			<tr>
				<td class="blue">SUBSTITUTION</td>
				<td rowspan="3"><img src="images/arrow-aqua.png"></td>
				<td class="blue">Use of less flammable construction materials</td>
			</tr>
			<tr>
				<td class="light-green">ENGINEER CONTROLS</td>
				<td class="light-green">Design-in-safe access for building maintenance</td>
			</tr>
			<tr>
				<td class="yellow">ADMINISTRATIVE CONTROL</td>
				<td class="yellow">Implement safe work procedure for maintenance</td>
			</tr>

			<tr>
				<td class="orange">PERSONAL PROTECTION EQUIPMENT (PPE)</td>
				<td><strong>Least Effective</strong></td>
				<td class="orange">Provision and correct use of safety restraint, harness, and soon.</td>
			</tr>
			<tr>
				<td>WSH Hierarchy of Control</td>
				<td></td>
				<td>Example</td>
			</tr>
		</tbody></table>
  </div>
  <div class="page">
    <?php create_header(7,$risk); ?>
    <strong>Inventory of Work Activities and Hazard Identification: <?php echo $risk["process"]; ?></strong>
    <table id="risk_register_2" style="width:756pt;">
        <!-- <tr >
                    <td rowspan="1" colspan="4" style="width:75%"><b>Department:QE Safety Consultancy Pte Ltd</b></td>
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
           <td rowspan="1" ><?php echo wordwrap ($risk['process'], 15, "\n", 1);?> at <?php echo $risk['location'];?></td>
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
          <td rowspan="1" ><?php echo wordwrap ($risk['process'], 15, "\n", 1);?> at <?php echo $risk['location'];?></td>
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
  </div>
  <div class="page">
    <?php create_header(8,$risk); ?>
    <table class="table bordertable" width="100%" style="float:left;">
			<tbody><tr>
				<td bgcolor="#D9D9D9">Company:</td>
				<td>THI Engineering &amp; Construction Pte Ltd</td>
				<td bgcolor="#D9D9D9"><strong>Risk Assessment Team</strong></td>
				<td class="grey">Name</td>
				<td class="grey">Designation</td>
				<td class="grey">Date</td>
				<td class="grey" rowspan="3">Approved by:<?php echo $appoverName;?><br>Signature:</td>
				<td rowspan="3"><?php echo $valueAllUser["signature"]!=""?'<img width="80" src="staff/'.$valueAllUser["signature"].'"/>':""; ?></td>
			</tr>
			<tr>
				<td class="grey">Process:</td>
				<td><?php echo $risk["process"]; ?></td>
				<td class="grey">1)Team  Leader</td>
				<td>rajesh</td>
				<td>WSHO</td>
				<td>27-04-2019</td>

			</tr>
			<tr>
				<td class="grey">Activity Location:</td>
				<td>warehouse</td>
				<td class="grey">2) Member</td>
				<td> <br>
				<img src="images/" height="60"> </td>
				<td></td>
				<td>27-04-2019</td>

			</tr>
			<tr>
				<td class="grey">Original Assessment Date:</td>
				<td><?php echo date('d-m-Y', strtotime($risk['createdDate'])); ?></td>
				<td class="grey">3) Member</td>
				<td></td>
				<td></td>
				<td></td>
				<td class="grey">Name:</td>
				<td>Julius Lim</td>
			</tr>
			<tr>
				<td class="grey">Last Review Date:</td>
				<td>
          <?php if($risk['approveDate'] !='0000-00-00 00:00:00')
             {
   echo $date = date('d-m-Y', strtotime($risk['approveDate']));
 } ?>				</td>
				<td class="grey">4) Member</td>
				<td></td>
				<td></td>
				<td></td>
				<td class="grey">Designation:</td>
				<td>manager</td>
			</tr>
			<tr>
				<td class="grey">Next Review Date:</td>
				<td>
          <?php

          if($risk['approveDate'] !='0000-00-00 00:00:00')
                       {
                         echo $date = date('d-m-Y', strtotime('+'.$risk["expiry_date"].' years', strtotime($risk['approveDate'])));

                       }
                       else if($risk['createdDate'] != '0000-00-00 00:00:00')
                       {
             echo $date = date('d-m-Y', strtotime('+'.$risk["expiry_date"].' years', strtotime($risk['createdDate'])));
           }
           else
           {
             echo '';
           }


          ?>
        				</td>
				<td class="grey">5) Member</td>
				<td></td>
				<td></td>
				<td></td>
				<td class="grey">Date:</td>
				<td><?php

        if($risk['approveDate'] !='0000-00-00 00:00:00')
                     {
                       echo $date = date('d-m-Y', strtotime('+'.$risk["expiry_date"].' years', strtotime($risk['approveDate'])));

                     }
                     else if($risk['createdDate'] != '0000-00-00 00:00:00')
                     {
           echo $date = date('d-m-Y', strtotime('+'.$risk["expiry_date"].' years', strtotime($risk['createdDate'])));
         }
         else
         {
           echo '';
         }


        ?></td>
			</tr>
		</tbody></table>
  </div>
  <div style="background-color: #FFF;
        margin : 10pt 0pt 10pt 0pt;
        width:800pt;
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

                        <td rowspan="1" colspan="1" style="text-align: justify;"> <?php echo wordwrap ($hzardsValue['risk_control'], 15, "\n", 1);?> </td>
                        <td rowspan="1" colspan="1"> <?php echo $hzardsValue['security'];?></td>
                        <td rowspan="1" colspan="1"> <?php echo $hzardsValue['likehood'];?> </td>

                          <?php
      if($hzardsValue['likehood']=="-"|| $hzardsValue['security']=="-")
      {
        $RPN_TWO="-";
      }
      else
      {
        $RPN_TWO=$hzardsValue['security'] * $hzardsValue['likehood'];
      }
      ?>

                       <td rowspan="1" colspan="1"><?php echo $RPN_TWO;?>
                         </td>


                        <td rowspan="1" colspan="1"> <?php echo $hzardsValue['risk_additional'];?> </td>

                        <?php
      if($hzardsValue['risk_additional']=="")
      {
        $securitysecond="-";
        $likehoodsecond="-";
        $RPN="-";
      }
      else
      {
        $securitysecond= $hzardsValue['securitysecond'];
        $likehoodsecond= $hzardsValue['likehoodsecond'];
        $RPN=$hzardsValue['securitysecond'] * $hzardsValue['likehoodsecond'];
      }
      ?>

                         <td rowspan="1" colspan="1"><?php echo $securitysecond;?></td>

                         <td rowspan="1" colspan="1"><?php echo $likehoodsecond;?></td>





                        <td rowspan="1" colspan="1"><?php echo $RPN;?>
                         </td>

                         <td rowspan="1" colspan="1"> <?php

                               $getAllActtionOfficerSql = "SELECT * FROM `ramember` WHERE `id` in (SELECT ramemberId FROM `hazard_actionofficer` WHERE `hazardid` = ".$hzardsValue['hazard_id'].")";
                                    $resultActtionOfficer = mysqli_query($con, $getAllActtionOfficerSql);


                                    foreach($resultActtionOfficer as $valueAllActionOfficer)
                                    {
                                      echo "<div>".$valueAllActionOfficer["name"]."</div>";
                                    }



                            ?> </td>

                           <?php
      if($hzardsValue['risk_additional']=="")
      {
        $action_date="-";
      }
      else
      {
        $action_date= date('d-m-Y', strtotime($hzardsValue['action_date']));
      }
      ?>



      <td rowspan="1" colspan="1"> <?php
        foreach($resultActtionOfficer as $valueAllActionOfficer)
        {
          echo "<div>".$valueAllActionOfficer["designation"]."</div>";
        }?>
     </td>
      <td rowspan="1" colspan="1"> - </td>
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
                          <td rowspan="1" colspan="1"> <?php echo $hzardsValue['likehood'];?> </td>
                          <td rowspan="1" colspan="1"><?php echo $hzardsValue['security'] * $hzardsValue['likehood'];?>
                         </td>
                          <td rowspan="1" colspan="1"> <?php echo $hzardsValue['risk_additional'];?> </td>
                            <?php
      if($hzardsValue['risk_additional']=="")
      {
        $securitysecond="-";
        $likehoodsecond="-";
        $RPN="-";
      }
      else
      {
        $securitysecond= $hzardsValue['securitysecond'];
        $likehoodsecond= $hzardsValue['likehoodsecond'];
        $RPN=$hzardsValue['securitysecond'] * $hzardsValue['likehoodsecond'];
      }
      ?>


                      <td rowspan="1" colspan="1"><?php echo $securitysecond;?></td>

                         <td rowspan="1" colspan="1"><?php echo $likehoodsecond;?></td>

                          <td rowspan="1" colspan="1"><?php echo $RPN;?>
                         </td>

                          <td rowspan="1" colspan="1"> <?php

                             $getAllActtionOfficerSql = "SELECT * FROM `actionofficer` WHERE `hazardid` = ".$hzardsValue['hazard_id']."";
                                  $resultActtionOfficer = mysqli_query($con, $getAllActtionOfficerSql);


                                  while($valueAllActionOfficer = mysqli_fetch_assoc($resultActtionOfficer))
                                  {
                                    echo "<div>$valueAllActionOfficer[name]</div>";
                                  }



                          ?> </td>
                             <?php
      if($hzardsValue['risk_additional']=="")
      {
        $action_date="-";
      }
      else
      {
        $action_date= date('d-m-Y', strtotime($hzardsValue['action_date']));
      }
      ?>



                        <td rowspan="1" colspan="1"> <?php echo $hzardsValue["action_officer"] ;?> </td>
                          <td rowspan="1" colspan="1"> - </td>
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

       <div style="margin: 0 auto; width: 656px; text-align: center;"><button onClick="window.print()">Save as PDF</button></div>
 </div>


    </body>
    </html>
