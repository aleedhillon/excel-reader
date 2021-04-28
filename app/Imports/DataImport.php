<?php

namespace App\Imports;

use App\Models\ColumnName;
use App\Models\Row;
use App\Models\Sheet;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class DataImport implements ToCollection
{
    public $fileName;

    public function collection(Collection $collection)
    {
        $attributeNames = $collection->shift();

        $rows = collect();

        foreach ($collection as $row) {
            $item = [];
            foreach ($attributeNames as $key => $attribute) {
                $item[$attribute] = $row[$key];
            }

            $rows->push($item);
        }

        $sheet = new Sheet();
        $sheet->name = $this->fileName;
        $sheet->save();

        foreach ($attributeNames as $name) {
            $columnName = new ColumnName();
            $columnName->name = $name;

            $sheet->columns()->save($columnName);
        }

        $rows->each(function ($rowData) use ($sheet) {
            $row = new Row();
            $row->data = json_encode($rowData);

            $sheet->rows()->save($row);
        });
    }
}
