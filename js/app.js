
console.log('Labas')

const buttonAgurkas = document.querySelector('#sodintiAgurka');
const buttonPomidoras = document.querySelector('#sodintiPomidora');
const list = document.querySelector('#list');
const errorMsg = document.querySelector('#error');

const addNewList = () => {
    const augalai = document.querySelectorAll('.items');
    console.log(augalai);
    augalai.forEach(augalai => {
        console.log(augalai);
        augalai.querySelector('[type=button]').addEventListener('click', () => {
            const id = augalai.querySelector('[name=rauti]').value;
            axios.post(apiUrl + '/remove', {
                id: id,
            })
                .then(function (response) {
                    console.log(response.data);
                    list.innerHTML = response.data.list;
                    errorMsg.innerHTML = '';
                    addNewList();
                })
                .catch(function (error) {
                    console.log(error.response.data.msg);
                    errorMsg.innerHTML = error.response.data.msg;
                });
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    axios.post(apiUrl + '/list', {})
        .then(function (response) {

            console.log(response.data);
            list.innerHTML = response.data.list;
            errorMsg.innerHTML = '';
            addNewList();
        })
        .catch(function (error) {
            console.log(error.response.data.msg);
            errorMsg.innerHTML = error.response.data.msg;
        });

});


buttonAgurkas.addEventListener('click', () => {
    const count = document.querySelector('[name=kiekAgurku]').value;

    axios.post(apiUrl + '/plantCucumber', {
        kiekis: count,
    })
        .then(function (response) {
            console.log(response.data);
            list.innerHTML = response.data.list;
            errorMsg.innerHTML = '';
            addNewList();
        })
        .catch(function (error) {
            console.log(error.response.data.msg);
            errorMsg.innerHTML = error.response.data.msg;
        });
});

buttonPomidoras.addEventListener('click', () => {
    const count = document.querySelector('[name=kiekPomidoru]').value;

    axios.post(apiUrl + '/plantTomato', {
        kiekis: count,
    })
        .then(function (response) {
            console.log(response.data);
            list.innerHTML = response.data.list;
            errorMsg.innerHTML = '';
            addNewList();
        })
        .catch(function (error) {
            console.log(error.response.data.msg);
            errorMsg.innerHTML = error.response.data.msg;
        });
});