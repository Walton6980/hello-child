window.toggleFilter = function(header) {
    const options = header.nextElementSibling;
    const isOpen = options.style.display === 'block';
    options.style.display = isOpen ? 'none' : 'block';
    header.classList.toggle('active', !isOpen);
  };
  
  