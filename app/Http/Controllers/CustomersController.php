<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use PDF;
use Illuminate\Support\facades\storage;

class CustomersController extends Controller
{
    public function index() {
        return view('Customers');
    }

		public function save_Customer(Request $request)
		{
				$Customers = new Customers;
				$Customers->fname = $request['fname'];
				$Customers->lname = $request['lname'];
				$Customers->email = $request['email'];
				$Customers->save();
			   

            $pdf = PDF::loadView('download-pdf.Customers-pdf', [
                'fname' => $request->input('fname'),
                'lname' => $request->input('lname'),
                'email' => $request->input('email'),
            ]);
           
          storage::put('public/storage/'.'-'.rand().'.'.'pdf', $pdf->output());
      
             return response()->json(['success' => 'Data Submitted Successfully']);
    }
}
