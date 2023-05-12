$(document).ready(function () {
    $("form").submit(function () {
        $('button[type="submit"]')
            .html('<div class="spinner-border spinner-border-sm" role="status"></div> Loading...')
            .attr("disabled", true);
    });
});