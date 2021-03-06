
<ul class="breadcrumb">
  <li><a href="/GroupProject/public/ModuleLeaderHome">
    <img src = "/GroupProject/public/resources/images/house.png">&nbsp; Dashboard</a>
  </li>
  <li><a href="../">Modules</a></li>
  <li><?php echo $module['mname'].' - '.$term['tname'];?></li>
</ul>

<?php if($var!="") {?>
  <div class = "adminManageTable">
    <?php
    if($var=="addsuccess"){
      echo '<b>Successfully Added Announcement for '.$module['mname'].' - '.$term['tname'].'</b>';
    }
    else if($var == 'editsuccess'){
      echo '<b>Successfully Edited Announcement for '.$module['mname'].' - '.$term['tname'].'</b>';
    }
    else if($var == 'delete'){
      echo '<b>Successfully Deleted Announcement for '.$module['mname'].' - '.$term['tname'].'</b>';
    }
    else{
      echo '<b>Error</b>';
    }
?>
</div>
<?php } ?>

<div class = "adminManageTable">
  <div class = "tableTitle">
    <h1 class = "tableHeading"><?php echo $module['mname'].' - '.$term['tname'];?></h1>
  </div>

  <div class = "content" style="text-align: left; margin: 15px; line-height: 1.6;">
    <b>Term Status: </b><?php echo $term['tstatus'];?><br>
    <b>Term Start Date: </b><?php echo date("l\, jS-F-Y", strtotime($term['tsdate']));?><br>
    <b>Term End Date: </b><?php echo date("l\, jS-F-Y", strtotime($term['tedate']));?><br>
    <br>
  </div>
</div>


<button class="collapsible" style="background: DarkCyan;">
  <b>Announcements </b>
</button>
<!-- Buttons for displaying announcement description -->
<div class="collapsedcontent" style="margin-bottom: 10px;">
  <!-- Content inside the collapsible -->
  <div style="margin: 10px; min-height: 90px;">
  <?php
  $announcements = getAnnouncementsByTermId($term['tid']);
  if($announcements->rowCount()>0){
    while($announcement = $announcements->fetch()){
    echo '<br>';
    ?>
    <div class = "resourceHolder">
      <!-- Assignment Left Column -->
      <div class = "formHolder">
        <div class = "formColumn1">
          <p>
            <b>Title: </b><?php echo $announcement['matitle'];?><br>
            <b>Post Date: </b><?php echo $announcement['madate'];?><br>
            <b>Description: </b><?php echo $announcement['madescription'];?><br>
          </p>
        </div>

        <div class = "formColumnSeparator" style="background: white; border-right: 0px dashed grey;"></div>

        <div class = "formColumn2">
          <p style = "text-align: center;">
            <a href = "/GroupProject/public/ModuleLeaderModules/browseAnnouncement/<?php echo $announcement['maid'];?>"
              style="color: white;">
              <button class="btn btn-submit">Edit Announcement</button>
            </a>
          </p>
        </div>
      </div>
    </div>
    <?php } ?>
    <?php
  }
else{ // -- If no assignment is uploaded, display Add Assignment Button
  ?>
  <h2 style = "text-align: center;">No Announcements Available</h2>
  <?php
}
?>
<br>
<div style = "text-align: center;">
  <a class = "courseModuleLink" href = "/GroupProject/public/ModuleLeaderModules/addAnnouncement/<?php echo $term['tid']?>">
    <div class = "courseModuleBox" style = "background: #e68c4d;">
      Add Announcement
    </div>
  </a>
</div>
<br><br>
  </div>
</div>


<button class="collapsible  active" style="background: DarkCyan;">
  <b>Assignment</b>
</button>
<!-- Buttons for displaying announcement description -->
<div class="collapsedcontent" style="margin-bottom: 10px; max-height: none;">
  <!-- Content inside the collapsible -->
  <?php
  $assignments = getAssignmentsByTermId($term['tid']);
  if($assignments->rowCount()>0){
    $assignment = $assignments->fetch();
    echo '<br>';
    ?>
    <div class = "resourceHolder">
      <!-- Assignment Left Column -->
      <div class = "formHolder">
        <div class = "formColumn1">
          <p>
            <b>Title: </b><?php echo $assignment['atitle'];?><br>
            <b>Deadline: </b><?php echo $assignment['adeadline'];?><br>
            <b>Description: </b><?php echo $assignment['adescription'];?><br>
          </p>
        </div>
        <div class = "formColumnSeparator" style="background: white; border-right: 0px dashed grey;"></div>

        <!-- Assignment Right Column -->
        <div class = "formColumn2">
          <div style=" text-align: center;">
            <a target = "_blank" href = "/GroupProject/public/<?php echo $assignment['afiles'];?>" style="color: white;">
              <button class="btn btn-download">Download <i class="fa fa-download"></i></button>
            </a>
          </div>
          <br>
        </div>
      </div>
      <br><br>
    </div>
    <?php
  }
else{ // -- If no assignment is uploaded, display Add Assignment Button
  echo '<br><br>';
  echo '<h2 style = "text-align: center;">No Assignment Available. Add it from Assignments Section</h2>';
  echo '<br><br><br>';
}
?>
</div>




<button class="collapsible" style="background: DarkCyan;">
  <b>Resources </b>
</button>

<!-- Buttons for displaying announcement description -->
<div class="collapsedcontent" style="margin-bottom: 10px;">
  <!-- Content inside the collapsible -->
  <div style="margin: 10px; min-height: 90px;">
    <p>
      <?php

      $resources = getResourcesByTermId($term['tid']);
      if($resources->rowCount()>0){
        while($resource = $resources->fetch()){
          ?>
          <br>
          <div class = "resourceHolder">

            <div class = "formHolder">
              <div class = "formColumn1"  style="text-align: left;">
                <p>
                  <b>Resource Title: </b><?php echo $resource['rtitle'];?><br>
                  <b>Resource Description: </b><?php echo $resource['rdescription'];?><br>
                </p>
              </div>

              <div class = "formColumnSeparator" style="background: white; border-right: 0px dashed grey;"></div>

              <div class = "formColumn2">
                <div style=" text-align: center;">
                  <a target = "_blank" href = "/GroupProject/public/<?php echo $resource['rfilenames'];?>" style="color: white;">
                    <button class="btn btn-download">Download <i class="fa fa-download"></i></button>
                  </a>
                </div>
                <br>
              </div>
            </div>

            <br>
          </div>
        <?php }
      }
      else{
        echo '<h2 style = "text-align: center;">No Resource Available</h2>';
      }
      ?>
      <br>
    </p>
  </div>
</div>

<script>
  toggleCollapse();
</script>
