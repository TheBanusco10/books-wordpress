(function ($) {
    console.log('Starting jQuery');

    $('.book-actions-button').on('click', function() {

        const bookID = $(this).data('book-id');

        // Disable button
        $(this).attr('disabled', true);

        // Add/remove favourite class
        $(this).hasClass('favourite') ? $(this).removeClass('favourite') : $(this).addClass('favourite');

        $.ajax(
            {
                type: 'post',
                url: admin_url.ajax_url,
                data: {
                    action: 'books_add_to_favourites',
                    book_id: bookID
                }
            }
        ).done(res => {
            console.log(res);

            // Enable button again
            $(this).attr('disabled', false);
        }).fail(function () {
            console.log('Something was wrong');
        });
    });
})(jQuery);