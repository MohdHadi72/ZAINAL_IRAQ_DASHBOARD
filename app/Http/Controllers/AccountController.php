<?php

namespace App\Http\Controllers;
use App\Models\Enquiry;
use App\Models\Salesman;
use App\Models\StageSecondDoc;
use Illuminate\Http\Request;
use DateTime;


class AccountController extends Controller
{
    public function index(){
        $data=Salesman::all();
        // return $data;
        return view('account.index',compact('data'));
    }
    public function downPaymentSlip($id){
        $data=Salesman::find($id);
        // $entry=Enquiry::all();
        // return $entry;
        return view('account.downPaymentSlip',compact('data'));
    }
   
  public function paymentInstallment($id){
    // return $id;
    $docs = StageSecondDoc::all();
    // return $docs;
    $salesman = Salesman::with('product')->where('id', $id)->first();
    // return $salesman;
    $totalPrice = $salesman->price;
    $numInstallments = $salesman->emi;
    $date = $salesman->issueDate;
    $installmentDetails = [];
    $beginningBalance = $totalPrice;
    // $monthlyPayment = $totalPrice / $numInstallments;
    $monthlyPayment = ceil($totalPrice / $numInstallments);
    $monthsBetweenPayments = 2; // Change this to set the gap between payments
    
    for ($i = 1; $i <= $totalPrice; $i++) {
        if ($i < $numInstallments || $beginningBalance > 0) { // Calculate principal for all but the last payment
            if ($i % $monthsBetweenPayments == 1) { // Schedule payment every two months
                $endingBalance = $beginningBalance - $monthlyPayment;
                if ($endingBalance < 0) {
                $monthlyPayment += $endingBalance; // Adjust the last payment
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
                    break; // Exit the loop if ending balance becomes zero
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
    
    return view('account.printPaymentSchedule', ['data' => $installmentDetails,'salesman' => $salesman,'docs' => $docs]);
}

public function paymentpost(Request $request, $id)
    {
       
        // Get the input date from the request
        
        
        // Get the current date
        $currentDate = $request->input('current_date');
        $inputDate = $request->input('input_date');
         
        
        // Calculate the gap between input date and current date in months
        $gapMonths = (new DateTime($inputDate))->diff(new DateTime($currentDate))->m;
        // Calculate the gap between EMIs based on the input date
        $monthsBetweenPayments = $gapMonths;

        // Fetch other required data
        $docs = StageSecondDoc::all();
        $salesman = Salesman::findOrFail($id);
        $totalPrice = $salesman->price;
        $numInstallments = $salesman->emi;
        $installmentDetails = [];
        $beginningBalance = $totalPrice;
        $monthlyPayment = ceil($totalPrice / $numInstallments);
        $date = $inputDate; // Set the initial date to the input date
        
        for ($i = 1; $i <= $totalPrice; $i++) {
        if ($i < $numInstallments || $beginningBalance > 0) { // Calculate principal for all but the last payment
             if ($i == 1 || ($i % $monthsBetweenPayments == 1)) {
                $endingBalance = $beginningBalance - $monthlyPayment;
                if ($endingBalance < 0) {
                $monthlyPayment += $endingBalance; // Adjust the last payment
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
                    break; // Exit the loop if ending balance becomes zero
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

        // return $date;
        
    }

        return view('account.printPaymentSchedule', ['data' => $installmentDetails,'salesman' => $salesman,'docs' => $docs]);
    }


    
}
