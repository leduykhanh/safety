<?php
include_once 'config.php';
session_start();

if(!$_SESSION['adminid'])
{
    ?><script type="text/javascript">window.location.assign("index.php")</script>
    <?php
}
define('NON_ACTIVE', 0);
  $i = 0;
  $k = 1; // this is for keep track of j and loop from next level
  $l = 1; //for action officer
  $asTemplate = $_POST["template"];
  $revisionDate = null;
  $creationDates = new DateTime($_POST['creationDate']);
  $creationDate = date_format($creationDates, 'Y-m-d H:i:s'); // 2011-03-03 00:00:00
  if (isset($_POST["revisionDate"]))
      $revisionDate = date_format(new DateTime($_POST['revisionDate']), 'Y-m-d H:i:s');

  $today = date('Y-m-d H:i:s');

  if($_POST['saveAsDraft'] == 'Save as Draft')
  {
    $status = 1;
    $headers = "From: webmaster@mrphpguru.com\r\nReply-To: webmaster@mrphpguru.com";
      //add boundary string and mime type specification
    $headers .= "\r\nContent-Type: multipart/alternative; boundary=\"PHP-alt-".$random_hash."\"";
    $message = "http://qesafety.com/autora/thi";
     @mail( "leejangkoo@gmail.com", "AutoRA draft", $message, $headers );
  }
  else if($_POST['saveAsDraft'] == 'Next')
  {
      $status = $revisionDate?2:0;
  }
  else
  {
    $status = 0;
  }

 if(isset($_GET['riskid']) && $_GET['riskid'] != '')
  {
      // $k = 0;
      // $l = 0;
      $set_clause = "";
      if($revisionDate){
        $set_clause = $set_clause."`revisionDate` =  '".$revisionDate."' ,`approveDate` =  '".$revisionDate."' ,";
      }
      $riskassessment = "UPDATE  `riskassessment` SET  " .$set_clause. "`createdDate` =  '".$creationDate."' ,`location` =  '".$_POST['location']."',`process` =  '".$_POST['process']."',`status` = ".$status.", `revisionNumber` = '" .$_POST["revisionNumber"]. "', `project_title` = '". $_POST["project_title"] ."' WHERE `id` =".$_GET['riskid']."";
      $update_riskassessment=mysqli_query($con, $riskassessment);

      //delete all the RA members

      mysqli_query($con, "DELETE FROM `risk_ramemeber` WHERE `riskid` = ".$_GET['riskid']."");

      //insert new one

      //insert all the ra members
      foreach ($_POST['RA_Member'] as $RA_Member)
       {
         $raMemberSql = "INSERT INTO `risk_ramemeber` (`id`, `riskid`, `ramemberId`) VALUES (NULL, '".$_GET['riskid']."', '".$RA_Member."')";
         mysqli_query($con, $raMemberSql);
         // echo $raMemberSql;
       }

      //delete all the work activity and hazards
      $getAllWorkSql = "SELECT * FROM `workactivity` WHERE `riskId` = ".$_GET['riskid']."";
      $resultAllWork=mysqli_query($con, $getAllWorkSql);


      while($valueAllWork = mysqli_fetch_assoc($resultAllWork))
      {
        mysqli_query($con, "DELETE FROM `hazard_cause` WHERE harzardId in (select hazard_id FROM `hazard` WHERE `work_id` = ".$valueAllWork['work_id'].")");
        mysqli_query($con, "DELETE FROM `hazard` WHERE `work_id` = ".$valueAllWork['work_id']."");
      }
      mysqli_query($con, "DELETE FROM `workactivity` WHERE `riskId` = ".$_GET['riskid']."");

      $riskassessmentId = $_GET['riskid'];
 }
 else
  {

     $riskassessment = "INSERT INTO `riskassessment` (`id`, `createdBy`, `location`, `process`, `createdDate`, `approveDate`, `revisionDate`, `approveBy`, `status`,`approverEmail`,`asTemplate`,`project_title`,`expiry_date`)
     VALUES (NULL, '".$_SESSION['adminid']."', '".$_POST['location']."', '".$_POST['process']."', '".$creationDate."', NULL,'".$creationDate."', NULL, '".$status."','',".$_POST['template'].",'".$_POST['project_title']."',".$_POST["expiry_date"].");";
		 // echo $riskassessment;
      $insert_riskassessment=mysqli_query($con, $riskassessment);
      $riskassessmentId = mysqli_insert_id($con);
      // echo $riskassessmentId;

      //insert all the ra members
       foreach ($_POST['RA_Member'] as $RA_Member)
        {
          $raMemberSql = "INSERT INTO `risk_ramemeber` (`id`, `riskid`, `ramemberId`) VALUES (NULL, '".$riskassessmentId."', '".$RA_Member."')";
          mysqli_query($con, $raMemberSql);
          // echo $raMemberSql;
        }
  }





  foreach ($_POST['work_activity'] as $workactivities)
  {
    if($i > 0)
    {

      $sqlWorkActivity = "INSERT INTO `workactivity` (`work_id`, `riskId`, `name`, `created_by`, `created_on`, `status`) VALUES (NULL, '".$riskassessmentId."', '".$workactivities."', '".$_SESSION['name']."', '".$today."', '0');";
        $insertWorkActivity=mysqli_query($con, $sqlWorkActivity);
        $workActivityId = mysqli_insert_id($con);
        //now we have to chk how many hazards we have
        if($_POST['hazardsCount'][$i] > 0)
        {
            // var_dump($_POST['severity1']);
            $security = $_POST["severity".$asTemplate];
            $likehood = $_POST["likelihood".$asTemplate];
            $securitySecond = $_POST['severity'.$asTemplate.'Second'];
            $likehoodSecond = $_POST['likelihood'.$asTemplate.'Second'];

            // var_dump( $securitySecond);
            //we have to loop for hazarads
            for($j=1; $j <= $_POST['hazardsCount'][$i]; $j++)
            {
              // echo $k;
              // var_dump( $securitySecond[$k]);
              // $actionDate = $_POST['actionMonth'][$k].'/'.$_POST['actionDate'][$k].'/'.$_POST['actionYear'][$k];
              $actionDate = $_POST['actionDate'][$k];

              // $actonDateToInsert = new DateTime($actionDate);
              $actonDateToInsert = $actionDate;
              // $actonDateNow = date_format($actonDateToInsert, 'Y-m-d H:i:s'); // 2011-03-03 00:00:00
              $actonDateNow = $actonDateToInsert;

            $sqlHazards = "INSERT INTO `hazard` (`hazard_id`, `work_id`, `name`, `security`, `securitysecond`, `accident`, `likehood`, `likehoodsecond`, `risk_control`, `risk_label`, `risk_additional`, `action_officer`, `action_date`, `status`)
            VALUES (NULL, '".$workActivityId."', '".$_POST['Hazard'][$k]."', '".$security[$k]."', '".$securitySecond[$k]."', '".$_POST['InjuryAccident'][$k]."', '".$likehood[$k]."', '".$likehoodSecond[$k]."', '".$_POST['ExistingRiskControl'][$k]."', 0, '".$_POST['additionalRiskContro'][$k]."', '', '".$actonDateNow."', '0');";
              



             $insertHazards=mysqli_query($con, $sqlHazards);
             $insertHazardsId = mysqli_insert_id($con);
             if(isset($_POST["hazardCauses"]))
             {
               $hazardCauses = $_POST["hazardCauses"];
               $sqlHazardCauses = "INSERT INTO `hazard_cause`(`hazardid`,`cause`) VALUES($insertHazardsId,'$hazardCauses[$k]')";
            //  echo $sqlHazardCauses;
              mysqli_query($con, $sqlHazardCauses);
            }

             //insert hazards action officer of this hazards
             $numOfActionOfficer = $_POST['hazardsActionOfficerCount'][$k];

                 for($numOfAction = 1; $numOfAction <= $numOfActionOfficer; $numOfAction++)
                  {
                    // var_dump($_POST['actionOfficer'][$l]);

                   $sqlHazardsActionOfficer = "INSERT INTO `hazard_actionofficer` (`id`, `hazardid`, `ramemberId`) VALUES (NULL, '".$insertHazardsId."', '".$_POST['actionOfficer'][$l]."')";
                   mysqli_query($con, $sqlHazardsActionOfficer);

                   $l++;

                  }


                $k++;

            } //main for of hazards
        }
        $i++;

    }
    else
    {
      $i++;
    }



  }
if(isset($insertHazardsId))
{


  if($_POST['saveAsDraft'] == 'Next')
  {
    echo "<script>window.open('riskapproval.php?riskId=".$riskassessmentId."','_self')</script>";
  }
  else
  {
    echo "<script>window.open('listwork_activity.php?message=data','_self')</script>";
  }
}
else
{
  echo "<script>window.open('listwork_activity.php?unsuccess=data','_self')</script>";
}



?>


      <?php include_once 'footer.php';?>
