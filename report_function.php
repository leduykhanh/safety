<?php
function work_activity_table(){

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



                            <td rowspan="1" colspan="1"> <?php echo "" ;?> </td>
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
                          </tr>
                        <?php
                    }
                    $hazrdsControl++;
                }//hazards while contols


  }//end of while  workactivity
}
?>
