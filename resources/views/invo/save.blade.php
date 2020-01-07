
<div id="item-pnl">

    <div class="row items-pnl-head">
        <div class="col-sm-1 col" >ACTION</div>
        <div class="col-sm-6 col extendable" style="text-align: left">PRODUCTS</div>
        <div class="col-sm-1 col" >QUANTITY</div>
        <div class="col-sm-1 col">PRICE</div>
        <div class="col-sm-1 col taxCol" >TAX</div>
        <div class="col-sm-1 col disCol">DISCOUNT</div>
        <div class="col-sm-1 col" style="border-right:0">TOTAL</div>
    </div>

    <div class="row items-pnl-body" id="item-row">
        <div class="col-sm-1 col" >
            <p>
                <button type="button" class="btn btn-success" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="Add more" id="add">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
            </p>
        </div>
        <div class="col-sm-6 col extendable ">
            <input type="text" class="form-control firstCol req" name="proName[]" placeholder="Title">
            <textarea class="form-control"  style="margin-top: 5px" name="proDesc[]" placeholder="Description"></textarea>
        </div>
        <div class="col-sm-1 col" >
            <input type="text" class="form-control req amnt" value="1" name="amount[]"  id="amount-0" onkeypress="return isNumber(event)" onkeyup="calTotal('0'), calSubtotal()" autocomplete="off">
        </div>
        <div class="col-sm-1 col">
            <div class="input-group">
                <div class="input-group-addon currenty">$</div>
                <input type="text" class="form-control req prc"  name="price[]" id="price-0" onkeypress="return isNumber(event)" onkeyup="calTotal('0'), calSubtotal()"  autocomplete="off">
            </div>
        </div>
        <div class="col-sm-1 col taxCol" >
            <div class="input-group">
                <input type="text" class="form-control vat" name="vat[]" id="vat-0" onkeypress="return isNumber(event)"   onkeyup="calTotal('0'), calSubtotal()" autocomplete="off">
                <div class="input-group-addon default-addon-tax">%</div>
            </div>
        </div>
        <div class="col-sm-1 col disCol">
            <div class="input-group">
                <input type="text" class="form-control discount"   name="discount[]" onkeypress="return isNumber(event)"  id="discount-0" onkeyup="calTotal('0'), calSubtotal()" autocomplete="off">
                <div class="input-group-addon  default-addon">%</div>
            </div>
        </div>
        <div class="col-sm-1 col">
            <p><span class="currenty">$</span> <span  class='ttlText' id="result-0">0</span></p>
            <input type="hidden" class="ttInput"  name="total[]" id="total-0" value="0">
        </div>
        <div class="clearfix"></div>
    </div>

</div>

<div class="row">
    <div class="col-sm-6 col-sm-offset-6 col-md-4 col-md-offset-8" id="tax-row">
        <div class="col-xs-2">
            <button type="button" class="btn btn-success" aria-label="Left Align" data-toggle="tooltip" data-placement="top" title="Add Taxes, Shipping, Handling or Other Fees" id="addTax">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            </button>
        </div>
        <div class="col-xs-5">
            <h1 class="subtotalCap">Sub Total</h1>
        </div>
        <div class="col-xs-5">
            <input type="hidden" value="0" id="subTotalInput" name="subtotal" >
            <h1 class="subtotalCap">
                <span class="currenty lightMode">$</span>
                <span id="subTotal" class="lightMode">0</span>
            </h1>
        </div>
    </div>
    <div class="col-sm-6 col-sm-offset-6 col-md-4 col-md-offset-8">
        <div class="totalbill-row">
            <div class="col-xs-5 col-sm-offset-2" >
                <h1>Total : </h1>
            </div>
            <div class="col-xs-5" >
                <h1><span class="currenty">$</span> <span id="totalBill">0</span></h1>
                <input type="hidden" value="0" name="totalBill" id="totalBillInput">
            </div>
        </div>
    </div>
</div>
