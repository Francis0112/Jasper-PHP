
<?php
    require_once __DIR__ . '/vendor/autoload.php';
?>


<?php
    require_once "include/header.php";
?>


<?php  


        $id = $_GET["id"];
        require_once "../connection.php";

        $sql = "SELECT * FROM darf WHERE id = $id ";
        $result = mysqli_query($conn , $sql);
    
        if(mysqli_num_rows($result) > 0 ){
           
            while($rows = mysqli_fetch_assoc($result) ){
                $date = $rows["date"];
                $name = $rows["name"];
                $position = $rows["position"];
                $dealer = $rows["dealer"];
                $companyemail= $rows["companyemail"];
                $department= $rows["department"];
                $contactno= $rows["contactno"];
                $spsid= $rows["spsid"];
                $application= $rows["application"];
                $dealers= $rows["dealers"];
                $role= $rows["role"];
                $timestomp= $rows["timestomp"];
                $status = $rows ['status'];
                $action = $rows ['action'];
            }
        }


        $nameErr = "";
       
        if( $_SERVER["REQUEST_METHOD"] == "POST" ){
 
            if( empty($_REQUEST["date"]) ){
                $date ="";
            }else {
                $date = $_REQUEST["date"];
            }

            if( empty($_REQUEST["name"]) ){
                $nameErr = "<p style='color:red'> * Name is required</p>";
                $name = "";
            }else {
                $name = $_REQUEST["name"];
            }

            if( empty($_REQUEST["companyemail"]) ){
                $companyemail = "";
            }else{
                $companyemail = $_REQUEST["companyemail"];
            }
            if( empty($_REQUEST["position"]) ){
                $position ="";
            }else {
                $position = $_REQUEST["position"];
            }

            if( empty($_REQUEST["dealer"]) ){
                $dealer ="";
            }else {
                $dealer = $_REQUEST["dealer"];
            }

            if( empty($_REQUEST["department"]) ){
                $department ="";
            }else {
                $department = $_REQUEST["department"];
            }

            if( empty($_REQUEST["contactno"]) ){
                $contactno ="";
            }else {
                $contactno = $_REQUEST["contactno"];
            }

            if( empty($_REQUEST["spsid"]) ){
                $spsid ="";
            }else {
                $spsid = $_REQUEST["spsid"];
            }

            if( empty($_REQUEST["application"]) ){
                $application ="";
            }else {
                $application = $_REQUEST["application"];
            }

            
            if( empty($_REQUEST["dealers"]) ){
                $dealers ="";
            }else {
                $dealers = $_REQUEST["dealers"];
            }

            if( empty($_REQUEST["role"]) ){
                $role ="";
            }else {
                $role = $_REQUEST["role"];
            }

            if( empty($_REQUEST["timestomp"]) ){
                $timestomp ="";
            }else {
                $timestomp = $_REQUEST["timestomp"];
            }

            if( empty($_REQUEST["status"]) ){
                $status ="";
            }else {
                $status = $_REQUEST["status"];
            }

            if( empty($_REQUEST["action"]) ){
                $action ="";
            }else {
                $action = $_REQUEST["action"];
            }


            if( !empty($name)){
            
                // database connection
                $sql_select_query = "SELECT name FROM darf WHERE name = '$name' ";
                $r = mysqli_query($conn , $sql_select_query);

                if( mysqli_num_rows($r) > 0 ){
                    $nameErr = "<p style='color:red'> * Name Already Register</p>";
                } else{

                    $sql = "UPDATE darf SET name = '$name', date = '$date', position = '$position', dealer = '$dealer', companyemail = '$companyemail', department = '$department', contactno = '$contactno', spsid = '$spsid', application = '$application', status = '$status', role = '$role', timestomp = '$timestomp', action = '$action' WHERE id = $_GET[id] ";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'manage-darf.php');
                            $('#linkBtn').text('View Darfs');
                            $('#addMsg').text('Darf Edit Successfully!');
                            $('#closeBtn').text('Edit Again?');
                        })
                     </script>
                     ";
                    }

                   }
                }

            }
?>



<div style=""> 
<div class="login-form-bg h-100">
        <div class="container mt-5 h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-12">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5 shadow">                       
                                    <h4 class="text-center">Edit Admin Profile</h4>
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                <h1> DARF DETAILS </h1>
                                <div class="form-group">
                                    <label ><B>NAME: </B></label>
                                    <input type="text" class="form-control" value="<?php echo $name; ?>"  name="name" >
                                   <?php echo $nameErr; ?>
                                </div>

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


<div class="input-field">
    <label for=""><b>DEALER:</b></label>
    <select id="dealer" class="form-control" name="dealer" placeholder="" required>
        <?php
        $dealerOptions = array(
            "Ford Alabang",
            "Ford Sta. Rosa",
            "Ford Cavite",
            "Ford Laguna",
            "Ford Naga",
            "Ford Calamba",
            "Ford Batangas"
        );

        echo '<option value="" ' . ($dealer == '' ? 'selected' : '') . '></option>'; // Blank option if no dealer is selected

        foreach ($dealerOptions as $option) {
            if ($dealer === $option) {
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
                                    <label ><B>EMAIL: </B></label>
                                    <input type="text" class="form-control" value="<?php echo $companyemail; ?>"  name="companyemail" >     
                                </div>

                                <div class="input-field">
    <label for=""><B><span style="color: red;">DEPARTMENT:*</span></b></label>
    <select id="department" class="form-control" name="department" placeholder="" required>
        <?php
        $currentDepartment = $department ?? ''; // Assuming $department holds the current department value, or it's an empty string if it's not set
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

                                <div class="form-group">
                                    <label ><B>CONTACT NUMBER:</B></label>
                                    <input type="text" class="form-control" value="<?php echo $contactno; ?>"  name="contactno" >     
                                </div>

                                <div class="form-group">
                                    <label ><B>USERID:</B></label>
                                    <input type="text" class="form-control" value="<?php echo $spsid; ?>"  name="spsid" >     
                                </div>

                                <div class="input-field">
    <label for=""><b>APPLICATION:</b></label>
    <select id="application" class="form-control" name="application" placeholder="" required>
        <?php
        $applicationOptions = array("PANDA", "SERVICE2", "VINCENT", "RSS/OTD/GOALS", "PART NUMBER INQUIRY");
        echo '<option value="" ' . ($application == '' ? 'selected' : '') . '></option>'; // Blank option if no application is selected

        foreach ($applicationOptions as $option) {
            if ($application === $option) {
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
    <label for=""><b>ACTION:</b></label>
    <select id="action" class="form-control" name="action" placeholder="" required>
        <?php
        $actionOptions = array("ADD", "MODIFY", "DELETE");
        echo '<option value="" ' . ($action == '' ? 'selected' : '') . '></option>'; // Blank option if no action is selected

        foreach ($actionOptions as $option) {
            if ($action === $option) {
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
                                    <label ><B>DEALERS:</B></label>
                                    <input type="text" class="form-control" value="<?php echo $dealers; ?>"  name="dealers" >     
                                </div>

                                <div class="input-field">
    <label for=""><b>ROLE:</b></label>
    <select id="role" class="form-control" name="role" placeholder="" required>
        <?php
        $roleOptions = array(
            "ORDERS/CLAIMS",
            "INQUIRY ONLY",
            "WARRANTY ADMIN",
            "DEALER ADMIN",
            "SERVICE EMP",
            "DMAF",
            "DEALER SALES MGMT",
            "DEALER SALES ADMIN",
            "REPORT VIEWER",
            "ADMINISTRATOR"
        );

        echo '<option value="" ' . ($role == '' ? 'selected' : '') . '></option>'; // Blank option if no role is selected

        foreach ($roleOptions as $option) {
            if ($role === $option) {
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
    <label for=""><B><span style="color: red;">STATUS:*</span></b></label>
    <select id="status" class="form-control" name="status" placeholder="" required>
    <?php
        $statusOptions = array("Active", "Inactive");
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

        
                                <br>
                                <br>

                                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group">
                                   <input type="submit" value="Save Changes" class="btn btn-primary w-20 " name="save_changes" >
                                   <input type="submit" value="Generate Darf" class="btn btn-primary w-20 " name="darf" >        
                                    </div>
                                    <div class="input-group">
                                         <a href="manage-darf.php" class="btn btn-primary w-20">Close</a>
                                    </div>
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
if(isset($_POST['darf'])){

        $input = __DIR__ . '/vendor/geekcom/phpjasper/examples/darf.jrxml';
        $input1 = __DIR__ . '/vendor/geekcom/phpjasper/examples/darf.jasper'; 
        $output = __DIR__ . '/vendor/geekcom/phpjasper/examples';    
        $options = [ 
            'format' => ['pdf', 'rtf'],
            'locale' => 'en',
            'params' => [
                'name'=>$name,
                'position'=>$position,
                'dealer'=>$dealer,
                'email'=>$companyemail,
                'department'=>$department,
                'contact_number'=>$contactno,
                'userid'=>$spsid,
                'application'=>$application,
                'action'=>$action,
                'groove_dealers'=>$dealer,
                'role'=>$role
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
    echo "<iframe class='embed-responsive-item' src='http://localhost/aa1/test1/admin/darf.php' allowfullscreen='true'></iframe>";
}
?>
</div>

<?php 
    require_once "include/footer.php";
?>
