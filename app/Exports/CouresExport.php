<?php

namespace App\Exports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\FromCollection;

// class CouresExport implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
        
//               $data=Course::select('title', 'category',
//                'type', 'technology','duration', 'startdate')->get();
//              return $data;
//              //  return Course::all();
//     }
// }
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CouresExport implements FromView
{
    public function view(): View
    {
        return view('Courses.pdf', [
            'Courses' => Course::all()
        ]);
    }
}
