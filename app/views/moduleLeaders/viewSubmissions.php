<ul class="breadcrumb">
  <li><a href="/GroupProject/public/ModuleLeaderHome">
    <img src = "/GroupProject/public/resources/images/house.png">&nbsp; Dashboard</a>
  </li>
  <li>Submissions</li>
</ul>

<?php if($var!="") {?>
  <div class = "adminManageTable">
    <?php
    if($var=="addsuccess"){
      echo '<b>Successfully Marked Student Submission</b>';
    }
    else if($var == 'editsuccess'){
      echo '<b>Successfully Edited Student Submission</b>';
    }
    else{
      echo '<b>Error</b>';
    }
?>

  </div>
<?php }?>


<?php
$count = 0;

if($modules->rowCount() > 0){
  while($module = $modules->fetch()){
    $terms = getTermsByModuleId($module['mid']);

    while($term = $terms->fetch()){
      ++$count;
      ?>

      <button class="collapsible  <?php if($count==1) echo 'active'?>" style="background: DarkCyan;">
        <b><?php echo $module['mname'].' - '.$term['tname'];?></b>
      </button>

      <!-- Buttons for displaying announcement description -->
      <div class="collapsedcontent" style="margin-bottom: 10px; <?php if($count==1) echo 'max-height: none;'?>">
        <!-- Content inside the collapsible -->
        <div style="margin: 10px; min-height: 90px;">
          <h2 style="text-align: center; margin-top: 20px;">Student Submissions for <?php echo $module['mname'].' - '.$term['tname'];?></h2>
          <br>
          <!-- Resource Contents go here -->
          <p style="text-align: center;">

            <?php
            $assignments = getAssignmentsByTermId($term['tid']);
            if($assignments->rowCount()>0){
              $assignment = $assignments->fetch();

              $submissions = getSubmissionsByAssignmentId($assignment['aid']);
              while($submission = $submissions->fetch()){
                $student = getUserById($submission['asuid'])->fetch();
                echo '<hr><br>';
              ?>

              <br>
              <div class = "resourceHolder">

                <div class = "formHolder">
                  <div class = "formColumn1">
                    <p>
                      <b>Student ID: </b><?php echo $submission['asaid'];?><br>
                      <b>Student Name: </b><?php echo $student['fname'].' '.$student['mname'].' '.$student['lname'];?><br>
                      <b>Submission Date: </b><?php echo $submission['submission_date'];?><br>
                      <b>Submission Comments: </b><?php echo $submission['comments'];?><br>
                    </p>
                    <br><br>
                    <p>
                      <?php if($grade=checkSubmissionGrade($submission['submission_id'])){?>
                        <b>Grade: </b><?php echo $grade['grade'];?><br>
                        <b>Feedback: </b><?php echo $grade['grade'];?><br>

                        <?php $visibleText = '<font style = "color: green">Published</font>';?>
                        <?php $invisibleText = '<font style = "color: red">Not Published</font>';?>
                        <b>Status:</b><?php echo $grade['status']=="Y"? $visibleText:$invisibleText;?><br>
                      <?php }
                      else { ?>
                        <b>Assign Grade</b>

                      <?php } ?>
                    </p>

                    <br><br>
                  </div>
                  <div class = "formColumnSeparator" style="background: white; border-right: 0px dashed grey;"></div>
                  <div class = "formColumn2">
                    <div style=" text-align: center;">
                      <a target = "_blank" href = "/GroupProject/public/<?php echo $submission['asfiles'];?>" style="color: white;">
                        <img class = "downloadImage" src = "/GroupProject/public/resources/images/download.png">
                      </a>
                    </div>
                  </div>
                </div>
            <br><hr>
          </div>


<?php
      }
    }
?>
      </p>    
    </div>
  </div>

<?php

  }
?>

  <?php
    }
  }

else{
  ?>

  <div class = "adminManageTable" style="">
    <h2 style="color: red; text-align: center;">No Module Has Been Assigned To You Yet</h2>
  </div>

  <?php
}
?>


<!-- Script for loading collapsible function -->
<script>
  toggleCollapse();
</script>
