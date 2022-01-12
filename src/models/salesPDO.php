<?php

namespace Daw;

class SalesPDO
{
    private $sql;

    public function __construct($connexio)
    {
        $this->sql = $connexio->getConnexio();
    }

    public function getReserva($CodiUsuari)
    {
        $query = 
        'SELECT A.Id, A.Codi, B.Nom, D.Nom "Centre", B.Ubicacio,
        A.Data, A.HoraInici, A.HoraFi
        FROM reserves A
        INNER JOIN sales B ON(A.CodiSala = B.Codi)
        INNER JOIN usuaris C ON (A.CodiUsuari = C.Codi)
        INNER JOIN centres D ON (B.Centre = D.Codi)
        WHERE C.Codi = :CodiUsuari';
        
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':CodiUsuari' => $CodiUsuari]);

        $llista = [];
        while ($sala = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $llista[] = $sala;
        }

        if ($this->sql->errorCode() !== '00000') {
            $err = $this->sql->errorInfo();
            $code = $this->sql->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
        return $llista;
    }

    public function delete($Id) 
    {
        $query = 'DELETE FROM reserves WHERE Id = :Id';
        $delete = $this->sql->prepare($query);
        $result = $delete->execute([':Id' => $Id]);

        if ($delete->errorCode() !== '00000') {
            $err = $delete->errorInfo();
            $code = $delete->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }

    public function searchUbication($search)
    {
        $query = 
        'SELECT A.*, B.Nom "NomCentre" FROM sales A
         JOIN centres B ON (A.Centre = B.Codi)
         WHERE A.Ubicacio = :search';
        
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':search' => $search]);

        $llista = [];
        while ($sala = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $llista = $sala;
        }

        if ($this->sql->errorCode() !== '00000') {
            $err = $this->sql->errorInfo();
            $code = $this->sql->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
        return $llista;
    }

    public function searchCenter($ubicacio, $centre)
    {
        $query = 
        'SELECT A.*, B.Nom "NomCentre" FROM sales A
         JOIN centres B ON (A.Centre = B.Codi)
         WHERE A.Ubicacio LIKE :ubicacio AND A.Centre = :centre';
        
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':ubicacio' => $ubicacio, ':centre' => $centre]);

        $llista = [];
        while ($sala = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $llista = $sala;
        }

        if ($this->sql->errorCode() !== '00000') {
            $err = $this->sql->errorInfo();
            $code = $this->sql->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
        return $llista;
    }

    public function getSales($Ubicacio, $Centre) {
        $query = 'SELECT A.Nom, A.NomRecurs, A.Ubicacio, A.Foto,
        B.Nom "Centre"
        FROM sales A
        INNER JOIN centres B ON (A.Centre = B.Codi)
        WHERE A.Ubicacio = :Ubicacio
        AND B.Nom = :Centre';

        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':Ubicacio' => $Ubicacio, ':Centre' => $Centre]);

        $llista = [];
        while ($sala = $stm->fetch(\PDO::FETCH_ASSOC)) {
            $llista[] = $sala;
        }

        if ($this->sql->errorCode() !== '00000') {
            $err = $this->sql->errorInfo();
            $code = $this->sql->errorCode();
            die("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
        return $llista;
    }
}