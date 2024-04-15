<?php
   require_once __DIR__ . '/vendor/autoload.php';
?> 

<?php 
    require_once "include/header.php";
?>



<?php  
         $id = $_GET["id"];
        require_once "../connection.php";

        $sql = "SELECT * FROM jobv WHERE id = $id ";
        $result = mysqli_query($conn , $sql);

        if(mysqli_num_rows($result) > 0 ){
        
            while($rows = mysqli_fetch_assoc($result) ){
                $id = $rows["id"];
                $position = $rows["position"];
                $numneeded = $rows["numneeded"];
                $dateneeded = $rows["dateneeded"];
                $department = $rows["department"];
                $gender = $rows["gender"];
                $agerange = $rows["agerange"];
                $civilstatus = $rows["civilstatus"];
                $requisition = $rows["requisition"];
                $reason = $rows["reason"];
                $budgeted = $rows["budgeted"];
                $employmentstatus = $rows["employmentstatus"];
                $educational = $rows["educational"];
                $workexp = $rows["workexp"];
                $skills = $rows["skills"];
                $status = $rows["status"];
                $branch = $rows["branch"];
                $timestomp = $rows["timestomp"];
                $name = $rows["name"];
                $reason1 = $rows["reason1"];
            }
        }


      

        if( $_SERVER["REQUEST_METHOD"] == "POST" ){

            if( empty($_REQUEST["status"]) ){
                $status = "";
            }else {
                $status = $_REQUEST["status"];
            }


            if( empty($_REQUEST["position"]) ){
                $position ="";
            }else {
                $position = $_REQUEST["position"];
            }

            if( empty($_REQUEST["numneeded"]) ){
                $numneeded ="";
            }else {
                $numneeded = $_REQUEST["numneeded"];
            }

            if( empty($_REQUEST["dateneeded"]) ){
                $dateneeded ="";
            }else {
                $dateneeded = $_REQUEST["dateneeded"];
            }

            if( empty($_REQUEST["department"]) ){
                $department ="";
            }else {
                $department = $_REQUEST["department"];
            }

            if( empty($_REQUEST["gender"]) ){
                $gender ="";
            }else {
                $gender = $_REQUEST["gender"];
            }

            if( empty($_REQUEST["agerange"]) ){
                $agerange ="";
            }else {
                $agerange = $_REQUEST["agerange"];
            }

            if( empty($_REQUEST["civilstatus"]) ){
                $civilstatus ="";
            }else {
                $civilstatus = $_REQUEST["civilstatus"];
            }

            if( empty($_REQUEST["requisition"]) ){
                $requisition ="";
            }else {
                $requisition = $_REQUEST["requisition"];
            }

            if( empty($_REQUEST["reason"]) ){
                $reason ="";
            }else {
                $reason = $_REQUEST["reason"];
            }

            if( empty($_REQUEST["budgeted"]) ){
                $budgeted ="";
            }else {
                $budgeted = $_REQUEST["budgeted"];
            }

            if( empty($_REQUEST["employmentstatus"]) ){
                $employmentstatus ="";
            }else {
                $employmentstatus = $_REQUEST["employmentstatus"];
            }

            if( empty($_REQUEST["educational"]) ){
                $educational ="";
            }else {
                $educational = $_REQUEST["educational"];
            }

            if( empty($_REQUEST["workexp"]) ){
                $workexp ="";
            }else {
                $workexp = $_REQUEST["workexp"];
            }

            if( empty($_REQUEST["skills"]) ){
                $skills ="";
            }else {
                $skills = $_REQUEST["skills"];
            }
            
            if( empty($_REQUEST["branch"]) ){
                $branch ="";
            }else {
                $branch = $_REQUEST["branch"];
            }

            if( empty($_REQUEST["timestomp"]) ){
                $timestomp ="";
            }else {
                $timestomp = $_REQUEST["timestomp"];
            }

            if( empty($_REQUEST["name"]) ){
                $name ="";
            }else {
                $name = $_REQUEST["name"];
            }

            if( empty($_REQUEST["reason1"]) ){
                $reason1 ="";
            }else {
                $reason1 = $_REQUEST["reason1"];
            }

            
                // database connection
                // require_once "../connection.php";

                $sql_select_query = "SELECT status FROM jobv WHERE status = '$status' AND id != $id";

                $r = mysqli_query($conn , $sql_select_query);

                   

                    $sql = "UPDATE jobv SET position = '$position', numneeded = '$numneeded', dateneeded = '$dateneeded', department = '$department', gender = '$gender', agerange = '$agerange', civilstatus = '$civilstatus', requisition = '$requisition', reason = '$reason', budgeted = '$budgeted', employmentstatus = '$employmentstatus', educational = '$educational', workexp = '$workexp', skills = '$skills', status = '$status', branch = '$branch', branch = '$branch', name = '$name', reason1 = '$reason1' WHERE id = $_GET[id] ";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'manage-prf.php');
                            $('#linkBtn').text('View PRF's');
                            $('#addMsg').text('PRF Edit Successfully!');
                            $('#closeBtn').text('Edit Again?');
                        })
                     </script>
                     ";
                    }
                    
                }
?>



<div style=""> 
<div class="login-form-bg h-100">
        <div class="container  h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-12">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-4 shadow">                       
                                    <h4 class="text-center">Edit PRF</h4>
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                <h1> PERSONNEL REQUISITION FORM DETAILS </h1>

                                <div class="input-field">
    <label for=""><b><span style="color: red;">POSITION:*</span></b></label>
    <select id="position" class="form-control" name="position" placeholder="" required>
        <?php
        $positions = array(
            "Accessories Counterman",
            "Accessories Sales Consultant",
            "Accountant",
            "Accounting Analyst",
            "Accounting Supervisor",
            "Area Manager",
            "Automotive Technician",
            "Billing Analyst",
            "Billing Clerk",
            "Body And Paint Car Jockey",
            "Body And Paint Estimator",
            "Body And Paint Manager",
            "Body And Paint Parts Man",
            "Body And Paint Quality Controller",
            "Body And Paint Service Advisor",
            "Body And Paint Service Technician",
            "Branch Manager",
            "Branch OIC",
            "Building Maintenance",
            "Car Jockey",
            "Car Washer",
            "Cashier",
            "Cashier (Roving)",
            "Chattel Processor",
            "Chief Finance Officer",
            "Collector",
            "Company Driver",
            "Content Creator",
            "Corporate Planning And Engineering Manager",
            "Credit And Collection Roving",
            "Credit And Collection Specialist",
            "Credit And Collection Staff",
            "Credit And Collection Team Leader",
            "Credit Management And Recovery Specialist",
            "Customer Experience Manager",
            "Customer Experience Specialist",
            "Customer Relations Officer",
            "DCRC Assistant",
            "DCRC Executive",
            "DCRC Manager",
            "DCRC Supervisor",
            "Dealer Jacket Admin",
            "Digital Marketing Specialist",
            "Document Controller",
            "Encoder",
            "Equipment Maintenance",
            "Finance Admin",
            "Finance And Insurance",
            "Finance And Insurance Admin",
            "Finance And Insurance Coordinator",
            "Finance Liason",
            "Finance Manager",
            "Finance Supervisor",
            "Freelance Sales Executive",
            "General Accounting Team Leader",
            "General Manager",
            "Group Finance Manager",
            "Group Internal Audit Manager",
            "Group Internal Auditor",
            "Group IT Manager",
            "Group Sales Admin",
            "Group Sales And Service Admin",
            "HR Generalist",
            "Human Resource Generalist",
            "Human Resource Manager",
            "Human Resource Supervisor",
            "Internal Auditor",
            "Insurance Coordinator",
            "IT Network Specialist",
            "IT Specialist",
            "IT Staff",
            "Job Controller",
            "Leadman",
            "LTO Coordinator",
            "LTO Liaison",
            "LTO Team Leader",
            "Machinist",
            "Marketing Assistant",
            "Messenger",
            "Network Administrator",
            "Online Marketing Specialist",
            "Operation Compliance And Improvement Officer",
            "Parts Admin",
            "Parts Analyst",
            "Parts And Accessories Coordinator",
            "Parts And Accessories Counterman",
            "Parts Counter Specialist",
            "Parts Counterman",
            "Parts Manager",
            "Parts Officer In Charge",
            "Parts Supervisor",
            "Partsman",
            "Pco Supervisor / Architect Designer",
            "Pre Delivery Inspector",
            "Pre Owned Specalist",
            "Pre-Delivery Inspector",
            "Pre-Delivery Inspector Head",
            "Procurement Assistant",
            "Procurement Team Leader",
            "Quality Care Auditor",
            "Repair Maintenance Facilities And Safety Officer",
            "Roving Lto/Chattel Processor",
            "SA Supervisor",
            "Sales Admin",
            "Sales Consultant",
            "Sales Executive",
            "Sales Consultant Team Leader",
            "Sales Delivery Specialist",
            "Sales Manager",
            "Sales Receptionist",
            "Sales Team Leader",
            "Service Admin",
            "Service Advisor",
            "Service Adviser",
            "Service Adviser (Body And Paint)",
            "Service Manager",
            "Service Oic",
            "Service Receptionist",
            "Service Supervisor",
            "Service Technician",
            "Showroom Assistant",
            "System Administrator",
            "Stockyard Supervisor",
            "Technical Support Officer",
            "Tools Custodian / Machinist",
            "Tool Keeper",
            "Tool Keeper/ Leadman",
            "Trailer Truck Driver",
            "Treasury Associate",
            "Treasury Supervisor",
            "Truck Driver",
            "Warranty Analyst",
            "Warranty Officer",
            "Warranty Processor",
            "Warranty Supervisor",
            "Warehouseman",
            "Workshop Manager",
            "Workshop Supervisor"
        );

        echo '<option value="" ' . ($position == '' ? 'selected' : '') . '></option>'; // Blank option if no position is selected

        foreach ($positions as $pos) {
            if ($position === $pos) {
                echo "<option value='$pos' selected>$pos</option>";
            } else {
                echo "<option value='$pos'>$pos</option>";
            }
        }
        ?>
    </select>
    <br>
</div>


                                <div class="form-group">
                                    <label ><B>NO. NEEDED:</B></label>
                                    <input type="text" class="form-control" value="<?php echo $numneeded; ?>"  name="numneeded" >     
                                </div>

                                <div class="form-group">
                                    <label ><B>DATE NEEDED:</B></label>
                                    <input type="date" class="form-control" value="<?php echo $dateneeded; ?>"  name="dateneeded" >     
                                </div>

                                <div class="input-field">
    <label for=""><B><span style="color: red;">DEPARTMENT:*</span></b></label>
    <select id="department" class="form-control" name="department" placeholder="" required>
        <?php
  //      $currentDepartment = $department ?? ''; // Assuming $department holds the current department value, or it's an empty string if it's not set
        $departments = array("Finance", "Sales", "Service", "Parts", "Audit", "Human Resource", "Info Tech", "Procurement", "Body and Paint");
        echo '<option value="" ' . ($currentDepartment == '' ? 'selected' : '') . '></option>'; // Blank option if no department is selected
        foreach ($departments as $dept) {
            if ($currentDepartment === $dept) {
                echo "<option value='$dept' selected>$dept</option>";
            } else {
                echo "<option value='$dept'>$dept</option>";
            }
        }
        ?>
    </select>
    <br>

                                <div class="form-group form-check form-check-inline">
                                    <label class="form-check-label" ><B>GENDER: </B></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Male" ){ echo "checked"; } ?>  value="Male"  selected>
                                    <label class="form-check-label" ><B>Male</B></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Female" ){ echo "checked"; } ?>  value="Female">
                                    <label class="form-check-label" ><B>Female</B></label>
                                </div>

                                <div class="form-group">
                                    <label ><B> AGE RANGE:</B></label>
                                    <input type="text" class="form-control" value="<?php echo $agerange; ?>"  name="agerange" >     
                                </div>

                                <div class="form-group">
                                    <label ><B> CIVIL STATUS:</B></label>
                                    <input type="text" class="form-control" value="<?php echo $civilstatus; ?>"  name="civilstatus" >     
                                </div>

                                <div class="input-field">
    <label for=""><b>REASON FOR REQUISITION:</b></label>
    <select id="requisition" class="form-control" name="requisition" required>
        <?php
        $reasonsForRequisition = array("Replacement", "New Position", "Additional Personnel");
        echo '<option value="" ' . ($requisition == '' ? 'selected' : '') . '></option>'; // Blank option if no reason for requisition is selected

        foreach ($reasonsForRequisition as $reason) {
            if ($requisition === $reason) {
                echo "<option value='$reason' selected>$reason</option>";
            } else {
                echo "<option value='$reason'>$reason</option>";
            }
        }
        ?>
    </select>
    <br>
</div>

                                <div class="form-group">
                                    <label ><B> REASON:</B></label>
                                    <input type="text" class="form-control" value="<?php echo $reason; ?>"  name="reason" >     
                                </div>

                                <div class="form-group form-check form-check-inline">
                                    <label class="form-check-label" ><B>BUDGETED (Required if New Position): </B></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="budgeted" <?php if($budgeted == "Yes" ){ echo "checked"; } ?>  value="Yes"  selected>
                                    <label class="form-check-label" ><B>Yes</B></label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="budgeted" <?php if($budgeted == "Female" ){ echo "checked"; } ?>  value="No">
                                    <label class="form-check-label" ><B>No</B></label>
                                </div>

                                <div class="input-field">
    <label for=""><b><span style="color: red;">EMPLOYMENT STATUS:</span></b></label>
    <select id="employmentstatus" class="form-control" name="employmentstatus" placeholder="">
        <?php
        $employmentStatusOptions = array("Probationary", "Agency", "Temporary");
        echo '<option value="" ' . ($employmentstatus == '' ? 'selected' : '') . '></option>'; // Blank option if no employment status is selected

        foreach ($employmentStatusOptions as $option) {
            if ($employmentstatus === $option) {
                echo "<option value='$option' selected>$option</option>";
            } else {
                echo "<option value='$option'>$option</option>";
            }
        }
        ?>
    </select>
    <br>
</div>

<div class="input-field">
    <label for=""><b><span style="color: red;">BRANCH:*</span></b></label>
    <select id="branch" class="form-control" name="branch" placeholder="" required>
        <?php
        $branchOptions = array(
            "Ford Alabang",
            "Ford Sta. Rosa",
            "Ford Cavite",
            "Ford Laguna",
            "Ford Naga",
            "Ford Calamba",
            "Ford Batangas",
            "MMC Imus",
            "MMC Batangas",
            "MMC Lucena",
            "MMC Iligan",
            "Azi Makati",
            "Azi Sta. Rosa",
            "Azi Ilo-ilo"
        );

        echo '<option value="" ' . ($branch == '' ? 'selected' : '') . '></option>'; // Blank option if no branch is selected

        foreach ($branchOptions as $option) {
            if ($branch === $option) {
                echo "<option value='$option' selected>$option</option>";
            } else {
                echo "<option value='$option'>$option</option>";
            }
        }
        ?>
    </select>
    <br>
</div>

<div class="input-field">
    <label for=""><b>EDUCATIONAL BACKGROUND:</b></label>
    <select id="educational" class="form-control" name="educational" placeholder="">
        <?php
        $educationalOptions = array("High School Graduate", "College Undergraduate", "College Graduate");
        echo '<option value="" ' . ($educational == '' ? 'selected' : '') . '></option>'; // Blank option if no educational background is selected

        foreach ($educationalOptions as $option) {
            if ($educational === $option) {
                echo "<option value='$option' selected>$option</option>";
            } else {
                echo "<option value='$option'>$option</option>";
            }
        }
        ?>
    </select>
    <br>
</div>

                                <div class="form-group">
                                    <label ><B> TECHNICAL KNOWLEDGE / SPECIAL TRAININGS / WORK EXPERIENCE (NO. OF YEARS):</B></label>
                                    <input type="text" class="form-control" value="<?php echo $workexp; ?>"  name="workexp" >     
                                </div>

                                <div class="form-group">
                                    <label ><B> SPECIFIC ABILITIES / SKILLS/ PERSONAL QUALITIES REQUIRED:</B></label>
                                    <input type="text" class="form-control" value="<?php echo $skills; ?>"  name="skills" >     
                                </div>



                                <div class="input-field">
    <label for=""><b>STATUS:</b></label>
    <select id="status" class="form-control" name="status" placeholder="" required>
        <?php
        $statusOptions = array("Job Posting", "For Interview", "Job Offer", "For Requirements", "Closed");
        echo '<option value="" ' . ($status == '' ? 'selected' : '') . '></option>'; // Blank option if no status is selected

        foreach ($statusOptions as $option) {
            if ($status === $option) {
                echo "<option value='$option' selected>$option</option>";
            } else {
                echo "<option value='$option'>$option</option>";
            }
        }
        ?>
    </select>
    <br>
</div>

                                <div class="form-group">
                                    <label ><B>REASON (If for Requirements):</B></label>
                                    <input type="text" class="form-control" value="<?php echo $reason1; ?>"  name="reason1" >     
                                </div>

                                <div class="form-group">
                                    <label ><B>NAME (If for Requirements):</B></label>
                                    <input type="text" class="form-control" value="<?php echo $name; ?>"  name="name" >     
                                </div>
  
<br>
<br>
                               
                                <br>

                                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group">
                                   <input type="submit" value="Save Changes" class="btn btn-primary w-20 " name="save_changes" >  
                                   <input type="submit" value="Generate PRF" target="_blank" class="btn btn-primary w-20 " name="generate_prf" >        
                                    </div>
                                    <div class="input-group">
                                         <a href="manage-prf.php" class="btn btn-primary w-20">Close</a>
                                    </div>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var idleTime = 0;
    $(document).ready(function () {
        //Increment the idle time counter every minute.
        var idleInterval = setInterval(timerIncrement, 60000); // 1 minute

        //Zero the idle timer on mouse movement.
        $(this).mousemove(function (e) {
            idleTime = 0;
        });
        $(this).keypress(function (e) {
            idleTime = 0;
        });
    });

    function timerIncrement() {
        idleTime++;
        if (idleTime >= 10) { // 10 minutes
            // Logout the user or show a modal for logout
            window.location.href = 'logout.php';
        }
    }
</script>
<div class="embed-responsive embed-responsive-1by1">
<?php
use JasperPHP\JasperPHP;
if(isset($_POST['generate_prf'])){
    if(str_contains($branch, 'Ford')){
        $input = __DIR__ . '/vendor/geekcom/phpjasper/examples/PRF_dmci.jrxml';
        $input1 = __DIR__ . '/vendor/geekcom/phpjasper/examples/PRF_dmci.jasper'; 
        $output = __DIR__ . '/vendor/geekcom/phpjasper/examples';    
        $options = [ 
            'format' => ['pdf', 'rtf'],
            'locale' => 'en',
            'params' => [
                'position'=>$position,
                'no_need'=>$numneeded,
                'date_needed'=>$dateneeded,
                'department'=>$department,
                'gender'=>$gender,
                'age_range'=>$agerange,
                'civil_status'=>$civilstatus,
                'reason_requisition'=>$requisition,
                'reason'=>$reason,
                'budgeted'=>$budgeted,
                'employee_status'=>$employmentstatus,
                'branch'=>$branch,
                'educational_background'=>$educational,
                'year_of_experience'=>$workexp,
                'skills'=>$skills,
                'status'=>$status,
                'name_for_requirements'=>$name,
                //'reason_for_requirements'=>$reason1
            ]
        ];

        $jasper = new JasperPHP;
        $jasper->compile($input)->execute();
        $jasper->process(
            $input1,
            $output,
            $options
        )->execute();
    //echo "<script>alert('UAA-DMCI Generated successful!')</script>";
    //echo "<iframe src='http://localhost/aa1/test1/admin/uaa-dmci.php' width='100%' height='100%'></iframe>";
    echo "<iframe class='embed-responsive-item' src='http://localhost/aa1/test1/admin/prf_dmci.php' allowfullscreen='true'></iframe>";
    }
    elseif(str_contains($branch, 'MMC')){
        $input = __DIR__ . '/vendor/geekcom/phpjasper/examples/PRF_mmc.jrxml';
        $input1 = __DIR__ . '/vendor/geekcom/phpjasper/examples/PRF_mmc.jasper'; 
        $output = __DIR__ . '/vendor/geekcom/phpjasper/examples';    
        $options = [ 
            'format' => ['pdf', 'rtf'],
            'locale' => 'en',
            'params' => [
                'position'=>$position,
                'no_need'=>$numneeded,
                'date_needed'=>$dateneeded,
                'department'=>$department,
                'gender'=>$gender,
                'age_range'=>$agerange,
                'civil_status'=>$civilstatus,
                'reason_requisition'=>$requisition,
                'reason'=>$reason,
                'budgeted'=>$budgeted,
                'employee_status'=>$employmentstatus,
                'branch'=>$branch,
                'educational_background'=>$educational,
                'year_of_experience'=>$workexp,
                'skills'=>$skills,
                'status'=>$status,
                'name_for_requirement'=>$name,
                //'reason_for_requirements'=>$reason1
            ]
        ];

        $jasper = new JasperPHP;
        $jasper->compile($input)->execute();
        $jasper->process(
            $input1,
            $output,
            $options
        )->execute();
    //echo "<script>alert('UAA-MMC Generated successful!')</script>";
    //echo "<iframe src='http://localhost/aa1/test1/admin/uaa-mmc.php' width='100%' height='100%'></iframe>";
    echo "<iframe class='embed-responsive-item' src='http://localhost/aa1/test1/admin/prf_mmc.php' allowfullscreen='true'></iframe>";
    }elseif(str_contains($branch, 'Azi')){
        $input = __DIR__ . '/vendor/geekcom/phpjasper/examples/PRF_azi.jrxml';
        $input1 = __DIR__ . '/vendor/geekcom/phpjasper/examples/PRF_azi.jasper'; 
        $output = __DIR__ . '/vendor/geekcom/phpjasper/examples';   
        $options = [ 
            'format' => ['pdf', 'rtf'],
            'locale' => 'en',
            'params' => [
                'position'=>$position,
                'no_need'=>$numneeded,
                'date_needed'=>$dateneeded,
                'department'=>$department,
                'gender'=>$gender,
                'age_range'=>$agerange,
                'civil_status'=>$civilstatus,
                'reason_requisition'=>$requisition,
                'reason'=>$reason,
                'budgeted'=>$budgeted,
                'employee_status'=>$employmentstatus,
                'branch'=>$branch,
                'educational_background'=>$educational,
                'year_of_experience'=>$workexp,
                'skills'=>$skills,
                'status'=>$status,
                'name_for_requirement'=>$name,
                //'reason_for_requirements'=>$reason1
            ]
        ];

        $jasper = new JasperPHP;
        $jasper->compile($input)->execute();
        $jasper->process(
            $input1,
            $output,
            $options
        )->execute();
    //echo "<script>alert('UAA-AZI Generated successful!')</script>";
   // echo "<iframe src='http://localhost/aa1/test1/admin/uaa-azi.php' width='100%' height='100%'></iframe>";
    echo "<iframe class='embed-responsive-item' src='http://localhost/aa1/test1/admin/prf_azi.php' allowfullscreen='true'></iframe>";
    }
}
?>

<?php 
    require_once "include/footer.php";
?>
</div>
