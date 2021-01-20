console.log('Labas')

const buttonNuimti = document.querySelector('#nuimti');
const harvestList = document.querySelector('#harvestList');
const errorMsg = document.querySelector('#error');

const addNewList = () => {
    const augalai = document.querySelectorAll('.items');
    console.log(augalai);
    augalai.forEach(augalai => {
        console.log(augalai);

        augalai.querySelector('[name=skinti]').addEventListener('click', () => {
            const id = augalai.querySelector('[name=skinti]').value;
            const kiek = augalai.querySelector('[name=minus]').value;
            axios.post(apiUrl + '/pick', {
                'id': id,
                'kiek': kiek,
                'skinti': 1

            })
                .then(function (response) {
                    console.log(response.data);
                    harvestList.innerHTML = response.data.list;
                    errorMsg.innerHTML = '';
                    addNewList();
                })
                .catch(function (error) {
                    console.log(error.response.data.msg);
                    errorMsg.innerHTML = error.response.data.msg;
                });
        });

        augalai.querySelector('[name=visus]').addEventListener('click', () => {
            const id = augalai.querySelector('[name=visus]').value;
            axios.post(apiUrl + '/pickAll', {
                'id': id,
            })
                .then(function (response) {
                    console.log(response.data);
                    harvestList.innerHTML = response.data.list;
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
    axios.post(apiUrl + '/harvestList', {})
        .then(function (response) {

            console.log(response.data);
            harvestList.innerHTML = response.data.list;
            errorMsg.innerHTML = '';
            addNewList();
        })
        .catch(function (error) {
            console.log(error.response.data.msg);
            errorMsg.innerHTML = error.response.data.msg;
        });

});


buttonNuimti.addEventListener('click', () => {
    axios.post(apiUrl + '/harvest', {

    })
        .then(function (response) {
            console.log(response.data);
            harvestList.innerHTML = response.data.list;
            errorMsg.innerHTML = '';
            addNewList();
        })
        .catch(function (error) {
            console.log(error.response.data.msg);
            errorMsg.innerHTML = error.response.data.msg;
        });
});

