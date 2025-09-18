<style>
    .mfp-content:has(#calculator-popup) {
        width: 88% !important;
    }
</style>
<!-- Hidden popup content -->
<div id="calculator-popup" class="mfp-hide">
  <div class="bg-white br-lg container p-relative pb-8 pl-8 pr-8 pt-8">
    <h3 class="mb-4">Profit Calculator</h3>

    <div class="row align-items-center mb-4">
      <div class="col-3">
        <img width="36%" src="your-product.jpg" alt="Product" class="br-sm" />
      </div>
      <div class="col-3">
        <p class="text-dark mb-1">App Price</p>
        <h5 class="font-weight-bold app-price">₹ 205</h5>
        <input type="hidden" value="" id="appPrice">
      </div>
      <div class="col-3">
        <p class="text-dark mb-1">RTO Charges</p>
        <h5 class="font-weight-bold">₹ 70</h5>
      </div>
      <div class="col-3">
        <p class="text-dark mb-1">Weight</p>
        <h5 class="font-weight-bold">500 g</h5>
      </div>
    </div>

    <div class="row gutter-sm mb-3">
      <div class="col-6 mb-3">
        <label>Selling Price (₹)*</label>
        <input type="number" class="form-control" id="sellPrice" />
      </div>
      <div class="col-6 mb-3">
        <label>Expected Orders*</label>
        <input type="number" class="form-control" id="expOrders" />
      </div>
      <div class="col-6 mb-3">
        <label>Confirm Orders (✓)*</label>
        <input type="number" class="form-control" id="confOrders" />
      </div>
      <div class="col-6 mb-3">
        <label>Expected Delivery (✓)*</label>
        <input type="number" class="form-control" id="expDelivery" />
      </div>
      <div class="col-6 mb-3">
        <label>Ad Spends per order (₹)*</label>
        <input type="number" class="form-control" id="adSpend" />
      </div>
      <div class="col-6 mb-3">
        <label>Total Misc. Charges (₹)</label>
        <input type="number" class="form-control" id="miscCharges" />
      </div>
    </div>

    <div class="text-center mb-4">
      <button id="calcBtn" class="btn btn-primary w-100">Calculate</button>
    </div>

    <div class="bg-grey p-3 br-sm">
      <h5 class="text-dark">Net Loss</h5>
      <p>Total Earnings – Total Spends</p>
      <h5 class="text-primary" id="netLoss">₹N/A</h5>

      <h5 class="text-dark mt-3">Net Loss (Per Order)</h5>
      <p>Net Loss / Expected Orders</p>
      <h5 class="text-primary" id="netLossPerOrder">₹N/A</h5>
    </div>
  </div>
</div>
