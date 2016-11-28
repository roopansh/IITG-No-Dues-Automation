@extends('layout')

@section('css')
@stop

@section('mainbody')

<?php

	$main="Asst Registrar SA";
	$main=(string)$main;

	$main_low="asst registrar sa";
	$main_low=(string)$main_low;

	$main_Comments=$main." Comments";
	$main_Comments=(string)$main_Comments;

	$SESSION_designation=session()->get('SESSION_designation','default_designation_pass');
	$SESSION_dept_prof=session()->get('SESSION_dept_prof','default_designation_pass');

	$count_designtion=$SESSION_designation->count();
	$count_dept_prof=$SESSION_dept_prof->count();

	if($SESSION_dept_prof[0] == '[]')
		$count_dept_prof = 0;

	$designation_prof_array = json_decode($SESSION_designation, true);

	for($i=0;$i< $count_designtion;$i++)
	{
		$temp = 'Designtion';
        $temp = (string)$temp; 
        $temp  = (string)$designation_prof_array[$i][$temp]; 
	}
	echo "<h1>Assistant Registrar Student Affairs</h1>";

	$student=DB::table('student')->where('Warden','1')->where('Gymkhana','1')->where($main, '0')->orderBy('Department')->orderBy('Student Name')->get();
	
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
				DB::table('student')->where('Warden','1')->where('Gymkhana','1')->where($main, '0')->orderBy('Department')->orderBy('Student Name')->where('Roll No', $roll)->update([$main_Comments => $_POST[$temp]]);
			}

			$temp  = 'cb_'.$i.'a'.$roll;
			if (array_key_exists($temp, $_POST) && $_POST["$temp"] == 'on')
			{
				DB::table('student')->where('Warden','1')->where('Gymkhana','1')->where($main, '0')->orderBy('Department')->orderBy('Student Name')->where('Roll No', $roll)->update([$main => true]);
			}			
			

			
		}
	}

?>
<?php

	echo "	<form method='post' action='/$main_low'>
				<input type='submit' class='btn btn-primary' name='submit'>
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

	$student=DB::table('student')->where('Warden','1')->where('Gymkhana','1')->where($main, '0')->orderBy('Department')->orderBy('Student Name')->get();
	
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
		$prevcom = DB::table('student')->where('Warden','1')->where('Gymkhana','1')->value($main_Comments);
		
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

