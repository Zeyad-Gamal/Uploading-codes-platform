<?php
// Set error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start the session (if using sessions)
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
    <title>Document</title>
    <script type="text/javascript">
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>

    <style>
        .blocks .blocks-container .block h1.date{
            left: 40%;
            padding-top: 1.3rem;
        }
 
  /* width */
::-webkit-scrollbar {
  width: 7px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1;
  border-top-right-radius: 1rem;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: black;
  border-top-right-radius: 1rem;
}



        button{
            font-size: 1rem;
            font-weight: 600;
            width: 5rem;
            height: 2rem;
        }

        textarea{
            /* height: 20rem; */
            overflow-y: scroll;
            width: 95%;height: 30rem;resize: none;
            font-size: 1.3rem;
            color: darkslategrey;
            padding:2rem;
        }

        .blocks .up-buttons .logout{
            transition: 0.5s;
            background-color: red;text-align: center;border-radius: 0.4rem;
            padding: 0.5rem;font-size: 1rem;color: whitesmoke;
            text-decoration: none;
            font-weight: 800;
        }

        .blocks .up-buttons .logout:hover{
            background-color: gray;
        }

        .blocks .up-buttons .upload{
            transition: 0.5s;
            background-color: rgb(23, 44, 3);text-align: center;border-radius: 0.4rem;
            padding: 0.5rem;font-size: 1rem;color: whitesmoke;
            text-decoration: none;
            font-weight: 800;
        }

        .blocks .up-buttons .upload:hover{
            background-color: black;
        }

        option{
            color: black;
        }

        textarea{
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
        }

        #upload_button{
            background-color: green;
            color: whitesmoke;
        }

        .blocks .blocks-container .block h1{
            font-size: 1.8rem;
        }

        

        @media only screen and (max-width: 800px){
            body{
                display: none;
            }
        }

    </style>
</head>
<body>
    
 <?php
    $conn = mysqli_connect("sql204.infinityfree.com", "if0_35334018", "G40nAs3nc390JC3", "uploadcodes");
    ?>

    <div class="blocks">
    <div class="up-buttons" style="display:flex;flex-direction: column;gap: 1.5rem;">
<a class="logout" href="index.php">Log-out</a>
<a class="upload" href="javascript:0" onclick="dispalay_('code-create-container','j')">Upload new</a>

<div id="map_of_blocks" style="display: flex;flex-wrap: wrap;flex-direction: column; margin-top: 10rem;padding: 1rem;border-radius: 0.5rem;border-style: solid;border-width: 0.01rem;">
<a style="font-size: 0.8rem;background-color: #3783CA; cursor: auto;margin-top: 0.7rem;" class="upload point" href="javascript:0" >Mobile</a>
<a style="font-size: 0.8rem;background-color: #DB751C; cursor: auto;margin-top: 1rem;" class="upload point" href="javascript:0" >DL-ML-Algorithms</a>
</div>


</div> 
        <div id="blocks-container" class="blocks-container">


        <?php


$query1 = "SELECT * FROM codes";
$result1 = $conn->query($query1);
if ($result1->num_rows > 0) {
    while ($optionData1 = $result1->fetch_assoc()) {
        $code_name = $optionData1['code_name'];
        $code_text = $optionData1['code_text'];
        $code_typ = $optionData1['code_type'];
        // $newText = str_replace(["\n", "\r\n"], "111", $code_text);

        $code_date =date("Y-m-d H:i:s", strtotime($optionData1['code_date'])) ;
        $code_idof_user = $optionData1['u_id'];


        $querygetname_user = "SELECT * FROM users WHERE u_id = '$code_idof_user'";
$result22 = $conn->query($querygetname_user);
if ($result22->num_rows > 0) {
    while ($optionData_username = $result22->fetch_assoc()) {
        $code_nameof_user = $optionData_username['u_name'];
    }}

    if ($code_idof_user % 2 == 0) {
        $colorof_username = "#A32622";
    } else {
        $colorof_username = "#173958";
    }

    if ($code_typ == "Mobile") {
        $colorof_header = "#3783CA";
    } else {
        $colorof_header = "#DB751C";
    }

?>
            <div class="block">
                <span style="background-color:<?php echo $colorof_header ?>;position: relative;left: 0.5rem; content: '';width: 0.9rem;height: 2rem;border-bottom-right-radius: 1rem;border-color: #505050;border-width: 0.001rem;border-style: solid;border-top-width: 0;"></span>
                <a onclick="dispalay_('code-container','<?php echo $code_text ?>');" href="javascript:0">
                <h1 ><?php echo $code_name ?> <span style="color:black; font-size: 1rem;font-weight: 900; ">From: <span style="color:<?php echo $colorof_username ?>;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-weight: 600;font-size: 1.2rem;"><?php echo $code_nameof_user ?></span></span></h1></a>
                
                <h1 class="date"><?php echo $code_date ?></h1>

            </div>

            
            <?php
                                }
                            }
                            ?>
        </div>


        <div id="code-container" class="code" style="width: 100%;height: 100%; display: none;">
            <textarea required  readonly  name="" id="textarea">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quae neque veniam, sapiente totam sed laudantium nobis! Nam temporibus iusto enim minima distinctio eos praesentium delectus quae id quisquam nisi suscipit, modi aliquam vitae mollitia eum ipsa quod, quia tempora illo officia dolor! Voluptas laborum, commodi esse dolore unde, et qui architecto nesciunt libero velit ab accusantium. Facilis totam reiciendis provident minima eum minus magnam ea at unde quidem, excepturi quasi! Repudiandae corrupti laborum nostrum sed vero, doloremque reiciendis saepe dicta quis repellendus debitis laboriosam, odio temporibus deserunt expedita fugiat dignissimos repellat. Atque harum ratione vitae? Laboriosam inventore dignissimos commodi, quaerat dolor molestiae minus debitis fuga nemo magni. Cum recusandae magni quam commodi perspiciatis expedita, ducimus, nisi, nam non autem harum nostrum inventore illo odio accusamus obcaecati quae sequi! Sunt placeat distinctio quis animi tenetur natus, molestiae excepturi ullam repudiandae blanditiis eligendi dicta soluta. Sed ex fuga ea. Nobis quibusdam dolor vero ut atque nulla libero amet exercitationem consequuntur nesciunt ipsum harum, quae facere, dolorum omnis provident, et deleniti labore ad dolores rem sunt! Deleniti animi quos qui omnis laborum voluptate repudiandae nostrum dicta magnam itaque illum explicabo, placeat odio numquam laudantium quas nesciunt ipsam sed maiores, optio accusamus necessitatibus nobis molestias voluptas. Laboriosam animi itaque ratione aspernatur voluptates? Libero magni officiis, a reprehenderit optio dolores quos quibusdam ipsam explicabo ea, maiores sequi eaque impedit voluptate laudantium fuga iure assumenda quasi perspiciatis aperiam quaerat, rerum eos eligendi. Explicabo quos illum, eius possimus molestias velit molestiae id quam reprehenderit quod ab ipsa expedita cupiditate, nobis ipsum aperiam, atque doloribus commodi ducimus quia suscipit perspiciatis eligendi quaerat? Eveniet qui quisquam id fugiat quo officiis incidunt accusantium. Fuga tenetur nam nesciunt tempore consequuntur libero voluptate quaerat quisquam voluptatem quas, aperiam ex temporibus debitis dolore minus? Vel nesciunt nisi distinctio voluptatibus ea sequi ex ipsum, assumenda dolore eum ratione similique corporis praesentium cum quod qui molestiae aut eos necessitatibus consequuntur facilis obcaecati architecto. Voluptatem vel quidem velit laboriosam, dolore culpa animi corporis soluta possimus ullam quisquam labore tempore beatae, sed officiis adipisci provident aliquid modi, delectus corrupti non tempora nihil numquam a. Veritatis, repudiandae maiores asperiores eligendi beatae doloribus molestiae eius reprehenderit facere iure aperiam est! Eum corrupti temporibus saepe sint, cum sit. Ullam quaerat voluptates sed fuga praesentium repudiandae distinctio. Iusto rerum exercitationem consequuntur praesentium fuga quasi reiciendis fugit cum inventore placeat nesciunt, maiores qui impedit possimus autem nemo similique aliquid a voluptatum quibusdam quaerat laboriosam! Error alias recusandae sint eum dolorum! Reprehenderit, nihil recusandae quisquam debitis voluptatum architecto excepturi eum nam doloribus ex, accusantium minima, nemo perspiciatis! Voluptas amet dolore ducimus natus aliquam ad, maxime libero quam aliquid enim nostrum, earum ratione recusandae consequatur doloremque facilis vitae labore fugit velit! Atque culpa illum ratione ex tempore cum est exercitationem accusamus voluptatem. Tenetur dolorem maxime consequuntur in, aperiam culpa neque nulla tempora quasi impedit recusandae sunt illum maiores ipsam, quis qui atque incidunt vel facilis reiciendis. Quibusdam impedit, incidunt minima nemo fugiat doloribus aperiam nostrum quasi nobis, magnam similique nihil est laborum blanditiis eligendi architecto reiciendis beatae accusamus itaque placeat. Eius facere, eos iure tempora, vitae nihil quibusdam culpa veritatis suscipit adipisci unde eligendi perspiciatis, sunt iusto temporibus inventore dolor sapiente reiciendis in mollitia cum illum. Optio eius, quos unde voluptatum perspiciatis, consequuntur quaerat vel expedita facere mollitia libero exercitationem pariatur doloribus vero accusamus at aperiam cum dolore omnis recusandae voluptatem. Quidem et fugiat eos veritatis, corrupti labore vero iste dolorem repudiandae ipsa quaerat omnis, doloribus pariatur soluta, nostrum minima sit tempora assumenda. Excepturi vel voluptatem magnam provident in odio inventore et alias nihil asperiores culpa, molestias veritatis sunt. Unde in ratione quibusdam, odit expedita, incidunt deleniti facilis quas quam qui, porro nihil necessitatibus eius quia illum suscipit! Molestias quibusdam quo numquam, explicabo consequuntur non fugit, natus, magni at atque in quos magnam ea nihil assumenda reiciendis minima. Quasi eveniet veritatis facilis cumque minus! Omnis facere excepturi ut cum tempore cumque incidunt doloribus maiores, voluptate quam porro nesciunt illum assumenda, deserunt vero totam distinctio rerum odio provident iure? Hic libero obcaecati cupiditate exercitationem cumque sed mollitia modi sint illo. Recusandae, itaque eligendi consequatur laborum in ipsum dignissimos deserunt neque cumque quaerat debitis sequi. Repellendus voluptate quae animi. Eum saepe iure, exercitationem vero sunt nemo.</textarea>

            <div class="code-buttons" style="display: grid;gap: 1rem;margin-top: 2rem;">
            <button onclick="dispalay_('blocks-container',' ');"  style="grid-column-start: 2; grid-column-end: 3;" class="back-button">Back</button>
            <button onclick="copyToClipboard()" style="grid-column-start: 21; grid-column-end: 22;" class="copy-button">Copy</button>
        </div>
        </div>



        <div id="code-create-container" class="code" style="width: 100%;height: 100%; display: none;">
        <form method="POST" enctype="multipart/form-data"  action="">
            <input style="height: 3%;width: 15%;font-size: 1.2rem;padding: 0.5rem;" type="text" name="code_name" placeholder="Enter Header" required>
            <select style="height: 6%;width: 15%;font-size: 1.2rem;padding: 0.5rem;color: gray;" name="selectuser" id="" required>
            <option value="">Choose your name</option><option  value="Moaz">Moaz</option><option value="Zeyad">Zeyad</option>
        </select>
        <select style="height: 6%;width: 15%;font-size: 1.2rem;padding: 0.5rem;color: gray;" name="selectcodetype" id="" required>
            <option value="">Type of code</option><option  value="Mobile">Mobile</option><option value="DL-ML-Algorithms">DL-ML-Algorithms</option>
        </select>   
        <textarea style="margin-top: 2rem;"    name="code_sent" required># Insert the code here....</textarea>

            <div class="code-buttons" style="display: grid;gap: 1rem;margin-top: 2rem;">
            <button onclick="dispalay_('blocks-container',' ');"  style="grid-column-start: 2; grid-column-end: 3;" class="back-button">Back</button>
            <input id="upload_button" name="send_button" style="grid-column-start: 21; grid-column-end: 22;" type="submit" value="Upload">
        </div>
        </form>
        </div>
    </div>


    <script>
        function dispalay_(id_ , code_text){
            document.getElementById('blocks-container').style.display=('none');
            document.getElementById('code-container').style.display=('none');
            document.getElementById('code-create-container').style.display=('none')
            document.getElementById(id_).style.display=('grid');
            document.getElementById('map_of_blocks').style.display=('flex');


            
            

            if(id_ == 'code-container'){
                // let newText = code_text.replace(/111/g, '\n');
                let newText = code_text.replace(/45264652328/g, '\n');
                let newText2 = newText.replace(/79879132468498/g, '"');
                let newText3 = newText.replace(/8798412346888/g, "'");
                console.log(newText);
                document.getElementById('textarea').innerHTML=(newText3);
                document.getElementById('map_of_blocks').style.display=('none');
             }

             else if(id_ == 'code-create-container'){
                document.getElementById('map_of_blocks').style.display=('none');
             }
        }




        function copyToClipboard() {
            // Get the text area element
            var textarea = document.getElementById("textarea");

            // Select the text in the text area
            textarea.select();
            textarea.setSelectionRange(0, 99999); // For mobile devices

            // Copy the selected text to the clipboard
            document.execCommand("copy");

            // Deselect the text area
            textarea.setSelectionRange(0, 0);
        }


    </script>


<script>
        // // Check if the page was reached through the browser's back button
        // if (window.history && window.history.pushState) {
        //     window.history.pushState('forward', null, './#');
        //     window.onpopstate = function () {
        //         window.history.pushState('forward', null, './#');
        //     };
        // }
    // </script>


</body>
</html>





<?php
error_reporting(0);

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["send_button"])) {
    $conn2 = mysqli_connect("sql204.infinityfree.com", "if0_35334018", "G40nAs3nc390JC3", "uploadcodes");

    // $code_sent = $_POST['code_sent'];

    $code_sender = $_POST['selectuser'];
    $code_type = $_POST['selectcodetype'];
    $code_sent = isset($_POST['code_sent']) ? $_POST['code_sent'] : '';
    $code_header = isset($_POST['code_name']) ? $_POST['code_name'] : '';
    $code_sender_id = '';





$query_users = "SELECT * FROM users WHERE u_name = '$code_sender' ";
$result_user_id = $conn2->query($query_users);
if ($result_user_id->num_rows > 0) {
    while ($optionData_userid = $result_user_id->fetch_assoc()) {
        $code_sender_id = $optionData_userid['u_id'];
    }}

    




    // Output the value for debugging (remove this in production)
    // echo "Code Sent: " . $code_sent;

    $newText = preg_replace("/\r?\n/", "45264652328", $code_sent);
    $newText2 = str_replace('"', '79879132468498', $newText);
    $newText3= str_replace("'", '8798412346888', $newText2);



    // Escape special characters
    $escaped_code_sent = mysqli_real_escape_string($conn2, $newText3);

    $sql2 = "INSERT INTO codes (code_name, code_text, code_type, u_id) VALUES ('$code_header', '$escaped_code_sent' , '$code_type' , '$code_sender_id')";

    if (mysqli_query($conn2, $sql2)) {
        ?>
        <script>
        alert("<?php echo 'Code uploaded successfully' ?>");
</script>
        <?php
        echo "Record inserted successfully.";
        // Redirect to another page to avoid form resubmission on page refresh
        echo '<meta http-equiv="refresh" content="0; url=blocks.php?">';

        exit();
    } else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn2);
    }

    $conn2->close();
}
?>





<?php

 // Destroy the session
 session_destroy();

 

exit();

?>