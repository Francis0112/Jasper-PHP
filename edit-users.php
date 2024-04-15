<?php
    require_once __DIR__ . '/vendor/autoload.php';
?>

<?php 
    require_once "include/header.php";
?>


<?php  


         $id = $_GET["id"];
        require_once "../connection.php";

        $sql = "SELECT * FROM employee WHERE id = $id ";
        $result = mysqli_query($conn , $sql);

        if(mysqli_num_rows($result) > 0 ){
        
            while($rows = mysqli_fetch_assoc($result) ){
                $employeeid = $rows["employeeid"];
                $name = $rows["name"];
                $contact_no = $rows["contactno"];
                $position = $rows["position"];
                $companyemail = $rows["companyemail"];
                $companyemailpass = $rows["companyemailpass"];
                $starsid = $rows["starsid"];
                $spsid = $rows["spsid"];
                $spspassword = $rows["spspassword"];
                $device = $rows["device"];
                $eraid = $rows["eraid"];
                $erapass = $rows["erapass"];
                $branch = $rows["branch"];
                $dealercode = $rows["dealercode"];
                $superiorstarsid = $rows["superiorstarsid"];
                $superiorname = $rows["superiorname"];
                $superiornumber = $rows["superiornumber"];
                $superioremail = $rows["superioremail"];

                
            }
        }

        $nameErr = $companyemailErr = "";

      

        if( $_SERVER["REQUEST_METHOD"] == "POST" ){

            if( empty($_REQUEST["employeeid"]) ){
                $employeeid ="";
            }else {
                $employeeid = $_REQUEST["employeeid"];
            }


            if( empty($_REQUEST["position"]) ){
                $position = "";
            }else {
                $position = $_REQUEST["position"];
            }

            if( empty($_REQUEST["spsid"]) ){
                $spsid = "";
            }else {
                $spsid = $_REQUEST["spsid"];
            }
 
            if( empty($_REQUEST["spspassword"]) ){
                $spspassword = "";
            }else {
                $spspassword = $_REQUEST["spspassword"];
            }

            if( empty($_REQUEST["starsid"]) ){
                $starsid = "";
            }else {
                $starsid = $_REQUEST["starsid"];
            }

            if( empty($_REQUEST["name"]) ){
                $nameErr = "<p style='color:red'> * Name is required</p>";
                $name = "";
            }else {
                $name = $_REQUEST["name"];
            }

            if( empty($_REQUEST["companyemailpass"]) ){
                $companyemailpass = "";
            }else {
                $companyemailpass = $_REQUEST["companyemailpass"];
            }

            if( empty($_REQUEST["device"]) ){
                $device = "";
            }else {
                $device = $_REQUEST["device"];
            }

            if( empty($_REQUEST["datecreated"]) ){
                $datecreated = "";
            }else {
                $datecreated = $_REQUEST["datecreated"];
            }

            if( empty($_REQUEST["eraid"]) ){
                $eraid = "";
            }else {
                $eraid = $_REQUEST["eraid"];
            }

            if( empty($_REQUEST["erapass"]) ){
                $erapass = "";
            }else {
                $erapass = $_REQUEST["erapass"];
            }

            if( empty($_REQUEST["branch"]) ){
                $branch = "";
            }else {
                $branch = $_REQUEST["branch"];
            }

            if( empty($_REQUEST["superiorstarsid"]) ){
                $superiorstarsid = "";
            }else {
                $superiorstarsid = $_REQUEST["superiorstarsid"];
            }

            if( empty($_REQUEST["superiorname"]) ){
                $superiorname = "";
            }else {
                $superiorname = $_REQUEST["superiorname"];
            }

            if( empty($_REQUEST["superiornumber"]) ){
                $superiornumber = "";
            }else {
                $superiornumber = $_REQUEST["superiornumber"];
            }

            if( empty($_REQUEST["superioremail"]) ){
                $superioremail = "";
            }else {
                $superioremail = $_REQUEST["superioremail"];
            }

            if( empty($_REQUEST["companyemail"]) ){
                $companyemailErr = "<p style='color:red'> * Password is required</p> ";
            }else{
                $companyemail = $_REQUEST["companyemail"];
            }
                // database connection
                // require_once "../connection.php";

                $sql_select_query = "SELECT companyemail FROM employee WHERE companyemail = '$companyemail' ";
                $r = mysqli_query($conn , $sql_select_query);

                if( mysqli_num_rows($r) > 0 ){
                    $companyemailErr = "<p style='color:red'> * Email Already Register</p>";
                } else{
                   

                    $sql = "UPDATE employee SET name = '$name', companyemail = '$companyemail', companyemailpass = '$companyemailpass', employeeid= '$employeeid', position = '$position', starsid = '$starsid', spsid = '$spsid', spspassword = '$spspassword', device = '$device', datecreated = '$datecreated', eraid = '$eraid', erapass = '$erapass', branch = '$branch', superiorstarsid = '$superiorstarsid', superiorname = '$superiorname', superiornumber = '$superiornumber', superioremail = '$superioremail' WHERE id = $_GET[id] ";
                    $result = mysqli_query($conn , $sql);
                    if($result){
                        echo "<script>
                        $(document).ready( function(){
                            $('#showModal').modal('show');
                            $('#modalHead').hide();
                            $('#linkBtn').attr('href', 'manage-users.php');
                            $('#linkBtn').text('View Users');
                            $('#addMsg').text('User Edit Successfully!');
                            $('#closeBtn').text('Edit Again?');
                        })
                     </script>
                     ";
                    }
                    
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
                                    <h4 class="text-center">Edit User profile</h4>
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                                <h1> USER DETAILS </h1>

                                <div class="form-group">
                                    <label ><B>EMPLOYEE ID:</B></label>
                                    <input type="number" class="form-control" value="<?php echo $employeeid; ?>"  name="employeeid" required>     
                                </div>

                               

                                <div class="form-group">
                                    <label ><B>FULL NAME: </B></label>
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
                                <div class="form-group">
                                    <label ><B>CONTACT NO.: </B></label>
                                    <input type="text" class="form-control" value="<?php echo $contact_no; ?>"  name="contact_no" >     
                                </div>

                                <div class="form-group">
                                    <label ><B>COMPANY EMAIL: </B></label>
                                    <input type="text" class="form-control" value="<?php echo $companyemail; ?>"  name="companyemail" >     
                                </div>

                                <div class="form-group">
                                    <label ><B>COMPANY EMAIL PASSWORD: </B></label>
                                    <input type="text" class="form-control" value="<?php echo $companyemailpass; ?>"  name="companyemailpass" >     
                                </div>

                                <div class="form-group">
                                    <label ><B>STARS ID: </B></label>
                                    <input type="text" class="form-control" value="<?php echo $starsid; ?>"  name="starsid" >     
                                </div>

                                <div class="form-group">
                                    <label ><B>SPS ID: </B></label>
                                    <input type="text" class="form-control" value="<?php echo $spsid; ?>"  name="spsid" >     
                                </div>

                                <div class="form-group">
                                    <label ><B>SPS ID PASSWORD: </B></label>
                                    <input type="text" class="form-control" value="<?php echo $spspassword; ?>"  name="spspassword" >     
                                </div>

                                <div class="form-group">
                                    <label ><B>ERA ID: </B></label>
                                    <input type="text" class="form-control" value="<?php echo $eraid; ?>"  name="eraid" >     
                                </div>

                                <div class="form-group">
                                    <label ><B>ERA PASSWORD: </B></label>
                                    <input type="text" class="form-control" value="<?php echo $erapass; ?>"  name="erapass" >     
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
    <label for=""><b><span style="color: red;">DEALER CODE:*</span></b></label>
    <select id="dealercode" class="form-control" name="dealercode" placeholder="" required>
        <?php
        $dealercodeOptions = array(
            "56345",
            "56372",
            "56399",
            "56408",
            "56457",
            "56459",
            "56464"
        );

        echo '<option value="" ' . ($dealercode == '' ? 'selected' : '') . '></option>'; // Blank option if no dealercode is selected

        foreach ($dealercodeOptions as $option) {
            if ($dealercode === $option) {
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
                                    <label ><B>DEVICE: </B></label>
                                    <input type="text" class="form-control" value="<?php echo $device; ?>"  name="device" >     
                                </div>

                                <div class="form-group">
                                    <label ><B>DATE CREATED: </B></label>
                                    <input type="date" class="form-control" value="<?php echo $datecreated; ?>"  name="datecreated" >     
                                </div>

                                <div class="input-field">
    <label for=""><b>PARENTS STARS ID (SC's SUPERIOR):</b></label>
    <select id="superiorstarsid" class="form-control" name="superiorstarsid" placeholder="">
        <?php
        $superiorStarsIdOptions = array(
            "002452439",
            "002839713",
            "002452439",
            "001996250",
            "002956286",
            "002243810",
            "001166574"
        );

        echo '<option value="" ' . ($superiorstarsid == '' ? 'selected' : '') . '></option>'; // Blank option if no superior STARS ID is selected

        foreach ($superiorStarsIdOptions as $option) {
            if ($superiorstarsid === $option) {
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
    <label for=""><b>PARENTS NAME (SC's SUPERIOR):</b></label>
    <select id="superiorname" class="form-control" name="superiorname" placeholder="">
        <?php
        $superiorNameOptions = array(
            "Glenn Magpantay",
            "Julie Ting",
            "Marko Venancio Rivera",
            "Vanessa Mendoza",
            "Penafrancia Ayo",
            "Karylline Acena",
            "Harlene De Borja"
        );

        echo '<option value="" ' . ($superiorname == '' ? 'selected' : '') . '></option>'; // Blank option if no superior name is selected

        foreach ($superiorNameOptions as $option) {
            if ($superiorname === $option) {
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
    <label for=""><b>PARENTS MOBILE NUMBER (SC's SUPERIOR):</b></label>
    <select id="superiornumber" class="form-control" name="superiornumber" placeholder="">
        <?php
        $superiorNumberOptions = array(
            "09176283389",
            "09178508822",
            "09176283389",
            "09178929298",
            "09173125988",
            "09273903225",
            "09175002579"
        );

        echo '<option value="" ' . ($superiornumber == '' ? 'selected' : '') . '></option>'; // Blank option if no superior number is selected

        foreach ($superiorNumberOptions as $option) {
            if ($superiornumber === $option) {
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
    <label for=""><b>PARENTS EMAIL ADDRESS (SC's SUPERIOR):</b></label>
    <select id="superioremail" class="form-control" name="superioremail" placeholder="">
        <?php
        $superiorEmailOptions = array(
            "glenn.s.magpantay@dearbornmotors.com",
            "julie.m.ting@dearbornmotors.com",
            "marko.d.rivera@dearbornmotors.com",
            "vanessa.m.banares@dearbornmotors.com",
            "penafrancia.t.ayo@dearbornmotors.com",
            "karylline.b.acedo@dearbornmotors.com",
            "harley.e.deborja@dearbornmotors.com"
        );

        echo '<option value="" ' . ($superioremail == '' ? 'selected' : '') . '></option>'; // Blank option if no superior email address is selected

        foreach ($superiorEmailOptions as $option) {
            if ($superioremail === $option) {
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
                               
                                <br>

                                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group">
                                   <input type="submit" value="Save Changes" class="btn btn-primary w-20 " name="save_changes" >
                                   <input type="submit" value="Generate UAA" target="_blank" class="btn btn-primary w-20 " name="borks">
                                   <input type="submit" value="Generate LMS" target="_blank" class="btn btn-primary w-20 " name="lms">         
                                    </div>
                                    <div class="input-group">
                                         <a href="manage-users.php" class="btn btn-primary w-20">Close</a>
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
if(isset($_POST['borks'])){

    if(str_contains($branch, 'Ford')){
        $input = __DIR__ . '/vendor/geekcom/phpjasper/examples/UAA-DMCI.jrxml';
        $input1 = __DIR__ . '/vendor/geekcom/phpjasper/examples/UAA-DMCI.jasper'; 
        $output = __DIR__ . '/vendor/geekcom/phpjasper/examples';    
        $options = [ 
            'format' => ['pdf', 'rtf'],
            'locale' => 'en',
            'params' => [
                'name'=>$name,
                'emp_no'=>$employeeid,
                'branch'=>$branch,
                'position'=>$position,
                'email'=>$companyemail,
                'email_password'=>$companyemailpass,
                'eric_id'=>$companyemail,
                'eric_password'=>'@dm1n',
                'stars_id'=>$starsid,
                'sps_id'=>$spsid
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
    echo "<iframe class='embed-responsive-item' src='http://localhost/aa1/test1/admin/uaa-dmci.php' allowfullscreen='true'></iframe>";
    }
    elseif(str_contains($branch, 'MMC')){
        $input = __DIR__ . '/vendor/geekcom/phpjasper/examples/UAA-MMC.jrxml';
        $input1 = __DIR__ . '/vendor/geekcom/phpjasper/examples/UAA-MMC.jasper'; 
        $output = __DIR__ . '/vendor/geekcom/phpjasper/examples';    
        $options = [ 
            'format' => ['pdf', 'rtf'],
            'locale' => 'en',
            'params' => [
                'name'=>$name,
                'emp_no'=>$employeeid,
                'branch'=>$branch,
                'position'=>$position,
                'email'=>$companyemail,
                'email_password'=>$companyemailpass,
                'eric_id'=>$companyemail,
                'eric_password'=>'@dm1n'
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
    echo "<iframe class='embed-responsive-item' src='http://localhost/aa1/test1/admin/uaa-mmc.php' allowfullscreen='true'></iframe>";
    }elseif(str_contains($branch, 'Azi')){
        $input = __DIR__ . '/vendor/geekcom/phpjasper/examples/UAA-AZZI.jrxml';
        $input1 = __DIR__ . '/vendor/geekcom/phpjasper/examples/UAA-AZZI.jasper'; 
        $output = __DIR__ . '/vendor/geekcom/phpjasper/examples';
        $pdf_1 = __DIR__ . '/vendor/geekcom/phpjasper/examples/UAA-AZZI.pdf';    
        $options = [ 
            'format' => ['pdf', 'rtf'],
            'locale' => 'en',
            'params' => [
                'name'=>$name,
                'emp_no'=>$employeeid,
                'branch'=>$branch,
                'position'=>$position,
                'email'=>$companyemail,
                'email_password'=>$companyemailpass,
                'era_id'=>$eraid,
                'era_password'=>$erapass
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
    echo "<iframe class='embed-responsive-item' src='http://localhost/aa1/test1/admin/uaa-azi.php' allowfullscreen='true'></iframe>";
    }
}
?>
<?php

if(isset($_POST['lms'])){

    if(str_contains($branch, 'Ford')){
        $input = __DIR__ . '/vendor/geekcom/phpjasper/examples/lms.jrxml';
        $input1 = __DIR__ . '/vendor/geekcom/phpjasper/examples/lms.jasper'; 
        $output = __DIR__ . '/vendor/geekcom/phpjasper/examples';    
        $options = [ 
            'format' => ['pdf', 'rtf'],
            'locale' => 'en',
            'params' => [
                'fullname'=>$name,
                'starsid'=>$starsid,
                'email'=>$companyemail,
                'mobile_no'=>$contact_no,
                'mobile_type'=>$device,
                'role_id'=>$position,
                'dealer_name'=>$branch,
                'dealer_code'=>$dealercode,
                'parent_stars_id'=>$superiorstarsid,
                'parent_name'=>$superiorname,
                'parent_mobile_no'=>$superiornumber,
                'parent_email'=>$superioremail
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
    echo "<iframe class='embed-responsive-item' src='http://localhost/aa1/test1/admin/lms.php' allowfullscreen='true'></iframe>";
    }
    else 
    {
        echo "<script>alert('Invalid.')</script>";
    }
}
?>
<?php 
    require_once "include/footer.php";
?>
</div>


