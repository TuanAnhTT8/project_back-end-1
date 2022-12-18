<?php
class Product extends Db
{
    public function get6ProductsSearch($keyword, $page, $perPage){
        $firstLink = ($page - 1) * $perPage;
        $keyword = "'%$keyword%'";

        $sql = self::$connection->prepare("SELECT * FROM products WHERE `name` LIKE $keyword ");
                $sql->bind_param("ii", $firstLink, $perPage);
                $sql->execute(); //return an object
                $items = array();
                $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
                return $items; //return an array
    }
    function paginate($currentPage, $url, $total, $perPage)
    {
        $totalLinks = ceil($total / $perPage);
        $link = "";
        for ($j = 1; $j <= $totalLinks; $j++) {
            if ($j == $currentPage){
                $link = $link . "<li class='active'>$j</li>";
            }
            else{
                $link = $link . "<li><a href='$url&page=$j'> $j </a></li>";
            }
        }
        return $link;
    }
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM products, manufacture, protypes 
                                            WHERE products.manu_id = manufacture.manu_id AND products.type_id = protypes.type_id");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function get5NewestProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM products ORDER BY created_at DESC LIMIT 0,5;");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getNameType($typeID)
    {
        $sql = self::$connection->prepare("SELECT `type_name` FROM protypes WHERE `type_id` = ?");
        $sql->bind_param("i", $typeID);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function search($keyword)
    {
        $keyword = "'%$keyword%'";
            $sql = self::$connection->prepare("SELECT * FROM products WHERE `name` LIKE $keyword");
            $sql->execute(); //return an object
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items; //return an array
        
    }
}