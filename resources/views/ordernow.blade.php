@extends('master');

@section('content')
    <div class="container custom-product">
        <div class="col-sm-10">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Amount</td>
                        <td>${{ $total }}</td>
                    </tr>
                    <tr>
                        <td>Tax</td>
                        <td>$0</td>
                    </tr>
                    <tr>
                        <td>Delivery Fee</td>
                        <td>$10</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>${{ $total + 10 }}</td>
                    </tr>
                </tbody>
            </table>
            <div>
                <form action="orderplace" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="deliveryaddress">Delivery address</label>
                        <textarea class="form-control" name="deliveryaddress" id="deliveryaddress"
                            placeholder="Enter Delivery Address"></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Payment Method</label><br>
                        <input type="radio" class="form-check-input" name="payment" value="Cash"><span> Online
                            Payment</span><br>
                        <input type="radio" class="form-check-input" name="payment" value="Creditcard"><span>Credit Card
                            Payment</span><br>
                        <input type="radio" class="form-check-input" name="payment" value="COD"><span> Payment on
                            Delivery</span><br>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Order Now</button>
                </form>
            </div>
        </div>
    </div>

@endsection
