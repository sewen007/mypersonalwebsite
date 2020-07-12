<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors',1);

include_once '../database.php';

if(isset($_POST['submit']))
{  
    try{
    if (empty($is_first_time) || empty($reason_for_visit) || empty($need_found_or_not) || empty($revist_or_not)){
    throw new Exception ("One or more values is/are empty. Please check and try again");
        
    }  
    $sessionID = $_POST[session_id()];

    $is_first_time = $_POST['person_first_time'];
    $reason_for_visit = $_POST['person_reason_for_visit'];
    $need_found_or_not = $_POST['person_did_you_find_what_you_need'];
    $user_wants = $_POST['person_what_do_you_want'];
    $revist_or_not = $POST['person_likelihood_of_visit'];
    $website_suggestion = $_POST['person_website_suggestions'];
 
     $sql = "INSERT INTO initialfeedback (session_ID, person_first_time,person_reason_for_visit, person_did_you_find_what_you_need, person_what_do_you_want, person_likelihood_of_visit, person_website_suggestions)
     VALUES ($sessionID, $is_first_time, $reason_for_visit, $need_found_or_not, $user_wants, $revist_or_not, $website_suggestion)"; 
 
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
     mysqli_close($conn);

/*    $feedback = new feedback();
    $success = $feedback->createFeedback($sessionID, $is_first_time, $need_found_or_not, $user_wants, $revist_or_not, $website_suggestion );
    
    if ($success){
        $_SESSION['success'] = "Feedback has been recorded. Thanks!";
        header("Location: ../../feedback"); 
        */
}catch (Exception $error) {
    $_SESSION['error'] = $error->getMessage();
    header("Location: ../../feedback.php");
}
    
}




?>