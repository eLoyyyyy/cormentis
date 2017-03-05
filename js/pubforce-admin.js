jQuery(document).ready(function($)
{
$(".tfdate").datepicker({
    dateFormat: 'D, M d, yy',
    showOn: 'button',
    buttonImage: '../wp-content/themes/cormentis/img/icon-datepicker.png',
    buttonImageOnly: true,
    numberOfMonths: 3

    });
});
