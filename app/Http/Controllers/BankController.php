<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salesman;


class BankController extends Controller
{
    public function index(){
        return view('bank.index');
    }
    
      public function bankPaymentProcsess($id){
    $salesman = Salesman::with('product')->where('id', $id)->first();
    $totalPrice = $salesman->price;
    $numInstallments = $salesman->emi;
    $date = $salesman->issueDate;
    $installmentDetails = [];
    $beginningBalance = $totalPrice;
    $monthlyPayment = ceil($totalPrice / $numInstallments);
    $monthsBetweenPayments = 2; // Change this to set the gap between payments
    
    for ($i = 1; $i <= $totalPrice; $i++) {
        if ($i < $numInstallments || $beginningBalance > 0) { 
            if ($i % $monthsBetweenPayments == 1) { 
                $endingBalance = $beginningBalance - $monthlyPayment;
                if ($endingBalance < 0) {
                $monthlyPayment += $endingBalance; 
                $endingBalance = 0;
            }
                $installmentDetails[] = [
                    'month' => $i,
                    'beginning' => $beginningBalance,
                    'monthly_payment' => $monthlyPayment,
                    'principal_rate' => $monthlyPayment,
                    'ending_balance' => $endingBalance,
                    'date' => $date
                ];
                 if ($endingBalance == 0) {
                    break; 
                }
            }
        } else { 
            // Last payment, set balance to zero and adjust monthly payment if there's a gap
            $monthsLeft = $numInstallments - count($installmentDetails);
            if ($monthsLeft > 1) {
                // Adjust monthly payment if there are more than one month left but less than the full term
                $monthlyPayment = $beginningBalance / $monthsLeft;
            }
            $endingBalance = 0;
            
            $installmentDetails[] = [
                'month' => $i,
                'beginning' => $beginningBalance,
                'monthly_payment' => $monthlyPayment,
                'principal_rate' => $beginningBalance,
                'ending_balance' => $endingBalance,
                'date' => $date
            ];
             if ($endingBalance == 0) {
                    break; // Exit the loop if ending balance becomes zero
                }
             // exit the loop after the last installment is added
        }
        
        $beginningBalance = $endingBalance ?? $beginningBalance; // Set beginning balance for next iteration
        
        // Increment the date by two months
        $date = date('Y-m-d', strtotime("$date +$monthsBetweenPayments months"));
    }
    
    return view('bank.bankpaymentprocess', ['data' => $installmentDetails,'salesman' => $salesman]);
}
    public function bankPaid(Request $request){
        return $request;
        return view('bank.bankpaymentprocess');
    }

    
    public function productlistAjax(Request $request)
    {
        $query = $request->get('term', ''); // 'term' is the default parameter used by jQuery UI autocomplete

        $products = Salesman::where('uiid', 'like', '%' . $query . '%')
            ->pluck('title');

        return response()->json($products);
        ;
    }
    public function searchProduct(Request $request)
    {
        $search_product = $request->search;
        if ($search_product != "") {
            $product = Salesman::where('uiid', "LIKE", "%$search_product")->first();
            if ($product) {
                return redirect('bank-payment-process/' . $product->id);
            } else {
                return redirect('/bank')->with("status", "Didn't Match your Application No.");
            }
        } else {
            return redirect()->back();
        }
    }
}
