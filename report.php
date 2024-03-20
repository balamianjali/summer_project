<?php
session_start();
include_once '../assets/conn/dbconnect.php';
if (isset($_GET['appid'])) {
$appid=$_GET['appid'];
}
$res=mysqli_query($con, "SELECT a.*, b.*,c.* FROM patient a
JOIN appointment b
On a.icPatient = b.patientIc
JOIN doctorschedule c
On b.scheduleId=c.scheduleId
WHERE b.appId  =".$appid);

$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Manmohan Memorial Community Hospital</title>
        
        <link rel="stylesheet" type="text/css" href="assets/css/invoice.css">
    </head>
    <body>
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    <img src="assets/img/logo.jpg" style="width:100%; max-width:1000px;">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Invoice #: <?php echo $userRow['appId'];?><br>
                                    Created: <?php echo date("d-m-Y");?><br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                
                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    Patient ID: <?php echo $userRow['patientIc'];?><br>
                                    Name: <?php echo $userRow['patientFirstName'];?> <?php echo $userRow['patientLastName'];?><br>
                                    Address: <?php echo $userRow['patientAddress'];?><br>
                                    Email: <?php echo $userRow['patientEmail'];?><br>
                                    Contact No: <?php echo $userRow['patientPhone'];?><br>
                                    Appointment Date: <?php echo $userRow['scheduleDate'];?><br>
                                    Patient Symptom: <?php echo $userRow['appSymptom'];?><br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                
                
                
                <tr class="heading">
                    <td>
                    
                    </td>
                    
                    <td>
                        <?php echo $userRow['patientFirstName'];?> <?php echo $userRow['patientLastName'];?>
                    </td>
                </tr>
                 <tr class="item">
                    <td>
                        Patient Report
                    </td>
                    
                    <td>
                        <!-- <?php echo $userRow['addReport'];?>  -->
                    </td>
                </tr>
                
            </table>
        </div>
        <div class="print">
        <button onclick="myFunction()">Print this page</button>
</div>
<script>
function myFunction() {
    window.print();
}
</script>
    </body>
</html>