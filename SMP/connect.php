<?php
echo "<script src='https://cdn.tailwindcss.com'></script>";//damn
$req=0; $dbname="fpyzvpbd_m1";
switch($req){
    case 0:
        $server="MySQL-8.0"; $user="root"; $pass="";
        break;
    case 1:
        $server="localhost"; $user="fpyzvpbd"; $pass="nRydG2";
        break;
}
try{
    $pdo = new PDO("mysql:host=$server;dbname=$dbname;charset=utf8",$user,$pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "Ошибка подключения: ".$e->getMessage();
}
#   FUNCTIONS   #
function showtab($tn){
    global $pdo;
    $result = $pdo->query("SELECT * FROM $tn");
    $ware = $result->fetchAll(PDO::FETCH_NUM);
    foreach($ware as $row){
        echo '<tr class="hover:bg-cyan-700 transition duration-150">';
        for ($i = 1; $i < count($row); $i++) {
            echo '<td>' . htmlspecialchars($row[$i]) . '</td>';
        }
        echo '</tr>';
    }
}
function sethead(){
    $temp = <<<'EOT'
    <header class="bg-slate-950 p-4 flex justify-between">
        <a href="index.php" class="hover:text-cyan-300 transition duration-150 text-lg flex items-center">Система управления товарами</a>
        <nav class="w-1/5 flex justify-between"><a href="add.php" class="hover:text-cyan-300 transition duration-150">Добавить позицию</a>
        <a href="delete.php" class="hover:text-cyan-300 transition duration-150">Удалить позицию</a>
        <a href="editor.php" class="hover:text-cyan-300 transition duration-150">Редактировать товар</a>
        </nav>
    </header>
    EOT;
    echo $temp;
}
function show_categories(){
    global $pdo;
    $result = $pdo->query("SELECT * FROM categories");
    $ware = $result->fetchAll(PDO::FETCH_NUM);
    foreach($ware as $row){
        echo "<option value='$row[0]'>$row[1]</option>";
    }
}
function prods_in_cats($rows){
    $manytext = <<<'EOT'
    <p>Обнаружены товары в категории!</p>
    <table class="border-separate border border-slate-150 border-spacing-1 w-full p-2 bg-indigo-950">
                <tr class="bg-cyan-950 border border-slate-500">
                    <th>ID</th>
                    <th>Товар</th>
                    <th>Цена</th>
                </tr>
    EOT;
    echo $manytext;
    foreach($rows as $row){
        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[3]</td></tr>";
    }
    echo "</table>";
}
?>