<?php

class WebController extends ControladorBase
{
    private $almacenmodel;
    private $operacionesmodel;
    private $proveedoresmodel;
    private $tallermodel;
    private $vehiculomodel;

    public function __construct()
    {
        parent::__construct();
        $this->almacenmodel = new AlmacenModel();
        $this->operacionesmodel = new OperacionesModel();
        $this->proveedoresmodel = new ProveedoresModel();
        $this->tallermodel = new TallerModel();
        $this->vehiculomodel = new VehiculoModel();
    }

    public function index()
    {
        $dat = ['index'];
        $this->view('index', $dat); //se abre la vista mensajesView
    }

    public function verSuscripcion()
    {
        $dat = ['Suscripcion'];
        $this->view('suscripcion', $dat); //se abre la vista mensajesView
    }

    public function verContacto()
    {
        $dat = ['Contacto'];
        $this->view('contacto', $dat); //se abre la vista mensajesView
    }

    public function verInicio()
    {
        $dat = ['Inicio'];
        $this->view('inicio', $dat); //se abre la vista mensajesView
    }

    public function verLogin()
    {
        $dat = ['Login'];
        $this->view('login', $dat); //se abre la vista mensajesView
    }

    public function verSingUp()
    {
        $dat = ['SigUp'];
        $this->view('singup', $dat); //se abre la vista mensajesView
    }

    public function verAlmacen()
    {
        $all = $this->almacenmodel->getAll();
        $prov = $this->proveedoresmodel->getAll();
        $dat = ['all' => $all, 'prov' => $prov];
        $this->view('almacen', $dat); //se abre la vista mensajesView
    }

    public function verOperaciones()
    {
        $all = $this->almacenmodel->getAll();
        $oper = $this->operacionesmodel->getAll();
        $dat = ['pieza' => $all, 'modo' => 'insertarOperacion', "oper"=>$oper];
        $this->view('operaciones', $dat); //se abre la vista mensajesView
    }

    public function verVehiculos()
    {
        $dat = ['modo' => 'insertarVehiculo'];
        $this->view('vehiculos', $dat); //se abre la vista mensajesView
    }

    public function comprobarusuclave()
    {
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];
        $usuario = $this->tallermodel->comprobarusuclave($nombre, $clave);
        if (is_object($usuario)) {
            $dat = ['usuario' => $usuario];
            $_SESSION['nombre'] = $nombre;
            $this->view('inicio', $dat);
        } else {
            $dat = ['usuario' => $usuario];
            $this->view('login', $dat);
        }
    }

    public function buscarProveedor()
    {
        $proveedor = $_POST['proveedor'];
        $almacenProveedor = $this->almacenmodel->getAlmacenProveedor(
            $proveedor
        );
        $all = $this->almacenmodel->getAll();
        $prov = $this->proveedoresmodel->getAll();

        $dat = ['almacen' => $almacenProveedor, 'all' => $all, 'prov' => $prov];
        $this->view('almacen', $dat);
    }

    public function buscarDescripcion()
    {
        $descripcion = $_POST['nombre'];
        $almacenDescripcion = $this->almacenmodel->getAlmacenDescripcion(
            $descripcion
        );
        $all = $this->almacenmodel->getAll();
        $prov = $this->proveedoresmodel->getAll();

        $dat = [
            'almacen' => $almacenDescripcion,
            'all' => $all,
            'prov' => $prov,
        ];
        $this->view('almacen', $dat);
    }

    public function insertarAlmacen()
    {
        $cantidad = $_POST['cantidad'];
        $descripcion = $_POST['descripcion'];
        $descuento = $_POST['descuento'];
        $precio = $_POST['precio'];
        $nombre = $_POST['nombre'];
        $id = $_POST['id'];

        $men = $this->almacenmodel->getAlmacenProveedor($nombre);
        if (is_object($men)) {
            $mensaje = 'Ya existe un dato con ese nombre.';
        } else {
            $lastid = $this->almacenmodel->insertarAlmacen(
                $id,
                $cantidad,
                $descripcion,
                $descuento,
                $precio,
                $nombre
            );
            if (is_numeric($lastid)) {
                $mensaje = 'Almacen insertado con el id: ' . $lastid;
            } else {
                $mensaje = 'HA OCURRIDO UN ERROR EN LA INSERCIÓN';
            }
        }

        $all = $this->almacenmodel->getAll();
        $prov = $this->proveedoresmodel->getAll();
        $dat = ['mensaje' => $mensaje, 'all' => $all, 'prov' => $prov];
        $this->view('almacen', $dat);
    }

    public function insertarProveedor()
    {
        $cif = $_POST['cif'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $nombre = $_POST['nombre'];
        $taller = $_SESSION['nombre'];

        $men = $this->proveedoresmodel->getProveedorNombre($nombre);
        if (is_object($men)) {
            $mensaje = 'Ya existe un proveedor con ese nombre.';
        } else {
            $lastid = $this->proveedoresmodel->insertarProveedor(
                $cif,
                $direccion,
                $telefono,
                $nombre,
                $taller
            );
            if (is_numeric($lastid)) {
                $mensaje = 'Proveedor insertado con el id: ' . $lastid;
            } else {
                $mensaje = 'HA OCURRIDO UN ERROR EN LA INSERCIÓN';
            }
        }

        $all = $this->almacenmodel->getAll();
        $prov = $this->proveedoresmodel->getAll();
        $dat = ['mensaje' => $mensaje, 'all' => $all, 'prov' => $prov];
        $this->view('almacen', $dat);
    }

    public function buscarBastidor()
    {
        $bastidor = $_POST['bastidor'];
        $vehiculoBastidor = $this->vehiculomodel->getVehiculoBastidor(
            $bastidor
        );

        $dat = ['vehiculo' => $vehiculoBastidor, 'modo' => 'insertarVehiculo'];
        $this->view('vehiculos', $dat);
    }

    public function buscarMatricula()
    {
        $matricula = $_POST['matricula'];
        $vehiculoMatricula = $this->vehiculomodel->getVehiculoMatricula(
            $matricula
        );

        $dat = ['vehiculo' => $vehiculoMatricula, 'modo' => 'insertarVehiculo'];
        $this->view('vehiculos', $dat);
    }

    public function buscarDNI()
    {
        $DNI = $_POST['dni'];
        $vehiculoDNI = $this->vehiculomodel->getVehichuloDni($DNI);

        $dat = ['vehiculo' => $vehiculoDNI, 'modo' => 'insertarVehiculo'];
        $this->view('vehiculos', $dat);
    }

    public function insertarVehiculo()
    {
        $matricula = $_POST['matricula'];
        $bastidor = $_POST['bastidor'];
        $fecha = $_POST['fecha'];
        $nombre = $_POST['nombre'];
        $dni = $_POST['dni'];
        $telefono = $_POST['telefono'];
        $taller = $_SESSION['nombre'];

        $men = $this->vehiculomodel->getVehiculoBastidor($bastidor);
        if (is_object($men)) {
            $mensaje = 'Ya existe un Vehiculo con ese bastidor.';
        } else {
            $lastid = $this->vehiculomodel->insertarVehiculo(
                $matricula,
                $bastidor,
                $fecha,
                $nombre,
                $dni,
                $telefono,
                $taller
            );
            if (is_numeric($lastid)) {
                $mensaje = 'vehiculo insertado con el id: ' . $lastid;
            } else {
                $mensaje = 'HA OCURRIDO UN ERROR EN LA INSERCIÓN';
            }
        }

        $dat = ['mensaje' => $mensaje, 'modo' => 'insertarVehiculo'];
        $this->view('vehiculos', $dat);
    }

    public function buscarOperaciones()
    {
        $matricula = $_POST['matricula'];
        $operacionMatricula = $this->operacionesmodel->getOperacionesMatricula(
            $matricula
        );
        $oper = $this->operacionesmodel->getAll();
        $all = $this->almacenmodel->getAll();
        $dat = ['operaciones' => $operacionMatricula, 'pieza' => $all,
            'modo' => 'insertarOperacion', "oper"=>$oper];
        $this->view('operaciones', $dat);
    }

    public function insertarOperacion()
    {
        $id = $_POST['id'];
        $horas = $_POST['horas'];
        $pago = $_POST['pago'];
        if (isset($_POST['presupuesto'])) {
            $presupuesto = 1;
        } else {
            $presupuesto = 0;
        }
        $matricula = $_POST['matricula'];
        $pieza = $_POST['pieza'];

        $lastid = $this->operacionesmodel->insertarOperacion(
            $horas,
            $pago,
            $matricula,
            $presupuesto,
            $pieza, $id
        );
        if (is_numeric($lastid)) {
            $mensaje = 'Operacion insertado con el id: ' . $id;
        } else {
            $mensaje = 'HA OCURRIDO UN ERROR EN LA INSERCIÓN';
        }
        $oper = $this->operacionesmodel->getAll();
        $all = $this->almacenmodel->getAll();
        $dat = [
            'mensaje' => $mensaje,
            'pieza' => $all,
            'modo' => 'insertarOperacion', "oper"=>$oper
        ];
        $this->view('operaciones', $dat);
    }

    public function borrarModiVehiculo()
    {
        $matricula = $_POST['matricula'];
        if (isset($_POST['borrar'])) {
            $mensaje = $this->vehiculomodel->borrarVehiculo($matricula);

            $dat = ['modo' => 'insertarVehiculo', 'mensaje' => $mensaje];
            $this->view('vehiculos', $dat);
        }
        if (isset($_POST['modificar'])) {
            $vehiculo = $this->vehiculomodel->getVehiculoMatricula($matricula);

            $titulo = 'MODIFICACIÓN';
            $dat = [
                'modo' => 'modificarVehiculo',
                'titulo' => $titulo,
                'vehiculoModi' => $vehiculo
            ];
            $this->view('vehiculos', $dat);
        }
    }

    public function modificarVehiculo()
    {
        $matricula = $_POST['matricula'];
        $bastidor = $_POST['bastidor'];
        $fecha = $_POST['fecha'];
        $nombre = $_POST['nombre'];
        $dni = $_POST['dni'];
        $telefono = $_POST['telefono'];

        $vehiculo = $this->vehiculomodel->modificarVehiculo($matricula, $bastidor, $fecha, $nombre, $dni, $telefono);
        $dat = [
            'modo' => 'insertarOperacion',
            'mensaje' => $vehiculo
        ];
        $this->view('vehiculos', $dat);
    }

    public function modificarOperacion()
    {
        $idoperaciones = $_POST['idoperaciones'];
        $horas = $_POST['horas'];
        $pago = $_POST['pago'];
        if (isset($_POST['presupuesto'])) {
            $presupuesto = 1;
        } else {
            $presupuesto = 0;
        }
        $matricula = $_POST['matricula'];
        $pieza = $_POST['pieza'];

        $all = $this->almacenmodel->getAll();
        $oper = $this->operacionesmodel->getAll();
        $operacion = $this->operacionesmodel-> modificarOperacion($horas, $pago, $matricula, $presupuesto, $pieza, $idoperaciones);

        $dat = ['mensaje' => $operacion,
            'pieza' => $all,
            'modo' => 'insertarOperacion', "oper"=>$oper];
        $this->view('operaciones', $dat);
    }

    
    public function borrarModiOperacion()
    {
        $idoperaciones = $_POST['idOpe'];
        if (isset($_POST['borrar'])) {
            $mensaje = $this->operacionesmodel->borrarOperacion($idoperaciones);
            $all = $this->almacenmodel->getAll();
            $oper = $this->operacionesmodel->getAll();
            $dat = ['modo' => 'insertarOperacion', 'mensaje' => $mensaje, 'pieza' => $all, "oper"=>$oper];
            $this->view('operaciones', $dat);
        }
        if (isset($_POST['modificar'])) {
            $operacionModi = $this->operacionesmodel->getIdOperaciones($idoperaciones);
            $all = $this->almacenmodel->getAll();
            $oper = $this->operacionesmodel->getAll();
            $titulo = 'MODIFICACIÓN';
            $dat = [
                'modo' => 'modificarOperacion',
                'titulo' => $titulo,
                'operacionModi' => $operacionModi,
                'pieza' => $all, "oper"=>$oper
            ];
            $this->view('operaciones', $dat);
        }
    }

}

?>
