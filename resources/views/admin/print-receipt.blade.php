<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>::Print receipt::</title>

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">


</head>
<body>
  <div class="container">
    <div class="row text-center">
      <div class="col-md-4"></div>
      <div class="col-md-4 bordered">
        <h1>{{$settings->business_name ?? 'INVENTORY'}}</h1>
        <small>{{$settings->business_address ?? ''}} | </small>
        <small>{{$settings->contact_email ?? ''}} | </small>
        <small>{{$settings->contact_phone ?? ''}}</small>
        <h3>Sales receipt</h3>
        <h6>Date: {{date('d/m/Y')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cashier: {{$salesData['reg_by']}}</h6>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>S/N</th>
              <th>Item</th>
              <th>Quantity</th>
              <th>Unit cost</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
                @forelse ($salesData['products'] as $product)
                <tr>
                  <td>{{ $loop->index }}</td>
                  <td>{{ $product->productName }}</td>
                  <td>{{ $product->quantity }}</td>
                  <td>{{ $product->selling_price }}</td>
                  <td>{{ $product->total }}</td>
                </tr>
                @empty
                <tr>
                  <td colspan="5">No item yet. Click on <a href="#">new sales</a> to make sales </td>
                </tr>
                @endforelse
                <tr>
                <td colspan="5"></td>
                </tr>
                <tr>
                  <td>Discount on sales:<br><span style='background: #000;color:#fff; padding:5px'>{{$salesData['discount']}}</span></td>
                  <td>Debt on sales:<br><span style='background: #000;color:#fff; padding:5px'>{{$salesData['debt_balance']}}</span></td>
                  <td>Amount paid:<br><span style='background: #000;color:#fff; padding:5px'>{{$salesData['total']}}</span></td>
                  <td>Payment method:<br><span style='background: #000;color:#fff; padding:5px'>{{$salesData['method_of_payment']}}</span></td>
                  <td>Debt ID:<br><span style='background: #000;color:#fff; padding:5px'>{{$salesData['debt_id'] ?? 'NILL'}}</span></td>
                </tr>
                <tr>
                  <td colspan="3">Customer name: {{$salesData['customer_name'] ?? ''}}</td>
                  <td colspan="2">Customer phone: {{$salesData['customer_phone']  ?? ''}}</td>
                </tr>
                <tr>
                  <td colspan="5" style="color: #fff; background: #000">
                    {{$settings->receipt_message ?? 'Thank you for the patronage'}}
                    <hr>
                    <div id='msg' style="display: none">
                    <button type="button" class="btn btn-success" onclick="location.reload()">Reprint</button>
                    <x-nav-link :href="route('sales')" class="btn btn-primary">
                      &lt;&lt;New sales
                    </x-nav-link>
                  </div>    
                  </td>
                </tr>

          </tbody>
        </table>
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>
  


<!-- jQuery 3 -->
<script src="/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
    window.print();
    setTimeout(() => {
      document.getElementById('msg').style.display='block'   
    }, 1200);
  </script>
</body>
</html>