<?php

  class ManageModuleLeaders extends Controller{

    public function index($val=""){

      $userClass = new DatabaseTable('users');
      $users = $userClass->find('urole','Module Leader');

      $moduleLeaderClass = new DatabaseTable('lecturers');
      $moduleLeaders = $moduleLeaderClass->findall();

      $template = '../app/views/administrators/manageModuleLeaders.php';
      $content = loadTemplate($template, ['val'=>$val, 'users'=>$users, 'moduleLeaders'=>$moduleLeaders]);

      $title = "Admin - Module Leaders";

      require_once "../app/controllers/adminLoadView.php";

    }



    public function add(){
      $userClass = new DatabaseTable('users');

      if(isset($_POST['submit'])){
        $_POST['user']['urole']="Module Leader";
        $_POST['user']['ustatus']="Y";
        $_POST['user']['password']=password_hash($_POST['users']['password'], PASSWORD_DEFAULT);
        $userClass->save($_POST['user']);
        header("Location:../ManageModuleLeaders/index/addsuccess");
      }

      $template = '../app/views/administrators/addModuleLeader.php';
      $content = loadTemplate($template, []);

      $title = "Admin - Add new Module Leader";

      require_once "../app/controllers/adminLoadView.php";
    }


    public function browse($val = ""){
      $userClass = new DatabaseTable('users');
      $user = $userClass->find('uid',$val);

      if($user->rowCount()>0){
        if(isset($_POST['submit'])){
          $_POST['user']['uid']=$val;
          $userClass->save($_POST['user'], 'uid');

          header("Location:../index/editsuccess");
        }

        $template = '../app/views/administrators/addAdministrator.php';
        $content = loadTemplate($template, ['user'=>$user]);

        $title = "Admin - Browse Administrator";
        require_once "../app/controllers/adminLoadView.php";
      }

      else{
        header("Location:../index/nosuchuser");
      }

    }


    public function delete($val = ""){
      $userClass = new DatabaseTable('users');
      $user = $userClass->find('uid',$val);
      if($user->rowCount()>0){
        $userClass->delete('uid', $val);
        header("Location:../index/deletesuccess");
      }
      else{
        header("Location:../index/nosuchuser");
      }

    }

    public function archive($val = ""){
      $userClass = new DatabaseTable('users');
      $user = $userClass->find('uid',$val);
      if($user->rowCount()>0){

        $ustatus = $user->fetch()['ustatus']=="Y"? "N" : "Y";
        $criteria = [
          'uid'=>$val,
          'ustatus'=>$ustatus
        ];
        $userClass->save($criteria, 'uid');
        header("Location:../index/archivesuccess");
      }
      else{
        header("Location:../index/nosuchuser");
      }
    }


  }

?>
