<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\PdfToImage\Pdf;
// use Spatie\PdfToText\Pdf;
use thiagoalessio\TesseractOCR\TesseractOCR;

class DefaultController extends Controller
{

    /**
     * Show the form for creating the resource.
     */
    public function pdf()
    {

        $text = "";

        // spatie pdf method
        // $text = (new Pdf())
        //     ->setPdf('pdf/arabic.pdf')
        //     ->setOptions(['enc UTF-8'])
        //     ->text();

        // tesseract pdf method supports arabic

        // install libraries
        // wget https://github.com/tesseract-ocr/tessdata_best/raw/main/ara.traineddata -P /usr/local/share/tessdata/
        // echo 'export TESSDATA_PREFIX=/usr/local/share/' >> ~/.bashrc


        // $text = (new TesseractOCR('pdf/arabic.png'))
        // ->lang('ara')
        // ->run();


        // spatie pdf to image
        $pdf = new pdf('pdf/arabic.pdf');

        $pages = $pdf->getNumberOfPages(); //returns an int

        for ($i = 1; $i <= $pages; $i++) {
            $imgpath = "pdf/images/arabic.pdf/img-{$i}.png";
            $pdf->setPage($i)
                ->saveImage($imgpath);

            $text .= (new TesseractOCR($imgpath))
            ->lang('ara')
            ->run();
        }


        return view('welcome', compact('text'));
    }

    /**
     * Show the form for creating the resource.
     */
    public function create(): never
    {
        abort(404);
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request): never
    {
        abort(404);
    }

    /**
     * Display the resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
