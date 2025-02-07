<?php
// 1. Definición de las interfaces de productos abstractos

// Producto Abstracto: Botón
interface Button {
    public function paint();
}

// Producto Abstracto: Casilla de Verificación
interface Checkbox {
    public function paint();
}

// 2. Definición de la interfaz de la fábrica abstracta

interface GUIFactory {
    public function createButton(): Button;
    public function createCheckbox(): Checkbox;
}

// 3. Implementaciones concretas de productos para Windows

class WindowsButton implements Button {
    public function paint() {
        echo "Pintando un botón estilo Windows.\n";
    }
}

class WindowsCheckbox implements Checkbox {
    public function paint() {
        echo "Pintando una casilla de verificación estilo Windows.\n";
    }
}

// 4. Implementaciones concretas de productos para MacOS

class MacOSButton implements Button {
    public function paint() {
        echo "Pintando un botón estilo MacOS.\n";
    }
}

class MacOSCheckbox implements Checkbox {
    public function paint() {
        echo "Pintando una casilla de verificación estilo MacOS.\n";
    }
}

// 5. Implementaciones concretas de fábricas

class WindowsFactory implements GUIFactory {
    public function createButton(): Button {
        return new WindowsButton();
    }
    
    public function createCheckbox(): Checkbox {
        return new WindowsCheckbox();
    }
}

class MacOSFactory implements GUIFactory {
    public function createButton(): Button {
        return new MacOSButton();
    }
    
    public function createCheckbox(): Checkbox {
        return new MacOSCheckbox();
    }
}

// 6. Código cliente que utiliza la fábrica abstracta y los productos

class Application {
    private $button;
    private $checkbox;
    
    // La fábrica se inyecta en el constructor
    public function __construct(GUIFactory $factory) {
        // Creación de la familia de productos mediante la fábrica
        $this->button = $factory->createButton();
        $this->checkbox = $factory->createCheckbox();
    }
    
    public function paint() {
        $this->button->paint();
        $this->checkbox->paint();
    }
}

// Función cliente que selecciona la fábrica concreta en tiempo de ejecución

function clientCode(GUIFactory $factory) {
    $app = new Application($factory);
    $app->paint();
}

// Ejecución de ejemplo:

echo "Cliente: Probando el código con WindowsFactory:\n";
clientCode(new WindowsFactory());

echo "\nCliente: Probando el código con MacOSFactory:\n";
clientCode(new MacOSFactory());
?>
