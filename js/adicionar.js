function validarForm() {
  const professor_id = document.getElementById('professor_id').value;
  const agenda_tipo_id = document.getElementById('agenda_tipo_id').value;
  const data = document.getElementById('data').value;

  if (!professor_id || !agenda_tipo_id || !data) {
    alert('Por favor, preencha todos os campos obrigatórios.');
    return false;
  }

  return true;
}