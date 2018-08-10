<html>
    <head>
        <title>Program</title>
    </head>
    <body>
        <h2>Program for print unique character with count and sort from enter string</h2>
        <form method="post" id="programFrm" name="programFrm">
            <input type="text" name="string" id="string" placeholder="Enter string here" value="<?php if(isset($_POST['string'])) { echo $_POST['string']; } ?>">
            <input type="submit" id="submitBtn" name="submitBtn" value="Submit">
        </form>
    </body>
</html>
<?php 
if(isset($_POST['submitBtn'])) {
    $string = trim($_POST['string']);  //For remove white space from first and last of string
    $stringArr = str_split($string);  //For Convert string to array
    if(count($stringArr) > 0) {
        $resultArr = array();
        foreach ($stringArr as $val) {
            if(array_key_exists($val, $resultArr)) { //For check exist key in array
                $resultArr[$val] = $resultArr[$val] + 1;
            } else {
                $resultArr[$val] = 1;
            }
        }
        
        //For group array by number of repeat character
        $groupArr = array();
        foreach($resultArr as $key => $val2) {
            $groupArr[$val2][] = $key;
        }
        krsort($groupArr); //Sort array using key
        if(count($groupArr)>0) {
            foreach($groupArr as $key => $val3) {
                sort($val3); //Sort array  using value
                foreach ($val3 as $val4) {
                    echo $val4.': '.$key.'<br>';
                }
            }
        }
    }
}
?>