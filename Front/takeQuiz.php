<?php
    session_start;
    include('sheader.php');
?>
    <script type="text/javascript">
        window.onload=function date(){
        var now=new Date();
        var x = document.getElementById("date");
        x.innerHTML=now.toUTCString();
         }
    </script>
    <div class="take-quiz">
        <h1>Quiz <?php echo $quiz; ?> </h1>
        <p id="date"></p>
            <form class="quizSheet" action="" method="post">
                <?php
                      $Request = file_get_contents('php://input');
                      $Quiz = json_decode($Request);
                      $Name = $Quiz->QuizName;
                            
                ?>
                  <table id="quizname" border="1" cellpadding="1" cellspacing="1">
                    <tr>
                        <th>Quiz Name</th><br />
                    </tr>
                      <?php
                            $sizeName = Sizeof($Quiz->QuizName);
                            for($i=0; $i<$sizeName; $i++){
                                $N = $Quiz->QuizeName[$i]->QuizName;
                            }
                      ?>
                      <tr>
                         <td><?php echo "<button onclick='quiz($N)'> $N </button>"; ?></td>
                      </tr>
                  </table>
                  <table id="$N" class="create-quiz" border="1" cellpadding="1" cellspacing="1">
                    <?php
                            $sizeMC = Sizeof($Quiz->MultipleChoice);
                            $sizeTF = Sizeof($Quiz->TrueFalse);
                            $sizeOE = Sizeof($Quiz->OpenEnded);
                    ?>
                    <tr>
                        <th>Multiple Choice</th><br />
                    </tr>
                        <?php for($i=0; $i<$sizeMC; $i++) {
                            $n = $Quiz->MultipleChoice[$i]->QuestionNum;
                            $q = $Quiz->MultipleChoice[$i]->Question;
                            $a = $Quiz->MultipleChoice[$i]->Opt1;
                            $b = $Quiz->MultipleChoice[$i]->Opt2;
                            $c = $Quiz->MultipleChoice[$i]->Opt3;
                            $d = $Quiz->MultipleChoice[$i]->Opt4;
                            ?>
                    <tr>
                        <td align=left><pre><?php echo"<input id='choice' name='multiplechoice[]' type='checkbox' value=$n>";  echo " ".$n." "." "?>    <?php echo $q ?></pre></td>
                        <td align=left><pre><?php echo"<input id='choice' name='multiplechoice[]' type='checkbox' value=$a>"; echo " ".$a." "." "?></pre></td>
                        <td align=left><pre><?php echo"<input id='choice' name='multiplechoice[]' type='checkbox' value=$b>"; echo " ".$b." "." "?></pre></td>
                        <td align=left><pre><?php echo"<input id='choice' name='multiplechoice[]' type='checkbox' value=$c>"; echo " ".$c." "." "?></pre></td>
                        <td align=left><pre><?php echo"<input id='choice' name='multiplechoice[]' type='checkbox' value=$d>"; echo " ".$d." "." "?></pre></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th>True/False</th>
                    </tr>
                        <?php for($i=0; $i<$sizeTF; $i++) {
                             $q = $Quiz->TrueFalse[$i]->Question;
                             $n = $Quiz->TrueFalse[$i]->QuestionNum;
                             $a = $Quiz->TrueFalse[$i]->Opt1;
                             $b = $Quiz->TrueFalse[$i]->Opt2;
                            ?>
                    <tr>
                        <td align=left><pre><?php echo "<input id='choice' name='truefalse[]' type='checkbox' value=$n>";  echo " ".$n." "." "?>    <?php echo $q ?></pre></td>
                        <td align=left><pre><?php echo "<input id='choice' name='truefalse[]' type='checkbox' value=$a>";  echo " ".$a." "." "?></pre></td>
                        <td align=left><pre><?php echo "<input id='choice' name='truefalse[]' type='checkbox' value=$b>";  echo " ".$b." "." "?></pre></td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <th>Open-End</th>
                    </tr>
                        <?php for($i=0; $i<$sizeOE; $i++) {
                            $q = $Quiz->OpenEnded[$i]->Question;
                            $n= $Quiz->OpenEnded[$i]->QuestionNum;
                            ?>
                    <tr>
                        <td align=left><pre><?php echo $n ?> <?php echo $q ?></pre></td>
                        <textarea name="Answer" value="Opt1" style="width:400px;height:auto;" placeholder="Enter your answer here..."></textarea>
                    </tr>
                    <?php } ?>
                </table>
                <p></p>
                <input type="hidden" value="CQ" name="type">
                <input type="submit" value="Submit Quiz">
            </form>
    </div>
<?php
    include('../footer.html')
?>
