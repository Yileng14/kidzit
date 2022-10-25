<?php include 'header.php'; ?>
<style>
tbody.collapse.in {
  display: table-row-group;
}
.table 
{
  border: none;
  text-align: center;
}
.table-bordered th,.table-bordered td{
  border: none;
}

.clickable
{
  border: none;
  background-color:transparent;  
  font-weight: bold;
}
</style>
<body>
  <div class="container py-5">
  <!-- Another variation with a button -->
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Search this blog" style="border-radius: 22px;">
    <div class="input-group-append">
      <button class="btn btn-secondary" type="button" style="border-radius: 22px;">
        <i class="fa fa-search"></i>
      </button>
    </div>
  </div>
<br>

<table class="table table-bordered table-sm ">
    <thead class="thead-dark">
        <tr>
            <th>Order Number</th>
            <th>Order Date</th>
            <th>Total Amount</th>
            <th>Shipping Status</th>
            <th>Invoice</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
          <td>data</td>
          <td>data</td>
            <td>data</td>
            <td>data</td>
            <td>data</td>
            <td><button class="clickable" data-toggle="collapse" data-target="#group-of-rows-1" aria-expanded="false" aria-controls="group-of-rows-1">+</button></td>
        </tr>
    </tbody>
    <tbody id="group-of-rows-1" class="collapse">
        <tr class="table-warning">
            <td><img src="22.jph"/></td>
            <td colspan="2">Quantity x Amount</td>
            <td colspan="3">Total Amount</td>
        </tr>
    </tbody>
</table>
</div>
</body>

<?php include 'footer.php'; ?>