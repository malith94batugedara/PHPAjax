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



?>