function enviar() {
      const tipo = document.getElementById("tipo").value;
      const data = document.getElementById("data").value;
      const hora = document.getElementById("hora").value;
      const desc = document.getElementById("desc").value;

      if (!tipo || !data || !hora || !desc) {
        alert("Preencha todos os campos!");
        return;
      } else { 
        alert("Compromisso salvo com sucesso!");
        }
        window.location.href = "agenda-aula.html"; 
    }