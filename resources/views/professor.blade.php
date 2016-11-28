@extends('layout')

@section('css')
@stop

@section('mainbody')

<?php

	$SESSION_designation=session()->get('SESSION_designation','default_designation_pass');
	$SESSION_dept_prof=session()->get('SESSION_dept_prof','default_designation_pass');

	$SESSION_designation = collect($SESSION_designation);

	$count_designtion=$SESSION_designation->count();
	$count_dept_prof=$SESSION_dept_prof->count();

	if($SESSION_designation[0] == '[]')
	{
		$count_designtion = 0;
	}
	if($SESSION_dept_prof[0] == '[]')
		$count_dept_prof = 0;

	$designation_prof_array = json_decode($SESSION_designation, true);


	//take id and department from prof table

	// dd($SESSION_dept_prof);
	$profname = $SESSION_dept_prof[0];
	$profpass = $SESSION_dept_prof[1];
	$profdept = $SESSION_dept_prof[2];

	echo "<h1>Department : ".$profdept."</h1>";
	//dd($SESSION_dept_prof);
	// echo $profdept . $profname .  $profpass;

	$prof=DB::table('prof')->where('Prof Name',$profname)->where('Password',$profpass)->where('Department', $profdept)->get();

	//dd($prof);

	$prof = json_decode($prof,true);
	//dd($prof);
	$profID = $prof[0]['id'];
	$StudTableColName = $profID.'';
	$StudTableColNameCom = $profID."_s";

	// echo $profID;

	$student=DB::table('student_dept_prof')->where('Department',$profdept)->where($StudTableColName,'0')->orderBy('Roll No')->get();
	
	$student_Count = $student->count();
	
	$student = json_decode($student, true);
	
	if(isset($_POST['submit']))
	{
		
		// dd($student);
		for ($i=0; $i < $student_Count; $i++)
		{ 
			$roll = (string)$student[$i]['Roll No'];

			$temp  = 'com_'.$i.'a'.$roll;

			if( array_key_exists($temp, $_POST) && $_POST[$temp]) {
				DB::table('student_dept_prof')->where('Department',$profdept)->where($StudTableColName,'0')->where('Roll No', $roll)->update([$StudTableColNameCom => $_POST[$temp]]);
			}

			$temp  = 'cb_'.$i.'a'.$roll;
			if (array_key_exists($temp, $_POST) && $_POST["$temp"] == 'on')
			{
				DB::table('student_dept_prof')->where('Department',$profdept)->where($StudTableColName,'0')->where('Roll No', $roll)->update([$StudTableColName => true]);
			}			
			

			
		}
	}

?>
<?php

	echo "	<form method='post' action='/professor'>
				<p>
					<input type='submit' class='btn btn-primary' name='submit'>
				</p>
			<table class='table table-bordered table-condensed table-responsive table-hover'>
			<tr class='active'>
				<th>Name</th>
				<th>Roll No.</th>
				<th>No Due
					<div style:'float: right'>
					<label for='selectall' id='selectControl'>Select All</label>
    				<input class = 'cb' type='checkbox' id='selectall' />
    				</div>
				</th>
				<th>Comment</th>
			</tr>";

	$student=DB::table('student_dept_prof')->where('Department',$profdept)->where($StudTableColName,'0')->orderBy('Roll No')->get();

	$student_Count = $student->count();
	
	$student = json_decode($student, true);
			
			?>

	<input type='hidden' name='_token' value='{{ csrf_token() }}'>

			<?php
	//$student = json_decode($student, true);

	for ($i=0; $i < $student_Count; $i++) { 
		echo "<tr class='info'>";
        
        $temp  = (string)$student[$i]['Student Name'];
		echo "<td>$temp</td>";
		
		$roll = (string)$student[$i]['Roll No'];
		echo "<td>$roll</td>";
		
		$temp  = 'cb_'.$i.'a'.$roll;
		echo "<td><input class='cb' type='checkbox' name='$temp'></td>";
		
		$temp  = 'com_'.$i.'a'.$roll;

		$tempname =  (string)$student[$i]['Student Name'];
		$prevcom = DB::table('student_dept_prof')->where('Department',$profdept)->where('Student Name',$tempname)->value($StudTableColNameCom);
		echo "<td><input type='text' name='$temp' value='$prevcom'></td>";
		
		echo "</tr>";
	}
			
		echo "</table><form>";
	// dd($student);



?>

@stop



@section('sidebar')

	<?php
		echo "<a href=profportal> Profile </a>";

		for($i = 0; $i<$count_designtion; $i++)
		{
			echo "<a href=\" ". $designation_prof_array[$i]['href'] ."\">" . $designation_prof_array[$i]['Designtion'] . "</a>";
		 }
		
		if($count_dept_prof!=0)
		{
			echo "<a href='professor'> Professor </a>";
		}	
	?>
		<a href="/">Log Out</a>
@stop

