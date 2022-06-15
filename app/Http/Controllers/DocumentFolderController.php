<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentFolder;
use Illuminate\Support\Str;

class DocumentFolderController extends Controller
{
    private $_app = "";
    private $_page = "pages.document_folders.";
    private $_data = [];

    public function _construct()
    {
       
    }

    public function index()
    {
        $this->_data['documentFolders'] = DocumentFolder::all();
        return view($this->_page.'index',$this->_data);
    }

    public function create()
    {
        return view($this->_page.'create',$this->_data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        
        $data = $request->except('_token');
        $documentFolder = new DocumentFolder();
        $documentFolder->name = $data['name'];
        $documentFolder->descriptions = $data['descriptions'];
        $documentFolder->folder = $data['name'];
       
        if ($documentFolder->save()) {
            return redirect()->route('document_folders.index')->with('success', 'Your Document Folder has been Added .');
        }
        return redirect()->back()->with('fail', 'Information could not be added .');
    }

    public function edit($id)
    {
        $this->_data['data'] = DocumentFolder::find($id);
        return view($this->_page.'edit',$this->_data);
    }

    public function update(Request $request,$id)
    {

        $this->validate($request, [
            'name' => 'required',
        ]);

        $data = $request->input();
        $documentFolder = DocumentFolder::findOrFail($id);
        $documentFolder->fill($data);
        if ($documentFolder->save()){
            return redirect()->route('document_folders.index')->with('success', 'Your Information has been Updated .');
        }
        return redirect()->back()->with('fail', 'Information could not be added .');
    }

    public function delete($id)
    {
        $documentFolder = DocumentFolder::findOrFail($id);
        if ($documentFolder->delete()){
            return redirect()->route('document_folders.index')->with('success', 'Your Information has been deleted .');
        }
        return redirect()->back()->with('fail', 'Information could not be deleted .');
    }

}
