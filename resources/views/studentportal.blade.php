@extends('layout')

@section('title')
    Student's Portal
@stop

@section('css')
 body{
        background-image: url("/images/2.jpg");
    }
@stop

@section('mainbody')

    <?php
        $userdetail  = session()->get('SESSION_userdetail' , 'default_userdetail');
        $username = $userdetail[0];
        $userpass = $userdetail[1];

        //collection
        $usertable = DB::table('student')->where('Student Name',$username)->get();
        //array
        $result = json_decode($usertable, true);
        $dept = $result[0]['Department'];
        
        $column =DB::connection()->getSchemaBuilder()->getColumnListing("student");
        $tofindcount=collect($column);
        $count= $tofindcount->count();
    ?>

    <table class="table table-bordered table-condensed table-responsive table-hover" style="">
        <thead>
            <tr class='active' style="color: black;">
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
                    if($temp == "Password")
                    {
                       $i = $i + 1;
                       continue;
                    }

                    $temp = (string)$temp;
                    $temp  = (string)$result[0][$temp];
                    if($temp == "")
                    {
                        $i = $i + 1;
                        continue;
                    }
                    if($temp == "0")
                    {
                        echo"<tr class='danger' style='border: 1px red solid;' >
                            <td>$column[$i] </td>
                            <td>Dues Not Cleared Yet</td>
                        </tr>";
                        $i = $i + 1;
                        $temp = $column[$i];
                        $temp = (string)$temp;
                        $temp  = (string)$result[0][$temp];
                        echo"<tr class='warning'>
                            <td>$column[$i] </td>
                            <td>$temp</td>
                        </tr>";
                        $i = $i + 1;
                    }
                    else if($temp == "1")
                    {
                        echo"<tr class='success'>
                            <td>$column[$i] </td>
                            <td>Dues Cleared</td>
                        </tr>";
                        $i = $i + 1;
                    }
                    else
                    {
                        echo"<tr class='info'>
                            <td>$column[$i] </td>
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
        <a href='#'>Profile</a>
        <a href='/department'>{{$dept}} professor</a>
        <a href="/">Log Out</a>
@stop
