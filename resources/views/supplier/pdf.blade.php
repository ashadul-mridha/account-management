<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <style>
        .bank_info{
            background-color: #04243c;
        }
        .bank_info>h1,h2,h3{
            text-align: center;
            color: white;
        }
        table, th, td {
  border: 1px solid black;
}

        td {
                text-align: center;
            }
        th, td {
            border-bottom: 1px solid #ddd;
        }
        th {
  background-color: #4CAF50;
  color: white;
}
.table_center {
  margin-left: 25%;
}
.tran_head>h1{
    float: center;
    color: red;
}

    </style>
</head>
<body>
    <header>
            <div class="bank_info">
                <h1>Supplier Name: {{$supplier->supplier_name}}</h1>
                <h2>Account Number: {{$supplier->account_number}}</h2>
                <h3>Service: {{$supplier->service}}</h3>
          </div>
    </header>
    <main>
        <div>
            <span class="float: left">Payable Amount:</span>
            <span class="float: right">{{$payment_amount}}</span>
        </div>
        <div>
            <span class="float: left">Pay Amount:</span>
            <span class="float: right">{{$customer_debit}}</span>
        </div>
        <div style="width: 50%; color:black">
            <hr>
        </div>
        <div>
            <span class="float: left">Get Money:</span>
            <span class="float: right">{{ $cus_payable_amount}}</span>
        </div>
    </main>
      
    <div class="tran_head">
        <h1>Transaction:</h1>
    </div>
        <div class="table_center">
            <table style="color:#04243c;">
                <thead>
                    <tr>
                        <th>Sl No:</th>
                        <th>Date</th>
                        <th>Transaction ID</th>
                        <th>Notes</th>
                        <th>Debit</th>
                        <th>Credit</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sl = 1;
                        $tran_id = mt_rand( 1000000000, 9999999999 );
                    @endphp
                    @foreach ($ac_info as $row)
                    <tr>
                        <td>{{$sl++}}</td>
                        <td>{{date('d-m-Y', strtotime($row->created_at))}}</td>
                        <td>{{$tran_id++}}</td>
                        <td>{{$row->notes}}</td>
                        <td>{{$row->dr == null ? ' ' : $row->dr}}</td>
                        <td>{{$row->cr == null ? ' ' : $row->cr}}</td>
                    </tr>  
                    @endforeach
                </tbody>
            </table>
        </div>
    
</body>
</html>