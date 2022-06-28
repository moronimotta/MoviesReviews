<?php

class JSONAdapter implements ReviewRepository
{
    public function __construct()
    {
    }

    public function list()
    {
        $output = json_decode($this->getData());

        return $output;
    }
    public function create(Review $input)
    {
        $dados = $this->list();
        $dados[] = $input;
        file_put_contents(__DIR__ . "/../reviewsSalvos.json", json_encode($dados));
    }

    public function getId()
    {
        $output = json_decode($this->getData());
        $idMaior = 0;
        foreach ($output as $o) {
            $idInt = intval($o->id);
            if ($idInt > $idMaior) {
                $idMaior = $idInt;
            }
        }

        $idInserido = $idMaior + 1;
        return $idInserido;
    }

    private function getData()
    {
        $dados = file_get_contents(__DIR__ . "/../reviewsSalvos.json");
        return $dados;
    }

    public function listByImdbID(string $imdbID)
    {
        $dados = $this->list();
        $output = array();
        foreach ($dados as $item) {
            if ($item->imdbID == $imdbID) {
                $output[] = $item;
            }
        }
        return $output;
    }

    public function delete($id)
    {
        $dados = $this->list();
        $input = [];
        foreach ($dados as $item) {
            if ($item->id == $id) {
                continue;
            }
            $input[] = $item;
        }

        //#TODO: passar pro adapter
        var_dump($dados);
        file_put_contents(__DIR__ . "/../reviewsSalvos.json", json_encode($input));
    }
}
