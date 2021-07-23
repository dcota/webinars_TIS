
function fillTable() {
    fetch('http://localhost:3000/bd')
        .then(res => res.json())
        .then(data => processData(data))
        .catch((error) => {
            alert('Falha', error);
        })
}

function inserirAluno() {
    const pn = document.getElementsById('primnome').value;
    const un = document.getElementById('ultnome').value;
    const mor = document.getElementById('morada').value;
    const dn = document.getElementById('datanascimento').value;
    const tel = document.getElementById('telemovel').value;
    const gen = document.getElementById('genero').value;

    var obj = {
        pn : pn,
        un : un,
        mor : mor,
        dn : dn,
        tel : tel,
        gen : gen
    }

    const myAluno = JSON.stringify(obj);

    const options = {
        method: 'POST',
        headers: {
            'Content-type': 'application/json'
        },
        mode: 'cors',
        body: myAluno
    };

    fetch('http://localhost:3000/insert', options)
        .then(function (response) {
            return response.text();
        })
        .then(function (text) {
            console.log('Request successful:', text);
        })
        .catch((error) => {
            log('Request failed', error)
        });
}

function processData(data) {
    var tabela = document.getElementById('tabela');
    for (let i = 0; i < data.length; i++) {
        var mySQLDate = data[i].datanascimento;
        var final = dateTimeToMYSQL(mySQLDate);
        var row = `<tr>
                    <td>${data[i].idaluno}</td>
                    <td>${data[i].primnome} ${data[i].ultnome}</td>
                    <td>${data[i].morada}</td>
                    <td>${final}</td>
                    <td>${data[i].telemovel}</td>
                    <td>${data[i].genero}</td>
                    </tr>`;
        tabela.innerHTML += row;
    }

}

function dateTimeToMYSQL(datx) {
    var d = new Date(datx),
        month = '' + (d.getMonth() + 1),
        day = d.getDate().toString(),
        year = d.getFullYear(),
        hours = d.getHours().toString(),
        minutes = d.getMinutes().toString(),
        secs = d.getSeconds().toString();
    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;
    if (hours.length < 2) hours = '0' + hours;
    if (minutes.length < 2) minutes = '0' + minutes;
    if (secs.length < 2) secs = '0' + secs;
    return [year, month, day].join('-');
}