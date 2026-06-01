/* MAWI — interactions */

// ── Like toggle ──
document.querySelectorAll('.reaction-btn.like').forEach(btn => {
  btn.addEventListener('click', () => {
    const isActive = btn.classList.toggle('active');
    const svg = btn.querySelector('svg');
    const text = btn.childNodes[btn.childNodes.length - 1];
    let count = parseInt(btn.dataset.count, 10);

    if (isActive) {
      svg.setAttribute('fill', '#f43f5e');
      svg.setAttribute('stroke', '#f43f5e');
      btn.dataset.count = count + 1;
    } else {
      svg.setAttribute('fill', 'none');
      svg.setAttribute('stroke', 'currentColor');
      btn.dataset.count = count - 1;
    }

    text.textContent = ' ' + Number(btn.dataset.count).toLocaleString('pt-BR');
    svg.classList.add('like-pop');
    svg.addEventListener('animationend', () => svg.classList.remove('like-pop'), { once: true });
  });
});


document.querySelectorAll('.reaction-btn.save').forEach(btn => {
  btn.addEventListener('click', () => {
    const isActive = btn.classList.toggle('active');
    const svg = btn.querySelector('svg');
    svg.setAttribute('fill', isActive ? '#f59e0b' : 'none');
    svg.setAttribute('stroke', isActive ? '#f59e0b' : 'currentColor');
  });
});

// ── Sidebar active state ──
document.querySelectorAll('.nav-item').forEach(item => {
  item.addEventListener('click', () => {
    document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
    item.classList.add('active');
  });
});

// ── Drop zone ──
const dropZone = document.getElementById('dropZone');
if (dropZone) {
  ['dragenter', 'dragover'].forEach(e => dropZone.addEventListener(e, ev => { ev.preventDefault(); dropZone.classList.add('drag-over'); }));
  ['dragleave', 'drop'].forEach(e => dropZone.addEventListener(e, () => dropZone.classList.remove('drag-over')));
}

// ── Dark mode stub (visual toggle only) ──
const darkBtn = document.getElementById('darkModeBtn');
if (darkBtn) {
  darkBtn.addEventListener('click', () => {
    document.body.classList.toggle('dark');
    const icon = darkBtn.querySelector('svg');
    const isDark = document.body.classList.contains('dark');
    icon.innerHTML = isDark
      ? '<circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/>'
      : '<path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/>';
  });
}
