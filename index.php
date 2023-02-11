<!DOCTYPE html>
<html>
<head>
    <title>Divisibility Generator</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- load CSS -->
    <link href="//cdn.muicss.com/mui-0.10.3/css/mui.min.css" rel="stylesheet" type="text/css" />
    <script src="//cdn.muicss.com/mui-0.10.3/js/mui.min.js"></script>     
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <!-- Custom Stylesheet -->
     <link rel="stylesheet" href="css/style.css"/>
</head>
<body>

    <div class="mui-appbar">
          <table width="100%">
            <tr style="vertical-align:middle;">
              <td class="mui--appbar-height">Activity #1</td>
            </tr>
          </table>
    </div>

    <div class="mui-container-fluid">
        <div class="mui-row">

            <div class="mui-col-md-12 mui-col-lg-4">
                <div class="mui-panel">
                    <h1>Divisibility Generator</h1>
                    <h3>by Aldrian V. Barias  <span style="margin-left:15%;">BSIT-3D</span></h3>

                    <form method="POST">
                        <div class="mui-textfield mui-textfield--float-label">
                            <input type="number" name="start" required/>
                             <label>Starting Range:</label>
                        </div>
                        <div class="mui-textfield mui-textfield--float-label">
                             <input type="number" name="end" required/>
                             <label>Ending Range:</label>
                        </div>
                        <div class="mui-textfield mui-textfield--float-label">
                              <input type="number" name="div" required/>
                               <label>Divisible by:</label>
                        </div>
                        <div><br><button class="mui-btn mui-btn--primary" name="submit" value="submit">Submit</button>
                        <button type="button" id="inputClear" class="mui-btn mui-btn--danger" name="clear">Clear</button></div><br>
                    </form>

                </div>
            </div>

            <div class="mui-col-md-12 mui-col-lg-8">
                <div class="mui-panel">
                      <div class="mui-row">
                        <div class="mui-col-md-12 mui-col-lg-10">
                            <h1>The Output is shown here:</h1>
                        </div>
                        <div class="mui-col-md-12 mui-col-lg-2">
                           <button id="contentReset" class="mui-btn mui-btn--primary"><i class="fa fa-refresh"></i> Reset</button>
                        </div>
                     </div>
                    <div class='mui-divider'></div>

                    <?php
                        if (isset($_POST['start']) && isset($_POST['end']) && isset($_POST['div']) && isset($_POST['submit'])) { //if-statement for checking if all the variables shown are not empty
                         
                            $start = $_POST['start']; //variable for starting range
                            $end = $_POST['end']; // variable for ending range
                            $div = $_POST['div']; // variable for "divisible by"
                            $ctr = 0; // variable for counting the divisibled numbers

                            $divlist = []; // array for the list of divisibled numbers

                            for ($x = $start; $x <= $end; $x++) { // for loop 
                                if(($x % $div) == 0){ // if-statement for checking if the number from the range of numbers is "divisibled by"
                                    $ctr++; // incrementation
                                    array_push($divlist, $x); //vale will be transferred to the divlist
                                }
                            }

                            echo "<div id='content'><h3>Sample Data:</h3><div class='mui-divider'></div>";
                            echo "<h3>Starting Range: " . $start . "</h3>";
                            echo "<h3>Ending Range: " . $end . "</h3>";
                            echo "<h3>Divisible by: " . $div . "</h3>";
                            echo "<br><h3>Count of Number(s) divisible by ". $div .":<div class='mui-divider'></div><br>" . ($ctr != 0 ? $ctr : "None") . "</h3><br>";
                            echo "<h3>List of Number(s) divisible by ". $div .":<div class='mui-divider'></div><br>" . ($ctr != 0 ? implode(" ", $divlist) : "None")  . "</h3></div>";

                        }
                    ?>

                </div>
            </div>
        </div>
    </div>

    <!-- load jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $("#inputClear").on("click",function() {
                 $("form input[type=number]").each(function() {
                    this.value = '';
                    $(this).removeClass();
                });
            });

            $("#contentReset").on("click",function() {
                $('#content').remove();
            });
        });
    </script>

</body>
</html>