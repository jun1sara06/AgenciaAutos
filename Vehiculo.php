<?php
class Vehiculo {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

   
    public function registrar($numero, $marca, $modelo, $anio, $estado) {
        $stmt = $this->conn->prepare(
            "INSERT INTO vehiculos (numero_vehiculo, marca, modelo, anio, estado) VALUES (?, ?, ?, ?, ?)"
        );
        $stmt->bind_param("sssis", $numero, $marca, $modelo, $anio, $estado);

        if ($stmt->execute()) {
            $stmt->close();
            return ["exito" => true, "mensaje" => "Vehículo registrado correctamente."];
        }

        $error = ($this->conn->errno == 1062)
            ? "Ya existe un vehículo con ese número."
            : "Error: " . $this->conn->error;

        $stmt->close();
        return ["exito" => false, "mensaje" => $error];
    }

  
    public function consultar($numero) {
        $stmt = $this->conn->prepare("SELECT * FROM vehiculos WHERE numero_vehiculo = ?");
        $stmt->bind_param("s", $numero);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $fila = $resultado->fetch_assoc(); 
        $stmt->close();
        return $fila;
    }

    
    public function reporte() {
        $sql = "SELECT * FROM vehiculos WHERE estado = 'Rentado'";
        $resultado = $this->conn->query($sql);

        $vehiculos = [];
        while ($fila = $resultado->fetch_assoc()) {
            $vehiculos[] = $fila;
        }
        return $vehiculos;
    }

  
    public function eliminar($numero) {
        $stmt = $this->conn->prepare("DELETE FROM vehiculos WHERE numero_vehiculo = ?");
        $stmt->bind_param("s", $numero);
        $stmt->execute();
        $afectados = $stmt->affected_rows;
        $stmt->close();
        return $afectados > 0;
    }
}
?>