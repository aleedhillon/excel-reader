<?php

namespace App\Http\Controllers;

use App\Imports\DataImport;
use App\Models\Sheet;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function index()
    {
        $sheets = Sheet::all();

        return view('excels.index', [
            'sheets' => $sheets
        ]);
    }

    public function create()
    {
        return view('excels.create');
    }

    public function show(Sheet $sheet)
    {
        return view('excels.show', [
            'name' => $sheet->name,
            'rows' => $sheet->rows,
            'columns' => $sheet->columns
        ]);
    }

    public function store(Request $request)
    {
        $file = $request->file('excel');

        $dataImport = new DataImport();
        $dataImport->fileName = $file->getClientOriginalName();
        Excel::import($dataImport, $file);

        return redirect()->route('sheets.index');
    }
}
