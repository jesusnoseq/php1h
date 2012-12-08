<?php
session_cache_limiter('private, must-revalidate');
$cache_limiter = session_cache_limiter();
session_cache_expire(60); // en minutos 
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>PHP en una hora</title>
    </head>
    <body>
        <pre>
        <h1>PHP en una hora</h1>

<h2>Hola mundo</h2>
            <?php
            echo 'Hello wordl!';
            ?>

<!--<h2>Comentarios</h2>-->
            <?php
            //comentarios de una linea
            # otra forma de comentar
            /*
              De varias lineas
             */
            /**
             * Constructor - Register administration header callback.
             *
             * @since 3.0.0
             * @param callback $admin_header_callback
             * @return Custom_Background
             */
            ?>

<h2>Variables</h2>
            <?php
            //variables http://www.php.net/manual/en/language.types.php
            $a; // no inicializada(NULL)
            echo gettype($a) . "\n";
            $a = 10; //le asignamos un entero
            echo gettype($a) . "\n";
            $a = "10"; // le asignamos un string
            echo gettype($a) . "\n";
            $a = array(); // ahora es un array
            echo gettype($a) . "\n";
            $a = new DOMEntity(); // ahora es un objeto
            echo gettype($a) . "\n";
            ?>
<h2>Constantes</h2>
            <?php
            define(PI, 3.14);
            const TITLE = "PHP1h";
            echo PI . "\n";
            echo TITLE . "\n";
            ?>
<h2>Cadenas</h2>
            <?php
            $a = " <b>hola</b> ";
            echo $a . '->' . htmlspecialchars($a) . "\n";

            echo 'Logitud: ' . strlen($a) . "\n";
            echo 'Logitud aplicando trim: ' . strlen(trim($a)) . "\n";
            ?>

<h2>Comillas simples vs comillas dobles</h2>
            <?php
            //comillas simples vs comillas dobles
            $foo = 10;
            echo "valor: $foo \n<br/>";
            echo 'valor: $foo \n<br/>';
            ?>

<h2>Comparación de variables; igual o idéntico</h2>
            <?php
            //comparacion de variables; igual o idéntico
            $a = 10;
            $b = '10';
            echo "<br/>¿Son iguales con ==? " . ($b == $a);
            echo "<br/>¿Son iguales con ===? " . ($b === $a); // tambien existe !== (no identico) 
            $b = (int) $b;
            echo "<br/>Y ahora ¿son iguales con ===? " . ($b === $a);
            ?>

<h2>Arrays</h2>
            <?php
            //Arrays
            $items[] = 1;
            $items[5] = 2;
            $items['key'] = 3;
            $items[] = array(true, null, 23, "bla");
            $items['key'] = array('key1' => 'valor1', 0 => "woalaaaaa");

            echo 'Elemento $items [\'key\'][0] = ' . $items ['key'][0] . "\n";

            $items[] = json_decode('{"name":"root", "password":"123456"}', true);


            // mas funciones en http://es1.php.net/manual/es/book.array.php
            // transforma un cadena de caracteres en noctacion json a un array asociativo
            $items = json_decode('{"name":"root", "password":"123456"}', true);
            // si es un array
            if (is_array($items)) {
                //numero de elementos del array
                echo 'Numero de elementos: ' . count($items) . "\n";
                //imprimir un array
                print_r($items);
            }
            ?>

<h2>Estructuras de Control - if</h2>
            <?php
            //Estructuras de Control - if
            $a = 0;
            if ($a) {
                echo $a . '<br/>';
            } else if (isset($a)) {
                echo '$a esta definida<br/>';
            } else {
                echo '$a no existe<br/>';
            }

            $hour = date('H');
            echo ($hour < 12) ? 'Good morning!' : 'Good afternoon!';
            ?>

<h2>Funciones</h2>
            <?php

            //Funciones

            function foo() {
                return "poo";
            }

            function foo2($bar = "Por defecto") {
                return $bar;
            }

            function bar(&$bar) {
                $bar = "foo";
            }

            echo foo() . "\n";
            echo foo2() . "\n";
            $var = "var";
            bar($var);
            echo $var . "\n";
            ?>

<h2>Switch</h2>
            <?php
            //switch
            $dia = date('D');
            echo $dia . "\n";
            switch (strtoupper($dia)) {
                case 'SUN': echo 'Domingo';
                    break;
                case 'MON': echo 'Lunes';
                    break;
                case 'TUE': echo 'Martes';
                    break;
                case 'WED': echo 'Miércoles';
                    break;
                case 'THU': echo 'Jueves';
                    break;
                case 'FRI': echo 'Viernes';
                    break;
                case 'SAT': echo 'Sábado';
                    break;
            }
            ?>

<h2>Estructuras de Control - Iteradores</h2>
            <?php
            //iteradores
            $array = range(0, 10);
            $len = count($array);
            for ($i = 0; $i < $len; $i++) {
                $array[$i] = $array[$i] * 10;
            }
            reset($array);
            do {
                $key = key($array);
                $array[$key] = current($array) * 10;
            } while (next($array));


            foreach ($array as $key => $value) {
                $array[$key] = $value * 10;
            }

            // cuidado, los array no se pasan por referencia solos
            function multiplicaX10(&$valor) {
                $valor*=10;
            }

            array_walk($array, multiplicaX10);

            print_r($array);
            ?>

<h2>Estructuras de control - include, include_once, require, require_once</h2>
            <?php
            include_once 'includeFile.php';
            include_once 'includeFile.php';
            ?>

<h2>Superglobales</h2>
            <?php
            echo '<h3>$_SERVER<h3/>';
            print_r($GLOBALS);
            echo '<h3>$_SERVER<h3/>';
            print_r($_SERVER);
            echo '<h3>$_POST</h3>';
            print_r($_POST);
            echo '<h3>$_GET</h3>';
            print_r($_GET);
            echo '<h3>$_SESSION</h3>';
            print_r($_SESSION);
            echo '<h3>$_COOKIE</h3>';
            print_r($_COOKIE);
            echo '<h3>$_ENV</h3>';
            print_r($_ENV);
            ?>

<h2>Formularios</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <fieldset><legend>Por POST</legend>
    <input name="var" />
    <input type="submit" />
    </fieldset>
</form>
<form method="get" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <fieldset><legend>Por GET</legend>
    <input name="var" />
    <input type="submit" />
    </fieldset>
</form>
            <?php
            //Formularios
            echo $_POST['var'];
            echo 'Por GET: ' . $_GET['var'] . '<br/>';
            echo 'Por POST sin filtrar: ' . $_POST['var'] . '<br/>';
            echo 'Por POST filtrado con htmlspecialchars: ' . htmlspecialchars($_POST['var']) . '<br/>';
            echo 'Por POST filtrado con strip_tags: ' . strip_tags($_POST['var']) . '<br/>';
            ?>

<h2>Objetos</h2>
            <?php

            //Objetos

            class Animal {

                var $patas;
                private $habitat;

                static function planeta() {
                    return "Tierra";
                }

                protected function setHabitat($habitat) {
                    $this->habitat = $habitat;
                }

                public function getHabitat() {
                    return $this->habitat;
                }

            }

            class Gato extends Animal {

                private $nombre;

                function __construct($nombre, $patas = 4) {
                    $this->nombre = $nombre;
                    $this->patas = $patas;
                }

                public function setHabitat($habitat) {
                    parent::setHabitat($habitat);
                }

                public function getNombre() {
                    return $this->nombre;
                }

            }

            $michifu = new Gato("Michifu");
            echo 'El gato ' . $michifu->getNombre() . ' tiene ' . $michifu->patas .
            ' patas y es de la ' . Gato::planeta();
            ?>

<h2>Mysql</h2>
            <?php
            $tablaSQL = <<<TABLASQL
 CREATE TABLE IF NOT EXISTS usuarios (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR( 200 ) NOT NULL ,
    password VARCHAR( 200 ) NOT NULL ,
    UNIQUE (name)
) ENGINE = InnoDB DEFAULT CHARSET=utf8
TABLASQL;
            
            require_once 'configDB.php';
            
            $mysql = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)
                    or die("Error while connecting to database");
            mysql_select_db(DB_NAME, $mysql)
                    or die("Error while select database");
            mysql_set_charset(DB_CHARSET);

            mysql_query($tablaSQL, $mysql);


            // ¡Cuidado!
            //  el dato puede venir de un formulario por ejemplo
            // $pass='%'; 
            // $sql="select id, name, password from usuarios where password like '$pass'";

            $pass = mysql_real_escape_string('123');
            $sql = "select id, name, password 
                    from usuarios 
                    where password like '$pass'";
            $result = mysql_query($sql, $mysql) or die(mysql_error());

            while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                $matriz[] = $row;
            }
            mysql_free_result($result);
            print_r($matriz);

            mysql_close($mysql);
            unset($matriz);
            ?>
<h2>PDO</h2>
            <?php
            $opt = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . DB_CHARSET
            );
            // Mas constantes en http://es2.php.net/manual/es/pdo.constants.php
            try {
                $pdo = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME,
                                DB_USER, DB_PASSWORD, $opt);
            } catch (PDOException $e) {
                echo 'Falló la conexión: ' . $e->getMessage();
            }
            $pass = $pdo->quote('123');
            $sql = "select id, name, password 
                    from usuarios 
                    where password like " . $pdo->quote('123');
            $result = $pdo->query($sql);

            $matriz = $result->fetchAll(PDO::FETCH_ASSOC); /* PDO::FETCH_CLASS */

            print_r($matriz);

            $result = null;
            $pdo = null;
            unset($matriz);
            ?>
<h2>mysqli</h2>
            <?php
            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            $mysqli->set_charset(DB_CHARSET);

            $pass = $mysqli->real_escape_string('123');
            $sql = "select id, name, password 
                    from usuarios 
                    where password like '" . $pass . "';";
            //$result = mysqli_query($mysqli, $mysqli);
            $result = $mysqli->query($sql);

            // $result->fetchAll();
            while ($row = $result->fetch_assoc()) {
                $matriz[] = $row;
            }
            $result->free();

            print_r($matriz);

            $mysqli->close();
            unset($matriz);
            ?>
<h2>Sesiones</h2>
            <?php
            //Sesiones
            //session_cache_limiter('private, must-revalidate');
            //$cache_limiter = session_cache_limiter();
            //session_cache_expire(60); // en minutos 
            //session_start();
            // si la variable de sesion counter no esta definida
            if (!isset($_SESSION['counter'])) {
                // la inicializamos a 0
                $_SESSION['counter'] = 0;
            } else {
                //si ya estaba definida la incrementamos
                $_SESSION['counter']++;
            }
            session_name();
            echo 'visitas: ' . $_SESSION['counter'] . '<br/>';
            ?>
<h2>AJAX</h2>
<?php include 'ajaxExample.php'; ?>
        </pre>
    </body>
</html>
