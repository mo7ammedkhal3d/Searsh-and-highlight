$(document).ready(() => {
    var searchInput = $('.container').find('input').eq(0);
    var btnClear = $('.container').find('.delete-icon').eq(0);

    searchInput.on('input', () => {
        $.get(`process.php/?inputText=${searchInput.val()}`, (data) => {
            $('.searshed-data').html(data);
        });
    });

    btnClear.on('click', () => {
        searchInput.val("");
        $('.searshed-data').html("");
    });
});