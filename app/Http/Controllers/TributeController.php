<?php

namespace App\Http\Controllers;

use App\ActiviesLog;
use App\Mail\infoMail;
use App\Memorial;
use App\Tribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Spatie\Activitylog\Models\Activity;

class TributeController extends Controller
{
    public function store(Request $request, $slug){
        if($request->tribute == '' && $request->hasFile('docs') == ''){
            $request->validate([
                'tribute' => 'required|max:5000',
            ]);
        }

        $imageExtensions = ['txt','docx','doc','pdf'];
        if($request->hasFile('docs')){
            $request->validate([
                'docs' => 'mimes:doc,pdf,docx,txt|max:5000',
            ]);
            $file = $request->file('docs');
            $extension = $file->getClientOriginalExtension();
//            dd($extension);
            if(in_array($extension, $imageExtensions)) {
                $filename = time() . '.' . $extension;
                $file->move('uploads/docs', $filename);
                $docs = $filename;
                $name = 'uploads/docs/' . $docs;
                if($extension == 'pdf'){
                    $content = substr($this->pdf($name), 0, 5000);
                }
                if ($extension == 'txt') {
                    $content = substr(File::get($name), 0, 5000);
                }
                if ($extension == 'docx') {
                    $content = substr($this->read_file_docx($name), 0,5000);
                }
                if ($extension == 'doc') {
                    $content = substr($this->getRawWordText($name), 0, 5000);
                }
            }else {
                 return session()->flash('error','Must be a document');
            }
        }else{
            $content = '';
        }

        $tribute = Tribute::create([
            'tribute' => $request->tribute,
            'user_id' => auth()->user()->id,
            'docs' => $content,
            'slug' => $slug,
        ]);

        ActiviesLog::create([
            'description' => 'shared a tribute',
            'subject_type' => 'App\Tribute',
            'subject_id' => $tribute->id,
            'causer_type' => 'App\User',
            'causer_id' => auth()->user()->id,
            'slug' => $slug
        ]);

        $memorial = Memorial::where('slug', $slug)->where('active', true)->firstOrFail();

        if($memorial->created_by != auth()->user()->id) {
            Mail::to($memorial->users->email)->send(new infoMail($memorial));
        }

        session()->flash('message', 'Tribute Saved Successfully');
        return redirect()->back();
    }


    private function read_file_docx($filename){
        $striped_content = '';
        $content = '';
        if(!$filename || !file_exists($filename)) return false;
        $zip = zip_open($filename);
        if (!$zip || is_numeric($zip)) return false;
        while ($zip_entry = zip_read($zip)) {
            if (zip_entry_open($zip, $zip_entry) == FALSE) continue;
            if (zip_entry_name($zip_entry) != "word/document.xml") continue;
            $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
            zip_entry_close($zip_entry);
        }// end while
        zip_close($zip);
        $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
        $content = str_replace('</w:r></w:p>', "\r\n", $content);
        $striped_content = strip_tags($content);
        return $striped_content;
    }

    private function getRawWordText($filename) {
        if(file_exists($filename)) {
            if(($fh = fopen($filename, 'r')) !== false ) {
                $headers = fread($fh, 0xA00);
                $n1 = ( ord($headers[0x21C]) - 1 );
                $n2 = ( ( ord($headers[0x21D]) - 8 ) * 256 );
                $n3 = ( ( ord($headers[0x21E]) * 256 ) * 256 );
                $n4 = ( ( ( ord($headers[0x21F]) * 256 ) * 256 ) * 256 );
                $textLength = ($n1 + $n2 + $n3 + $n4);
                $extracted_plaintext = fread($fh, $textLength);
                $extracted_plaintext = mb_convert_encoding($extracted_plaintext,'UTF-8');
                return ($extracted_plaintext);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    private function pdf($name){
        $parser = new \Smalot\PdfParser\Parser();
        $pdf    = $parser->parseFile($name);
        $pages  = $pdf->getPages();
        foreach ($pages as $page) {
             return $page->getText();
        }
    }

    public function edit(Tribute $tribute){
        return view('admin.createTribute')
            ->with('data', $tribute);
    }

    public function update(Request $request, Tribute $tribute){
        if($tribute->tribute == NULL){
            $data = $request->validate([
                'docs' => 'required',
            ]);
        }
        else{
            $data = $request->validate([
                'tribute' => 'required',
            ]);
        }

        $tribute->update($data);

        session()->flash('message', 'Tribute Updated successfully');

        return redirect()->back();
    }

    public function activateTribute($tribute){
        $tri = Tribute::findOrFail($tribute);

        $tri->update([
            'active' => true
        ]);

        $activitylog = ActiviesLog::where('subject_id', $tribute);

        $activitylog->update([
            'active' => true
        ]);

        session()->flash('message', 'Tribute Unbanned successfully');

        return redirect()->back();
    }

    public function deactivateTribute($tribute){
        $tri = Tribute::findOrFail($tribute);

        $tri->update([
            'active' => false
        ]);

        $activitylog = ActiviesLog::where('subject_id', $tribute);

        $activitylog->update([
            'active' => false
        ]);

        session()->flash('message', 'Tribute Banned successfully');

        return redirect()->back();
    }

    public function destroy(Tribute $tribute){

//        dd($tribute);

        $tribute->delete();

        $activitylog = ActiviesLog::where('subject_id', $tribute->id);

        $activitylog->delete();

        session()->flash('message','Tribute deleted successfully');

        return redirect()->back();
    }
}
