<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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

    /**
    * Process the form request and display the result along with the calculator form.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function calculate(Request $request)
    {
        $debt = $request->get('borrowedCapital');
        $type = $request->get('type');
        $interest = $request->get('appliedInterest');
        $installment = $request->get('amountInstallments');
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
                $day = date("l", $total);
                return date('Y-m-d', $total). " " . $day;
            }else{
                $day = date("l", $total);
                return date('Y-m-d', $total). " " . $day;
            }
        }

        // calculate
        $interest=($interest/$type);
        $m=($debt*$interest*(pow((1+$interest),($installment*1))))/((pow((1+$interest),($installment*1)))-1);
    
        echo "<div>Capital Inicial: Q. ".number_format($debt,2,".",",")."";
        echo "<br>Cuota a pagar: Q. ".number_format($m,2,".",",")."</div>";

        /* echo <table border="1" cellpadding="5" cellspacing="0">; */

        echo "<table border='1' cellpadding='5' cellspacing='0'>
        <tr>
            <th>Cuota</th>
            <th>Fecha Pago</th>
            <th>Intereses</th>
            <th>Saldo a pagar</th>
            <th>Capital Pendiente</th>
        </tr>"; 

        // mostramos todos los meses...
       
        //Set typo
        $period = 0;
        if($type === "36000"){
            $period = 1;
        }else if ($type === "4800"){
            $period = 7;
        }else if ($type === "1200"){
            $period = 30;
        }
        $payDay = date("Y-m-d");
        for ($i=1;$i<=$installment*1;$i++) {
            echo "<tr>";
                echo "<td align=right>".$i."</td>";
                $payDay = powDays($payDay,$period);
                echo "<td align=left>".$payDay."</td>";

                $totalint=$totalint+($debt*$interest);
                echo "<td align=right>".number_format($debt*$interest,2,".",",")."</td>";
                echo "<td align=right>".number_format($m-($debt*$interest),2,".",",")."</td>";
 
                $debt=$debt-($m-($debt*$interest));
                if ($debt<0) {
                    echo "<td align=right>0</td>";
                } else {
                    echo "<td align=right>".number_format($debt,2,".",",")."</td>";
                }
            echo "</tr>";
        }

    echo "</table>
    Pago total de interestes: Q."; 
    echo number_format($totalint,2,".",",");
        
    echo "<br><br> <a href='/clients'>Regresar</a>";
    echo "<br><br> <a href='#'>Imprimir</a>";
    }
}
