<?php
session_start();
 include_once 'header.php';
 include_once 'config.php';
?>
<style type="text/css">
  .topdtb
  {
    display: none;
  }

  .container {
    width: 1170px;
    
}

</style>
<?php 

 if(isset($_SESSION['adminid'])=="")
 {
 
 ?><script type="text/javascript">window.location.assign('index.php');</script>
 <?php

 }

 if(isset($_GET['riskid']) && isset($_GET['updateStatus']) && isset($_GET['updateStatusSubmit']))
 {
     
$today = date('Y-m-d H:i:s');

$afterSevenYears = date('Y-m-d H:i:s', strtotime('+3 years'));



      $updateSql = "UPDATE  `riskassessment` SET  `status` =  '$_GET[updateStatus]',`approveDate` =  '$today',`revisionDate` =  '$afterSevenYears',`approveBy` =  '$_SESSION[adminid]',`approverEmail` =  '".$_SESSION['useremail']."' WHERE  `id` =$_GET[riskid]";
   



       if(mysqli_query($con, $updateSql))
       {
        $messageUpdate = 'Data Updated Successfuly ';
        ?>
        <script type="text/javascript">window.location.assign('listwork_activity.php?message=<?php echo $messageUpdate;?>');</script>
        <?php

      }
      

 }
 else
 {
   $messageUpdate = '';
 }
?>
  
              <?php
                //get count 
              //0 outstanding 1 for draft 2 approved 3 archive
                    $sqlOutStanding = "SELECT * FROM riskassessment where status = 0";
                    $resultlOutStanding = mysqli_query($con, $sqlOutStanding);
                    $outStandingRow= mysqli_num_rows($resultlOutStanding);
                    
                    $sqlDraft = "SELECT * FROM riskassessment where status = 1";
                    $resultlDraft = mysqli_query($con, $sqlDraft);
                    $draftRow= mysqli_num_rows($resultlDraft);

                    $sqlApprove = "SELECT * FROM riskassessment where status = 2";
                    $resultlApprove = mysqli_query($con, $sqlApprove);
                    $OutApprove= mysqli_num_rows($resultlApprove);


                    $sqlArchived = "SELECT * FROM riskassessment where status = 3";
                    $resultlArchived = mysqli_query($con, $sqlArchived);
                    $OutArchived= mysqli_num_rows($resultlArchived);

              ?>
   <div class="container">
   
	   <div class="row" style="padding-bottom: 10px;">
				<div class="col-sm-6" style="text-align:left; padding:0px"><strong>Risk Register Summary</strong></div>
				<div class="col-sm-6 pull-right" style="text-align:right; padding:0px">	
					<a href="divAddRemoveSubmit.php">
				  <button class="btn btn-success">
					<strong>+ Add New Risk Assessment</strong>
				  </button>
				</a>
				</div>
		</div>
	   
	   
	   <div class="claer-fix"></div>
	   <ul class="nav nav-tabs">
		  <li class="active"><a data-toggle="tab" href="#po">Penta Ocean</a></li>
		  <li><a data-toggle="tab" href="#thiec">THI E&C</a></li>
		  <li><a data-toggle="tab" href="#skec">SK E&C</a></li>
		  <li><a data-toggle="tab" href="#lta">LTA</a></li>
		</ul>

		<div class="tab-content">
		  <div id="po" class="tab-pane fade in active">
			<?php  require_once("listwork_function.php");
				generate_list_work($con,1);
				?>
		  </div>
		  <div id="thiec" class="tab-pane fade">
			<?php  require_once("listwork_function.php");
				generate_list_work($con,2);
				?>
		  </div>
		  <div id="skec" class="tab-pane fade">
			<?php  require_once("listwork_function.php");
				generate_list_work($con,3);
				?>
		  </div>
		  <div id="lta" class="tab-pane fade">
			<?php  require_once("listwork_function.php");
				generate_list_work($con,4);
				?>
		  </div>
		</div> 
    </div>

 

 
<script>
language="JavaScript" type="text/javascript">
 function $row['id']
 {
 if (confirm("Are you sure you want to copy data"))
 {
 window.location.href = 'copydata.php?riskid=<?php echo $row['id'];?>';
 }
 }
</script>


<script
 language="JavaScript" type="text/javascript">
 function delete_id(id)
 {
 if (confirm("Are you sure you want to delete"))
 {
 window.location.href = 'delete.php?id=' + id;
 }
 }
</script>

<?php include_once 'footer.php'; ?>