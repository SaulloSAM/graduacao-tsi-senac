function Calc() {
  var valor1=eval(document.frmCalcular.txtValor1.value);
  var valor2=eval(document.frmCalcular.txtValor2.value);
  var valor3=eval(document.frmCalcular.txtValor3.value);
  var valor4=eval(document.frmCalcular.txtValor4.value);

  var resultado=(valor1+valor2+valor3+valor4)/4;

  if((valor1==" ") || (isNaN(valor1))){
        alert("Por favor, inserir apenas número nos campos...");
        document.frmCalcular.txtValor1.focus();
        return;
  }
  if((valor2==" ") || (isNaN(valor2))){
        alert("Por favor, inserir apenas número nos campos...");
        document.frmCalcular.txtValor2.focus();
        return;
  }
  if((valor3==" ") || (isNaN(valor3))){
        alert("Por favor, inserir apenas número nos campos...");
        document.frmCalcular.txtValor3.focus();
        return;
  }
  if((valor4==" ") || (isNaN(valor4))){
        alert("Por favor, inserir apenas número nos campos...");
        document.frmCalcular.txtValor4.focus();
        return;
  }

  document.frmCalcular.txtResultado.value=resultado;
}
/* Função focus:

   usado para dar foco em campos input´s:
   texto (type: text), botão(type: button),
   radio(type:radio) e outros elementos,
   como janela(window), ancoras(a href),
   etc…
*/

/*
  Adição em javascript:
  eval(endreço que está sedo passado para a vareável).
*/
