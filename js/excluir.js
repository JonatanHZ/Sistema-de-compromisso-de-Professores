function excluir(id) {
    if (confirm('Tem  certeza que deseja excluir esse compromisso?')) {
        window.location.href = 'excluir.php?id=' = id;
    }
}