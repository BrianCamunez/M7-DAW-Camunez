const tapete = [
    [0],
     [1, 2, 3],
     [4, 5, 6], 
    [7, 8, 9],
    [10, 11, 12],
    [13, 14, 15],
    [16, 17, 18],
    [19, 20, 21],
    [22, 23, 24],
    [25, 26, 27],
    [28, 29, 30],
    [31, 32, 33],
    [34, 35, 36]
];

function actualizarApuestas() {
  const tipoApuesta = document.getElementById("TipoDeApuesta").value;
  const valorApuestaContainer = document.getElementById("seleccionaApuesta");
  const valorApuestaSelect = document.getElementById("ValorApuesta");

  valorApuestaSelect.innerHTML = ""; // Limpiar las opciones anteriores

  switch (tipoApuesta) {
    case "Rojo/Negro":
      valorApuestaSelect.innerHTML += `<option value="Rojo">Rojo (18 números)</option>`;
      valorApuestaSelect.innerHTML += `<option value="Negro">Negro (18 números)</option>`;
      break;
    case "Par/Impar":
      valorApuestaSelect.innerHTML += `<option value="Par">Par (18 números)</option>`;
      valorApuestaSelect.innerHTML += `<option value="Impar">Impar (18 números)</option>`;
      break;
    case "Pasa/Falta":
      valorApuestaSelect.innerHTML += `<option value="Pasa">Pasa (19-36)</option>`;
      valorApuestaSelect.innerHTML += `<option value="Falta">Falta (1-18)</option>`;
      break;
    case "Docena":
      valorApuestaSelect.innerHTML += `<option value="1">Primera Docena (1-12)</option>`;
      valorApuestaSelect.innerHTML += `<option value="2">Segunda Docena (13-24)</option>`;
      valorApuestaSelect.innerHTML += `<option value="3">Tercera Docena (25-36)</option>`;
      break;
    case "Columna":
      valorApuestaSelect.innerHTML += `<option value="1">Columna 1 (1, 4, 7, ..., 34)</option>`;
      valorApuestaSelect.innerHTML += `<option value="2">Columna 2 (2, 5, 8, ..., 35)</option>`;
      valorApuestaSelect.innerHTML += `<option value="3">Columna 3 (3, 6, 9, ..., 36)</option>`;
      break;
    case "Dos docenas":
      valorApuestaSelect.innerHTML += `<option value="1">Docena 1 y 2 (1-24)</option>`;
      valorApuestaSelect.innerHTML += `<option value="2">Docena 2 y 3 (13-36)</option>`;
      break;
    case "Dos columnas":
      valorApuestaSelect.innerHTML += `<option value="1">Columna 1 y 2 (1-24)</option>`;
      valorApuestaSelect.innerHTML += `<option value="2">Columna 2 y 3 (12-36)</option>`;
      break;
    case "Seisena":
      valorApuestaSelect.innerHTML += `<option value="1">Seisena 1 (1, 2, 3, 4, 5, 6)</option>`;
      valorApuestaSelect.innerHTML += `<option value="2">Seisena 2 (4, 5, 6, 7, 8, 9)</option>`;
      valorApuestaSelect.innerHTML += `<option value="3">Seisena 3 (7, 8, 9, 10, 11, 12)</option>`;
      valorApuestaSelect.innerHTML += `<option value="4">Seisena 4 (10, 11, 12, 13, 14, 15)</option>`;
      valorApuestaSelect.innerHTML += `<option value="5">Seisena 5 (13, 14, 15, 16, 17, 18)</option>`;
      valorApuestaSelect.innerHTML += `<option value="6">Seisena 6 (16, 17, 18, 19, 20, 21)</option>`;
      valorApuestaSelect.innerHTML += `<option value="7">Seisena 7 (19, 20, 21, 22, 23, 24)</option>`;
      valorApuestaSelect.innerHTML += `<option value="8">Seisena 8 (22, 23, 24, 25, 26, 27)</option>`;
      valorApuestaSelect.innerHTML += `<option value="9">Seisena 9 (25, 26, 27, 28, 29, 30)</option>`;
      valorApuestaSelect.innerHTML += `<option value="10">Seisena 10 (28, 29, 30, 31, 32, 33)</option>`;
      valorApuestaSelect.innerHTML += `<option value="11">Seisena 11 (31, 32, 33, 34, 35, 36)</option>`;
      break;
    case "Cuadro":
      22
      break;
    case "Transversal":
      for (let i = 0; i < 2; i++) {
        valorApuestaSelect.innerHTML += `<option value="${i + 1}">Transversal ${
          i + 1
        } (Números específicos)</option>`;
      }
      break;
    case "Caballo":
      for (let i = 0; i < 9; i++) {
        valorApuestaSelect.innerHTML += `<option value="${i + 1}">Caballo ${
          i + 1
        } (2 números contiguos)</option>`;
      }
      break;
    case "Pleno":
      for (let i = 0; i <= 36; i++) {
        valorApuestaSelect.innerHTML += `<option value="${i}">${i} (Un solo número)</option>`;
      }
      break;
    default:
      valorApuestaContainer.style.display = "none"; // Ocultar si no es necesario
      return;
  }
  valorApuestaContainer.style.display = "block"; // Mostrar el contenedor de valor de apuesta
}
