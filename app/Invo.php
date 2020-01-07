<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invo extends Model
{

  //  public $table('invos');
    protected$fillable =[

        'invoice_tax',
        'invoice_currency',
        'invoice_discount',
        'invoice_name',
        'invoice_billing_date',
        'invoice_due_date',
        'invoice_img',
        'billfrom_business_name',
        'billfrom_addres_line_one',
        'billfrom_addres_line_tow',
        'billfrom_phone',
        'billfrom_email',
        'billfrom_additional_info',
        'billto_business_name',
        'billto_addres_line_one',
        'billto_addres_line_tow',
        'billto_phone',
        'billto_email',
        'billto_additional_info',
        'invoice_extra_notes',
        'invoice_extra_notes',
        'invoice_use_the_space',
        'invoice_select_acolor',
        'invoice_label_stamp',
        'invoice_signature',
        'invoice_designation',

    ];

}
