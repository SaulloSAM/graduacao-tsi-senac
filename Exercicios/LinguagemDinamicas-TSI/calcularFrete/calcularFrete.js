function frete() {
  // Usaremos essa função para fazermos o cálculo de frete atraves da kilometragem passada pelo usuário.
  var km=document.frmFrete.valorDistancia.value;
  var estado=document.getElementById('estados').value;
  var result;

  switch (estado) {
    case "1":
      // O valor por km em minas gerais é de 7 reais.
      result = (km*7);
      break;

    case "2":
      // O valor por km em Rio de Janeiro é de 5 reais.
      result = (km*5);
      break;

    case 3:
      // O valor por km em Paraná é de 4 reais.
      result = (km*4);
      break;

    case 4:
      // O valor por km em São Paulo é de 3 reais.
      result = (km*3);
      break;

    default:
      alert("Por favor, passar as informações corretas!");
      document.frmFrete.valorDistancia.focus();
      return;
    }
    document.frmFrete.txtResultado.value=result;
}
