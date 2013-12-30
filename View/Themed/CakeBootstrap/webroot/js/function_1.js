jQuery(document).ready( function() {
    
    function format_number(nStr)
    {
        nStr = nStr.toFixed(2);
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }
    
    /*START UPDATE PROGRAM */   
    jQuery('#click-status-program').live('click', function() {   
        // get priority ID 
        var id	= jQuery(this).parents('tr').attr('id').split('-')[1];        
        var name  = jQuery('#program-' + id + ' .program-name').text();      
        if (confirm('Are you sure you want to update status program?\n'+name))
        {            
            jQuery.ajax({
                url: 	site_url + '/programs/ajax_status_program/' + id,
                type: 'post',
                dataType: 'json',
                success: function(r) {
                    switch (r.status)
                    {
                        case 'success':
                            jQuery('#program-' + id + ' .program-status').html('<span class="fs1 text-success" aria-hidden="true" data-icon="&#xe0fb;"></span>');
                                
                            break;
                        case 'error':
                            break;
                    }
                    // show the flash message
                    if (jQuery('#flashMessage').length > 0)
                    {
                        // remove the old one, if any
                        jQuery('#flashMessage').remove();
                    }
    			
                    var flash = '<div class="alert alert-block alert-'+r.status+' fade in" id="flashMessage"><button type="button" class="close" data-dismiss="alert">×</button>' + r.message + '</div>';
                    jQuery('#alert').prepend(flash);
                    jQuery('#flashMessage').fadeIn();
                }
            });
        }

    //return false;
    });
    /*END UPDATE PROGRAM */
    //**************EXPENSE********************//    
        
    /*ADD EXPENSE AJAX*/
    jQuery('#link-add-expense').live('click', function() {
	
        // remove previous form if exists
        if (jQuery('#dialog-add-expense').length > 0)
        {
            jQuery('#dialog-add-expense').remove();
        }
	
        // get the expense detail
        jQuery.ajax({
            url: site_url + '/expenses/ajax_add_expense/'+program_id,
            success: function(r) {
                jQuery('body').append(r);
                jQuery('#dialog-add-expense').modal('show');
            } 
        });
	
        return false;
    });


    jQuery('#dialog-add-expense .btn-primary').live('click', function() {
			
        // make sure the name is not empty
        if (jQuery('#ExpenseName').val() == "")
        {
            alert('Please enter expense name');
            jQuery('#ExpenseName').focus();
            return false;
        }
        // make sure the name is not empty
        if (jQuery('#ExpenseDescription').val() == "")
        {
            alert('Please enter expense description');
            jQuery('#ExpenseDescription').focus();
            return false;
        }
        // make sure the name is not empty
        if (jQuery('#ExpenseAmount').val() == "")
        {
            alert('Please enter expense amaunt');
            jQuery('#ExpenseAmount').focus();
            return false;
        }
      
		
        // assign to var to avoid asynchonous active removing the values
        var expense_pi          = jQuery('#ExpenseProgramId').val();        
        var expense_name 	= jQuery('#ExpenseName').val();        
        var expense_desc 	= jQuery('#ExpenseDescription').val();        
        var expense_amount 	= jQuery('#ExpenseAmount').val();        
		
        // create ajax operation
        jQuery.ajax({
            url: 		jQuery('#dialog-add-expense form').attr('action'),
            type: 		'post',
            dataType:           'json',
            data: {
                'data[Expense][program_id]': 			expense_pi,
                'data[Expense][name]':                          expense_name,
                'data[Expense][description]': 			expense_desc,
                'data[Expense][amount]': 			expense_amount
               
            },
            
            success: function(r) {
                
                //     var expenseamount = format_number(expense_amount); // output = 1,234.00
                                                
                switch (r.status)
                {
                    case 'success':
                        var html = '';
                        html += '<tr id="expense-' + r.id + '"">'; 
                        html += '<td class="expense-id">' + r.id + '</td>';
                        html += '<td class="expense-name">' + expense_name + '<br/>('+expense_desc+')</td>';                                                                      
                        html += '<td style="text-align: right" class="price">RM' + expense_amount + '</td>';
                        html += '<td>';                        
                        html += '<a href="#" class="link-edit-expense" data-placement ="top" data-original-title ="Edit"><span class="fs1" aria-hidden="true" data-icon="&#xe005;"></span></a> ';
                        html += '<a href="#" class="link-delete-expense" data-placement ="top" data-original-title ="Delete"><span class="fs1" aria-hidden="true" data-icon="&#xe0a8;"></span></a> ';                        
                        html += '</td>';
                        html += '</tr>';                       
                      
                        var amaunt = format_number(r.financing); // output = 1,234.00
                        jQuery('#total').html("RM "+amaunt);		
                        
                        // add the result to table
                        jQuery('#table-expenses').append(html);
                        break;
						
                    case 'error':
                        break;
                }
				
                // show the flash message
                if (jQuery('#flashMessage').length > 0)
                {
                    // remove the old one, if any
                    jQuery('#flashMessage').remove();
                }
				
                var flash = '<div class="alert alert-block alert-'+r.status+' fade in" id="flashMessage" style="display: none;"><button type="button" class="close" data-dismiss="alert">×</button>' + r.message + '</div>';
                jQuery('#alert').prepend(flash);
                jQuery('#flashMessage').fadeIn();
            }
        });
		
		
		
        // hide the dialog box
        jQuery('#dialog-add-expense').modal('hide');
		
        // prevent default action
        return false;
		
    });
	
    // remove the form
    jQuery('#dialog-add-expense').on('hidden', function() {
        jQuery('#dialog-add-expense').remove();
    });
    /*END ADD EXPENSE AJAX*/
    
    /*START EDIT EXPENSE AJAX*/       	
    jQuery('.link-edit-expense').live('click', function() {
	
        // remove previous form if exists
        if (jQuery('#dialog-edit-expense').length > 0)
        {
            jQuery('#dialog-edit-expense').remove();
        }
	
        // get expense ID 
        var id	= jQuery(this).parents('tr').attr('id').split('-')[1];
	
        // get the expense detail
        jQuery.ajax({
            url: site_url + '/expenses/ajax_edit_expense/' + id,
            success: function(r) {
                jQuery('body').append(r);
                jQuery('#dialog-edit-expense').modal('show');
            } 
        });
	
        return false;
    });


    jQuery('#dialog-edit-expense .btn-primary').live('click', function() {
	
        // make sure the name is not empty
        if (jQuery('#ExpenseName').val() == "")
        {
            alert('Please enter expense name');
            jQuery('#ExpenseName').focus();            
            return false;
        }
	
        // assign to var to avoid asynchonous active removing the values
        var expense_pi          = jQuery('#ExpenseProgramId').val();        
        var expense_name 	= jQuery('#ExpenseName').val();        
        var expense_desc 	= jQuery('#ExpenseDescription').val();        
        var expense_amount 	= jQuery('#ExpenseAmount').val();  
	
        // get expense ID 
        var id	= jQuery('#ExpenseId').val();
	
        // create ajax operation
        jQuery.ajax({
            url: 		jQuery('#dialog-edit-expense form').attr('action') + '/' + id,
            type: 		'post',
            dataType: 	'json',
            data: {
                'data[Expense][id]': 				id,
                'data[Expense][program_id]': 			expense_pi,
                'data[Expense][name]':                          expense_name,
                'data[Expense][description]': 			expense_desc,
                'data[Expense][amount]': 			expense_amount
            },
            success: function(r) {

                switch (r.status)
                {
                    case 'success':
                        //  var expenseamount = format_number(expense_amount); // output = 1,234.00
                        jQuery('#expense-' + id + ' .expense-name').html(expense_name+"<br/>("+expense_desc+")");                        
                        jQuery('#expense-' + id + ' .price').text("RM "+expense_amount);                        
                        var amaunt = format_number(r.financing); // output = 1,234.00
                        jQuery('#total').html("RM "+amaunt);
                        break;
					
                    case 'error':
                        break;
                }
			
                        
                // show the flash message
                if (jQuery('#flashMessage').length > 0)
                {
                    // remove the old one, if any
                    jQuery('#flashMessage').remove();
                }

                
                        
                var flash = '<div class="alert alert-block alert-'+r.status+' fade in" id="flashMessage" style="display: none;"><button type="button" class="close" data-dismiss="alert">×</button>' + r.message + '</div>';
                jQuery('#alert').prepend(flash);
                jQuery('#flashMessage').fadeIn();
            }
        });

        // hide the dialog box
        jQuery('#dialog-edit-expense').modal('hide');
	
        // prevent default action
        return false;
    });

    // remove the form
    jQuery('#dialog-edit-expense').on('hidden', function() {
        jQuery('#dialog-edit-expense').remove();
    });

    /*END EDIT Expense AJAX*/


    /*START DELETE Expense AJAX*/
    jQuery('.link-delete-expense').live('click', function() {
        
        if (confirm('Are you sure you want to delete this record?'))
        {
            
            // get priority ID 
            var id	= jQuery(this).parents('tr').attr('id').split('-')[1];
            jQuery.ajax({
                url: 	site_url + '/expenses/ajax_delete_expense/' + id,
                type: 'post',
                dataType: 'json',
                success: function(r) {
                    switch (r.status)
                    {
                        case 'success':
                            jQuery('#expense-' + id).fadeOut().remove();
                            var amaunt = format_number(r.financing); // output = 1,234.00
                            jQuery('#total').html("RM "+amaunt);
                            break;

                        case 'error':
                            break;
                    }

                    // show the flash message
                    if (jQuery('#flashMessage').length > 0)
                    {
                        // remove the old one, if any
                        jQuery('#flashMessage').remove();
                    }                    
                    var flash = '<div class="alert alert-block alert-'+r.status+' fade in" id="flashMessage" style="display: none;"><button type="button" class="close" data-dismiss="alert">×</button>' + r.message + ' id:'+id+'</div>';
                    jQuery('#alert').prepend(flash);
                    jQuery('#flashMessage').fadeIn();
                }
            });
        }

        return false;
    });
    /*END DELETE Expense AJAX*/

    //**********PARTICIPANT************//
    /*START ADD PARTICIPANT AJAX*/   
    
    
    jQuery('#link-add-participant').bind('click', function() {
        if (jQuery('#dialog-add-participant').length > 0)
        {
            jQuery('#dialog-add-participant').remove();
        }
	
        jQuery.ajax({
            url: site_url + '/participants/ajax_add_participant/'+program_id,
            type: 'post',
            success: function(r) {
                jQuery('body').append(r);
                jQuery('#dialog-add-participant').modal('show');
                
                var selc2 = $('#dialog-add-participant #staff-select2');
                $(selc2).select2({
                    placeholder: "Search user auto complete",
                    minimumInputLength: 3,                       
                    ajax: {
                        url: site_url + '/staffs/staff_search/',
                        dataType: 'json',
                        data: function (term, page) {
                            return {
                                q: term
                            };
                        },
                        results: function (data, page) {
                            return {
                                results: data
                            };
                        }
                        
                    }
                });
                $(selc2).change(function(){
                    var theid = $(selc2).select2('data').id;
                    // var theid = $('#staff-select2').select2('data').id;
                    jQuery.ajax({
                        url: site_url + '/participants/ajax_get_staffs_selected/'+theid+'/'+program_id,          
                        dataType: 	'json',            
                        success: function(r) {
                            switch (r.status)
                            {
                                case 'error':
                                    jQuery("#span-staff").html(r.message);                         
                                    var link_e = '';                                
                                    link_e += '<a data-dismiss="modal" class="btn" href="#">Close</a>';                        
                                    jQuery("#modal-footer").html(link_e); 
                        
                                    break;
					
                                case 'success':
                                    jQuery("#span-staff").html(r.message);
                                    var link_s = '';                                                                    
                                    link_s += '<a class="btn btn-primary" href="#">Save</a>';
                                    jQuery("#modal-footer").html(link_s); 
                                    break;
                            }			                            
                            jQuery(this).removeClass('btn').addClass('btn disabled');
                        }
                    })
                });                         
            }
        });
        jQuery('#dialog-add-participant .dialog-close').live('click', function() {
            jQuery('#dialog-add-participant').modal('hide').on('hidden', function() {
                jQuery('#dialog-add-participant').remove();
            });
	
            return false;
        });
    
        return false;
    });

    


});
