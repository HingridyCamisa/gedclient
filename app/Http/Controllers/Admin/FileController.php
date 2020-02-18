<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FileController extends Controller
{


      protected function guard()
  {
      return Auth::guard(app('VoyagerGuard'));
  }


    public function show($token_id)
    {$this->authorize('files');

        $files=Files::where('token_id',$token_id)->get();

        if (!isset($files))
        {
        	 return back()->with('error','Não existe token');
        }
        
        return view('admin.files.show',compact('files','token_id'));
    }

    //remove anexo
        public function removeanexo(Request $request, $token_id)
    {
        $this->authorize('files_remove');

        Storage::delete('/public/anexos/'.$token_id);
        Files::where('filename',$token_id)->delete();
        return back()->with('success','Ficheiro removido.');
    }

       public function addfiles(Request $request, $token_id)
    {
        $this->authorize('files_add');
            $validator = Validator::make($request->all(),[
                'filetype' => 'required',
                'filetype.*' => 'required',
                'file.*' => 'mimes:jpeg,png,pdf,doc,docx,xlsx|max:10000',
                'file' => 'required|max:10000',
            ]);
        if (gettype($request->file)=="array")
        {
            $file=sizeof($request->file);
            $filetype=sizeof($request->filetype);

            if ($file!=$filetype)
            {
                $arr = array('msg' => 'O numero de ficheiros & tipo de ficheiros deve ser igual', 'status' => false);
                return Response()->json($arr);
            }
        }

        if ($validator->passes()) {
            
            foreach($request->file('file') as $key=>$file)
            {   
                $origname=$file->getClientOriginalName();
                $name=time() . '_'.$key.'.'. $origname;
                $file->storeAs('public/anexos', $name);
                $file= new Files();
                $file->filename=$name;
                $file->token_id=$token_id;
                $file->filetype=$request->filetype[$key];
                $file->save();

            }
            
            $arr = array('msg' => 'Ficheiro adicionado.', 'status' => true);
             return Response()->json($arr);
        }

        return response()->json(['errors'=>$validator->errors()->all()]);


     }


}
