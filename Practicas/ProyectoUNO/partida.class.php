<?php 

include_once "./carta.class.php";
include_once "./baraja.class.php";

session_start();  // Asegúrate de iniciar la sesión

class Partida
{
    public $numero_jugadores;
    public $numero_cartas;
    public $turno;
    public $baraja;
    public $carta_en_mesa;
    public $array_jugadores;
    public $constante_sentido;
    public $robadas = 0; 
    
    public function __construct($numJugadores = null, $cartasPorJugador = null) {
        // Si los datos de la partida ya existen en la sesión, los carga
        if (isset($_SESSION['partida'])) {
            $partida = unserialize($_SESSION['partida']);
            $this->numero_jugadores = $partida->numero_jugadores;
            $this->numero_cartas = $partida->numero_cartas;
            $this->turno = $partida->turno;
            $this->constante_sentido = $partida->constante_sentido;
            $this->baraja = $partida->baraja;
            $this->array_jugadores = $partida->array_jugadores;
            $this->carta_en_mesa = $partida->carta_en_mesa;
        } else {
            // Si no existe la partida en sesión, crea una nueva
            $this->numero_jugadores = $numJugadores;
            $this->numero_cartas = $cartasPorJugador;
            $this->turno = 0; // Empieza con el jugador 0
            $this->constante_sentido = 1; // Empieza en sentido horario

            $this->baraja = new Baraja();
            $this->baraja->crea_baraja();
            $this->baraja->mezcla();

            $this->array_jugadores = $this->repartir_cartas();
            $this->carta_en_mesa = array_shift($this->baraja->conjunto_cartas);

            // Guarda los datos en la sesión
            $_SESSION['partida'] = serialize($this);
        }
    }

    public function mostrar_datos(){
        echo "numero_jugadores = " . $this->numero_jugadores;
        echo "<br>";
        echo "array_jugadores = " . print_r($this->array_jugadores);
        echo "<br>";
        echo "turno = " . $this->turno;
        echo "<br>";
        echo "carta_en_mesa = ". $this->carta_en_mesa->pinta_carta_link();
        echo "<br>";
        echo "constante_sentuido = " . $this->constante_sentido;
        echo "<br>";
    }

    public function repartir_cartas() {
        $jugadores = [];
        for ($i = 0; $i < $this->numero_jugadores; $i++) {
            $jugadores[$i] = [];
            for ($j = 0; $j < $this->numero_cartas; $j++) {
                $jugadores[$i][] = array_shift($this->baraja->conjunto_cartas);
            }
        }
        $this->carta_en_mesa = array_shift($this->baraja->conjunto_cartas);
        return $jugadores;
    }

    public function jugar(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['accion'] == 'tirar' && isset($_POST['indice_carta'])) {
                // El jugador ha intentado tirar una carta
                $this->tirar_carta(intval($_POST['indice_carta']));  // Tirar la carta seleccionada
            } elseif ($_POST['accion'] == 'robar') {
                // El jugador roba una carta
                $this->robar_cartas(1);
                $this->cambiar_turno();  // Cambia el turno
            }
        }

        echo "<div class='container mt-5'>";
        echo "<h2 class='text-center'>Partida en Curso</h2>";
        echo "<p><strong>Número de jugadores:</strong> $this->numero_jugadores</p>";
        echo "<p><strong>Número de cartas por jugador:</strong> $this->numero_cartas</p>";
        echo "<hr>";

        echo "<div class='table-container'>";
        foreach ($this->array_jugadores as $index => $mano) {
            echo "<div class='player-card'>";
            echo "<h5>Jugador " . ($index + 1) . "</h5>";
            echo "<div class='cards-container'>";
            foreach ($mano as $indice => $carta) {
                // Solo permitir tirar cartas si es el turno del jugador
                if ($index == $this->turno) {
                    echo "<div>";
                    echo $carta->pinta_carta_link($indice);  // Pasamos el índice de la carta
                    echo "</div>";
                } else {
                    echo "<div>" . $carta->pinta_carta() . "</div>";
                }
            }
            echo "</div>";
            echo "</div>";
        }

        echo "<hr>";
        if ($this->carta_en_mesa) {
            echo "<p><strong>Carta en mesa:</strong> " . $this->carta_en_mesa->pinta_carta_link($this->carta_en_mesa->index) . "</p>";
        } else {
            echo "<p><strong>No hay carta en mesa.</strong></p>";
        }

        echo "<hr>";
        echo "<p><strong>Es el turno del Jugador " . ($this->turno + 1) . "</strong></p>";
        $ganador = $this->verificar_ganador();
        if ($ganador != -1) {
            // Si hay un ganador, mostramos el mensaje y terminamos la partida
            echo "<h3>¡El Jugador " . ($ganador + 1) . " ha ganado!</h3>";  // Aquí muestra al jugador que ganó
            echo "<p>¡Felicidades! La partida ha terminado.</p>";
    }

        echo "</div>";
    }

    public function cambiar_turno() {
        $this->turno = ($this->turno + $this->constante_sentido) % $this->numero_jugadores;
        if ($this->turno < 0) {
            $this->turno = $this->numero_jugadores - 1;
        }

        $this->robadas = 0;

        // Guarda los datos actualizados de la partida en la sesión
        $_SESSION['partida'] = serialize($this);
    }

    public function robar_cartas($numero) {
        for ($i = 0; $i < $numero; $i++) {
            if (count($this->baraja->conjunto_cartas) > 0) {
                $this->array_jugadores[$this->turno][] = array_shift($this->baraja->conjunto_cartas);
            }
        }

        // Guarda los datos actualizados de la partida en la sesión
        $_SESSION['partida'] = serialize($this);
    }

    public function sumar_cartas($numero) {
        for ($i = 0; $i < $numero; $i++) {
            if (count($this->baraja->conjunto_cartas) > 0) {
                // Cálculo del turno siguiente con sentido antihorario
                $turnoSiguiente = $this->turno + $this->constante_sentido;
                
                // Si el turno siguiente es negativo, lo corregimos para que se mueva de forma circular
                if ($turnoSiguiente < 0) {
                    $turnoSiguiente = $this->numero_jugadores - 1;
                } else if ($turnoSiguiente >= $this->numero_jugadores) {
                    $turnoSiguiente = 0;
                }
                
                // Robar una carta y asignarla al siguiente jugador
                $this->array_jugadores[$turnoSiguiente][] = array_shift($this->baraja->conjunto_cartas);
            }
        }
    
        // Guarda los datos actualizados de la partida en la sesión
        $_SESSION['partida'] = serialize($this);
    }

    public function tirar_carta($indice_carta) {
        $jugador = $this->array_jugadores[$this->turno];
        $carta_jugador = $jugador[$indice_carta]; // Obtenemos la carta seleccionada
    
        // Verificamos si la carta seleccionada es válida
        if ($this->es_valida_para_jugar($carta_jugador, $this->carta_en_mesa)) {
            // Quitamos la carta de la mano del jugador
            array_splice($this->array_jugadores[$this->turno], $indice_carta, 1);
    
            // Ponemos la carta en la mesa
            $this->carta_en_mesa = $carta_jugador;

            $this->aplicar_efecto($carta_jugador);
    
            // Cambiar turno (después de tirar la carta válida)
            $this->cambiar_turno();
        } else {
            if($this->robadas == 0){
                $this->robadas++;
                $this->robar_cartas(1);
                echo "Has robado una carta. ";
            }else{
                echo "No puedes robar más cartas. El turno se ha saltado.";
                // Cambiar turno aunque la carta no sea válida
                $this->cambiar_turno();
                $this->robadas = 0;
            }
        }
    
        // Guardar el estado de la partida
        $_SESSION['partida'] = serialize($this);
    }

    public function es_valida_para_jugar($carta_jugador, $carta_mesa) {
        // Verificamos si el número o el palo coinciden
        return $carta_jugador->valor == $carta_mesa->valor || $carta_jugador->palo == $carta_mesa->palo;
    }
    
    public function verificar_ganador() {
        // Verificar si algún jugador se ha quedado sin cartas
        foreach ($this->array_jugadores as $index => $mano) {
            if (count($mano) == 0) {
                // El jugador ha ganado, devuelve el índice del jugador
                return $index;
            }
        }
        // No hay ganador aún
        return -1;
    }

    public function aplicar_efecto($carta_jugada) {
        // Dependiendo del valor de la carta, se aplica un efecto especial
        switch ($carta_jugada->valor) {
            case 'skip':
                // El siguiente jugador se salta su turno
                echo "¡El siguiente jugador se salta su turno!";
                $this->cambiar_turno();  // Se cambia el turno inmediatamente, saltando al siguiente
                break;
            
            case 'reverse':
                // Se invierte el sentido de juego
                $this->constante_sentido = -$this->constante_sentido;
                echo "¡El sentido del juego ha cambiado!";
                break;
    
            case 'picker':
                // El jugador tiene que robar cartas
                $this->sumar_cartas(2);  // Roba 2 cartas
                echo "¡El jugador ha robado 2 cartas!";
                break;
            
            case 'color':
            // Se abre una modal para elegir un color
                $_SESSION['mostrarModalColor'] = true;
                $_SESSION['carta_color_en_espera'] = $carta_jugada;

                echo "¡Ha salido una carta de cambio de color! Elige un color.";
                break;

            default:
                echo "No hay efectos especiales para esta carta.";
                break;
        }
    
        // Guardar el estado de la partida después de aplicar el efecto
        $_SESSION['partida'] = serialize($this);
    }

    

}

?>
