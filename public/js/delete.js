function destroy(event) {
    event.preventDefault();

    $('#delete-modal').modal('show');

    $("#confirm-delete").on("click", function() {
        const confirmButton = $(this);
        confirmButton
            .html('<div class="spinner-border spinner-border-sm" role="status"></div> Loading...')
            .prop("disabled", true);

        $.ajax({
            url: event.target.action,
            type: event.target.method,
            data: $(event.target).serialize()
        }).done(function (res) {
            datatable.ajax.reload();
            $('#delete-modal').modal('hide');
            confirmButton.html("Delete", false).prop("disabled", false);
            toastr.success(res.success);
        }).fail(function (err) {
            confirmButton.html("Delete", false).prop("disabled", false);
            toastr.error(res.responseJSON.message);
        });
    })
}

$(document).ready(function() {
    $(".close-modal").click(function() {
        $('#delete-modal').modal('hide');
    })
})