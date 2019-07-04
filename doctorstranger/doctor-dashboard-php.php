<?php
require_once("../classes/Appointments.php");
require_once("../classes/Doctor.php");
$appointments = new Appointments();
$doctor = new Doctor();
$doctor_id = $doctor->getDoctorFromUser($user_id);
$result = $appointments->getAppointments($doctor_id, $date);
if(mysqli_num_rows($result) > 0){
foreach($result as $row){
?>
<?php
    if($row['status'] == 1){
?>
<p class="text-success t-md">Appointment Confirmed</p>
<?php
    }else if($row['status'] == 2){
?>
<p class="text-danger t-md">Appointment Rejected</p>
<?php
    }else{
?>

<?php echo date("h:i A",strtotime($row['time'])); ?>
