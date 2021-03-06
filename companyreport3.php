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
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="css/template.css"> -->


    <meta charset="utf-8">
    <title>Inventory of Work Activities</title>

      </head>
      <style type="text/css">

	  .printbreak {
       page-break-before: always;
       }
       body {
           background-color: white;
           width: 297mm;
       }

    table, tr, td {
    border: 1px solid black;
    border-collapse: collapse;
     vertical-align: text-top;

    }
   #risk_register tr td {
    padding: 8px;

    }
table .heading
{


  text-align: left;
  background-color: #868080;
  color:white;
  font-size: 24px;


}

.no_border tr td

{
border-left: 0px;
    border-right: 0px;
}

th
{
    border:1px solid black;
}
td p{
    border: 1px solid;
    border-left: 0px;
    border-right: 0px;
    margin-top: 0px;
    margin-bottom: 0px;
    margin-left: -2px;
    margin-right: -2px;
    border-bottom: none;
    padding-left: 10px;
}
@media print {
  .page {
    page-break-after: always
  }
  .no-print {
    display: none;
  }
  thead {display: table-row-group}
}
</style>

<body>

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
        $sqlRAMember = "SELECT * FROM  `ramember` WHERE  `id` in (SELECT ramemberId as id from risk_ramemeber WHERE `riskId` = $_GET[riskid])";
        $resultlRAMember = mysqli_query($con, $sqlRAMember);
        $romans = array("1"=>"I","2"=>"II","3"=>"III","4"=>"IV","5"=>"V","-"=>"-");

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



 <body>

<div class="page">
	<table class="table bordertable" style="margin-bottom: 0px" width="100%">
	<tbody><tr>
		<th width="280"><img src="images/SKengineering.png" width="250"></th>
		<th colspan="3" valign="top"><h1 style="margin:0px; padding:0px;">Risk Assessment Form<br><?php echo $risk["process"]; ?></h1></th>
	</tr>
	<tr>
		<td>Company</td>
		<td>SK E&amp;C (Singapore Branch)</td>
		<td>Conducted by:</td>
		<td>RA team</td>
	</tr>
	<tr>
		<td>Location of shafts:</td>
		<td><?php echo $risk['location'];?></td>
		<td>Names,designations:<br />
    </td>
		<td style="padding:15px;">
      <?php echo $valueAllUser['name'];?>(RA Leader) <br />
      <?php echo $valueAllUser["signature"]!=""?'<img width="80" src="staff/'.$valueAllUser["signature"].'"/>':""; ?><br /> <?php foreach($resultlRAMember as $ra ) {
          echo $ra["name"]."(".$ra["designation"]. ") <br />".($ra["signature"]!=""?'<img width="50" src="staff/'.$ra["signature"].'"/> <br />':"");
        }
       ?>
			</td>
	</tr>

	<tr>
		<td>Approved by:</td>
		<td rowspan="3">  <?php echo$appoverName.", ".$appoverDesignation.""; ?><?php echo $appoverSingature!= ""?"<img width='80' src='staff/".$appoverSingature."'>":"" ?> </td>
		<td>(Date)</td>
		<td><?php echo $risk["approveDate"]; ?></td>
	</tr>

	<tr>
		<td>(Name,designation)</td>
		<td rowspan="2">Last Review Date:<?php if($risk['approveDate'] !=null)
       {
echo $date = date('d-m-Y', strtotime($risk['approveDate']));
}
?></td>
		<td rowspan="2">Next Review Date: 
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

	<tr>
		<td>(Date)</td>
	</tr>


	<tr>
		<td colspan="4"><strong style="text-transform: uppercase;">TITLE OF PROCESS (TRADE ACTIVITY) : <?php echo $risk["process"];?></strong></td>
	</tr>




</tbody></table>



<table class="table bordertable" style="margin-bottom: 0px" width="100%">
	<tbody>
    <tr bgcolor="#817F88">
		    <td colspan="13">SKEC (Main Contractor) - Reviewed and Accepted by:</td>
	  </tr>
    <tr style="height:100px">
      <td colspan="4">
        Name/Safety Officer/Sign
        <br />
        <br />
      </td>
      <td colspan="5">
        Name/Safety Manager/Sign
        <br />
        <br />
      </td>
      <td colspan="4">
        Name/Project Manager/Sign
        <br />
        <br />
      </td>
    </tr>
  </tbody>
</table>
</div>
<div class="page">
<table class="table bordertable" width="100%">
	<tbody><tr>



	</tr>
</tbody></table>

<table class="table bordertable" width="100%">
	<tbody><tr>
		<td colspan="13">&nbsp;</td>
	</tr>

	<tr>
		<th colspan="4">1. Hazard Identification</th><th colspan="4">2. Risk Evaluation</th><th colspan="5">3. Risk Control</th>
	</tr>
	<tr>
		<th>1a</th>
		<th>1b</th>
		<th>1c</th>
		<th>1d</th>
		<th>2a</th>
		<th>2b</th>
		<th>2c</th>
		<th>2d</th>
		<th>3a</th>
		<th>3b</th>
		<th>3c</th>
		<th>3d</th>
		<th>3e</th>
	</tr>
	<tr>
		<th>No</th>
		<th>Work Activity</th>
		<th>Hazard</th>
		<th>Possible Accident / <br>III Health &amp; Persons-<br>at- Risk</th>
 		<th>Existing Risk Control (if any)</th>
 		<th>Severity</th>
 		<th>Likelihood</th>
 		<th>Risk Level</th>
 		<th>Additional Risk<br> Control</th><th>Severity</th>
 		<th>Likelihood</th><th>Risk Level</th>
 		<th>Action Officer, Designation<br>(Follow-up date)</th>

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
                          <td rowspan="1" colspan="1"> <?php echo $romans[$hzardsValue['security']];?></td>
                          <td rowspan="1" colspan="1"> <?php echo $romans[$hzardsValue['likehood']];?> </td>

      <?php
        $RPN_Label = "-";$RPN_TWOLabel = "-";
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
          $RPN_TWOLabel = getRiskLabel($hzardsValue['securitysecond'], $hzardsValue['likehoodsecond']);
        }
        ?>

             <td rowspan="1" colspan="1"><?php echo $romans[$securitysecond];?></td>

             <td rowspan="1" colspan="1"><?php echo $romans[$likehoodsecond];?></td>

                          <td rowspan="1" colspan="1"><?php echo $RPN_TWOLabel;?></td>

                         <td rowspan="1" colspan="1"> <?php

                             $getAllActtionOfficerSql = "SELECT * FROM `ramember` WHERE `id` in (SELECT ramemberId FROM `hazard_actionofficer` WHERE `hazardid` = ".$hzardsValue['hazard_id'].")";
                              $resultActtionOfficer = mysqli_query($con, $getAllActtionOfficerSql);


                              foreach($resultActtionOfficer as $valueAllActionOfficer)
                              {
                                echo "<div>".$valueAllActionOfficer["name"].",".$valueAllActionOfficer["designation"]."</div>";
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
                       </tr>
      <?php
                  }
                  else
                  {
                    $RPN_TWO=$hzardsValue['security'] * $hzardsValue['likehood'];
                    if($RPN_TWO>0 && $RPN_TWO<4){$RPN_TWOLabel = "A";}
                    if($RPN_TWO>3 && $RPN_TWO<13){$RPN_TWOLabel = "B";}
                    if($RPN_TWO>13 && $RPN_TWO<16){$RPN_TWOLabel = "C";}
                    if($RPN_TWO>15){$RPN_TWOLabel = "D";}
                      ?>
                          <tr>
                            <td rowspan="1" colspan="1"> <?php echo $hzardsValue['name'];?> </td>
                            <td rowspan="1" colspan="1"> <?php echo $hzardsValue['accident'];?> </td>
                            <td rowspan="1" colspan="1"> <?php echo $hzardsValue['risk_control'];?> </td>
                            <td rowspan="1" colspan="1"> <?php echo $romans[$hzardsValue['security']];?></td>
                            <td rowspan="1" colspan="1"> <?php echo $romans[$hzardsValue['likehood']];?> </td>
                            <td rowspan="1" colspan="1"><?php echo $RPN_TWOLabel;?>
                           </td>
                            <td rowspan="1" colspan="1" style="text-align: left;white-space:pre"> <?php echo wordwrap ($hzardsValue['risk_additional'], 30, "\n", 1);?> </td>
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


          <td rowspan="1" colspan="1"><?php echo $romans[$securitysecond];?></td>

             <td rowspan="1" colspan="1"><?php echo $romans[$likehoodsecond];?></td>

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
                        </tr>
                      <?php
                  }
                  $hazrdsControl++;
              }//hazards while contols


}//end of while  workactivity
       ?>
				</tbody>
      </table>
  </div>
  <br />
<div class="page">

<div  style="width:45%;float:left">
	<table class="table bordertable">
		<thead>
			<tr class="table-firstrow">
				<th colspan="4">TABLE 1 ACCIDENT FREQUENCY</th>
			</tr>
		</thead>
		<tbody>
		 	<tr>
			 	<th>Likelihood</th>
			 	<th>Rating</th>
			 	<th>&nbsp;</th>
			 	<th>Description</th>
		 	</tr>
		 	<tr>
			 	<td>Frequent</td>
			 	<td>I</td>
			 	<td>&nbsp;</td>
			 	<td>Likely to occur 12 times or more per year</td>
		 	</tr>
		 	<tr>
			 	<td>Probable</td>
			 	<td> II</td>
			 	<td>&nbsp;</td>
			 	<td>Likely to occur 4 times per year</td>
		 	</tr>
		 	<tr>
			 	<td>Occasional</td>
			 	<td>III</td>
			 	<td>&nbsp;</td>
			 	<td>Likely to occur once a year</td>
		 	</tr>
		 	<tr>
			 	<td>Remote</td>
			 	<td>IV</td>
			 	<td>&nbsp;</td>
			 	<td>Likely to occur once in 5 year</td>
		 	</tr>
		</tbody>
	</table>
</div>
<div  style="width:45%;float:right">
	<table class="table bordertable">
		<thead>
			<tr class="table-firstrow">
			<th colspan="7">Table 3 Risk Index Matrix</th>
			</tr>
			</thead>
		<tbody>
			 <tr>
				 <th rowspan="3" colspan="3">Risk Category</th>
				 <th colspan="7">Accident Severity Category</th>
			 </tr>
			 <tr>
				 <th>I</th>
				 <th>II</th>
				 <th>III</th>
				 <th>IV</th>
			 </tr>
			 <tr>
				 <th>Catastrophic</th>
				 <th>Critical</th>
				 <th>Marginal</th>
				 <th>Negligible</th>
			 </tr>
			 <tr>
				 <td>Accident</td>
				 <td>I</td>
				 <td>Frequent</td>
				 <td class="red">A</td>
				 <td class="red">A</td>
				 <td class="red">A</td>
				 <td class="orange">B</td>
			 </tr>
			 <tr>
				 <td>Frequency</td>
				 <td>II</td>
				 <td>Probable</td>
				 <td class="red">A</td>
				 <td class="red">A</td>
				 <td class="orange">B</td>
				 <td class="yellow">C</td>
			 </tr>
			 <tr>
				 <td>Category</td>
				 <td>III</td>
				 <td>Occasional</td>
				 <td class="red">A</td>
				 <td class="orange">B</td>
				 <td class="yellow">C</td>
				 <td class="yellow">C</td>
			 </tr>
			 <tr>
				 <td>&nbsp;</td>
				 <td>IV</td>
				 <td>Remote</td>
				 <td class="orange">B</td>
				 <td class="orange">B</td>
				 <td class="yellow">C</td>
				 <td class="fluro-green">D</td>
			 </tr>
		</tbody>
    </table><br><br>
</div>
<table class="table bordertable" width="100%">
<thead><tr class="table-firstrow"><th colspan="4">TABLE 2 ACCIDENT SEVERITY</th></tr></thead><tbody>
 <tr><th>No</th><th>Consequence</th><th>Rating</th><th>Description (*)</th></tr>
 <tr><td>1</td><td>CASTASTROPIC</td><td>I</td><td>-   Fatality, fatal diseases or multiple major injuries; or</td></tr>
 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>-   Loss of whole production for greater than 10 calendar days; or</td></tr>
 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>-   Total loss in excess of S$3 million.</td></tr>
 <tr><td>2</td><td>Critical</td><td>II</td><td>-   Serious injuries of life-threatening occupational disease (includes amputations, major fractures, multiple injuries, occupational cancer, acutue poisoning); or</td></tr>
 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>-   Damaged to works or plants causing delays greater than 3 but   up to 10 calendar days; or</td></tr>
 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>-  Total loss in excess of S$1 million but up to S$3 million.</td></tr>
 <tr><td>3</td><td>Marginal</td><td>III</td><td>-   Injury requiring medical treatment or ill-health leading to disability (including lacerations, burns, sprains, minor fractures, dermatitis, deafness, work-related upper limb disorders); or</td></tr>
 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>-   Damage to works or plants causing delays greater than 1 but up to 3 calendar days; or,</td></tr>
 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>-   Total loss in excess of S$0.3 million but up to S$1 million.</td></tr>
 <tr><td>4</td><td>Negligible</td><td>IV</td><td>-   Not likely to cause injury or ill-health, or requiring first-aid only (including minor cuts and bruises, irritation, ill-health with temporary discomfort); or</td></tr>
 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>-   Damage to works or plants causing delays up to 1 calendar day; or</td></tr>
 <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>-   Total loss of up to S$0.3 million.</td></tr>
</tbody></table>
<table class="table bordertable" width="100%">
<thead><tr class="table-firstrow"><th colspan="3">Table 4 Definition of Risk Index</th></tr></thead><tbody>
 <tr><th>Risk Index</th><th>Description</th><th>Definition</th></tr>
 <tr><td>A</td><td>Intolerable</td><td>This risk is unacceptable.  The risk shall be reduced at least to tolerable or undesirable category regardless of the costs of the risk mitigation.  Senior management attention needed with action plans and management responsibility specified.  Work must not start until risk has been reduced.  If risk cannot be reduced, the related activity or the project should not proceed.</td></tr>
 <tr><td>B</td><td>Undesirable</td><td>This risk is only acceptable if further risk reduction is not practicable.  The measures implemented shall be such as to reduce the risk as low as reasonably practical.  Management attention is required.  Risk mitigation measures shall be identified with management responsibility assigned.</td></tr>
 <tr><td>C</td><td>Tolerable</td><td>This risk is acceptable subject to demonstration that the level of risk is as low as reasonably practical.  The hazard shall be managed by routine procedures through the project.</td></tr>
 <tr><td>D</td><td>Acceptable</td><td>This risk is acceptable.</td></tr>
</tbody>
</table>
</div>
</body>


    </body>
    </html>
