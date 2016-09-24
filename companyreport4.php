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
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      </head>
      <style type="text/css">

	  .printbreak {
       page-break-before: always;
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
         $sqlRAMember = "SELECT * FROM  `ramember` WHERE  `id` in (SELECT ramemberId as id from risk_ramemeber WHERE `riskId` = $_GET[riskid])";
         $resultlRAMember = mysqli_query($con, $sqlRAMember);

          $valueAllUser = mysqli_fetch_assoc($resultAlluser);
          $romans = array("1"=>"I","2"=>"II","3"=>"III","4"=>"IV","5"=>"V","-"=>"-",""=>"");

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



	<table class="table bordertable fullwidthtable " width="100%">
		<thead>
			<tr class="table-firstrow">
				<th colspan="6">RISK REGISTER</th>
			</tr>
		</thead>
		<tbody>
		<tr>
			<td>Project Name:</td>
			<td><?php echo $risk["project_title"];?></td>
			<td>Min. Easting</td>
			<td>&nbsp;</td>
			<td>Min. Northing</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Date Created</td>
			<td><?php echo date('d-m-Y', strtotime($risk['createdDate']));?>	</td>
			<td>Max. Easting</td>
			<td>&nbsp;</td>
			<td>Max. Northing</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Stage Contract</td>
			<td></td>
			<td>Site Contract</td>
			<td></td>
			<td>Package</td>
			<td></td>
		</tr>
		</tbody>
	</table>


<br>
<br>

		<table class="table bordertable " width="100%">
			<tbody>
        <tr>
  				<td>Project Title</td>
  				<td colspan="6"><strong style="text-transform: uppercase;"><?php echo $risk["project_title"];?></strong></td>
  				<td>STAGE:</td>
  				<td></td>
  				<td>PREPARED BY:<br /> <?php echo $valueAllUser['name'];?>(RA Leader) <br />
            <?php foreach($resultlRAMember as $ra){
              echo $ra["name"]."(RA Member)</br>";
            }?>
          </td>
  				<td>REVISION:</td>
  				<td>-</td>
  				<td>DATE:</td>
  				<td>CREATION DATE </td>
  				<td><?php echo date('d-m-Y', strtotime($risk['createdDate']));?></td>
			</tr>
		</tbody></table>
<br>
<br>

		<table class="table bordertable template5table breakabaletable" width="100%">
			<tbody><tr bgcolor="#FDE9D9">
				<th colspan="3">1</th>


				<th>2</th>
				<th>3</th>
				<th>4</th>
				<th>5</th>
				<th>6</th>
				<th colspan="3">7</th>
				<th colspan="3">8</th>
				<th colspan="3">9</th>

				<th>10</th>
				<th>11</th>
				<th>12</th>
				<th>13</th>
				<th>14</th>
				<th>15</th>
				<th>16</th>
				<th>17</th>

			</tr>
			<tr bgcolor="#E4DFEC">
				<th colspan="3">Risk ID</th>
				<th rowspan="2">Previous Hazard No</th>
				<th rowspan="2">Work Activity</th>
				<th rowspan="2">*Hazard (max. 2000 characters)</th>
				<th rowspan="2">*Hazard Cause (max. 2000 characters)</th>
				<th rowspan="2">*Impact (max. 2000 characters)</th>
				<th colspan="3">*Initial Risk Category</th>
				<th colspan="3" rowspan="2">Mitigation Measures (max. 4000 characters)</th>
				<th colspan="3">*Residual Risk Category</th>
				<th rowspan="2">Future Action (max. 4000 characters)</th>
				<th rowspan="2">Risk Owner</th>
				<th rowspan="2" width="300">Action Owner</th>
				<th rowspan="2">*Due Date by (dd/mm/yyyy)</th>
				<th rowspan="2">Risk Exposure Period</th>
				<th rowspan="2">Target Risk Rating</th>
				<th rowspan="2">Status</th>
				<th rowspan="2">Remarks</th>
			</tr>
			<tr bgcolor="#E4DFEC">
				<th>Hazard No</th>
				<th>Haz Code</th>
				<th>Run No</th>
				<th>Frequency</th>
				<th>Severity</th>
				<th>Risk</th>

				<th>Frequency</th>
				<th>Severity</th>
				<th>Risk</th>

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
            $sqlHazardCauseSQL = "SELECT * from `hazard_cause` WHERE hazardId=".$hzardsValue["hazard_id"];
            $resultAllHazardCauses=mysqli_query($con, $sqlHazardCauseSQL);
            $numHazardCauses = mysqli_num_rows($resultAllHazardCauses);

            if(true)
            {


          ?>



        <tr>
            <td rowspan="1" colspan="1"> <?php //echo $hzardsValue["hazard_id"];  ?></td>
            <td rowspan="1" colspan="1">  </td>
            <td rowspan="1" colspan="1"> <?php //echo $m;?></td>
            <td rowspan="1" colspan="1"> <?php //echo $hzardsValue["hazard_id"] - 1;  ?></td>
            <?php if($hazrdsControl == 1){ ?>
              <td rowspan="<?php echo $totalHazards; ?>" colspan="1"> <?php echo $valueAllWork['name'];?> </td>
              <?php } ?>
            <td rowspan="1" colspan="1"> <?php echo $hzardsValue['name'];?> </td>
            <td rowspan="1" colspan="1">  <?php foreach($resultAllHazardCauses as $cause) echo $cause["cause"]; ?></td>
            <td rowspan="1" colspan="1">  <?php echo $hzardsValue['accident'];?> </td>
            <td rowspan="1" colspan="1"> <?php echo $romans[$hzardsValue['likehood']];?> </td>
            <td rowspan="1" colspan="1"> <?php echo $romans[$hzardsValue['security']];?></td>


              <?php
            $RPNLabel = "-";$RPN_TWOLabel = "-";
            if($hzardsValue['likehood']=="-"|| $hzardsValue['security']=="-")
            {
              $RPNLabel="-";
            }
            else
            {
              $RPNLabel=getRiskLabel($hzardsValue['security'] , $hzardsValue['likehood']);
            }
            ?>

           <td rowspan="1" colspan="1"><?php echo $RPNLabel;?></td>
             <td rowspan="1" colspan="3" style="text-align: justify;">  <?php echo wordwrap ($hzardsValue['risk_control'], 15, "\n", 1);?></td>


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
              $RPN_TWOLabel=getRiskLabel($hzardsValue['securitysecond'] , $hzardsValue['likehoodsecond']);
            }
            ?>

               <td rowspan="1" colspan="1"><?php echo $romans[$securitysecond];?></td>

               <td rowspan="1" colspan="1"><?php echo $romans[$likehoodsecond];?></td>

              <td rowspan="1" colspan="1"><?php echo $RPN_TWOLabel;?></td>
              <td rowspan="1" colspan="1"></td>
              <td rowspan="1" colspan="1">
                <?php

                     $getAllActtionOfficerSql = "SELECT * FROM `ramember` WHERE `id` in (SELECT ramemberId FROM `hazard_actionofficer` WHERE `hazardid` = ".$hzardsValue['hazard_id'].")";
                          $resultActtionOfficer = mysqli_query($con, $getAllActtionOfficerSql);


                          foreach($resultActtionOfficer as $valueAllActionOfficer)
                          {
                            echo "<div>$valueAllActionOfficer[name]</div>";
                          }



                  ?>
              </td>
              <td rowspan="1" colspan="1"></td>
             <td rowspan="1" colspan="1"></td>

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
            <td rowspan="1" colspan="1"> - </td>
            <td rowspan="1" colspan="1"> - </td>
            <td rowspan="1" colspan="1"> <?php echo $risk["status"]; ?> </td>
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
                                <td rowspan="1" colspan="1"> <?php echo $romans[$hzardsValue['security']];?></td>
                                <td rowspan="1" colspan="1"> <?php echo $romans[$hzardsValue['likehood']];?> </td>
                                <td rowspan="1" colspan="1"><?php echo getRiskLabel($hzardsValue['security'] , $hzardsValue['likehood']);?>
                               </td>
                                <td rowspan="1" colspan="1"> <?php echo $hzardsValue['risk_additional'];?> </td>
                                  <?php
              $RPN_TWOLabel = "-";
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
              $RPN_TWOLabel=getRiskLabel($hzardsValue['securitysecond'] , $hzardsValue['likehoodsecond']);
            }
            ?>


                            <td rowspan="1" colspan="1"><?php echo $romans[$securitysecond];?></td>

                               <td rowspan="1" colspan="1"><?php echo $romans[$likehoodsecond];?></td>

                                <td rowspan="1" colspan="1"><?php echo $RPN_TWOLabel;?>
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
		</tbody>
	</table>
	<br>
  <div class="row">
    <div class="col-sm-6">
      <table class="table bordertable">
        <thead>
          <tr class="table-firstrow">
            <th colspan="5">TABLE 1: Accident Frequency</th>
          </tr>
        </thead>
        <tbody>
          <tr bgcolor="#FDE9D9">
            <th>Likelihood	</th>
            <th>Rating</th>
            <th>Description</th>

          </tr>
          <tr>
            <th bgcolor="#daeef3" >Frequent</th>
            <td align="center">I</td>
            <td>Likely to occur 12 times or more per year</td>

          </tr>
          <tr>
            <th bgcolor="#daeef3" >Probable</th>
            <td align="center">II</td>
            <td>Likely to occur 4 times per year</td>

          </tr>
          <tr>
            <th bgcolor="#daeef3" >Occassional</th>
            <td align="center">III</td>
            <td>Likely to occur once a year</td>

          </tr>
          <tr>
            <th bgcolor="#daeef3" >Remote</th>
            <td align="center">IV</td>
            <td>Likely to occur once in a 5 year project period</td>

          </tr>
          <tr>
            <th bgcolor="#daeef3" >Improbable</th>
            <td align="center">V</td>
            <td>Unlikely, but may exceptionally occur</td>

          </tr>

        </tbody>
      </table>
      <br>
    </div>
    <div class="col-sm-6">
      <table class="table bordertable" align="center">
        <thead>
          <tr class="table-firstrow">
            <th colspan="6">TABLE 3: Risk Index Matrix</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th rowspan="3" colspan="2">Accident Frequency Category</th>
            <th bgcolor="#FDE9D9" colspan="4">Accident Severity Category</th>
          </tr>
          <tr>
            <th align="center">I</th>
            <th align="center">II</th>
            <th align="center">III</th>
            <th align="center">IV</th>
          </tr>
          <tr>
            <th bgcolor="#E4DFEC" align="center">Catastrophic</th>
            <th bgcolor="#E4DFEC" align="center">Critical</th>
            <th bgcolor="#E4DFEC" align="center">Marginal</th>
            <th bgcolor="#E4DFEC" align="center">Negligible</th>
          </tr>
          <tr>
            <td align="center">I</td>
            <td bgcolor="#daeef3" align="center">Frequent</td>
            <td bgcolor="#eaf1dd" align="center">A</td>
            <td bgcolor="#eaf1dd" align="center">A</td>
            <td bgcolor="#eaf1dd" align="center">A</td>
            <td bgcolor="#eaf1dd" align="center">B</td>
          </tr>
          <tr>
            <td align="center">II</td>
            <td bgcolor="#daeef3" align="center">Probable</td>
            <td bgcolor="#eaf1dd" align="center">A</td>
            <td bgcolor="#eaf1dd" align="center">A</td>
            <td bgcolor="#eaf1dd" align="center">B</td>
            <td bgcolor="#eaf1dd" align="center">C</td>
          </tr>
          <tr>
            <td align="center">III</td>
            <td bgcolor="#daeef3" align="center">Occasional</td>
            <td bgcolor="#eaf1dd" align="center">A</td>
            <td bgcolor="#eaf1dd" align="center">B</td>
            <td bgcolor="#eaf1dd" align="center">C</td>
            <td bgcolor="#eaf1dd" align="center">C</td>
          </tr>
          <tr>
            <td align="center">IV</td>
            <td bgcolor="#daeef3" align="center">Remote</td>
            <td bgcolor="#eaf1dd" align="center">B</td>
            <td bgcolor="#eaf1dd" align="center">C</td>
            <td bgcolor="#eaf1dd" align="center">C</td>
            <td bgcolor="#eaf1dd" align="center">D</td>
          </tr>
          <tr>
            <td align="center">V</td>
            <td bgcolor="#daeef3" align="center">Improbable</td>
            <td bgcolor="#eaf1dd" align="center">C</td>
            <td bgcolor="#eaf1dd" align="center">C</td>
            <td bgcolor="#eaf1dd" align="center">D</td>
            <td bgcolor="#eaf1dd" align="center">D</td>
          </tr>
        </tbody>
      </table>
      <br>

    </div>
  <div>
  <div class="row">
    <div class="col-sm-6">
      <table class="table bordertable">
        <tbody><tr class="table-firstrow">
          <th colspan="5">TABLE 2: Accident Severity</th>
        </tr>
        <tr bgcolor="#FDE9D9">
          <th>No.</th>
          <th>Consequence</th>
          <th>Rating</th>
          <th>Description</th>
        </tr>
        <tr>
          <td>1</td>
          <td bgcolor="#E4DFEC">Catastrophic</td>
          <td>I</td>
          <td>
            <ul>
                  <li>Single or Multiple loss of life from injury or occupational disease, immediately or delayed and/or</li>
                  <li>Loss of whole production for greater than 3 man-days and/or</li>
                  <li>Total loss in excess of $1 million.</li>
            </ul>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td bgcolor="#E4DFEC">Critical</td>
          <td>II</td>
          <td>
            <ul>
              <li>Reportable major injury<sup>1</sup>, occupational disease or dangerous occurrence; and/or</li>
              <li>Damaged to works or plants causing delays of up to  3 man-days     and/or</li>
              <li>Total loss in excess of $250,000 but up to $1 million.</li>
            </ul>
          </td>
        </tr>
        <tr>
          <td>3</td>
          <td bgcolor="#E4DFEC">Marginal</td>
          <td>III</td>
          <td>
            <ul>
              <li>Reportable injury<sup>2</sup>,  occupational disease and/or</li>
              <li>Damaged to works or plants causing delays of up to  1 man-days and/or</li>
              <li> Total loss in excess of $25,000 but up to $250,000.</li>
            </ul>
          </td>
        </tr>
        <tr>
          <td>4</td>
          <td bgcolor="#E4DFEC">Negligible</td>
          <td>IV</td>
          <td>
            <ul>
              <li>Minor injury<sup>3</sup>, no lost time or person involved returns to work during the shift after treatment; and/or</li>
              <li>Damaged to works or plants that does not cause significant delays;   and/or</li>
              <li>Total loss of up to $25,000.</li>
            </ul>
          </td>
        </tr>
      </tbody></table>
    </div>
    <div class="col-sm-6">
      <table class="table bordertable">
        <tbody><tr class="table-firstrow">
          <th colspan="3">TABLE 4: Definition of Risk Index</th>
        </tr>
        <tr bgcolor="#FDE9D9">
          <th>Risk Index</th>
          <th>Description</th>
          <th>Definition</th>
        </tr>
        <tr>
          <td bgcolor="#eaf1dd" align="center">A</td>
          <td align="center">Intolerable</td>
          <td align="center">Risk shall be reduced by whatever means possible.</td>
        </tr>
        <tr>
          <td bgcolor="#eaf1dd" align="center">B</td>
          <td align="center">Undesirable</td>
          <td align="center">Risk shall only be accepted if further risk reduction is not practicable.</td>
        </tr>
        <tr>
          <td bgcolor="#eaf1dd" align="center">C</td>
          <td align="center">Tolerable</td>
          <td align="center">Risk shall be accepted subject to demonstration that the level of risk is as low as reasonably practicable.</td>
        </tr>
        <tr>
          <td bgcolor="#eaf1dd" align="center">D</td>
          <td align="center">Acceptable</td>
          <td align="center">Risk is acceptable.</td>
        </tr>
      </tbody></table>
    <br>
    </div>
  <div>





	<br>


<br>
	<p>Note: (*) If more than one of the descriptions occurs, the severity rating would be increased to the next higher level. Applicable to item numbers 2 and 3 only.</p>


</body>
    </html>
