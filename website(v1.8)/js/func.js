
if (document.getElementById('inemail')) {
    document.getElementById('inemail').focus;
}




function mostrarprocessando() {
    var divprocessando = document.createElement('div');
    divprocessando.id = "processandodiv";
    divprocessando.style.position = "fixed";
    divprocessando.style.top = "50%";
    divprocessando.style.left = "50%";
    divprocessando.style.transform = 'translate(-50%, -50%)';
    divprocessando.innerHTML = '<img src="img/loading.gif" width="150px" alt="carregando" title="carregando">';
    document.body.appendChild(divprocessando);
}
function esconderprocessando() {
    var divprocessando = document.getElementById('processandodiv');
    if (divprocessando) {
        document.body.removeChild(divprocessando); ''
    }
}

function fazerlogin() {
    var email = document.getElementById('inemail').value;
    var senha = document.getElementById('insenha').value;
    var erromsg = document.getElementById('erromsg');
    var qntdsenha = senha.length;
    if (email === "" && senha === "") {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'email e senha vazios.';
        return;
    }
    if (email === "") {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'email vazio.';
        return;
    }
    if (senha === "") {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'Senha vazia.';
        return;
    }
    if (qntdsenha < 8) {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'Senha deve conter 8 digitos.';
        return;

    }

    mostrarprocessando();



    document.getElementById('frmLogar').addEventListener('submit', function (event) {
        event.preventDefault();


        fetch('logar.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'email=' + encodeURIComponent(email) + "&senha=" + encodeURIComponent(senha),
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {

                    erromsg.classList.remove('alert-danger');
                    erromsg.classList.add('alert-success');
                    erromsg.innerHTML = data.message;
                    erromsg.style.display = 'block';
                    setTimeout(function () {
                        esconderprocessando();
                        erromsg.style.display = 'none';
                        window.location.href = 'dashboard.php';

                    }, 800);

                } else {

                    esconderprocessando();
                    erromsg.classList.remove('alert-success');
                    erromsg.classList.add('alert-danger');
                    erromsg.style.display = 'block';
                    erromsg.innerHTML = data.message;
                }
            })
            .catch(error => {
                console.error('Erro na requisição', error)
            });
    })
}
function fazercadastro() {
    var nome = document.getElementById('innome').value;
    var senha = document.getElementById('insenha').value;
    var email = document.getElementById('inemail').value;
    
    if (document.getElementById('fotoinput')) {
        var foto = document.getElementById('fotoinput').files[0];
    }
    var erromsg = document.getElementById('erromsg');
    var qntdsenha = senha.length;
    
    if (qntdsenha < 8) {
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'Senha deve conter no minimo 8 digitos.';
        return;

    }

    mostrarprocessando();

    fetch('cadastro.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'email=' + encodeURIComponent(email)  + '&nome=' + encodeURIComponent(nome) + "&senha=" + encodeURIComponent(senha) + "&foto=" + encodeURIComponent(foto) + "&genero=" + encodeURIComponent(genero),
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.success) {

                erromsg.classList.remove('alert-danger');
                erromsg.classList.add('alert-success');
                erromsg.innerHTML = data.message;
                erromsg.style.display = 'block';
                setTimeout(function () {

                    window.location.href = 'index.php'
                    esconderprocessando();
                    erromsg.style.display = 'none';
                }, 800);

            } else {

                esconderprocessando();
                erromsg.classList.remove('alert-success');
                erromsg.classList.add('alert-danger');
                erromsg.style.display = 'block';
                erromsg.innerHTML = data.message;
            }
        })
        .catch(error => {
            console.error('Erro na requisição', error)
        });
}

function carregarConteudo(controle) {

    fetch('controle.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'controle=' + encodeURIComponent(controle),
    })
        .then(response => response.text())
        .then(data => {
            document.getElementById('conteudo').innerHTML = data;
        })
        .catch(error => console.error('Erro na requisição:', error));
}



const modaladdadm = document.getElementById('modaladdadm');
const idadmadd = document.getElementById('idadmadd');
const btnadicionaradm = document.getElementById("btnadicionaradm");

function adicionarTabela(modaladd, btnAdicionar, IdAdd, tipoAdd, formTipo, controle, foto, fotoinput) {

    modaladd.addEventListener('shown.bs.modal', () => {
        IdAdd.focus();
        const submitHandler = function (event) {
            event.preventDefault();
            btnAdicionar.disabled = true;
            var form = event.target;
            var formData = new FormData(form);
            formData.append('controle', tipoAdd);
            if (foto) {

                var fileinput = document.getElementById(fotoinput);
                console.log(fileinput.files[0]);
                formData.append('foto', fileinput.files[0]);
            }

            fetch('controle.php', {
                method: 'POST',
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.success) {
                        alert(data.message);
                        carregarConteudo(controle);
                    } else {
                        alert(data.message);
                    }

                })
                .catch(error => {
                    console.error('Erro na requisição:', error);
                });
        };
        formTipo.addEventListener('submit', submitHandler)
    })
};

function modaladd(nomemodal1, nome_formulario1, btnAdicionar1, idAdd1, controle1, controle2, foto1, fotoinput1) {
    if (nomemodal1) {
        const form1 = document.getElementById(nome_formulario1);
        adicionarTabela(nomemodal1, btnAdicionar1, idAdd1, controle1, form1, controle2, foto1, fotoinput1);
    }
}



modaladd(modaladdadm, "formulario_adicionar_adm", btnadicionaradm, idadmadd, "admadd", 'listaradm', false, "");
modaladd(modaladdcarro, "formulario_adicionar_carro", btnadicionarcarro, idmodeloadd, "carroadd", 'listarcarro', true, "idfotoadd");
modaladd(modaladdcliente, "formulario_adicionar_cliente", btnadicionarcliente, idclienteadd, "clienteadd", 'listarcliente', false, "");

function verproduto(id) {
    fetch('produto.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'id=' + encodeURIComponent(id),
    })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.success = "true") {
                window.location.href = 'produto.php'
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Erro na requisição:', error);
        });
};

function deletarAlgo(controle, id, controle2) {
    fetch('controle.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'controle=' + encodeURIComponent(controle) + '&id=' + encodeURIComponent(id),
    })
        .then(response => response.json())
        .then(data => {
            console.log(data)
            if (data.success = "true") {
                alert(data.message);
                carregarConteudo(controle2);
                location.reload();
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Erro na requisição:', error);
        });
};


function abrirFecharModal(nomeModal, abrirOuFechar) {
    var modal = new bootstrap.Modal(document.getElementById(nomeModal));

    if (abrirOuFechar === 'A') {
        modal.show();
    } else {
        modal.hide();
    }
}

function abrirModalEdicaoCarro(idcarro, modelo, grupo) {

    var carromodelo = document.getElementById('idmodeloedit');
    var carrogrupo = document.getElementById('idgrupoedit');
    if (carromodelo) {
        carromodelo.focus();
    }
    carromodelo.value = modelo;
    carrogrupo.value = grupo;
    document.getElementById('idcarroedit').value = idcarro;

    abrirFecharModal('modaleditcarro', 'A');
}

function abrirModalComprarCarro(idcarro) {

    var idclientecomprar = document.getElementById('idclientecomprar');

    if (idclientecomprar) {
        idclientecomprar.focus();
    }


    document.getElementById('incarrocomprarid').value = idcarro;
    document.getElementById('idvalorcomprar').value = "";
    abrirFecharModal('modalcomprarcarro', 'A');

}
function editarFormulario(formularioEditar, elementoEdit, listarElemento, foto, fotoinput) {
    document.getElementById(formularioEditar).addEventListener('submit', function (event) {
        event.preventDefault();

        var formData = new FormData(this);
        formData.append('controle', elementoEdit);
        if (foto) {

            var fileinput = document.getElementById(fotoinput);
            console.log(fileinput.files[0]);
            formData.append('foto', fileinput.files[0]);
        }
        fetch('controle.php', {
            method: 'POST',
            body: formData,
        })
            .then(response => response.json())
            .then(data => {
                console.log(data)
                if (data.success) {
                    alert(data.message);
                    carregarConteudo(listarElemento);
                } else {
                    alert(data.message);
                }

            })
            .catch(error => {
                console.error('Erro na requisição:', error);
            });
    })
}

editarFormulario('formulario_editar_carro', 'editcarro', 'listarcarro', true, "idfotoedit");



document.getElementById("formulario_comprar_carro").addEventListener('submit', function (event) {
    event.preventDefault();

    var formData = new FormData(this);
    formData.append('controle', 'comprarcarro');

    fetch('controle.php', {
        method: 'POST',
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
            console.log(data)
            if (data.success) {
                alert(data.message);
                carregarConteudo('listarcarro');
            } else {
                alert(data.message);
            }

        })
        .catch(error => {
            console.error('Erro na requisição:', error);
        });
})

function barraDePesquisa() {

    var input, filter, tbody, tr, id, i;
    input = document.getElementById("idcarropesquisado");
    filter = input.value.toUpperCase();
    tbody = document.getElementById("meumenu");
    tr = tbody.getElementsByTagName("tr");
    console.log(tr);

    for (i = 0; i < tr.length; i++) {

        id = tr[i].getElementsByTagName("span")[0];

        modelo = tr[i].getElementsByTagName("span")[2];

        if (id.innerHTML.toUpperCase().indexOf(filter) > -1) {

            tr[i].style.display = "";

        } else {
            if (modelo.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";

            } else {

                tr[i].style.display = "none";

            }
        }

    }
}
function barraDePesquisaCliente() {

    var input, filter, tbody, tr, id, i;
    input = document.getElementById("idcarropesquisado");
    filter = input.value.toUpperCase();
    tbody = document.getElementById("meumenu");
    tr = tbody.getElementsByTagName("tr");
    console.log(tr);

    for (i = 0; i < tr.length; i++) {

        id = tr[i].getElementsByTagName("span")[0];

        modelo = tr[i].getElementsByTagName("span")[1];

        if (id.innerHTML.toUpperCase().indexOf(filter) > -1) {

            tr[i].style.display = "";

        } else {
            if (modelo.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";

            } else {

                tr[i].style.display = "none";

            }
        }

    }
}
function barraDePesquisaVendas() {

    var input, filter, tbody, tr, id, i;
    input = document.getElementById("idcarropesquisado");
    filter = input.value.toUpperCase();
    tbody = document.getElementById("meumenu");
    tr = tbody.getElementsByTagName("tr");
    console.log(tr);

    for (i = 0; i < tr.length; i++) {

        id = tr[i].getElementsByTagName("span")[1];

        modelo = tr[i].getElementsByTagName("span")[2];

        if (id.innerHTML.toUpperCase().indexOf(filter) > -1) {

            tr[i].style.display = "";

        } else {
            if (modelo.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";

            } else {

                tr[i].style.display = "none";

            }
        }

    }
}