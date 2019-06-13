function validar(){
    
    
    
  if(document.form.nome.value == "" || document.form.nome.value == null) {
        
        alert("Por favor, indique o seu nome.");
    
        document.form.nome.focus();
       
        return false;
    }
   
    if(document.form.autor.value == "" || document.form.autor.value == null) {
        alert("Por favor, indique um e-mail válido.");
        document.frm.email.focus();
        return false;
    }
    
    if(document.form.publi.value == "" || document.form.publi.value == null) {
        alert("Por favor, indique um cpf.");
        document.frm.cpf.focus();
        return false;
    }
}