@extends('layout')

@section('title')
    Student's Portal
@stop

@section('css')
 body{
        background-image: url("/images/3.jpg");
    }
@stop

@section('mainbody')

    <?php
        $userdetail = session()->get('SESSION_userdetail' , 'default_session_userdetail');
        //dd($userdetail);
        $username = $userdetail[0];
        $userpass = $userdetail[1];
        //collection
        $usertable = DB::table('student_dept_prof')->where('Student Name',$username)->get();
        
        //array
        $result = json_decode($usertable, true);
        $dept = $result[0]['department'];
        
        $column =DB::connection()->getSchemaBuilder()->getColumnListing("student_dept_prof");
        $tofindcount=collect($column);
        $count= $tofindcount->count();
    ?>

    <table class="table table-bordered table-condensed table-responsive table-hover" style="">
        <thead>
            <tr class='active'>
                <th>Coloumn Name</th>
                <th>Comments</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i=0;
                while($i<$count)
                {
                    $temp = $column[$i];
                    if($temp == "id")
                    {
                       $i = $i + 1;
                       continue;
                    }

                    $temp = (string)$temp;
                    $profid = $temp;
                    $temp  = (string)$result[0][$temp];
                    if($temp == "")
                    {
                        $i = $i + 1;
                        continue;
                    }
                    // echo $profid;

                    $prof = DB::table('prof')->where('id' , $profid)->get();
                    // $prof = json_decode($prof , true);
                    // echo $prof->count(); 
                    if($prof->count() == 0)
                    {
                        // echo $i;
                        $i = $i +1;
                        continue;
                    }
                    else
                    {
                        // dd($prof);
                        $prof = json_decode($prof , true);
                        $profname = $prof[0]['Prof Name'];
                        // echo $profname;
                    }
                    
                    if($temp == "0")
                    {
                        echo"<tr class='danger' >
                            <td>Prof $profname</td>
                            <td>Dues Not Cleared Yet</td>
                        </tr>";
                        $i = $i + 1;
                        $temp = $column[$i];
                        $temp = (string)$temp;
                        $temp  = (string)$result[0][$temp];
                        echo"<tr class='warning'>
                            <td>Comments by $profname</td>
                            <td>$temp</td>
                        </tr>";
                        $i = $i + 1;
                    }
                    else if($temp == "1")
                    {
                        echo"<tr class='success'>
                            <td>$profname </td>
                            <td>Dues Cleared</td>
                        </tr>";
                        $i = $i + 1;
                    }
                    else
                    {
                        echo"<tr class='info'>
                            <td>Prof $profname </td>
                            <td>$temp</td>
                        </tr>";
                        $i = $i + 1;
                    }

                }
            ?>
        </tbody>
    </table>

@stop


@section('sidebar')
        <a href='studentportal'>Profile</a>
        <a href='/department'>{{$dept}} professor</a>
        <a href="/">Log Out</a>
@stop
