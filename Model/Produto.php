<?php

class Produto
{
    private int $codigo;
    private String $descricao;
    private int $estoque;
    private bool $ativo;
    private float $valor;
    private float $custo;

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setEstoque($estoque){
        $this->estoque = $estoque;
    }

    public function getEstoque(){
        return $this->estoque;
    }

    public function setAtivo($ativo){
        $this->ativo = $ativo;
    }

    public function getAtivo(){
        return $this->ativo;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function getValor(){
        return $this->valor;
    }


    public function setCusto($custo){
        $this->custo = $custo;
    }

    public function getCusto(){
        return $this->custo;
    }

}
?>