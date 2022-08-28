let tiles = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
const pijaca = ['pivo', 'pivo_piksna', 'belo_vino', 'rdece_vino',
                'vodka', 'jager', 'stock', 'gin',
                'borovnicke', 'smrekuc', 'leskovec', 'radler',
                'pepsi', 'pepsi_mala', 'cocacola', 'schweppes',
                'voda', 'voda_z_okusom', 'multisola', 'sok',
                'radenska', 'radenska_mala', 'malt_1', 'malt_2',
                'redbull', 'kozarec_0.5', 'kozarec_0.3', 'kozarec_0.03' ];
var jur = 0;
var hos = 0;

var intervalId = window.setInterval(function () {
    request();
}, 1000);


function SignalUpdate() {
    for (let i = 0; i < pijaca.length; i++) {
        document.getElementById(pijaca[i] + '_signal').src = 'img/signal_' + tiles[i] + '.png';
    }
}
function PicUpdate(){
    for (let i = 0; i < pijaca.length; i++) {
        if (tiles[i] == 0)
            document.getElementById(i+1+'s').src = 'img/empty.png';
        else if (tiles[i] > 0)
            document.getElementById(i+1+'s').src = 'img/klukca.png';
    }
}

function request(ju,ho) {
    if (ju){
        jur = ju;
        console.log("ju"+jur);
    }
    if (ho){
        hos = ho;
        console.log("ho"+hos);
    }
    var oReq = new XMLHttpRequest();
    oReq.onload = function () {
        for (let i = 0; i < 28; i++)
            tiles[i] = this.responseText[i];
        if (jur)
            PicUpdate();
        else
            SignalUpdate();
    };
    oReq.open("POST", "get-data.php", true);
    var data = {
        jurck: jur
    };
    oReq.send(JSON.stringify(data));
}
function send(pij) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "send-data.php", true);
    var data = {
        kaj: 'a'+pij,
        jurck: jur,
        host: hos
    };
    xhttp.send(JSON.stringify(data));
}

/*function send(pij) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "send-data.php", true);
    var data = {
        kaj: 'a'+pij,
        jurck: jur
    };
    xhttp.send(JSON.stringify(data));
}*/

