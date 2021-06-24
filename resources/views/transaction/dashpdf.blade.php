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
                <h2>Current Month Transaction</h2>
          </div>
    </header>
    <main>
        <div>
            <span class="float: left">Total Debit:</span>
            <span class="float: right">{{ $debit}}</span>
        </div>
        <div>
            <span class="float: left">Total Credit:</span>
            <span class="float: right">{{ $credit}}</span>
        </div>
    </main>
    
        <div class="table_center">
            <table style="color:#04243c;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Bank Information</th>
                        <th>Customer Information</th>
                        <th>Debit</th>
                        <th>Credit</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sl= 1;
                    @endphp
                    @foreach ($monthly_data as $row)
                    <tr>
                        <td>{{$sl++}}</td>

                        <td>
                        {{ $row->bank->name}}
                        <br>
                        {{$row->bank->account_number}}
                        </td>

                        <td>
                        {{ $row->supplier->supplier_name}}
                        <br>
                        {{ $row->supplier->mobile_number}}
                        </td>

                        <td>{{$row->dr == null ? '' : $row->dr}}</td>

                        <td>{{$row->cr == null ? '' : $row->cr}}</td>
                        
                        </td>
                        <td>{{$row->notes}}</td>
                    </tr>  
                    @endforeach
                </tbody>
            </table>
        </div>
    
</body>
</html>