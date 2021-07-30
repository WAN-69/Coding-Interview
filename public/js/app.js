$(document).ready(function(){
    //active select2
    $(".provinsi-asal , .kota-asal, .provinsi-tujuan, .kota-tujuan").select2({
        theme:'bootstrap4',width:'style',
    });
    //ajax select kota asal
    $('select[name="province_origin"]').on('change', function () {
        let provindeId = $(this).val();
        if (provindeId) {
            jQuery.ajax({
                url: '/cities/'+provindeId,
                type: "GET",
                dataType: "json",
                success: function (response) {
                    $('select[name="city_origin"]').empty();
                    $('select[name="city_origin"]').append('<option value="">-- pilih kota asal --</option>');
                    $.each(response, function (key, value) {
                        $('select[name="city_origin"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                },
            });
        } else {
            $('select[name="city_origin"]').append('<option value="">-- pilih kota asal --</option>');
        }
    });
    //ajax select kota tujuan
    $('select[name="province_destination"]').on('change', function () {
        let provindeId = $(this).val();
        if (provindeId) {
            jQuery.ajax({
                url: '/cities/'+provindeId,
                type: "GET",
                dataType: "json",
                success: function (response) {
                    $('select[name="city_destination"]').empty();
                    $('select[name="city_destination"]').append('<option value="">-- pilih kota tujuan --</option>');
                    $.each(response, function (key, value) {
                        $('select[name="city_destination"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                },
            });
        } else {
            $('select[name="city_destination"]').append('<option value="">-- pilih kota tujuan --</option>');
        }
    });
    //ajax check ongkir
    let isProcessing = false;
    $('.btn-check').click(function (e) {
        e.preventDefault();

        let token            = $("meta[name='csrf-token']").attr("content");
        let city_origin      = $('select[name=city_origin]').val();
        let city_destination = $('select[name=city_destination]').val();
        let courier          = $('select[name=courier]').val();
        let weight           = $('#weight').val();

        if(isProcessing){
            return;
        }

        isProcessing = true;
        jQuery.ajax({
            url: "/ongkir",
            data: {
                _token:              token,
                city_origin:         city_origin,
                city_destination:    city_destination,
                courier:             courier,
                weight:              weight,
            },
            dataType: "JSON",
            type: "POST",
            success: function (response) {
                isProcessing = false;
                if (response) {
                    $('#ongkir').empty();
                    $('.ongkir').addClass('d-block');
                    $.each(response[0]['costs'], function (key, value) {
                        $('#ongkir').append('<li class="list-group-item">'+response[0].code.toUpperCase()+' : <strong>'+value.service+'</strong> - Rp. '+value.cost[0].value+' ('+value.cost[0].etd+' hari)</li>')
                    });
                }
            }
        });
    });

    $('.tampilModal').on('click',function() {
        $('#modalLabel').html('Hasil'); 
        
        $.ajax({
            url:'http://127.0.0.1:8000/test/proses',
            data: $nilai,
            method: 'post',
            
            success: function() {
                console.log('ok');
            }
        });
    });
});