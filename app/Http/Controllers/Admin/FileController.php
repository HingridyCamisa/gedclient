<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function show($token_id)
    {

        $files=Files::where('token_id',$token_id)->get();
        return view('admin.files.show',compact('files','token_id'));
    }

    //remove anexo
        public function removeanexo(Request $request, $token_id)
    {

        Storage::delete('/public/anexos/'.$token_id);
        Files::where('filename',$token_id)->delete();
        return back()->with('success','Ficheiro removido.');
    }

       public function addfiles(Request $request, $token_id)
    {
           $validatedata=$request->validate([
                'filetype.*' => 'required',
                'file' => 'required',
                'file.*' => 'mimes:jpeg,png,pdf,doc,docx,xlsx|max:10000',
            ]);

          if ($request->file('file'))
        {
        
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
        }

            return back()->with('success','Ficheiro adicionado.');


     }


}
