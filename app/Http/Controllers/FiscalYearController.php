<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FiscalYear;

class FiscalYearController extends Controller
{
    private $_app = "";
    private $_page = "pages.fiscal_years.";
    private $_data = [];

    public function _construct()
    {
       
    }

    public function index()
    {
        $this->_data['fiscalYears'] = FiscalYear::all();
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
        $fiscalYear = new FiscalYear();
        if ($fiscalYear->create($data)) {
            return redirect()->route('fiscal_years.index')->with('success', 'Your Document Folder has been Added .');
        }
        return redirect()->back()->with('fail', 'Information could not be added .');
    }

    public function edit($id)
    {
        $this->_data['data'] = FiscalYear::find($id);
        return view($this->_page.'edit',$this->_data);
    }

    public function update(Request $request,$id)
    {

        $this->validate($request, [
            'name' => 'required',
        ]);

        $data = $request->input();
        $fiscalYear = FiscalYear::findOrFail($id);
        $fiscalYear->fill($data);
        if ($fiscalYear->save()){
            return redirect()->route('fiscal_years.index')->with('success', 'Your Information has been Updated .');
        }
        return redirect()->back()->with('fail', 'Information could not be added .');
    }

    public function destroy($id)
    {
        $fiscalYear = FiscalYear::findOrFail($id);
        if ($fiscalYear->delete()){
            return redirect()->route('fiscal_years.index')->with('success', 'Your Information has been deleted .');
        }
        return redirect()->back()->with('fail', 'Information could not be deleted .');
    }
}
