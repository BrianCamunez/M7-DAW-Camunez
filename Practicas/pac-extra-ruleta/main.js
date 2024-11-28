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
        valorApuestaSelect.innerHTML += `<option value="1">Cuadro 1 (1, 2, 4, 5)</option>`;
        valorApuestaSelect.innerHTML += `<option value="2">Cuadro 2 (2, 3, 5, 6)</option>`;
        valorApuestaSelect.innerHTML += `<option value="3">Cuadro 3 (4, 5, 7, 8)</option>`;
        valorApuestaSelect.innerHTML += `<option value="4">Cuadro 4 (5, 6, 8, 9)</option>`;
        valorApuestaSelect.innerHTML += `<option value="5">Cuadro 5 (7, 8, 10, 11)</option>`;
        valorApuestaSelect.innerHTML += `<option value="6">Cuadro 6 (8, 9, 11, 12)</option>`;
        valorApuestaSelect.innerHTML += `<option value="7">Cuadro 7 (10, 11, 13, 14)</option>`;
        valorApuestaSelect.innerHTML += `<option value="8">Cuadro 8 (11, 12, 14, 15)</option>`;
        valorApuestaSelect.innerHTML += `<option value="9">Cuadro 9 (13, 14, 16, 17)</option>`;
        valorApuestaSelect.innerHTML += `<option value="10">Cuadro 10 (14, 15, 17, 18)</option>`;
        valorApuestaSelect.innerHTML += `<option value="11">Cuadro 11 (16, 17, 19, 20)</option>`;
        valorApuestaSelect.innerHTML += `<option value="12">Cuadro 12 (17, 18, 20, 21)</option>`;
        valorApuestaSelect.innerHTML += `<option value="13">Cuadro 13 (19, 20, 22, 23)</option>`;
        valorApuestaSelect.innerHTML += `<option value="14">Cuadro 14 (20, 21, 23, 24)</option>`;
        valorApuestaSelect.innerHTML += `<option value="15">Cuadro 15 (22, 23, 25, 26)</option>`;
        valorApuestaSelect.innerHTML += `<option value="16">Cuadro 16 (23, 24, 26, 27)</option>`;
        valorApuestaSelect.innerHTML += `<option value="17">Cuadro 17 (25, 26, 28, 29)</option>`;
        valorApuestaSelect.innerHTML += `<option value="18">Cuadro 18 (26, 27, 29, 30)</option>`;
        valorApuestaSelect.innerHTML += `<option value="19">Cuadro 19 (28, 29, 31, 32)</option>`;
        valorApuestaSelect.innerHTML += `<option value="20">Cuadro 20 (29, 30, 32, 33)</option>`;
        valorApuestaSelect.innerHTML += `<option value="21">Cuadro 21 (31, 32, 34, 35)</option>`;
        valorApuestaSelect.innerHTML += `<option value="22">Cuadro 22 (32, 33, 35, 36)</option>`;
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
        valorApuestaContainer.style.display = "none";
        return;
    }
    valorApuestaContainer.style.display = "block"; 
  }
  