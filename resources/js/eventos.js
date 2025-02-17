fetch('/api/events') // Petición a la ruta de Laravel
.then(response => response.json())
.then(data => console.log(data));
