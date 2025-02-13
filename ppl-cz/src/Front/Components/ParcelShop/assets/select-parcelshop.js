jQuery(document).on("click", "button[data-pplcz-select-parcel-shop],a[data-pplcz-select-parcel-shop]", function(ev) {
   ev.preventDefault();

   const address = jQuery(this).data('address');
   const country = jQuery(this).data('country')
   const parcelshop = jQuery(this).data('parcelshop');

   const adding = {

   }
   if (address)
       adding.address = address;
   if (country)
       adding.country = country;
   if (parcelshop == 1)
       adding.parcelShop = parcelshop;

   const what = jQuery(this).data("pplcz-select-parcel-shop");

   switch(what)
   {
       case "cash":
           PplMap(function(data) {
               jQuery("[name=pplcz_parcelshop]").val(JSON.stringify(data));
               jQuery("body").trigger("update_checkout");
           }, { withCash: true, ...adding });
           break;
       case "clear":
           jQuery("[name=pplcz_parcelshop]").val(JSON.stringify(null));
           jQuery("body").trigger("update_checkout");
           break;
       default:
           PplMap(function(data) {
               jQuery("[name=pplcz_parcelshop]").val(JSON.stringify(data));
               jQuery("body").trigger("update_checkout");
           }, adding);
           break;
   }
});

jQuery('body').on('updated_checkout', function() {

    const showmap = jQuery('.pplcz-parcelshop-inner').data('pplcz-showmap');
    if (showmap == 1) {
        jQuery("a[data-pplcz-select-parcel-shop]").trigger("click")
    }
});

(function ($) {
    $('form.checkout').on('change', 'input[name^=\"payment_method\"]', function () {
        $('body').trigger('update_checkout');
    });
})(jQuery);
