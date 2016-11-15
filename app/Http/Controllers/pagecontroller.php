<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pagecontroller extends Controller
{
    // log-in page
    public function login()
    {
        return view('login');
    }

    //redirecting to correct log in page
    public function logincheck(Request $request)
    {
    	$user=$request["user"];
    	$pass=$request["pass"];
    	$pass_encrypt=sha1($pass);

        $users_stud = DB::table('student')->where('Student Name',$user)->get();

        $prof_dept_pass='[]' ;
        $designation_pass = '[]';
        $profdetail = '[]';
        if($users_stud != '[]' )
        {
           $users_pass = DB::table('student')->where('Student Name',$user)->where('Password',$pass_encrypt)->get();
            if( $users_pass != '[]' )
            {
                $userdetail = [ $user , $pass_encrypt ];
                session()->put('SESSION_userdetail', collect($userdetail));
                return view('studentportal' , compact('userdetail'));
            }
        }
        // not found in the student table
        else // find in the prof which have some designation
        {
            $designation = DB::table('prof_designation')->where('Prof Name',$user)->get();

            if($designation != '[]' )
            {
                $designation_pass = DB::table('prof_designation')->where('Prof Name',$user)->where('Password',$pass_encrypt)->get();

            }
            //tocheck normalprof
            $prof_dept=DB::table('prof')->where('Prof Name',$user)->get();
           
            if($prof_dept != '[]' )
            {
                $dept="cse";// harcoded
                $prof_dept_pass = DB::table('prof')->where('Prof Name',$user)->where('Password',$pass_encrypt)->get();
                if( $prof_dept_pass!='[]')
                {
                    $profdetail = [ $user , $pass_encrypt ,$dept];
                }
            }
        }

        if($profdetail!='[]' || $designation_pass != '[]' )
        {
            session()->put('SESSION_dept_prof', collect($profdetail));
            session()->put('SESSION_designation', $designation_pass);
            return view('profportal' , compact('designation_pass','profdetail'));
        }

        else
        {
            //not in any folder
            //to return back tologin page
            echo "User not Found in the Database<br>";
        }

 
        
    }
}
