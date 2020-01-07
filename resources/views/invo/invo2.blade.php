<!DOCTYPE html>
<html>
<head lang="en">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Invoicer - Invoices Generator App by TheCreatix.com</title>

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
</head>
<body>
<form action="{{url('insert/invo')}}" method="post" name="myform" id="invocie_form" enctype="multipart/form-data" onsubmit="return OnSubmitForm();">
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
<div class="container setting-panel">
    <div class="row">
        <div class="col-lg-12">
            <h2>General Settings</h2>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="taxformat" class="caption">Tax</label>
                <select class="form-control" name="tax"  id="taxformat">
                    <option name="tax_tax" >% Tax</option>
                    <option name="tax_flat ">Flat Tax</option>
                    <option name="tax_off" >Off</option>
                </select>
            </div>
        </div>
        <div class="col-sm-4">


            <div class="form-group">
                <label for="currency" class="caption">Currency</label>
                <select class="form-control" name="currency" id="currency">
                    <option  name="yuan"  >Yuan (¥)</option>
                    <option  name="Pound" >Pound (£)</option>
                    <option  name="euro" >selected>Euro (€) </option>
                    <option  name="pakistani_rupee" >Pakistani Rupee (Rs)</option>
                    <option  name="durham" >Durham (AED)</option>
                    <option  name="malaysian_ranggit" value="malaysian_ranggit">Malaysian Ranggit (RM)</option>
                    <option  name="dollar" >Dollar ($)</option>
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="discountFormat" class="caption">Discount</label>
                <select class="form-control" name="discount" id="discountFormat">
                    <option name="discount_discount">% Discount</option>
                    <option name="flat_Discount">Flat Discount</option>
                    <option name="discount_off">Off</option>
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
                        <input type="file" name="img" id="uploadFile" class="img">
                        <p>Note: Maximum resolution should be 180px * 100px (width * height)</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-3" id="imagePreview"></div>

            <div class="col-sm-2"></div>

            <div class="col-sm-3 pull-right">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></div>
                        <input type="text" class="form-control"  placeholder="Title of the file" name="invoice_name" value="Invoice">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></div>
                        <input type="text" class="form-control"  placeholder="Invoice #" name="invoice_billing_date">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
                        <input type="text" class="form-control"  id="billingDate" placeholder="Billing Date" name="invoice_due_date" autocomplete="off"  >
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></div>
                        <input type="text" class="form-control" id="dueDate" name="dueDate" placeholder="Due Date" autocomplete="off">
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
                        <input type="text" class="form-control" name="billfrom_business_name" required="required">
                    </div>
                    <div class="form-group">
                        <label for="frmAddress1" class="caption">Address Line 1</label>
                        <input type="text" class="form-control" name="billfrom_addres_line_one">
                    </div>
                    <div class="form-group">
                        <label for="frmAddress2" class="caption">Address Line 2</label>
                        <input type="text" class="form-control" name="billfrom_addres_line_tow">
                    </div>
                    <div class="form-group">
                        <label for="frmPhone" class="caption">Phone#</label>
                        <input type="text" class="form-control" name="billfrom_phone">
                    </div>
                    <div class="form-group">
                        <label for="frmEmail" class="caption">Email</label>
                        <input type="email" class="form-control" name="billfrom_email">
                    </div>
                    <div class="form-group">
                        <label for="frmaddress2" class="caption">Additional Info</label>
                        <textarea class="form-control" name="billfrom_additional_info" rows="4"></textarea>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 cmp-pnl" style="border-left:solid 1px #f5f6f7;">
                <div class="inner-cmp-pnl">
                    <h2>Bill To</h2>
                    <div class="form-group">
                        <label for="toBizName" class="caption">Business Name <span style="color: red;">*</span></label>
                        <input type="text" class="form-control" name="billto_business_name" required="required">
                    </div>
                    <div class="form-group">
                        <label for="toAddress1" class="caption">Address Line 1</label>
                        <input type="text" class="form-control" name="billto_addres_line_one">
                    </div>
                    <div class="form-group">
                        <label for="toAddress2" class="caption">Address Line 2</label>
                        <input type="text" class="form-control" name="billto_addres_line_tow">
                    </div>
                    <div class="form-group">
                        <label for="toPhone" class="caption">Phone#</label>
                        <input type="text" class="form-control" name="billto_phone">
                    </div>
                    <div class="form-group">
                        <label for="toEmail" class="caption">Email</label>
                        <input type="email" class="form-control" name="billto_email">
                    </div>
                    <div class="form-group">
                        <label for="toAddInfo" class="caption">Additional Info</label>
                        <textarea class="form-control" name="billto_additional_info" rows="4"></textarea>
                    </div>
                </div>
            </div>

        </div>
ssssssssssssss
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
                    <div id="colorSelector"><div style="background-color: #f7540e;"></div></div>
                    <input type="hidden" class="form-control" name="invoice_select_acolor" id="pdfColor" value="#f7540e">
                    <small>Click on the color box and select a color of the invoice.</small>
                </div>
            </div>

            <div class="col-sm-4 cmp-pnl">
                <h2>Label / Stamp</h2>
                <input type="text" class="form-control" value="Original" name="invoice_label_stamp">
            </div>
            <div class="col-sm-4 cmp-pnl">
                <h2>Signature</h2>
                <input type="text" class="form-control" placeholder="Name" name="invoice_signature">
                <input type="text" class="form-control" placeholder="Designation" name="invoice_designation">
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
</script>

</body>
</html>