@extends('frontend.layout.layout')

@section('contents')


<div class="container">

    <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
            <li class="item-link"><span>Warranty policy</span></li>
        </ul>
    </div>
</div>

<div class="container">
    <div class="row" style="font-size: 15px">
        <div class="col-md-12">
            <p><b>1. WARRANTY CONDITIONS</b></p>
            <p>The product is warranted free of charge if all of the following conditions are met:</p>
            <p>- Products on the list are warranted from the Manufacturer or Distributor.</p>
            <p>- Product has technical defects due to Manufacturer.</p>
            <p>- The warranty period on the warranty card is still valid.</p>
            <p>- The warranty card is intact, not patched, not erased, repaired or smeared.</p>
            <p>- Warranty card with full information: product code, serial number, date of manufacture, name of customer used, address, date of purchase (for products that do not apply E-Warranty).</p>
            <p>- Manufacturer's warranty stamp and seal (if any) on the product are intact.</p>
            <br>
            <p><b>The product is not warranted or will incur a warranty fee if it falls into one of the following cases:</b></p>
            <p>- Products not covered by the manufacturer's or distributor's warranty.</p>
            <p>- The product does not satisfy one of the warranty conditions in section 1.</p>
            <p>- Serial number, product model does not match the Warranty Card.</p>
            <p>- Customers arbitrarily intervene to repair products or repair at warranty centers that are not authorized by the Manufacturer.</p>
            <p>- Product is damaged due to user error, and such damage is not covered by Manufacturer's warranty.</p>
            <p>- In the event that a warranty fee is incurred, La Vie's customer service staff will fully advise customers before proceeding with warranty procedures.</p>
            <br>
            <p><b>2. WARRANTY PERIOD:</b></p>
            <p>- Warranty 12 months, counting from the date of purchase of a new machine if the problem is damaged due to technical problems of the manufacturer.</p>
            <br>
            <p><b>3. WARRANTY METHOD:</b></p>
            <p><b>. Warranty Location:</b></p>
            <p>- The warranty location is stated in the warranty card attached to the product. Please contact the Supplier/Distributor's Warranty Center directly according to the information in the warranty card.</p>
            <p>- The customer care support department will assist in guiding customers on how to go to the outside warranty centers of Manufacturers and Distributors participating in the product and service warranty system. All information of the Member Supplier is recorded on the delivery receipt/invoice attached to the box.</p>
            <p>- If you have difficulties in contacting the Warranty Center, please contact La Vie's Customer Care department at email vntuanhuynh@gmail.com for support.</p>
            
        </div>
    </div>
</div><!--end container-->

@endsection