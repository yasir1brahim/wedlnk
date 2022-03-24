$(document).ready(function(){
    // adding quantity to user product list
    $('.product_qty_input').blur(function(){
        
        let $this = $(this);
        let qty = $this.val();
        let anchor = $this.closest('tr').children('td:last').children('a');

        let anchor_url_string = anchor.attr('href');
        let split_string = anchor_url_string.split('?');
        let split_params = split_string[1].split('&');
        split_params[0] = 'qty='+qty;
        split_string[1] = split_params.join('&')
        anchor_url_string = split_string.join('?');

        anchor.attr('href',anchor_url_string);
    })
});