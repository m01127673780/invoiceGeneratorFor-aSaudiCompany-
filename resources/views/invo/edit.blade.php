 <!DOCTYPE html>
<html>
<head lang="en">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Invoicer - Invoices Generator App by TheCreatix.com</title>

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>

    <link rel="icon" type="image/x-icon" href="{{url('invo')}}/favicon.png">

    <link href="{{url('invo')}}/css/colorpicker.css" rel="stylesheet" type="text/css" />
    <link href="{{url('invo')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('invo')}}/css/calender.css" rel="stylesheet" type="text/css" />
    <link href="{{url('invo')}}/css/style.css" rel="stylesheet" type="text/css" />

    <script src="{{url('invo')}}/js/jquery-1.11.1.min.js"></script>
    <script src="{{url('invo')}}/js/jquery.validate.min.js"></script>
    <script src="{{url('invo')}}/js/custom.js"></script>
    <script src="{{url('invo')}}/js/colorpicker.js"></script>
    <script src="{{url('invo')}}/js/eye.js"></script>
    <script src="{{url('invo')}}/js/calender.js"></script>
<!--[if lt IE 9]>
        <script type="text/javascript" src="{{url('invo')}}/js/html5shiv.js"></script>
    <![endif]-->

    <style type="text/css">

        table{

            width: 100%;

            border:1px solid black;

        }

        td, th{

            border:1px solid black;

        }

    </style>
</head>
<body>
<form action="{{url('edit/invo/'.$all_data->id)}}" method="post" name="myform" id="invocie_form" enctype="multipart/form-data" onsubmit="return OnSubmitForm();">
{{csrf_field()}}
<header>
    <div class="container">
        <img class="ilogo" src="{{url('invo')}}/images/icon.png" alt=""/>
        <h1>
            Invoicer
            <small>Invoices Generator App by <a href="http://thecreatix.com">TheCreatix.com</a></small>
        </h1>
        <a class="logo" href="http://thecreatix.com"><img src="{{url('invo')}}/images/thecreatix-logo.png" alt="TheCreatix.com Logo"/></a>
    </div>

</header>

<aside class="container">
    @include('invo.message')


</aside>
<div class="container setting-panel">
    <div class="row">
        <div class="col-lg-12">
            <h2>General Settings</h2>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="taxformat" class="caption">Tax</label>
                <select class="form-control"  name="invoice_tax"  id="taxformat">
                    <option  value="{{$all_data->invoice_tax}}" selected  >{{$all_data->invoice_tax}}</option>
                    <option >................</option>
                    <option value="tax_tax">% Tax</option>
                    <option value="tax_flat">Flat Tax</option>
                    <option value="tax_off">Off</option>
                </select>
            </div>
        </div>
        <div class="col-sm-4">


            <div class="form-group">
                <label for="currency" class="caption">Currency</label>
                <select class="form-control" name="invoice_currency" id="currency">
                    <option  value="{{$all_data->invoice_currency}}"  selected >{{$all_data->invoice_currency}}</option>
                    <option >................</option>
                    <option  value="yuan"  >Yuan (¥)</option>
                    <option  value="Pound"  >Pound (£)</option>
                    <option  value="euro" >Euro (€)</option>
                    <option  value="pakistani_rupee" >Pakistani Rupee (Rs)</option>
                    <option  value="durham" >Durham (AED)</option>
                    <option  value="malaysian_ranggit"  >Malaysian Ranggit (RM)</option>
                    <option  value="dollar" >Dollar ($)</option>
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="discountFormat" class="caption">Discount</label>
                <select class="form-control" name="invoice_discount" id="discountFormat">
                    <option  value="{{$all_data->invoice_discount}}"selected  >{{$all_data->invoice_discount}}</option>
                    <option >................</option>
                    <option value="discount_discount">% Discount</option>
                    <option value="flat_Discount">Flat Discount</option>
                    <option value="discount_off">Off</option>
                </select>
            </div>
        </div>

    </div>

</div>

<div class="container" id="paper-wrapper">
        <div class="row">

            <div class="col-sm-4">
                <div class="logo-panl">
                    <div class="form-group logo">
                        <label for="exampleInputFile" class="caption">Upload your logo</label>
                        <input type="file" name="invoice_img" id="uploadFile" class="img">
                        <p>Note: Maximum resolution should be 180px * 100px (width * height)</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-3" id="imagePreview"><img src="{{url('storage/'.$all_data->invoice_img)}}"></div>

            <div class="col-sm-2"></div>

            <div class="col-sm-3 pull-right">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
                        <input type="text" class="form-control"  placeholder="Title of the file" name="invoice_name" value="{{$all_data->invoice_name}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></div>
                        <input type="data" class="form-control date-picker" value="{{$all_data->invoice_billing_date}}"  placeholder="Invoice #" name="invoice_billing_date">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
                        <input type="data" class="form-control date-picker" value="{{$all_data->invoice_billing_date}}"  placeholder="Invoice #" name="invoice_billing_date">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
                        <input type="text" class="form-control date-picker"  id="billingDate" placeholder="Billing Date" value="{{$all_data->invoice_due_date}}"  name="invoice_due_date" autocomplete="off"  >
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-6 cmp-pnl">
                <div class="inner-cmp-pnl">
                    <h2>Bill From</h2>
                    <div class="form-group">
                        <label for="frmBizName" class="caption">Business Name <span style="color: red;">*</span></label>
                        <input type="text" class="form-control"  value="{{$all_data->billfrom_business_name}}"   name="billfrom_business_name"  required="required">
                    </div>
                    <div class="form-group">
                        <label for="frmAddress1" class="caption">Address Line 1</label>
                        <input type="text" class="form-control" name="billfrom_addres_line_one" value="{{$all_data->billfrom_addres_line_one}}"  >
                    </div>
                    <div class="form-group">
                        <label for="frmAddress2" class="caption">Address Line 2</label>
                        <input type="text" class="form-control" name="billfrom_addres_line_tow" value="{{$all_data->billfrom_addres_line_tow}}" >
                    </div>
                    <div class="form-group">
                        <label for="frmPhone" class="caption">Phone#</label>
                        <input type="text" class="form-control" name="billfrom_phone" value="{{$all_data->billfrom_phone}}">
                    </div>
                    <div class="form-group">
                        <label for="frmEmail" class="caption">Email</label>
                        <input type="email" class="form-control" name="billfrom_email" value="{{$all_data->billfrom_email}}">
                    </div>
                    <div class="form-group">
                        <label for="frmaddress2" class="caption">Additional Info</label>
                        <textarea class="form-control" name="billfrom_additional_info" rows="4"> {{$all_data->billfrom_additional_info}}</textarea>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 cmp-pnl" style="border-left:solid 1px #f5f6f7;">
                <div class="inner-cmp-pnl">
                    <h2>Bill To</h2>
                    <div class="form-group">
                        <label for="toBizName" class="caption">Business Name <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="billto_business_name" value=" {{$all_data->billto_business_name}} " required="required">
                    </div>
                    <div class="form-group">
                        <label for="toAddress1" class="caption">Address Line 1</label>
                        <input type="text" class="form-control" name="billto_addres_line_one" value=" {{$all_data->billto_addres_line_one}} ">
                    </div>
                    <div class="form-group">
                        <label for="toAddress2" class="caption">Address Line 2</label>
                        <input type="text" class="form-control" name="billto_addres_line_tow" value=" {{$all_data->billto_addres_line_tow}} ">
                    </div>
                    <div class="form-group">
                        <label for="toPhone" class="caption">Phone#</label>
                        <input type="text" class="form-control" name="billto_phone" value=" {{$all_data->billto_phone}} " >
                    </div>
                    <div class="form-group">
                        <label for="toEmail" class="caption">Email</label>
                        <input type="email" class="form-control" name="billto_email" value=" {{$all_data->billto_email}} ">
                    </div>
                    <div class="form-group">
                        <label for="toAddInfo" class="caption">Additional Info</label>
                        <textarea class="form-control" name="billto_additional_info" rows="4"> {{$all_data->billto_additional_info}}</textarea>
                    </div>
                </div>
            </div>

        </div>

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

        <div style="height: 40px;"></div>

        <div class="row">
            <div class="col-md-12 cmp-pnl">
                <div class="inner-cmp-pnl">
                    <input type="text" class="form-control" value="Extra Notes" name="invoice_extra_notes" placeholder="Extra Notes">
                    <div class="form-group">
                        <textarea class="form-control" name="invoice_use_the_space" rows="4" placeholder="Use this space to add some more text e.g. Terms & Conditions or Bank Details etc etc"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-sm-4 cmp-pnl">
                <div class="inner-cmp-pnl">
                    <h2>Select a Color</h2>
                    <div id="colorSelector"><div style="background-color:{{$all_data->invoice_select_acolor}}"></div></div>
                    <input type="hidden" class="form-control" name="invoice_select_acolor" id="pdfColor" value=" {{$all_data->invoice_select_acolor}}">
                    <small>Click on the color box and select a color of the invoice.</small>
                </div>
            </div>

            <div class="col-sm-4 cmp-pnl">
                <h2>Label / Stamp</h2>
                <input type="text" class="form-control"  name="invoice_label_stamp" value=" {{$all_data->invoice_label_stamp}} " >
            </div>
            <div class="col-sm-4 cmp-pnl">
                <h2>Signature</h2>
                <input type="text" class="form-control" placeholder="Name" name="invoice_signature" value=" {{$all_data->invoice_signature}} " >
                <input type="text" class="form-control" placeholder="Designation" name="invoice_designation" value=" {{$all_data->invoice_designation}} " >
                <small>Leave blank to hide or disable the Signatures on invoice.</small>
            </div>

        </div>

        <div style="height: 40px;"></div>
         <div class="row btns-row">
            <div class="col-sm-6">
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-default sub-btn" onclick="document.pressed=this.value" value="download">Generate & Download Invoice</button>
                </div>
            </div>
            <div class="col-sm-6  " style="display: none">
                <div class="form-group">
                    <button type="submit" name="sendEmail" class="btn btn-default sub-btn" onclick="document.pressed=this.value" value="send">Send Invoice to Client</button>
                </div>
            </div>
             <div class="col-sm-6">
                <div class="form-group">
                    <a   href="download-pdf" name=" " class="btn btn-default sub-btn"   value="send">Sdownload-pdf</a>
                </div>
            </div>
        </div>




</div>

<footer>
    <div class="container">
        <p class="pull-left">&copy 2015 All rights are reserved to the developers.</p>
        <p class="pull-right">Developed by <a href="http://www.thecreatix.com" target="_blank">TheCreatix.com</a></p>
    </div>
</footer>
</form>

<script src="{{url('invo')}}/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $('#colorSelector').ColorPicker({
        color: '#f7540e',
        onShow: function (colpkr) {
            $(colpkr).fadeIn(500);
            return false;
        },
        onHide: function (colpkr) {
            $(colpkr).fadeOut(500);
            return false;
        },
        onChange: function (hsb, hex, rgb) {
            $('#colorSelector div').css('backgroundColor', '#' + hex);
            $('#pdfColor').val('#' + hex);
        }
    });
</script>
<script>
    $('#invocie_form').validate({
        errorPlacement: function(error,element) {
            return true;
        }
    });
    jQuery.validator.addClassRules('req', {
        required: true
    });
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 46 || charCode > 57)) {
            return false;
        }
        return true;
    }
    $('.date-picker').datepicker({
        format: 'yy/mm/dd',
        autoclose: true,
        todayHighlight: true
    });
</script>

</body>
</html>