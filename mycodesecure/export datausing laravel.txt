<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Response;
class ExportdataController extends Controller
{
    public function exportToCSV()
{
   // Get your data from the database
   $data = Enquiry::all();

   // Set the CSV headers
   $headers = array(
       "Content-type" => "text/csv",
       "Content-Disposition" => "attachment; filename=messagedata.csv",
       "Pragma" => "no-cache",
       "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
       "Expires" => "0"
   );

   // Open output stream
   $handle = fopen('php://output', 'w');

   // Add CSV headers
   fputcsv($handle, array('S.No', 'First Name', 'Last Name', 'Email', 'Message', 'Created At')); // Add your column names here

   // Add data rows
   foreach ($data as $row) {
       fputcsv($handle, array(
           $row->id,
           $row->fname,
           $row->lname,
           $row->email,
           $row->message,
           $row->created_at,
       ));
   }

   // Close the stream
   fclose($handle);

   // Return the response
   return Response::make('', 200, $headers);
}
}
