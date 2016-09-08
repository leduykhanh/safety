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
</style>

<body>

	
	<!-- <div class="main-header" >
			<div class="left_side">
				<img src="images/LTA_logo.jpg" width="400" style="margin:20px;display:inline;float:left"/>
				
			</div>
		
	</div>
 -->



	<table class="table bordertable fullwidthtable " width="100%">
		<thead>
			<tr class="table-firstrow">
				<th colspan="6">RISK REGISTER</th>
			</tr>
		</thead>
		<tbody>
		<tr>
			<td>Project Name:</td>
			<td></td>
			<td>Min. Easting</td>
			<td>&nbsp;</td>
			<td>Min. Northing</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>Date Created</td>
			<td>27-04-2019	</td>
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
			<tbody><tr>
				<td>Project Title</td>
				<td>change
lightbulb</td>
				<td>STAGE:</td>
				<td></td>
				<td>PREPARED BY: rajesh</td>
				<td>REVISION:</td>
				<td>-</td>
				<td>DATE:</td>
				<td>CREATION DATE </td>
				<td>27-04-2019</td>
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
			
			




			<!-- <tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>b) Outrigger did not extend fully when lifting</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td colspan="3">2) Provide enough space for outrigger and lifting operations</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>2) Failure of lifting gears</td>
				<td>a) Failure to check validity and condition of lifting gears</td>
				<td>i. Injury/death to worker</td>
				<td>III</td>
				<td>II</td>
				<td>B</td>
				<td colspan="3">1. Only LM and LG's with 6month validity certificate to be used with validPTW</td>
				<td>IV</td>
				<td>II</td>
				<td>C</td>
				<td>Apply PTWfor lifting operation</td>
				<td></td>
				<td>Kumar</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>b) Damage lifting gears</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td colspan="3">3. Lifting supervisor to check all lifting gears daily beforethe lifting operation</td>
				<td></td>
				<td></td>
				<td></td>
				<td>Follow SWP of lifting operation</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>c) Lifting gears with missing safety latch</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td colspan="3">4.Check condition of Lifting gears before lifting</td>
				<td></td>
				<td></td>
				<td></td>
				<td>use magnifier to check the LG</td>
				<td></td>
				<td>Ripon</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td colspan="3">5. Lifting supervisor must know weight ofthe load before it is hoisted</td>
				<td></td>
				<td></td>
				<td></td>
				<td>lifting supervisor to check with site engineer if doubt on weight of the load</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td colspan="3">6. Craneoperator should not exceed the safe working load of the crane. FollowSWP</td>
				<td></td>
				<td></td>
				<td></td>
				<td>Follow vehicle entry/exit SWP procedure at site</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>  -->
		</tbody>
	</table>
	<br>
	<table class="table bordertable">
		<thead>
			<tr class="table-firstrow">
				<th colspan="5">TABLE 1: Accident Frequency</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>Likelihood	</th>
				<th>Rating</th>
				<th>Description</th>
				
			</tr>
			<tr>
				<th>Frequent</th>
				<td align="center">I</td>
				<td>Likely to occur 12 times or more per year</td>
				
			</tr>
			<tr>
				<th>Probable</th>
				<td align="center">II</td>
				<td>Likely to occur 4 times per year</td>
				
			</tr>
			<tr>
				<th>Occassional</th>
				<td align="center">III</td>
				<td>Likely to occur once a year</td>
				
			</tr>
			<tr>
				<th>Remote</th>
				<td align="center">IV</td>
				<td>Likely to occur once in a 5 year project period</td>
				
			</tr>
			<tr>
				<th>Improbable</th>
				<td align="center">V</td>
				<td>Unlikely, but may exceptionally occur</td>
				
			</tr>
		
		</tbody>
	</table>
	<br>

	<table class="table bordertable">
		<tbody><tr class="table-firstrow">
			<th colspan="5">TABLE 2: Accident Severity</th>
		</tr>
		<tr>
			<th>No.</th>
			<th>Consequence</th>
			<th>Rating</th>
			<th>Description</th>
		</tr>
		<tr>
			<td>1</td>
			<td>Catastrophic</td>
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
			<td>Critical</td>
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
			<td>Marginal</td>
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
			<td>Negligible</td>
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

	
	<br>

	<table class="table bordertable" align="center">
		<thead>
			<tr class="table-firstrow">
				<th colspan="6">TABLE 3: Risk Index Matrix</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th rowspan="3" colspan="2">Accident Frequency Category</th>
				<th colspan="4">Accident Severity Category</th>
			</tr>
			<tr>
				<th align="center">I</th>
				<th align="center">II</th>
				<th align="center">III</th>
				<th align="center">IV</th>
			</tr>
			<tr>
				<th align="center">Catastrophic</th>
				<th align="center">Critical</th>
				<th align="center">Marginal</th>
				<th align="center">Negligible</th>
			</tr>
			<tr>
				<td align="center">I</td>
				<td align="center">Frequent</td>
				<td align="center">A</td>
				<td align="center">A</td>
				<td align="center">A</td>
				<td align="center">B</td>	
			</tr>
			<tr>
				<td align="center">II</td>
				<td align="center">Probable</td>
				<td align="center">A</td>
				<td align="center">A</td>
				<td align="center">B</td>
				<td align="center">C</td>	
			</tr>
			<tr>
				<td align="center">III</td>
				<td align="center">Occasional</td>
				<td align="center">A</td>
				<td align="center">B</td>
				<td align="center">C</td>
				<td align="center">C</td>
			</tr>
			<tr>
				<td align="center">IV</td>
				<td align="center">Remote</td>
				<td align="center">B</td>
				<td align="center">C</td>
				<td align="center">C</td>
				<td align="center">D</td>
			</tr>
			<tr>
				<td align="center">V</td>
				<td align="center">Improbable</td>
				<td align="center">C</td>
				<td align="center">C</td>
				<td align="center">D</td>
				<td align="center">D</td>
			</tr>
		</tbody>
	</table>


	
	<br>
	<table class="table bordertable">
		<tbody><tr class="table-firstrow">
			<th colspan="3">TABLE 4: Definition of Risk Index</th>
		</tr>
		<tr>
			<th>Risk Index</th>
			<th>Description</th>
			<th>Definition</th>
		</tr>
		<tr>
			<td align="center">A</td>
			<td align="center">Intolerable</td>
			<td align="center">Risk shall be reduced by whatever means possible.</td>
		</tr>
		<tr>
			<td align="center">B</td>
			<td align="center">Undesirable</td>
			<td align="center">Risk shall only be accepted if further risk reduction is not practicable.</td>
		</tr>
		<tr>
			<td align="center">C</td>
			<td align="center">Tolerable</td>
			<td align="center">Risk shall be accepted subject to demonstration that the level of risk is as low as reasonably practicable.</td>
		</tr>
		<tr>
			<td align="center">D</td>
			<td align="center">Acceptable</td>
			<td align="center">Risk is acceptable.</td>
		</tr>
	</tbody></table>
<br>
<br>
	<p>Note: (*) If more than one of the descriptions occurs, the severity rating would be increased to the next higher level. Applicable to item numbers 2 and 3 only.</p>


</body>
    </html>
    