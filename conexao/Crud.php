<?php

require_once 'DB.php'; //link para utilizacao das funcoes dentro de do arquivo "BD"

abstract class Crud extends DB {

    public function ler($id, $tabela) {
        try {
            $sql = "SELECT * FROM " . $tabela . " WHERE id_" . $tabela . " = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo 'Falha ao ler um dados <br>';
            echo $exc->getMessage();
        }
    }

    public function ler_todos($tabela) {
        try {
            $sql = "SELECT * FROM " . $tabela;
            $stmt = DB::prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo 'Falha ao ler todos os dados <br>';
            echo $exc->getMessage();
        }

    }
    
    public function denuncia_status($status) {
        try {
            $sql = "SELECT * FROM denuncia as d, linha as l where status_denuncia = '".$status."' and d.linha_id_linha = l.id_linha";
            $stmt = DB::prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo 'Falha ao ler todos os dados <br>';
            echo $exc->getMessage();
        }

    }

    public function deletar($id, $tabela) {
        try {
            $sql = "DELETE FROM " . $tabela . " WHERE id_" . $tabela . " = :id";
            $stmt = DB::prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $exc) {
            echo 'Falha ao deletar dados <br>';
            echo $exc->getMessage();
        }

    }

}
