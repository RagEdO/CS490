<?php
    session_start();
    include('sheader.php');
                        
    
?>
    <div class="create-content">
        <h1>Select Quiz</h1>
            <form class="choice" action="http://web.njit.edu/~ovl2/CS490/login/student/retrieveQuiz.php" method="post">
                <table border="1" cellpadding="1" cellspacing="0">
                    <?php
                        $request = file_get_contents('php://input');
                        $x = json_decode($request);

                        $sizeQuiz = Sizeof($x->Quizzes);
                        //echo $sizeQuiz;
                    ?>
                    <tr>
                        <th>Quizzes</th><br />
                    </tr>
                        <?php for($i=0; $i<$sizeQuiz; $i++) {
                            $n = $x->Quizzes[$i]->QuizName;
                        ?>
                    <tr>
                        <td align="left"><pre><?php echo "<input id='choice' name='quizname' type='radio' value=$n>"; echo " ".$n." ";?></pre></td>
                    </tr>
                    <?php } ?>
                </table>
                <input type="submit" value="Take Quiz">
            </form>
    </div>
<?php
    include('../footer.html');
?>
