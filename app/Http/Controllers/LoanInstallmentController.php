<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\LoanInstallment;

use function PHPSTORM_META\type;

class LoanInstallmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Loan $loan)
    {   
        return view('client.show', [
            'clientLoan' => $loan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Loan $loan)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $paid = '1';
        $column = 'statusLoanInstallment';
        $loanInstallment = LoanInstallment::where($column, '=', $paid)->first();

        $loanInstallment->paidDate = date("Y-m-d"); 
        $loanInstallment->statusLoanInstallment = 0;
        $loanInstallment->save();
        return redirect('/clients/' .$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function generateInstallments($id, Loan $loan){
       /*  $loan = $loanIns->id = $id; */
       /*  dd($loan); */
       /*  $clientLoan->client_id = $client->id; */
       $debt = $loan->borrowedCapital;
       $type = $loan->period;
       $interest = $loan->appliedInterest;
       $installment = $loan->amountInstallments;
       $totalint=0;

       //Date
       function powDays($dateSend,$days)
       {
           $datestart= strtotime($dateSend);
           $total = (($days) * 86400)+$datestart; 
           $dateSend = date('Y-m-d', $total);
           $date = strtotime($dateSend);
           $date = date("l", $date);
           $date = strtolower($date);
           if($date == 'sunday'){
               $datestart= strtotime($dateSend);
               $total = ((1) * 86400)+$datestart; 
               /* $day = date("l", $total); */
               return date('Y-m-d', $total);
           }else{
               /* $day = date("l", $total); */
               return date('Y-m-d', $total);
           }
       }

       // calculate
       $interest=($interest/$type);
       $m=($debt*$interest*(pow((1+$interest),($installment*1))))/((pow((1+$interest),($installment*1)))-1);
           
       //Set typo
       $period = 0;
       if($type === 36000){
           $period = 1;
       }else if ($type === 4800){
           $period = 7;
       }else if ($type === 1200){
           $period = 30;
       }
       $payDay = date("Y-m-d");        
       //send db
       for ($i=1;$i<=$installment*1;$i++) {
           $loanInstallment = new LoanInstallment();
           /* echo "<tr>";
               echo "<td align=right>".$i."</td>"; */
               $payDay = powDays($payDay,$period);
               $loanInstallment->payDate = $payDay;
/*             $loanInstallment->payDate = null;
               $loanInstallment->paidDate = null; */

               /* $totalint=$totalint+($debt*$interest); */

               /* echo "<td align=right>".number_format($debt*$interest,2,".",",")."</td>"; */
               $loanInstallment->InterestInstallment = $debt*$interest;

               /* echo "<td align=right>".number_format($m-($debt*$interest),2,".",",")."</td>"; */
               $loanInstallment->installmentBalance = $m-($debt*$interest);

               $debt=$debt-($m-($debt*$interest));
               if ($debt<0) {
                   /* echo "<td align=right>0</td>"; */
                   $loanInstallment->capital = 0;
               } else {
                   /* echo "<td align=right>".number_format($debt,2,".",",")."</td>"; */
                   $loanInstallment->capital = $debt;
               }
               $loanInstallment->statusLoanInstallment = 1;
               $loanInstallment->loan_id = $loan->id;
               $loanInstallment->save();
       }

       return redirect('/clients/' . $loan->id);
    }
}
