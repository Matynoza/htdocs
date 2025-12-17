<?php

// ==========================
// TŘÍDA Passenger
// ==========================
class Passenger {
    public string $name;
    public int $age;
    public string $ticketType;

    public function __construct(string $name, int $age, string $ticketType) {
        $this->name = $name;
        $this->age = $age;
        $this->ticketType = $ticketType;
    }

    // metoda navíc
    public function introduce(): string {
        return "Jmenuji se {$this->name}, je mi {$this->age} let a mám {$this->ticketType} lístek.";
    }
}

// ==========================
// TŘÍDA Car
// ==========================
class Car {
    public string $brand;
    public string $model;
    public int $capacity;

    // vlastnost pro zanoření objektů
    public array $passengers = [];

    public function __construct(string $brand, string $model, int $capacity) {
        $this->brand = $brand;
        $this->model = $model;
        $this->capacity = $capacity;
    }

    // metoda navíc – přidání cestujícího
    public function boardPassenger(Passenger $passenger): void {
        if (count($this->passengers) < $this->capacity) {
            $this->passengers[] = $passenger;
        } else {
            echo "Auto je plné, {$passenger->name} nemůže nastoupit.<br>";
        }
    }
}

// ==========================
// HLAVNÍ ČÁST – SCÉNÁŘ
// ==========================

// vytvoření auta
$car = new Car("Škoda", "Octavia", 2);

// vytvoření cestujících
$passenger1 = new Passenger("Jan", 25, "plný");
$passenger2 = new Passenger("Petra", 22, "studentský");
$passenger3 = new Passenger("Karel", 40, "plný");

// lidé nastupují do auta
$car->boardPassenger($passenger1);
$car->boardPassenger($passenger2);
$car->boardPassenger($passenger3);

// výpis výsledku
echo "<strong>Auto {$car->brand} {$car->model} má tyto cestující:</strong><br>";

foreach ($car->passengers as $p) {
    echo $p->introduce() . "<br>";
}
