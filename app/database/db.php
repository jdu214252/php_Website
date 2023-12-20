<?php 

require('connect.php');

session_start();

// ------------------------------------------------------------------------------------------------------------------------
function tt($value){
    echo '<pre>';
        print_r($value);
    echo '</pre>';
}


global $pdo;
//Проверка выполнения запроса к БД
function dbCheckError($query){
    $errInfo = $query->errorInfo();

    if($errInfo[0] !== PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }

    return true;

}
// ------------------------------------------------------------------------------------------------------------------------
//Запрос на получение данных с одной таблицы
function selectAll($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'". $value."'";
            }
            if($i === 0){
                $sql = $sql . " WHERE $key=$value";
            }else{
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
    }

    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);

    return $query->fetchAll();

}
// ------------------------------------------------------------------------------------------------------------------------
//Запрос на получение одной строки с выбранной таблицы
function selectOne($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'". $value."'";
            }
            if($i === 0){
                $sql = $sql . " WHERE $key=$value";
            }else{
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
    }
    // $sql = $sql . " LIMIT 1";
    // tt($sql);
    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);

    return $query->fetch();

}

// $params = [
//     'admin' => 1,
//     'username' => 'Xusan'
// ];

// tt(selectAll('users', $params));
// tt(selectOne('users'));

// ------------------------------------------------------------------------------------------------------------------------
// INSERT IN DB
function insert($table, $params){
    global $pdo;
    
    // "INSERT INTO $table(admin, username, email, password) VALUES(1, 'Insert222', '2222insertFunction.com', 000)";
    $i = 0;
    $col = '';
    $mask = '';
    foreach($params as $key => $value){

        if($i === 0){
            $col = $col . "$key";
            $mask = $mask . "'" . "$value" . "'";
        }
        else{
            $col = $col . ", $key";
            $mask = $mask . ", '" ."$value". "'";
        }
        $i++;

    }
    $sql = "INSERT INTO $table ($col) VALUES ($mask)";
    // tt($sql);
    // exit();
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $pdo->lastInsertId();
}
// $arrData = [
//     'admin' => '0',
//     'username' => '13jon',
//     'email' => 'ww2e332on.com',
//     'password' => '4e3546yg111',
//     'created' => '2023-02-01 01:01:11'
// ];

// insert('users', $arrData);
// ------------------------------------------------------------------------------------------------------------------------

//UPDATE
function update($table, $id ,$params){
    global $pdo;
    
    // "INSERT INTO $table(admin, username, email, password) VALUES(1, 'Insert222', '2222insertFunction.com', 000)";
    $i = 0;
    $str = '';
    
    foreach($params as $key => $value){

        if($i === 0){
            $str = $str . $key ." = '" . $value . "'";
        }
        else{
            
            $str = $str . ", " . $key ." = '" .$value. "'";
        }
        $i++;

    }
    $sql = "UPDATE $table SET $str WHERE id= $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

}
// $param = [
//     'admin' => '0',
//     'password' => '7777777',
//     'email' => 'rr@gmail.com'
// ];

// update('users', 40, $param);


// ------------------------------------------------------------------------------------------------------------------------
//DELETE
function delete($table, $id){
    global $pdo;
    
    $sql = "DELETE FROM $table WHERE id=$id";    

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

}
// delete('users', 15)
// ------------------------------------------------------------------------------------------------------------------------


//Выборка записей (posts) с автором в админку
function selectAllFromPostsWithUsers($table1, $table2){
    global $pdo;
    $sql = " SELECT t1.id , t1.title, t1.img, t1.content, t1.status, t1.id_topic, t1.created_date, t2.username
     FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

    return $query->fetchAll(); 
}


//Выборка записей (posts) с автором на главную
function selectAllFromPostsWithUsersOnIndex($table1, $table2){
    global $pdo;
    $sql = " SELECT post.*, user.username FROM $table1 AS post JOIN $table2 AS user ON post.id_user = user.id WHERE post.status=1";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

    return $query->fetchAll(); 
}



//Выборка записей (posts) с автором на главную

function selectTopTopicsFromPostsOnIndex($table1){
    global $pdo;
    $sql = "SELECT * FROM $table1 WHERE id_topic = 1";
    
    $query = $pdo->prepare($sql);
    $query->execute(); 
    dbCheckError($query);

    return $query->fetchAll(); 
}


// Поиск по загаловка и содержииоиу (easy)
function searchInTitleAndContent($text, $table1, $table2){
    $text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));
    global $pdo;
    $sql = " SELECT 
        post.*, user.username 
        FROM $table1 AS post 
        JOIN $table2 AS user 
        ON post.id_user = user.id 
        WHERE post.status=1 
        AND post.title LIKE '%$text%' OR post.content LIKE '%$text%'";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

    return $query->fetchAll(); 
}

//Выборка запись (posts) с автором для сингле php
function selectAllFromPostsWithUsersOnSingle($table1, $table2, $id){
    global $pdo;
    $sql = " SELECT post.*, user.username FROM $table1 AS post JOIN $table2 AS user ON post.id_user = user.id WHERE post.id=$id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);

    return $query->fetch(); 
}


?>