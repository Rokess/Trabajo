<?php

class WebController extends ControladorBase {

    private $almacenmodel;
    private $operacionesmodel;
    private $proveedoresmodel;
    private $tallermodel;
    private $vehiculomodel;

    public function __construct() {
        parent::__construct();
        $this->almacenmodel = new AlmacenModel();
        $this->operacionesmodel = new OperacionesModel();
        $this->proveedoresmodel = new ProveedoresModel();
        $this->tallermodel = new TallerModel();
        $this->vehiculomodel = new VehiculoModel();
    }

    public function index() {
        $dat = array("index");
        $this->view("index", $dat); //se abre la vista mensajesView
    }

    public function verSuscripcion() {
        $dat = array("Suscripcion");
        $this->view("suscripcion", $dat); //se abre la vista mensajesView
    }

    public function verContacto() {
        $dat = array("Contacto");
        $this->view("contacto", $dat); //se abre la vista mensajesView
    }

    public function verInicio() {
        $dat = array("Inicio");
        $this->view("inicio", $dat); //se abre la vista mensajesView
    }

    public function verLogin() {
        $dat = array("Login");
        $this->view("login", $dat); //se abre la vista mensajesView
    }

    public function verSingUp() {
        $dat = array("SigUp");
        $this->view("singup", $dat); //se abre la vista mensajesView
    }

    public function verAlmacen() {
        $all = $this->almacenmodel->getAll();
        $prov = $this->proveedoresmodel->getAll();
        $dat = array("all" => $all, "prov" => $prov);
        $this->view("almacen", $dat); //se abre la vista mensajesView
    }

    public function verOperaciones() {
        $all = $this->almacenmodel->getAll();
        $dat = array("pieza" => $all, "modo" => "insertarOperacion");
        $this->view("operaciones", $dat); //se abre la vista mensajesView
    }

    public function verVehiculos() {
        $dat = array("Vehiculos");
        $this->view("vehiculos", $dat); //se abre la vista mensajesView
    }

    public function comprobarusuclave() {
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];
        $usuario = $this->tallermodel->comprobarusuclave($nombre, $clave);
        if (is_object($usuario)) {
            $dat = array("usuario" => $usuario);
            $_SESSION['nombre'] = $nombre;
            $this->view("inicio", $dat);
        } else {
            $dat = array("usuario" => $usuario);
            $this->view("login", $dat);
        }
    }

    public function buscarProveedor() {
        $proveedor = $_POST['proveedor'];
        $almacenProveedor = $this->almacenmodel->getAlmacenProveedor($proveedor);
        $all = $this->almacenmodel->getAll();
        $prov = $this->proveedoresmodel->getAll();

        $dat = array("almacen" => $almacenProveedor, "all" => $all, "prov" => $prov);
        $this->view("almacen", $dat);
    }

    public function buscarDescripcion() {
        $descripcion = $_POST['nombre'];
        $almacenDescripcion = $this->almacenmodel->getAlmacenDescripcion($descripcion);
        $all = $this->almacenmodel->getAll();
        $prov = $this->proveedoresmodel->getAll();

        $dat = array("almacen" => $almacenDescripcion, "all" => $all, "prov" => $prov);
        $this->view("almacen", $dat);
    }

    public function insertarAlmacen() {
        $cantidad = $_POST['cantidad'];
        $descripcion = $_POST['descripcion'];
        $descuento = $_POST['descuento'];
        $precio = $_POST['precio'];
        $nombre = $_POST['nombre'];
        $id = $_POST['id'];

        $men = $this->almacenmodel->getAlmacenProveedor($nombre);
        if (is_object($men)) {
            $mensaje = "Ya existe un dato con ese nombre.";
        } else {
            $lastid = $this->almacenmodel->insertarAlmacen($id, $cantidad, $descripcion, $descuento, $precio, $nombre);
            if (is_numeric($lastid)) {
                $mensaje = "Almacen insertado con el id: " . $lastid;
            } else {
                $mensaje = "HA OCURRIDO UN ERROR EN LA INSERCIÓN";
            }
        }

        $all = $this->almacenmodel->getAll();
        $prov = $this->proveedoresmodel->getAll();
        $dat = array("mensaje" => $mensaje, "all" => $all, "prov" => $prov);
        $this->view("almacen", $dat);
    }

    public function insertarProveedor() {
        $cif = $_POST['cif'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $nombre = $_POST['nombre'];
        $taller = $_SESSION['nombre'];

        $men = $this->proveedoresmodel->getProveedorNombre($nombre);
        if (is_object($men)) {
            $mensaje = "Ya existe un proveedor con ese nombre.";
        } else {
            $lastid = $this->proveedoresmodel->insertarProveedor($cif, $direccion, $telefono, $nombre, $taller);
            if (is_numeric($lastid)) {
                $mensaje = "Proveedor insertado con el id: " . $lastid;
            } else {
                $mensaje = "HA OCURRIDO UN ERROR EN LA INSERCIÓN";
            }
        }

        $all = $this->almacenmodel->getAll();
        $prov = $this->proveedoresmodel->getAll();
        $dat = array("mensaje" => $mensaje, "all" => $all, "prov" => $prov);
        $this->view("almacen", $dat);
    }

    public function buscarBastidor() {
        $bastidor = $_POST['bastidor'];
        $vehiculoBastidor = $this->vehiculomodel->getVehiculoBastidor($bastidor);

        $dat = array("vehiculo" => $vehiculoBastidor);
        $this->view("vehiculos", $dat);
    }

    public function buscarMatricula() {
        $matricula = $_POST['matricula'];
        $vehiculoMatricula = $this->vehiculomodel->getVehiculoMatricula($matricula);

        $dat = array("vehiculo" => $vehiculoMatricula);
        $this->view("vehiculos", $dat);
    }

    public function buscarDNI() {
        $DNI = $_POST['dni'];
        $vehiculoDNI = $this->vehiculomodel->getVehichuloDni($DNI);

        $dat = array("vehiculo" => $vehiculoDNI);
        $this->view("vehiculos", $dat);
    }

    public function insertarVehiculo() {
        $matricula = $_POST['matricula'];
        $bastidor = $_POST['bastidor'];
        $fecha = $_POST['fecha'];
        $nombre = $_POST['nombre'];
        $dni = $_POST['dni'];
        $telefono = $_POST['telefono'];
        $taller = $_SESSION['nombre'];

        $men = $this->vehiculomodel->getVehiculoBastidor($bastidor);
        if (is_object($men)) {
            $mensaje = "Ya existe un Vehiculo con ese bastidor.";
        } else {
            $lastid = $this->vehiculomodel->insertarVehiculo($matricula, $bastidor, $fecha, $nombre, $dni, $telefono, $taller);
            if (is_numeric($lastid)) {
                $mensaje = "vehiculo insertado con el id: " . $lastid;
            } else {
                $mensaje = "HA OCURRIDO UN ERROR EN LA INSERCIÓN";
            }
        }

        $dat = array("mensaje" => $mensaje);
        $this->view("vehiculos", $dat);
    }

    public function buscarOperaciones() {
        $matricula = $_POST['matricula'];
        $operacionMatricula = $this->operacionesmodel->getOperacionesMatricula($matricula);

        $all = $this->almacenmodel->getAll();
        $dat = array("operaciones" => $operacionMatricula, "pieza" => $all);
        $this->view("operaciones", $dat);
    }

    public function insertarOperacion() {
        $horas = $_POST['horas'];
        $pago = $_POST['pago'];
        if (isset($_POST['presupuesto'])) {
            $presupuesto = 1;
        } else {
            $presupuesto = 0;
        }
        $matricula = $_POST['matricula'];
        $pieza = $_POST['pieza'];

        $lastid = $this->operacionesmodel->insertarOperacion($horas, $pago, $matricula, $presupuesto, $pieza);
        if (is_numeric($lastid)) {
            $mensaje = "Operacion insertado con el id: " . $lastid;
        } else {
            $mensaje = "HA OCURRIDO UN ERROR EN LA INSERCIÓN";
        }


        $all = $this->almacenmodel->getAll();
        $dat = array("mensaje" => $mensaje, "pieza" => $all, "modo" => "insertarOperacion");
        $this->view("operaciones", $dat);
    }

    public function borrarModiVehiculo() {
        $matricula = $_POST['matricula'];
        if (isset($_POST['borrar'])) {
            $mensaje = $this->vehiculomodel->borrarVehiculo($matricula);

            $dat = array("modo" => "insertarVehiculo", "mensaje" => $mensaje);
            $this->view("vehiculos", $dat);
        }
        if (isset($_POST['modificar'])) {
            $vehiculo = $this->vehiculomodel->getVehiculoMatricula($matricula);

            $titulo = "MODIFICACIÓN";
            $dat = array("modo" => "modificarVehiculo", "titulo" => $titulo, "vehiculoModi" => $vehiculo);
            $this->view("vehiculos", $dat);
        }
    }

    public function modificarVehiculo() {
        $matricula = $_POST['matricula'];
        if (isset($_POST['borrar'])) {
            $mensaje = $this->vehiculomodel->borrarVehiculo($matricula);
 
            $dat = array("modo" => "insertarVehiculo", "mensaje" => $mensaje);
            $this->view("vehiculos", $dat);
        }
        if (isset($_POST['modificar'])) {
            $vehiculo = $this->vehiculomodel->getVehiculoMatricula($matricula);

            $titulo = "MODIFICACIÓN";
            $dat = array("modo" => "modificarVehiculo", "titulo" => $titulo, "vehiculoModi" => $vehiculo);
            $this->view("vehiculos", $dat);
        }
    }

}

?>