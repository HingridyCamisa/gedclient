<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comentarios;
use Auth;

class ComentariosController extends Controller
{

    function __construct()
    {
         $this->middleware('auth');

    }


    public function comentsave(Request $request)
    {
         $task=Comentarios::create($request->all());


        $arr = array('msg' => 'Something goes to wrong. Please try again ', 'status' => false);
        if($task){ 
        $arr = array('msg' => 'Successfully', 'status' => true);
        }
        return Response()->json($arr);
    }

    public function allcomments(Request $request)
    {

            $task=Comentarios::where('task_id',$request->task_id)->where('token_id',$request->token_id)->join('users','comment.user_id','users.id')->select('comment.*','users.name','users.avatar')->get();    
            $output='';

            if($task)

            {

                foreach ($task as $key => $tasks) {
                    $my='';
                    if ($tasks->user_id==Auth::user()->id)
                    {
                    	$my='right';
                    }
                    
                    $url='storage/'.$tasks->avatar;
                    $output.='
                        <div class="direct-chat-msg '.$my.'">
                          <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-left">'.$tasks->name.' '.$tasks->lname.'</span>
                            <span class="direct-chat-timestamp pull-right">'.$tasks->created_at." | ".$tasks->created_at->diffForHumans().'</span>
                          </div>
                
                          <img class="direct-chat-img" src="'.asset($url).'" alt="User Image">
                          <div class="direct-chat-text">
                            '.$tasks->message.'
                          </div>
                          <!-- /.direct-chat-text -->
                        </div>';


                   

                }

            }
             return Response($output);
    }   
}
