jQuery(document).ready(function($) {
    onPriceChange();
    $("#form_velicina").change(function() { onPriceChange() });
    $("#form_boja").change(function() { onPriceChange() });

    calcPrice($("#form_velicina option:selected").val())

})

function onPriceChange() {

    //-- frame

    //resetuj sve (postavi display none)
    $('.hide-all-frame-prices').css('display', 'none');

    //prikaži samo onaj koji je izabran
    priceForDisplay = '#price-table-' + $("#form_velicina option:selected").index();
    $(priceForDisplay).show();

    //ako je bez okvira sakrij sve
    if ($("#form_boja option:selected").index() == 0) {
        $('.hide-all-frame-prices').css('display', 'none');
    }

    //--- delivery

    //resetuj sve (postavi display none)
    $('.hide-all-delivery-prices').css('display', 'none');

    //ako je bez prikaži prvu cijenu ako nije drugu
    if ($("#form_boja option:selected").index() == 0) {
        $('#delivery-table-0').show();
    } else {
        $('#delivery-table-1').show();
    }

    //Ispiši cijene
    calcPrice($("#form_velicina option:selected").val());
}

function calcPrice(price) {

    posterPrice = Number(price); //toNum
    framePrice = Number($(".hide-all-frame-prices:visible").text()) //toNum
    deliveryPrice = Number($(".hide-all-delivery-prices:visible").text()) //toNum

    framePrice == 0 ? $("#empty-frame-price").text("-") : $("#empty-frame-price").text(""); //add line 

    var finalPrice = posterPrice + framePrice + deliveryPrice; //clac sum

    $("div.product-cost").text(price);
    $("div.price-cost-final").text(finalPrice + 'KM');

}