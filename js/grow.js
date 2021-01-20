console.log('Labas')

const buttonAuginti = document.querySelector('#auginti');
const growList = document.querySelector('#growList');

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl + '/growList', {})
        .then(function (response) {

            console.log(response.data);
            growList.innerHTML = response.data.list;
            console.log(error);
        })

        .catch(function (error) {
            console.log(error);
        });

});


buttonAuginti.addEventListener('click', () => {
    //const count = document.querySelector('[name=kiekAgurku]').value;
    axios.post(apiUrl + '/grow', {
        auginti: 1,
    })
        .then(function (response) {
            console.log(response.data);
            growList.innerHTML = response.data.list;
            console.log(error);
        })

        .catch(function (error) {
            console.log(error);
        });
});

