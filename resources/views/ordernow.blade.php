@extends('master')
@section("content")
<div class="custom-product">
    <div class="col-sm-10">
    <table class="table table-striped">
  
    <tbody>
      <tr>
        <td>Amount</td>
        <td>€{{$total}}</td>
      </tr>
      <tr>
        <td>Tax</td>
        <td>€0</td>
      </tr>
      <tr>
        <td>Delivery charges</td>
        <td>€5</td>
      </tr>
      <tr>
        <td>Total Amount</td>
        <td>€{{$total+5}}</td>
      </tr>
    </tbody>
  </table>
            <div>
            <form class="form-inline" action="/orderplace" method="post">
            @csrf
                <div class="form-group">
                   <textarea name="address"placeholder="Enter your Address" class="form-control" required></textarea>
                </div>
                <br/><br/>
                <div class="form-group"><br/><br/>
                    <label >Payment Method</label><br/><br/>
                    <input type="radio" value="cash" name="payment"><span>Online Payment</span><br/><br/>
                    <input type="radio" value="cash"name="payment"><span>EMI</span><br/><br/>
                    <input type="radio" value="cash" name="payment"><span>Cash on Delivery</span><br/><br/>
                </div>
                <br/><br/>
                
                <button type="submit" class="btn btn-default">Order Now</button>
                
            </form>
            </div>
    </div>
</div>

            
@endsection
