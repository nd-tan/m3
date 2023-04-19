
var tooltips = $('[data-toggle="tooltip"]');

tooltips.each(function () {
    $(this).tooltip({'placement': 'bottom'});
    console.log($('div.tooltiptext'));
    console.log($(this).tooltip());

    if($('.tooltip')){
        // console.log($('.tooltip').css('background-color', 'black !important')); $('.tooltip').css('background-color', 'black !important');
    }
})
// document.querySelectorAll('[data-toggle="tooltip"]').forEach(() => {
//     console.log($(this));
//     // this.tooltip({'placement': 'bottom'});
//   })
