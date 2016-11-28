@extends('layout')

@section('css')

@stop

@section('mainbody')

<?php		
	//Collections
	if(session()->exists('SESSION_designation'))
		$designation_pass=session()->get('SESSION_designation','default_designation_pass');
	if(session()->exists('SESSION_dept_prof'))
		$profdetail=session()->get('SESSION_dept_prof','default_designation_pass');
	$dept_prof = collect($profdetail);

	$designation_pass = collect($designation_pass);
	$count_desig = $designation_pass->count();

	$count_dept_prof = $dept_prof->count();
	if($profdetail[0] == '[]' )
		$count_dept_prof=0;

	if($designation_pass[0] == '[]')
		$count_desig = 0;
	
	//Decoding the collections--> array
	$designation_prof_array = json_decode($designation_pass, true);
	$dept_prof_array = json_decode($dept_prof, true);

	//session()->put('SESSION_dept_prof', $dept_prof);
	//session()->put('SESSION_designation', $designation_pass);
?>


<table class="table table-bordered table-condensed table-responsive table-hover" style="">
	<tr class="active">
        <th>Column</th>
        <th>Details</th>
    </tr>

    <?php
        if($count_dept_prof!=0)
        {
        	echo "<tr class='info'>
        		<td>Name</td>
        		<td>$dept_prof_array[0]</td>
        	</tr>   
        	<tr class='danger'>
        		<td>Department</td>
        		<td>$dept_prof_array[2]</td>
        	</tr> ";  
        	
        }

        for($i = 0; $i<$count_desig ; $i++)
        {
        	$temp = 'Designtion';
        	$temp = (string)$temp; 
            $temp  = (string)$designation_prof_array[$i][$temp];        	

        	echo "<tr class='success'>
        		<td>Designation </td>
        		<td>$temp</td>
        	</tr>";
        	
        	$temp = 'Field';
        	$temp = (string)$temp; 
            $temp  = (string)$designation_prof_array[$i][$temp];

        	echo "<tr class='warning'>
        		<td>Field </td>
        		<td>$temp</td>
        	</tr>";
        }
    ?>
</table>
     
@stop

@section('sidebar')

	<?php
		echo "<a href=profportal> Profile </a>";

		for($i = 0; $i<$count_desig; $i++)
		{
			echo "<a href=\" ". $designation_prof_array[$i]['href'] ."\">" . $designation_prof_array[$i]['Designtion'] . "</a>";
		 }
		
		if($count_dept_prof!=0)
		{
			echo "<a href='professor'> Professor </a>";
		}

		echo "<a href='/'>Log Out</a>";

	?>
@stop

