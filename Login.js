let btnToggle = Array.from(document.getElementsByClassName('btn-toggle'));

btnToggle.forEach(btn => {
  btn.addEventListener('click', () => {
    document.getElementById('slider').classList.toggle('toggled');
  });
});