<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\FiscalYear;
use App\Models\DocumentFolder;
use App\Models\UserLog;
use Auth;

class DocumentsController extends Controller
{
    private $_app = "";
    private $_page = "pages.documents.";
    private $_data = [];

    public function _construct()
    {
       
    }

    public function index()
    {
        $this->_data['issuedCertificates'] = Document::all();
        return view($this->_page.'index',$this->_data);
    }

    public function create(Request $request)
    {
        $docId = null;
        if ($request->has('docId')) {
            $docId = $request->docId;
        }
        $fiscalYear = FiscalYear::pluck('name','id');
        $fiscalYear->prepend('Select Fiscal Year', '');
        $docFolder = DocumentFolder::pluck('name','id');
        $docFolder->prepend('Select DocumentFolder', '');
        $this->_data['fiscalYear'] = $fiscalYear;
        $this->_data['docFolder'] = $docFolder;
        $this->_data['docId'] = $docId;
        return view($this->_page.'create',$this->_data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'fiscal_year_id' => 'required'
        ]);
        // dd($request->all());
        $data = $request->except('_token');
        $document = new Document();
        $document->name = $data['name'];
        $document->document_folder_id = $data['document_folder_id'];
        $document->description = $data['description'];
        $document->fiscal_year_id = $data['fiscal_year_id'];

        //
        $docFolder = DocumentFolder::find($data['document_folder_id']);
        $doc_path = 'documents/'.$docFolder->folder;
        $doc_name = $data['name'].'.'.$data['document_file']->getClientOriginalExtension();
        $data['document_file']->storeAs($doc_path,$doc_name,'public');
        $document->file_path = $doc_name;

        if ($document->save()) {
            $this->addToLog("Add",$document->name);
            return redirect()->route('documents.list',$data['document_folder_id'])->with('success', 'Your Information has been Added .');
        }
        return redirect()->back()->with('fail', 'Information could not be added .');
    }

    public function edit($id)
    {
        $fiscalYear = FiscalYear::pluck('name','id');
        $fiscalYear->prepend('Select Fiscal Year', '0');
        $docFolder = DocumentFolder::pluck('name','id');
        $docFolder->prepend('Select DocumentFolder', '0');
        $this->_data['fiscalYear'] = $fiscalYear;
        $this->_data['docFolder'] = $docFolder;
        $this->_data['data'] = Document::find($id);
        return view($this->_page.'edit',$this->_data);
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required',
            'fiscal_year_id' => 'required'
        ]);

        $data = $request->input();
        $documents = Document::findOrFail($id);

        if ($request->has('document_file')) {
            $docFolder = DocumentFolder::find($data['document_folder_id']);
            $doc_path = 'documents/'.$docFolder->folder;
            $doc_name = $data['name'].'.'.$request->document_file->getClientOriginalExtension();
            $request->document_file->storeAs($doc_path,$doc_name,'public');
            $data['file_path'] = $doc_name;
        }
        $documents->fill($data);
        
        if ($documents->save()){
            $this->addToLog("Update",$data['name']);
            return redirect()->route('documents.list',$data['document_folder_id'])->with('success', 'Your Information has been Updated .');
        }
        return redirect()->back()->with('fail', 'Information could not be added .');
    }

    public function listByDocFolder($docId)
    {
        $this->_data['docId'] = $docId;
        $this->_data['documents'] = Document::where('document_folder_id',$docId)->get();
        $this->_data['docFolder'] = DocumentFolder::find($docId);
        return view($this->_page.'list',$this->_data);
    }

    public function delete($id)
    {
        $document = Document::findOrFail($id);
        if ($document->delete()) {
            return redirect()->back()->with('success', "Deleted");
        }
        return redirect()->back()->with('fail', "Documents could not be deleted.");
    }

    public function addToLog($activity,$docName) {
        $log = new UserLog();
        $log->user_id = Auth::id();
        $log->activity = $activity;
        $description = ($activity == "Add") ? "added" : "updated";
        $log->description = $docName.' named document has been '.$description;
        $log->save();
    }
}
