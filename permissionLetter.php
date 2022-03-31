<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Boostrap-4.6.0-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./css/permissionLetter.css?v=<?php echo time(); ?>">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js" integrity="sha512-csNcFYJniKjJxRWRV1R7fvnXrycHP6qDR21mgz1ZP55xY5d+aHLfo9/FcGDQLfn2IfngbAHd8LdfsagcCqgTcQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php
    require_once "requirements.php";
    // // Fetching Access Details
    // $access = NULL;
    // if (isset($_SESSION["role_id"])) {
    //     $role_id = $_SESSION["role_id"];
    //     $access = getValue("SELECT * FROM `csi_role` WHERE `csi_role`.`id`=$role_id");
    // }
    // if(!isset($access) || $access['permission_letter']==0){
    //     header("location:../index.php");
    // }

    if ($_SERVER['REQUEST_METHOD'] === "GET") {
        if (isset($_GET['event_id'])) {
            $event_id = $_GET['event_id'];
            $sql = "SELECT * FROM `ipr_events` WHERE `id`=" . $event_id;
            $query = mysqli_query($conn, $sql);
            try {
                if ($query) {
                    if (!mysqli_num_rows($query)) {
                        RedirectAfterMsg("Event Not Found", "event_management.php");
                        // die();
                    }
                    $row = mysqli_fetch_assoc($query);
                    // echo var_dump($row);
                    // start year and end year for acedemic year
                    $startyear = date("Y", strtotime($row['from_date']));
                    $endyear = date("Y", strtotime("+1 year", strtotime($row['from_date'])));
                    $acyear = $startyear . '-' . $endyear;
                    if (date("Y-m-d") < date('Y-m-d', strtotime($startyear . '-07-01'))) {
                        $endyear = $startyear;
                        $startyear = date("Y", strtotime("-1 year", strtotime($startyear)));
                        $acyear = $startyear . '-' . $endyear;
                    }
                    $startdate = date('Y-m-d', strtotime($startyear . '-07-01'));
                    $enddate = $row['from_date'];

                    $sql_event_count="SELECT COUNT(id) as count FROM `ipr_events` WHERE '$startdate' <= from_date and from_date < '$enddate'";
                    $query_event_count=mysqli_query($conn,$sql_event_count);
                    $row_current_event_no = mysqli_fetch_assoc($query_event_count);
                    $current_event_no = $row_current_event_no['count'] + 1;
                }
            } catch (exception $e) {
                echo $e;
            }
        } else {
            RedirectAfterMsg('Unable to get the event id', 'event_management.php');
        }
    }
    ?>

    <title>Permission Letter</title>
</head>

<body>
    <header>
        <h2 style="text-align: center;">Permission Letter <?php echo $row['title'] ?></h2>
    </header>
    <div class="container">
        <div class="toolbar">
            <ul class="tool-list">
                <li class="tool">
                    <button type="button" data-command='justifyLeft' class="tool--btn">
                        <i class=' fas fa-align-left'></i>
                    </button>
                </li>
                <li class="tool">
                    <button type="button" data-command='justifyCenter' class="tool--btn">
                        <i class=' fas fa-align-center'></i>
                    </button>
                </li>
                <li class="tool">
                    <button type="button" data-command='justifyRight' class="tool--btn">
                        <i class=' fas fa-align-right'></i>
                    </button>
                </li>
                <li class="tool">
                    <button type="button" data-command="bold" class="tool--btn">
                        <i class=' fas fa-bold'></i>
                    </button>
                </li>
                <li class="tool">
                    <button type="button" data-command="italic" class="tool--btn">
                        <i class=' fas fa-italic'></i>
                    </button>
                </li>
                <li class="tool">
                    <button type="button" data-command="underline" class="tool--btn">
                        <i class=' fas fa-underline'></i>
                    </button>
                </li>
                <li class="tool">
                    <button type="button" data-command="insertOrderedList" class="tool--btn">
                        <i class=' fas fa-list-ol'></i>
                    </button>
                </li>
                <li class="tool">
                    <button type="button" data-command="insertUnorderedList" class="tool--btn">
                        <i class=' fas fa-list-ul'></i>
                    </button>
                </li>
                <li class="tool">
                    <button type="button" data-command="createlink" class="tool--btn">
                        <i class=' fas fa-link'></i>
                    </button>
                </li>
                <li class="tool">
                    <a class="word-export tool--btn btn btn-success" href="javascript:void(0)" onclick="ExportToDoc()">
                        <i class="fas fa-file-export"></i>Export to Doc
                    </a>
                </li>
            </ul>
        </div>
        <div id="output" contenteditable="true">
            <div><img src="data:image/jpg;base64,<?php echo base64_encode(file_get_contents("images/IPR logo.png")); ?>" alt="IPR Logo" style="width:600px;"></div>
            <div>REF:-<?php echo substr($acyear, 2, 3) . substr($acyear, 7, 2) . "/$current_event_no" . str_repeat("&nbsp; ", 26); ?> Date:- <?php echo date("d/m/Y", strtotime("now")) ?></div>
            <div>To,<br></div>
            <div>The Principal,</div>
            <div>&nbsp;Shah &amp; Anchor Kutchhi Engineering College</div>
            <div>Chembur, Mumbai 400088<br></div>
            <div><br></div>
            <div>Subject: <u>Permission to conduct an event on <?php echo $row['title']; ?></u>.<br></div>
            <div><br></div>
            <div>Respected Sir,<br></div>
            <div><br></div>
            <div>IPR Cell SAKEC is organizing an event on '<?php echo $row['title']; ?>' on
                on <?php if ($row['from_date'] == $row['to_date']) echo date("j F Y", strtotime($row['from_date']));
                    else echo date("j F Y", strtotime($row['from_date'])) . " to " . date("j F Y", strtotime($row['to_date'])); ?>. For the same, permission
                is required to access to <b>{requirements}</b> as well as social media publicity.
                Thus, kindly give us permission to access the above mentioned venue from <?php date("h:i A", strtotime($row['from_time'])) . " to " . date("h:i A", strtotime($row['from_time'])) ?> on <?php if ($row['from_date'] == $row['to_date']) echo date("j F Y", strtotime($row['from_date']));
                                                                                                                                                                                                            else echo date("j F Y", strtotime($row['from_date'])) . " to " . date("j F Y", strtotime($row['to_date'])); ?>.
                Thanking You.<br></div>
            <div><br></div>
            <div>Yours sincerely,<br></div>



            <div>{Sign of IPRC head}<br></div>

            <div>{Name of IPRC head}<br></div>
            <div>(IPR Cell SAKEC <?php echo substr($acyear, 0, 5) . substr($acyear, 7, 2); ?>)<br></div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        let output = document.getElementById('output');
        let buttons = document.getElementsByClassName('tool--btn');
        for (let btn of buttons) {
            btn.addEventListener('click', () => {
                let cmd = btn.dataset['command'];
                if (cmd === 'createlink') {
                    let url = prompt("Enter the link here: ", "http:\/\/");
                    document.execCommand(cmd, false, url);
                } else {
                    document.execCommand(cmd, false, null);
                }
            })
        }
    </script>
    <script>
        if (typeof jQuery !== "undefined" && typeof saveAs !== "undefined") {
            (function($) {
                $.fn.wordExport = function(fileName) {
                    fileName = typeof fileName !== 'undefined' ? fileName : "Permission Letter for <?php echo $row['title'] ?>";
                    var static = {
                        mhtml: {
                            top: "Mime-Version: 1.0\nContent-Base: " + location.href + "\nContent-Type: Multipart/related; boundary=\"NEXT.ITEM-BOUNDARY\";type=\"text/html\"\n\n--NEXT.ITEM-BOUNDARY\nContent-Type: text/html; charset=\"utf-8\"\nContent-Location: " + location.href + "\n\n<!DOCTYPE html>\n<html>\n_html_</html>",
                            head: "<head>\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\n<style>\n_styles_\n</style>\n</head>\n",
                            body: "<body>_body_</body>"
                        }
                    };
                    var options = {
                        maxWidth: 624
                    };
                    var markup = $(this).clone();
                    markup.each(function() {
                        var self = $(this);
                        if (self.is(':hidden'))
                            self.remove();
                    });
                    var images = Array();
                    var img = markup.find('img');
                    for (var i = 0; i < img.length; i++) {
                        // Calculate dimensions of output image
                        var w = Math.min(img[i].width, options.maxWidth);
                        var h = img[i].height * (w / img[i].width);
                        // Create canvas for converting image to data URL
                        var canvas = document.createElement("CANVAS");
                        canvas.width = w;
                        canvas.height = h;
                        // Draw image to canvas
                        var context = canvas.getContext('2d');
                        context.drawImage(img[i], 0, 0, w, h);
                        // Get data URL encoding of image
                        var uri = canvas.toDataURL("image/png");
                        $(img[i]).attr("src", img[i].src);
                        img[i].width = w;
                        img[i].height = h;
                        // Save encoded image to array
                        images[i] = {
                            type: uri.substring(uri.indexOf(":") + 1, uri.indexOf(";")),
                            encoding: uri.substring(uri.indexOf(";") + 1, uri.indexOf(",")),
                            location: $(img[i]).attr("src"),
                            data: uri.substring(uri.indexOf(",") + 1)
                        };
                    }
                    // Prepare bottom of mhtml file with image data
                    var mhtmlBottom = "\n";
                    for (var i = 0; i < images.length; i++) {
                        mhtmlBottom += "--NEXT.ITEM-BOUNDARY\n";
                        mhtmlBottom += "Content-Location: " + images[i].location + "\n";
                        mhtmlBottom += "Content-Type: " + images[i].type + "\n";
                        mhtmlBottom += "Content-Transfer-Encoding: " + images[i].encoding + "\n\n";
                        mhtmlBottom += images[i].data + "\n\n";
                    }
                    mhtmlBottom += "--NEXT.ITEM-BOUNDARY--";
                    //TODO: load css from included stylesheet
                    var styles = "";
                    // Aggregate parts of the file together
                    var fileContent = static.mhtml.top.replace("_html_", static.mhtml.head.replace("_styles_", styles) + static.mhtml.body.replace("_body_", markup.html())) + mhtmlBottom;
                    // Create a Blob with the file contents
                    var blob = new Blob([fileContent], {
                        type: "application/msword;charset=utf-8"
                    });
                    saveAs(blob, fileName + ".doc");
                };
            })(jQuery);
        } else {
            if (typeof jQuery === "undefined") {
                console.error("jQuery Word Export: missing dependency (jQuery)");
            }
            if (typeof saveAs === "undefined") {
                console.error("jQuery Word Export: missing dependency (FileSaver.js)");
            }
        }
        jQuery(document).ready(function($) {
            $("a.word-export").click(function(event) {
                $("#output").wordExport();
            });
        });
    </script>
</body>

</html>