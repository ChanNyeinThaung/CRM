$(function() {
    $('#customers').on('change', function() {
        var email = $("option:selected", $(this)).data('email');
        var phone = $("option:selected", $(this)).data('phone');

        $("#customer-email").html( email );
        $("#customer-phone").html( phone );
    });

    $('#products').on('change', function() {
        var brand = $("option:selected", $(this)).data('brand');
        var model = $("option:selected", $(this)).data('model');

        $("#product-brand").html( brand );
        $("#product-model").html( model );
    });
});
