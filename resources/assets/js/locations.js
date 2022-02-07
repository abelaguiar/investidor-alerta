function citiesDropdown(stateId, cityId = 'undefined', cityName = '#city_id') {

    var cities = $(cityName);
    var option = $('<option>');

    cities.find('option').remove();
    option.val(null);
    option.text('Selecione uma Cidade');
    cities.append(option);

    $.getJSON('/api/state/' + stateId + '/cities', function (data) {
        $.each(data, function (key, item) {
            var option = $('<option>');
            option.val(key);
            option.text(item);
            if (key == cityId)
                option.attr("selected", "selected");

            cities.append(option);
        });
    });
    return false;
}

$("#cep").blur(function () {
    var cep_code = $(this).val();
    if (cep_code.length <= 0) return;
    $.get("//viacep.com.br/ws/" + cep_code + "/json/", function (address) {

        if (!("erro" in address)) {

            $("#cep").val(address.cep);

            $.get("/api/state/name/" + address.uf, function (state) {
                $("#state_id").val(state.id);
            });
            $.get("/api/city/name/" + address.localidade, function (city) {
                citiesDropdown(city.state_id, city.id);
            });

            $("#address").val(address.logradouro);
            $("#complement").val(address.complemento);
            $("#number").val("").focus();
        } else {
            $("#cep").val("").focus();
            $("#address").val("");
            $("#complement").val("");
            $("#state_id").val("");
            $("#city").val("");
            alert("CEP não encontrado.");
        }
    });
});
