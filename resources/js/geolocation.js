import {storage} from "./utils";

/**
 * Store geolocation in localStorage
 * @todo Записывать данные в БД
 */
if (!storage('beeclub-latitude') && !storage('beeclub-longitude')) {
    navigator.geolocation.getCurrentPosition(position => {
        storage('beeclub-latitude', position.coords.latitude)
        storage('beeclub-longitude', position.coords.longitude)
        // @todo Вывод из env
        const apiKey = '9bcdd5bb-55ca-4cd8-b742-d9995a78e126'
        const url = `https://geocode-maps.yandex.ru/1.x/?format=json&apikey=${apiKey}&geocode=${position.coords.longitude},${position.coords.latitude}`
        getData(url)
            .then(data => {
                const obj = data.response.GeoObjectCollection.featureMember[0].GeoObject
                storage('beeclub-city', obj.description)
                storage('beeclub-street', obj.name)
            });
    }, e => {
        if (e.code === 1) {
            console.warn('Отказано в разрешении геопозии')
        } else if (e.code === 2) {
            console.warn('Геопозиция недоступна')
        } else {
            console.warn(e)
        }
    })
}

async function getData(url = '') {
    const response = await fetch(url, {
        method: 'GET',
        mode: 'cors',
        credentials: 'same-origin',
        headers: {
            'Content-Type': 'application/json'
        },
    })
    return response.json()
}


