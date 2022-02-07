function shopsDropdown(VISITORId, shopId = 'undefined', shopName = '#shopId') {

    var shop = $(shopName);
    var option = $('<option>');

    shop.find('option').remove();
    option.val(null);
    option.text('Selecione um Representante');
    shop.append(option);

    $.getJSON('/api/VISITOR/' + VISITORId + '/shops', function (data) {
        $.each(data, function (key, item) {
            var option = $('<option>');
            option.val(key);
            option.text(item);
            if (key == shopId)
                option.attr("selected", "selected");

            shop.append(option);
        });
    });
    return false;
}
function VISITORsDropdown(shopId, representiveId = 'undefined', VISITORName = '#VISITORId') {

    var VISITOR = $(VISITORName);
    var option = $('<option>');

    VISITOR.find('option').remove();
    option.val(null);
    option.text('Selecione um Representante');
    VISITOR.append(option);

    $.getJSON('/api/shop/' + shopId + '/VISITORs', function (data) {
        $.each(data, function (key, item) {
            var option = $('<option>');
            option.val(key);
            option.text(item);
            if (key == representiveId)
                option.attr("selected", "selected");

            VISITOR.append(option);
        });
    });
    return false;
}