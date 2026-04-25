
// ── Toggle complete ──────────────────────────────────────────
function toggleComplete(btn) {
    const icon = btn.querySelector('i');
    const nameEl = btn.closest('.event-item').querySelector('.event-name');
    btn.classList.toggle('completed');
    if (btn.classList.contains('completed')) {
        icon.className = 'bi bi-check-circle-fill';
        nameEl.classList.add('done');
    } else {
        icon.className = 'bi bi-circle';
        nameEl.classList.remove('done');
    }
    updateProgress();
}

// ── Deleta um unico evento 
function deleteEvent(btn) {
    const item = btn.closest('.event-item');
    item.style.animation = 'fadeOut 0.25s ease forwards';
    item.addEventListener('animationend', () => { item.remove(); updateProgress(); updateSelectedInfo(); });
}

// ── Deleta eventos selecionados
function deleteSelected() {
    document.querySelectorAll('.event-select:checked').forEach(cb => {
        const item = cb.closest('.event-item');
        item.style.animation = 'fadeOut 0.25s ease forwards';
        item.addEventListener('animationend', () => { item.remove(); updateProgress(); updateSelectedInfo(); });
    });
}

// ── Update de barra de progresso
function updateProgress() {
    const items = document.querySelectorAll('.event-item');
    const done = document.querySelectorAll('.complete-btn.completed').length;
    const total = items.length;
    const pct = total === 0 ? 0 : Math.round((done / total) * 100);
    document.getElementById('progress-bar').style.width = pct + '%';
    document.getElementById('progress-pct').textContent = pct + '%';
    document.getElementById('progress-label').textContent = done + '/' + total + ' concluídos';
}

// ── Selecionar informações
function updateSelectedInfo() {
    const count = document.querySelectorAll('.event-select:checked').length;
    const info = document.getElementById('selected-info');
    const btnE = document.getElementById('btn-edit-selected');
    const btnD = document.getElementById('btn-delete-selected');
    info.textContent = count > 0 ? count + ' selecionado(s)' : 'Selecione para editar';
    btnE.disabled = count === 0;
    btnD.disabled = count === 0;
}
document.querySelectorAll('.event-select').forEach(cb => cb.addEventListener('change', updateSelectedInfo));