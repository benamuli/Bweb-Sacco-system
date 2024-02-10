<?php
include_once("connection.php");
// getting all members
function get_total_members()
{
  global $con;
  $select_query = "select * from members";
  $result_query = mysqli_query($con, $select_query);
  $count_members = mysqli_num_rows($result_query);
  echo "
  <h3>$count_members</h3>
  ";
}
function get_total_loans()
{
  global $con;
  $select_query = "select * from loans";
  $result_query = mysqli_query($con, $select_query);
  $count_loans = mysqli_num_rows($result_query);
  echo "
  <h3>$count_loans</h3>
  ";
}
function savings()
{
  global $con;
  $total = 0;
  $age_query = "SELECT Amount FROM savings";
  $result = mysqli_query($con, $age_query);
  $count_savings = mysqli_num_rows($result);

  if ($count_savings > 0) {
    while ($row = mysqli_fetch_array($result)) {
      $Amount = $row['Amount'];
      $total += $Amount;
    }

    // $average_age = $total / $count_members;
    // echo (round($average_age));
    echo $total;
  } else {
    echo "No members found.";
  }
}
function get_active_loans()
{
  global $con;
  $select_query = "select * from loans where App_status LIKE 'Approved'";
  $result_query = mysqli_query($con, $select_query);
  $num_of_rows = mysqli_num_rows($result_query);
  if ($num_of_rows == 0) {
    echo "<h2 class='text-center text-danger'>No results match!!</h2>";
  }
  while ($row = mysqli_fetch_assoc($result_query)) {
    $id = $row['id'];
    $Names = $row['Names'];
    $Id_number = $row['Id_number'];
    $App_status = $row['App_status'];
    $Disb_amount = $row['Disb_amount'];
    $Loan_type = $row['Loan_type'];
    echo "
      <table class='table table-bordered table-light'>
      <thead>
   <tr>
     <th scope='col'>No</th>
     <th scope='col'>Names</th>
     <th scope='col'>Id Number</th>
     <th scope='col'>Loan Type</th>
     <th scope='col'>Loan Status</th>
     <th scope='col'>Disbursed Amount</th>
   </tr>
 </thead>
 <tbody>
 <tr>
   <th scope='row'> $id </th>
   <td> $Names </td>
   <td> $Id_number </td>
   <td> $Loan_type </td>
   <td> $App_status </td>
   <td> $Disb_amount </td>
 </tr>
 <tbody>
 </table>";
  }
}
function get_settled_loans()
{
  global $con;
  $select_query = "select * from loans where Balance<=0";
  $result_query = mysqli_query($con, $select_query);
  $num_of_rows = mysqli_num_rows($result_query);
  if ($num_of_rows == 0) {
    echo "<h2 class='text-center text-danger'>No results match!!</h2>";
  }
  while ($row = mysqli_fetch_assoc($result_query)) {
    $id = $row['id'];
    $Names = $row['Names'];
    $Id_number = $row['Id_number'];
    $App_status = $row['App_status'];
    $Disb_amount = $row['Disb_amount'];
    $Loan_type = $row['Loan_type'];
    $Paid = $row['Paid'];
    $Balance = $row['Balance'];
    echo "
        <table class='table table-bordered table-light'>
        <thead>
     <tr>
       <th scope='col'>No</th>
       <th scope='col'>Names</th>
       <th scope='col'>Id Number</th>
       <th scope='col'>Loan Type</th>
       <th scope='col'>Loan Status</th>
       <th scope='col'>Disbursed Amount</th>
       <th scope='col'>Paid</th>
       <th scope='col'>Balance</th>
     </tr>
   </thead>
   <tbody>
   <tr>
     <th scope='row'> $id </th>
     <td> $Names </td>
     <td> $Id_number </td>
     <td> $Loan_type </td>
     <td> $App_status </td>
     <td> $Disb_amount </td>
     <td> $Paid </td>
     <td> $Balance </td>
   </tr>
   <tbody>
   </table>";
  }
}
// function reg_number()
// {
  
//   $regNum = '';
//   $uniqueId = str_pad($i, 2, '0', STR_PAD_LEFT);
//   $date = date('y');
//   $regNum = "SCH" . '\\' . $date . '\\' . $uniqueId;
//   return $regNum;
// };
// echo reg_number(4);
// function get_total_female()
// {
//   global $con;
//   $select_query = "select gender from members where gender LIKE 'female'";
//   $result_query = mysqli_query($con, $select_query);
//   $count_members = mysqli_num_rows($result_query);
//   echo "
//   <h3>$count_members</h3>
//   ";
// }
// function searchmember()
// {
//   global $con;
//   if (isset($_GET['search_data_value'])) {
//     $search_data_value = $_GET['search_data'];
//     $search_query = "select * from `members` where id_number LIKE '%$search_data_value%'";
//     $result_query = mysqli_query($con, $search_query);
//     $num_of_rows = mysqli_num_rows($result_query);
//     if ($num_of_rows == 0) {
//       echo "<h2 class='text-center text-danger'>No results match!!</h2>";
//     }
//     while ($row = mysqli_fetch_assoc($result_query)) {
//       $id = $row['id'];
//       $names = $row['names'];
//       $mobile = $row['mobile'];
//       $age = $row['age'];
//       $p_name = $row['p_name'];
//       $w_mobile = $row['w_mobile'];
//       $town = $row['town'];
//       //  $brand_id=$row['brand_id'];
//       echo "
//       <table class='table table-bordered table-light'>
//       <thead>
//    <tr>
//      <th scope='col'>#</th>
//      <th scope='col'>Name</th>
//      <th scope='col'>Mobile</th>
//      <th scope='col'>Age</th>
//      <th scope='col'>Spouse Name</th>
//      <th scope='col'>Spouse mobile</th>
//      <th scope='col'>Residential area</th>
//      <th scope='col'>operations</th>
//    </tr>
//  </thead>
//  <tbody>
//  <tr>
//    <th scope='row'> $id </th>
//    <td> $names </td>
//    <td> $mobile </td>
//    <td> $age </td>
//    <td> $p_name </td>
//    <td> $w_mobile </td>
//    <td> $town </td>
//    <td> <button class='btn btn-primary '><a class='text-light'  href='update.php?updateid=' . $id . ''>Edit</a></button>
//    <button class='btn btn-danger '><a class='text-light'  href='delete.php?deleteid=' . $id . ''>delete</a></button>
//  </tr>
//  <tbody>
//  </table>";
//     }
//   }
// }
// function filter_gender()
// {
//   global $con;
//   if (isset($_GET['selected_data_value'])) {
//     $selected_data_value = $_GET['selected_data'];
//     $search_query = "select * from `members` where gender LIKE '%$selected_data_value%'";
//     $result_query = mysqli_query($con, $search_query);
//     $num_of_rows = mysqli_num_rows($result_query);
//     if ($num_of_rows == 0) {
//       echo "<h2 class='text-center text-danger'>No results match!!</h2>";
//     }
//     while ($row = mysqli_fetch_assoc($result_query)) {
//       $id = $row['id'];
//       $names = $row['names'];
//       $mobile = $row['mobile'];
//       $age = $row['age'];
//       $p_name = $row['p_name'];
//       $w_mobile = $row['w_mobile'];
//       $town = $row['town'];
//       //  $brand_id=$row['brand_id'];
//       echo "
//     <tbody>
//     <tr>
//    <th scope='row'> $id </th>
//    <td> $names </td>
//    <td> $mobile </td>
//    <td> $age </td>
//    <td> $p_name </td>
//    <td> $w_mobile </td>
//    <td> $town </td>
//    <td> <button class='btn btn-primary '><a class='text-light'  href='update.php?updateid=' . $id . ''>Edit</a></button>
//    <button class='btn btn-danger '><a class='text-light'  href='delete.php?deleteid=' . $id . ''>delete</a></button>
//     </tr>
//       ";
//     }
//     echo "</tbody></table>";
//   } 
// }
// function filter_youth()
// {
//   global $con;

//   if (isset($_GET['youth'])) {
//     $selected_data_value = $_GET['youth'];
//     $selected_query = "SELECT * FROM `members` WHERE age<=35 ";
//     $result_query = mysqli_query($con, $selected_query);
//     $num_of_rows = mysqli_num_rows($result_query);

//     if ($num_of_rows == 0) {
//       echo "<h2 class='text-center text-danger'>No results match for youths!!</h2>";
//     }
//       while ($row = mysqli_fetch_assoc($result_query)) {
//         $id = $row['id'];
//         $names = $row['names'];
//         $mobile = $row['mobile'];
//         $age = $row['age'];
//         $p_name = $row['p_name'];
//         $w_mobile = $row['w_mobile'];
//         $town = $row['town'];

//         echo "
//         <tbody>
//                 <tr>
//                     <th scope='row'>$id</th>
//                     <td>$names</td>
//                     <td>$mobile</td>
//                     <td>$age</td>
//                     <td>$p_name</td>
//                     <td>$w_mobile</td>
//                     <td>$town</td>
//                     <td>
//                         <button class='btn btn-primary'><a class='text-light' href='update.php?updateid=$id'>Edit</a></button>
//                         <button class='btn btn-danger'><a class='text-light' href='delete.php?deleteid=$id'>Delete</a></button>
//                     </td>
//                 </tr>";
//       }
//       echo "</tbody></table>";
//     }
//   }
//   function filter_married()
// {
//   global $con;

//   if (isset($_GET['married'])) {
//     $selected_data_value = $_GET['married'];
//     $selected_query = "SELECT * FROM `members` WHERE p_name !='' ";
//     $result_query = mysqli_query($con, $selected_query);
//     $num_of_rows = mysqli_num_rows($result_query);

//     if ($num_of_rows == 0) {
//       echo "<h2 class='text-center text-danger'>No results match for youths!!</h2>";
//     }
//       while ($row = mysqli_fetch_assoc($result_query)) {
//         $id = $row['id'];
//         $names = $row['names'];
//         $mobile = $row['mobile'];
//         $age = $row['age'];
//         $p_name = $row['p_name'];
//         $w_mobile = $row['w_mobile'];
//         $town = $row['town'];

//         echo "
//         <tbody>
//                 <tr>
//                     <th scope='row'>$id</th>
//                     <td>$names</td>
//                     <td>$mobile</td>
//                     <td>$age</td>
//                     <td>$p_name</td>
//                     <td>$w_mobile</td>
//                     <td>$town</td>
//                     <td>
//                         <button class='btn btn-primary'><a class='text-light' href='update.php?updateid=$id'>Edit</a></button>
//                         <button class='btn btn-danger'><a class='text-light' href='delete.php?deleteid=$id'>Delete</a></button>
//                     </td>
//                 </tr>";
//       }
//       echo "</tbody></table>";
//     }
//   }
