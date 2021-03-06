<?php
include "admin\inc\header.php";
require $_SERVER['DOCUMENT_ROOT'].'/accountOpenForm/class/model.php';
if ( isset( $_GET['id'] ) && !empty( $_GET['id'] ) ){
    //debugger($_GET, true);
    $id = (int)$_GET['id'];
    $result = mysqli_query($conn,"SELECT form.id, firstsection.accountType, firstsection.minor, firstsection.meroShareService, firstsection.maritalStatus, beneficialowner.title, beneficialowner.firstName, beneficialowner.middleName, beneficialowner.lastName, beneficialowner.fathersName, beneficialowner.grandFathersName, beneficialowner.mothersName, correspondenceaddress.correspondence_province, correspondenceaddress.correspondence_zone, correspondenceaddress.correspondence_district, correspondenceaddress.correspondence_vdc, correspondenceaddress.correspondence_tole, correspondenceaddress.correspondence_ward, correspondenceaddress.correspondence_blockno, correspondenceaddress.correspondence_phoneno, correspondenceaddress.correspondence_mobileno, correspondenceaddress.correspondence_email, permanentaddress.permanent_province, permanentaddress.permanent_zone, permanentaddress.permanent_district, permanentaddress.permanent_vdc, permanentaddress.permanent_tole, permanentaddress.permanent_ward, permanentaddress.permanent_blockno, permanentAddress.permanent_phoneno, permanentAddress.permanent_mobileno, permanentAddress.permanent_email, certificatedetails.citizenshipNo, certificatedetails.citizenshipIssueDistrict, certificatedetails.citizenshipIssueDateBS, certificatedetails.citizenshipIssueDateAD, certificatedetails.DOBBS, certificatedetails.DOBAD, certificatedetails.gender, certificatedetails.panno, bankdetails.bankAccountType, bankdetails.bank, bankdetails.branch, bankdetails.bankAccountno, occupationdetails.occupationType, occupationdetails.businessType, occupationdetails.organizationName, occupationdetails.organizationAddress, occupationdetails.designation, occupationdetails.income, nomineedetails.nominee, nomineedetails.nomineeName, nomineedetails.nomineeFathersName, nomineedetails.nomineeRelationship, nomineedetails.referenceDocument, nomineedetails.nomineeDoc, nomineedetails.placeOfIssue, nomineedetails.nomineeIssueYear, nomineedetails.nomineeAge, nomineedetails.nominee_zone, nomineedetails.nominee_district, nomineedetails.nominee_phoneno, nomineedetails.nominee_mobileno, nomineedetails.nominee_email, nomineedetails.nominee_panno, nomineedetails.nominee_correspondenceAddress, nomineedetails.nomineePhoto, nomineedetails.nomineeSignature, nomineedetails.nomineeDocumentFront, nomineedetails.nomineeDocumentBack, otherdocuments.applicantPhoto, otherdocuments.applicantCitizenshipFrontPhoto, otherdocuments.applicantCitizenshipBackPhoto, otherdocuments.applicantThumbPhoto, otherdocuments.applicantLocationMapPhoto, otherdocuments.applicantSignaturePhoto, guardiandetails.guardianFirstName, guardiandetails.guardianMiddleName, guardiandetails.guardianLastName, guardiandetails.guardianRelation, guardiandetails.guardianFatherName, guardiandetails.guardianGrandFatherName, guardiandetails.guardianSpouseName, guardiandetails.guardianCitizenshipNo, guardiandetails.guardianAddress, guardiandetails.guardian_province, guardiandetails.guardian_zone, guardiandetails.guardian_district, guardiandetails.guardian_vdc, guardiandetails.guardian_blockNo, guardiandetails.guardian_ward, guardiandetails.guardian_phoneno, guardiandetails.guardian_mobileno, guardiandetails.guardian_panno, guardiandetails.guardian_email, guardiandetails.guardian_citizenshipIssueDistrict, guardiandetails.guardian_citizenshipIssueDateBS, guardiandetails.guardian_citizenshipIssueDateAD, guardiandetails.guardian_DOBBS, guardiandetails.guardian_DOBAD, guardiandetails.guardianPhoto, guardiandetails.guardianSignature, guardiandetails.guardianCitizenshipFront, guardiandetails.guardianCitizenshipBack, guardiandetails.guardianProof FROM (((((((((form INNER JOIN firstsection ON form.id = firstsection.firstsection_id) INNER JOIN beneficialowner on form.id = beneficialowner.beneficialowner_id) INNER JOIN correspondenceaddress on form.id = correspondenceaddress.id) INNER JOIN permanentAddress on form.id = permanentaddress.id) INNER JOIN certificatedetails on form.id = certificatedetails.id) INNER JOIN bankdetails on form.id = bankdetails.id) INNER JOIN occupationdetails on form.id = occupationdetails.id) INNER JOIN nomineedetails on form.id = nomineedetails.id) INNER JOIN otherdocuments on form.id = otherdocuments.id) INNER JOIN guardiandetails on form.id = guardiandetails.id where form.id = $id;") or die( mysqli_error($conn));
    $row = mysqli_fetch_array($result);
    // echo $row["id"];
    // echo $row["firstsection"];
?>

<div class="container my-2">
    <div class="form_heading">
        <h3>Account Detail </h3>
        <button class="btn btn-success my-1" onclick="window.print();" id="print-btn">Print</button>
    </div>

    <p>Type of Account: <?php echo $row["accountType"]; ?></p>
    <p>Minor : <?php echo $row["minor"]; ?></p>
    <p>Mero Share Service : <?php echo $row["meroShareService"]; ?></p>
    <p>Maritial Status: <?php echo $row["maritalStatus"]; ?></p>

    <h4>Beneficial Owner</h4>
    <p>Title: 
        <?php 
            if($row["title"] == 1){
                echo "Mr.";
            } else if ($row["title"] == 2){
                echo "Mrs.";
            } else if ($row["title"] == 3){
                echo "Miss.";
            } else if ($row["title"] == 4) {
                echo "Minor.";
            }
        ?>
    </p>
    <p>First Name: <?php echo $row["firstName"]; ?></p>
    <p>Middle Name: <?php echo $row["middleName"]; ?></p>
    <p>Last Name: <?php echo $row["lastName"]; ?></p>
    <p>Father's Name: <?php echo $row["fathersName"]; ?></p>
    <p>Grandfather's Name: <?php echo $row["grandFathersName"]; ?></p>
    <p>Mother's Name: <?php echo $row["mothersName"]; ?></p>

    <h4>Correspondence Address</h4>
    <p>Province: <?php echo $row["correspondence_province"]; ?></p>
    <p>Zone: <?php echo $row["correspondence_zone"]; ?></p>
    <p>District: <?php echo $row["correspondence_district"]; ?></p>
    <p>VDC: <?php echo $row["correspondence_vdc"]; ?></p>
    <p>Tole: <?php echo $row["correspondence_tole"]; ?></p>
    <p>Ward: <?php echo $row["correspondence_ward"]; ?></p>
    <p>Block no: <?php echo $row["correspondence_blockno"]; ?></p>
    <p>Phone no: <?php echo $row["correspondence_phoneno"]; ?></p>
    <p>Mobile no: <?php echo $row["correspondence_mobileno"]; ?></p>
    <p>Email: <?php echo $row["correspondence_email"]; ?></p>

    <h4>Permanent Address</h4>
    <p>Province: <?php echo $row["permanent_province"]; ?></p>
    <p>Zone: <?php echo $row["permanent_zone"]; ?></p>
    <p>District: <?php echo $row["permanent_district"]; ?></p>
    <p>VDC: <?php echo $row["permanent_vdc"]; ?></p>
    <p>Tole: <?php echo $row["permanent_tole"]; ?></p>
    <p>Ward: <?php echo $row["permanent_ward"]; ?></p>
    <p>Block no: <?php echo $row["permanent_blockno"]; ?></p>
    <p>Phone no: <?php echo $row["permanent_phoneno"]; ?></p>
    <p>Mobile no: <?php echo $row["permanent_mobileno"]; ?></p>
    <p>Email: <?php echo $row["permanent_email"]; ?></p>

    <h4>Certificate Details</h4>
    <p>citizenshipNo: <?php echo $row["citizenshipNo"]; ?></p>
    <p>citizenshipIssueDistrict: <?php echo $row["citizenshipIssueDistrict"]; ?></p>
    <p>CitizenshipIssueDateBS: <?php echo $row["citizenshipIssueDateBS"]; ?></p>
    <p>CitizenshipIssueDateAD: <?php echo $row["citizenshipIssueDateAD"]; ?></p>
    <p>DOBBS: <?php echo $row["DOBBS"]; ?></p>
    <p>DOBAD: <?php echo $row["DOBAD"]; ?></p>
    <p>gender: 
        <?php 
            if($row["gender"] == 1){
                echo "Male";
            } else if ($row["gender"] == 2){
                echo "Female";
            } else if ($row["gender"] == 3) {
                echo "Others";
            }
        ?>
    </p>
    <p>panno: <?php echo $row["panno"]; ?></p>

    <h4>Bank Details</h4>
    <p>Bank Account Type: 
        <?php 
            if($row["bankAccountType"] == 1){
                echo "Saving Account";
            } else if ($row["bankAccountType"] == 2) {
                echo "Current Account";
            }
        ?>
    </p>
    <p>bankAccountno: <?php echo $row["bankAccountno"]; ?></p>
    <p>bank: <?php echo $row["bank"]; ?></p>
    <p>branch: <?php echo $row["branch"]; ?></p>

    <h4>Occupation Details</h4>
    <p>Occupation Type:
        <?php 
            if($row["occupationType"] == 1){
                echo "Public Sector";
            } else if ($row["occupationType"] == 2){
                echo "Private Sector";
            } else if ($row["occupationType"] == 3){
                echo "Business person";
            } else if ($row["occupationType"] == 4){
                echo "Student";
            } else if ($row["occupationType"] == 5){
                echo "Farmer";
            } else if ($row["occupationType"] == 6){
                echo "Retired";
            } else if ($row["occupationType"] == 7){
                echo "Housewife";
            } else if ($row["occupationType"] == 8){
                echo "Government Service";
            } else if ($row["occupationType"] == 9){
                echo "Professional";
            } else if ($row["occupationType"] == 10){
                echo "Student";
            }  else if ($row["occupationType"] == 11){
                echo "Service";
            } else if ($row["occupationType"] == 12){
                echo "Others";
            }
        ?>
    </p>
    <p>Business Type: 
        <?php 
            if($row["businessType"] == 1){
                echo "Manufacturing";
            } else if ($row["businessType"] == 2) {
                echo "Services";
            } 
        ?>
    </p>
    <p>organizationName: <?php echo $row["organizationName"]; ?></p>
    <p>organizationAddress: <?php echo $row["organizationAddress"]; ?></p>
    <p>designation: <?php echo $row["designation"]; ?></p>
    <p>income: <?php echo $row["income"]; ?></p>

    <h4>Other Documents</h4>
    <p>Applicant Photo: 
        <?php
            $imgDirectory = 'upload/applicantPhoto/'.$row["applicantPhoto"];
            echo "<img src='$imgDirectory' width='200'> ";
        ?>
    </p>
   <?php
    if(!$row["applicantCitizenshipBackPhoto"]){
        $birthOrCitizen = "Applicant Birth Certificate Photo:";
    } else {
        $birthOrCitizen = "Applicant Citizenship Front Photo:";
    }   
    echo "<p>$birthOrCitizen";
    $imgDirectory = 'upload/applicantCitizenshipFrontPhoto/'.$row["applicantCitizenshipFrontPhoto"];
    echo "<img src='$imgDirectory' width='200'></p>";
    if($row["applicantCitizenshipBackPhoto"]){
        echo "<p>Applicant Citizenship Back Photo:";
        $imgDirectory = 'upload/applicantCitizenshipBackPhoto/'.$row["applicantCitizenshipBackPhoto"];
        echo "<img src='$imgDirectory' width='200'></p>";
    }
    ?>
    <p>Applicant Thumb Photo: 
        <?php
            $imgDirectory = 'upload/applicantThumbPhoto/'.$row["applicantThumbPhoto"];
            echo "<img src='$imgDirectory' width='200'> ";
        ?>
    </p>
    <p>Applicant Location Map Photo: 
        <?php
            $imgDirectory = 'upload/applicantLocationMapPhoto/'.$row["applicantLocationMapPhoto"];
            echo "<img src='$imgDirectory' width='200'> ";
        ?>
    </p>
    <p>Applicant Signature Photo: 
        <?php
            $imgDirectory = 'upload/applicantSignaturePhoto/'.$row["applicantSignaturePhoto"];
            echo "<img src='$imgDirectory' width='200'> ";
        ?>
    </p>

    <h4>Nominee Details</h4>
    <p>nominee: <?php echo $row["nominee"]; ?></p>
    <p>nomineeName: <?php echo $row["nomineeName"]; ?></p>
    <p>nomineeFathersName: <?php echo $row["nomineeFathersName"]; ?></p>
    <p>nomineeRelationship: <?php echo $row["nomineeRelationship"]; ?></p>
    <p>referenceDocument: 
        <?php 
            if($row["referenceDocument"] == 1){
                echo "Citizenship";
            } else if ($row["referenceDocument"] == 2) {
                echo "Birth Certificate";
            } 
        ?>
    </p>
    <p>placeOfIssue: <?php echo $row["placeOfIssue"]; ?></p>
    <p>nomineeIssueYear: <?php echo $row["nomineeIssueYear"]; ?></p>
    <p>nominee_zone: <?php echo $row["nominee_zone"]; ?></p>
    <p>nominee_district: <?php echo $row["nominee_district"]; ?></p>
    <p>nominee_phoneno: <?php echo $row["nominee_phoneno"]; ?></p>
    <p>nominee_mobileno: <?php echo $row["nominee_mobileno"]; ?></p>
    <p>nominee_email: <?php echo $row["nominee_email"]; ?></p>
    <p>nominee_correspondenceAddress: <?php echo $row["nominee_correspondenceAddress"]; ?></p>
    <p>Nominee Photo: 
        <?php 
            if($row["nomineePhoto"]){
                $imgDirectory = 'upload/nomineePhoto/'.$row["nomineePhoto"];
                echo "<img src='$imgDirectory' width='200'> ";
            }
        ?>
    </p>
    <p>Nominee Signature: 
        <?php 
            if($row["nomineeSignature"]){
                $imgDirectory = 'upload/nomineeSignature/'.$row["nomineeSignature"];
                echo "<img src='$imgDirectory' width='200'> ";
            }
        ?>
    </p>
    <p>Nominee Document Front: 
        <?php 
            if($row["nomineeDocumentFront"]){
                $imgDirectory = 'upload/nomineeDocumentFront/'.$row["nomineeDocumentFront"];
                echo "<img src='$imgDirectory' width='200'> ";
            }
        ?>
    </p>
    <p>Nominee Document Back: 
        <?php 
            if($row["nomineeDocumentBack"]){
                $imgDirectory = 'upload/nomineeDocumentBack/'.$row["nomineeDocumentBack"];
                echo "<img src='$imgDirectory' width='200'> ";
            }
        ?>
    </p>

    <h4>Guardian Details</h4>
    <p>guardianFirstName: <?php echo $row["guardianFirstName"]; ?></p>
    <p>guardianMiddleName: <?php echo $row["guardianMiddleName"]; ?></p>
    <p>guardianLastName: <?php echo $row["guardianLastName"]; ?></p>
    <p>guardianRelation: <?php echo $row["guardianRelation"]; ?></p>
    <p>guardianFatherName: <?php echo $row["guardianFatherName"]; ?></p>
    <p>guardianGrandFatherName: <?php echo $row["guardianGrandFatherName"]; ?></p>
    <p>guardianSpouseName: <?php echo $row["guardianSpouseName"]; ?></p>
    <p>guardianCitizenshipNo: <?php echo $row["guardianCitizenshipNo"]; ?></p>
    <p>guardianAddress: <?php echo $row["guardianAddress"]; ?></p>
    <p>guardian_province: <?php echo $row["guardian_province"]; ?></p>
    <p>guardian_zone: <?php echo $row["guardian_zone"]; ?></p>
    <p>guardian_district: <?php echo $row["guardian_district"]; ?></p>
    <p>guardian_vdc: <?php echo $row["guardian_vdc"]; ?></p>
    <p>guardian_blockNo: <?php echo $row["guardian_blockNo"]; ?></p>
    <p>guardian_ward: <?php echo $row["guardian_ward"]; ?></p>
    <p>guardian_phoneno: <?php echo $row["guardian_phoneno"]; ?></p>
    <p>guardian_mobileno: <?php echo $row["guardian_mobileno"]; ?></p>
    <p>guardian_panno: <?php echo $row["guardian_panno"]; ?></p>
    <p>guardian_email: <?php echo $row["guardian_email"]; ?></p>
    <p>guardian_citizenshipIssueDistrict: <?php echo $row["guardian_citizenshipIssueDistrict"]; ?></p>
    <p>guardian_citizenshipIssueDateBS: <?php echo $row["guardian_citizenshipIssueDateBS"]; ?></p>
    <p>guardian_citizenshipIssueDateAD: <?php echo $row["guardian_citizenshipIssueDateAD"]; ?></p>
    <p>guardian_DOBBS: <?php echo $row["guardian_DOBBS"]; ?></p>
    <p>guardian_DOBAD: <?php echo $row["guardian_DOBAD"]; ?></p>
    <p>Guardian Photo: 
        <?php 
            if($row["guardianPhoto"]){
                $imgDirectory = 'upload/guardianPhoto/'.$row["guardianPhoto"];
                echo "<img src='$imgDirectory' width='200'> ";
            }
        ?>
    </p>
    <p>Guardian Signature: 
        <?php 
            if($row["guardianSignature"]){
                $imgDirectory = 'upload/guardianSignature/'.$row["guardianSignature"];
                echo "<img src='$imgDirectory' width='200'> ";
            }
        ?>
    </p>
    <p>Guardian Citizenship Front: 
        <?php 
            if($row["guardianCitizenshipFront"]){
                $imgDirectory = 'upload/guardianCitizenshipFront/'.$row["guardianCitizenshipFront"];
                echo "<img src='$imgDirectory' width='200'> ";
            }
        ?>
    </p>
    <p>Guardian Citizenship Back: 
        <?php 
            if($row["guardianCitizenshipBack"]){
                $imgDirectory = 'upload/guardianCitizenshipBack/'.$row["guardianCitizenshipBack"];
                echo "<img src='$imgDirectory' width='200'> ";
            }
        ?>
    </p>
    <p>Guardian Proof: 
        <?php 
            if($row["guardianProof"]){
                $imgDirectory = 'upload/guardianProof/'.$row["guardianProof"];
                echo "<img src='$imgDirectory' width='200'> ";
            }
        ?>
    </p>
</div>
<?php
}
?>
<?php
include "admin/inc/footer.php";
?>