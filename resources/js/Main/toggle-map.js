jQuery($ => {
    $('.main-map-toggle').hover(function () {

        const dataMap = $(this).data('map')

        if ($(this).hasClass('active')) {
            $(this).removeClass('active')
            $(`#${dataMap}`).removeClass('active')
        } else {
            $('.main-map-toggle').removeClass('active')
            $('.main-map-points__item').removeClass('active')
            $(this).addClass('active')
            $(`#${dataMap}`).addClass('active')
        }
    })
})
