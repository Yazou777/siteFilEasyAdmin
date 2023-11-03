function testerRadio() {
    var radio = document.getElementsByName("btnRadChoix");
    for (var i=0; i<radio.length;i++) {
    if (radio[i].checked) {
    document.getElementById("txtBox1").value = radio[i].value;
    }
    }
    }

    console.log("Ah que Coucou2 !");

    //document.getElementById("test").innerHTML = "salut ma couille";
    //console.log(document.getElementById('test').innerHTML);
    //console.log(document.getElementById('info').innerHTML);