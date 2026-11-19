'use strict';
function verifAction() {
    const email = document.getElementById('ae').value.trim();
    const name = document.getElementById('nm').value.trim();
    const school = document.getElementById('ly').value.trim();
    const title = document.getElementById('titre').value.trim();
    const type = document.getElementById('tya').value;
    const date = document.getElementById('da').value;
    const place = document.getElementById('li').value.trim();
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) { alert('Adresse électronique invalide.'); return false; }
    if (name.length < 2 || name.length > 50 || school.length < 2 || school.length > 50) { alert('Vérifiez le nom et le lycée (2 à 50 caractères).'); return false; }
    if (title.length < 5 || title.length > 100 || !['N','P','S','R'].includes(type)) { alert('Vérifiez le titre et le type de l’action.'); return false; }
    const selected = new Date(`${date}T00:00:00`);
    const today = new Date(); today.setHours(0, 0, 0, 0);
    if (!date || Number.isNaN(selected.getTime()) || selected < today) { alert('La date doit être aujourd’hui ou une date future.'); return false; }
    if (place.length < 3 || place.length > 100) { alert('Le lieu doit contenir entre 3 et 100 caractères.'); return false; }
    return true;
}
