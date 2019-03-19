<?php

if(isset($user)){
  $user=$user->fetch();

if(isset($student))
  $student=$student->fetch();

?>


<div class = "boxesContainer boxesContainerManage">

  <div class = "contentBoxLarge contentBoxLargeEdit">

    <div class = "title">
      <?php echo $user['fname'].' '.$user['mname'].' '.$user['lname']; ?>
      </div>
    <div class = "content" style="text-align: left; margin: 15px; line-height: 1.6;">
      <b>Login ID: </b><?php echo $user['uid'];?><br>
      <b>First Name: </b><?php echo $user['fname'];?><br>
      <b>Middle Name: </b><?php echo $user['mname'];?><br>
      <b>Last Name: </b><?php echo $user['lname'];?><br>
      <b>Gender: </b><?php echo $user['gender'];?><br>
      <b>Birthdate: </b><?php echo $user['birthdate'];?><br>
      <b>Address: </b><?php echo $user['uaddress'];?><br>
      <b>Contact No: </b><?php echo $user['ucontact'];?><br>
      <b>Email Address: </b><?php echo $user['uemail'];?><br>
      <b>Role: </b><?php echo $user['urole'];?><br>
      <b>Status: </b><?php echo $user['ustatus']=="Live" ? '<font color = "green">Live</font>':
                                                         '<font color = "red">Dormant</font>';?><br>

    </div>
  </div>

  <div class = "contentBoxLarge contentBoxLargeEdit deleteBox">
    <a href = "/GroupProject/public/ManageStudents/delete/<?php echo $user['uid'];?>">
      <div class = "deleteBoxTextHolder">
        <br>
        <img src = "/GroupProject/public/resources/images/deleteuser.png" width="150"><br><br>
        Delete User
      </div>
    </a>
  </div>


</div>


<div class = "adminManageTable">

  <div class = "tableTitle" style="background: #6495ED;">
    <h1 class = "tableHeading">Other Student Details</h1>
  </div>

  <div class = "content" style="text-align: left; margin: 15px; line-height: 1.6;">
    <b>Other Student Details: </b>

    <b>PAT: </b><?php echo "";?><br>
    <b>Course: </b><?php echo "";?><br>
    <b>Level: </b><?php echo "";?><br>

  </div>

</div>

<form method = "POST" class = "userForm">

  <div class = "formTitle">
    <h1 class = "formHeading">
      <?php if(isset($user))echo 'Edit '.$user['fname'].' '.$user['mname'].' '.$user['lname'].'\'s details';
      else {?>
      Add new Student
    <?php } ?>
    </h1>
  </div>


  <div class = "formHolder">

    <div class = "formColumn1">
          <label for = "password">Password: </label>
          <input type = "password" name = "user[password]" required>

          <label for = "confirmpassword">Confirm Password: </label>
          <input type = "password" name = "confirmpassword" required>
    </div>

    <div class = "formColumnSeparator"></div>

    <div class = "formColumn2"></div>

</div>


<?php

}

?>

<form method = "POST" class = "userForm">

<div class = "formTitle">
  <h1 class = "formHeading">
    <?php if(isset($user))echo 'Edit '.$user['fname'].' '.$user['mname'].' '.$user['lname'].'\'s details';
    else {?>
    Add new Student
  <?php } ?>
  </h1>
</div>

<div class = "formHolder">

  <div class = "formColumn1">
    <label for = "firstname">First Name: </label>
    <input type = "text" name = "user[fname]" required
    <?php if(isset($user))echo 'value="'.$user['fname'].'"';?>>

    <label for = "middlename">Middle Name: </label>
    <input type = "text" name = "user[mname]"
    <?php if(isset($user))echo 'value="'.$user['mname'].'"';?>>

    <label for = "lastname">Surame: </label>
    <input type = "text" name = "user[lname]" required
    <?php if(isset($user))echo 'value="'.$user['lname'].'"';?>>


    <label for = "gender">Gender: </label>
    <select name = "user[gender]">
      <option value = "Male" <?php if(isset($user) && $user['gender']=="Male")echo 'selected';?>>Male</option>
      <option value = "Female" <?php if(isset($user) && $user['gender']=="Female")echo 'selected';?>>Female</option>
      <option value = "Other" <?php if(isset($user) && $user['gender']=="Other")echo 'selected';?>>Other</option>
    </select>


    <label for = "course">Course: </label>
    <select name = "student[cid]">
      <?php
        while($course = $courses->fetch()){
          if($course['status']=="N")
            continue;
      ?>
        <option value = "<?php echo $course['cid'];?>">
          <?php echo $course['ctitle'];?>
        </option>
      <?php }?>
    </select>


    <label for = "level">Level: </label>
    <select name = "student[slvid]">
      <?php
        while($level = $levels->fetch()){
          if($level['status']=="N")
            continue;
      ?>
        <option value = "<?php echo $level['lvid'];?>">
          <?php echo $level['lvtitle'].' - '.$level['lvaltname'];?>
        </option>
      <?php }?>
    </select>


  </div>


    <div class = "formColumnSeparator"></div>

  <div class = "formColumn2">

    <label for = "birthdate">Birth Date: </label>
    <input type = "date" name = "user[birthdate]" <?php if(isset($user))echo 'value='.$user['birthdate'];?>>

    <label for = "address">Address: </label>
    <textarea name = "user[uaddress]"  required><?php if(isset($user))echo $user['uaddress'];?></textarea>

    <label for = "contact">Contact Number: </label>
    <input type = "contact" name = "user[ucontact]"  required
    <?php if(isset($user))echo 'value='.$user['ucontact'];?>>

    <label for = "email">Email Address: </label>
    <input type = "email" name = "user[uemail]"  required
    <?php if(isset($user))echo 'value='.$user['uemail'];?>>



    <label for = "pat">PAT: </label>
    <select name = "student[puid]">
      <?php
        while($user = $users->fetch()){
          if($user['status']=="N")
            continue;
      ?>
        <option value = "<?php echo $user['uid'];?>">
          <?php echo $user['fname'].' '.$user['mname'].' '.$user['lname'];?>
        </option>
      <?php }?>
    </select>


  </div>
</div>


  <input type = "submit" value = "Submit" name = "submit">


</form>