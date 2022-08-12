<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use PDF;
  
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $data = [
            'title' => 'title',
            //'date' => date('m/d/Y')
        ];
          
        $pdf = PDF::loadView('PDFTest', $data);
    
        return $pdf->download('filename.pdf');
    }
}