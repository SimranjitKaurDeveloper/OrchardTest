

<?php
//PALINDROME CODE
if(isset($_POST['palindrome'])){
	echo $_POST['strname']." is palindrome: ". check_palindrome($_POST['strname']). "<br/>";
}
if(isset($_POST['palindrometestcases'])){
	$palindrome_array = array('emordnilaP','','Kayak','No lemon, no melon');
	foreach($palindrome_array as $key => $value){
		echo $value." is palindrome: ". check_palindrome($value). "<br/>";
	}
}
//PALINDROME FUNC
function check_palindrome($string)
{
	$string = strtolower(preg_replace('/\s+/', '', $string));
	if($string != ''){
	  if ($string == strrev($string))
	      return 'TRUE';
	  else
		  return 'FALSE';
	}else{
		return 'UNDETERMINED';
	}
}

//ISOGRAM CODE
if(isset($_POST['isogram'])){
	echo $_POST['strname']." is : ". check_isogram($_POST['strname']). "<br/>";
}
if(isset($_POST['isogramtestcases'])){
	$isogram_array = array('uncopyrightable','Caucasus','authorising');
	foreach($isogram_array as $key => $value){
		echo $value." is : ". check_isogram($value). "<br/>";
	}
}
//isIsogram FUNCTION
function check_isogram($string)
{
  	$string = str_replace(['-', ' '], '', mb_strtolower($string));
    $letters = preg_split('//u', $string, -1, PREG_SPLIT_NO_EMPTY);

    if(count($letters) === count(array_unique($letters))){
			return 'HETEROGRAM';
		}else{
			$countLetters = array();
			foreach($letters as $key => $value){
				if(isset($countLetters[$value])){
					$countLetters[$value] = $countLetters[$value] + 1;
				}else{
					$countLetters[$value] = 1;
				}
			}
			if(count(array_unique($countLetters)) === 1)
				return 'ISOGRAM';
			else
				return 'NOTAGRAM';
		}
}

//ANGULARTM CODE
if(isset($_POST['angularTM'])){
	echo "AngularTM for ".$_POST['strname']." is : ". cal_degree($_POST['strname']). " degree <br/>";
}
if(isset($_POST['angularTMtestcases'])){
	$angularTM_array = array('12:00:00','12:15:00','11:40:00');
	foreach($angularTM_array as $key => $value){
		echo "AngularTM for ". $value ." is : ". cal_degree($value). " degree <br/>";
	}
}

function cal_degree($time){
	$time_array = explode(':', $time);
	$ans = abs(($time_array[0] * 30 + $time_array[1] * 0.5) - ($time_array[1] * 6));
	return min(360-$ans,$ans);
}

$time = date("h:i:s");
echo "AngularTM for current time is : ".cal_degree($time). " degree <br/>";
?>
<br/><br/>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="text" name="strname" /><br/><br/>

<button type="submit" name="palindrome" >Check Palindrome</button>
<button type="submit" name="palindrometestcases" >Check Palindrome with Default Test Cases</button><br/><br/>

<button type="submit" name="isogram" >Check Isogram</button>
<button type="submit" name="isogramtestcases" >Check Isogram with Default Test Cases</button><br/><br/>

<button type="submit" name="angularTM" >Check Angular TM (Use format hh:mm:ss)</button>
<button type="submit" name="angularTMtestcases" >Check Angular TM with Default Test Cases</button><br/><br/>
</form>
