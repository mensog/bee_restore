jQuery($ => {
    let data = {
        name: '',
        storeId: '',
        priceTo: '',
        priceFrom: '',
        q: ''
    }

    let storeIds = []

    data.q = $('[name="q"]').val()

    $('[data-category-name]').on('click',
        function (e) {
            e.preventDefault()
            const value = $(this).data('category-name')
            if (data.name === value) {
                $(this).parent().removeClass('active')
                data.name = ''
            } else {
                $('.catalog__aside li').removeClass('active')
                $(this).parent('li').addClass('active')
                $(this).parent('li').parents('li').addClass('active')
                data.name = value
            }
            productsListRequest(data)
        })

    $('[name="filterStore"]').on('input',
        _.debounce(
            function () {
                const storeId = $(this).data('store')
                if (this.checked) {
                    if (!storeIds.includes(storeId)) {
                        storeIds.push(storeId)
                    }
                } else {
                    let index = storeIds.indexOf(storeId);
                    if (index !== -1) storeIds.splice(index, 1);
                }
                data.storeId = storeIds.toString()
                productsListRequest(data)
            }, 200))

    $('[name="priceCatalog"]').on('input',
        _.debounce(
            function () {
                const value = $(this).val().replace(/\D/g, '')
                $(this).val(value)
                const type = $(this).data('type')
                if (type) {
                    data[type] = value
                    productsListRequest(data)
                }
            }, 400))

    /**
     * Change url in window history
     * @param data : object
     * @param pathname
     */
    function changeUrl(data, pathname) {

        const url = createUrlForAddressBar(data, pathname)
        history.replaceState(url, '', url);
    }

    /**
     * Create url from normalized data and pathname
     * @param data : object
     * @param pathname
     * @return {string}
     */
    function createUrlForRequest(data, pathname) {
        let pathSegments = pathname.replace(/^\//, '').replace(/\/$/, '').split('/');
        let resultPath = '';
        if (pathSegments[0] == 'catalog' || pathSegments[0] == 'category') {
            resultPath += '/api/catalog'
        } else {
            resultPath += '/api/' + pathSegments[0]
        }
        const keys = Object.keys(data);
        const last = keys[keys.length - 1];
        let str = `${resultPath}?`
        Object.entries(data).forEach(([key, val]) => {
            if (last === key || (keys[0] === key && last === key)) {
                str += `${key}=${val}`
            } else {
                str += `${key}=${val}&`
            }
        });
        return str
    }

    function createUrlForAddressBar(data, pathname) {
        let pathSegments = pathname.replace(/^\//, '').replace(/\/$/, '').split('/');
        let resultPath = '';
        if (pathSegments[0] == 'catalog') {
            if (data.name !== undefined) {
                resultPath += '/category/' + data.name
            } else {
                resultPath += '/' + path
            }
        } else {
            if (data.name !== undefined) {
                resultPath += '/' + pathSegments[0] + '/' + data.name
            } else {
                if (pathSegments[0] == 'category') {
                    resultPath += '/catalog'
                } else {
                    resultPath += '/' + pathSegments[0]
                }
            }
        }
        const keys = Object.keys(data);
        const last = keys[keys.length - 1];
        let str = `${resultPath}?`
        Object.entries(data).forEach(([key, val]) => {
            if (val && key !== 'name') {
                if (last === key) {
                    str += `${key}=${val}`
                } else if (keys[0] === key && last === key) {
                    str += `${key}=${val}`
                } else {
                    str += `${key}=${val}&`
                }
            }
        });
        return str
    }

    /**
     * clear object
     * @param obj
     * @return {*}
     */
    const clean = obj => {
        Object.keys(obj).forEach(key => (!obj[key] || undefined) && delete obj[key]);
        return obj
    };

    /**
     * Ajax-request to filter products-list
     * @param data
     */
    function productsListRequest(data) {
        const dataNormalized = clean(data)
        const pathname = window.location.pathname
        const urlForRequest = createUrlForRequest(dataNormalized, pathname);
        changeUrl(dataNormalized, pathname)
        if (pathname) {
            const $productsContainer = $('#productsContainer');
            const $breadcrumbs = $('#breadcrumbs');
            $.ajax({
                type: 'GET',
                url: `${urlForRequest}`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: dataNormalized,
                beforeSend: () => {
                    $productsContainer.addClass('loading')
                },
                success: data => {
                    $productsContainer.replaceWith(data['html']);
                    if (data['breadcrumbs']) {
                        $breadcrumbs.replaceWith(data['breadcrumbs']);
                    }
                    $productsContainer.removeClass('loading')
                },
                error: e => {
                    console.log(e)
                }
            });
        }
    }
})
