<script>
    var countTel = 0;

    $('#addInptTel').click(function() {

        if(countTel < 9)
        {
            countTel++;
            $('<br/><input type="number" name="tel[]" id="txtTel" class="form-control phone">').fadeIn('slow').appendTo('.telGroup');
        }
    });

    $('.msg').delay(2000).slideUp(600);

    $('#addTelBtn').click(function() {
        var _token = '{{ csrf_token() }}';
        var name = $('#txtName').val();
        var lastname = $('#txtLast').val();
        var middlename = $('#txtMiddle').val();
        var tel = $('#txtTel').val();
        var telArr = [];

        $.each($('.phone'), function () {
            telArr.push($(this).val());
        });

        $.post("/", {name: name, lastname: lastname, middlename: middlename, tel: telArr, _token: _token})
                .done(function (data) {
                    var response = jQuery.parseJSON(data);
                    if (response.result == 'success') {
                        $('.close').click();
                        window.location.href = '/';
                    }
                })
                .fail(function (data) {
                    var errors = data.responseJSON;
                    var errorsHtml = '';
                    $.each(errors, function (key, value) {
                        errorsHtml += value[0] + '<br/>';
                    });
                    $('#forms-error').slideDown(1);
                    $('#forms-error').html(errorsHtml);
                });
    });

    $('.btn-del').click(function(e){

        var id = $( this ).attr('data-content');

        var result = confirm('Вы действительно хотите удалить эту запись?');

        if (result) {
            $.get(id + "/destroy", function (data) {
                var json = jQuery.parseJSON(data);

                if (json.msg == 'success') {
                    $('#rowTable' + id).hide(600);
                }
            });
        }
    });
</script>