<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>NOC</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="css/forms.css?v=<?php echo time(); ?>">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <?php
    // include("config.php");


    ?>
</head>

<body>
    <div class="container" style="max-width: 700px;">

        <!-- <img src="./images/header_elite.png" class="img-fluid mb-3 mt-3 " alt="..."> -->
        <h2 class="h1 text-center" style="color: white;">Application of NOC</h2>
        <form method="post">

            <div class="row">
                <div class="col-lg-12" id="form">
                    <div class="form__group field">

                        <input type="input" class="txt form__field" id="title" name="title" placeholder="Title" required>

                    </div>
                    <div class="form__group field">

                        <input type="input" class="txt form__field" id="des" name="des" placeholder="Description" required>

                    </div>
                    <div class="form__group field">

                        <input type="input" class="txt form__field " id="dairyno" name="dairyno" placeholder="Dairy Number" required>

                    </div>
                    <div id="inputFormRow">
                        <div class="form__group field">
                            <input type="input" name="name_applicant[]" class="txt form__field" placeholder="Name of Applicant" autocomplete="off" required>

                        </div>
                        <div class="form__group field">
                            <input type="email" name="email_applicant[]" class="txt form__field" placeholder="Email" autocomplete="off" required>

                        </div>
                        <div class="form__group field">

                            <select id="role_applicant" class="txt form__field" name="role[]">
                                <option value="" disabled selected hidden>Select your Role</option>
                                <option value="Author">Author</option>
                                <option value="Applicant">Applicant</option>
                                <option value="Both">Both</option>
                            </select>
                        </div>
                        <div class="form__group field">

                            <select id="designation" class="txt form__field" name="designation[]">
                                <option value="" disabled selected hidden>Select your Designation</option>
                                <option value="asst. prof">Asst . Prof</option>
                                <option value="asso. prof">Asso . Prof</option>
                                <option value="student">Student</option>
                            </select>
                        </div>
                        <div class="input-group-append mb-3">
                            <button id="removeRow" type="button" class="btnp" hidden>Remove</button>
                        </div>
                    </div>

                    <div id="newRow"></div>
                    <button id="addRow" type="button" class="btnp btn-sm btn-info">Add Member</button>

                </div>
                <input type="text" id="previewpdf1" name="previewpdf1" style="display:none;">
                <input type="text" id="previewpdf2" name="previewpdf2" style="display: none;">
                <div id="previewForm" style="overflow: scroll; height:450px;">
                    <div style="background-color: white; padding:3%;" id="previewForm1">

                        <p align="right" id="date"><br></p>
                        <p>
                            To<br>
                            The Principal,<br>
                            Shah and Anchor Kutchhi Engineering College,<br>
                            Chembur<br>
                        </p>
                        <p>
                            <b>Subject</b>: Application for permission to carry out the work and request to issue No Objection Certificate to file Intellectual Property .
                        </p>
                        <p>
                            Respected Sir,
                        </p>
                        <p>
                            I/We request you to kindly grant me/us the permission to carry out the work. The details of the work and applicants are mentioned below. I/We also request you to kindly issue the No Objection Certificate (NOC) for registering the below mentioned work to file the Copyright with Shah & Anchor Kutchhi Engineering College. As an applicant I/we also grant the privileges to Shah & Anchor Kutchhi Engineering College to use the work without any permission from the authors or applicants.
                        </p>
                        <p>
                            <b>Details of the work:</b>
                        </p>
                        <p id="titlePreview">
                            <b>Topic Name: </b>topic
                        </p>
                        <p id="descPreview">
                            <b>Description: </b>desc
                        </p>
                        <p id="table">
                        </p>
                        <p id="last"></p>
                    </div>
                    <br>
                    <div style="background-color: white; padding:3%;" id="previewForm2">
                        <p align="right" id="date1"><br></p>
                        <p>
                            To,<br>
                            Registrar of Copyrights,<br>
                            Copyright Office,<br>
                            Department for Promotion of Industry and Internal Trade,<br>
                            Ministry of Commerce and Industry,<br>
                            Boudhik Sampada Bhawan,<br>
                            Plot No. 32, Sector 14, Dwarka,<br>
                            New Delhi-110078<br>
                            Email Address: copyright@nic.in<br>
                            Telephone No.: 011-28032496<br>
                        </p>
                        <p align="center">
                            <b>Subject: No Objection letter</b>
                        </p>
                        <p>
                            Respected Sir / Madam,
                        </p>
                        <p id="l2topic"></p>
                        <p align="right">
                            Dr.Bhavesh Patel<br>
                            Principal
                        </p>
                        <p id="last1"></p>

                    </div>
                </div>
                <br><br>
                <div class="row text-center">
                    <div class="col-sm-6">
                        <input type="checkbox" id="termsChkbx" onchange="isChecked(this,'submit');isChecked(this,'preview');" /> <b style="color:aliceblue;">check onces filled</b>
                    </div>
                </div>
                <div class="row text-center">

                    <div class="col-sm-6"> <button class="btnp btn btn-sm mt-3" name="submit" id="submit" disabled="disabled">Submit</button></div>
                    <div class="col-sm-6"> <button class="btnp btn btn-sm mt-3" name="preview" id="preview" disabled="disabled">Preview</button></div>
                </div>
            </div>

            <?php
            if (isset($_POST['submit'])) {


                $title = $_POST['title'];
                $desc = $_POST['des'];
                $p_name = $_POST['name_applicant'];
                $p_email = $_POST['email_applicant'];
                $dairy_no = $_POST['dairyno'];
                $role = $_POST['role'];
                $designation = $_POST['designation'];

                $sql = "INSERT INTO `ipr_copyrights` ( `title`, `description`, `presenter`, `diary_no`, `status`) VALUES ('$title', '$desc', '$p_name[$i]', '$p_email[$i]', '$dairy_no', 'filed');";
                mysqli_query($db, $sql);

                for ($i = 0; $i < count($p_name); $i++) {
                    if ($p_name[$i] != "" && $p_email[$i] != "" && $role[$i] != "" && $designation[$i] != "") {
                        $sql2 = "INSERT INTO `ipr_cp_applicant` (`name`, `email`, `role`, `designation`) VALUES ('$dairy_no', '$p_name[$i]',  '$p_email[$i]', '$role[$i]', '$designation[$i]');";
                        mysqli_query($db, $sql2);
                    }
                }

                // include('pdf.php');
                // //first pdf
                // $file_name = $dairy_no . '.pdf';
                // $pdf = new Pdf();
                // $html = $_POST['previewpdf1'];
                // $pdf->load_html($html);
                // $pdf->render();
                // $pdf->output();
                // // $pdf->stream("", array("Attachment" => false));
                // // exit(0);
                // $file = $pdf->output();
                // file_put_contents($file_name, $file);

                // $file_name1 = $dairy_no . 'noc.pdf';
                // $pdf1 = new Pdf();
                // $html1 = $_POST['previewpdf2'];
                // $pdf1->load_html($html);
                // $pdf1->render();
                // $pdf1->output();
                // // $pdf->stream("", array("Attachment" => false));
                // // exit(0);
                // $file1 = $pdf1->output();
                // file_put_contents($file_name1, $file1);
            }
            ?>
        </form>
    </div>

    <script>
        function isChecked(chk, sub1) {
            console.log(sub1);
            var myLayer = document.getElementById(sub1);
            if (chk.checked == true) {
                myLayer.disabled = false;
            } else {
                myLayer.disabled = true;
            };
        }
    </script>
    <script type="text/javascript">
        var previewForm = document.getElementById("previewForm");
        // var previewForm1 = document.getElementById("previewForm1");
        var preview = document.getElementById("form");
        var previewbtn = document.getElementById("preview");
        previewForm.setAttribute("hidden", false);
        // previewForm1.setAttribute("hidden", false);


        document.querySelector("#preview").addEventListener("click", function() {
            if (preview.hasAttribute("hidden")) {
                preview.removeAttribute("hidden");
                previewForm.setAttribute("hidden", false);
                // previewForm1.setAttribute("hidden", false);
                previewbtn.innerHTML = 'Preview';
            } else {
                preview.setAttribute("hidden", false);
                previewForm.removeAttribute("hidden");
                // previewForm1.removeAttribute("hidden");
                previewbtn.innerHTML = 'Back';
            }
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();

            var date = document.getElementById("date");
            var date1 = document.getElementById("date1");
            var title = document.getElementById('title');
            var titlePreview = document.getElementById('titlePreview');
            var desc = document.getElementById('des');
            var descPreview = document.getElementById('descPreview');
            var len = document.getElementsByName('name_applicant[]').length;

            var table = document.getElementById('table');
            var last = document.getElementById('last');
            var last1 = document.getElementById('last1');
            var name = document.getElementsByName('name_applicant[]');
            var role = document.getElementsByName('role[]');

            var l2topic = document.getElementById('l2topic');
            l2topic.innerHTML = " On behalf of Shah & Anchor Kutchhi Engineering College, the institute does not have any objection on filing copyright for the work with title <b>" + title.value + "</b> by the following Shah & Anchor Kutchhi Engineering College faculty members and students ";

            today = dd + '/' + mm + '/' + yyyy;
            date.innerHTML = 'Date: ' + today;
            date1.innerHTML = 'Date: ' + today;
            titlePreview.innerHTML = '<b>Title Name</b> : ' + title.value;
            descPreview.innerHTML = '<b>Description</b> : ' + desc.value;

            tablevar = '';
            lastvar = "Thanking You.</br><ol>";
            lastvar1 = "<ol>";
            for (var i = 0; i < len; i++) {
                if (i == 0) {
                    tablevar += "<table><tr align='center'><th >Sr.No</th><th >Name</th><th>Role</th></tr>";
                }
                j = i + 1;
                tablevar += "<tr align='center'><td >" + j + "</td><td >" + name[i].value + "</td><td >" + role[i].value + "</td></tr>";
                lastvar += "<li>" + name[i].value + "</li>";
                lastvar1 += "<li>" + name[i].value + "</li>";
                if (i == len - 1) {
                    tablevar += "<tr align='center'><td >" + (j + 1) + "</td><td >Shah and Anchor Kutchhi Engineering College</td><td>Applicant</td></tr>";
                    lastvar += "</ol>";
                    lastvar1 += "</ol>";
                }
            }
            table.innerHTML = tablevar;
            last.innerHTML = lastvar;
            last1.innerHTML = lastvar1;
            document.getElementById('previewpdf1').value = document.getElementById('previewForm1').innerHTML;
            // window.print('previewpdf1');
            //document.getElementById('previewpdf2').value = document.getElementById('previewForm2').innerHTML;
            // console.log(document.getElementById('previewpdf').value.trim());
        })
        // add row
        let count = 0;
        $("#addRow").click(function() {
            // count++;
            var html = '';

            html += `<div id="inputFormRow">
                        <div class="form__group field">
                            <input type="input" name="name_applicant[]" class="txt form__field" placeholder="Name of Applicant" autocomplete="off">
                            
                        </div>
                        <div class="form__group field">
                            <input type="input" name="email_applicant[]" class="txt form__field" placeholder="Email" autocomplete="off">
                            
                        </div>
                        <div class="form__group field">
                        <select id="role_applicant" class="txt form__field" name="role[]">
                            <option value="" disabled selected hidden>Select your Role</option>
                            <option >Author</option>
                            <option>Applicant</option>
                            <option>Both</option>
                        </select>
                        </div>
                        <div class="form__group field">
                        <select id="designation" class="txt form__field" name="designation[]">
                            <option value="" disabled selected hidden>Select your Designation</option>
                            <option >Asst . Prof</option>
                            <option>Asso . Prof</option>
                            <option>Student</option>
                        </select>
                        </div>
                        <div class="input-group-append mb-3">                
                            <button id="removeRow" type="button" class="btnp" >Remove</button>
                        </div>`

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function() {
            $(this).closest('#inputFormRow').remove();
            count--;
        });
    </script>
</body>

</html>