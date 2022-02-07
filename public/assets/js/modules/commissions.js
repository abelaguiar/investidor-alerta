function shopsDropdown(representativeId, shopId = 'undefined', shopName = '#shopId') {

    var shop = $(shopName);
    var option = $('<option>');

    shop.find('option').remove();
    option.val(null);
    option.text('Selecione um Representante');
    shop.append(option);

    $.getJSON('/api/representative/' + representativeId + '/shops', function (data) {
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
function representativesDropdown(shopId, representiveId = 'undefined', representativeName = '#representativeId') {

    var representative = $(representativeName);
    var option = $('<option>');

    representative.find('option').remove();
    option.val(null);
    option.text('Selecione um Representante');
    representative.append(option);

    $.getJSON('/api/shop/' + shopId + '/representatives', function (data) {
        $.each(data, function (key, item) {
            var option = $('<option>');
            option.val(key);
            option.text(item);
            if (key == representiveId)
                option.attr("selected", "selected");

            representative.append(option);
        });
    });
    return false;
}