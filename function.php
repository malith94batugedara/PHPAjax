<?php

include('config.php');

if(!empty($_GET['type']) && $_GET['type'] == 'list'){
      $sql = "SELECT * FROM users";
      $result = $conn->query($sql);
      $html = '';
      if($result->num_rows > 0){
           while($row = $result->fetch_assoc()){
              $html .= '<tr>
                         <td>'.$row['id'].'</td>
                         <td>'.$row['name'].'</td>
                         <td>'.$row['email'].'</td>
                         <td>'.$row['mobile'].'</td>
                         <td>'.$row['address'].'</td>
                         <td>'.$row['created_date'].'</td>
                         <td></td>
                         </tr>';
           }
      }
      else{
        $html .= '<tr>
        <td colspan="100%">Record Not Found</td>
        </tr>';
      }

      $json['html'] = $html;
      echo json_encode($json);
}

else if(!empty($_GET['type']) && $_GET['type'] == 'add'){
  
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];   
    // $sql = "INSERT INTO users (name,email,mobile,address,created_date) VALUES ($_POST['name'],$_POST['email'],$_POST['mobile'],$_POST['address'],date('Y-m-d H:i:s'))";
    $sql = "INSERT INTO `users`(`name`, `email`, `mobile`, `address`, `created_date`) VALUES ('$name','$email','$mobile','$address','date('Y-m-d H:i:s'))";
    if($conn->query($sql) == TRUE){
          $json['status'] == true;
          $json['message'] == "record successfully added!";
    }
    else{
      $json['status'] == false;
      $json['message'] == "Failed to add!";
    }
    echo json_encode($json);
}


?>